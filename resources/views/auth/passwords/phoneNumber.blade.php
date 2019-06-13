@extends('layouts.app')

@section('content')

    <div class="container">
        <div class="row display-flex">
            <div class="col col-xl-6 col-lg-6 col-md-12 col-sm-12 col-12">
                <div class="landing-content">
                    <h1>به بزرگترین و کامل ترین شبکه اجتماعی خوش آمدید!</h1>
                    <p>ما بهترین و بزرگترین شبکه اجتماعی با 5 میلیارد کاربر فعال در سراسر جهان هستیم. به اشتراک گذاشتن
                        افکار خود، نوشتن پست های وبلاگ، نشان دادن موسیقی مورد علاقه خود را از طریق کسب مدالها و امکانات دیگر..!
                    </p>
                    <a href="{{ route('register' , 'user') }}" class="btn btn-md btn-border c-white">ثبت نام کنید!</a>
                </div>
            </div>

            <div class="col col-xl-5 col-lg-6 col-md-12 col-sm-12 col-12">

                <!-- Login-Registration Form  -->

                <div class="registration-login-form">

                    <div class="title h6">فراموشی رمز عبور</div>

                    @if(count($errors) > 0)
                        <div class="alert alert-danger">
                            <ul>
                                @foreach($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif

                    <form class="content" action="{{ route('password.phoneNumber') }}" method="post">
                        @csrf
                        <div class="row">
                            <div class="col col-12 col-xl-12 col-lg-12 col-md-12 col-sm-12">
                                <div class="form-group label-floating is-empty">
                                    <label class="control-label">شماره تماس</label>
                                    <input class="form-control" placeholder="" type="text" name="phoneNumber" value="{{ old('phoneNumber') }}" required autofocus>
                                </div>
                                <button type="submit" class="btn btn-lg btn-primary full-width">ارسال</button>
                                <p>افزودن حساب کاربری <a href="{{ route('register') }}">ثبت نام کنید !</a>از بهترین خدمات ما بهره مند شوید !</p>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
