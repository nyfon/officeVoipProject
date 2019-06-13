@extends('user.master')

@section('content')
    <!-- Your Account Personal Information -->

    <div class="container">
        <div class="row">
            <div class="col col-xl-9 order-xl-2 col-lg-9 order-lg-2 col-md-12 order-md-1 col-sm-12 col-12">
                <div class="ui-block">
                    <div class="ui-block-title">
                        <h6 class="title">سرویس ها</h6>
                    </div>
                    <div class="ui-block-content">
                        <form>
                            <div class="row">

                                <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                    @foreach($voipServices as $voipService)
                                        <div class="description-toggle">
                                            <div class="description-toggle-content">
                                                <div class="h6">{{ $voipService->service_name }}</div>
                                                <p>هر زمان اعلان داشتید ما به شما ایمیل میزنیم</p>
                                            </div>

                                            <div class="togglebutton">
                                                <span>
                                                    {{ number_format('600000') }} تومان
                                                </span>
                                                <label>

                                                    @if($voipService->id == 4)
                                                        <button type="button" class="btn btn-green">خریداری شده</button>
                                                    @else
                                                        <input type="checkbox" checked="">
                                                    @endif
                                                </label>
                                            </div>
                                        </div>
                                    @endforeach
                                </div>

                                <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
                                    <button class="btn btn-secondary btn-lg full-width">انصراف</button>
                                </div>
                                <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
                                    <button class="btn btn-green btn-lg full-width">پرداخت</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>

            </div>
            @include('user.partials.doctor.navbarCart', compact('office'))
        </div>
    </div>

    <!-- ... end Your Account اطلاعات شخصی =======================================-->

@endsection


