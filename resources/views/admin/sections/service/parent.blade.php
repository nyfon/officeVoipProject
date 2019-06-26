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
                <div class="col-lg-12 col-sm-12 col-xs-12">
                    <div class="widget">
                        <div class="widget-header ">
                            <span class="widget-caption">سرویس ها</span>
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
                                        عنوان
                                    </th>
                                    <th>
                                        مدت
                                    </th>
                                    <th>
                                        قیمت
                                    </th>

                                    <th>
                                        توع
                                    </th>

                                    <th>
                                        وضعیت
                                    </th>

                                    <th>
                                        تاریخ فعال سازی
                                    </th>

                                    <th>
                                        تاریخ غیر فعال کردن
                                    </th>

                                </tr>
                                </thead>
                                <tbody>
                                @foreach($serviceParents as $service)
                                    <tr>
                                        <td>
                                            {{ $service->service_name }}
                                        </td>

                                        <td>
                                            ماه
                                            <span>{{ $service->duration }}</span>
                                        </td>

                                        <td>
                                            تومان
                                            <span>{{ $service->cost }}</span>
                                        </td>

                                        <td>
                                            {{ $service->isType() }}
                                        </td>

                                        <td>
                                            {{ $service->isActive() }}
                                        </td>

                                        <td>
                                            {{ $service->persianDate($service->active_date)->format('Y/m/d') }}
                                        </td>

                                        <td>
                                            {{ ($service->deactive_date !== null )? $service->persianDate($service->deactive_date)->format('Y/m/d') : 'هنوز فعال است' }}
                                        </td>
                                    </tr>
                                @endforeach

                                </tbody>
                            </table>
                            <div class="row">
                                <div style="text-align: center">
                                    <br>
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
