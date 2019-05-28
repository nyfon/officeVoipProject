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
                    <a href="{{ route('register') }}" class="btn btn-md btn-border c-white">ثبت نام کنید!</a>
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
                                <div class="form-group label-floating is-empty">
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
                                <div class="form-group label-floating is-empty">
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
                                <div class="form-group label-floating is-empty">
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
                                <div class="form-group label-floating is-empty">
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

                                <button type="submit" class="btn btn-purple btn-lg full-width">ایجاد حساب کاربری</button>
                            </div>
                        </div>
                    </form>

                    {{--   <!-- Nav tabs -->
                       <ul class="nav nav-tabs" role="tablist">
                           <li class="nav-item">
                               <a class="nav-link active" data-toggle="tab" href="#home" role="tab">
                                   <svg class="olymp-login-icon">
                                       <use xlink:href="svg-icons/sprites/icons.svg#olymp-login-icon"></use>
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

@endsection
