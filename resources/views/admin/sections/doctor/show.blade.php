@extends('admin.master')


@section('content')
    <!-- Page Content -->
    <div class="page-content">
        <!-- Page Breadcrumb -->
        <div class="page-breadcrumbs">
            <ul class="breadcrumb">
                <li>
                    <i class="fa fa-home"></i>
                    <a href="#">Home</a>
                </li>
                <li>
                    <a href="{{ route('admin.doctor.index') }}">پزشکان</a>
                </li>
                <li class="active">{{ $user->username }}</li>
            </ul>
        </div>
        <!-- /Page Breadcrumb -->
        <!-- Page Header -->
        <div class="page-header position-relative">
            <!--Header Buttons-->
            <div class="header-buttons">
                <a class="sidebar-toggler" href="#">
                    <i class="fa fa-arrows-h"></i>
                </a>
                <a class="refresh" id="refresh-toggler" href="">
                    <i class="glyphicon glyphicon-refresh"></i>
                </a>
                <a class="fullscreen" id="fullscreen-toggler" href="#">
                    <i class="glyphicon glyphicon-fullscreen"></i>
                </a>
            </div>
            <!--Header Buttons End-->
        </div>
        <!-- /Page Header -->
        <!-- Page Body -->
        <div class="page-body">
            <div class="row">
                <div class="col-md-12">
                    <div class="profile-container">
                        <div class="profile-header row">
                            <div class="col-lg-2 col-md-4 col-sm-12 text-center">
                                <img src="assets/img/avatars/divyia.jpg" alt="" class="header-avatar"/>
                            </div>
                            <div class="col-lg-5 col-md-8 col-sm-12 profile-info">
                                <div class="header-fullname">Kim Ryder</div>
                                <a href="#" class="btn btn-info btn-sm  btn-follow">
                                    {{ $user->isStatusFarsi() }}
                                </a>
                                <div class="header-information">
                                    {{ $user->description ?? 'وارد نشده' }}
                                </div>
                            </div>
                            <div class="col-lg-5 col-md-12 col-sm-12 col-xs-12 profile-stats">
                                <div class="row">
                                    <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12 stats-col">
                                        <div class="stats-value pink">284</div>
                                        <div class="stats-title">FOLLOWING</div>
                                    </div>
                                    <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12 stats-col">
                                        <div class="stats-value pink">803</div>
                                        <div class="stats-title">FOLLOWERS</div>
                                    </div>
                                    <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12 stats-col">
                                        <div class="stats-value pink">1207</div>
                                        <div class="stats-title">POSTS</div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-lg-4 col-md-4 col-sm-4 col-xs-4 inlinestats-col">
                                        <i class="glyphicon glyphicon-map-marker"></i> Boston
                                    </div>
                                    <div class="col-lg-4 col-md-4 col-sm-4 col-xs-4 inlinestats-col">
                                        Rate: <strong>$250</strong>
                                    </div>
                                    <div class="col-lg-4 col-md-4 col-sm-4 col-xs-4 inlinestats-col">
                                        Age: <strong>24</strong>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="profile-body">
                            <div class="col-lg-12">
                                <div class="tabbable">
                                    <ul class="nav nav-tabs tabs-flat  nav-justified" id="myTab11">
                                        <li class="active">
                                            <a data-toggle="tab" href="#overview">
                                                Overview
                                            </a>
                                        </li>
                                        <li class="tab-red">
                                            <a data-toggle="tab" href="#timeline">
                                                Events
                                            </a>
                                        </li>
                                        <li class="tab-palegreen">
                                            <a data-toggle="tab" id="contacttab" href="#contacts">
                                                Contacts
                                            </a>
                                        </li>
                                        <li class="tab-yellow">
                                            <a data-toggle="tab" href="#settings">
                                                ویرایش اطلاعات
                                            </a>
                                        </li>
                                    </ul>
                                    <div class="tab-content tabs-flat">
                                        <div id="overview" class="tab-pane active">
                                            <div class="row profile-overview">
                                                <div class="col-md-8">
                                                    <h6 class="row-title before-themeprimary no-margin-top">PROFILE
                                                        VISITS</h6>
                                                    <div id="visit-chart" class="chart"></div>
                                                    <h6 class="row-title before-orange">FOLLOWERS</h6>
                                                    <div class="row">
                                                        <div class="col-lg-4 col-sm-6 col-xs-12">
                                                            <div class="databox databox-graded">
                                                                <div class="databox-left no-padding">
                                                                    <img src="assets/img/avatars/Javi-Jimenez.jpg"
                                                                         style="width:65px; height:65px;">
                                                                </div>
                                                                <div class="databox-right padding-top-20 bg-whitesmoke">
                                                                    <div class="databox-stat orange radius-bordered">
                                                                        <i class="stat-icon glyphicon glyphicon-remove"></i>
                                                                    </div>
                                                                    <div class="databox-text darkgray">JAVI
                                                                        JIMENEZ
                                                                    </div>
                                                                    <div class="databox-text darkgray">Manager</div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-lg-4 col-sm-6 col-xs-12">
                                                            <div class="databox databox-graded">
                                                                <div class="databox-left no-padding">
                                                                    <img src="assets/img/avatars/adam-jansen.jpg"
                                                                         style="width:65px; height:65px;">
                                                                </div>
                                                                <div class="databox-right padding-top-20 bg-whitesmoke">
                                                                    <div class="databox-stat palegreen radius-bordered">
                                                                        <i class="stat-icon glyphicon glyphicon-plus"></i>
                                                                    </div>
                                                                    <div class="databox-text darkgray">LEE MUNROE
                                                                    </div>
                                                                    <div class="databox-text darkgray">Developer
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-lg-4 col-sm-6 col-xs-12">
                                                            <div class="databox databox-graded">
                                                                <div class="databox-left no-padding">
                                                                    <img src="assets/img/avatars/Nicolai-Larson.jpg"
                                                                         style="width:65px; height:65px;">
                                                                </div>
                                                                <div class="databox-right padding-top-20 bg-whitesmoke">
                                                                    <div class="databox-stat palegreen radius-bordered">
                                                                        <i class="stat-icon glyphicon glyphicon-plus"></i>
                                                                    </div>
                                                                    <div class="databox-text darkgray">NICOLAI
                                                                        LARSON
                                                                    </div>
                                                                    <div class="databox-text darkgray">Manager</div>
                                                                </div>
                                                            </div>
                                                        </div>

                                                    </div>
                                                    <h6 class="row-title before-palegreen">FOLLOWING</h6>
                                                    <div class="row">
                                                        <div class="col-lg-4 col-sm-6 col-xs-12">
                                                            <div class="databox databox-graded">
                                                                <div class="databox-left no-padding">
                                                                    <img src="assets/img/avatars/John-Smith.jpg"
                                                                         style="width:65px; height:65px;">
                                                                </div>
                                                                <div class="databox-right padding-top-20 bg-whitesmoke">
                                                                    <div class="databox-stat orange radius-bordered">
                                                                        <i class="stat-icon glyphicon glyphicon-remove"></i>
                                                                    </div>
                                                                    <div class="databox-text darkgray">JOHN SMITH
                                                                    </div>
                                                                    <div class="databox-text darkgray">Architect
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-lg-4 col-sm-6 col-xs-12">
                                                            <div class="databox databox-graded">
                                                                <div class="databox-left no-padding">
                                                                    <img src="assets/img/avatars/Matt-Cheuvront.jpg"
                                                                         style="width:65px; height:65px;">
                                                                </div>
                                                                <div class="databox-right padding-top-20 bg-whitesmoke">
                                                                    <div class="databox-stat palegreen radius-bordered">
                                                                        <i class="stat-icon glyphicon glyphicon-plus"></i>
                                                                    </div>
                                                                    <div class="databox-text darkgray">MATT
                                                                        CHEUVRONT
                                                                    </div>
                                                                    <div class="databox-text darkgray">Developer
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-lg-4 col-sm-6 col-xs-12">
                                                            <div class="databox databox-graded">
                                                                <div class="databox-left no-padding">
                                                                    <img src="assets/img/avatars/Stephanie-Walter.jpg"
                                                                         style="width:65px; height:65px;">
                                                                </div>
                                                                <div class="databox-right padding-top-20 bg-whitesmoke">
                                                                    <div class="databox-stat orange radius-bordered">
                                                                        <i class="stat-icon glyphicon glyphicon-remove"></i>
                                                                    </div>
                                                                    <div class="databox-text darkgray">KATE WALTER
                                                                    </div>
                                                                    <div class="databox-text darkgray">Developer
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>

                                                    </div>
                                                    <h6 class="row-title before-yellow">YOU MAY ALSO KNOW</h6>
                                                    <div class="row">
                                                        <div class="col-lg-6 col-sm-6 col-xs-12">
                                                            <div class="databox databox-xlg databox-halved databox-shadowed databox-vertical no-margin-bottom">
                                                                <div class="databox-top bg-white padding-10">
                                                                    <div class="col-lg-4 col-sm-4 col-xs-4">
                                                                        <img src="assets/img/avatars/Sergey-Azovskiy.jpg"
                                                                             style="width:75px; height:75px;"
                                                                             class="image-circular bordered-3 bordered-palegreen">
                                                                    </div>
                                                                    <div class="col-lg-8 col-sm-8 col-xs-8 text-align-left padding-10">
                                                                        <span class="databox-header carbon no-margin">Martin James</span>
                                                                        <span class="databox-text lightcarbon no-margin"> Software Manager at Microsoft </span>
                                                                    </div>
                                                                </div>
                                                                <div class="databox-bottom bg-white no-padding">
                                                                    <div class="databox-row row-12">
                                                                        <div class="databox-row row-6 no-padding">
                                                                            <div class="databox-cell cell-4 no-padding text-align-center bordered-right bordered-platinum">
                                                                                <span class="databox-text sonic-silver  no-margin">Posts</span>
                                                                                <span class="databox-number lightcarbon no-margin">510</span>
                                                                            </div>
                                                                            <div class="databox-cell cell-4 no-padding text-align-center bordered-right bordered-platinum">
                                                                                <span class="databox-text sonic-silver no-margin">Followers</span>
                                                                                <span class="databox-number lightcarbon no-margin">908</span>
                                                                            </div>
                                                                            <div class="databox-cell cell-4 no-padding text-align-center">
                                                                                <span class="databox-text sonic-silver no-margin">Following</span>
                                                                                <span class="databox-number lightcarbon no-margin">286</span>
                                                                            </div>
                                                                        </div>
                                                                        <div class="databox-row row-6 padding-10">
                                                                            <button class="btn btn-palegreen btn-sm pull-right">
                                                                                FOLLOW
                                                                            </button>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-lg-6 col-sm-6 col-xs-12">
                                                            <div class="databox databox-xlg databox-halved databox-shadowed databox-vertical no-margin-bottom">
                                                                <div class="databox-top bg-white padding-10">
                                                                    <div class="col-lg-4 col-sm-4 col-xs-4">
                                                                        <img src="assets/img/avatars/Osvaldus-Valutis.jpg"
                                                                             style="width:75px; height:75px;"
                                                                             class="image-circular bordered-3 bordered-palegreen">
                                                                    </div>
                                                                    <div class="col-lg-8 col-sm-8 col-xs-8 text-align-left padding-10">
                                                                        <span class="databox-header carbon no-margin">Osvaldus Valutis</span>
                                                                        <span class="databox-text lightcarbon no-margin"> Graphic Designer at Yahoo! </span>
                                                                    </div>
                                                                </div>
                                                                <div class="databox-bottom bg-white no-padding">
                                                                    <div class="databox-row row-12">
                                                                        <div class="databox-row row-6 no-padding">
                                                                            <div class="databox-cell cell-4 no-padding text-align-center bordered-right bordered-platinum">
                                                                                <span class="databox-text sonic-silver  no-margin">Posts</span>
                                                                                <span class="databox-number lightcarbon no-margin">102</span>
                                                                            </div>
                                                                            <div class="databox-cell cell-4 no-padding text-align-center bordered-right bordered-platinum">
                                                                                <span class="databox-text sonic-silver no-margin">Followers</span>
                                                                                <span class="databox-number lightcarbon no-margin">634</span>
                                                                            </div>
                                                                            <div class="databox-cell cell-4 no-padding text-align-center">
                                                                                <span class="databox-text sonic-silver no-margin">Following</span>
                                                                                <span class="databox-number lightcarbon no-margin">100</span>
                                                                            </div>
                                                                        </div>
                                                                        <div class="databox-row row-6 padding-10">
                                                                            <button class="btn btn-palegreen btn-sm pull-right">
                                                                                FOLLOW
                                                                            </button>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-4">
                                                    <form method="post" class="well padding-bottom-10"
                                                          onsubmit="return false;">
                                                                <span class="input-icon icon-right">
                                                                    <textarea rows="2" class="form-control"
                                                                              placeholder="Post a new message"></textarea>
                                                                    <i class="fa fa-camera themeprimary"></i>
                                                                </span>
                                                        <div class="padding-top-10 text-align-right">
                                                            <a class="btn btn-sm btn-primary">
                                                                Send
                                                            </a>
                                                        </div>
                                                    </form>
                                                    <div>
                                                        <div class="comment">
                                                            <img src="assets/img/avatars/adam-jansen.jpg" alt=""
                                                                 class="comment-avatar">
                                                            <div class="comment-body">
                                                                <div class="comment-text">
                                                                    <div class="comment-header">
                                                                        <a href="#" title="">Adam Jansen</a><span>about 2 minuts ago</span>
                                                                    </div>
                                                                    Story based around the idea of time lapse,
                                                                    animation to post soon!
                                                                </div>
                                                                <div class="comment-footer">
                                                                    <a href="#"><i
                                                                            class="fa fa-thumbs-o-up"></i></a>
                                                                    <a href="#"><i class="fa fa-thumbs-o-down"></i></a>
                                                                    <a href="#">Reply</a>
                                                                </div>
                                                            </div>

                                                            <div class="comment">
                                                                <img src="assets/img/avatars/John-Smith.jpg" alt=""
                                                                     class="comment-avatar">
                                                                <div class="comment-body">
                                                                    <div class="comment-text">
                                                                        <div class="comment-header">
                                                                            <a href="#" title="">John
                                                                                Smith</a><span>about 1 hour ago</span>
                                                                        </div>
                                                                        Wow impressive!
                                                                    </div>
                                                                    <div class="comment-footer">
                                                                        <a href="#"><i
                                                                                class="fa fa-thumbs-o-up"></i></a>
                                                                        <a href="#"><i
                                                                                class="fa fa-thumbs-o-down"></i></a>
                                                                        <a href="#">Reply</a>
                                                                    </div>
                                                                </div>
                                                            </div>

                                                            <div class="comment">
                                                                <img src="assets/img/avatars/Matt-Cheuvront.jpg"
                                                                     alt="" class="comment-avatar">
                                                                <div class="comment-body">
                                                                    <div class="comment-text">
                                                                        <div class="comment-header">
                                                                            <a href="#" title="">Matt
                                                                                Cheuvront</a><span>about 2 hours ago</span>
                                                                        </div>
                                                                        Wow, that is really nice.
                                                                    </div>
                                                                    <div class="comment-footer">
                                                                        <a href="#"><i
                                                                                class="fa fa-thumbs-o-up"></i></a>
                                                                        <a href="#"><i
                                                                                class="fa fa-thumbs-o-down"></i></a>
                                                                        <a href="#">Reply</a>
                                                                    </div>
                                                                </div>

                                                                <div class="comment">
                                                                    <img src="assets/img/avatars/Stephanie-Walter.jpg"
                                                                         alt="" class="comment-avatar">
                                                                    <div class="comment-body">
                                                                        <div class="comment-text">
                                                                            <div class="comment-header">
                                                                                <a href="#" title="">Stephanie
                                                                                    Walter</a><span>3 hours ago</span>
                                                                            </div>
                                                                            Nice work, makes me think of The Money
                                                                            Pit.
                                                                        </div>
                                                                        <div class="comment-footer">
                                                                            <a href="#"><i
                                                                                    class="fa fa-thumbs-o-up"></i></a>
                                                                            <a href="#"><i
                                                                                    class="fa fa-thumbs-o-down"></i></a>
                                                                            <a href="#">Reply</a>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="comment">
                                                            <img src="assets/img/avatars/divyia.jpg" alt=""
                                                                 class="comment-avatar">
                                                            <div class="comment-body">
                                                                <div class="comment-text">
                                                                    <div class="comment-header">
                                                                        <a href="#" title="">Kim Ryder</a><span>about 4 hours ago</span>
                                                                    </div>
                                                                    i'm in the middle of a timelapse animation
                                                                    myself! (Very different though.) Awesome stuff.
                                                                </div>
                                                                <div class="comment-footer">
                                                                    <a href="#"><i
                                                                            class="fa fa-thumbs-o-up"></i></a>
                                                                    <a href="#"><i class="fa fa-thumbs-o-down"></i></a>
                                                                    <a href="#">Reply</a>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="comment">
                                                            <img src="assets/img/avatars/Nicolai-Larson.jpg" alt=""
                                                                 class="comment-avatar">
                                                            <div class="comment-body">
                                                                <div class="comment-text">
                                                                    <div class="comment-header">
                                                                        <a href="#" title="">Nicolai
                                                                            Larson</a><span>10 hours ago</span>
                                                                    </div>
                                                                    the parallax is a little odd but O.o that house
                                                                    build is awesome!!
                                                                </div>
                                                                <div class="comment-footer">
                                                                    <a href="#"><i
                                                                            class="fa fa-thumbs-o-up"></i></a>
                                                                    <a href="#"><i class="fa fa-thumbs-o-down"></i></a>
                                                                    <a href="#">Reply</a>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div id="timeline" class="tab-pane">
                                            <ul class="timeline animated fadeInDown">
                                                <li>
                                                    <div class="timeline-datetime">
                                                                <span class="timeline-time">
                                                                    8:19
                                                                </span><span class="timeline-date">Today</span>
                                                    </div>
                                                    <div class="timeline-badge blue">
                                                        <i class="fa fa-tag"></i>
                                                    </div>
                                                    <div class="timeline-panel">
                                                        <div class="timeline-header bordered-bottom bordered-blue">
                                                                    <span class="timeline-title">
                                                                        New Items Arrived
                                                                    </span>
                                                            <p class="timeline-datetime">
                                                                <small class="text-muted">
                                                                    <i class="glyphicon glyphicon-time">
                                                                    </i>
                                                                    <span class="timeline-date">Today</span>
                                                                    -
                                                                    <span class="timeline-time">8:19</span>
                                                                </small>
                                                            </p>
                                                        </div>
                                                        <div class="timeline-body">
                                                            <p>Purchased new stationary items for head office</p>
                                                        </div>
                                                    </div>
                                                </li>
                                                <li class="timeline-inverted">
                                                    <div class="timeline-datetime">
                                                                <span class="timeline-time">
                                                                    3:10
                                                                </span><span class="timeline-date">Today</span>
                                                    </div>
                                                    <div class="timeline-badge darkorange">
                                                        <i class="fa fa-map-marker font-120"></i>
                                                    </div>
                                                    <div class="timeline-panel bordered-right-3 bordered-orange">
                                                        <div class="timeline-header bordered-bottom bordered-blue">
                                                                    <span class="timeline-title">
                                                                        Visit Appointment
                                                                    </span>
                                                            <p class="timeline-datetime">
                                                                <small class="text-muted">
                                                                    <i class="glyphicon glyphicon-time">
                                                                    </i>
                                                                    <span class="timeline-date">Today</span>
                                                                    -
                                                                    <span class="timeline-time">3:10</span>
                                                                </small>
                                                            </p>
                                                        </div>
                                                        <div class="timeline-body">
                                                            <p>Outdoor visit at California State Route 85 with John
                                                                Boltana &amp; Harry Piterson regarding to setup a
                                                                new show room.</p>
                                                            <p>
                                                                <i class="orange fa fa-exclamation"></i> New task
                                                                added for <span><a href="#"
                                                                                   class="info">James Dean</a></span>
                                                            </p>
                                                        </div>
                                                    </div>
                                                </li>

                                                <li>
                                                    <div class="timeline-datetime">
                                                                <span class="timeline-time">
                                                                    8:19
                                                                </span><span class="timeline-date">Yesterday</span>
                                                    </div>
                                                    <div class="timeline-badge sky">
                                                        <i class="fa fa-bar-chart-o"></i>
                                                    </div>
                                                    <div class="timeline-panel bordered-top-3 bordered-azure">
                                                        <div class="timeline-header bordered-bottom bordered-blue">
                                                                    <span class="timeline-title">
                                                                        Bank Report
                                                                    </span>
                                                            <p class="timeline-datetime">
                                                                <small class="text-muted">
                                                                    <i class="glyphicon glyphicon-time">
                                                                    </i>
                                                                    <span class="timeline-date">Yesterday</span>
                                                                    -
                                                                    <span class="timeline-time">8:19</span>
                                                                </small>
                                                            </p>
                                                        </div>
                                                        <div class="timeline-body">
                                                            <p>
                                                                Curabitur ullamcorper ultricies nisi. Nam eget dui.
                                                                Etiam rhoncus. Maecenas tempus, tellus eget
                                                                condimentum rhoncus, sem quam semper libero, sem
                                                                neque sed ipsum.
                                                            </p>
                                                            Tellus eget condimentum rhoncus, sem quam semper libero,
                                                            sit amet adipiscing sem neque sed ipsum. Nam quam nunc,
                                                            blandit
                                                        </div>
                                                    </div>
                                                </li>
                                                <li class="timeline-inverted">
                                                    <div class="timeline-datetime">
                                                                <span class="timeline-time">
                                                                    6:08
                                                                </span><span class="timeline-date">Yesterday</span>
                                                    </div>
                                                    <div class="timeline-badge sky">
                                                        <img src="assets/img/avatars/Sergey-Azovskiy.jpg"
                                                             class="badge-picture"/>
                                                    </div>
                                                    <div class="timeline-panel">
                                                        <div class="timeline-header bordered-bottom bordered-blue">
                                                                    <span class="timeline-title">
                                                                        <a href="">Sergey Azovskiy</a> has commented on your <a
                                                                            href="">status</a>
                                                                    </span>
                                                            <p class="timeline-datetime">
                                                                <small class="text-muted">
                                                                    <i class="glyphicon glyphicon-time">
                                                                    </i>
                                                                    <span class="timeline-date">Yesterday</span>
                                                                    -
                                                                    <span class="timeline-time">6:08</span>
                                                                </small>
                                                            </p>
                                                        </div>
                                                        <div class="timeline-body">
                                                            <p>
                                                                <i class="orange fa fa-quote-left"></i> Happy
                                                                Birthday Lydia.
                                                            </p>
                                                        </div>
                                                    </div>
                                                </li>
                                                <li>
                                                    <div class="timeline-datetime">
                                                                <span class="timeline-time">
                                                                    7:00
                                                                </span><span class="timeline-date">Yesterday</span>
                                                    </div>
                                                    <div class="timeline-badge danger">
                                                        <i class="fa fa-exclamation font-120"></i>
                                                    </div>
                                                    <div class="timeline-panel">
                                                        <div class="timeline-header bordered-bottom bordered-blue">
                                                                    <span class="timeline-title danger">
                                                                        Deadline Added
                                                                    </span>
                                                            <p class="timeline-datetime">
                                                                <small class="text-muted">
                                                                    <i class="glyphicon glyphicon-time">
                                                                    </i>
                                                                    <span class="timeline-date">Yesterday</span>
                                                                    -
                                                                    <span class="timeline-time">7:00</span>
                                                                </small>
                                                            </p>
                                                        </div>
                                                        <div class="timeline-body">
                                                            <p>Dyvia Phillips added new milestone <span><a
                                                                        class="danger" href="#">UI</a></span> Lorem
                                                                ipsum dolor sit amet consiquest dio</p>
                                                        </div>
                                                    </div>
                                                </li>
                                                <li class="timeline-inverted">
                                                    <div class="timeline-datetime">
                                                                <span class="timeline-time">
                                                                    3:09
                                                                </span><span class="timeline-date">Yesterday</span>
                                                    </div>
                                                    <div class="timeline-badge">
                                                        <i class="fa fa-picture-o darkpink"></i>
                                                    </div>
                                                    <div class="timeline-panel">
                                                        <div class="timeline-header bordered-bottom bordered-blue">
                                                            <p class="timeline-datetime">
                                                                <small class="text-muted">
                                                                    <i class="glyphicon glyphicon-time">
                                                                    </i>
                                                                    <span class="timeline-date">Yesterday</span>
                                                                    -
                                                                    <span class="timeline-time">3:09</span>
                                                                </small>
                                                            </p>
                                                        </div>
                                                        <div class="timeline-body">
                                                            <a href="#">John Travolta</a> shared an image on <a
                                                                href="#">Dribble</a>
                                                            <div class="tl-wide text-center"
                                                                 style="padding: 5px; margin-top:10px; margin-bottom: 10px;">
                                                                <img src="assets/img/temp1.png" alt=""
                                                                     style="max-height: 158px;max-width: 100%;">
                                                            </div>
                                                            <i class="text-muted text-sm">Lorem ipsum dolor sit
                                                                amet, consectetur adipisicing elit, sed do eiusmod
                                                                tempor incididunt ut labore et dolore magna
                                                                aliqua.</i>
                                                        </div>
                                                    </div>
                                                </li>
                                                <li class="timeline-node">
                                                    <a class="btn btn-yellow">LOAD MORE</a>
                                                </li>
                                            </ul>
                                        </div>
                                        <div id="contacts" class="tab-pane">
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="profile-contacts">

                                                        <div class="profile-badge orange"><i
                                                                class="fa fa-phone orange"></i><span>Contacts</span>
                                                        </div>
                                                        <div class="contact-info">
                                                            <p>
                                                                Phone : +1 1 2345 6789 <br>
                                                                Cell : +1 9 876 5432
                                                            </p>
                                                            <p>
                                                                Email : kim@gmail.com
                                                                <br>
                                                                Skype : kim.ryder
                                                            </p>
                                                            <p>
                                                                Facebook : facebook.com/Kim.Ryder
                                                                <br>
                                                                Twitter : @KimRyder
                                                            </p>
                                                        </div>
                                                        <div class="profile-badge azure">
                                                            <i class="fa fa-map-marker azure"></i><span>Location</span>
                                                        </div>
                                                        <div class="contact-info">
                                                            <p>
                                                                Address<br>
                                                                Department 98<br>
                                                                44-46 Morningside Road<br>
                                                                Toronto, Canada
                                                            </p>
                                                            <p>
                                                                Office<br>
                                                                44-46 Morningside Road<br>
                                                                Toronto, Canada
                                                            </p>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div id="contact-map" class="animated flipInY"></div>
                                                </div>
                                            </div>
                                        </div>
                                        <div id="settings" class="tab-pane">
                                            <form  action="{{ route('admin.doctor.update',$user) }}" method="post"
                                                   enctype="multipart/form-data">
                                                {{ method_field('PATCH') }}

                                                <div class="form-title">
                                                   اطلاعات
                                                </div>


                                                <div class="col-md-6">
                                                    <div class="form-group">

                                                <span class="input-icon icon-right">
                                                    <input type="text" class="form-control"
                                                           name="name" value="{{ old('name' , $user->generalDoctor->name) }}"
                                                           id="userameInput" placeholder="نام">
                                                      <i class="glyphicon glyphicon-font"></i>
                                                </span>
                                                        @if ($errors->has('name'))
                                                            <span class="help-block">
                                                    <strong>{{ $errors->first('name') }}</strong>
                                                </span>
                                                        @endif
                                                    </div>
                                                </div>

                                                <div class="col-md-6">
                                                    <div class="form-group">

                                                <span class="input-icon icon-right">
                                                    <input type="text" class="form-control"
                                                           name="family" value="{{ old('family', $user->generalDoctor->family) }}"
                                                           id="userameInput" placeholder="نام خانوادگی">
                                                      <i class="glyphicon glyphicon-font"></i>
                                                </span>
                                                        @if ($errors->has('family'))
                                                            <span class="help-block">
                                                    <strong>{{ $errors->first('family') }}</strong>
                                                </span>
                                                        @endif
                                                    </div>
                                                </div>

                                                <div class="col-md-6">
                                                    <div class="form-group">

                                                <span class="input-icon icon-right">
                                                    <input type="text" class="form-control"
                                                           name="medicalSystemNumber" value="{{ old('medicalSystemNumber', $user->generalDoctor->medicalSystemNumber) }}"
                                                           id="userameInput" placeholder="کد نظام پزشکی">
                                                      <i class="glyphicon glyphicon-font"></i>
                                                </span>
                                                        @if ($errors->has('medicalSystemNumber'))
                                                            <span class="help-block">
                                                    <strong>{{ $errors->first('medicalSystemNumber') }}</strong>
                                                </span>
                                                        @endif
                                                    </div>
                                                </div>

                                                <div class="col-md-6">
                                                    <div class="form-group">

                                                <span class="input-icon icon-right">
                                                    <input type="text" class="form-control"
                                                           name="mail" value="{{ old('mail', $user->generalDoctor->mail) }}"
                                                           id="userameInput" placeholder="ایمیل">
                                                      <i class="glyphicon glyphicon-font"></i>
                                                </span>
                                                        @if ($errors->has('mail'))
                                                            <span class="help-block">
                                                    <strong>{{ $errors->first('mail') }}</strong>
                                                </span>
                                                        @endif
                                                    </div>
                                                </div>

                                                <div class="col-md-12">
                                                    <div class="form-group">
                                                <span class="input-icon icon-right">
                                                      <textarea class="form-control" id="textareaanimated"
                                                                name="description" value="{{ old('description') }}"
                                                                placeholder="توضیحات"
                                                                rows="5">{{ $user->description }}</textarea>
                                                     <i class="glyphicon glyphicon-font"></i>
                                                </span>
                                                        @if ($errors->has('description'))
                                                            <span class="help-block">
                                                    <strong>{{ $errors->first('description') }}</strong>
                                                </span>
                                                        @endif
                                                    </div>
                                                </div>
                                                @csrf
                                                <button type="submit" class="btn btn-primary">ذخیره</button>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- /Page Body -->
    </div>
    <!-- /Page Content -->

