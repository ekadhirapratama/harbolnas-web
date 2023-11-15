@extends('layouts.admin_layout')

@section('title_page')
  User Management
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
  </style>
@endsection

@section('contents')
  <div class="row">

    <div class="col-md-6">
      <div class="panel panel-default">
        <div class="panel-body">
          <h3>Buat User</h3>
          <form class="form-horizontal m-t-md" action="/user-management/create" method="post">
            {{ csrf_field() }}
            @include('partials.form_user')

            <div class="m-t-lg m-b-md" style="text-align: center">
              <button type="submit" class="w-sm btn btn-success">Submit</button>
            </div>
          </form>
        </div>
      </div>
    </div>

    <div class="col-md-12">
      <div class="panel panel-default">
        <div class="panel-body">
          <h3>Data User</h3>
          <div class="table-responsive">
            <table id="table-data" class="table b-t b-b">
              <thead>
                <tr>
                  <th>Nama User</th>
                  <th>Email</th>
                  @if (Auth::user()->role == 1)
                    <th>Role</th>
                  @endif
                  <th>Status</th>
                  <th>Action</th>
                </tr>
              </thead>
              <tbody>
                @foreach ($user_lists as $user_list)
                  @php
                    $id = "USR-".$user_list['id'];
                  @endphp
                  <tr id="{{$id}}">
                    <th>{{$user_list['name']}}</th>
                    <th>{{$user_list['email']}}</th>
                    @if (Auth::user()->role == 1)
                      <th>{{$user_list->init_role['name']}}</th>
                    @endif
                    @if ($user_list['status'] == 1)
                      <th class="text-success"><i>Aktif</i></th>
                    @elseif ($user_list['status'] == -2)
                      <th class="text-danger"><i>Telah Dihapus</i></th>
                    @else
                      <th class="text-danger"><i>Block</i></th>
                    @endif
                    <th>
                      <i onclick="editdata('{{$id}}')" class="text-muted fa fa-pencil m-r-md"></i>
                      @if ($user_list['status'] != -2)
                        <i onclick="deletedata('{{$id}}')" class="c-red text-muted fa fa-close"></i>
                      @endif
                    </th>
                  </tr>
                @endforeach
              </tbody>
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
          <h3>Edit User</h3>
        </div>
        <div class="modal-body">
          <form class="form-horizontal m-t-md" action="/user-management/edituser" method="post" role="form">
            {{ csrf_field() }}
            <input id="user_id" class="hidden" type="text" name="id" value="">
            @if (Auth::user()->role == 1)
              <div class="form-group">
                <label for="role" class="col-sm-3 control-label">Role User</label>
                <div class="col-sm-8">
                  <select id="user_role" required class="form-control" name="role">
                    <option disabled selected>- Pilih Role User -</option>
                    @foreach ($roles as $role)
                      <option value={{$role['id']}}>{{$role['name']}}</option>
                    @endforeach
                  </select>
                </div>
              </div>
            @else
              <input id="user_role" class="hidden" type="text" name="role" value=3>
            @endif
            <div class="form-group">
              <label for="name" class="col-sm-3 control-label">Nama</label>
              <div class="col-sm-8">
                <input id="user_name" required type="text" name="name" class="form-control" placeholder="Nama">
              </div>
            </div>
            <div class="form-group">
              <label for="email" class="col-sm-3 control-label">Email</label>
              <div class="col-sm-8">
                <input id="user_email" required type="text" name="email" class="form-control" placeholder="Email">
              </div>
            </div>
            <div class="form-group">
              <label for="password" class="col-sm-3 control-label">Password</label>
              <div class="col-sm-8">
                <input id="user_password" type="text" name="password" class="form-control" placeholder="Reset Password">
              </div>
            </div>
            <div class="form-group">
              <label for="user-action" class="col-sm-3 control-label">Action</label>
              <div class="col-sm-4">
                <select id="user-action" class="form-control" name="user_action">
                  <option disabled selected>- Pilih Aksi -</option>
                  <option value="1">Aktif</option>
                  <option value="-1">Block</option>
                  <option value="-2">Hapus</option>
                </select>
              </div>
            </div>

            <div class="m-t-lg m-b-md" style="text-align: center">
              <button type="submit" class="w-sm btn btn-success">Submit</button>
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
          <h3 class="">Apakah anda yakin menghapus User ini?</h3>
          <div class="m-t-md" >
            <form class="" action="/user-management/destroy" method="post">
              {{ csrf_field() }}
              <input class="hidden" id="del-id" type="text" name="id" value="">
              <button class="font-bold btn btn-info w-sm m-r-sm" type="submit" name="button">Ya</button>
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
    $('#table-data').DataTable();
  </script>
  <script>
    function editdata(id) {
      $.ajax({
        url: "/user-management/"+id+"/view",
        success: function(res){
          console.log(res);
          $('#user_id').val(res.id);
          $('#user_role').val(res.role);
          $('#user_name').val(res.name);
          $('#user_email').val(res.email);
          $('#user-action').val(res.status);
        }
      });
      $('#editModal').modal('show');
    }

    function deletedata(id) {
      $.ajax({
        url: "/user-management/"+id+"/view",
        success: function(res){
          $('#del-id').val(res.id);
        }
      });
      $('#delete-confirm').modal('show');
    }
  </script>
@endsection
