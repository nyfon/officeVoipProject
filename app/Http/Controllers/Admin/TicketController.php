<?php

namespace App\Http\Controllers\Admin;

use App\Models\AnswerTicket;
use App\Models\UserTicket;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class TicketController extends Controller
{
    public function index($status){
        $tickets = UserTicket::where('status',UserTicket::mergeIsStatus($status))->get();
        return view('admin.sections.tickets.index', compact('tickets'));
    }

    public function show(UserTicket $ticket){
        $answer ='';
        if($ticket->answer_id !== null){
            $answer = AnswerTicket::where('id', $ticket->answer_id)->first();
        }

        $tickets =[];
        if ($ticket->parent_id !== null){
            $tickets = UserTicket::where('id', $ticket->parent_id)->get();
        }

        if ($ticket->status === UserTicket::mergeIsStatus('unread')){
            $ticket->update([
                'status' => UserTicket::mergeIsStatus('read'),
            ]);
        }

        return view('admin.sections.tickets.show', compact('ticket', 'answer', 'tickets'));
    }

    public function answer(UserTicket $ticket, Request $request){
        $this->vadationAnswer($request);

        if ($ticket->answer_id !== null){

            $answer = AnswerTicket::where('id', $ticket->answer_id)->first();
            $answer->update([
                'content' => $request['editordata']
            ]);

        }else{

            $answer = AnswerTicket::create([
                'ticket_id' => $ticket->id,
                'user_id' => auth()->user()->id,
                'content' => $request['editordata']
            ]);
        }
        $ticket->update([
            'answer_id' => $answer->id,
            'status' => UserTicket::mergeIsStatus('answered'),
        ]);

        alert()->success('درخواست شما با موفقیت انجام شد', 'موفق')->persistent('باشه');
        return back();
    }



    private function vadationAnswer(Request $request){
        return $request->validate([
            'editordata' => 'required|string|min:5',
        ]);
    }

}
