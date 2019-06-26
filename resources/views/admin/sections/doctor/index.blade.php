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
                    همه پزشکان
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
                <div class="col-xs-12 col-md-12">
                    <div class="widget">
                        <div class="widget-header ">
                            <span class="widget-caption">پزشکان</span>
                            <div class="widget-buttons">
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
                            <table class="table table-striped table-bordered table-hover" id="expandabledatatable">
                                <thead>
                                <tr>
                                    <th>
                                        #
                                    </th>

                                    <th>
                                        نام کاربری
                                    </th>

                                    <th>
                                        نام و نام خانوادگی
                                    </th>

                                    <th>
                                        تلفن
                                    </th>

                                    <th>
                                        توضیحات
                                    </th>

                                    <th>
                                        وضعیت
                                    </th>

                                    <th>
                                        عملیات
                                    </th>

                                </tr>
                                </thead>
                                <tbody>
                                @foreach($users as $key => $user)
                                    <tr>
                                        <td>
                                            {{ $key + 1 }}
                                        </td>

                                        <td>
                                            {{ $user->username }}
                                        </td>

                                        <td>
                                            {{ $user->generalDoctor->name ?? '  وارد نشده' }} {{ $user->generalDoctor->family ?? 'وارد نشده' }}
                                        </td>

                                        <td>
                                            {{ $user->normalizePhoneNumber() }}
                                        </td>

                                        <td>
                                            {{ $user->description }}
                                        </td>


                                        <td>
                                            <div class="btn-group">
                                                <a class="btn btn-default "
                                                   href="javascript:void(0);">{{ $user->isStatusFarsi() }}</a>
                                                <a class="btn btn-default  dropdown-toggle" data-toggle="dropdown"
                                                   href="javascript:void(0);"><i class="fa fa-angle-down"></i></a>
                                                <ul class="dropdown-menu">
                                                    <li>
                                                        <a href="{{ route('admin.doctor.changeStatus',['user'=> $user, 'status'=>'onactive' ]) }}">غیر
                                                            فعال</a>
                                                    </li>
                                                    <li>
                                                        <a href="{{ route('admin.doctor.changeStatus',['user'=> $user, 'status'=>'active' ]) }}">فعال</a>
                                                    </li>
                                                    <li>
                                                        <a href="{{ route('admin.doctor.changeStatus',['user'=> $user, 'status'=>'lock' ]) }}">قفل</a>
                                                    </li>

                                                </ul>
                                            </div>

                                        </td>

                                        <td>
                                            <form action="{{ route('admin.doctor.destroy'  , ['user' => $user]) }}" method="post">
                                                {{ method_field('delete') }}
                                                {{ csrf_field() }}
                                                <button type="submit" class="btn btn-danger">پاک کردن</button>
                                                <a href="{{ route('admin.doctor.show' , ['user' => $user]) }}" class="btn btn-primary">نمایش</a>
                                            </form>
                                        </td>

                                    </tr>
                                @endforeach

                                </tbody>
                            </table>
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
    <!--Page Related styles-->
    <link href="{{ url('/AdminAssets/css/dataTables.bootstrap.css') }}" rel="stylesheet"/>



@endsection

@section('js')

    <!--Page Related Scripts-->
    <script src="{{ url('/AdminAssets/js/datatable/jquery.dataTables.min.js')}}"></script>
    <script src="{{ url('/AdminAssets/js/datatable/ZeroClipboard.js')}}"></script>
    <script src="{{ url('/AdminAssets/js/datatable/dataTables.tableTools.min.js')}}"></script>
    <script src="{{ url('/AdminAssets/js/datatable/dataTables.bootstrap.min.js')}}"></script>
    <script src="{{ url('/AdminAssets/js/datatable/datatables-init.js')}}"></script>
    <script>

        InitiateExpandableDataTable.init();

    </script>


@endsection
