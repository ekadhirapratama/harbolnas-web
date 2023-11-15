<div class="form-group">
  <label for="jenis-promo" class="col-sm-3 control-label">Jenis Promo</label>
  <div class="col-sm-8">
    <select required class="form-control" name="type_id">
      <option disabled selected>- Pilih Jenis Promo -</option>
      @foreach ($types as $type)
        <option value="{{$type['id']}}">{{$type['name']}}</option>
      @endforeach
    </select>
  </div>
</div>
<div class="form-group">
  <label for="kategori" class="col-sm-3 control-label">Kategori</label>
  <div class="col-sm-8">
    <select required class="form-control" name="category_id">
      <option disabled selected>- Pilih Kategori -</option>
      @foreach ($categories as $category)
        <option value="{{$category['id']}}">{{$category['name']}}</option>
      @endforeach
    </select>
  </div>
</div>
<div class="form-group">
  <label for="promo-link" class="col-sm-3 control-label">Link Promo</label>
  <div class="col-sm-8">
    <input required type="url" name="url" class="form-control" placeholder="http://">
  </div>
</div>
<div class="form-group">
  <label for="promo-banner" class="col-sm-3 control-label">Submit Banner</label>
  <div class="col-sm-8">
    <input required type="file" name="url_banner" accept="image/*">
  </div>
</div>
