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
        echo("Invalid User Name");
      }
      else if($_REQUEST['resmsg']==2)
      {
        echo("Invalid Password");
      }
     
     echo("</div>");
   }
  ?>
<form method="get" action="insertCart.php">
<label>Enter Product Quantiy</label>
<input type="text" name="txtQuantity" />
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