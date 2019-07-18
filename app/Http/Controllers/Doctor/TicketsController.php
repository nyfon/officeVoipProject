<?php

namespace App\Http\Controllers\Doctor;

use App\Models\AnswerTicket;
use App\Models\CategoryTicket;
use App\Models\UserTicket;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class TicketsController extends Controller
{
    public function index(){

        $countTicket['unread'] = UserTicket::where('status',UserTicket::mergeIsStatus('unread'))->where('user_id', auth()->user()->id)->count();
        $countTicket['read'] = UserTicket::where('status',UserTicket::mergeIsStatus('read'))->where('user_id', auth()->user()->id)->count();
        $countTicket['answered'] = UserTicket::where('status',UserTicket::mergeIsStatus('answered'))->where('user_id', auth()->user()->id)->count();

        $tickets = UserTicket::where('parent_id', null)->where('user_id', auth()->user()->id)->get();
        return view('user.doctor.sections.ticket.index',compact('countTicket','tickets'));
    }

    public function create(){
        $categories = CategoryTicket::all();
        return view('user.doctor.sections.ticket.create',compact('categories'));
    }

    public function show(UserTicket $ticket){

        $tickets[] = $ticket;
        if (UserTicket::where('parent_id', $ticket->id)->exists()){
            $userTickets = UserTicket::where('parent_id', $ticket->id)->get();
            foreach ($userTickets as $item){
                $tickets[] = $item;
            }
        }

        foreach ($tickets as $key => $ticketItem){
            if($ticketItem->answer_id !== null ){
                $tickets[$key]['answer'] = AnswerTicket::where('id', $ticket->answer_id)->first();
            }
        }

        return view('user.doctor.sections.ticket.show',compact('tickets'));
    }

    public function addToTicket(Request $request, UserTicket $ticket)
    {

        $this->validateAddToTickete($request);

        UserTicket::create([
            'user_id' => auth()->user()->id,
            'title' => $ticket->title,
            'content' => $request['content'],
            'status' => UserTicket::mergeIsStatus('unread'),
            'urgency' => $ticket->urgency,
            'parent_id' => $ticket->id,
            'category_ticket_id' => $ticket->category_ticket_id,
        ]);

        alert()->success('سوال شما با موفقیت افزوده شد.', 'موفق')->persistent('باشه');
        return back();
    }

    private function validateAddToTickete(Request $request){
        return $request->validate([
            'content' =>  'required|string|min:2',
        ]);
    }

    public function store(Request $request){
        $this->validateStoreNewTicket($request);

        UserTicket::create([
            'user_id' => auth()->user()->id,
            'title' => $request['title'],
            'content' => $request['content'],
            'status' => UserTicket::mergeIsStatus('unread'),
            'urgency' => UserTicket::mergeIsUrgency($request['urgency']),
            'category_ticket_id' => $request['category'],
        ]);

        alert()->success('سوال شما با موفقیت افزوده شد.', 'موفق')->persistent('باشه');
        return back();
    }

    private function validateStoreNewTicket(Request $request){
        return $request->validate([
            'title' => 'required|string|min:2|max:255',
            'content' =>  'required|string|min:5',
            'category' =>  'required|numeric',
            'urgency' =>  'required|string|in:nonsignificant,medium,instantaneous',
        ]);

    }

}
