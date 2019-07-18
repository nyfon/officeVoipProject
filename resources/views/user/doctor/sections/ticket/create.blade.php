@extends('user.doctor.master')

@section('content')

    <!-- Your Account Personal Information -->

    <div class="container">
        <div class="row">
            <div class="col col-xl-12 order-xl-2 col-lg-9 order-lg-2 col-md-12 order-md-1 col-sm-12 col-12">
                <div class="ui-block">
                    <div class="ui-block-title">
                        <h6 class="title"></h6>
                    </div>
                    @include('user.doctor.partials.errors')
                    <div class="ui-block-content">
                        <form action="{{ route('doctor.ticket.store') }}" method="post">
                            @csrf
                            <div class="row">

                                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                    <div class="form-group">
                                        <label class="control-label">عنوان سوال</label>
                                        <input class="form-control" placeholder="عنوان سوال را وارد کنید." type="text" name="title"
                                               value="{{ old('title') }}">
                                    </div>
                                </div>

                            </div>

                            <div class="row">

                                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                    <div class="form-group">
                                        <label class="control-label">متن سوال</label>
                                        <textarea class="form-control" placeholder="متن سوال را وارد کنید." name="content">{{ old('content') }}</textarea>
                                    </div>
                                </div>

                            </div>


                            <div class="row">

                                <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">

                                    <div class="form-group label-floating is-select">
                                        <label class="control-label">دسته بندی</label>
                                        <select class="selectpicker form-control" size="auto" name="category">
                                            @foreach($categories as $category)
                                                <option value="{{ $category->id }}">{{ $category->title }}</option>
                                            @endforeach
                                        </select>
                                    </div>

                                </div>

                                <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">

                                    <div class="form-group label-floating is-select">
                                        <label class="control-label">فوریت</label>
                                        <select class="selectpicker form-control" size="auto" name="urgency">
                                            <option value="nonsignificant">بی اهمیت</option>
                                            <option value="medium">عادی</option>
                                            <option value="instantaneous">فوری</option>
                                        </select>
                                    </div>

                                </div>


                            </div>
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


