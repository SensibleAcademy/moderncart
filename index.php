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
<div id="itemContainer">
  <?php 
      $rsOffer=mysqli_query($con,"select * from offer_info where now()>=start_date and now()<=end_date");
      $arOffers=array();
      $ardis=array();
      while($row=mysqli_fetch_array($rsOffer))
      {
        array_push($arOffers,$row["category_ids"]);
        array_push($ardis,$row["offer_discount"]);
      }
      
      $rsItem=mysqli_query($con,"select * from item_info where cat_parent_id='$prid'  order by item_name");


      while($row=mysqli_fetch_array($rsItem))
        {
           echo("<div class='item'>");
           echo($row['item_name']."<br><br>");

  
           echo("<br>");
           
           $img=$row['image_path'];
           
           echo("<img src='.\\collection\\$img' width='100' height='100' border='1'> ");
           $rt=$row['item_rate'];
           echo("<br>MRP :<s>".$rt."</s>");

           $dis=$row['item_discount'];




           $spdis=0;

                 for($i=0;$i<count($arOffers);$i++)
                 {
                    $myofferarray= explode("-",$arOffers[$i]);
                    if(in_array($prid,$myofferarray))
                    {
                      $spdis =$spdis + $ardis[$i];
                    }
                 }




           $dis=$dis + $spdis;
           $disrate=$rt - $rt * $dis/100;
           echo("<br>Dis. Rate :".$disrate);
           echo("<br>Detail :<span style='max-height:80px;overflow:scroll;'>".$row['item_detail']."</span>");
           echo("<br>");
           echo("<a class='buyButton' href='checkAlreadyLogin.php?itemid=".$row['item_id']."&rate=$disrate'>Add to cart</a>");
           echo("</div>");
        }
  ?>
</div><!--end of itemContainer-->

</div><!--end of container--> 

<?php 
  include("footer.php");
?>