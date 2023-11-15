@foreach ($promos as $promo)
  <div class="col-sm-4 padd-8">
    <a target="_blank" href="{{$promo['url']}}">
      <div class="card-sm bg-img-cover" style="background-image: url('{{env('APP_ASSET').$promo['url_banner']}}')">
        <img class="img-dummy" src="/images/400x200.png" width="100%"/>
      </div>
    </a>
  </div>
@endforeach
