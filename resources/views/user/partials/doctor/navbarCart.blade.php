<div class="col-xl-3 order-xl-1 col-lg-3 order-lg-1 col-md-12 order-md-2 col-sm-12 col-xs-12 responsive-display-none">
    <div class="ui-block">
        <div class="your-profile">
            <div id="accordion" role="tablist" aria-multiselectable="true">
                <div class="card">
                    <div class="card-header" role="tab" id="headingOne">
                        <h6 class="mb-0">
                            <a data-toggle="collapse" class="" data-parent="#accordion" href="#collapseOne" aria-expanded="true"
                               aria-controls="collapseOne">
                                مبلغ کل خرید :
                            </a>
                            <a data-toggle="collapse" class="cardPrice" data-parent="#accordion" href="#collapseOne" aria-expanded="true"
                               aria-controls="collapseOne">
                                {{ number_format('600000') }} تومان
                            </a>
                        </h6>
                    </div>
                    <div class="ui-block-title ui-block-title-small">
                        <h6 class="title">اطلاعات مطب</h6>
                    </div>
                    <div id="collapseOne" class="collapse show" role="tabpanel" aria-labelledby="headingOne">
                        <ul class="your-profile-menu">
                            <li>
                                <a href="" class="cardDetale">عنوان مطب : <span>{{ $office->office_name }}</span></a>
                            </li>
                            <li>
                                <a href="" class="cardDetale">شماره مطب : <span>{{ $office->normalizePhoneNumber() }}</span></a>
                            </li>
                        </ul>
                    </div>
                    <div class="ui-block-title ui-block-title-small">
                        <h6 class="title">سرویس ها</h6>
                    </div>
                    <div id="collapseOne" class="collapse show" role="tabpanel" aria-labelledby="headingOne">
                        <ul class="your-profile-menu">
                            <li>
                                <a href="" class="cardDetale">تعداد سرویس های فعال بروی این مطب : <span>1 سرویس</span></a>
                            </li>

                        </ul>
                    </div>
                </div>
            </div>


           {{--          <div class="ui-block-title">
                          <a href="{{ route('doctor.voipServices.index') }}" class="h6 title">سرویس ها</a>
                      </div>--}}{{--
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
            </div>--}}
        </div>
    </div>
</div>
