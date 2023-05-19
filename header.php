<?php @session_start(); ?>
<html>
<head>
<link href=".//css/style.css" rel="stylesheet" type="text/css">
</head>
<body> 
    <div id="main"> 
         <div id='header'>
               <div id="leftlogo">
                  <a href='index.php'>
<img src="./images/logo.png" title="Go To Home Page">
</a>
               </div><!--end of leftlogo-->
    
               <div id="title">
                  <h1>MODERN-CART</h1> 
                  <h3> One-stop for head to toe look </h3>
                  <?php 
  if(isset($_SESSION["uname"]))
  {
     echo("<div id='userinfo'>");
      echo("Welcome  ".$_SESSION["uname"]. " , ");

      echo("<a href='logout.php'> Logout </a>");

     echo("</div>");
  }

?>
               </div><!--end of title-->

               <div id="rightlogo">
               <img src="./images/images.jpg">
               </div><!--end of leftlogo-->               

        </div><!--end of header-->