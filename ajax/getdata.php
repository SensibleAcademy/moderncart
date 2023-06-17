<?php 

$con=mysqli_connect("127.0.0.1","root","");
mysqli_select_db($con,"moderncart");

$rsCust=mysqli_query($con,"select cat_id,cat_name,cat_type from category_info ");
$mydata=array();
while($row=mysqli_fetch_assoc($rsCust))
{
  $mydata[]=$row;
}
$jdata=json_encode($mydata);
echo($jdata);


/*
$mydata1=json_decode($jdata);
$fcon=fopen("cust.json","w");
fwrite($fcon,$jdata);
fclose($fcon);





$row=mysqli_fetch_array($rsCust);

print($row[1]);

print($row["cat_name"]);


$row=mysqli_fetch_all($rsCust,MYSQLI_NUM);
print_r($row[0]["cat_name"]);
*/





?>