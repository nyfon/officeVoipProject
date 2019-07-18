@extends('user.doctor.master')
@section('content')
    <div class="container">
        <div class="row">

            <div class=" col-md-12">
                <div class="ui-block">
                    <div class="ui-block-title">
                        <h6 class="title">سوال اصلی</h6>
                    </div>
                    <div class="ui-block-content">
                        <div class="row">
                            <div class=" col-md-6">
                                <h6>عنوان سوال : {{ $tickets[0]->title }}</h6>
                                <h6>فوریت : {{ $tickets[0]->isUrgency()  }}</h6>
                            </div>
                            <div class=" col-md-6">
                                <h6>عنوان دسته بندی : {{ $tickets[0]->category->title }}</h6>
                                <h6>تاریخ اولین سوال : {{ $tickets[0]->faData($tickets[0]->created_at)->format('Y/m/d ') }}</h6>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="row">
            <div class=" col-md-12">
                <div class="ui-block popup-chat">
                    <div class="mCustomScrollbar">
                        <ul class="notification-list chat-message chat-message-field">
                            @foreach($tickets as $ticketItem)
                                <li>
                                    <div class="author-thumb">
                                        <img src="{{ url('/frontEnd/img/generic-user-purple.png') }}" alt="author"
                                             class="mCS_img_loaded">
                                    </div>
                                    <div class="notification-event">
                                        <div class="chat-message-item">
                                            <p>{{ $ticketItem->content }}</p>
                                            <span>وضعیت : {{ $ticketItem->isStatus()  }}</span>
                                            <br>
                                            <span>تاریخ ارسال : {{ $ticketItem->faData($ticketItem->created_at)  }}</span>

                                        </div>

                                    </div>
                                </li>


                                @if($ticketItem['answer'])
                                    <li class="answer">
                                        <div class="author-thumb">
                                            <img src="img/author-page.jpg" alt="author" class="mCS_img_loaded">
                                        </div>
                                        <div class="notification-event">
                                            <div class="chat-message-item">
                                                <p>{!!  $ticketItem['answer']->content !!}</p>
                                                <br>
                                                <span>تاریخ پاسخ : {{ $ticketItem->faData($ticketItem['answer']->created_at)  }}</span>

                                            </div>

                                        </div>
                                    </li>
                                @endif
                            @endforeach

                        </ul>
                    </div>

                    <form action="{{ route('doctor.ticket.add.to.ticket', $tickets[0]) }}" method="post">
                        @csrf
                        <div class="form-group label-floating is-empty">
                            <label class="control-label">متن را وارد کنید . . .</label>
                            <textarea class="form-control" placeholder="" name="content" required
                                      minlength="2"></textarea>
                        </div>
                        <button type="submit" class="btn btn-primary">ارسال</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
