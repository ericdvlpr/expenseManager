$(document).ready(function(){
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
              $('.modal-title').text("Edit User");
              $('#action_button').val("Edit");
              $('#action').val("Edit");
              $('#userModal').modal('show');
         } 
      });
  });

  $('#user_form').on('submit', function(event){
      event.preventDefault();
      
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
                  location.reload();
              }
          });
      }
  });
});