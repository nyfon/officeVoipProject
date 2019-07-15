@extends('user.doctor.master')
@section('content')
    <div class="container">
        <div class="row">

            <div class="col col-xl-3 order-xl-3 col-lg-6 order-lg-3 col-md-6 col-sm-12 col-12">
                <div class="ui-block">
                    <div class="ui-block-content">
                        <ul class="statistics-list-count">
                            <li>
                                <div class="points">
									<span>
										تعداد بیماران تا امروز
									</span>
                                </div>
                                <div class="count-stat">28
                                    <span class="indicator positive">نفر</span>
                                </div>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>

            <div class="col-xl-3 order-xl-3 col-lg-6 order-lg-3 col-md-6 col-sm-12 col-xs-12">
                <div class="ui-block">
                    <div class="ui-block-content">
                        <ul class="statistics-list-count">
                            <li>
                                <div class="points">
									<span>
										تعداد نوبت ها در این ماه
									</span>
                                </div>
                                <div class="count-stat">5
                                    <span class="indicator positive"> نفر</span>
                                </div>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>

            <div class="col-xl-3 order-xl-3 col-lg-6 order-lg-3 col-md-6 col-sm-12 col-xs-12">
                <div class="ui-block">
                    <div class="ui-block-content">
                        <ul class="statistics-list-count">
                            <li>
                                <div class="points">
									<span>
										 تعداد طب ها
									</span>
                                </div>
                                <div class="count-stat">7
                                </div>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>

            <div class="col-xl-3 order-xl-3 col-lg-6 order-lg-3 col-md-6 col-sm-12 col-xs-12">
                <div class="ui-block">
                    <div class="ui-block-content">
                        <ul class="statistics-list-count">
                            <li>
                                <div class="points">
									<span>
										تعداد سرویس ها فعال
									</span>
                                </div>
                                <div class="count-stat">12
                                </div>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>

        </div>

        <div class="row">

            <div class="col-xl-4 col-lg-4 col-md-6 col-sm-12 col-xs-12">
                <div class="ui-block" data-mh="pie-chart" style="height: 414px;">
                    <div class="ui-block-title">
                        <div class="h6 title">میله های پیشرفت</div>
                        <a href="#" class="more"><svg class="olymp-three-dots-icon">
                                <use xlink:href="#olymp-three-dots-icon"></use>
                            </svg></a>
                    </div>

                    <div class="ui-block-content">
                        <div class="skills-item">
                            <div class="skills-item-info">
                                <span class="skills-item-title">پیشرفت گرادیان نارنجی</span>
                                <span class="skills-item-count"><span class="count-animate" data-speed="1000" data-refresh-interval="50" data-to="62" data-from="0"></span><span class="units">62%</span></span>
                            </div>
                            <div class="skills-item-meter">
                                <span class="skills-item-meter-active bg-primary skills-animate" style="width: 62%; opacity: 1;"></span>
                            </div>
                        </div>

                        <div class="skills-item">
                            <div class="skills-item-info">
                                <span class="skills-item-title">پیشرفت بنفش</span>
                                <span class="skills-item-count"><span class="count-animate" data-speed="1000" data-refresh-interval="50" data-to="46" data-from="0"></span><span class="units">46%</span></span>
                            </div>
                            <div class="skills-item-meter">
                                <span class="skills-item-meter-active bg-purple skills-animate" style="width: 46%; opacity: 1;"></span>
                            </div>
                        </div>

                        <div class="skills-item">
                            <div class="skills-item-info">
                                <span class="skills-item-title">پیشرفت آبی</span>
                                <span class="skills-item-count"><span class="count-animate" data-speed="1000" data-refresh-interval="50" data-to="79" data-from="0"></span><span class="units">79%</span></span>
                            </div>
                            <div class="skills-item-meter">
                                <span class="skills-item-meter-active bg-blue skills-animate" style="width: 79%; opacity: 1;"></span>
                            </div>
                        </div>

                        <div class="skills-item">
                            <div class="skills-item-info">
                                <span class="skills-item-title">پیشرفت آبی</span>
                                <span class="skills-item-count"><span class="count-animate" data-speed="1000" data-refresh-interval="50" data-to="34" data-from="0"></span><span class="units">34%</span></span>
                            </div>
                            <div class="skills-item-meter">
                                <span class="skills-item-meter-active bg-breez skills-animate" style="width: 34%; opacity: 1;"></span>
                            </div>
                        </div>

                        <div class="skills-item">
                            <div class="skills-item-info">
                                <span class="skills-item-title">پیشرفت زرد</span>
                                <span class="skills-item-count"><span class="count-animate" data-speed="1000" data-refresh-interval="50" data-to="95" data-from="0"></span><span class="units">95%</span></span>
                            </div>
                            <div class="skills-item-meter">
                                <span class="skills-item-meter-active bg-yellow skills-animate" style="width: 95%; opacity: 1;"></span>
                            </div>
                        </div>
                    </div>

                </div>
            </div>

            <div class="col-xl-4 col-lg-4 col-md-6 col-sm-12 col-xs-12">
                <div class="ui-block" data-mh="pie-chart" style="height: 414px;">
                    <div class="ui-block-title">
                        <div class="h6 title">میله های پیشرفت</div>
                        <a href="#" class="more"><svg class="olymp-three-dots-icon">
                                <use xlink:href="#olymp-three-dots-icon"></use>
                            </svg></a>
                    </div>

                    <div class="ui-block-content">
                        <div class="skills-item">
                            <div class="skills-item-info">
                                <span class="skills-item-title">پیشرفت گرادیان نارنجی</span>
                                <span class="skills-item-count"><span class="count-animate" data-speed="1000" data-refresh-interval="50" data-to="62" data-from="0"></span><span class="units">62%</span></span>
                            </div>
                            <div class="skills-item-meter">
                                <span class="skills-item-meter-active bg-primary skills-animate" style="width: 62%; opacity: 1;"></span>
                            </div>
                        </div>

                        <div class="skills-item">
                            <div class="skills-item-info">
                                <span class="skills-item-title">پیشرفت بنفش</span>
                                <span class="skills-item-count"><span class="count-animate" data-speed="1000" data-refresh-interval="50" data-to="46" data-from="0"></span><span class="units">46%</span></span>
                            </div>
                            <div class="skills-item-meter">
                                <span class="skills-item-meter-active bg-purple skills-animate" style="width: 46%; opacity: 1;"></span>
                            </div>
                        </div>

                        <div class="skills-item">
                            <div class="skills-item-info">
                                <span class="skills-item-title">پیشرفت آبی</span>
                                <span class="skills-item-count"><span class="count-animate" data-speed="1000" data-refresh-interval="50" data-to="79" data-from="0"></span><span class="units">79%</span></span>
                            </div>
                            <div class="skills-item-meter">
                                <span class="skills-item-meter-active bg-blue skills-animate" style="width: 79%; opacity: 1;"></span>
                            </div>
                        </div>

                        <div class="skills-item">
                            <div class="skills-item-info">
                                <span class="skills-item-title">پیشرفت آبی</span>
                                <span class="skills-item-count"><span class="count-animate" data-speed="1000" data-refresh-interval="50" data-to="34" data-from="0"></span><span class="units">34%</span></span>
                            </div>
                            <div class="skills-item-meter">
                                <span class="skills-item-meter-active bg-breez skills-animate" style="width: 34%; opacity: 1;"></span>
                            </div>
                        </div>

                        <div class="skills-item">
                            <div class="skills-item-info">
                                <span class="skills-item-title">پیشرفت زرد</span>
                                <span class="skills-item-count"><span class="count-animate" data-speed="1000" data-refresh-interval="50" data-to="95" data-from="0"></span><span class="units">95%</span></span>
                            </div>
                            <div class="skills-item-meter">
                                <span class="skills-item-meter-active bg-yellow skills-animate" style="width: 95%; opacity: 1;"></span>
                            </div>
                        </div>
                    </div>

                </div>
            </div>

            <div class="col-xl-4 col-lg-4 col-md-6 col-sm-12 col-xs-12">
                <div class="ui-block" data-mh="pie-chart" style="height: 414px;">
                    <div class="ui-block-title">
                        <div class="h6 title">میله های پیشرفت</div>
                        <a href="#" class="more"><svg class="olymp-three-dots-icon">
                                <use xlink:href="#olymp-three-dots-icon"></use>
                            </svg></a>
                    </div>

                    <div class="ui-block-content">
                        <div class="skills-item">
                            <div class="skills-item-info">
                                <span class="skills-item-title">پیشرفت گرادیان نارنجی</span>
                                <span class="skills-item-count"><span class="count-animate" data-speed="1000" data-refresh-interval="50" data-to="62" data-from="0"></span><span class="units">62%</span></span>
                            </div>
                            <div class="skills-item-meter">
                                <span class="skills-item-meter-active bg-primary skills-animate" style="width: 62%; opacity: 1;"></span>
                            </div>
                        </div>

                        <div class="skills-item">
                            <div class="skills-item-info">
                                <span class="skills-item-title">پیشرفت بنفش</span>
                                <span class="skills-item-count"><span class="count-animate" data-speed="1000" data-refresh-interval="50" data-to="46" data-from="0"></span><span class="units">46%</span></span>
                            </div>
                            <div class="skills-item-meter">
                                <span class="skills-item-meter-active bg-purple skills-animate" style="width: 46%; opacity: 1;"></span>
                            </div>
                        </div>

                        <div class="skills-item">
                            <div class="skills-item-info">
                                <span class="skills-item-title">پیشرفت آبی</span>
                                <span class="skills-item-count"><span class="count-animate" data-speed="1000" data-refresh-interval="50" data-to="79" data-from="0"></span><span class="units">79%</span></span>
                            </div>
                            <div class="skills-item-meter">
                                <span class="skills-item-meter-active bg-blue skills-animate" style="width: 79%; opacity: 1;"></span>
                            </div>
                        </div>

                        <div class="skills-item">
                            <div class="skills-item-info">
                                <span class="skills-item-title">پیشرفت آبی</span>
                                <span class="skills-item-count"><span class="count-animate" data-speed="1000" data-refresh-interval="50" data-to="34" data-from="0"></span><span class="units">34%</span></span>
                            </div>
                            <div class="skills-item-meter">
                                <span class="skills-item-meter-active bg-breez skills-animate" style="width: 34%; opacity: 1;"></span>
                            </div>
                        </div>

                        <div class="skills-item">
                            <div class="skills-item-info">
                                <span class="skills-item-title">پیشرفت زرد</span>
                                <span class="skills-item-count"><span class="count-animate" data-speed="1000" data-refresh-interval="50" data-to="95" data-from="0"></span><span class="units">95%</span></span>
                            </div>
                            <div class="skills-item-meter">
                                <span class="skills-item-meter-active bg-yellow skills-animate" style="width: 95%; opacity: 1;"></span>
                            </div>
                        </div>
                    </div>

                </div>
            </div>

        </div>

    </div>




    @endsection
