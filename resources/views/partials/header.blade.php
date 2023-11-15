<nav class="navbar navbar-expand-md navbar-light bg-primary" style="z-index: 3;">
  <div class="container" style="position:relative; padding-left: 12px; padding-right: 12px;">
    <a class="navbar-brand nav-logo" href="/">
      <img src="/images/Resources/logo-harbolnas.png" alt="">
    </a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
      <span class="fa fa-bars c-w"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNavAltMarkup" style="">
      <div class="navbar-nav">
        <a class="navbar-brand c-w {{Request::is('tentang-harbolnas/*') || Request::is('tentang-harbolnas') ? 'font-weight-bold' : ''}}" href="/tentang-harbolnas">Tentang Harbolnas</a>
        <a class="navbar-brand c-w {{Request::is('edisi-produk-lokal/*') || Request::is('edisi-produk-lokal') ? 'font-weight-bold' : ''}}" href="/edisi-produk-lokal">Edisi Produk Lokal</a>
        <a class="navbar-brand c-w {{Request::is('peserta-harbolnas/*') || Request::is('peserta-harbolnas') ? 'font-weight-bold' : ''}}" href="/peserta-harbolnas">Promo Peserta</a>
        <a class="navbar-brand c-w {{Request::is('promo-partner/*') || Request::is('promo-partner') ? 'font-weight-bold' : ''}}" href="/promo-partner">Promo Partner</a>
      </div>
      <div class="navbar-nav">
        <a class="navbar-brand c-w" href="/experience-center">
          <img id="exp-ctr" src="/images/Resources/experience-center-thumb.png" alt="">
        </a>
      </div>
      <div class="navbar-nav nav-right">
        @if (Auth::guest())
          <button id="login" type="button" class="btn btn-custom-white">LOGIN</button>
          <div id="form-login" class="card" style="display:none">
            {{-- <h5 class="card-title bg-primary c-w text-center" style="overflow:hidden; margin-bottom:0;">Login</h5> --}}
            <div class="card-body">
              <form class="" action="/login" method="post">
                {{ csrf_field() }}
                <div class="input-group">
                  <div class="input-group-prepend">
                    <div class="input-group-text fa fa-envelope"></div>
                  </div>
                  <input class="form-control" type="email" name="loginemail" value="{{old('loginemail')}}" placeholder="email">
                </div>
                <div class="input-group">
                  <div class="input-group-prepend">
                    <div class="input-group-text fa fa-lock" style="font-size:24px"></div>
                  </div>
                  <input class="form-control" type="password" name="loginpassword" value="{{old('loginpassword')}}" placeholder="password">
                </div>
                @if ($errors->any())
                  <div class="invalid-feedback">
                    {{$errors->first()}}
                  </div>
                @endif

                <button class="btn btn-primary" type="submit" name="button" style="border-radius:30px">Login</button>
              </form>
            </div>
          </div>
        @else
          <a class="navbar-brand c-w font-weight-bold" href="/dashboard">Dashboard</a>
        @endif
      </div>
    </div>
  </div>
</nav>
