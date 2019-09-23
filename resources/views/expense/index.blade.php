@extends('layouts.app')
@section('content')
    <h3 align="center">Expense</h3>
    <div align="right">
        <button type="button" id="add_expense" class="btn btn-primary">
            Add Expense
        </button>
    </div>
    <br />
  <div class="table-responsive">
        <table class="table table-bordered table-striped" id="expense_table">
          <tr>
              <th width="35%">Expense Category</th>
              <th width="20%">Amount</th>
              <th width="25%">Entry Date</th>
              <th width="30%">Created at</th>
          </tr>
          @foreach($expense as $row)
          <tr>
              <td id={{$row->id}}>{{$row->expense_category}}</td>
              <td>Php {{$row->amount}}</td>
              <td>{{$row->entry_date}}</td>
              <td>{{$row->created_at}}</td>
          </tr>
          @endforeach
      </table>
  </div>
 
<!-- Modal -->
<div class="modal fade" id="expenseModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Add Expense</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
            <form id="expense_form" method="POST">
                <div class="form-group row">
                  <label for="inputEmail3" class="col-sm-3 col-form-label">Expense Category</label>
                  <div class="col-sm-9">
                    <select name="category" id="category" class="form-control" required>
                      <option value="">Please Select</option>
                       @foreach($expenseCategory as $category)
                         <option value="{{ $category->name }}">{{ $category->name }}</option>
                     @endforeach
                    </select>
                  </div>
                </div>
                <div class="form-group row">
                    <label for="inputEmail3" class="col-sm-3 col-form-label">Amount</label>
                    <div class="col-sm-9">
                      <input type="number" name="amount" id="amount" min='1' class="form-control" placeholder="Amount">
                    </div>
                </div>
                <div class="form-group row">
                  <label for="inputEmail3" class="col-sm-3 col-form-label">Entry Date</label>
                  <div class="col-sm-9">
                    <input type="date" name="ent_date" id="ent_date" class="form-control" placeholder="Amount">
                  </div>
              </div>
        </div>
        <div class="modal-footer">
            <input type="hidden" name="action" id="action" />
            <input type="hidden" name="hidden_id" id="hidden_id" />
            <button type="submit" name="delete" class="btn btn-danger delete_expense ">Delete </button>
            <input type="submit" name="action_button" id="action_button" class="btn btn-success" value="Add" />

        </div>
        @csrf
      </form>
      </div>
    </div>
  </div>
@endsection