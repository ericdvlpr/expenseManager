<div id="confirmModal" class="modal fade" role="dialog">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h2 class="modal-title">Confirmation</h2>
                </div>
                <div class="modal-body">
                    <h4 align="center" style="margin:0;">Are you sure you want to remove this data?</h4>
                </div>
                <div class="modal-footer">
                 <button type="button" name="ok_button" id="ok_button" class="btn btn-danger">OK</button>
                    <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
                </div>
            </div>
        </div>
    </div>
</body>
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>

<script type="text/javascript">
  $(document).ready(function(){
    $('table tr td').css('cursor', 'pointer'); // 'default' to revert
  $('#add_user').on('click',function(event){
      $('.modal-title').text("Add New User");
      $('#action_button').val("Add");
      $('#action').val("Add");
      $('#userModal').modal('show');
  });
  $('#add_role').on('click',function(event){
      $('.modal-title').text("Add New Role");
      $('#action_button').val("Add");
      $('#action').val("Add");
      $('#roleModal').modal('show');
  });
  $('#add_expense').on('click',function(event){
      $('.modal-title').text("Add New Expense");
      $('#action_button').val("Add");
      $('#action').val("Add");
      $('#expenseModal').modal('show');
  });
  $('#add_category').on('click',function(event){
      $('.modal-title').text("Add New Category");
      $('#action_button').val("Add");
      $('#action').val("Add");
      $('#categoryModal').modal('show');
  });

  $( "#user_table tr td" ).on( "click", function( event ) {
  var id = $(this).attr('id');
      $.ajax({
         url:"/user/"+id+"/edit",
         dataType:"json",
         success:function(html){
              $('#name').val(html.data.name);
              $('#email').val(html.data.email);
              $('#password').val(html.data.password);
              $('#password').attr('readonly',true);
              $('#role').val(html.role.id);
              $('#role').attr('readonly',true);
              $('#hidden_id').val(html.data.id);
              $('#delete').attr('data-id',html.data.id);
              $('.modal-title').text("Edit User");
              $('#action_button').val("Edit");
              $('#action').val("Edit");
              $('#userModal').modal('show');
         } 
      });
  });
  $( "#role_table tr td" ).on( "click", function( event ) {
  var id = $(this).attr('id');
      $.ajax({
         url:"/role/"+id+"/edit",
         dataType:"json",
         success:function(html){
              $('#name').val(html.data.name);
              $('#description').val(html.data.description);
              $('#hidden_id').val(html.data.id);
              $('.modal-title').text("Edit Role");
              $('#action_button').val("Edit");
              $('#action').val("Edit");
              $('#roleModal').modal('show');
         } 
      });
  });
  $( "#expense_table tr td" ).on( "click", function( event ) {
  var id = $(this).attr('id');

      $.ajax({
         url:"/expense/"+id+"/edit",
         dataType:"json",
         success:function(html){
              $('#category').val(html.data.expense_category);
              $('#amount').val(html.data.amount);
              $('#ent_date').val(html.data.entry_date);
              $('#hidden_id').val(html.data.id);
              $('.modal-title').text("Edit Expense");
              $('#action_button').val("Edit");
              $('#action').val("Edit");
              $('#expenseModal').modal('show');
         } 
      });
  });
  $( "#expensecategory_table tr td" ).on( "click", function( event ) {
  var id = $(this).attr('id');
      $.ajax({
         url:"/expense_category/"+id+"/edit",
         dataType:"json",
         success:function(html){
              $('#name').val(html.data.name);
              $('#description').val(html.data.description);
              $('#hidden_id').val(html.data.id);
              $('.modal-title').text("Edit Expense Category");
              $('#action_button').val("Edit");
              $('#action').val("Edit");
              $('#categoryModal').modal('show');
         } 
      });
  });
  $('#user_form').on('submit', function(event){
      event.preventDefault();
      if($('#action').val() == "Add")
      {
          $.ajax({
              url:"{{ route('user.store') }}",
              method:"POST",
              data:new FormData(this),
              contentType: false,
              cache: false,
              processData: false,

              success:function(data){
                $('#user_form')[0].reset();
                $('#userModal').modal('hide');
                  location.reload();
              }
          });
      }
      if($('#action').val() == "Edit")
      {
          $.ajax({
              url:"{{ route('user.update') }}",
              method:"POST",
              data:new FormData(this),
              contentType: false,
              cache: false,
              processData: false,
              dataType:"json",
              success:function(data){
                $('#user_form')[0].reset();
                $('#userModal').modal('hide');
                  location.reload();
              }
          });
      }
  });
  $('#role_form').on('submit', function(event){
      event.preventDefault();
      if($('#action').val() == "Add")
      {
          $.ajax({
              url:"{{ route('role.store') }}",
              method:"POST",
              data:new FormData(this),
              contentType: false,
              cache: false,
              processData: false,
              dataType:"json",
              success:function(data){
                $('#role_form')[0].reset();
                $('#roleModal').modal('hide');
                  location.reload();
              }
          });
      }
      if($('#action').val() == "Edit")
      {
          $.ajax({
              url:"{{ route('role.update') }}",
              method:"POST",
              data:new FormData(this),
              contentType: false,
              cache: false,
              processData: false,
              dataType:"json",
              success:function(data){
                $('#role_form')[0].reset();
                $('#roleModal').modal('hide');
                  location.reload();
              }
          });
      }
  });
  $('#expense_form').on('submit', function(event){
      event.preventDefault();
      if($('#action').val() == "Add")
      {
          $.ajax({
              url:"{{ route('expense.store') }}",
              method:"POST",
              data:new FormData(this),
              contentType: false,
              cache: false,
              processData: false,
              dataType:"json",
              success:function(data){
                $('#expense_form')[0].reset();
                $('#expenseModal').modal('hide');
                  location.reload();
              }
          });
      }
      if($('#action').val() == "Edit")
      {
          $.ajax({
              url:"{{ route('expense.update') }}",
              method:"POST",
              data:new FormData(this),
              contentType: false,
              cache: false,
              processData: false,
              dataType:"json",
              success:function(data){
                $('#expense_form')[0].reset();
                $('#expenseModal').modal('hide');
                  location.reload();
              }
          });
      }
  });
  $('#expensecategory_form').on('submit', function(event){
      event.preventDefault();
      if($('#action').val() == "Add")
      {
          $.ajax({
              url:"{{ route('expense_category.store') }}",
              method:"POST",
              data:new FormData(this),
              contentType: false,
              cache: false,
              processData: false,
              dataType:"json",
              success:function(data){
                $('#expensecategory_form')[0].reset();
                $('#categoryModal').modal('hide');
                  location.reload();
              }
          });
      }
      if($('#action').val() == "Edit")
      {
          $.ajax({
              url:"{{ route('expense_category.update') }}",
              method:"POST",
              data:new FormData(this),
              contentType: false,
              cache: false,
              processData: false,
              dataType:"json",
              success:function(data){
                $('#expensecategory_form')[0].reset();
                $('#categoryModal').modal('hide');
                  location.reload();
              }
          });
      }
  });
  $(document).on('click', '.delete_role', function(){
        var role_id = $('#hidden_id').val();
        var r = confirm('Are you sure?')
        if (r == true) {
            $.ajax({
                url:"role/destroy/"+role_id,
                success:function(data)
                {
                    location.reload();
                }
            })
        } else {
            return false;
        }
    });

    $(document).on('click', '.delete_user', function(){
        var user_id = $('#hidden_id').val();
        var r = confirm('Are you sure?')
        if (r == true) {
            $.ajax({
                url:"user/destroy/"+user_id,
                success:function(data)
                {
                    location.reload();
                }
            })
        } else {
            return false;
        }
    });

    $(document).on('click', '.delete_expense', function(){
        var id = $('#hidden_id').val();
        var r = confirm('Are you sure?')
        if (r == true) {
            $.ajax({
                url:"expense/destroy/"+id,
                success:function(data)
                {
                    location.reload();
                }
            })
        } else {
            return false;
        }
    });

    $(document).on('click', '.delete_expense_category', function(){
        var id = $('#hidden_id').val();
        var r = confirm('Are you sure?')
        if (r == true) {
            $.ajax({
                url:"expense_category/destroy/"+id,
                success:function(data)
                {
                    location.reload();
                }
            })
        } else {
            return false;
        }
    });

    $('.modal').on('hidden.bs.modal', function () {
    location.reload();
    $('form')[0].reset();
    })
});
</script>
</html>
