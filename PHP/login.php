<?php
session_start();
include 'connect.php';
if(isset($_POST['login'])){
    $uname = $_POST['uname'];
    $password = $_POST['password'];
    $select = $conn->query("select* from users where username='$uname' and password='$password'");
    if(mysqli_num_rows($select)>0){
     $x = mysqli_fetch_array($select);
        $_SESSION['id'] = $x['userid'];
        $_SESSION['username'] = $uname;
         header("location:dashboard.php");
    }else {
        ?>
        <script>
            alert('login failed');
        </script>
        <?php
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
    <form action="#" method="post"><small class="header">sign in</small><br><br><b><br><br>

        <label for="">username</label><br>
        <input type="text" name="uname" id=""><br>
        <label for="">password</label><br>
        <input type="password" name="password" id=""><br>
        <input type="submit" value="login" name="login"><br>
        <a href="register.php">create account</a>
    </form>
</body>
</html>

