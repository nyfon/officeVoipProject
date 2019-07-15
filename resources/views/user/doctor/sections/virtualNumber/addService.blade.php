@extends('user.doctor.master')

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

                                <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-xs-12" id="playlist">
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
                                                <label class="active">
                                                    @if(in_array($voipService->id, $activeServices->pluck('services_id')->toArray()))

                                                        <a href="#" data-toggle="modal" onclick="margFormUrl({{$voipService->id}})"
                                                           data-target="#update-header-photo"
                                                           class="btn btn-md-2 btn-border-think custom-color c-grey">انتخاب
                                                            صوت</a>
                                                    @else
                                                        <input type="checkbox" id="{{ $key }}"
                                                               name="voipService[{{ $voipService->id }}]"
                                                               onchange="check({{ $key }})">
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
            @include('user.doctor.partials.navbarCart')
        </div>
    </div>



    <!-- Window-popup Update Header Photo -->

    <div class="modal fade" id="update-header-photo" tabindex="-1" role="dialog" aria-labelledby="update-header-photo"
         aria-hidden="true">
        <div class="modal-dialog window-popup update-header-photo" role="document">
            <div class="modal-content">
                <a href="#" class="close icon-close" data-dismiss="modal" aria-label="Close">
                    <svg class="olymp-close-icon">
                        <use xlink:href="/frontEnd/svg-icons/sprites/icons.svg#olymp-close-icon"></use>
                    </svg>
                </a>

                <div class="modal-header">
                    <h6 class="title">صوت</h6>
                </div>

                <div class="modal-body">

                    <a href="#" class="upload-photo-item" data-toggle="modal" data-target="#upload--file">
                        <svg class="olymp-computer-icon">
                            <use xlink:href="/frontEnd/svg-icons/sprites/icons.svg#olymp-computer-icon"></use>
                        </svg>

                        <h6>افزودن صوت</h6>
                    </a>

                    <a href="#" class="upload-photo-item" data-toggle="modal" data-target="#choose-from-my-photo">

                        <svg class="olymp-photos-icon">
                            <use xlink:href="/frontEnd/svg-icons/sprites/icons.svg#olymp-photos-icon"></use>
                        </svg>

                        <h6>انتخاب از صوت های پیشفرض</h6>
                    </a>
                </div>
            </div>
        </div>
    </div>


    <!-- ... end Window-popup Update Header Photo -->

    <!-- Window-popup Choose from my Photo -->

    <div class="modal fade" id="choose-from-my-photo" tabindex="-1" role="dialog" aria-labelledby="choose-from-my-photo"
         aria-hidden="true">
        <div class="modal-dialog window-popup choose-from-my-photo" role="document">

            <div class="modal-content">
                <a href="#" class="close icon-close" data-dismiss="modal" aria-label="Close">
                    <svg class="olymp-close-icon">
                        <use xlink:href="/frontEnd/svg-icons/sprites/icons.svg#olymp-close-icon"></use>
                    </svg>
                </a>
                <div class="modal-header">
                    <h6 class="title">صوت های پیشفرض</h6>
                </div>

                <div class="modal-body playlistMusic">
                    <div class="" data-mh="choose-item">
                        <div class="radio custom-radio">
                            <label class="activePlayMusic">
                                <a href="http://cd09.64.aac.jango.com/16/79/22/1679228996511998056.m4a" data-track="1"
                                   data-toggle="modal" data-target="#player--music" class="btn  custom-color c-grey">اضافه
                                    کردن عکس</a>
                                <input type="radio" name="optionsRadios">
                            </label>
                        </div>
                    </div>

                    <div class="" data-mh="choose-item">
                        <div class="radio custom-radio">
                            <label class="activePlayMusic">
                                <a href="http://cd09.64.aac.jango.com/16/79/22/1679228996511998056.m4a" data-track="1"
                                   data-toggle="modal" data-target="#player--music" class="btn  custom-color c-grey">اضافه
                                    کردن عکس</a>
                                <input type="radio" name="optionsRadios">
                            </label>
                        </div>
                    </div>

                    <div class="" data-mh="choose-item">
                        <div class="radio custom-radio">
                            <label class="activePlayMusic">
                                <a href="http://cd09.64.aac.jango.com/16/79/22/1679228996511998056.m4a" data-track="1"
                                   data-toggle="modal" data-target="#player--music" class="btn  custom-color c-grey">اضافه
                                    کردن عکس</a>
                                <input type="radio" name="optionsRadios">
                            </label>
                        </div>
                    </div>

                    <div class="" data-mh="choose-item">
                        <div class="radio custom-radio">
                            <label class="activePlayMusic">
                                <a href="http://cd09.64.aac.jango.com/16/79/22/1679228996511998056.m4a" data-track="1"
                                   data-toggle="modal" data-target="#player--music" class="btn  custom-color c-grey">اضافه
                                    کردن عکس</a>
                                <input type="radio" name="optionsRadios">
                            </label>
                        </div>
                    </div>

                    <div class="" data-mh="choose-item">
                        <div class="radio custom-radio">
                            <label class="activePlayMusic">
                                <a href="http://cd09.64.aac.jango.com/16/79/22/1679228996511998056.m4a" data-track="1"
                                   data-toggle="modal" data-target="#player--music" class="btn  custom-color c-grey">اضافه
                                    کردن عکس</a>
                                <input type="radio" name="optionsRadios">
                            </label>
                        </div>
                    </div>

                </div>
                <div class="modal-footer">
                    <a href="#" class="btn btn-md-2 ml-2 btn-secondary">لغو</a>
                    <a href="#" class="btn btn-md-2 mr-2 btn-primary">تایید تصویر</a>
                </div>
            </div>

        </div>
    </div>

    <!-- ... end Window-popup Choose from my Photo -->
    <div class="modal fade" id="player--music" tabindex="-1" role="dialog" aria-labelledby="player--music"
         aria-hidden="true">
        <div class="modal-dialog window-popup create-event" role="document">
            <div class='music-card'>
                <div class='image'>
                    <img src='https://f4.bcbits.com/img/a2721930172_16.jpg'>
                </div>
                <div class='wave'></div>
                <div class='wave'></div>
                <div class='wave'></div>
                <div class='wave'></div>
                <div class='info'>
                    <h2 class='title'>صوت پیشفرض</h2>
                    <div class="music-player">
                        <div class="progress">
                            <div class="progress-filled"></div>
                        </div>

                        <button class="player-button toggle">
                            <i class="fa fa-play fa-4x"></i>
                        </button>


                        <audio class="player">
                            <source src="http://m4a-64.cdn107.com/14/68/34/1468343899873187788.m4a" type="audio/mpeg">
                        </audio>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <div class="modal fade" id="upload--file" tabindex="-1" role="dialog" aria-labelledby="upload--file"
         aria-hidden="true">
        <div class="modal-dialog window-popup choose-from-my-photo" role="document">

            <div class="modal-content">
                <a href="#" class="close icon-close" data-dismiss="modal" aria-label="Close">
                    <svg class="olymp-close-icon">
                        <use xlink:href="/frontEnd/svg-icons/sprites/icons.svg#olymp-close-icon"></use>
                    </svg>
                </a>
                <div class="modal-header">
                    <h6 class="title">افزودن صوت</h6>
                </div>
                @include('user.doctor.partials.errors')
                <form action="{{ url('doctor/virtualNumber/sendVoice') }}" method="post" class="dropzone" enctype="multipart/form-data">
                    <div class="modal-body ">
                        <!-- We'll transform this input into a pond -->

                        @csrf
                        <div class="fallback">
                            <input name="voice" type="file" id="file" required />
                        </div>


                    </div>
                    <div class="modal-footer">
                        <button type="reset" class="btn btn-md-2 ml-2 btn-secondary">لغو</button>
                        <button type="submit" class="btn btn-md-2 mr-2 btn-primary">ارسال ویس</button>
                    </div>
                </form>
            </div>

        </div>
    </div>

    <script>

        function check(id) {
            var checkBoxTarget = document.getElementById(id);
            var spanTarget = checkBoxTarget.parentNode.parentNode;
            var paymentTargetString = spanTarget.children[1].textContent;
            var paymentTarget = parseInt(paymentTargetString.replace(',', ''));

            var elementString = document.getElementById("element").textContent;
            var element = parseInt(elementString.replace(',', ''));

            if (checkBoxTarget.checked) {
                paymentNumber = element + paymentTarget;

            } else {
                if (paymentNumber <= 0) {
                    paymentNumber = 0;
                }
                paymentNumber = element - paymentTarget;
            }
            document.getElementById("element").innerHTML = paymentNumber;
        }

    </script>
    <!-- ... end Your Account اطلاعات شخصی =======================================-->

