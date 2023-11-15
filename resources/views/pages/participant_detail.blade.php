@extends('layouts.pages_layout')

@section('title')
  Peserta | Harbolnas
@endsection

@section('styles')
  <style>
    .fg-default:hover {
        background-color: rgba(0, 0, 0, 0.4);
    }
    .head-sec {
      min-height: 0;
    }
    .bg-img-cover > .container {
      padding-top: 50px;
      padding-bottom: 50px;
    }
    .m-t {
      margin-top: 16px;
    }
  </style>
@endsection

@section('content')
  <section class="head-sec">
    <div class="bg-img-cover" style="background-image: url('{{$url_banner}}')">
      <div class="container">
        <h1>{{$selected_category['name']}}</h1>
        {{-- <p class="content-w-50">
          Lorem ipsum dolor sit amet, possim oblique equidem mea ut. Mei equidem propriae eu, ad quo salutandi gloriatur. Ut vis solum malorum. Iudico repudiandae disputationi eos ea. Vel amet oblique omittam in, ei sea zril copiosae.
        </p> --}}
      </div>
    </div>
  </section>
  <section class="sec-content sec-content-gray">
    <div class="container text-center">
      @include('partials.category')
      @include('partials.content_promo')
      @include('partials.about_harbolnas')
    </div>
  </section>
  @include('partials.side_socmed')
@endsection
