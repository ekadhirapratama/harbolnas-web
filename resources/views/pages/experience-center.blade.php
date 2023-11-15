@extends('layouts.pages_layout')

@section('title')
  Experience Center | Harbolnas
@endsection

@section('styles')
  <style>
    .text-left.c-gray-dark.m-t-64 {
      margin-top: 0;
    }
    .head-sec {
      min-height: 0;
    }
    .bg-img-cover > .container {
      padding-top: 100px;
      padding-bottom: 100px;
    }

    @media (min-width:769px) {
      #infografik-lg {
        display: block;
        pointer-events: none;
      }

      #infografik-sm {
        display: none;
      }
    }
    @media (max-width:768px) {
      #infografik-sm {
        display: block;
        pointer-events: none;
      }

      #infografik-lg {
        display: none;
      }
    }

  </style>
@endsection

@section('content')
  {{-- live chat --}}
  {{-- <div id="live-chat-body" class="card">
    <div class="card-body">
      test
    </div>
  </div>
  <button id="live-chat" onclick="openChat()" class="btn btn-primary" type="button" name="button"><i id="live-chat-open" class="fa fa-comment"></i></button> --}}

  <section class="head-sec">
    <div class="bg-img-cover" style="background-image: url('/images/Resources/experience-center-main.jpg')">
      <div class="container">
        <img class="content-w-md" src="/images/Resources/experience-center-new.png" alt="">
        <p class="m-t-lg content-w-md">
          Merupakan suatu inovasi yang disediakan oleh panitia untuk memberikan tips belanja Harbolnas dengan Aman, Cermat, dan Hemat. Selain itu Anda juga bisa menyampaikan keluhan atau pertanyaan Anda mengenai program Harbolnas disini.
        </p>
        <a href="#sec-content">
          <button type="button" class="btn btn-custom-white btn-w-sm">Cari Tahu</button>
        </a>
      </div>
    </div>
  </section>
  <section id="sec-content" class="sec-content sec-content-gray">
    <div class="container">
      <img class="img-fluid" src="/images/Resources/experience_center_banner.png" alt="">
      <br><br><br>
      <img id="infografik-lg" class="img-fluid" src="/images/assets/experience-center-web.jpg" alt="">
      <img id="infografik-sm" class="img-fluid" src="/images/assets/experience-center-mobile.jpg" alt="">
      <br><br>
      @include('partials.about_harbolnas')
    </div>
  </section>
  @include('partials.side_socmed')

@endsection
