@extends('user.patient.master')

@section('content')
    {{ auth()->user()->skillUserInfrmtion() }}
    <!-- Your Account Personal Information -->

    <div class="container">
        <div class="row">
            <div class="col col-xl-9 order-xl-2 col-lg-9 order-lg-2 col-md-12 order-md-1 col-sm-12 col-12">
                <div class="ui-block">
                    <div class="ui-block-title">
                        <h6 class="title">اطلاعات شخصی</h6>
                    </div>
                    @include('user.patient.partials.errors')
                    <div class="ui-block-content">
                        <form action="{{ route('patient.updateInformation') }}" method="post">
                            @csrf
                            <div class="row">
                                <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
                                    <div class="form-group label-floating">
                                        <label class="control-label">نام</label>
                                        <input class="form-control" placeholder="" name="name" type="text" {{ ($user->generalPatient->name !== null)? 'value='.$user->generalPatient->name  : '' }} >
                                    </div>

                                    <div class="form-group label-floating">
                                        <label class="control-label">شماره تماس </label>
                                        <input class="form-control" placeholder="وارد نشده" type="text" name="phoneNumber" {{ ($user->phone_number !== null)? 'value='.$user->normalizePhoneNumber()  : '' }}>
                                    </div>
                                </div>

                                <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
                                    <div class="form-group label-floating">
                                        <label class="control-label">نام خانوادگی</label>
                                        <input class="form-control" placeholder="" type="text" name="family" {{ ($user->generalPatient->family !== null)? 'value='.$user->generalPatient->family  : '' }} >
                                    </div>




                                </div>

                                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                    <div class="form-group label-floating">
                                        <label class="control-label">آدرس 1</label>
                                        <textarea class="form-control" placeholder="" name="description">{{ $user->description ?? '' }}</textarea>
                                    </div>
                                </div>


                                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                    <div class="form-group label-floating">
                                        <label class="control-label">آدرس 1</label>
                                        <textarea class="form-control" placeholder="" name="address1">{{ $user->generalPatient->address1 ?? '' }}</textarea>
                                    </div>
                                </div>

                                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                    <div class="form-group label-floating">
                                        <label class="control-label">آدرس 2</label>
                                        <textarea class="form-control" placeholder="" name="address2">{{ $user->generalPatient->address2 ?? '' }}</textarea>
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

            @include('user.patient.partials.navbarPanelUser')
        </div>
    </div>

    <!-- ... end Your Account اطلاعات شخصی =======================================-->

@endsection
