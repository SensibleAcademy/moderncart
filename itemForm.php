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
<form method="post" enctype="multipart/form-data" action="insertItem.php">
<label>Enter Item Name</label>
<input type="text" name="txtName" />
<label>Choose Item Image</label>
<input type="file" name="flImage" />
<label>Choose Parent Categroy </label>
<select name='cmbParent'>
  <option>Choose Parent Category Here</option>
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

<label>Enter Item Rate</label>
<input type="text" name="txtRate" />

<label>Enter Item Discount (%)</label>
<input type="text" name="txtDiscount" />
<label>Enter Item Description</label>
<textarea name="txtDetail" rows=4 ></textarea>


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