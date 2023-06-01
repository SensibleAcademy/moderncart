<html>
    <body>
<h1>Paging Concept </h1>
    <?php 


$con=mysqli_connect("127.0.0.1","root","");
mysqli_select_db($con,"njcart");

$rs=mysqli_query($con,"select count(*) from product_info");
$row=mysqli_fetch_array($rs);
$totalrecords=$row[0];
$noOfRecordsPerPage=3;

if(isset($_REQUEST['pgno']))
{
  $currec=($_REQUEST['pgno']-1)*$noOfRecordsPerPage;
  $cnt=$currec;
}
else 
{
    $currec=0;
    $cnt=0;
}



$totalPages=ceil($totalrecords/$noOfRecordsPerPage);

for($i=1;$i<=$totalPages;$i++)
{
    echo("<font size='6'><a href='paging.php?pgno=$i'>".$i."</a>&nbsp;&nbsp;&nbsp;&nbsp;</font>");
}

$rsprod=mysqli_query($con,"select * from product_info order by prod_name limit $currec,$noOfRecordsPerPage ");
echo("<br><br><table border='1'>");
echo("<tr><th>Sl. No.</th><th>Product Name</th> <th> Rate</th><th> Discount</th><th>Detail </th></tr>");

while($row=mysqli_fetch_array($rsprod))
{
    $cnt++;
    echo("<tr>");
    echo("<td>");
    echo($cnt);
    echo("</td>");

    echo("<td>");
    echo($row["prod_name"]);
    echo("</td>");
    echo("<td>");
    echo($row["prod_rate"]);
    echo("</td>");
    echo("<td>");
    echo($row["prod_discount"]);
    echo("</td>");
    echo("<td>");
    echo($row["prod_detail"]);
    echo("</td>");

    echo("</tr>");
}
echo("</table>");

?>

    </body>
</html>