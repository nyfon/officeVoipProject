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
                <div class="col-lg-4 col-sm-12 col-xs-12">
                    @include('admin.partials.errors')
                    <div class="widget flat radius-bordered">
                        <div class="widget-header bg-blue">
                            <span class="widget-caption">افزودن شماره</span>
                        </div>
                        <div class="widget-body">
                            <div id="registration-form">
                                <div class="row">

                                    <form method="post" action="{{ route('admin.service.store') }}"
                                          enctype="multipart/form-data">
                                        {{ csrf_field() }}


                                        <div class="col-md-12">
                                            <div class="form-group">

                                                <span class="input-icon icon-right">
                                                    <input type="text" class="form-control"
                                                           name="serviceName"
                                                           value="{{ old('serviceName') }}"
                                                           required autocomplete="off"
                                                           id="serviceName" placeholder="عنوان">
                                                      <i class="glyphicon glyphicon-font"></i>
                                                </span>
                                                @if ($errors->has('serviceName'))
                                                    <span class="help-block">
                                                    <strong>{{ $errors->first('serviceName') }}</strong>
                                                </span>
                                                @endif
                                            </div>
                                        </div>

                                        <div class="col-md-12">
                                            <div class="form-group">

                                                <span class="input-icon icon-right">
                                                    <input type="text" class="form-control"
                                                           name="duration"
                                                           value="{{ old('duration') }}"
                                                           id="duration"
                                                           required autocomplete="off"
                                                           placeholder="مدت به ماه">
                                                      <i class="glyphicon glyphicon-font"></i>
                                                </span>
                                                @if ($errors->has('duration'))
                                                    <span class="help-block">
                                                    <strong>{{ $errors->first('duration') }}</strong>
                                                </span>
                                                @endif
                                            </div>
                                        </div>

                                        <div class="col-md-12">
                                            <div class="form-group">

                                                <span class="input-icon icon-right">
                                                    <input type="text" class="form-control"
                                                           name="cost"
                                                           value="{{ old('cost') }}"
                                                           id="cost"
                                                           required autocomplete="off"
                                                           placeholder="قیمیت">
                                                      <i class="glyphicon glyphicon-font"></i>
                                                </span>
                                                @if ($errors->has('cost'))
                                                    <span class="help-block">
                                                    <strong>{{ $errors->first('cost') }}</strong>
                                                </span>
                                                @endif
                                            </div>
                                        </div>

                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <span class="input-icon icon-right">
                                                    <select class="form-control" name="type" id="type" required>
                                                        <option value="">نوع</option>
                                                        <option value="virtual_number">شماره مجازی</option>
                                                        <option value="voip_services">سرویس</option>
                                                    </select>
                                                </span>
                                                @if ($errors->has('type'))
                                                    <span class="help-block">
                                                    <strong>{{ $errors->first('type') }}</strong>
                                                </span>
                                                @endif
                                            </div>
                                        </div>

                                        <hr class="wide">
                                        <div class="col-md-12">
                                            <input type="hidden" value="0" name="parent_id" id="parent_id">
                                            <button type="submit" class="btn btn-blue">افزودن</button>
                                        </div>
                                    </form>


                                </div>

                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-8 col-sm-12 col-xs-12">
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

                                    <th>
                                        عملیات
                                    </th>

                                </tr>
                                </thead>
                                <tbody>
                                @foreach($services as $service)
                                    <tr>
                                        <td>
                                            <a href="{{ route('admin.service.show' , $service) }}">{{ $service->service_name }}</a>
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

                                        <td>

                                            <form action="{{ route('admin.service.disabling' ,$service ) }}"
                                                  method="post">
                                                {{ csrf_field() }}
                                                {{ method_field('DELETE') }}
                                                <button type="submit" class="btn btn-danger">غیر فعال</button>
                                            </form>

                                            <button type="button"
                                                    onclick="updateNumber(this.parentNode.parentNode , {{ $service->id }})"
                                                    class="btn btn-info">ویرایش
                                            </button>

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
