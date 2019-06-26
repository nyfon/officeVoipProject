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
                <li class="active">شماره مجازی</li>
            </ul>
        </div>
        <!-- /Page Breadcrumb -->
        <!-- Page Header -->
        <div class="page-header position-relative">
            <div class="header-title">
                <h1>
                    شماره مجازی
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

                                    <form method="post" action="{{ route('admin.reservedVirtualNumber.store') }}"
                                          enctype="multipart/form-data">
                                        {{ csrf_field() }}



                                        <div class="col-md-12">
                                            <div class="form-group">

                                                <span class="input-icon icon-right">
                                                    <input type="number" class="form-control"
                                                           name="number"
                                                           value="{{ old('number') }}"
                                                           required autocomplete="off"
                                                           id="number" placeholder="شماره">
                                                      <i class="glyphicon glyphicon-font"></i>
                                                </span>
                                                @if ($errors->has('number'))
                                                    <span class="help-block">
                                                    <strong>{{ $errors->first('number') }}</strong>
                                                </span>
                                                @endif
                                            </div>
                                        </div>

                                        <div class="col-md-12">
                                            <div class="form-group">

                                                <span class="input-icon icon-right">
                                                    <input type="text" class="form-control"
                                                           name="isVipNumber"
                                                           value="{{ old('isVipNumber' , 1) }}"
                                                           id="isVipNumber"
                                                           required autocomplete="off"
                                                           placeholder="شماره vip">
                                                      <i class="glyphicon glyphicon-font"></i>
                                                </span>
                                                @if ($errors->has('isVipNumber'))
                                                    <span class="help-block">
                                                    <strong>{{ $errors->first('isVipNumber') }}</strong>
                                                </span>
                                                @endif
                                            </div>
                                        </div>

                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <span class="input-icon icon-right">
                                                    <select class="form-control" name="isActive" required>
                                                        <option value="">نوع شماره</option>
                                                        <option value="active">فعال</option>
                                                        <option value="onactive">غیر فعال</option>
                                                    </select>
                                                </span>
                                                @if ($errors->has('isActive'))
                                                    <span class="help-block">
                                                    <strong>{{ $errors->first('isActive') }}</strong>
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
                <div class="col-lg-8 col-sm-12 col-xs-12">
                    <div class="widget">
                        <div class="widget-header ">
                            <span class="widget-caption">شماره مجازی</span>
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
                                        شماره
                                    </th>
                                    <th>
                                        vip
                                    </th>
                                    <th>
                                        وضعیت
                                    </th>

                                    <th>
                                        زیر مجموع
                                    </th>

                                    <th>
                                        عملیات
                                    </th>

                                </tr>
                                </thead>
                                <tbody>
                                @foreach($reservedVirtualNumbers as $number)
                                    <tr>
                                        <td>
                                            <a href="{{ route('admin.reservedVirtualNumber.show' , $number) }}">{{ $number->number }}</a>
                                        </td>

                                        <td>
                                           {{ $number->is_vip_number }}
                                        </td>

                                        <td>
                                            {{ $number->isActive() }}
                                        </td>

                                        <td>
                                            {{ ($number->parent_id !== null)? $number->parent->number : 'شاخه اصلی' }}
                                        </td>

                                        <td>
                                            <button type="button" onclick="updateNumber(this.parentNode.parentNode)" class="btn btn-info">ویرایش</button>
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
        function updateNumber(value) {

            $("#number").val(value.children[0].innerText);
            $("#isVipNumber").val(value.children[1].innerText);
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
