@extends('layouts.app')
@section('content')
    <h3 align="center">Expense Category</h3>
    <div align="right">
        <button type="button" id="add_category" class="btn btn-primary">
            Add Category
        </button>
    </div>
    <br />
  <div class="table-responsive">
        <table class="table table-bordered table-striped" id="expensecategory_table">
          <tr>
              <th width="35%">Display Name</th>
              <th width="35%">Description</th>
              <th width="35%">Created at</th>
          </tr>
          @foreach($expenseCat as $row)
          <tr>
              <td id={{$row->id}}>{{$row->name}}</td>
              <td>{{$row->description}}</td>
              <td>{{$row->created_at}}</td>
          </tr>
          @endforeach
      </table>
  </div>
 
<!-- Modal -->
<div class="modal fade" id="categoryModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Add Category</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
            <form  method="POST" id="expensecategory_form">
                <div class="form-group row">
                  <label for="inputEmail3" class="col-sm-3 col-form-label">Display Name</label>
                  <div class="col-sm-9">
                    <input type="text" name="name" id="name" class="form-control" placeholder="Display Name">
                  </div>
                </div>
                <div class="form-group row">
                    <label for="inputEmail3" class="col-sm-3 col-form-label">Description</label>
                    <div class="col-sm-9">
                      <input type="text" name="description" id="description" class="form-control" placeholder="Description">
                    </div>
                </div>
        </div>
        <div class="modal-footer">
            <input type="hidden" name="action" id="action" />
            <input type="hidden" name="hidden_id" id="hidden_id" />
            <button type="submit" name="delete" class="btn btn-danger delete_expense_category ">Delete </button>
            <input type="submit" name="action_button" id="action_button" class="btn btn-success" value="Add" />

        </div>
        @csrf
      </form>
      </div>
    </div>
  </div>
@endsection