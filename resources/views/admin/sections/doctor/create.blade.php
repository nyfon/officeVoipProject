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
                <li class="active">پزشکان</li>
            </ul>
        </div>
        <!-- /Page Breadcrumb -->
        <!-- Page Header -->
        <div class="page-header position-relative">
            <div class="header-title">
                <h1>
                    پزشکان
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
            @include('admin.partials.errors')
            <div class="row">
                <div class="col-lg-12 col-sm-12 col-xs-12">
                    <div class="widget flat radius-bordered">
                        <div class="widget-header bg-blue">
                            <span class="widget-caption">افزودن پزشک</span>
                        </div>
                        <div class="widget-body">
                            <div id="registration-form">
                                <div class="row">
                                    <form method="post" action="{{ route('admin.doctor.store') }}"
                                          enctype="multipart/form-data">
                                        {{ csrf_field() }}

                                        <div class="col-md-6">
                                            <div class="form-group">

                                                <span class="input-icon icon-right">
                                                    <input type="text" class="form-control"
                                                           name="username" value="{{ old('username') }}"
                                                           required
                                                           id="userameInput" placeholder="کد ملی پزشک *">
                                                      <i class="glyphicon glyphicon-font"></i>
                                                </span>
                                                @if ($errors->has('username'))
                                                    <span class="help-block">
                                                    <strong>{{ $errors->first('username') }}</strong>
                                                </span>
                                                @endif
                                            </div>
                                        </div>

                                        <div class="col-md-6">
                                            <div class="form-group">

                                                <span class="input-icon icon-right">
                                                    <input type="text" class="form-control"
                                                           name="phone_number" value="{{ old('phone_number') }}"
                                                           required
                                                           id="userameInput" placeholder="شماره تلفن *">
                                                      <i class="glyphicon glyphicon-font"></i>
                                                </span>
                                                @if ($errors->has('phone_number'))
                                                    <span class="help-block">
                                                    <strong>{{ $errors->first('phone_number') }}</strong>
                                                </span>
                                                @endif
                                            </div>
                                        </div>

                                        <div class="col-md-6">
                                            <div class="form-group">

                                                <span class="input-icon icon-right">
                                                    <input type="text" class="form-control"
                                                           name="name" value="{{ old('name') }}"
                                                           id="userameInput" placeholder="نام">
                                                      <i class="glyphicon glyphicon-font"></i>
                                                </span>
                                                @if ($errors->has('name'))
                                                    <span class="help-block">
                                                    <strong>{{ $errors->first('name') }}</strong>
                                                </span>
                                                @endif
                                            </div>
                                        </div>

                                        <div class="col-md-6">
                                            <div class="form-group">

                                                <span class="input-icon icon-right">
                                                    <input type="text" class="form-control"
                                                           name="family" value="{{ old('family') }}"
                                                           id="userameInput" placeholder="نام خانوادگی">
                                                      <i class="glyphicon glyphicon-font"></i>
                                                </span>
                                                @if ($errors->has('family'))
                                                    <span class="help-block">
                                                    <strong>{{ $errors->first('family') }}</strong>
                                                </span>
                                                @endif
                                            </div>
                                        </div>

                                        <div class="col-md-6">
                                            <div class="form-group">

                                                <span class="input-icon icon-right">
                                                    <input type="text" class="form-control"
                                                           name="medicalSystemNumber" value="{{ old('medicalSystemNumber') }}"
                                                           id="userameInput" placeholder="کد نظام پزشکی">
                                                      <i class="glyphicon glyphicon-font"></i>
                                                </span>
                                                @if ($errors->has('medicalSystemNumber'))
                                                    <span class="help-block">
                                                    <strong>{{ $errors->first('medicalSystemNumber') }}</strong>
                                                </span>
                                                @endif
                                            </div>
                                        </div>

                                        <div class="col-md-6">
                                            <div class="form-group">

                                                <span class="input-icon icon-right">
                                                    <input type="text" class="form-control"
                                                           name="mail" value="{{ old('mail') }}"
                                                           id="userameInput" placeholder="ایمیل">
                                                      <i class="glyphicon glyphicon-font"></i>
                                                </span>
                                                @if ($errors->has('mail'))
                                                    <span class="help-block">
                                                    <strong>{{ $errors->first('mail') }}</strong>
                                                </span>
                                                @endif
                                            </div>
                                        </div>

                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <span class="input-icon icon-right">
                                                      <textarea class="form-control" id="textareaanimated"
                                                                name="description" value="{{ old('description') }}"
                                                                placeholder="توضیحات"
                                                                rows="5"></textarea>
                                                     <i class="glyphicon glyphicon-font"></i>
                                                </span>
                                                @if ($errors->has('description'))
                                                    <span class="help-block">
                                                    <strong>{{ $errors->first('description') }}</strong>
                                                </span>
                                                @endif
                                            </div>
                                        </div>

                                        <hr class="wide">
                                        <div class="col-md-12">
                                            <button type="submit" class="btn btn-blue">افزودن</button>
                                        </div>
                                    </form>


                                </div>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- /Page Body -->
    </div>
    <!-- /Page Content -->

@endsection


@section('css')

    <link href="https://rawgithub.com/hayageek/jquery-upload-file/master/css/uploadfile.css" rel="stylesheet">
    <link rel="stylesheet" href="{{ url('/css/bootstrap-datepicker.min.css') }}" />
@endsection

@section('js')
    <script src="{{ url('/js/bootstrap-datepicker.min.js') }}"></script>
    <script src="{{ url('/js/bootstrap-datepicker.fa.min.js') }}"></script>
    <script>
        $(document).ready(function() {


            $("#datepicker1").datepicker({
                isRTL: true,
                dateFormat: "d/m/yy"
            });

            $("#datepicker2").datepicker({
                isRTL: true,
                dateFormat: "d/m/yy"
            });

        });
    </script>


@endsection
