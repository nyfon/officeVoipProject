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
                                    <th>کاربر</th>
                                    <th>عنوان</th>
                                    <th>متن</th>
                                    <th>وضعیت</th>
                                    <th>فوریت</th>
                                    <th>تاریخ ارسال سوال</th>
                                </tr>
                                </thead>
                                <tbody>
                                    @foreach($tickets as $ticket)
                                        <tr>
                                            <td><a href="#">{{ $ticket->user }}</a></td>
                                            <td><a href="{{ route('admin.ticket.show', $ticket) }}">{{ $ticket->title }}</a></td>
                                            <td>{{ str_limit($ticket->content,80,'. . .') }}</td>
                                            <td>{{ $ticket->status }}</td>
                                            <td>{{ $ticket->urgency }}</td>
                                            <td>{{ $ticket->created_at }}</td>
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

    <script>
        function updateNumber(value, id) {
            $("#serviceName").val(value.children[0].innerText);
            $("#duration").val(value.children[1].children[0].innerText);
            $("#cost").val(value.children[2].children[0].innerText);
            if (value.children[3].innerText === 'شماره مجازی') {
                console.log(value.children[3].innerText);
                $('#type').val("virtual_number");
            } else {
                $('#type').val("voip_services").change();
            }
            $("#parent_id").val(id);
        }
    </script>

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
