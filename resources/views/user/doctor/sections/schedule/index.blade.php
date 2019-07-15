@extends('user.doctor.master')

@section('content')

    <!-- Your Account Personal Information -->

    <div class="container">
        <div class="row">
            <div class="col col-xl-12 order-xl-2 col-lg-9 order-lg-2 col-md-12 order-md-1 col-sm-12 col-12">
                <div class="ui-block">
                    <div class="ui-block-title">
                        <h6 class="title">اطلاعات شخصی</h6>
                        <div class="align-right">
                            <a href="{{ route('doctor.office.index') }}" class="btn btn-primary btn-md-2">افزودن
                                برنامه</a>
                        </div>
                    </div>
                    <div class="cd-schedule cd-schedule--loading margin-top-lg margin-bottom-lg js-cd-schedule">
                        <div class="cd-schedule__timeline">
                            <ul>
                                <li><span>06:00</span></li>
                                <li><span>07:00</span></li>
                                <li><span>08:00</span></li>
                                <li><span>09:00</span></li>
                                <li><span>10:00</span></li>
                                <li><span>11:00</span></li>
                                <li><span>12:00</span></li>
                                <li><span>13:00</span></li>
                                <li><span>14:00</span></li>
                                <li><span>15:00</span></li>
                                <li><span>16:00</span></li>
                                <li><span>17:00</span></li>
                                <li><span>18:00</span></li>
                                <li><span>19:00</span></li>
                                <li><span>20:00</span></li>
                                <li><span>21:30</span></li>
                                <li><span>22:00</span></li>
                                <li><span>23:00</span></li>
                                <li><span>24:00</span></li>
                            </ul>
                        </div> <!-- .cd-schedule__timeline -->

                        <div class="cd-schedule__events">
                            <ul>
                                <li class="cd-schedule__group">
                                    <div class="cd-schedule__top-info"><span>شنبه</span></div>

                                    <ul>
                                        @if(count($days['sat'])!== 0 )
                                            @foreach($days['sat'] as $day)

                                                <li class="cd-schedule__event">
                                                    <a  data-start="{{ substr($day['sat-start-time'],0,5) }}" data-end="{{ substr($day['sat-finish-time'],0,5) }}"
                                                       data-content="event-abs-circuit"
                                                       data-event="event-1" href="#0">
                                                        <em class="cd-schedule__name">{{ $day->office->office_name }}</em>
                                                    </a>
                                                </li>
                                            @endforeach
                                        @endif
                                    </ul>
                                </li>

                                <li class="cd-schedule__group">
                                    <div class="cd-schedule__top-info"><span>یکشنبه</span></div>

                                    <ul>
                                        @if(count($days['sun'])!== 0 )
                                            @foreach($days['sun'] as $day)
                                                <li class="cd-schedule__event">
                                                    <a data-start="{{ substr($day['sun-start-time'],0,5) }}" data-end="{{ substr($day['sun-finish-time'],0,5) }}"
                                                       data-content="event-abs-circuit"
                                                       data-event="event-{{ $day->office->id }}" href="#0">
                                                        <em class="cd-schedule__name">{{ $day->office->office_name }}</em>
                                                    </a>
                                                </li>
                                            @endforeach
                                        @endif
                                    </ul>
                                </li>

                                <li class="cd-schedule__group">
                                    <div class="cd-schedule__top-info"><span>دوشنبه</span></div>

                                    <ul>
                                        @if(count($days['mon'])!== 0 )
                                            @foreach($days['mon'] as $day)
                                                <li class="cd-schedule__event">
                                                    <a data-start="{{ $day['mon-start-time'] }}" data-end="{{ $day['mon-finish-time'] }}"
                                                       data-content="event-abs-circuit"
                                                       data-event="event-{{ $day->office->id }}" href="#0">
                                                        <em class="cd-schedule__name">{{ $day->office->office_name }}</em>
                                                    </a>
                                                </li>
                                            @endforeach
                                        @endif
                                    </ul>
                                </li>

                                <li class="cd-schedule__group">
                                    <div class="cd-schedule__top-info"><span>سه شنبه</span></div>

                                    <ul>
                                        @if(count($days['tues'])!== 0 )
                                            @foreach($days['tues'] as $day)
                                                <li class="cd-schedule__event">
                                                    <a data-start="{{ $day['tues-start-time'] }}" data-end="{{ $day['tues-finish-time'] }}"
                                                       data-content="event-abs-circuit"
                                                       data-event="event-{{ $day->office->id }}" href="#0">
                                                        <em class="cd-schedule__name">{{ $day->office->office_name }}</em>
                                                    </a>
                                                </li>
                                            @endforeach
                                        @endif
                                    </ul>
                                </li>

                                <li class="cd-schedule__group">
                                    <div class="cd-schedule__top-info"><span>چهار شنبه</span></div>

                                    <ul>
                                        @if(count($days['wed'])!== 0 )
                                            @foreach($days['wed'] as $day)
                                                <li class="cd-schedule__event">
                                                    <a data-start="{{ $day['wed-start-time'] }}" data-end="{{ $day['wed-finish-time'] }}"
                                                       data-content="event-abs-circuit"
                                                       data-event="event-{{ $day->office->id }}" href="#0">
                                                        <em class="cd-schedule__name">{{ $day->office->office_name }}</em>
                                                    </a>
                                                </li>
                                            @endforeach
                                        @endif
                                    </ul>
                                </li>

                                <li class="cd-schedule__group">
                                    <div class="cd-schedule__top-info"><span>پنجشنبه</span></div>

                                    <ul>
                                        @if(count($days['thurs'])!== 0 )
                                            @foreach($days['thurs'] as $day)
                                                <li class="cd-schedule__event">
                                                    <a data-start="{{ $day['thurs-start-time'] }}" data-end="{{ $day['thurs-finish-time'] }}"
                                                       data-content="event-abs-circuit"
                                                       data-event="event-{{ $day->office->id }}" href="#0">
                                                        <em class="cd-schedule__name">{{ $day->office->office_name }}</em>
                                                    </a>
                                                </li>
                                            @endforeach
                                        @endif
                                    </ul>
                                </li>

                                <li class="cd-schedule__group">
                                    <div class="cd-schedule__top-info"><span>جمعه</span></div>

                                    <ul>
                                        @if(count($days['fri'])!== 0 )
                                            @foreach($days['fri'] as $day)
                                                <li class="cd-schedule__event">
                                                    <a data-start="{{ $day['fri-start-time'] }}" data-end="{{ $day['fri-finish-time'] }}"
                                                       data-content="event-abs-circuit"
                                                       data-event="event-{{ $day->office->id }}" href="#0">
                                                        <em class="cd-schedule__name">{{ $day->office->office_name }}</em>
                                                    </a>
                                                </li>
                                            @endforeach
                                        @endif
                                    </ul>
                                </li>
                            </ul>
                        </div>

                        <div class="cd-schedule-modal">
                            <header class="cd-schedule-modal__header">
                                <div class="cd-schedule-modal__content">
                                    <span class="cd-schedule-modal__date"></span>
                                    <h3 class="cd-schedule-modal__name"></h3>
                                </div>

                                <div class="cd-schedule-modal__header-bg"></div>
                            </header>

                            <div class="cd-schedule-modal__body">
                                <div class="cd-schedule-modal__event-info"></div>
                                <div class="cd-schedule-modal__body-bg"></div>
                            </div>

                            <a href="#0" class="cd-schedule-modal__close text-replace">Close</a>
                        </div>

                        <div class="cd-schedule__cover-layer"></div>
                    </div> <!-- .cd-schedule -->
                </div>
            </div>

            {{--@include('user.partials.doctor.navbarPanelUser')--}}
        </div>
    </div>


    <!-- ... end Your Account اطلاعات شخصی =======================================-->

@endsection
@section('css')
    <script>document.getElementsByTagName("html")[0].className += " js";</script>
    <link rel="stylesheet" href="{{ url('frontEnd/css/schedule.css') }}">
@endsection

@section('js')
    <script src="{{ url('frontEnd/js/util.js')}}"></script> <!-- util functions included in the CodyHouse framework -->
    <script src="{{ url('frontEnd/js/schedule.js')}}"></script>
@endsection




