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
                    <a href="{{ route('register.show' , 'user') }}" class="btn btn-md btn-border c-white">ثبت نام کنید!</a>
                </div>
            </div>

            <div class="col col-xl-5 col-lg-6 col-md-12 col-sm-12 col-12">

                <!-- Login-Registration Form  -->

                <div class="registration-login-form">

                    <div class="title h6">ایجاد حساب کاربری</div>

                    @if(count($errors) > 0)
                        <div class="alert alert-danger">
                            <ul>
                                @foreach($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif

                    <form class="content" method="post" action="{{ route('register') }}">
                        @csrf
                        <div class="row">
                            <div class="col col-12 col-xl-12 col-lg-12 col-md-12 col-sm-12">
                                <div class="form-group label-floating">
                                    <label class="control-label">کد ملی</label>
                                    <input class="form-control" placeholder="" name="username" type="number"  required>
                                </div>
                                @if ($errors->has('username'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('username') }}</strong>
                                    </span>
                                @endif

                            </div>

                            <div class="col col-12 col-xl-12 col-lg-12 col-md-12 col-sm-12">
                                <div class="form-group label-floating">
                                    <label class="control-label">شماره تلفن</label>
                                    <input class="form-control" placeholder="" name="phone_number" type="number"  required>
                                </div>
                                @if ($errors->has('phone_number'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('phone_number') }}</strong>
                                    </span>
                                @endif

                            </div>

                            <div class="col col-12 col-xl-12 col-lg-12 col-md-12 col-sm-12">
                                <div class="form-group label-floating">
                                    <label class="control-label">رمز ورود</label>
                                    <input class="form-control" placeholder="" name="password" type="password" required>
                                </div>
                                @if ($errors->has('password'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif

                            </div>

                            <div class="col col-12 col-xl-12 col-lg-12 col-md-12 col-sm-12">
                                <div class="form-group label-floating">
                                    <label class="control-label">تکرار رمز ورود</label>
                                    <input class="form-control" placeholder="" type="password" name="password_confirmation" required>
                                </div>
                            </div>

                            <div class="col col-12 col-xl-12 col-lg-12 col-md-12 col-sm-12">
                                <div class="remember">
                                    <div class="checkbox">
                                        <label>
                                            <input name="optionsCheckboxes" type="checkbox">
                                            تمام <a href="#">شرایط و ضوابط</a> وبسایت را می پذیرم.
                                        </label>
                                    </div>
                                    @if ($errors->has('optionsCheckboxes'))
                                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('optionsCheckboxes') }}</strong>
                                    </span>
                                    @endif
                                </div>
                                <input type="hidden" value="{{ $userType }}" name="userType">
                                <button type="submit" class="btn btn-purple btn-lg full-width">ایجاد حساب کاربری</button>
                            </div>
                        </div>
                    </form>

                </div>

                <!-- ... end Login-Registration Form  -->
            </div>
        </div>
    </div>

@endsection
