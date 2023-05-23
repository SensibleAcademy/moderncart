<?php @session_start();
  
  $q=$_REQUEST['txtQuantity'];
  $usr=$_SESSION['uname'];
  $it=$_SESSION['itemid'];
  $rt=$_SESSION['rate'];
  include("dbconnect.php");
  $sql="insert into cart_info(user_name,item_id,item_rate,item_quantity) values('$usr','$it','$rt','$q')";

  mysqli_query($con,$sql) or die("query error");

  header("location:displayCartInfo.php");

?>