@endsection

@section('css')

@endsection

@section('js')

    <!--Page Related Scripts-->
    <script src="https://maps.googleapis.com/maps/api/js?v=3.exp&amp;sensor=false"></script>
    <script src="https://maps.gstatic.com/intl/en_us/mapfiles/api-3/17/0/main.js" type="text/javascript"></script>

    <script src="{{ url('adminAssets/js/charts/flot/jquery.flot.js') }}"></script>
    <script src="{{ url('adminAssets/js/charts/flot/jquery.flot.resize.js') }}"></script>

    <script>
        //Google Map
        $('#contacttab').click(function () {
            function initialize() {
                var myLatlng = new google.maps.LatLng(43.6531935, -79.3806243);
                var mapOptions = {
                    zoom: 15,
                    scrollwheel: false,
                    center: myLatlng,
                    mapTypeId: google.maps.MapTypeId.ROADMAP
                }
                var map = new google.maps.Map(document.getElementById('contact-map'), mapOptions);
                var marker = new google.maps.Marker({
                    position: myLatlng,
                    map: map,
                    title: 'Map'
                });
            }

            google.maps.event.addDomListener(window, 'click', initialize);
        });

        $(window).bind("load", function () {

            /*Sets Themed Colors Based on Themes*/
            themeprimary = getThemeColorFromCss('themeprimary');
            themesecondary = getThemeColorFromCss('themesecondary');
            themethirdcolor = getThemeColorFromCss('themethirdcolor');
            themefourthcolor = getThemeColorFromCss('themefourthcolor');
            themefifthcolor = getThemeColorFromCss('themefifthcolor');

            //--------------------------Visitor Chart --->
            var data = [{
                color: themeprimary,
                label: "Visits",
                data: [[3, 10], [4, 13], [5, 12], [6, 16], [7, 19], [8, 19], [9, 24], [10, 19], [11, 18], [12, 21], [13, 17],
                    [14, 14], [15, 12], [16, 14], [17, 15]]
            }];
            var options = {
                series: {
                    lines: {
                        show: true,
                        fill: true,
                        fillColor: {colors: [{opacity: 0.2}, {opacity: 0}]}
                    },
                    points: {
                        show: true
                    }
                },
                legend: {
                    show: false
                },
                xaxis: {
                    tickDecimals: 0,
                    tickLength: 0,
                    color: '#ccc'
                },
                yaxis: {
                    min: 0,
                    tickLength: 0,
                    color: '#ccc'
                },
                grid: {
                    hoverable: true,
                    clickable: false,
                    borderWidth: 0,
                    aboveData: false,
                    color: '#fbfbfb'

                },
                tooltip: true
            };
            var placeholder = $("#visit-chart");
            var plot = $.plot(placeholder, data, options);
        });
    </script>


@endsection
