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
    <legend>Enter Users Task Detail</legend>
    <div class="form-group row">
      <label for="staticEmail" class="col-sm-2 col-form-label">Name</label>
      <div class="col-sm-10">
       <select class="form-control" id="name">
        <option>--Select Name--</option>
        <?php 
        $sql = "SELECT userid,name FROM user";
        $exec = mysqli_query($conn,$sql);
        if(mysqli_num_rows($exec)>0){
          while($row = mysqli_fetch_assoc($exec)) {?>
         <option value="<?php echo $row['userid']?>"><?php echo $row['name']?></option>
        <?php } }?>
     </select>
      </div>
    </div>
    <div class="form-group row">
      <label for="staticEmail" class="col-sm-2 col-form-label">Task</label>
      <div class="col-sm-10">
        <input type="text"  class="form-control" id="task" placeholder="Enter Task" required>
      </div>
    </div>

    <div class="form-group row">
      <label for="staticEmail" class="col-sm-2 col-form-label">Task Type</label>
      <div class="col-sm-10">
        <select class="form-control" id="type">
        <option>--Select Type--</option>
        <option>Pending</option>
        <option>Done</option>
      </select>
      </div>
    </div>

    </fieldset>
    <button type="submit" id="submit" class="btn btn-primary">Submit</button>
  </fieldset>
</form>
 		</div>
 	</div>
 	<br><br>
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
<!-- <script type="text/javascript">
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
</script> -->
<script type="text/javascript">
	$(document).ready(function(){
		$("#submit").on('click',function(e){
			event.preventDefault();
			var name = $('#name').val();
			 console.log(name);
			var task = $('#task').val();
			 console.log(task);
			var type = $('#type').val();
			 console.log(type);
			if((name !='--Select Name--') && (type !='--Select Type--')){
         $.ajax({
             url : 'function.php',
             method : 'POST',
             data : {name:name,task:task,type:type},
             success : function(data){
               var response = $.parseJSON(data);

               if(response.msg == 'true'){
                  $('#msg').html("<div class='alert alert-dismissible alert-success'><button type='button' class='close' data-dismiss='alert'>&times;</button><strong>Well done!</strong> Insert successfully</div>");
               }
            }
          });
      }else{
           alert('please select fields');
           }
        });
       });
</script>


<script>
  $(document).ready(function(){
     var taskdata = "1";
     setTimeout(function(){get_data()},600);
     function get_data(){
        $.ajax({
          type:"POST",
          url:"function.php",
          data:{taskdata:taskdata},
          success:function(data){
             $("#response").html(data);
          }
        });
      }
  });
</script>
</html>

