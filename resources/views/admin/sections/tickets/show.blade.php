@extends('admin.master')

@section('content')
    <!-- Page Content -->
    <div class="page-content">
        <!-- Page Breadcrumb -->
        <div class="page-breadcrumbs">
            <ul class="breadcrumb">
                <li>
                    <i class="fa fa-home"></i>
                    <a href="{{ route('admin.panel.index') }}">داشبورد</a>
                </li>
                <li class="active">سرویس ها</li>
            </ul>
        </div>
        <!-- /Page Breadcrumb -->
        <!-- Page Header -->
        <div class="page-header position-relative">
            <div class="header-title">
                <h1>
                    سرویس ها
                </h1>
            </div>
            <!--Header Buttons-->
            <div class="header-buttons">
                <a class="sidebar-toggler" href="#">
                    <i class="fa fa-arrows-h"></i>
                </a>
                <a class="refresh" id="refresh-toggler" href="">
                    <i class="glyphicon glyphicon-refresh"></i>
                </a>
                <a class="fullscreen" id="fullscreen-toggler" href="#">
                    <i class="glyphicon glyphicon-fullscreen"></i>
                </a>
            </div>
            <!--Header Buttons End-->
        </div>
        <!-- /Page Header -->
        <!-- Page Body -->
        <div class="page-body">
            <div class="row">
                <div class="col-lg-6 col-sm-6 col-xs-12">
                    <div class="widget flat radius-bordered">
                        <div class="widget-header bg-danger">
                            <span class="widget-caption">پاسخ</span>
                        </div>
                        <div class="widget-body">
                            <div id="registration-form">
                                <form action="{{ route('admin.ticket.answer', $ticket) }}" method="post">
                                    @csrf
                                    <div class="form-title">
                                        پاسخ
                                    </div>
                                    <div class="row">
                                        <textarea id="summernote"
                                                  name="editordata">{{ ($answer !== null)? $answer->content : '' }}</textarea>
                                        <hr>
                                        <button type="submit" class="btn btn-danger">ارسال</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6 col-sm-6 col-xs-12">
                    <div class="widget">
                        <div class="widget-header ">
                            <span class="widget-caption">{{ $ticket->title }}</span>
                            <div class="widget-buttons compact">

                                <a href="#" data-toggle="maximize">
                                    <i class="fa fa-expand"></i>
                                </a>
                                <a href="#" data-toggle="collapse">
                                    <i class="fa fa-minus"></i>
                                </a>
                                <a href="#" data-toggle="dispose">
                                    <i class="fa fa-times"></i>
                                </a>
                            </div>
                        </div>
                        <div class="widget-body">
                            <p>
                                {{ $ticket->content }}
                            </p>
                        </div>
                    </div>
                    @if(count($tickets) !== 0))
                        <h5 class="row-title before-sky">تیکت ها قبلی</h5>

                        @foreach($tickets as $ticket)
                            <div class="widget">
                                <div class="widget-header ">
                                    <span class="widget-caption">{{ $ticket->title }}</span>
                                    <div class="widget-buttons compact">

                                        <a href="#" data-toggle="maximize">
                                            <i class="fa fa-expand"></i>
                                        </a>
                                        <a href="#" data-toggle="collapse">
                                            <i class="fa fa-minus"></i>
                                        </a>
                                        <a href="#" data-toggle="dispose">
                                            <i class="fa fa-times"></i>
                                        </a>
                                    </div>
                                </div>
                                <div class="widget-body">
                                    <p>
                                        {{ $ticket->content }}
                                    </p>
                                </div>
                            </div>
                        @endforeach
                    @endif
                </div>

            </div>
        </div>
        <!-- /Page Body -->
    </div>
    <!-- /Page Content -->

@endsection


@section('css')
    <!--Page Related styles-->
    <link href="{{ url('/AdminAssets/css/dataTables.bootstrap.css') }}" rel="stylesheet"/>



@endsection


@section('js')

    <!--Summernote Scripts-->
    <script src="{{ url('/AdminAssets/js/editors/summernote/summernote.js') }}"></script>
    <script>
        $('#summernote').summernote({height: 300});
    </script>


@endsection

