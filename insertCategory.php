<?php 

  $a=$_REQUEST["txtName"];
  $b=$_REQUEST["txtDName"];

  $d=$_REQUEST["cmbCatType"];
  if($d=="Primary")
  {
     $e=0;
  }
  else 
  {
  $e=$_REQUEST["cmbParent"];
  }
  $img=$_FILES["flImage"];

  $imgn=$_FILES["flImage"]['name'];

  $imgarray=explode(".",$imgn);


  $imgname=$imgarray[0]."_".time() .".".  $imgarray[1];

  move_uploaded_file($img["tmp_name"],".\\collection\\$imgname");

  include("dbconnect.php");
  $sql="insert into category_info(cat_name,cat_dname,image_path,cat_type,cat_parent_id,reg_date) values('$a','$b','$imgname','$d','$e',now())";
  mysqli_query($con,$sql) or die("Query Error 1");

  header("location:categoryForm.php?resmsg=1");

?>