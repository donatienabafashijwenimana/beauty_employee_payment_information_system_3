<?php
session_start();
include 'connect.php';
if(isset($_POST['register'])){
    
    $select = $conn->query("select* from users where username='{$_POST['uname']}'");
    if(mysqli_num_rows($select)<=0){
       $insert = $conn->query("insert into users values(null,'{$_POST['uname']}','{$_POST['password']}')");
       if ($insert == true) {
        ?>
        <script>
            alert("registration successfully")
            window.location.href='login.php';
        </script>
        <?php

       }else {
        echo "not registered";
       }
    }else{
        echo"user name must be token";
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="../css/login.css">
</head>
<body>
    <form action="#" method="post"><small class="header">sign up</small><br><br><b><br><br>
        <label for="">username</label><br>
        <input type="text" name="uname" id=""><br>
        <label for="">password</label><br>
        <input type="password" name="password" id=""><br>
        <input type="submit" value="submit" name="register"><br>
        <a href="login.php">login</a>
    </form>
</body>
</html>

