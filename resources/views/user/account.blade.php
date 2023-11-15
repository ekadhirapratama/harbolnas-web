@extends('layouts.admin_layout')

@section('title_page')
  Acccount Setting
@endsection

@section('contents')
  <div class="row">

    <div class="col-md-6">
      <div class="panel panel-default">
        <div class="panel-body">
          <h3>Data Akun</h3>
          <form class="form-horizontal m-t-md" action="/account-setting/editprofile" method="post" role="form">
            {{ csrf_field() }}
            <div class="form-group">
              <label for="name" class="col-sm-3 control-label">Nama</label>
              <div class="col-sm-9">
                <input type="text" id="name" name="name" class="form-control" value="{{Auth::user()->name}}" placeholder="Name">
              </div>
            </div>
            <div class="form-group">
              <label for="email" class="col-sm-3 control-label">Email</label>
              <div class="col-sm-9">
                <input type="email" id="email" name="email" class="form-control" value="{{Auth::user()->email}}" placeholder="Email">
              </div>
            </div>
            <div class="form-group">
              <label for="email" class="col-sm-3 control-label">Password</label>
              <div class="col-sm-9">
                <button data-toggle="modal" data-target="#change-password" class="no-border" type="button" name="button" style="background:transparent">Ganti Password</button>
              </div>
            </div>

            <div class="m-t-lg m-b-md" style="text-align: center">
              <button type="submit" class="w-sm btn btn-success">Simpan</button>
            </div>
          </form>
        </div>
      </div>
    </div>

  </div>

@endsection

@section('modal')
  <div id="change-password" class="modal fade" role="dialog">
    <div class="modal-dialog modal-dialog-centered">

      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close text-2x" data-dismiss="modal">&times;</button>
          <h3>Ganti Password</h3>
        </div>
        <div class="modal-body">
          <form class="form-horizontal m-t-md" action="/account-setting/changepass" method="post" role="form">
            {{ csrf_field() }}
            <div class="form-group">
              <label for="password-old" class="col-sm-3 control-label">Password Lama</label>
              <div class="col-sm-8">
                <input required type="password" id="password-old" name="password_old" class="form-control" placeholder="********">
              </div>
            </div>
            <div class="form-group">
              <label for="password-new" class="col-sm-3 control-label">Password Baru</label>
              <div class="col-sm-8">
                <input required type="password" id="password-new" name="password_new" class="form-control" placeholder="********">
              </div>
            </div>
            <div class="form-group">
              <label for="password-confirm" class="col-sm-3 control-label">Konfirmasi Password</label>
              <div class="col-sm-8">
                <input required type="password" id="password-confirm" name="password_confirm" class="form-control" placeholder="********">
              </div>
            </div>

            <div class="m-t-lg m-b-md" style="text-align: center">
              <button type="submit" class="w-sm btn btn-success">Simpan</button>
            </div>
          </form>
        </div>
      </div>

    </div>
  </div>
@endsection
