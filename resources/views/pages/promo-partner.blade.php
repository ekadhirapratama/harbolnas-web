@extends('layouts.pages_layout')

@section('title')
  Promo Partner | Harbolnas
@endsection

@section('styles')
  <style>
    .text-left.c-gray-dark.m-t-64 {
      margin-top: 0;
    }
  </style>
@endsection

@section('content')
  <section class="sec-content sec-content-gray">
    <div class="container">
      {{-- SATU PROMO --}}
      @include('partials.partner')
      @include('partials.about_harbolnas')
    </div>
  </section>
  @include('partials.side_socmed')
@endsection
