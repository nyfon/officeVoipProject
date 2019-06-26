@extends('user.master')

@section('content')
    <!-- Your Account Personal Information -->

    <div class="container">
        <div class="row">
            <div class="col col-xl-9 order-xl-2 col-lg-9 order-lg-2 col-md-12 order-md-1 col-sm-12 col-12">
                <div class="ui-block">
                    <div class="ui-block-title">
                        <h6 class="title">افزودن مطب</h6>
                    </div>
                    @include('user.partials.common.errors')
                    <div class="ui-block-content">
                        <form action="{{ route('doctor.office.store') }}" method="post">
                            @csrf
                            <div class="row">
                                <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
                                    <div class="form-group label-floating">
                                        <label class="control-label">نام مطب</label>
                                        <input class="form-control" placeholder="" name="officeName" type="text"
                                               value="{{ old('officeName') }}">
                                    </div>
                                </div>

                                <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
                                    <div class="form-group label-floating">
                                        <label class="control-label">شماره تماس</label>
                                        <input class="form-control" placeholder="" name="mobileTel" type="number"
                                               value="{{ old('mobileTel') }}">
                                    </div>
                                </div>

                                <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
                                    <div class="form-group label-floating is-select">
                                        <label class="control-label">نوع مطب</label>
                                        <select class="selectpicker form-control" name="officeType" size="auto">
                                            <option
                                                value="personalOffice" {{ (old('officeType') === 'personalOffice')? 'selected' : '' }} >
                                                مطب شخصی
                                            </option>
                                            <option
                                                value="clinic" {{ (old('officeType') === 'clinic')? 'selected' : '' }} >
                                                درمانگاه
                                            </option>
                                        </select>
                                    </div>
                                </div>

                                <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
                                    <div class="form-group label-floating is-select">
                                        <label class="control-label">شماره مجازی</label>
                                        <select class="selectpicker form-control" name="virtualNumber" size="auto">
                                            @foreach($virtualNumbers as $virtualNumber)
                                                <option value="{{ $virtualNumber->id }}">{{ $virtualNumber->virtual_number }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>

                                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                    <div class="form-group label-floating">
                                        <label class="control-label">ادرس 1</label>
                                        <input class="form-control" placeholder="" type="text" name="address1"
                                               value="{{ old('address1') }}">
                                    </div>
                                </div>

                                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                    <div class="form-group label-floating">
                                        <label class="control-label">ادرس 2</label>
                                        <input class="form-control" placeholder="" type="text" name="address2"
                                               value="{{ old('address2') }}">
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

            @include('user.partials.doctor.navbarPanelUser')
        </div>
    </div>

    <!-- ... end Your Account اطلاعات شخصی =======================================-->

@endsection
