<?php 
   include("dbconnect.php");
   $id=$_REQUEST["cid"];
   mysqli_query($con,"delete from cart_info where cart_id=$id");
   header("location:displayCartInfo.php");
?>