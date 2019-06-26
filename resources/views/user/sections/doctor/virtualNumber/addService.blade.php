@extends('user.master')

@section('content')
    <!-- Your Account Personal Information -->

    <div class="container">
        <div class="row">
            <div class="col col-xl-9 order-xl-2 col-lg-9 order-lg-2 col-md-12 order-md-1 col-sm-12 col-12">
                <div class="ui-block">
                    <div class="ui-block-title">
                        <h6 class="title">سرویس ها</h6>
                    </div>
                    <div class="ui-block-content">
                        <form method="post" action="{{ route('doctor.virtualNumber.addService', $virtualNumber) }}">
                            @csrf
                            <div class="row">

                                <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                    @foreach($voipServices as $key => $voipService)
                                        <div class="description-toggle">
                                            <div class="description-toggle-content">
                                                <div class="h6">{{ $voipService->service_name }}</div>
                                            </div>

                                            <div class="togglebutton">
                                                <span>
                                                     تومان
                                                </span>
                                                <span>{{ number_format($voipService->cost) }}</span>
                                                <label>

                                                    @if($voipService->id == 4)
                                                        <button type="button"  class="btn btn-green">خریداری شده</button>
                                                    @else
                                                        <input type="checkbox" id="{{ $key }}" name="voipService[{{ $voipService->id }}]" onchange="check({{ $key }})">
                                                    @endif
                                                </label>
                                            </div>
                                        </div>
                                    @endforeach
                                </div>

                                <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
                                    <button class="btn btn-secondary btn-lg full-width">انصراف</button>
                                </div>
                                <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
                                    <button class="btn btn-green btn-lg full-width">پرداخت</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>

            </div>
            @include('user.partials.doctor.navbarCart', compact('virtualNumber'))
        </div>
    </div>
    <script>

        function check(id) {
            var checkBoxTarget = document.getElementById(id);
            var spanTarget = checkBoxTarget.parentNode.parentNode;
            var paymentTargetString = spanTarget.children[1].textContent;
            var paymentTarget =parseInt(paymentTargetString.replace(',',''));

            var elementString = document.getElementById("element").textContent;
            var element =parseInt(elementString.replace(',',''));

            if(checkBoxTarget.checked){
                paymentNumber =  element + paymentTarget;

            }else {
                if (paymentNumber <= 0){
                    paymentNumber = 0;
                }
                paymentNumber =  element - paymentTarget;
            }
            document.getElementById("element").innerHTML =paymentNumber;
        }



    </script>
    <!-- ... end Your Account اطلاعات شخصی =======================================-->

@endsection

@section('js')

@endsection
