<?php @session_start();

$adr=$_REQUEST['txtAddress'];
$amnt=$_REQUEST['txtAmount'];
$usr=$_SESSION["uname"];

include("dbconnect.php");

$sql1="insert into order_main(user_name,shipping_address,total_amount,order_date,order_status,last_update_date) values('$usr','$adr','$amnt',now(),'Pending',now())";
mysqli_query($con,$sql1) or die("query error 1");
$mid=mysqli_insert_id($con);
echo($mid);

$sql2="select * from cart_info where user_name='$usr'";
$rsCart=mysqli_query($con,$sql2) or die("query error 2");
while($row=mysqli_fetch_array($rsCart))
{
   $itm=$row["item_id"];
   $qty=$row["item_quantity"];
   $rt=$row["item_rate"] ;
   mysqli_query($con,"insert into order_detail(item_id,item_rate,item_quantity,order_main_id) values('$itm','$rt','$qty','$mid')");
}

$sql3="delete from cart_info where user_name='$usr'";
mysqli_query($con,$sql3) or die("query error 1");

header("location:displayFinalOrder.php?odid=mid");


?>