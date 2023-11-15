@extends('layouts.pages_layout')

@section('title')
  Peserta | Harbolnas
@endsection

@section('styles')
  <style>
    .fg-default:hover {
        background-color: rgba(0, 0, 0, 0.4);
    }
  </style>
@endsection

@section('content')
  <section class="sec-content sec-content-gray">
    <div class="container text-center">
      @include('partials.category')
      {{-- <h1 class="m-b-md">Peserta Harbolnas</h1>
      <div class="row m-b-md m-h--8">
        @for ($i=0; $i < 48; $i++)
        <div class="col-6 col-sm-2 padd-8">
          <div class="card-sm bg-img-cover" style="background-image: url('/images/dummy-logo.png')">
            <img class="img-dummy" src="/images/dummy-logo.png" width="100%"/>
          </div>
        </div>
        @endfor
      </div> --}}
      <a target="_blank" href="https://www.shopback.co.id/harbolnas">
        <img src="/images/Resources/bottom-banner.jpg" width="100%" class="m-b-md"/>
      </a>
      {{-- <div class="text-left">
        <ul class="pagination">
          <li>
            <a href="#"><</a>
          </li>
          <li>
            <a href="#">1</a>
          </li>
          <li class="active">
            <a href="#">2</a>
          </li>
          <li>
            <a href="#">3</a>
          </li>
          <li>
            <a href="#">...</a>
          </li>
          <li>
            <a href="#">12</a>
          </li>
          <li>
            <a href="#">13</a>
          </li>
          <li>
            <a href="#">></a>
          </li>
        </ul>
      </div> --}}
      @include('partials.about_harbolnas')
    </div>
  </section>
  @include('partials.side_socmed')
@endsection
