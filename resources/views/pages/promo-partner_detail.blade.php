@extends('layouts.pages_layout')

@section('title')
  Harbolnas
@endsection

@section('styles')
  <style>
    /* .text-left.c-gray-dark.m-t-64 {
      margin-top: 0;
    } */
    .head-sec {
      min-height: 0;
    }

    .m-t {
      margin-top: 16px;
    }

    .bg-img-contain > .container {
      padding: 62px 72px;
    }

    @media (max-width: 575px) {
      .bg-img-contain > .container {
        padding-top: 52px;
        padding-bottom: 52px;
      }

      .word-table {
        width: 8px !important;
      }

      .word-table > tbody > tr > td {
        font-size: 11px;
        padding: 0px !important;
      }
    }

    .word-header {
      font-size: 18px;
    }

    .word-small {
      font-size: 12px;
    }

    .word-padding {
      padding-left: 16px;
    }

  </style>
@endsection

@section('content')
  <section class="head-sec">
    <div class="bg-img-contain" style="background-image: url('{{$url_banner}}'); background-color:#ebebeb;">
      <div class="container">
      </div>
    </div>
  </section>
  <section class="sec-content sec-content-gray">
    <div class="container text-center">
      @include('partials.content_promo')
      @include('partials.about_harbolnas')
    </div>
  </section>

  @include('partials.side_socmed')
@endsection