@endsection

@section('js')

    <script>
        const song = document.querySelector('.player');
        const toggleBtn = document.querySelector('.toggle');
        const loader = document.querySelector('.progress');
        const loaderBar = document.querySelector('.progress-filled');
        const skipButtons = document.querySelectorAll('[data-skip]');
        const source = document.querySelector("source");
        const playlist = document.querySelector(".playlistMusic");
        const tracks = playlist.querySelectorAll("a");
        const forward = document.querySelector(".fa-step-forward");
        const backward = document.querySelector(".fa-step-backward");
        const len = tracks.length - 1;
        const songDuration = song.duration;
        let currentSong = 0;

        function handleProgress() {
            loaderBar.style.flexBasis = ((song.currentTime / song.duration) * 100) + "%";
        }

        function scrub(event) {
            const scrubTime = (event.offsetX / loader.offsetWidth) * song.duration;
            song.currentTime = scrubTime;
        }

        song.addEventListener("timeupdate", handleProgress);
        let mousedown = false;
        loader.addEventListener("click", scrub);
        loader.addEventListener("mousemove", (e) => mousedown && scrub(e));
        loader.addEventListener("mousedown", () => mousedown = true);
        loader.addEventListener("mouseup", () => mousedown = false);

        function skipSongForward() {
            console.log(currentSong, tracks.length);
            if (currentSong >= tracks.length) {
                currentSong = 0;
            }

            if (source.src == tracks[currentSong].href) {
                song.pause();
                let prior = playlist.children[len];

                if (currentSong === len) {
                    currentSong = 0;
                } else {
                    currentSong += 1;
                    prior = playlist.children[currentSong - 1];
                }

                source.src = tracks[currentSong].href;
                //add the activePlayMusic class to the proper link;
                const li = playlist.children[currentSong];
                prior.className = '';
                li.className = 'activePlayMusic';
                song.load();
                song.play();

            } else {
                currentSong += 1;
                skipSongForward();
            }
        }

        function skipSongBackward() {

            if (source.src == tracks[currentSong].href) {
                song.pause();
                let prior = playlist.children[0];
                if (currentSong === 0) {
                    currentSong = tracks.length - 1;
                } else {
                    currentSong -= 1;
                    prior = playlist.children[currentSong + 1];
                }

                source.src = tracks[currentSong].href;
                //add the activePlayMusic class to the proper link;
                const li = playlist.children[currentSong];
                prior.className = ' ';
                li.className = 'activePlayMusic';
                song.load();
                song.play();

            } else {
                currentSong -= 1;
                skipSongBackward();
            }
        }


        function init(e) {
            e.preventDefault();

            currentSong = parseInt(this.dataset.track);

            source.src = this.href;
            const liArray = playlist.children;
            for (i = 0; i < liArray.length; i++) {
                liArray[i].className = '';
            }

            this.parentElement.className = 'activePlayMusic';
            song.load();
            song.play();
        }


        function play() {
            if (song.paused) {
                song.play();
            } else {
                song.pause();
            }
        }


        function updateBtn() {
            if (song.paused) {
                toggleBtn.innerHTML = '<i class="fa fa-play fa-4x"></i>';
            } else {
                toggleBtn.innerHTML = '<i class="fa fa-pause fa-4x"></i>';
            }
        }

        //add event listeners
        toggleBtn.addEventListener("click", play);
        song.addEventListener("play", updateBtn);
        song.addEventListener("pause", updateBtn);
        tracks.forEach(track => track.addEventListener("click", init));
        forward.addEventListener("click", skipSongForward);
        backward.addEventListener("click", skipSongBackward);
        song.addEventListener('ended', skipSongForward);


        function margFormUrl(id) {
            var url = window.location.origin +'/doctor/virtualNumber/sendVoice/'+id;
            $('.dropzone').attr('action', url);
        }
    </script>




