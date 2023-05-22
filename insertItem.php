<?php 

  $a=$_REQUEST["txtName"];
  $b=$_REQUEST["cmbParent"];
  $c=$_REQUEST["txtRate"];
  $d=$_REQUEST["txtDiscount"];
  $e=$_REQUEST["txtDetail"];

  $img=$_FILES["flImage"]["name"];

  $imgarray=explode(".",$img);


  $imgname=$imgarray[0]."_".time() .".".  $imgarray[1];

  move_uploaded_file($img["tmp_name"],".\\collection\\$imgname");

  include("dbconnect.php");
  $sql="insert into item_info(item_name,image_path,cat_parent_id,item_rate,item_discount,item_detail,reg_date) values('$a','$imgname','$b','$c','$d','$e',now())";
  mysqli_query($con,$sql) or die("Query Error 1");

  header("location:itemForm.php?resmsg=1");

?>
