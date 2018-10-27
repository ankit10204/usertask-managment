<?php require_once "config.php"; ?>
<!DOCTYPE html>
<html>
<head>
	<link rel="stylesheet" type="text/css" href="assets/css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.19/css/jquery.dataTables.min.css">
	<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/buttons/1.5.2/css/buttons.dataTables.min.css">
	<title></title>
</head>
<body>
 <div class="container">
       
     <?php require_once "nav.php";?>
     
   <br><br>
 	<div class="row">
 		<div class="col-md-6">
 			<form id="form">
  <fieldset>
  	<div id="msg"></div>
    <legend>Enter Users Detail</legend>
     <div class="form-group row">
      <label for="staticEmail" class="col-sm-2 col-form-label">User_Id</label>
      <div class="col-sm-10">
        <input type="text"  class="form-control" id="userid" placeholder="Enter User_Id" readonly>
      </div>
    </div>
    <div class="form-group row">
      <label for="staticEmail" class="col-sm-2 col-form-label">Name</label>
      <div class="col-sm-10">
        <input type="text"  class="form-control" id="name" placeholder="Enter Name" required>
      </div>
    </div>
    <div class="form-group row">
      <label for="staticEmail" class="col-sm-2 col-form-label">Email</label>
      <div class="col-sm-10">
        <input type="email"  class="form-control" id="email" placeholder="Enter unique Email" required>
      </div>
    </div>

    <div class="form-group row">
      <label for="staticEmail" class="col-sm-2 col-form-label">Mobile</label>
      <div class="col-sm-10">
        <input type="text"  class="form-control" id="mobile" placeholder="Enter Number" required>
      </div>
    </div>

    </fieldset>
    <button type="submit" id="submit" class="btn btn-primary">Submit</button>
  </fieldset>
</form>
 		</div>
 	</div>

</body>
<script type="text/javascript" src="https://code.jquery.com/jquery-3.3.1.js"></script>
<script type="text/javascript" src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>
<script type="text/javascript" src="https://cdn.datatables.net/buttons/1.5.2/js/dataTables.buttons.min.js
"></script>
<script type="text/javascript" src="https://cdn.datatables.net/buttons/1.5.2/js/buttons.flash.min.js"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.36/pdfmake.min.js"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.36/vfs_fonts.js"></script>
<script type="text/javascript" src="https://cdn.datatables.net/buttons/1.5.2/js/buttons.html5.min.js"></script>
<script type="text/javascript" src="https://cdn.datatables.net/buttons/1.5.2/js/buttons.print.min.js"></script>
<script type="text/javascript">
$(document).ready(function() {
    $('#example').DataTable( {
        dom: 'Bfrtip',
       "searching": false,
       "info":     false,
        buttons: [
           'excelHtml5',
          ]
    } );
} );
</script>
<script type="text/javascript">
  $(document).ready(function(){
    $('#mobile').keyup(function(){
     var name = $('#name').val();
     var email = $('#email').val();
     var mobile = $('#mobile').val();
     var userid = name +'-' + Math.floor(1000 + Math.random() * 9000)+'XYZ';
     $('#userid').val(userid);
    });
  });
</script>
<script type="text/javascript">
	$(document).ready(function(){
		$("#submit").on('click',function(e){
			event.preventDefault();
			var userid = $('#userid').val();
      var name = $('#name').val();
			// console.log(name);
			var email = $('#email').val();
			// console.log(email);
			var mobile = $('#mobile').val();
			// console.log(mobile);
      if($('#name').val().length !='' && $('#email').val().length !='' && $('#mobile').val().length !=''){
       $.ajax({
             url : 'function.php',
             method : 'POST',
             data : {userid:userid,name:name,email:email,mobile:mobile},
             success : function(data){
               var response = $.parseJSON(data);

               if(response.msg == 'true'){
                  $('#msg').html("<div class='alert alert-dismissible alert-success'><button type='button' class='close' data-dismiss='alert'>&times;</button><strong>Well done!</strong> Insert successfully</div>");
               }else if(response.msg =='false'){
                  $('#msg').html("<div class='alert alert-dismissible alert-danger'><button type='button' class='close' data-dismiss='alert'>&times;</button><strong>Oh snap!</strong>Email Id or User Id is already Exist..</div>");
               } 
               }
      });
      }else{
        alert('All must required');
      }
		});
       });
</script>
<script>
  $(document).ready(function(){
     var userdata = "1";
     setTimeout(function(){get_data()},600);
    
     function get_data(){
        $.ajax({
          type:"POST",
          url:"function.php",
          data:{userdata:userdata},
          success:function(data){
             $("#response").html(data);
          }
        });
      }
  });
</script>
<script type="text/javascript">
 $(document).on('click','#delete',function(){
   var namdel = $(this).attr('data-id');
    console.log(namdel);
    if(confirm("Are you sure you want to delete this?")){
      $.ajax({
       url : 'function.php',
       method : 'POST',
       data : {namdel:namdel},
       success :function(data){
        alert(data);
       }
      });
    }
    else{
        return false;
    }
 
   });
</script>
</html>

