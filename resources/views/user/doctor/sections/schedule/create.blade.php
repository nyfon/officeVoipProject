@extends('user.doctor.master')

@section('content')

    <!-- Your Account Personal Information -->

    <div class="container">
        <div class="row">
            <div class="col col-xl-12 order-xl-2 col-lg-9 order-lg-2 col-md-12 order-md-1 col-sm-12 col-12">
                <div class="ui-block">
                    <div class="ui-block-title">
                        <h6 class="title">برنامه مطب</h6>
                    </div>
                    @include('user.doctor.partials.errors')
                    <div class="ui-block-content">
                        <form action="{{ route('doctor.schedule.store' , $office) }}" method="post">
                            @csrf
                            <div class="row">

                                <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
                                    <div class="form-group label-floating">
                                        <label class="control-label">تعداد بیماران در روز</label>
                                        <input class="form-control" placeholder="" type="number" name="paitientsPerDay"
                                               value="{{ old('paitientsPerDay', $officeScheduleConfigs['paitients-per-day']) }}">
                                    </div>
                                </div>

                                <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
                                    <div class="form-group label-floating">
                                        <label class="control-label">وقت برای هر بیمار ( دقیقه )</label>
                                        <input class="form-control" placeholder="" type="number" name="minutesPerPatient"
                                               value="{{ old('minutesPerPatient', $officeScheduleConfigs['minutes-per-patient']) }}">
                                    </div>
                                </div>
                            </div>

                            {{-- saturday --}}
                            <div class="row">
                                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                    <p>برنامه روز شنبه ( درصورت خالی بودن فیلدهااین روز غیر فعال میشود )</p>
                                </div>
                                <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
                                    <div class="form-group label-floating">
                                        <label class="control-label">ساعت شروع</label>
                                        <input class="form-control" placeholder="" type="time" name="day[saturday][start]"
                                               value="{{ old('day[saturday][start]', $officeScheduleConfigs['sat-start-time']) }}">
                                    </div>
                                </div>
                                <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
                                    <div class="form-group label-floating">
                                        <label class="control-label">ساعت پایان</label>
                                        <input class="form-control" placeholder="" type="time" name="day[saturday][end]"
                                               value="{{ old('day[saturday][end]', $officeScheduleConfigs['sat-finish-time']) }}">
                                    </div>
                                </div>

                            </div>
                            {{-- /saturday --}}

                            {{-- sunday --}}
                            <div class="row">
                                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                    <p>برنامه روز یکشنبه ( درصورت خالی بودن فیلدهااین روز غیر فعال میشود )</p>
                                </div>
                                <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
                                    <div class="form-group label-floating">
                                        <label class="control-label">ساعت شروع</label>
                                        <input class="form-control" placeholder="" type="time" name="day[sunday][start]"
                                               value="{{ old('day[sunday][start]', $officeScheduleConfigs['sun-start-time']) }}">
                                    </div>
                                </div>
                                <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
                                    <div class="form-group label-floating">
                                        <label class="control-label">ساعت پایان</label>
                                        <input class="form-control" placeholder="" type="time" name="day[sunday][end]"
                                               value="{{ old('day[sunday][end]', $officeScheduleConfigs['sun-finish-time']) }}">
                                    </div>
                                </div>
                            </div>
                            {{-- /sunday --}}

                            {{-- monday --}}
                            <div class="row">
                                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                    <p>برنامه روز دوشنبه ( درصورت خالی بودن فیلدهااین روز غیر فعال میشود )</p>
                                </div>
                                <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
                                    <div class="form-group label-floating">
                                        <label class="control-label">ساعت شروع</label>
                                        <input class="form-control" placeholder="" type="time" name="day[monday][start]"
                                               value="{{ old('day[monday][start]', $officeScheduleConfigs['mon-start-time']) }}">
                                    </div>
                                </div>
                                <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
                                    <div class="form-group label-floating">
                                        <label class="control-label">ساعت پایان</label>
                                        <input class="form-control" placeholder="" type="time" name="day[monday][end]"
                                               value="{{ old('day[monday][end]', $officeScheduleConfigs['mon-finish-time']) }}">
                                    </div>
                                </div>
                            </div>
                            {{-- /monday --}}

                            {{-- tuesday --}}
                            <div class="row">
                                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                    <p>برنامه روز سه شنبه ( درصورت خالی بودن فیلدهااین روز غیر فعال میشود )</p>
                                </div>
                                <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
                                    <div class="form-group label-floating">
                                        <label class="control-label">ساعت شروع</label>
                                        <input class="form-control" placeholder="" type="time" name="day[tuesday][start]"
                                               value="{{ old('day[tuesday][start]', $officeScheduleConfigs['tues-start-time']) }}">
                                    </div>
                                </div>
                                <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
                                    <div class="form-group label-floating">
                                        <label class="control-label">ساعت پایان</label>
                                        <input class="form-control" placeholder="" type="time" name="day[tuesday][end]"
                                               value="{{ old('day[tuesday][end]', $officeScheduleConfigs['tues-finish-time']) }}">
                                    </div>
                                </div>
                            </div>
                            {{-- /tuesday --}}

                            {{-- wednesday --}}
                            <div class="row">
                                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                    <p>برنامه روز چهارشنبه ( درصورت خالی بودن فیلدهااین روز غیر فعال میشود )</p>
                                </div>
                                <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
                                    <div class="form-group label-floating">
                                        <label class="control-label">ساعت شروع</label>
                                        <input class="form-control" placeholder="" type="time" name="day[wednesday][start]"
                                               value="{{ old('day[wednesday][start]', $officeScheduleConfigs['wed-start-time']) }}">
                                    </div>
                                </div>
                                <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
                                    <div class="form-group label-floating">
                                        <label class="control-label">ساعت پایان</label>
                                        <input class="form-control" placeholder="" type="time" name="day[wednesday][end]"
                                               value="{{ old('day[wednesday][end]', $officeScheduleConfigs['wed-finish-time']) }}">
                                    </div>
                                </div>
                            </div>
                            {{-- /wednesday --}}

                            {{-- thursday --}}
                            <div class="row">
                                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                    <p>برنامه روز پنج شنبه ( درصورت خالی بودن فیلدهااین روز غیر فعال میشود )</p>
                                </div>
                                <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
                                    <div class="form-group label-floating">
                                        <label class="control-label">ساعت شروع</label>
                                        <input class="form-control" placeholder="" type="time" name="day[thursday][start]"
                                               value="{{ old('day[thursday][start]', $officeScheduleConfigs['thurs-start-time']) }}">
                                    </div>
                                </div>
                                <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
                                    <div class="form-group label-floating">
                                        <label class="control-label">ساعت پایان</label>
                                        <input class="form-control" placeholder="" type="time" name="day[thursday][end]"
                                               value="{{ old('day[thursday][end]', $officeScheduleConfigs['thurs-finish-time']) }}">
                                    </div>
                                </div>
                            </div>
                            {{-- /thursday --}}

                            {{-- friday --}}
                            <div class="row">
                                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                    <p>برنامه روز جمعه ( درصورت خالی بودن فیلدهااین روز غیر فعال میشود )</p>
                                </div>
                                <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
                                    <div class="form-group label-floating">
                                        <label class="control-label">ساعت شروع</label>
                                        <input class="form-control" placeholder="" type="time" name="day[friday][start]"
                                               value="{{ old('day[friday][start]', $officeScheduleConfigs['thurs-finish-time']) }}">
                                    </div>
                                </div>
                                <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
                                    <div class="form-group label-floating">
                                        <label class="control-label">ساعت پایان</label>
                                        <input class="form-control" placeholder="" type="time" name="day[friday][end]"
                                               value="{{ old('day[friday][end]') }}">
                                    </div>
                                </div>
                            </div>
                            {{-- /friday --}}

                            <div class="row">
                                <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
                                    <button class="btn btn-secondary btn-lg full-width">انصراف</button>
                                </div>
                                <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
                                    <button class="btn btn-primary btn-lg full-width">اعمال تغییرات</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- ... end Your Account اطلاعات شخصی =======================================-->

@endsection


