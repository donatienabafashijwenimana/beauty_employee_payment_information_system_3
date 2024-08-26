
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="../css/hrf.css">
</head>
<style>
    .link{
        display:flex;
        flex-direction:column;

    }
</style>
<body>
    <div class="link">
        <a href="?furniture"class="<?php if ($p=="f")echo 'active'?>">Furniture</a>
        <a href="?import"class="<?php if ($p=="im")echo 'active'?>">import furniture</a>
        <a href="?export"class="<?php if ($p=="exp")echo 'active'?>">export furniture</a>
        <a href="?importr"class="<?php if ($p=="impr")echo 'active'?>">import furniture report</a>
        <a href="?exportr"class="<?php if ($p=="expr")echo 'active'?>">export furniture report</a>
        <a href="../hrf/logout.php">logout(<?=$_SESSION['username']?>)</a>
    </div>
</body>
</html>