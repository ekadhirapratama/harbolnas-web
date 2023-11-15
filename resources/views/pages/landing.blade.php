@extends('layouts.pages_layout')

@section('title')
  Harbolnas
@endsection

@section('scripts')
  <script>
    var target_date = new Date("Dec 11, 2023 00:00:00").getTime(); // set the countdown date
    var days, hours, minutes, seconds; // variables for time units

    var x = setInterval(function () { getCountdown(); }, 1000);

    function getCountdown(){
      // find the amount of "seconds" between now and target
      var current_date = new Date().getTime();
      var seconds_left = (target_date - current_date) / 1000;

      days = pad( parseInt(seconds_left / 86400) );
      seconds_left = seconds_left % 86400;

      hours = pad( parseInt(seconds_left / 3600) );
      seconds_left = seconds_left % 3600;

      minutes = pad( parseInt(seconds_left / 60) );
      seconds = pad( parseInt( seconds_left % 60 ) );

      if (seconds_left < 0) {
        clearInterval(x);
      }
      else {
        // format countdown string + set tag value
        $('#days').html(days);
        $('#hours').html(hours);
        $('#minutes').html(minutes);
        $('#seconds').html(seconds);
      }
    }

    function pad(n) {
      return (n < 10 ? '0' : '') + n;
    }
  </script>
@endsection

@section('styles')
  <style>
    @media (min-width: 992px) {
      #landing-video {
        width: 720px;
        height: 390px;
      }
    }

    @media (max-width: 991px) and (min-width: 769px) {
      #landing-video {
        width: 555px;
        height: 301px;
      }
    }

    @media (max-width: 768px) and (min-width: 376px) {
      #landing-video {
        width: 380px;
        height: 206px;
      }
    }
    @media (max-width: 375px) {
      #landing-video {
        width: 300px;
        height: 163px;
      }
    }
  </style>
@endsection

