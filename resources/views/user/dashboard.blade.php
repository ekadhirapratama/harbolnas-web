@extends('layouts.admin_layout')

@section('title_page')
  Dashboard
@endsection

@section('styles')
  <link rel="stylesheet" href="/plugins/template/plugins/integration/bootstrap/3/dataTables.bootstrap.css">
  <style media="screen">
    tbody > tr > th {
      font-weight: 400;
    }

    .c-red {
      color: #ff5252;
    }

    i.fa {
      cursor: pointer;
      font-size: 18px;
    }
    .header-warning {
      padding: 8px;
      background-color: #ffc107;
      color: #ffffff;
    }

    #promo-preview {
      background-position: center;
      background-repeat: no-repeat;
      background-size: contain;
    }

    #promo-preview > img {
      opacity: 0;
      pointer-events: none;
    }
  </style>
@endsection

@section('contents')
  <div class="row">
    @if (Auth::user()->status > 0)
      <div class="col-md-6">
        <div class="panel panel-default">
          <div class="panel-body">
            <h3>Form Upload Banner</h3>
            <form class="form-horizontal m-t-md" role="form" action="/dashboard/uploadbanner" method="post" enctype="multipart/form-data">
              {{ csrf_field() }}
              @include('partials.form_banner')

              <div class="m-t-lg m-b-md" style="text-align: center">
                <button type="submit" class="w-sm btn btn-success">Submit</button>
              </div>
            </form>
          </div>
        </div>
      </div>
    @endif

    <div class="col-md-12">
      <div class="panel panel-default">
        <div class="panel-body">
          <h3>Data Promo</h3>
          <div class="table-responsive">
            <table id="table-data" class="table b-t b-b">
              @if (Auth::user()->role == 3)
                <thead>
                  <tr>
                    <th>Tanggal Submit</th>
                    <th>Jenis Promo</th>
                    <th>Kategori</th>
                    <th>Link Promo</th>
                    <th>Status</th>
                    <th>Action</th>
                  </tr>
                </thead>
                <tbody>
                  @foreach ($promos as $promo)
                    @php
                      $id = "promo".$promo['user_id']."-".$promo['id'];
                    @endphp
                    <tr id="{{$id}}">
                      <th>{{$promo['created_at']}}</th>
                      <th>{{$promo->type['name']}}</th>
                      <th>{{$promo->category['name']}}</th>
                      <th>
                        <a href="{{$promo['url']}}">{{$promo['url']}}</a>
                      </th>
                      @if ($promo['status'] == 1)
                        <th class="text-success"><i>Verified</i></th>
                      @elseif ($promo['status'] < 0)
                        <th class="text-danger"><i>Telah Dihapus</i></th>
                      @else
                        <th class="text-warning"><i>Menunggu Verifikasi</i></th>
                      @endif
                      <th>
                        @if ($promo['status'] != -2 && Auth::user()->id == $promo['user_id'] && Auth::user()->status > 0)
                          <i onclick="editdata('{{$id}}')" class="text-muted fa fa-pencil m-r-md"></i>
                          <i onclick="deletedata('{{$id}}')" class="c-red text-muted fa fa-close"></i>
                        @endif
                      </th>
                    </tr>
                  @endforeach
                </tbody>
              @else
                <thead>
                  <tr>
                    <th>Tanggal Submit</th>
                    <th>Email</th>
                    <th>Jenis Promo</th>
                    <th>Kategori</th>
                    <th>Link Promo</th>
                    <th>Status</th>
                    <th>Action</th>
                  </tr>
                </thead>
                <tbody>
                  @foreach ($promos as $promo)
                    @php
                      $id = "promo".$promo['user_id']."-".$promo['id'];
                    @endphp
                    <tr id="{{$id}}">
                      <th>{{$promo['created_at']}}</th>
                      <th>{{$promo->user['email']}}</th>
                      <th>{{$promo->type['name']}}</th>
                      <th>{{$promo->category['name']}}</th>
                      <th>
                        <a href="{{$promo['url']}}">{{$promo['url']}}</a>
                      </th>
                      @if ($promo['status'] == 1)
                        <th class="text-success"><i>Verified</i></th>
                      @elseif ($promo['status'] == -1)
                        <th class="text-danger"><i>Tidak Sesuai</i></th>
                      @elseif ($promo['status'] == -2)
                        <th class="text-danger"><i>Telah Dihapus</i></th>
                      @else
                        <th class="text-warning"><i>Menunggu Verifikasi</i></th>
                      @endif
                      <th>
                        <i onclick="editdata('{{$id}}')" class="text-muted fa fa-pencil m-r-md"></i>
                        @if ($promo['status'] != -2)
                          <i onclick="deletedata('{{$id}}')" class="c-red text-muted fa fa-close"></i>
                        @endif
                      </th>
                    </tr>
                  @endforeach
                </tbody>
              @endif
            </table>
          </div>
        </div>
      </div>
    </div>

  </div>

@endsection

