@extends('user.doctor.master')

@section('content')
    <!-- Your Account Personal Information -->

    <div class="container">
        <div class="row">
            <div class="col col-xl-12 order-xl-2 col-lg-12 order-lg-2 col-md-12 order-md-1 col-sm-12 col-12">
                <div class="row">

                    <div class="col col-xl-3 col-lg-6 col-md-6 col-sm-6 col-6">

                        <!-- Friend Item -->

                        <div class="friend-item friend-groups create-group" data-mh="friend-groups-item">

                            <a href="#" class="  full-block" data-toggle="modal" data-target="#create-friend-group-1"></a>
                            <div class="content">

                                <a href="{{ route('doctor.office.create') }}" class="btn btn-control bg-blue" >
                                    <svg class="olymp-plus-icon">
                                        <use xlink:href="/frontEnd/svg-icons/sprites/icons.svg#olymp-plus-icon"></use>
                                    </svg>
                                </a>

                                <div class="author-content">
                                    <a href="{{ route('doctor.office.create') }}"  class="h5 author-name">افزودن مطب</a>
                                </div>

                            </div>

                        </div>

                        <!-- ... end Friend Item -->
                    </div>
                    @foreach($offices as $office)
                        <div class="col col-xl-3 col-lg-6 col-md-6 col-sm-6 col-6">
                        <div class="ui-block" data-mh="friend-groups-item">

                            <!-- Friend Item -->

                            <div class="friend-item friend-groups">

                                <div class="friend-item-content">

                                    <div class="more">

                                        <ul class="more-dropdown">
                                            <li>
                                                <a href="#">گزارش پروفایل</a>
                                            </li>
                                            <li>
                                                <a href="#">مسدود سازی</a>
                                            </li>
                                            <li>
                                                <a href="#">خاموش کردن اطلاعیه ها</a>
                                            </li>
                                        </ul>
                                    </div>
                                    <div class="friend-avatar">
                                        <div class="author-thumb clinic">
                                            <img src="{{ url('/frontEnd/img/icons8-hospital-100.png') }}" alt="{{ $office->office_name }}">
                                        </div>
                                        <div class="author-content">
                                            <a href="#" class="h5 author-name">{{ $office->office_name }}</a>
                                        </div>
                                    </div>

                                    <div class="control-block-button">
                                        <a href="{{ route('doctor.office.schedule.show' , $office) }}" class="btn btn-green">برنامه مطب</a>
                                        <a href="{{ route('doctor.office.edit' , $office) }}" class="btn btn-grey-lighter">ویرایش مطب</a>
                                    </div>
                                </div>
                            </div>

                            <!-- ... end Friend Item -->
                        </div>
                    </div>
                    @endforeach

                </div>

            </div>
        </div>
    </div>

    <!-- ... end Your Account اطلاعات شخصی =======================================-->

@endsection

