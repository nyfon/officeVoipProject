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
                            <a data-toggle="collapse" class="cardPrice" id="element"
                               aria-controls="collapseOne">0</a>تومان
                        </h6>
                    </div>
                    <div class="ui-block-title ui-block-title-small">
                        <h6 class="title">اطلاعات شماره مجازی</h6>
                    </div>
                    <div id="collapseOne" class="collapse show" role="tabpanel" aria-labelledby="headingOne">
                        <ul class="your-profile-menu">
                            <li>
                                <a href="" class="cardDetale">شماره مجازی : <span>{{ $virtualNumber->virtual_number }}</span></a>
                            </li>
                            <li>
                                <a href="" class="cardDetale">تاریخ فعال سازی : <span>{{ $virtualNumber->persianDate($virtualNumber->active_date)->format('Y/m/d')   }}</span></a>
                            </li>

                            <li>
                                <a href="" class="cardDetale">تاریخ پایان اعتبار : <span>{{ $virtualNumber->persianDate($virtualNumber->active_date)->format('Y/m/d')   }}</span></a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
