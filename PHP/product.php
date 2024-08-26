<?php
include 'connect.php';
$select1 = $conn->query("select*from product");
?>
<a href="?add" class="add" >add new</a>
<div class="table">
        <div class="heads">product</div>
           <table border="1">

                <thead>
                    <td>id</td>
                    <td>product name</td>
                    <td>quantity</td>
                    <td> unit price</td>
                    <td colspan="2">action</td>
                </thead>
                <?php
                $y=1;
                 foreach($select1 as $x){?>
                <tr>
                    <td><?=$y++?></td>
                    <td><?=$x['productname']?></td>
                    <td><?=$x['productquantity']?></td>
                    <td><?=$x['unitprice']?></td>
                  <td><a href="?idu=<?=$x['productid']?>"><button id="up">update</button></a></td>
                  <td><a href="?idd=<?=$x['productid']?>"><button id="del">delete</button></a></td>
                  
                </tr><?php }?>
            </table>
        </div>
    <?php
    if (isset($_GET['add'])) {
        ?>
       <div class="form">
       <div class="loading"></div>

              <form action="add.php" method="post" class='nform'>
                <h2>add new product</h2><br>
                <a href='?product'class="close">&times</a>
                <label for="">product name</label>
                <input type="text" pattern="[a-zA-Z]{3,}" title="product name must be 3 character longer." name="pname" id=""required>
                <span id="error">pname error</span>
                <label for="">quantity</label>
                <input type="number" min="0" name="quantity" id=""required>
                <label for="">unit price</label>
                <input type="number" min="0" name="unitprice" id="" required>
                <input type="submit" value="add product" name="addproduct">
              </form>
            </div>
            
    </div>
        <?php
    }
    ?>
  <?php
  if (isset($_GET['idu'])) {
    $id = $_GET['idu'];
    $select1 =$conn->query("select*from product where productid='$id'");
    $row= mysqli_fetch_array($select1);
    ?>
    <div class="form">
    <div class="loading"></div>

           <form action="add.php" method="post"  class='nform'>
             <h2>upadete product</h2><br>
             <a href='?product'class="close">&times</a>
             <label for="">product name</label>
             <input type="hidden" name="id" value="<?=$id?>">
             <input type="text" pattern="[a-zA-Z ]{3,}" title="product name must be 3 character longer." name="pname" value=<?=$row['productname']?> id=""required>
             <label for="">quantity</label>
             <input type="number" min="0" name="quantity" value=<?=$row['productquantity']?> id=""required>
             <label for="">unit price</label>
             <input type="number" min="0" name="unitprice" value=<?=$row['unitprice']?> id="" required>
             <input type="submit" value="update product" name="upproduct">
           </form>
         </div>
         
         
 </div>
     <?php
  }
  ?>
<?php if (isset($_GET['idd'])) {
           $delete = $conn->query("delete from product where productid='{$_GET['idd']}'");
           if ($delete == true) {
             ?>
             <script>alert('product deleted');window.location.href='?furniture'</script>
             <?php
           }
         }
         ?>