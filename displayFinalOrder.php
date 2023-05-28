<?php 
  include("header.php");
?>
<div id="container"> 

   <div id='cartinfo'>
    <?php 
      $odid=$_REQUEST["odid"];
      include("dbconnect.php");
      $usr=$_SESSION["uname"];

      $rsMain=mysqli_query($con,"select * from order_main where order_id='$odid'");
      $row=mysqli_fetch_array($rsMain);
      echo("Bill No : ".$row["order_id"] ."<br>");
      echo("Order Date : ".$row["order_date"] ."<br>");
      echo("Shipping Address : ".$row["shipping_address"] ."<br>");
      echo("Total Amount : ".$row["total_amount"] ."<br>");

      $sql="select ci.order_detail_id,ci.item_rate,ci.item_quantity,ii.item_name,ii.image_path from order_detail as ci,item_info as ii where ci.order_main_id='$odid' and ci.item_id=ii.item_id ";
      $rscart=mysqli_query($con,$sql);
      echo("<table border='2'>");
      echo("<tr><th>Sl.No. </th><th>Item Name </th><th>Image </th><th> Rate </th><th>Quantity </th><th> Amount</th><th> Status</th> </tr>");
      $cnt=0;
      $total=0;
      while($row=mysqli_fetch_array($rscart))
      {
        $cnt++;
        echo("<tr>");
        echo("<td>");
        echo($cnt);
        echo("</td>");
        echo("<td>");
        echo($row["item_name"]);
        echo("</td>");

        echo("<td>");
        $img=".//collection//".$row['image_path'];
        echo("<img src='$img' width='50' height='50' border='1'>");
        echo("</td>");

        echo("<td>");
        echo($row["item_rate"]);
        echo("</td>");
        echo("<td>");
        echo($row["item_quantity"]);
        echo("</td>");
        $amnt=$row["item_rate"] * $row["item_quantity"];
        echo("<td>");
        echo($amnt);
        $total=$total + $amnt;
        echo("</td>");

        echo("<td>");

        $id=0;
        
        echo("<a href='deleteCart.php?cid=$id'>Delete</a>");
        echo("</td>");


        echo("</tr>");
      }
      echo("<tr><td colspan='5' align='right'>Total Amount : </td> <td colspan='2' >$total </td> </tr>");
      echo("</table>");



    ?>
   </div><!--end of cartinfo-->
   <a href='printOrder.php?amnt=<?=$total?>' id='placeOrder'>Print Bill</a>

</div><!--end of container--> 

<?php 
  include("footer.php");
?>