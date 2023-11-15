@if (Auth::user()->role == 1)
  <div class="form-group">
    <label for="role" class="col-sm-3 control-label">Role User</label>
    <div class="col-sm-8">
      <select required class="form-control" name="role">
        <option disabled selected>- Pilih Role User -</option>
        @foreach ($roles as $role)
          <option value={{$role['id']}}>{{$role['name']}}</option>
        @endforeach
      </select>
    </div>
  </div>
@else
  <input class="hidden" type="text" name="role" value=3>
@endif
<div class="form-group">
  <label for="name" class="col-sm-3 control-label">Nama</label>
  <div class="col-sm-8">
    <input required type="text" name="name" class="form-control" placeholder="Nama">
  </div>
</div>
<div class="form-group">
  <label for="email" class="col-sm-3 control-label">Email</label>
  <div class="col-sm-8">
    <input required type="text" name="email" class="form-control" placeholder="Email">
  </div>
</div>
<div class="form-group">
  <label for="password" class="col-sm-3 control-label">Password</label>
  <div class="col-sm-8">
    <input required type="text" name="password" class="form-control" placeholder="Password">
  </div>
</div>
{{-- <div class="form-group">
  <label for="url_photo" class="col-sm-3 control-label">Foto</label>
  <div class="col-sm-9">
    <input type="file" id="url_photo" name="url_photo">
  </div>
</div> --}}
