@extends('layouts.app')

@section('content')

    <div class="container">
        <div class="row display-flex justify-content-center">
            <div class="col col-xl-5 col-lg-6 col-md-12 col-sm-12 col-12">

                <!-- Login-Registration Form  -->

                <div class="registration-login-form">

                    <div class="title h6">ورود کاربر</div>

                    @if(count($errors) > 0)
                        <div class="alert alert-danger">
                            <ul>
                                @foreach($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif

                    <form class="content" action="{{ route('login') }}" method="post">
                        @csrf
                        <div class="row">
                            <div class="col col-12 col-xl-12 col-lg-12 col-md-12 col-sm-12">
                                <div class="form-group label-floating is-empty">
                                    <label class="control-label">کد ملی یا شماره تلفن</label>
                                    <input class="form-control" placeholder="" type="text" name="username" value="{{ old('username') }}" required autofocus>
                                </div>
                                <div class="form-group label-floating is-empty">
                                    <label class="control-label">رمز عبور</label>
                                    <input class="form-control" placeholder="" type="password" name="password" required>
                                </div>

                                <div class="remember">

                                    <div class="checkbox">
                                        <label>
                                            <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>
                                            بخاطر سپردن
                                        </label>
                                    </div>
                                    <a href="{{ route('password.show.phoneNumber') }}" class="forgot">فراموشی رمز عبور</a>
                                </div>

                                <button type="submit" class="btn btn-lg btn-primary full-width">ورود</button>


                                <p>افزودن حساب کاربری <a href="{{ route('register') }}">ثبت نام کنید !</a>از بهترین خدمات ما بهره مند شوید !</p>
                            </div>
                        </div>
                    </form>

                   {{-- <!-- Nav tabs -->
                    <ul class="nav nav-tabs" role="tablist">
                        <li class="nav-item">
                            <a class="nav-link active" data-toggle="tab" href="#home" role="tab">
                                <svg class="olymp-login-icon">
                                    <use xlink:href="/frontEnd/svg-icons/sprites/icons.svg#olymp-login-icon"></use>
                                </svg>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" data-toggle="tab" href="#profile" role="tab">
                                <svg class="olymp-register-icon">
                                    <use xlink:href="svg-icons/sprites/icons.svg#olymp-register-icon"></use>
                                </svg>
                            </a>
                        </li>
                    </ul>

                    <!-- Tab panes -->
                    <div class="tab-content">
                        <div class="tab-pane active" id="home" role="tabpanel" data-mh="log-tab">
                            <div class="title h6">ایجاد حساب کاربری در Olympus</div>
                            <form class="content">
                                <div class="row">
                                    <div class="col col-12 col-xl-6 col-lg-6 col-md-6 col-sm-12">
                                        <div class="form-group label-floating is-empty">
                                            <label class="control-label">نام</label>
                                            <input class="form-control" placeholder="" type="text">
                                        </div>
                                    </div>
                                    <div class="col col-12 col-xl-6 col-lg-6 col-md-6 col-sm-12">
                                        <div class="form-group label-floating is-empty">
                                            <label class="control-label">نام خانوادگی</label>
                                            <input class="form-control" placeholder="" type="text">
                                        </div>
                                    </div>
                                    <div class="col col-12 col-xl-12 col-lg-12 col-md-12 col-sm-12">
                                        <div class="form-group label-floating is-empty">
                                            <label class="control-label">آدرس پست الکترونیکی</label>
                                            <input class="form-control" placeholder="" type="email">
                                        </div>
                                        <div class="form-group label-floating is-empty">
                                            <label class="control-label">رمز عبور</label>
                                            <input class="form-control" placeholder="" type="password">
                                        </div>

                                        <div class="form-group date-time-picker label-floating">
                                            <label class="control-label">تاریخ تولد</label>
                                            <input type="text" id="date2" name="test" data-ha-datetimepicker="#date2" data-ha-dp-forcesettime="true" data-ha-dp-issolar="true" data-ha-dp-resultinsolar="true" data-ha-dp-disabledWeekDays="2,3,7" data-ha-dp-resultformat="{day}/{month}/{year}" value="1/6/1395" />
                                            <span class="input-group-addon">
                                                       <svg class="olymp-calendar-icon">
                                                           <use xlink:href="svg-icons/sprites/icons.svg#olymp-calendar-icon"></use>
                                                       </svg>
                                                   </span>
                                        </div>

                                        <div class="form-group label-floating is-select">
                                            <label class="control-label">جنسیت</label>
                                            <select class="selectpicker form-control">
                                                <option value="MA">آقا</option>
                                                <option value="FE">خانم</option>
                                            </select>
                                        </div>

                                        <div class="remember">
                                            <div class="checkbox">
                                                <label>
                                                    <input name="optionsCheckboxes" type="checkbox">
                                                    تمام <a href="#">شرایط و ضوابط</a> وبسایت را می پذیرم.
                                                </label>
                                            </div>
                                        </div>

                                        <a href="#" class="btn btn-purple btn-lg full-width">ایجاد حساب کاربری</a>
                                    </div>
                                </div>
                            </form>
                        </div>

                        <div class="tab-pane" id="profile" role="tabpanel" data-mh="log-tab">
                            <div class="title h6">ورود به حساب کاربری</div>
                            <form class="content">
                                <div class="row">
                                    <div class="col col-12 col-xl-12 col-lg-12 col-md-12 col-sm-12">
                                        <div class="form-group label-floating is-empty">
                                            <label class="control-label">ایمیل </label>
                                            <input class="form-control" placeholder="" type="email">
                                        </div>
                                        <div class="form-group label-floating is-empty">
                                            <label class="control-label">رمز عبور</label>
                                            <input class="form-control" placeholder="" type="password">
                                        </div>

                                        <div class="remember">

                                            <div class="checkbox">
                                                <label>
                                                    <input name="optionsCheckboxes" type="checkbox">
                                                    بخاطر سپردن
                                                </label>
                                            </div>
                                            <a href="#" class="forgot">دریافت رمز جدید</a>
                                        </div>

                                        <a href="#" class="btn btn-lg btn-primary full-width">ورود</a>

                                        <div class="or"></div>

                                        <a href="#" class="btn btn-lg bg-facebook full-width btn-icon-left"><i class="fa fa-facebook-f" aria-hidden="true"></i>ورود
                                            با فیسبوک</a>

                                        <a href="#" class="btn btn-lg bg-twitter full-width btn-icon-left"><i class="fa fa-twitter" aria-hidden="true"></i>ورود
                                            با توئیتر</a>


                                        <p>افزودن حساب کاربری <a href="#">ثبت نام کنید !</a>از بهترین خدمات ما بهره مند شوید !</p>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>--}}
                </div>

                <!-- ... end Login-Registration Form  -->
            </div>
        </div>
    </div>
{{--
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Login') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('login') }}">
                        @csrf

                        <div class="form-group row">
                            <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ old('email') }}" required autofocus>

                                @if ($errors->has('email'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Password') }}</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" required>

                                @if ($errors->has('password'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row">
                            <div class="col-md-6 offset-md-4">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>

                                    <label class="form-check-label" for="remember">
                                        {{ __('Remember Me') }}
                                    </label>
                                </div>
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-8 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Login') }}
                                </button>

                                @if (Route::has('password.request'))
                                    <a class="btn btn-link" href="{{ route('password.request') }}">
                                        {{ __('Forgot Your Password?') }}
                                    </a>
                                @endif
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>--}}
@endsection
