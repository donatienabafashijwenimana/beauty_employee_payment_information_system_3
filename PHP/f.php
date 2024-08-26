<?php
include '../connect.php';
$select1 = $conn->query("select*from funiture");
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="../css/table.css">
</head>

<body>
     <div class="add">add new</div>
    <div class="table">
        <div class="heads">furniture</div>
           <table border="1">

                <thead>
                    <td>id</td>
                    <td>furniture name</td>
                    <td>owner name</td>
                    <td>total quantity</td>
                    <td colspan="2" id="action">action  <div class="act">&plus;</div></td>
                </thead>
                <?php foreach($select1 as $x){?>
                <tr>
                    <td><?=$x['furnitureid']?></td>
                    <td><?=$x['furniturename']?></td>
                    <td><?=$x['furnitureownername']?></td>
                    <td><?=$x['totalimport']?></td>
                  <td><a href="?idu=<?=$x['furnitureid']?>"><button id="up">update</button></a></td>
                  <td><a href="?idd=<?=$x['furnitureid']?>"><button id="del">delete</button></a></td>
                  
                </tr><?php }?>
            </table>
    <div class="form">
    <div class="loading"></div>

              <form action="../add/addf.php" method="post"><div class="close">&times</div>
                <label for="">furniture name</label>
                <input type="text" name="fname" id=""required>
                <label for="">furniture owner name</label>
                <input type="text" name="fownname" id=""required>
                <input type="submit" value="add furniture" name="add_funiture">
              </form>
            </div>
            <?php if (isset($_GET['idu'])) {
              ?>
              <div class="formu"> <?php update($conn,$_GET['idu']);?> </div>
            <?php }?>

            <?php if (isset($_GET['idd'])) {
              $delete = $conn->query("delete from funiture where furnitureid='{$_GET['idd']}'");
              if ($delete == true) {
                ?>
                <script>alert('funiture deleted');window.location.href='?furniture'</script>
                <?php
              }
            }
            ?>
            
    </div>
</body>
<script src="../js/jquery-3.6.3.js"></script>
<script src="../js/js1.js"></script>
</html>