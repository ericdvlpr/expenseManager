@extends('layouts.app')
@section('content')
<div class="container">    
  <h3 align="center">Users</h3>
    <div align="right">
        <button type="button" id="add_user" class="btn btn-primary">
            Add User
        </button>
    </div>
    <br />
  <div class="table-responsive">
        <table class="table table-bordered table-striped" id="user_table">
          <tr>
              <th width="10%">Name</th>
              <th width="35%">Email</th>
              <th width="35%">Role</th>
              <th width="30%">Created at</th>
          </tr>
          @foreach($data as $row)
          <tr>
              <td id={{$row->id}}>{{$row->name}}</td>
              <td>{{$row->email}}</td>
              <td>{{ $row->rolename }}</td>
              <td>{{$row->created_at}}</td>
          </tr>
          @endforeach
      </table>
  </div>
</div>
<!-- Modal -->
<div class="modal fade" id="userModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Add User</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
            <form method="POST" id="user_form">
                <div class="form-group row">
                  <label for="inputEmail3" class="col-sm-2 col-form-label">Name</label>
                  <div class="col-sm-10">
                    <input type="text" name="name" id="name" class="form-control"  placeholder="Name">
                  </div>
                </div>
                <div class="form-group row">
                    <label for="inputEmail3" class="col-sm-2 col-form-label">Email</label>
                    <div class="col-sm-10">
                      <input type="email" name="email" id="email" class="form-control"  placeholder="Email">
                    </div>
                </div>
                <div class="form-group row">
                  <label for="inputEmail3" class="col-sm-2 col-form-label">Password</label>
                  <div class="col-sm-10">
                    <input type="password" name="password" id="password" class="form-control"  placeholder="Password">
                  </div>
              </div>
                <div class="form-group row">
                  <label for="inputPassword3" class="col-sm-2 col-form-label">Role</label>
                  <div class="col-sm-10">
                   <select name="role" id="role" class="form-control" required>
                     <option value="">Please Select</option>
                      @foreach($role as $roles)
                        <option value="{{ $roles->id }}">{{ $roles->name }}</option>
                    @endforeach
                   </select>
                  </div>
                </div>
              
        </div>
        <div class="modal-footer">
            <button type="submit" name="delete" class="btn btn-danger delete_user ">Delete </button>
            <input type="hidden" name="action" id="action" />
            <input type="hidden" name="hidden_id" id="hidden_id" />
            <input type="submit" name="action_button" id="action_button" class="btn btn-success" value="Add" />

        </div>
        @csrf
      </form>
      </div>
    </div>
  </div>
@endsection