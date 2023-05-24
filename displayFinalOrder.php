<?php 
  include("header.php");
?>
<div id="container"> 

   <div id='cartinfo'>
    <?php 
      include("dbconnect.php");
      $usr=$_SESSION["uname"];
      $sql="select ci.cart_id,ci.item_rate,ci.item_quantity,ii.item_name,ii.image_path from cart_info as ci,item_info as ii where ci.item_id=ii.item_id  and user_name='$usr'";
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
        $id=$row["cart_id"];
        
        echo("<a href='deleteCart.php?cid=$id'>Delete</a>");
        echo("</td>");


        echo("</tr>");
      }
      echo("<tr><td colspan='5' align='right'>Total Amount : </td> <td colspan='2' >$total </td> </tr>");
      echo("</table>");



    ?>
   </div><!--end of cartinfo-->
   <a href='addressFormForOrder.php?amnt=<?=$total?>' id='placeOrder'>Place Order</a>

</div><!--end of container--> 

<?php 
  include("footer.php");
?>