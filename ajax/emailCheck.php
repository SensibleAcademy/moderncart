<?php 
 $em=$_REQUEST["mid"];
$con=mysqli_connect("127.0.0.1","root","");
mysqli_select_db($con,"moderncart");

$rsCust=mysqli_query($con,"select * from customer_info where cust_email='$em'");
if(mysqli_num_rows($rsCust)==0)
{
   echo("<font color='green'>This email id is available</font>");
}
else
{
    echo("<font color='red'>This email id is not available</font>");
}

?>