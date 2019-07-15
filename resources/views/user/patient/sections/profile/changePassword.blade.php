@extends('user.patient.master')

@section('content')
    <!-- Your Account Personal Information -->

    <div class="container">
        <div class="row">
            <div class="col col-xl-9 order-xl-2 col-lg-9 order-lg-2 col-md-12 order-md-1 col-sm-12 col-12">
                <div class="ui-block">
                    <div class="ui-block-title">
                        <h6 class="title">تعقییر رمز ورود</h6>
                    </div>
                    @include('user.patient.partials.errors')
                    <div class="ui-block-content">
                        <form action="{{ route('doctor.password.change') }}" method="post">
                            @csrf
                            <div class="row">
                                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                    <div class="form-group label-floating">
                                        <label class="control-label">رمز ورود قبلی</label>
                                        <input class="form-control" placeholder="" name="oldPassword" type="password" required >
                                    </div>

                                    <div class="form-group label-floating">
                                        <label class="control-label">رمز ورود جدید</label>
                                        <input class="form-control" placeholder="" name="password" type="password" required >
                                    </div>

                                    <div class="form-group label-floating is-empty">
                                        <label class="control-label">رمز ورود جدید تکرار</label>
                                        <input class="form-control" placeholder="" type="password"  name="password_confirmation" required>
                                    </div>

                                </div>

                                <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
                                    <button type="reset" class="btn btn-secondary btn-lg full-width">انصراف</button>
                                </div>
                                <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
                                    <button type="submit" class="btn btn-primary btn-lg full-width">اعمال تغییرات</button>
                                </div>

                            </div>
                        </form>
                    </div>
                </div>
            </div>

            @include('user.patient.patient.navbarPanelUser')
        </div>
    </div>

    <!-- ... end Your Account اطلاعات شخصی =======================================-->

@endsection
