@php
  use App\InitCategory;

  $cats = InitCategory::all();
@endphp

<footer id="footer">
  <div  class="container">
    <div class="footer">
      <h6 class="c-r">Hari Belanja Online Nasional</h6>
      <a href="/tentang-harbolnas">Tentang Harbolnas</a>
      <a href="/edisi-produk-lokal">Edisi Produk Lokal</a>
      <a href="/peserta-harbolnas">Promo Peserta</a>
      <a href="/promo-partner">Promo Partner</a>
    </div>
    <div class="footer">
      <h6 class="c-r">Kategori</h6>
      @foreach ($cats as $cat)
        <a href="/peserta-harbolnas/detail?kategori={{urlencode($cat['name'])}}&id={{$cat['id']-1}}">
          {{$cat['name']}}
        </a>
      @endforeach
    </div>
    <div class="footer socmed">
      <a target="_blank" href="https://www.facebook.com/harbolnasid2018/?epa=SEARCH_BOX">
        <div class="fa-container circle" style="background-color:#3B5998;">
          <span class="fa fa-facebook"></span>
        </div>
      </a>
      <a target="_blank" href="https://www.instagram.com/harbolnas.id/">
        <div class="fa-container circle" style="background-color:#D500F9;">
          <span class="fa fa-instagram"></span>
        </div>
      </a>
      {{-- <a href="#">
        <div class="fa-container circle" style="background-color:#2196F3;">
          <span class="fa fa-twitter"></span>
        </div>
      </a> --}}

      {{-- <a href="#">
        <div class="fa-container circle" style="background-color:#E53935;">
          <span class="fa fa-youtube-play"></span>
        </div>
      </a> --}}
    </div>
    <div class="footer credits">
      <span class="c-g-500" style="font-size: 14px">Powered by</span>
      <a href="https://www.shopback.co.id/harbolnas">
        <img id="footer-sb-logo" src="/images/sb-logo-red.png" alt="harbolnas 2018 di shopback">
      </a>
    </div>
  </div>
</footer>
<div id="grad1"></div>
