<!DOCTYPE html>
<html lang="en">

<!-- Mirrored from html.crumina.net/html-olympus/28-YourAccount-PersonalInformation.html by HTTrack Website Copier/3.x [XR&CO'2014], Wed, 02 Jan 2019 07:38:22 GMT -->

<head>

    <title>Your Account - Personal Information</title>

    <!-- Required meta tags always come first -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="x-ua-compatible" content="ie=edge">


    <!-- Bootstrap CSS -->
    <link rel="stylesheet" type="text/css" href="{{ url('/frontEnd/Bootstrap/dist/css/bootstrap-reboot.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ url('/frontEnd/Bootstrap/dist/css/bootstrap.css')}}">
    <link rel="stylesheet" type="text/css" href="{{ url('/frontEnd/Bootstrap/dist/css/bootstrap-grid.css')}}">
    <link rel="stylesheet" href="{{ url('css/sweetalert2.min.css') }}" type="text/css">
    <!-- Main Styles CSS -->
    <link rel="stylesheet" type="text/css" href="{{ url('/frontEnd/css/main.min.css')}}">


    <!-- Main Font -->
    <script src="{{ url('/frontEnd/js/webfontloader.min.js')}}"></script>
    <script>
        WebFont.load({
            google: {
                families: ['Roboto:300,400,500,700:latin']
            }
        });
    </script>

    @yield('css')


</head>

<body>

<!-- Profile Settings Responsive -->

<div class="profile-settings-responsive">

    <a href="#" class="js-profile-settings-open profile-settings-open">
        <i class="fa fa-angle-right" aria-hidden="true"></i>
        <i class="fa fa-angle-left" aria-hidden="true"></i>
    </a>
    <div class="mCustomScrollbar" data-mcs-theme="dark">
        <div class="ui-block">
            <div class="your-profile">
                <div class="ui-block-title ui-block-title-small">
                    <h6 class="title">پروفایل شما </h6>
                </div>

                <div id="accordion1" role="tablist" aria-multiselectable="true">
                    <div class="card">
                        <div class="card-header" role="tab" id="headingOne-1">
                            <h6 class="mb-0">
                                <a data-toggle="collapse" data-parent="#accordion" href="#collapseOne-1"
                                   aria-expanded="true" aria-controls="collapseOne">
                                    تنظیمات پروفایل
                                    <svg class="olymp-dropdown-arrow-icon">
                                        <use xlink:href="/frontEnd/icons/icons.svg#olymp-dropdown-arrow-icon"></use>
                                    </svg>
                                </a>
                            </h6>
                        </div>

                        <div id="collapseOne-1" class="collapse show" role="tabpanel" aria-labelledby="headingOne">
                            <ul class="your-profile-menu">
                                <li>
                                    <a href="28-YourAccount-PersonalInformation.html">اطلاعات شخصی</a>
                                </li>
                                <li>
                                    <a href="29-YourAccount-AccountSettings.html"> تنظیمات اکانت </a>
                                </li>
                                <li>
                                    <a href="30-YourAccount-ChangePassword.html">تغییر رمز عبور </a>
                                </li>
                                <li>
                                    <a href="31-YourAccount-HobbiesAndInterests.html">علایق و سرگرمی ها</a>
                                </li>
                                <li>
                                    <a href="32-YourAccount-EducationAndEmployement.html">تحصیلات و استخدام </a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>

                <div class="ui-block-title">
                    <a href="33-YourAccount-Notifications.html" class="h6 title">اعلانیه ها</a>
                    <a href="#" class="items-round-little bg-primary">8</a>
                </div>
                <div class="ui-block-title">
                    <a href="34-YourAccount-ChatMessages.html" class="h6 title">گفتگو / پیام ها </a>
                </div>
                <div class="ui-block-title">
                    <a href="35-YourAccount-FriendsRequests.html" class="h6 title">درخواست دوستی </a>
                    <a href="#" class="items-round-little bg-blue">4</a>
                </div>
                <div class="ui-block-title ui-block-title-small">
                    <h6 class="title"> صفحات مورد علاقه</h6>
                </div>
                <div class="ui-block-title">
                    <a href="36-FavPage-SettingsAndCreatePopup.html" class="h6 title">ساختن پیج مورد علاقه</a>
                </div>
                <div class="ui-block-title">
                    <a href="36-FavPage-SettingsAndCreatePopup.html" class="h6 title">تنظیمات پیج مورد علاقه</a>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- ... end Profile Settings Responsive -->


<!-- Fixed Sidebar Left -->

<div class="fixed-sidebar open">
    <div class="fixed-sidebar-left sidebar--small" id="sidebar-left">

        <a href="02-ProfilePage.html" class="logo">
            <div class="img-wrap">
                <img src="{{ url('/frontEnd/img/logo.png') }}" alt="Olympus">
            </div>
        </a>

        <div class="mCustomScrollbar" data-mcs-theme="dark">
            <ul class="left-menu">
                <li>
                    <a href="#" class="js-sidebar-open">
                        <svg class="olymp-menu-icon left-menu-icon" data-toggle="tooltip" data-placement="right"
                             data-original-title="بازکردن منو">
                            <use xlink:href="/frontEnd/svg-icons/sprites/icons.svg#olymp-menu-icon"></use>
                        </svg>
                    </a>
                </li>
                <li>
                    <a href="03-Newsfeed.html">
                        <svg class="olymp-newsfeed-icon left-menu-icon" data-toggle="tooltip" data-placement="right"
                             data-original-title="بخش مطب">
                            <use xlink:href="/frontEnd/svg-icons/sprites/icons.svg#olymp-stats-icon"></use>
                        </svg>
                    </a>
                </li>
                <li>
                    <a href="16-FavPagesFeed.html">
                        <svg class="olymp-star-icon left-menu-icon" data-toggle="tooltip" data-placement="right"
                             data-original-title="صفحه علاقه مندی ها">
                            <use xlink:href="/frontEnd/svg-icons/sprites/icons.svg#olymp-star-icon"></use>
                        </svg>
                    </a>
                </li>
                <li>
                    <a href="17-FriendGroups.html">
                        <svg class="olymp-happy-faces-icon left-menu-icon" data-toggle="tooltip" data-placement="right"
                             data-original-title="گروه های دوستان">
                            <use xlink:href="/frontEnd/svg-icons/sprites/icons.svg#olymp-happy-faces-icon"></use>
                        </svg>
                    </a>
                </li>
                <li>
                    <a href="18-MusicAndPlaylists.html">
                        <svg class="olymp-headphones-icon left-menu-icon" data-toggle="tooltip" data-placement="right"
                             data-original-title="موسیقی ها و لیست پخش">
                            <use xlink:href="/frontEnd/svg-icons/sprites/icons.svg#olymp-headphones-icon"></use>
                        </svg>
                    </a>
                </li>
                <li>
                    <a href="19-WeatherWidget.html">
                        <svg class="olymp-weather-icon left-menu-icon" data-toggle="tooltip" data-placement="right"
                             data-original-title="برنامه آب وهوا">
                            <use xlink:href="/frontEnd/svg-icons/sprites/icons.svg#olymp-weather-icon"></use>
                        </svg>
                    </a>
                </li>
                <li>
                    <a href="20-CalendarAndEvents-MonthlyCalendar.html">
                        <svg class="olymp-calendar-icon left-menu-icon" data-toggle="tooltip" data-placement="right"
                             data-original-title="تقویم و رویدادها">
                            <use xlink:href="/frontEnd/svg-icons/sprites/icons.svg#olymp-calendar-icon"></use>
                        </svg>
                    </a>
                </li>
                <li>
                    <a href="24-CommunityBadges.html">
                        <svg class="olymp-badge-icon left-menu-icon" data-toggle="tooltip" data-placement="right"
                             data-original-title="مدالهای کاربری">
                            <use xlink:href="/frontEnd/svg-icons/sprites/icons.svg#olymp-badge-icon"></use>
                        </svg>
                    </a>
                </li>
                <li>
                    <a href="25-FriendsBirthday.html">
                        <svg class="olymp-cupcake-icon left-menu-icon" data-toggle="tooltip" data-placement="right"
                             data-original-title="گروه های دوستان">
                            <use xlink:href="/frontEnd/svg-icons/sprites/icons.svg#olymp-cupcake-icon"></use>
                        </svg>
                    </a>
                </li>
                <li>
                    <a href="26-Statistics.html">
                        <svg class="olymp-stats-icon left-menu-icon" data-toggle="tooltip" data-placement="right"
                             data-original-title="وضعیت حساب">
                            <use xlink:href="/frontEnd/svg-icons/sprites/icons.svg#olymp-stats-icon"></use>
                        </svg>
                    </a>
                </li>
                <li>
                    <a href="27-ManageWidgets.html">
                        <svg class="olymp-manage-widgets-icon left-menu-icon" data-toggle="tooltip"
                             data-placement="right"
                             data-original-title="مدیریت ابزارها ">
                            <use xlink:href="/frontEnd/svg-icons/sprites/icons.svg#olymp-manage-widgets-icon"></use>
                        </svg>
                    </a>
                </li>
            </ul>
        </div>
    </div>

    <div class="fixed-sidebar-left sidebar--large" id="sidebar-left-1">
        <a href="02-ProfilePage.html" class="logo">
            <div class="img-wrap">
                <img src="{{ url('/frontEnd/img/logo.png')}}" alt="Olympus">
            </div>
            <div class="title-block">
                <h6 class="logo-title">olympus</h6>
            </div>
        </a>

        <div class="mCustomScrollbar" data-mcs-theme="dark">
            <ul class="left-menu">
                <li>
                    <a href="#" class="js-sidebar-open">
                        <svg class="olymp-close-icon left-menu-icon">
                            <use xlink:href="/frontEnd/svg-icons/sprites/icons.svg#olymp-close-icon"></use>
                        </svg>
                        <span class="left-menu-title">بستن منو</span>
                    </a>
                </li>
                <li>
                    <a href="{{ route('doctor.office.index') }}">
                        <svg class="olymp-newsfeed-icon left-menu-icon" data-toggle="tooltip" data-placement="right"
                             data-original-title="بخش مطب">
                            <use xlink:href="/frontEnd/svg-icons/sprites/icons.svg#olymp-stats-icon"></use>
                        </svg>
                        <span class="left-menu-title">بخش مطب</span>
                    </a>
                </li>

                <li>
                    <a href="{{ route('doctor.ticket.index') }}">
                        <svg class="olymp-newsfeed-icon left-menu-icon" data-toggle="tooltip" data-placement="right"
                             data-original-title="بخش مطب">
                            <use xlink:href="/frontEnd/svg-icons/sprites/icons.svg#olymp-stats-icon"></use>
                        </svg>
                        <span class="left-menu-title">بخش سوالات</span>
                    </a>
                </li>

                <li>
                    <a href="{{ route('doctor.virtualNumber.index') }}">
                        <svg class="olymp-star-icon left-menu-icon" data-toggle="tooltip" data-placement="right"
                             data-original-title="شماره  مجازی">
                            <use xlink:href="/frontEnd/svg-icons/sprites/icons.svg#olymp-star-icon"></use>
                        </svg>
                        <span class="left-menu-title">شماره  مجازی</span>
                    </a>
                </li>
                <li>
                    <a href="{{ route('doctor.schedule.index') }}">
                        <svg class="olymp-happy-faces-icon left-menu-icon" data-toggle="tooltip" data-placement="right"
                             data-original-title="برنامه کاری">
                            <use xlink:href="/frontEnd/svg-icons/sprites/icons.svg#olymp-calendar-icon"></use>
                        </svg>
                        <span class="left-menu-title">برنامه کاری</span>
                    </a>
                </li>
            </ul>

            <div class="profile-completion">

                <div class="skills-item">
                    <div class="skills-item-info">
                        <span class="skills-item-title">تکميل مشخصات کاربري</span>
                        <span class="skills-item-count">
								<span class="count-animate" data-speed="1000" data-refresh-interval="50" data-to="{{ auth()->user()->skillUserInfrmtion() }}"
                                      data-from="0"></span>
								<span class="units">{{ auth()->user()->skillUserInfrmtion() }}%</span></span>
                    </div>
                    <div class="skills-item-meter">
                        <span class="skills-item-meter-active bg-primary" style="width: {{ auth()->user()->skillUserInfrmtion() }}%"></span>
                    </div>
                </div>

                <span>اطلاعات
						<a href="{{ route('doctor.editInformation') }}">حساب کاربري</a> را تکميل کنيد تا کاربران بتوانند شما را براحتي پيدا کنند!</span>

            </div>
        </div>
    </div>
</div>

<!-- ... end Fixed Sidebar Left -->


<!-- Fixed Sidebar Left -->

<div class="fixed-sidebar fixed-sidebar-responsive">

    <div class="fixed-sidebar-left sidebar--small" id="sidebar-left-responsive">
        <a href="#" class="logo js-sidebar-open">
            <img src="{{ url('/frontEnd/img/logo.png')}}" alt="Olympus">
        </a>

    </div>

    <div class="fixed-sidebar-left sidebar--large" id="sidebar-left-1-responsive">
        <a href="#" class="logo">
            <div class="img-wrap">
                <img src="{{ url('/frontEnd/img/logo.png')}}" alt="Olympus">
            </div>
            <div class="title-block">
                <h6 class="logo-title">olympus</h6>
            </div>
        </a>

        <div class="mCustomScrollbar" data-mcs-theme="dark">

            <div class="control-block">
                <div class="author-page author vcard inline-items">
                    <div class="author-thumb">
                        <img alt="author" src="{{ url('/frontEnd/img/author-page.jpg')}}" class="avatar">
                        <span class="icon-status online"></span>
                    </div>
                    <a href="02-ProfilePage.html" class="author-name fn">
                        <div class="author-title">
                            فاطمه کاظمي زاده
                            <svg class="olymp-dropdown-arrow-icon">
                                <use xlink:href="/frontEnd/svg-icons/sprites/icons.svg#olymp-dropdown-arrow-icon"></use>
                            </svg>
                        </div>
                        <span class="author-subtitle">درحال کار</span>
                    </a>
                </div>
            </div>

            <div class="ui-block-title ui-block-title-small">
                <h6 class="title">بخش اصلي</h6>
            </div>

            <ul class="left-menu">
                <li>
                    <a href="#" class="js-sidebar-open">
                        <svg class="olymp-close-icon left-menu-icon">
                            <use xlink:href="/frontEnd/svg-icons/sprites/icons.svg#olymp-close-icon"></use>
                        </svg>
                        <span class="left-menu-title">بستن منو</span>
                    </a>
                </li>
                <li>
                    <a href="mobile-index.html">
                        <svg class="olymp-newsfeed-icon left-menu-icon" data-toggle="tooltip" data-placement="right"
                             data-original-title="NEWSFEED">
                            <use xlink:href="/frontEnd/svg-icons/sprites/icons.svg#olymp-newsfeed-icon"></use>
                        </svg>
                        <span class="left-menu-title">اخبار و اطلاعيه ها</span>
                    </a>
                </li>
                <li>
                    <a href="Mobile-28-YourAccount-PersonalInformation.html">
                        <svg class="olymp-star-icon left-menu-icon" data-toggle="tooltip" data-placement="right"
                             data-original-title="FAV PAGE">
                            <use xlink:href="/frontEnd/svg-icons/sprites/icons.svg#olymp-star-icon"></use>
                        </svg>
                        <span class="left-menu-title">صفحات علاقه مندي ها</span>
                    </a>
                </li>
                <li>
                    <a href="mobile-29-YourAccount-AccountSettings.html">
                        <svg class="olymp-happy-faces-icon left-menu-icon" data-toggle="tooltip" data-placement="right"
                             data-original-title="FRIEND GROUPS">
                            <use xlink:href="/frontEnd/svg-icons/sprites/icons.svg#olymp-happy-faces-icon"></use>
                        </svg>
                        <span class="left-menu-title">گروه هاي دوستان</span>
                    </a>
                </li>
                <li>
                    <a href="Mobile-30-YourAccount-ChangePassword.html">
                        <svg class="olymp-headphones-icon left-menu-icon" data-toggle="tooltip" data-placement="right"
                             data-original-title="MUSIC&PLAYLISTS">
                            <use xlink:href="/frontEnd/svg-icons/sprites/icons.svg#olymp-headphones-icon"></use>
                        </svg>
                        <span class="left-menu-title">موسيقي ها و ليست پخش</span>
                    </a>
                </li>
                <li>
                    <a href="Mobile-31-YourAccount-HobbiesAndInterests.html">
                        <svg class="olymp-weather-icon left-menu-icon" data-toggle="tooltip" data-placement="right"
                             data-original-title="WEATHER APP">
                            <use xlink:href="/frontEnd/svg-icons/sprites/icons.svg#olymp-weather-icon"></use>
                        </svg>
                        <span class="left-menu-title">برنامه آب و هوا</span>
                    </a>
                </li>
                <li>
                    <a href="Mobile-32-YourAccount-EducationAndEmployement.html">
                        <svg class="olymp-calendar-icon left-menu-icon" data-toggle="tooltip" data-placement="right"
                             data-original-title="CALENDAR AND EVENTS">
                            <use xlink:href="/frontEnd/svg-icons/sprites/icons.svg#olymp-calendar-icon"></use>
                        </svg>
                        <span class="left-menu-title">تقويم و رويدادها</span>
                    </a>
                </li>
                <li>
                    <a href="Mobile-33-YourAccount-Notifications.html">
                        <svg class="olymp-badge-icon left-menu-icon" data-toggle="tooltip" data-placement="right"
                             data-original-title="Community Badges">
                            <use xlink:href="/frontEnd/svg-icons/sprites/icons.svg#olymp-badge-icon"></use>
                        </svg>
                        <span class="left-menu-title">مدال هاي کاربري</span>
                    </a>
                </li>
                <li>
                    <a href="Mobile-34-YourAccount-ChatMessages.html">
                        <svg class="olymp-cupcake-icon left-menu-icon" data-toggle="tooltip" data-placement="right"
                             data-original-title="Friends Birthdays">
                            <use xlink:href="/frontEnd/svg-icons/sprites/icons.svg#olymp-cupcake-icon"></use>
                        </svg>
                        <span class="left-menu-title">تولد دوستان</span>
                    </a>
                </li>
                <li>
                    <a href="Mobile-35-YourAccount-FriendsRequests.html">
                        <svg class="olymp-stats-icon left-menu-icon" data-toggle="tooltip" data-placement="right"
                             data-original-title="Account Stats">
                            <use xlink:href="/frontEnd/svg-icons/sprites/icons.svg#olymp-stats-icon"></use>
                        </svg>
                        <span class="left-menu-title">وضعيت حساب</span>
                    </a>
                </li>
                <li>
                    <a href="#">
                        <svg class="olymp-manage-widgets-icon left-menu-icon" data-toggle="tooltip"
                             data-placement="right"
                             data-original-title="Manage Widgets">
                            <use xlink:href="/frontEnd/svg-icons/sprites/icons.svg#olymp-manage-widgets-icon"></use>
                        </svg>
                        <span class="left-menu-title">مديريت ابزارها</span>
                    </a>
                </li>
            </ul>

            <div class="ui-block-title ui-block-title-small">
                <h6 class="title">مديريت ابزارها</h6>
            </div>

            <ul class="account-settings">
                <li>
                    <a href="#">

                        <svg class="olymp-menu-icon">
                            <use xlink:href="/frontEnd/svg-icons/sprites/icons.svg#olymp-menu-icon"></use>
                        </svg>

                        <span>تنظيمات حساب کاربري</span>
                    </a>
                </li>
                <li>
                    <a href="#">
                        <svg class="olymp-star-icon left-menu-icon" data-toggle="tooltip" data-placement="right"
                             data-original-title="FAV PAGE">
                            <use xlink:href="/frontEnd/svg-icons/sprites/icons.svg#olymp-star-icon"></use>
                        </svg>

                        <span>ايجاد صفحه علاثه مندي ها</span>
                    </a>
                </li>
                <li>
                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                        {{ csrf_field() }}
                        <button type="submit">
                            <svg class="olymp-logout-icon">
                                <use xlink:href="/frontEnd/svg-icons/sprites/icons.svg#olymp-logout-icon"></use>
                            </svg>
                            <span>خروج</span>
                        </button>
                    </form>
                </li>
            </ul>

            <div class="ui-block-title ui-block-title-small">
                <h6 class="title">درباره Olympus</h6>
            </div>

            <ul class="about-olympus">
                <li>
                    <a href="#">
                        <span>شرايط و ظوابط</span>
                    </a>
                </li>
                <li>
                    <a href="#">
                        <span>سوالات متداول</span>
                    </a>
                </li>
                <li>
                    <a href="#">
                        <span>فرصت هاي شغلي</span>
                    </a>
                </li>
                <li>
                    <a href="#">
                        <span>تماس با ما</span>

                    </a>
                </li>
            </ul>

        </div>
    </div>
</div>

<!-- ... end Fixed Sidebar Left -->


<!-- ... end Fixed Sidebar Right -->
<!-- Fixed Sidebar Right -->
<div class="fixed-sidebar right fixed-sidebar-responsive">
    <div class="fixed-sidebar-right sidebar--small" id="sidebar-right-responsive">
        <a href="#" class="olympus-chat inline-items js-chat-open">
            <svg class="olymp-chat---messages-icon">
                <use xlink:href="/frontEnd/icons/icons.svg#olymp-chat---messages-icon"></use>
            </svg>
        </a>
    </div>
</div>
<!-- ... end Fixed Sidebar Right -->
<!-- Header -->
<header class="header" id="site-header">
    <div class="header-content-wrapper">

        <div class="control-block">
            <div class="author-page author vcard inline-items more">
                <div class="author-thumb">
                    <img alt="author" src="{{ url('/frontEnd/img/generic-user-purple.png') }}" class="avatar">
                    <span class="icon-status online"></span>
                    <div class="more-dropdown more-with-triangle">
                        <div class="mCustomScrollbar" data-mcs-theme="dark">
                            <div class="ui-block-title ui-block-title-small">
                                <h6 class="title">حساب کاربری</h6>
                            </div>
                            <ul class="account-settings">
                                <li>
                                    <a href="{{ route('doctor.editInformation') }}">
                                        <svg class="olymp-menu-icon">
                                            <use xlink:href="/frontEnd/icons/icons.svg#olymp-menu-icon"></use>
                                        </svg>
                                        <span>ویرایش پروفایل</span>
                                    </a>
                                </li>
                                <li>
                                    <form id="logout-form" action="{{ route('logout') }}" method="POST">
                                        {{ csrf_field() }}
                                        <button type="submit">
                                            <svg class="olymp-logout-icon">
                                                <use xlink:href="/frontEnd/icons/icons.svg#olymp-logout-icon"></use>
                                            </svg>
                                            <span>خروج</span>
                                        </button>
                                    </form>
                                </li>
                            </ul>

                            <div class="ui-block-title ui-block-title-small">
                                <h6 class="title">درباره Olympus</h6>
                            </div>
                            <ul>
                                <li>
                                    <a href="#">
                                        <span>شرایط و ضوابط</span>
                                    </a>
                                </li>
                                <li>
                                    <a href="#">
                                        <span>سوالات متداول</span>
                                    </a>
                                </li>
                                <li>
                                    <a href="#">
                                        <span>فرصت های شغلی</span>
                                    </a>
                                </li>
                                <li>
                                    <a href="#">
                                        <span>تماس با ما</span>
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
                <a href="02-ProfilePage.html" class="author-name fn">
                    <div class="author-title">
                        {{ auth()->user()->doctorFullName() }}
                        <svg class="olymp-dropdown-arrow-icon">
                            <use xlink:href="/frontEnd/icons/icons.svg#olymp-dropdown-arrow-icon"></use>
                        </svg>
                    </div>
                </a>
            </div>
        </div>
    </div>
</header>
<!-- ... end Header -->
<!-- Responsive Header -->
<header class="header header-responsive" id="site-header-responsive">
    <div class="header-content-wrapper">
        <ul class="nav nav-tabs mobile-app-tabs" role="tablist">
            <li class="nav-item">
                <a class="nav-link" data-toggle="tab" href="#request" role="tab">
                    <div class="control-icon has-items">
                        <svg class="olymp-happy-face-icon">
                            <use xlink:href="/frontEnd/icons/icons.svg#olymp-happy-face-icon"></use>
                        </svg>
                        <div class="label-avatar bg-blue">6</div>
                    </div>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" data-toggle="tab" href="#chat" role="tab">
                    <div class="control-icon has-items">
                        <svg class="olymp-chat---messages-icon">
                            <use xlink:href="/frontEnd/icons/icons.svg#olymp-chat---messages-icon"></use>
                        </svg>
                        <div class="label-avatar bg-purple">2</div>
                    </div>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" data-toggle="tab" href="#notification" role="tab">
                    <div class="control-icon has-items">
                        <svg class="olymp-thunder-icon">
                            <use xlink:href="/frontEnd/icons/icons.svg#olymp-thunder-icon"></use>
                        </svg>
                        <div class="label-avatar bg-primary">8</div>
                    </div>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" data-toggle="tab" href="#search" role="tab">
                    <svg class="olymp-magnifying-glass-icon">
                        <use xlink:href="/frontEnd/icons/icons.svg#olymp-magnifying-glass-icon"></use>
                    </svg>
                    <svg class="olymp-close-icon">
                        <use xlink:href="/frontEnd/icons/icons.svg#olymp-close-icon"></use>
                    </svg>
                </a>
            </li>
        </ul>
    </div>
    <!-- Tab panes -->
    <div class="tab-content tab-content-responsive">
        <div class="tab-pane " id="request" role="tabpanel">
            <div class="mCustomScrollbar" data-mcs-theme="dark">
                <div class="ui-block-title ui-block-title-small">
                    <h6 class="title">درخواست های دوستان</h6>
                    <a href="#">یافتن دوستان</a>
                    <a href="#">تنظیمات</a>
                </div>
                <ul class="notification-list friend-requests">
                    <li>
                        <div class="author-thumb">
                            <img src="img/avatar55-sm.jpg" alt="author">
                        </div>
                        <div class="notification-event">
                            <a href="#" class="h6 notification-friend">محمد محمدی زاده</a>
                            <span class="chat-message-item">دوست متقابل: فاطمه کاظمی زاده</span>
                        </div>
                        <span class="notification-icon">
								<a href="#" class="accept-request">
									<span class="icon-add without-text">
										<svg class="olymp-happy-face-icon">
											<use xlink:href="/frontEnd/icons/icons.svg#olymp-happy-face-icon"></use>
										</svg>
									</span>
								</a>
								<a href="#" class="accept-request request-del">
									<span class="icon-minus">
										<svg class="olymp-happy-face-icon">
											<use xlink:href="/frontEnd/icons/icons.svg#olymp-happy-face-icon"></use>
										</svg>
									</span>
								</a>
							</span>
                        <div class="more">
                            <svg class="olymp-three-dots-icon">
                                <use xlink:href="/frontEnd/icons/icons.svg#olymp-three-dots-icon"></use>
                            </svg>
                        </div>
                    </li>
                    <li>
                        <div class="author-thumb">
                            <img src="img/avatar56-sm.jpg" alt="author">
                        </div>
                        <div class="notification-event">
                            <a href="#" class="h6 notification-friend">زهرا باقری</a>
                            <span class="chat-message-item">4 دوست مشترک</span>
                        </div>
                        <span class="notification-icon">
								<a href="#" class="accept-request">
									<span class="icon-add without-text">
										<svg class="olymp-happy-face-icon">
											<use xlink:href="/frontEnd/icons/icons.svg#olymp-happy-face-icon"></use>
										</svg>
									</span>
								</a>
								<a href="#" class="accept-request request-del">
									<span class="icon-minus">
										<svg class="olymp-happy-face-icon">
											<use xlink:href="/frontEnd/icons/icons.svg#olymp-happy-face-icon"></use>
										</svg>
									</span>
								</a>
							</span>
                        <div class="more">
                            <svg class="olymp-three-dots-icon">
                                <use xlink:href="/frontEnd/icons/icons.svg#olymp-three-dots-icon"></use>
                            </svg>
                        </div>
                    </li>
                    <li class="accepted">
                        <div class="author-thumb">
                            <img src="img/avatar57-sm.jpg" alt="author">
                        </div>
                        <div class="notification-event">
                            شما و <a href="#" class="h6 notification-friend">دلآرام</a> اکنون دوست هستید. برروی<a
                                href="#" class="notification-link">دیوار</a>
                            او چیزی بنویسید.
                        </div>
                        <span class="notification-icon">
								<svg class="olymp-happy-face-icon">
									<use xlink:href="/frontEnd/icons/icons.svg#olymp-happy-face-icon"></use>
								</svg>
							</span>
                        <div class="more">
                            <svg class="olymp-three-dots-icon">
                                <use xlink:href="/frontEnd/icons/icons.svg#olymp-three-dots-icon"></use>
                            </svg>
                            <svg class="olymp-little-delete">
                                <use xlink:href="/frontEnd/icons/icons.svg#olymp-little-delete"></use>
                            </svg>
                        </div>
                    </li>
                    <li>
                        <div class="author-thumb">
                            <img src="img/avatar58-sm.jpg" alt="author">
                        </div>
                        <div class="notification-event">
                            <a href="#" class="h6 notification-friend">آزاده اسلامی</a>
                            <span class="chat-message-item">9 دوست مشترک</span>
                        </div>
                        <span class="notification-icon">
								<a href="#" class="accept-request">
									<span class="icon-add without-text">
										<svg class="olymp-happy-face-icon">
											<use xlink:href="/frontEnd/icons/icons.svg#olymp-happy-face-icon"></use>
										</svg>
									</span>
								</a>
								<a href="#" class="accept-request request-del">
									<span class="icon-minus">
										<svg class="olymp-happy-face-icon">
											<use xlink:href="/frontEnd/icons/icons.svg#olymp-happy-face-icon"></use>
										</svg>
									</span>
								</a>
							</span>
                        <div class="more">
                            <svg class="olymp-three-dots-icon">
                                <use xlink:href="/frontEnd/icons/icons.svg#olymp-three-dots-icon"></use>
                            </svg>
                        </div>
                    </li>
                </ul>
                <a href="#" class="view-all bg-blue">بررسی همه رویداد ها</a>
            </div>
        </div>
        <div class="tab-pane " id="chat" role="tabpanel">
            <div class="mCustomScrollbar" data-mcs-theme="dark">
                <div class="ui-block-title ui-block-title-small">
                    <h6 class="title">چت / پیامها</h6>
                    <a href="#">تنظیم به عنوان خوانده شده</a>
                    <a href="#">تنظیمات</a>
                </div>
                <ul class="notification-list chat-message">
                    <li class="message-unread">
                        <div class="author-thumb">
                            <img src="img/avatar59-sm.jpg" alt="author">
                        </div>
                        <div class="notification-event">
                            <a href="#" class="h6 notification-friend">محمد کریمی فرد</a>
                            <span class="chat-message-item">سلام جیمز! این دیانا است، من فقط می خواستم به شما اطلاع دهم که ما مجبوریم
									برنامه ریزی کنیم ...</span>
                            <span class="notification-date"><time class="entry-date updated"
                                                                  datetime="2004-07-24T18:18">4 ساعت قبل</time></span>
                        </div>
                        <span class="notification-icon">
								<svg class="olymp-chat---messages-icon">
									<use xlink:href="/frontEnd/icons/icons.svg#olymp-chat---messages-icon"></use>
								</svg>
							</span>
                        <div class="more">
                            <svg class="olymp-three-dots-icon">
                                <use xlink:href="/frontEnd/icons/icons.svg#olymp-three-dots-icon"></use>
                            </svg>
                        </div>
                    </li>
                    <li>
                        <div class="author-thumb">
                            <img src="img/avatar60-sm.jpg" alt="author">
                        </div>
                        <div class="notification-event">
                            <a href="#" class="h6 notification-friend">فاطمه منصور نژاد</a>
                            <span class="chat-message-item">خیلی عالیه، فردا شما را ملاقات خواهم کرد.</span>
                            <span class="notification-date"><time class="entry-date updated"
                                                                  datetime="2004-07-24T18:18">4 ساعت قبل</time></span>
                        </div>
                        <span class="notification-icon">
								<svg class="olymp-chat---messages-icon">
									<use xlink:href="/frontEnd/icons/icons.svg#olymp-chat---messages-icon"></use>
								</svg>
							</span>
                        <div class="more">
                            <svg class="olymp-three-dots-icon">
                                <use xlink:href="/frontEnd/icons/icons.svg#olymp-three-dots-icon"></use>
                            </svg>
                        </div>
                    </li>
                    <li>
                        <div class="author-thumb">
                            <img src="img/avatar61-sm.jpg" alt="author">
                        </div>
                        <div class="notification-event">
                            <a href="#" class="h6 notification-friend">زهرا ساداتی</a>
                            <span class="chat-message-item">سلام امروز هوا چطور است؟</span>
                            <span class="notification-date"><time class="entry-date updated"
                                                                  datetime="2004-07-24T18:18">دیروز 9:56pm</time></span>
                        </div>
                        <span class="notification-icon">
								<svg class="olymp-chat---messages-icon">
									<use xlink:href="/frontEnd/icons/icons.svg#olymp-chat---messages-icon"></use>
								</svg>
							</span>
                        <div class="more">
                            <svg class="olymp-three-dots-icon">
                                <use xlink:href="/frontEnd/icons/icons.svg#olymp-three-dots-icon"></use>
                            </svg>
                        </div>
                    </li>
                    <li class="chat-group">
                        <div class="author-thumb">
                            <img src="img/avatar11-sm.jpg" alt="author">
                            <img src="img/avatar12-sm.jpg" alt="author">
                            <img src="img/avatar13-sm.jpg" alt="author">
                            <img src="img/avatar10-sm.jpg" alt="author">
                        </div>
                        <div class="notification-event">
                            <a href="#" class="h6 notification-friend">شما, فاطمه, زهرا &amp; محدثه +3</a>
                            <span class="last-message-author">محدثه:</span>
                            <span class="chat-message-item">بله همه چیز تحت کنترل است!</span>
                            <span class="notification-date"><time class="entry-date updated"
                                                                  datetime="2004-07-24T18:18">12 اردیبهشت
										10:23am</time></span>
                        </div>
                        <span class="notification-icon">
								<svg class="olymp-chat---messages-icon">
									<use xlink:href="/frontEnd/icons/icons.svg#olymp-chat---messages-icon"></use>
								</svg>
							</span>
                        <div class="more">
                            <svg class="olymp-three-dots-icon">
                                <use xlink:href="/frontEnd/icons/icons.svg#olymp-three-dots-icon"></use>
                            </svg>
                        </div>
                    </li>
                </ul>
                <a href="#" class="view-all bg-purple">مشاهده تمام پیام ها</a>
            </div>
        </div>
        <div class="tab-pane " id="notification" role="tabpanel">
            <div class="mCustomScrollbar" data-mcs-theme="dark">
                <div class="ui-block-title ui-block-title-small">
                    <h6 class="title">اطلاعیه ها</h6>
                    <a href="#">تنظیم به عنوان خوانده شده</a>
                    <a href="#">تنظیمات</a>
                </div>
                <ul class="notification-list">
                    <li>
                        <div class="author-thumb">
                            <img src="img/avatar62-sm.jpg" alt="author">
                        </div>
                        <div class="notification-event">
                            <div><a href="#" class="h6 notification-friend">کاظمی زاده</a> یک نظر جدید در <a href="#"
                                                                                                             class="notification-link">استاتوس
                                    پروفایل</a> شما ارسال کرد.
                            </div>
                            <span class="notification-date"><time class="entry-date updated"
                                                                  datetime="2004-07-24T18:18">4 ساعت قبل</time></span>
                        </div>
                        <span class="notification-icon">
								<svg class="olymp-comments-post-icon">
									<use xlink:href="/frontEnd/icons/icons.svg#olymp-comments-post-icon"></use>
								</svg>
							</span>
                        <div class="more">
                            <svg class="olymp-three-dots-icon">
                                <use xlink:href="/frontEnd/icons/icons.svg#olymp-three-dots-icon"></use>
                            </svg>
                            <svg class="olymp-little-delete">
                                <use xlink:href="/frontEnd/icons/icons.svg#olymp-little-delete"></use>
                            </svg>
                        </div>
                    </li>
                    <li class="un-read">
                        <div class="author-thumb">
                            <img src="img/avatar63-sm.jpg" alt="author">
                        </div>
                        <div class="notification-event">
                            <div> و شما <a href="#" class="h6 notification-friend">نادیا قربانی زاده</a> اکنون دوست
                                شماست!
                            </div>
                            <span class="notification-date"><time class="entry-date updated"
                                                                  datetime="2004-07-24T18:18">9 ساعت قبل</time></span>
                        </div>
                        <span class="notification-icon">
								<svg class="olymp-happy-face-icon">
									<use xlink:href="/frontEnd/icons/icons.svg#olymp-happy-face-icon"></use>
								</svg>
							</span>
                        <div class="more">
                            <svg class="olymp-three-dots-icon">
                                <use xlink:href="/frontEnd/icons/icons.svg#olymp-three-dots-icon"></use>
                            </svg>
                            <svg class="olymp-little-delete">
                                <use xlink:href="/frontEnd/icons/icons.svg#olymp-little-delete"></use>
                            </svg>
                        </div>
                    </li>
                    <li class="with-comment-photo">
                        <div class="author-thumb">
                            <img src="img/avatar64-sm.jpg" alt="author">
                        </div>
                        <div class="notification-event">
                            <div><a href="#" class="h6 notification-friend">سارا عدالت پور</a> یک نظر جدید در<a href="#"
                                                                                                                class="notification-link">عکس</a>
                                ارسال کرد.
                            </div>
                            <span class="notification-date"><time class="entry-date updated"
                                                                  datetime="2004-07-24T18:18">دیروز 10:25</time></span>
                        </div>
                        <span class="notification-icon">
								<svg class="olymp-comments-post-icon">
									<use xlink:href="/frontEnd/icons/icons.svg#olymp-comments-post-icon"></use>
								</svg>
							</span>
                        <div class="comment-photo">
                            <img src="img/comment-photo1.jpg" alt="photo">
                            <span>“این عکس عالی به نظر میرسه.. عالیه..!”</span>
                        </div>
                        <div class="more">
                            <svg class="olymp-three-dots-icon">
                                <use xlink:href="/frontEnd/icons/icons.svg#olymp-three-dots-icon"></use>
                            </svg>
                            <svg class="olymp-little-delete">
                                <use xlink:href="/frontEnd/icons/icons.svg#olymp-little-delete"></use>
                            </svg>
                        </div>
                    </li>
                    <li>
                        <div class="author-thumb">
                            <img src="img/avatar65-sm.jpg" alt="author">
                        </div>
                        <div class="notification-event">
                            <div><a href="#" class="h6 notification-friend">باقری</a> از شما در رویداد <a href="#"
                                                                                                          class="notification-link">تالار
                                    گفتمان
                                </a> دعوت نمود.
                            </div>
                            <span class="notification-date"><time class="entry-date updated"
                                                                  datetime="2004-07-24T18:18">28 اردیبهشت 8:29</time></span>
                        </div>
                        <span class="notification-icon">
								<svg class="olymp-happy-face-icon">
									<use xlink:href="/frontEnd/icons/icons.svg#olymp-happy-face-icon"></use>
								</svg>
							</span>
                        <div class="more">
                            <svg class="olymp-three-dots-icon">
                                <use xlink:href="/frontEnd/icons/icons.svg#olymp-three-dots-icon"></use>
                            </svg>
                            <svg class="olymp-little-delete">
                                <use xlink:href="/frontEnd/icons/icons.svg#olymp-little-delete"></use>
                            </svg>
                        </div>
                    </li>
                    <li>
                        <div class="author-thumb">
                            <img src="img/avatar66-sm.jpg" alt="author">
                        </div>
                        <div class="notification-event">
                            <div><a href="#" class="h6 notification-friend">کاظمی زاده</a>درباره <a href="#"
                                                                                                    class="notification-link">استاتوس
                                    پروفایل</a> یک نظر جدید ارسال کرد.
                            </div>
                            <span class="notification-date"><time class="entry-date updated"
                                                                  datetime="2004-07-24T18:18">28 اردیبهشت 8:29</time></span>
                        </div>
                        <span class="notification-icon">
								<svg class="olymp-heart-icon">
									<use xlink:href="/frontEnd/icons/icons.svg#olymp-heart-icon"></use>
								</svg>
							</span>
                        <div class="more">
                            <svg class="olymp-three-dots-icon">
                                <use xlink:href="/frontEnd/icons/icons.svg#olymp-three-dots-icon"></use>
                            </svg>
                            <svg class="olymp-little-delete">
                                <use xlink:href="/frontEnd/icons/icons.svg#olymp-little-delete"></use>
                            </svg>
                        </div>
                    </li>
                </ul>
                <a href="#" class="view-all bg-primary">مشاهده تمام اطلاعیه ها</a>
            </div>

        </div>


    </div>
    <!-- ... end  Tab panes -->

</header>

<!-- ... end Responsive Header-BP -->
<div class="header-spacer header-spacer-small"></div>



<!-- ... end Main Header Account -->

<!-- ... end Responsive Header-BP -->
<div class="header-spacer header-spacer-small"></div>