@endsection

@section('css')
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.1.1/css/all.css"
          integrity="sha384-O8whS3fhG2OnA5Kas0Y9l3cfpmYjapjI0E4theH4iuMD+pLhbf6JI0jIMfYcK3yZ" crossorigin="anonymous">
    <style>
        /* Audio Player*/
        .music-card {
            border-radius: 6px;
            background: #fff;
            box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.4);
            overflow: hidden;
            position: relative;
            width: 300px;
            height: 500px;
        }

        .music-card > .image img {
            position: absolute;
            z-index: 1;
            opacity: 0.8;
            height: 300px;
            width: 300px;
        }

        .music-card > .image:after {
            height: 100px;
            content: '';
            top: 200px;
            position: absolute;
            width: 100%;
            z-index: 1;
            background: linear-gradient(rgba(221, 65, 127, 0), #DD417F);
        }

        .music-card > .wave {
            position: absolute;
            height: 750px;
            width: 750px;
            opacity: 0.6;
            left: 0;
            top: 0;
            margin-left: -70%;
            margin-top: -130%;
            border-radius: 40%;
            background: radial-gradient(#B01DE8, #F34235);
            -webkit-animation: spin 18s infinite linear;
            animation: spin 18s infinite linear;
        }

        .music-card > .wave:nth-child(2) {
            top: 10px;
            -webkit-animation: spin 15s infinite linear;
            animation: spin 15s infinite linear;
        }

        .music-card > .wave:nth-child(3) {
            top: 10px;
            -webkit-animation: spin 12s infinite linear;
            animation: spin 12s infinite linear;
        }

        .music-card > .info {
            position: absolute;
            bottom: 20px;
            left: 0;
            right: 0;
            text-align: center;
        }

        .music-card > .info > .title {
            font-size: 1.8em;
            font-weight: 400;
            font-family: 'Playfair display';
            color: #333;
            margin-bottom: 8px;
        }

        .music-card > .info > .artist {
            font-family: 'Source sans pro';
            color: #cfcfcf;
            font-size: 1em;
            letter-spacing: 0.08em;
            text-transform: uppercase;
        }

        .player-button {
            background: none;
            border: 0;
            line-height: 1;
            color: #7f7f7f;
            text-align: center;
            outline: 0;
            padding: 0;
            cursor: pointer;
            max-width: 50px;
            margin: 0 10px;
            vertical-align: middle;
            padding-top: 15px;

        }


        .progress {
            margin-top: 20px;
            margin-right: 20px;
            margin-left: 20px;
            flex: 10;
            position: relative;
            display: flex;
            flex-basis: 100%;
            height: 5px;
            background: rgba(0, 0, 0, 0.5);
            border-radius: 10px 10px 10px 10px;
        }

        .progress-filled {
            width: 50%;
            background: linear-gradient(to right, #B01DE8, #df427a);
            flex: 0;
            flex-basis: 0%;
            border-radius: 10px 10px 10px 10px;
        }

        @-webkit-keyframes spin {
            0% {
                -webkit-transform: rotate(0deg);
                transform: rotate(0deg);
            }
            100% {
                -webkit-transform: rotate(360deg);
                transform: rotate(360deg);
            }
        }

        @keyframes spin {
            0% {
                -webkit-transform: rotate(0deg);
                transform: rotate(0deg);
            }
            100% {
                -webkit-transform: rotate(360deg);
                transform: rotate(360deg);
            }
        }

        /* wave shape */

        .activePlayMusic .btn {
            margin-bottom: 10px;
            margin-top: 10px;
        }

        .activePlayMusic .btn.c-grey {
            border-color: none;
        }

        .choose-from-my-photo .btn {
            margin-bottom: 0;
        }

        .radio label span {
            top: 32%;
        }

        .playlistMusic div {
            display: inline-block;
        }


    </style>


@endsection
