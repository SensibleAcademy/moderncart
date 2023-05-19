<?php 
  include("header.php");
?>
<div id="container"> 

<div id="myForm">
  <?php 
   if(isset($_REQUEST['resmsg']))
   {
     echo("<div id='resmessage'>");
      if($_REQUEST['resmsg']==1)
      {
        echo("Your Data Has Been Saved");
      }
     else if($_REQUEST['resmsg']==2)
     {
       echo("Given user name is already exist");
     }
     
     echo("</div>");
   }
  ?>
<form method="get" action="insertCustomer.php">
<label>Enter your name</label>
<input type="text" name="txtName" />
<label>Enter your Email id</label>
<input type="text" name="txtEmail" />
<label>Enter your Mobile No</label>
<input type="text" name="txtMobile" />
<label>Enter your user name</label>
<input type="text" name="txtUser" />
<label>Enter your password</label>
<input type="password" name="txtPassword" />
<div id='formButtons'>
<input type="submit" value="Ok" />
<input type="reset" value="Cancel" />
</div>
</form>


</div><!--end of myForm-->
</div><!--end of container--> 

<?php 
  include("footer.php");
?>