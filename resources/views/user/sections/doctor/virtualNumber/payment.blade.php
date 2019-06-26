@extends('user.master')

@section('content')
    <!-- Your Account Personal Information -->

    <div class="container">
        <div class="row">
            <div class="col col-xl-12 col-lg-12 col-md-12  col-sm-12 col-12">
                <div class="ui-block">
                    <div class="ui-block-title">
                        <h6 class="title">تکمیل پرداخت</h6>
                    </div>
                    <div class="ui-block-content">
                        <div class="row">
                            <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
                                <ul class="widget w-personal-info item-block">
                                    <li>
                                        <span class="title">نام کاربری :</span>
                                        <span class="text">{{ auth()->user()->username }}</span>
                                    </li>

                                    <li>
                                        <span class="title">مبلغ کل خرید :</span>
                                        <span class="text">{{ $purchases->total }}</span>
                                    </li>
                                </ul>
                            </div>

                            <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
                                <ul class="widget w-personal-info item-block">
                                    <li>
                                        <span class="title">شماره تلفن کاربر :</span>
                                        <span class="text">{{ auth()->user()->phone_number }}</span>
                                    </li>
                                    <li>
                                        <span class="title">تاریخ خرید:</span>
                                        <span class="text">{{ \Morilog\Jalali\Jalalian::fromDateTime($purchases->time)  }}</span>
                                    </li>
                                </ul>
                            </div>
                        </div>
                        <div class="row justify-content-center">
                            <a href="{{ route('doctor.virtualNumber.index') }}" class="btn btn-md-2 btn-border-think btn-transparent c-grey ">انصراف</a>
                            <form action="{{ route('doctor.virtualNumber.complete.buy.service') }}" method="post">
                                @csrf
                                <input type="hidden" name="purchase" value="{{ $purchases->id }}">
                                <button type="submit" class="btn btn-green btn-md-2 mr-2">پرداخت</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- ... end Your Account اطلاعات شخصی =======================================-->

@endsection

@section('css')
    <style>

        .title{
            font-size: 0.8rem;
        }

        .text{
            font-size: 1.3rem;
        }
    </style>

@endsection
