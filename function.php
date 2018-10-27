<?php require_once "config.php"; 

if(isset($_POST['userid']) && isset($_POST['name']) && isset($_POST['email']) && isset($_POST['mobile'])){
 $name = $_POST['name'];
 $email = $_POST['email'];
 $mobile = $_POST['mobile'];
 $userid = $_POST['userid'];

$sql = "SELECT userid,email FROM user WHERE userid = '$userid' OR email='$email' ";
$exec = mysqli_query($conn,$sql);
if(mysqli_num_rows($exec)>0){
	echo json_encode(['msg'=>'false']);
}else{
$sql = "INSERT INTO user(`userid`,`name`,`email`,`mobile`) VALUES('$userid','$name','$email','$mobile')";
 
 $exec = mysqli_query($conn,$sql);
 if($exec){
 	echo json_encode(['msg'=>'true']);
  }
 }
}


if(isset($_POST['name']) && isset($_POST['task']) && isset($_POST['type'])){
 $name = $_POST['name'];
 $task = $_POST['task'];
 $type = $_POST['type'];

$sql = "INSERT INTO task(`userid`,`task`,`type`) VALUES('$name','$task','$type')";
 $exec = mysqli_query($conn,$sql);
 if($exec){
 	echo json_encode(['msg'=>'true']);
  }
 }