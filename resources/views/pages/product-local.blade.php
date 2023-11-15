@extends('layouts.pages_layout')

@section('title')
  Edisi Produk Lokal | Harbolnas
@endsection

@section('styles')
  <style>
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
    <div class="bg-img-cover" style="background-image: url('/images/Resources/edisi-produk-lokal.jpg')">
      <div class="container">
        <img class="content-w-sm" src="/images/Resources/harbolnas-produk-lokal-white-new.png" alt="">
        <p class="m-t content-w-md">
          Dukung produk lokal di Harbolnas!
          <br>
          Dapatkan promo spesial dari brand lokal Indonesia,
          produk makanan Indonesia, hingga traveling keliling Indonesia.
        </p>
        <a href="#content_spesial">
          <button type="button" class="btn btn-custom-white btn-w-sm">Lihat Promo</button>
        </a>
      </div>
    </div>
  </section>
  <section class="sec-content sec-content-gray">
    <div class="container text-center">
      <h1 id="content_spesial" class="m-b-md">Spesial Promo Produk Lokal</h1>
      <div class="row m-b-md m-h--8">
        @foreach ($spesial_promos as $spesial)
          <div class="col-sm-4 padd-8">
            <a target="_blank" href="{{$spesial['url']}}">
              <div class="card-sm bg-img-cover" style="background-image: url('{{$spesial['url_banner']}}')">
                <img class="img-dummy" src="/images/400x200.png" width="100%"/>
              </div>
            </a>
          </div>
        @endforeach
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
