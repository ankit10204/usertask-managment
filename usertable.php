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
    <div class="col-md-12 col-md-offset-2">
            <table id="example" class="display" style="width:100%">
        <thead>
            <tr>
                <th>Name</th>
                <th>Email</th>
                <th>Mobile</th>
            </tr>
        </thead>
        <tbody id="response">
            <?php 
             $sql = "SELECT * FROM `user` ";
            $exec = mysqli_query($conn,$sql);
            if(mysqli_num_rows($exec) > 0){
           while($row = mysqli_fetch_assoc($exec)){ ?>
            <tr>
              <td><?php echo $row['name']?></td>
              <td><?php echo $row['email']?></td>
              <td><?php echo $row['mobile']?></td>
           <?php }}?>
         </tfoot>
    </table>
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

</html>

