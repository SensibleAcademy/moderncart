<?php 
  include("header.php");
?>
<div id="container"> 
<div id='adminArea'>
<div id='leftAdminArea'>
 <?php 
   include("adminMenu.php");
 ?>
</div><!--end of leftAdminArea-->

<div id='rightAdminArea'>
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
<form method="post" enctype="multipart/form-data" action="insertOffer.php">
<label>Enter Offer Name</label>
<input type="text" name="txtName" />
<label>Enter Offer Discount in %</label>
<input type="text" name="txtDiscount" />
<label>Choose Offer start date</label>
<input type="date" name="dtStart" />

<label>Choose Offer end date</label>
<input type="date" name="dtEnd" />



<label>Choose Applicable Categroy </label>
<select name='cmbCategory'>
  <option value='0'>All Category</option>
  <?php 
     include("dbconnect.php");
     $rsCat=mysqli_query($con,"select cat_name,cat_id from category_info order by cat_name");
     while($row=mysqli_fetch_array($rsCat))
     {
      $id=$row['cat_id'];
          echo("<option value='$id'>");
           
          echo($row['cat_name']);
          echo("</option>");

     }

   ?>
  
</select>

<div id='formButtons'>
<input type="submit" value="Ok" />
<input type="reset" value="Cancel" />
</div>
</form>


</div><!--end of myForm-->
</div><!--end of rightAdminArea-->


</div><!--end of adminArea-->
</div><!--end of container--> 
<?php 
  include("footer.php");
?>