
<?php
session_start();
   if(!isset($_SESSION['username']))
   header('location:login.php');
?>

<!DOCTYPE html>
<html lang="en">
   <style>
      form,body{
         width: 100%;;
         height: 100%;
      }
   </style>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="../css/style.css">
    <link rel="stylesheet" href="../css/form.css">
    <link rel="stylesheet" href="../css/table.css">


</head>
<body>
   <div class="header" style="color:white">beauty warehouse information management system</div>
   <div class="body">
      
   <div class="link">
        <a href="?product"class="<?php if ($p=="f")echo 'active'?>">product</a>
        <a href="?company"class="<?php if ($p=="im")echo 'active'?>">company</a>
        <a href="?supplier"class="<?php if ($p=="exp")echo 'active'?>">supplier</a>
        <a href="?report"class="<?php if ($p=="impr")echo 'active'?>">report</a>
        <a href="logout.php">logout(<?=$_SESSION['username']?>)</a>
    </div>
      <div class="right"><?php if(isset($_GET['product'])){include 'product.php';}
                              elseif(isset($_GET['company'])){include 'company.php';}
                              elseif(isset($_GET['supplier'])){include 'supplier.php';}
                              elseif(isset($_GET['report'])){include 'report.php';}
                              elseif(isset($_GET['exportr'])){include 'expreport.php';}
                              else {include 'product.php';}?></div>
   </div>
   <div class="footer">
      <h3 style="text-align: center;"><u>beauty warehouse information management systemcopyright@2024</u>
      <p>
   email:beautywarehouse@gmail.com <br>
   tel:0782458446 </p>
   </h3>
   </div>
</body>
</html>