@section('content')
  <div id="landing-page">
    <section id="video-countdown">
      <div class="bg-img-cover" style="background-image: url('/images/Resources/main-banner.jpg')">
        <div class="container text-center">
          <img src="/images/Resources/logo-harbolnas.png" width="128px"/>
          <div style="margin-top: 12px;">
            <div class="timer-container">
              <div id="days" class="timer">
                00
              </div>
              <div class="timer-name">
                hari
              </div>
            </div>
            <div class="timer-container">
              <div id="hours" class="timer">
                00
              </div>
              <div class="timer-name">
                jam
              </div>
            </div>
            <div class="timer-container">
              <div id="minutes" class="timer">
                00
              </div>
              <div class="timer-name">
                menit
              </div>
            </div>
            <div class="timer-container">
              <div id="seconds" class="timer">
                00
              </div>
              <div class="timer-name">
                detik
              </div>
            </div>
          </div>
          {{-- <div id="newsletter" class="" style="margin-top: 18px">
            <label for="">Newsletter</label>
            <br>
            <input id="newsletter-input" class="btn badge-pill btn-outline-white" type="text" name="newsletter-email" value="" placeholder="input email">
            <button id="newsletter-button" class="btn badge-pill btn-outline-white" type="button" name="button">Subscribe</button>
          </div> --}}
          <button id="btn-mainkan-video" type="button" class="btn badge-pill btn-outline-white" data-toggle="modal" data-target="#modal-video">Mainkan Video</button>
        </div>
      </div>

      {{-- modal video --}}
      <div class="modal fade" id="modal-video" role="dialog">
        <div class="modal-dialog modal-lg modal-dialog-centered">
          <div class="modal-content">
            <div class="modal-body">
              Content
              <!-- <iframe width="100%" height="420" src="https://drive.google.com/file/d/1PlACiRAofGLDKStjpinO4bClli2FLN6N/preview" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe> -->
            </div>
          </div>
        </div>
      </div>
    </section>
    <section class="sec-content" id="belanjauntukbangsa">
      <div class="container text-center">
        <img src="/images/Resources/map-indonesia.png" width="75%"/>
        <h1 id="title-landing">Ayo <strong class="font-weight-bold">#BelanjaUntukBangsa</strong></h1>
        <div class="row m-h--8">
          <div class="col-sm-6 padd-8">
            <a href="/edisi-produk-lokal">
              <div class="card-sm bg-img-cover relative" style="background-image: url('/images/assets/11_12_revisi2.png')">
                <img class="img-dummy" src="/images/assets/1111.jpg" width="100%;"/>
              </div>
            </a>
          </div>
          <div class="col-sm-6 padd-8">
            <a href="/peserta-harbolnas">
              <div class="card-sm bg-img-cover relative" style="background-image: url('/images/assets/1212.jpg')">
                <img class="img-dummy" src="/images/assets/1212.jpg" width="100%;"/>
              </div>
            </a>
          </div>
        </div>
        <!-- <div class="m-t-lg">
          <iframe class="container-fluid" id="landing-video" src="https://drive.google.com/file/d/1nyfwbswpsc-aNxusBU778jNrZeejJMIV/preview" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
        </div> -->
        {{-- <a target="_blank" href="https://docs.google.com/forms/d/e/1FAIpQLSfJ1xKZrYgMb8jQKilB7iG6FaMsECD7E0vtBNPgZAbKA1LM1w/viewform">
          <button id="btn-daftar-sekarang" type="button" class="btn btn-primary btn-huge badge-pill ">Daftar Sekarang</button>
        </a> --}}
      </div>
    </section>
    <section class="sec-content" style="padding-top:0;padding-bottom:0">
      <div class="bg-img-cover padd-h-64">
        <div class="container">
          <div class="row text-center">
            <h1 class="m-b-md">Official Sponsors</h1>
            <div class="offset-md-2 col-md-8 m-b-md">
              <div class="row m-h--8">
                <div class="offset-sm-1 col-6 col-sm-5 padd-8">
                  <div class="card-sm bg-img-contain" style="background-image: url('{{$assets['partner'][0]}}')">
                    <img class="img-dummy" src="/images/dummy-logo.png" width="100%"/>
                  </div>
                </div>
                <div class="col-6 col-sm-5 padd-8">
                  <div class="card-sm bg-img-contain" style="background-image: url('{{$assets['partner'][1]}}')">
                    <img class="img-dummy" src="/images/dummy-logo.png" width="100%"/>
                  </div>
                </div>
              </div>
            </div>
            <h1 class="m-b-md">Official Partners</h1>
            <div class="offset-md-2 col-md-8">
              <div class="row m-h--8">
                @for ($i=2; $i <= 4; $i++)
                  <div class="col-6 col-sm-4 padd-8">
                    <div class="card-sm bg-img-contain" style="background-image: url('{{$assets['partner'][$i]}}')">
                      <img class="img-dummy" src="/images/dummy-logo.png" width="100%"/>
                    </div>
                  </div>
                @endfor
              </div>
            </div>
            {{-- <h1 class="m-b-md">Jaringan Prima</h1> --}}
            <div class="offset-md-2 col-md-8 m-b-lg">
              <div class="row m-h--8 m-b-md">
                @for ($i=5; $i < count($assets['partner']); $i++)
                  <div class="@if($i==5)offset-sm-1 @endif col-6 col-sm-2 padd-8">
                    <div class="card-sm bg-img-contain" style="background-image: url('{{$assets['partner'][$i]}}')">
                      <img class="img-dummy" src="/images/dummy-logo.png" width="100%"/>
                    </div>
                  </div>
                @endfor
              </div>
            </div>
            <h1 class="m-b-md">Supported By</h1>
            <div class="offset-md-2 col-md-8 m-b-md">
              <div class="row m-h--8">
                @foreach ($assets['kementrian'] as $kementrian)
                  <div class="col-6 col-sm-3 padd-8">
                    <div class="card-sm bg-img-contain" style="background-image: url('{{$kementrian}}')">
                      <img class="img-dummy" src="/images/dummy-logo.png" width="100%"/>
                    </div>
                  </div>
                @endforeach
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
    <section class="sec-content sec-content-gray">
      <div class="container">
        <div class="text-center">
          <h1 class="m-b-md">PANITIA HARBOLNAS 2018</h1>
          <div class="row m-b-64 m-h--8">
            @foreach ($panitia as $panit)
              <div class="col-6 col-sm-2 padd-8">
                <div class="card-sm bg-img-contain" style="background-image: url('{{$panit['logo']}}')">
                  <a target="_blank" href="{{$panit['url']}}">
                    <img class="img-dummy" src="/images/dummy-logo.png" width="100%" alt="{{$panit['alt']}}"/>
                  </a>
                </div>
              </div>
            @endforeach
          </div>

          <h1 class="m-b-md">Promo Partner</h1>
          @include('partials.partner')

          <div class="col-12 text-center m-b-lg">
            <a href="/promo-partner">
              <button id="btn-lihat-semua" class="btn btn-primary badge-pill">Lihat Semua</button>
            </a>
          </div>
          @include('partials.about_harbolnas')
        </div>
      </div>
    </section>
    @include('partials.side_socmed')
  </div>
@endsection
