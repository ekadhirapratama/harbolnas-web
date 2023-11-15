<div class="row m-b-64 m-h--8">
  @foreach ($categories as $key => $category)
    <div class="col-6 col-sm-3 padd-8">
      <a class="parenthover" href="/peserta-harbolnas/detail?kategori={{urlencode($category['name'])}}&id={{$category['id']-1}}#content_promo">
        <div class="card-sm bg-img-cover relative hovereffect" style="background-image: url('{{$category['url_cover']}}')">
          <img class="img-dummy" src="/images/dummy-category.png" width="100%" alt="{{$category['name']}}"/>
        </div>
      </a>
    </div>
  @endforeach
</div>
