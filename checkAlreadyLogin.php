<?php @session_start();

$_SESSION['itemid']=$_REQUEST['itemid'];
$_SESSION['rate']=$_REQUEST['rate'];

if(isset($_SESSION['uname']))
{
    header("location:quantityFormForCart.php");
}
else 
{
    header("location:newLoginForm.php");
}




?>