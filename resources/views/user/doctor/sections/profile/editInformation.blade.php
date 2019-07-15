@extends('user.doctor.master')

@section('content')
    <!-- Your Account Personal Information -->

    <div class="container">
        <div class="row">
            <div class="col col-xl-9 order-xl-2 col-lg-9 order-lg-2 col-md-12 order-md-1 col-sm-12 col-12">
                <div class="ui-block">
                    <div class="ui-block-title">
                        <h6 class="title">اطلاعات شخصی</h6>
                    </div>
                    @include('user.doctor.partials.errors')
                    <div class="ui-block-content">
                        <form action="{{ route('doctor.updateInformation') }}" method="post">
                            @csrf
                            <div class="row">
                                <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
                                    <div class="form-group label-floating">
                                        <label class="control-label">نام</label>
                                        <input class="form-control" placeholder="" name="name" type="text" {{ ($user->generalDoctor->name !== null)? 'value='.$user->generalDoctor->name  : '' }} >
                                    </div>

                                    <div class="form-group label-floating">
                                        <label class="control-label">ایمیل </label>
                                        <input class="form-control" placeholder="" name="mail" type="email" {{ ($user->generalDoctor->mail !== null)? 'value='.$user->generalDoctor->mail  : '' }} >
                                    </div>

                                    <div class="form-group label-floating is-empty">
                                        <label class="control-label">کد نظام پزشکی</label>
                                        <input class="form-control" placeholder="" type="text"  name="medicalSystemNumber" {{ ($user->generalDoctor->medical_system_number !== null)? 'value='.$user->generalDoctor->medical_system_number  : '' }}>
                                    </div>

                                </div>

                                <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
                                    <div class="form-group label-floating">
                                        <label class="control-label">نام خانوادگی</label>
                                        <input class="form-control" placeholder="" type="text" name="family" {{ ($user->generalDoctor->family !== null)? 'value='.$user->generalDoctor->family  : '' }} >
                                    </div>
                                </div>

                                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                    <div class="form-group label-floating">
                                        <label class="control-label">در مورد خودتان بنویسید</label>
                                        <textarea class="form-control" placeholder="" name="description">{{ $user->description ?? '' }}</textarea>
                                    </div>

                                </div>

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

            @include('user.doctor.partials.navbarPanelUser')
        </div>
    </div>

    <!-- ... end Your Account اطلاعات شخصی =======================================-->

@endsection
