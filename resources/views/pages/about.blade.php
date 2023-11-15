@extends('layouts.pages_layout')

@section('title')
  Tentang Harbolnas
@endsection

@section('styles')
  <style>
    .head-sec {
      min-height: 0;
    }
    .bg-img-cover > .container {
      padding-top: 120px;
      padding-bottom: 120px;
    }
  </style>
@endsection

@section('content')
  <section class="head-sec">
    <div class="bg-img-cover" style="background-image: url('/images/Resources/main-banner.jpg')">
      <div class="container text-center">
        <h1>Tentang Harbolnas</h1>
        <p>
          Hari Belanja Online Nasional (HARBOLNAS) merupakan kegiatan tahunan yang diselenggarakan bersama oleh berbagai e-commerce di Indonesia pada 12 Desember 2018 dengan dukungan dari sejumlah mitra, seperti pelaku industri telekomunikasi, perbankan, logisitik hingga media. Diselenggarakan pertama kali pada tahun 2012 melalui inisiatif dari Lazada Indonesia, Zalora, Blanja, PinkEmma, Berrybenka dan Bukalapak. Harbolnas kini telah menginjak tahun keenam, dengan lebih dari 250 e-commerce yang berpartisipasi.
        </p>
      </div>
    </div>
  </section>
  <section class="sec-content sec-content-gray">
    <div class="container text-center">
      <h1 class="m-b-md">Rangkaian Promo</h1>
      <div class="row text-left m-h--8">
        <div class="col-sm-6 padd-8">
          <div class="card padd-16 c-gray">
            <div class="card-sm bg-img-cover m-b-lg" style="background-image: url('/images/assets/11_12_revisi2.png')">
              <img class="img-dummy" src="/images/assets/1111.jpg" width="100%"/>
            </div>
            <p class="font-weight-light">
              11 Desember 2018
            </p>
            <h1 class="c-gray-dark">Harbolnas: Edisi Produk Lokal</h1>
            <p class="font-weight-light">
              Khusus di Harbolnas tahun ini, kami mendedikasikan 1 hari spesial yaitu 11 Desember 2018 untuk menyediakan promo khusus produk lokal dan UMKMl mulai dari fashion, makanan, elektronik, perlengkapan rumah tangga, hingga travelling keliling Indonesia!
            </p>
            <a href="/edisi-produk-lokal">
              <button class="w-128 btn btn-black badge-pill">Cari Tahu</button>
            </a>
          </div>
        </div>
        <div class="col-sm-6 padd-8">
          <div class="card padd-16 c-gray">
            <div class="card-sm bg-img-cover m-b-lg" style="background-image: url('/images/assets/1212.jpg')">
              <img class="img-dummy" src="/images/assets/1212.jpg" width="100%"/>
            </div>
            <p class="font-weight-light">
              12 Desember 2018
            </p>
            <h1 class="c-gray-dark">Harbolnas 12.12</h1>
            <p class="font-weight-light">
              Hari Belanja Online Nasional adalah festival belanja online terbesar di Indonesia yang akan berlangsung 1 hari di 12 Desember 2018 dimana kamu bisa mendapatkan berbagai macam promo terbaik dari 300 e-commerce di Indonesia.
            </p>
            <a href="/promo-partner">
              <button class="w-128 btn btn-black badge-pill">Cari Tahu</button>
            </a>
          </div>
        </div>
      </div>
      @include('partials.about_harbolnas')
    </div>
  </section>
  @include('partials.side_socmed')
@endsection
