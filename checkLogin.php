<?php @session_start();
$a=$_REQUEST['txtUser'];
$b=$_REQUEST['txtPassword'];
include("dbconnect.php");
$rsUser=mysqli_query($con,"select * from customer_info where user_name='$a'");
if(mysqli_num_rows($rsUser)==0)
{
   header("location:loginForm.php?resmsg=1");
}
else 
{
      $row=mysqli_fetch_array($rsUser);
      if($row["user_pass"]==$b)
      {
        $_SESSION['uname']=$a;
         if($row["user_type"]=="user")
         {
            header("location:userChoice.php");
         }
         else if($row["user_type"]=="admin")
         {
            header("location:adminChoice.php");
         }

      }
      else 
      {
        header("location:loginForm.php?resmsg=2");
      }

}
?>