@section('modal')
  <div id="editModal" class="modal fade" role="dialog">
    <div class="modal-dialog">

      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close text-2x" data-dismiss="modal">&times;</button>
          <h3>Edit Data Promo</h3>
        </div>
        <div class="modal-body">
          <form class="form-horizontal m-t-md" action="/promo/edit" method="post" enctype="multipart/form-data">
            {{ csrf_field() }}
            <input id="promo-id" class="hidden" name="id" value="0">
            <div class="form-group">
              <label for="jenis-promo" class="col-sm-3 control-label">Jenis Promo</label>
              <div class="col-sm-8">
                <select id="jenis-promo" class="form-control" name="type_id">
                  <option disabled>- Pilih Jenis Promo -</option>
                  @foreach ($types as $type)
                    <option value="{{$type['id']}}">{{$type['name']}}</option>
                  @endforeach
                </select>
              </div>
            </div>
            <div class="form-group">
              <label for="kategori" class="col-sm-3 control-label">Kategori</label>
              <div class="col-sm-8">
                <select id="kategori" class="form-control" name="category_id">
                  <option disabled>- Pilih Kategori -</option>
                  @foreach ($categories as $category)
                    <option value="{{$category['id']}}">{{$category['name']}}</option>
                  @endforeach
                </select>
              </div>
            </div>
            <div class="form-group">
              <label for="promo-link" class="col-sm-3 control-label">Link Promo</label>
              <div class="col-sm-8">
                <input id="promo-link" type="url" name="url" class="form-control" placeholder="http://">
              </div>
            </div>
            <div class="form-group">
              <label for="promo-banner" class="col-sm-3 control-label">Submit Banner</label>
              <div class="col-sm-8">
                <input type="file" name="url_banner" accept="image/*" onchange="readURL(this);">
              </div>
            </div>
            <div class="form-group">
              <div id="promo-preview" class="col-sm-offset-2 col-sm-8" >
                <img src="/images/dummy-logo.png" alt="" width="100%">
              </div>
            </div>

            @if (Auth::user()->role != 3)
              <div class="form-group">
                <label for="promo-action" class="col-sm-3 control-label">Action</label>
                <div class="col-sm-4">
                  <select id="promo-action" class="form-control" name="promo_action">
                    <option disabled selected>- Pilih Aksi -</option>
                    <option value="1">Publish</option>
                    <option value="0">Pending</option>
                    <option value="-1">Reject</option>
                    <option value="-2">Hapus</option>
                  </select>
                </div>
              </div>
            @endif

            <div class="m-t-lg m-b-md" style="text-align: center">
              <button type="submit" class="w-sm btn btn-success">Simpan</button>
            </div>
          </form>
        </div>
      </div>

    </div>
  </div>

  <div id="delete-confirm" class="modal fade" role="dialog">
    <div class="modal-dialog modal-dialog-centered">

      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header text-center bg-warning">
          <i class="fa fa-warning" style="font-size: 32px; padding:4px;"></i>
        </div>
        <div class="modal-body text-center m-b-md">
          <h3 class="">Apakah anda yakin menghapus promo ini?</h3>
          <div class="m-t-md" >
            <form class="" action="/promo/delete" method="post">
              {{ csrf_field() }}
              <input id="del-id" class="hidden" type="text" name="id" value="">
              <button class="font-bold btn btn-info w-sm" type="submit" name="button">Ya</button>
              <button class="font-bold btn btn-default w-sm" data-dismiss="modal" type="button" name="button">Tidak</button>
            </form>
          </div>
        </div>
      </div>

    </div>
  </div>
@endsection

@section('scripts')
  <script type="text/javascript" src="/plugins/template//datatables/media/js/jquery.dataTables.min.js"></script>
  <script type="text/javascript" src="/plugins/template/plugins/integration/bootstrap/3/dataTables.bootstrap.js"></script>
  <script>
    $('#table-data').DataTable({
      'order': [0, 'desc']
    });
  </script>
  <script>
    function editdata(id) {
      $.ajax({
        url: "/promo/"+id+"/view",
        // type: "get",
        success: function(res){
          $('#promo-id').val(res.id);
          $('#jenis-promo').val(res.type['id']);
          $('#kategori').val(res.category['id']);
          $('#promo-link').val(res.url);
          $('#promo-action').val(res.status);
          $('#promo-preview').css('background-image',"url('"+res.url_banner+"')");
          $("#editModal :input:not(button):not(#promo-action):not(#promo-id):not(input[name='_token'])").prop('disabled',res.disabled);
        }
      });
      // console.log(id);
      $('#editModal').modal('show');
    }

    function deletedata(id) {
      $.ajax({
        url: "/promo/"+id+"/view",
        // type: "get",
        success: function(res){
          $('#del-id').val(res.id);
        }
      });
      $('#delete-confirm').modal('show');
    }

    function readURL(input) {
      if (input.files && input.files[0]) {
        var reader = new FileReader();

        reader.onload = function (e) {
            $('#promo-preview').css('background-image',"url('"+e.target.result+"')");
        }

        reader.readAsDataURL(input.files[0]);
      }
    }
  </script>
@endsection
