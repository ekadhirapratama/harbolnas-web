@extends('layouts.pages_layout')

@section('title')
  Registrasi
@endsection

@section('content')
  <section class="sec-content sec-content-gray">
    <div class="container">

      <h1 class="m-b-lg text-center">FORM REGISTRASI PESERTA HARBOLNAS 2018</h1>
      <form action="/register" method="post" class="col-lg-4 offset-lg-4">
        {{ csrf_field() }}
        <div class="form-group">
          <label for="name">Nama</label>
          <input required type="text" id="name" name="name" class="form-control" placeholder="Nama" value="{{ old('name') }}">
        </div>
        <div class="form-group">
          <label for="email">Email address</label>
          @if ($errors->has('email'))
            <input required type="email" id="email" name="email" class="form-control is-invalid" placeholder="Email" value="{{ old('email') }}">
            <small id="email-help" class="form-text m-1 invalid-feedback">{{$errors->first('email')}}</small>
          @else
            <input required type="email" id="email" name="email" class="form-control" placeholder="Email">
          @endif
        </div>
        <div class="form-group m-b-lg">
          <label for="password">Password</label>
          <input required type="password" id="password" name="password" class="form-control" placeholder="Password">
        </div>
        <div class="col-12 text-center m-b-lg">
          <button type="submit" class="btn w-50 btn-primary badge-pill">Register</button>
        </div>
      </form>

    </div>
  </section>
@endsection

@section('scripts')
  <script>
    $('#email').on('keyup', function(){
      $('#email').removeClass('is-invalid');
      $('#email-help').slideUp(3000);
    });
  </script>
@endsection
