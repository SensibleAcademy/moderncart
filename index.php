<?php 
  include("header.php");
?>
<div id="container"> 
<div style="text-align: right;margin:4px;">
  <a href='loginForm.php'>Login</a>&nbsp;&nbsp;|&nbsp;&nbsp; 
  <a href='customerForm.php'>New User</a>
</div>

<div id='categoryContainer'>
<?php 
  if(isset($_REQUEST["cid"]))
    $prid=$_REQUEST['cid'];
  else 
    $prid=0;

  include("dbconnect.php");
  $rsCat=mysqli_query($con,"select * from category_info where cat_parent_id=$prid order by cat_dname");
  while($row=mysqli_fetch_array($rsCat))
  {
     $id=$row['cat_id'];
     $cname=$row['cat_dname'];
     echo("<div class='category'>");
     echo("<a href='index.php?cid=$id'>");
     echo($cname."<br><br>");
     $img=$row['image_path'];
     
     echo("<img src='.\\collection\\$img' width='100' height='100' border='1'> ");
     echo("</a>");
     echo("</div>");

  }
?>

</div><!--end of categoryContainer-->


</div><!--end of container--> 

<?php 
  include("footer.php");
?>