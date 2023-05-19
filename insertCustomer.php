<?php 
$a=$_REQUEST['txtName'];
$b=$_REQUEST['txtEmail'];
$c=$_REQUEST['txtMobile'];
$d=$_REQUEST['txtUser'];
$e=$_REQUEST['txtPassword'];

include("dbconnect.php");

$rsUser=mysqli_query($con,"select * from customer_info where user_name='$d'");
if(mysqli_num_rows($rsUser)==0)
{
    $sql="insert into customer_info(cust_name,cust_email,cust_mobile,user_name,user_pass,user_type,reg_date) values('$a','$b','$c','$d','$e','user',now())";
   mysqli_query($con,$sql) or die("Query error");
   header("location:customerForm.php?resmsg=1");
}
else 
{
    header("location:customerForm.php?resmsg=2");
}

?>