@extends('user.master')

@section('content')
    <!-- Your Account Personal Information -->

    <div class="container">
        <div class="row">
            <div class="col col-xl-9 order-xl-2 col-lg-9 order-lg-2 col-md-12 order-md-1 col-sm-12 col-12">
                <div class="ui-block">
                    <div class="ui-block-title">
                        <h6 class="title">سرویس های شماره مجازی</h6>
                    </div>
                    <div class="ui-block-content">
                        <form method="post" action="{{ route('doctor.virtualNumber.addVirtualNumber') }}">
                            @csrf

                            <div class="row">

                                <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-xs-12">


                                    <div class="pricing-area">
                                        <div class="container">

                                            <div class="row">
                                                @foreach($voipServices as $voipService)
                                                    <div class="col-lg-4 col-md-6 offset-lg-0 offset-md-3 mb-5">
                                                        <div class="pricing-table-box">
                                                            <div class="pricingTable-header">
                                                                <h3 class="title">{{ $voipService->service_name  }}</h3>
                                                                <div class="price-value">
                                                                    <sup>{{ number_format($voipService->cost) }}
                                                                        تومان</sup></div>
                                                            </div>

                                                            <ul class="pricing-content">
                                                                <li class="fontSize">{{ $voipService->duration }}ماهه
                                                                </li>
                                                            </ul>
                                                            <input type="hidden" name="service"
                                                                   value="{{ $voipService->id }}">
                                                            <button type="submit" class="btn btn-primary">خرید</button>
                                                        </div>
                                                    </div>

                                                @endforeach
                                            </div>
                                        </div>
                                    </div>


                                </div>
                            </div>
                        </form>
                    </div>
                </div>
                @if(count($virtualNumbers) !== 0)
                    <div class="ui-block">
                        <div class="ui-block-title">
                            <h6 class="title">شماره های مجازی فعال</h6>
                        </div>
                        <div class="ui-block-content">


                            <div class="row">

                                <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-xs-12">


                                    <div class="pricing-area">
                                        <div class="container">

                                            <div class="row">
                                                @foreach($virtualNumbers as $virtualNumber)
                                                    <div class="col-lg-4 col-md-6 offset-lg-0 offset-md-3 mb-5">
                                                        <div class="pricing-table-box">
                                                            <div class="pricingTable-header">
                                                                <h3 class="title">شماره مجازی</h3>
                                                                <div class="price-value">
                                                                    <sup>{{ $virtualNumber->virtual_number }}</sup>
                                                                </div>
                                                            </div>

                                                            <ul class="pricing-content ">
                                                                <li>
                                                                    تاریخ فعال سازی :
                                                                    {{ $virtualNumber->persianDate($virtualNumber->active_date)->format('Y/m/d')  }}
                                                                </li>

                                                                <li>
                                                                    تاریخ پایان اعتبار :
                                                                    {{ $virtualNumber->persianDate($virtualNumber->deactive_date)->format('Y/m/d')  }}
                                                                </li>

                                                                <li>
                                                                    وضعیت :{{ $virtualNumber->isStatusFarsi() }}
                                                                </li>
                                                            </ul>
                                                            <a href="{{ route('doctor.virtualNumber.addService' , $virtualNumber) }}"
                                                               class="btn btn-blue">افزودن سرویس</a>
                                                        </div>
                                                    </div>
                                                @endforeach
                                            </div>
                                        </div>
                                    </div>


                                </div>
                            </div>

                        </div>
                    </div>
                @endif
            </div>
            @include('user.partials.doctor.navbarPanelUser')
        </div>
    </div>

    <!-- ... end Your Account اطلاعات شخصی =======================================-->
@endsection

@section('css')
    <style>


        .pricing-table-box {
            padding-bottom: 30px;
            background: #ffffff;
            text-align: center;
            z-index: 1;
            position: relative;
            border-radius: 5px;
            background-position: center center;
            overflow: hidden;
            -webkit-box-shadow: 7px 5px 30px 0 rgba(72, 73, 121, 0.15);
            box-shadow: 7px 5px 30px 0 rgba(72, 73, 121, 0.15);
            -webkit-transition: .4s;
            transition: .4s;
        }

        .pricing-table-box:after {
            content: "";
            position: absolute;
            width: 100%;
            top: 0;
            background-image: url(https://i.ibb.co/kq1jLKz/background-dassed.png);
            opacity: 0.5;
            height: 100%;
            background-size: contain;
            background-repeat: repeat;
        }

        .pricing-table-box .pricingTable-header {
            padding: 30px 15px 45px;
            background: #d83f87;
            -webkit-clip-path: polygon(50% 100%, 100% 60%, 100% 0, 0 0, 0 60%);
            clip-path: polygon(50% 100%, 100% 60%, 100% 0, 0 0, 0 60%);
            position: relative;
        }

        .pricing-table-box .pricingTable-header::before {
            content: "";
            width: 400px;
            height: 400px;
            border-radius: 50%;
            position: absolute;
            right: -50%;
            top: -130%;
            background: repeating-radial-gradient(rgba(255, 255, 255, 0.05), rgba(255, 255, 255, 0.2) 20%);
            -webkit-transition: .4s;
            transition: .4s;
        }

        .pricing-table-box .title {
            font-size: 23px;
            font-weight: 700;
            color: #ffffff;
            text-transform: uppercase;
            margin-bottom: 15px;
        }

        .pricing-table-box .price-value {
            display: block;
            font-size: 45px;
            font-weight: 700;
            color: #ffffff;
            margin-bottom: 30px;
        }

        .pricing-table-box .price-value span {
            font-size: 15px;
            text-transform: uppercase;
            margin-left: -10px;
        }

        .pricing-table-box .price-value sup {
            font-size: 23px;
            top: -25px;
        }

        .pricing-table-box .pricing-content {
            padding: 30px 25px;
            margin-bottom: 0;
            list-style-type: none;
        }

        .pricing-table-box .pricing-content li {
            color: #828893;
            text-transform: capitalize;
            border-bottom: 1px solid #eee;
            margin-bottom: 12px;
            padding-bottom: 12px;
        }

        .pricing-table-box .pricing-content li:last-child {
            border-bottom: none;
            padding-bottom: 0;
            margin-bottom: 0;
        }

        .pricing-table-box:hover {
            -webkit-transform: translateY(-10px);
            transform: translateY(-10px);
        }

        .pricing-table-box:hover .pricingTable-header::before {
            right: 50%;
        }

        .fontSize {
            font-size: 1.3rem;
        }


    </style>
@endsection

@section('js')

@endsection


