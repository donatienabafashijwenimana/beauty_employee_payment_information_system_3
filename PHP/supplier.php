<?php
include 'connect.php';
$selectc = $conn->query("select*from company");
$selectp = $conn->query("select * from product");
$select = $conn->query("select*from product,supplier,company where pid=productid and compid=comp_id");
?>
<a href="?supplier&&add" class="add" >add new</a>
<div class="table">
        <div class="heads">supplier</div>
           <table border="1">

                <thead>
                    <td>id</td>
                    <td>supplier name</td>
                    <td>supply date</td>
                    <td>agree date</td>
                    <td>termination date</td>
                    <td>product</td>
                    <td>company</td>
                    <td colspan="2">action</td>
                </thead>
                <?php
                $y=1;
                 foreach($select as $x){?>
                <tr>
                    <td><?=$y++?></td>
                    <td><?=$x['fistname'].' '.$x['lastname']?></td>
                    <td><?=$x['supply_date']?></td>
                    <td><?=$x['aggree_date']?></td>
                    <td><?=$x['termination_date']?></td>
                    <td><?=$x['productname']?></td>
                    <td><?=$x['comp_name']?></td>


                  <td><a href="?supplier&&idu=<?=$x['supplyid']?>"><button id="up">update</button></a></td>
                  <td><a href="?supplier&&idd=<?=$x['supplyid']?>"><button id="del">delete</button></a></td>
                  
                </tr><?php }?>
            </table>
        </div>
    <?php
    if (isset($_GET['add'])) {
        ?>
       <div class="form">
       <div class="loading"></div>

              <form action="add.php" method="post"  class='nform'>
                <h2>add new supplier</h2><br>
                <a href='?supplier'class="close">&times</a>
                <label for="">first name</label>
                <input type="text" name="fname" id=""required>
                <label for="">last name</label>
                <input type="text" name="lname" id=""required>
                <label for="">agree date</label>
                <input type="date" name="agdate" id="">
                <label for="">termination date</label>
                <input type="date" name="tdate" id="">
                <label for="">product</label>
                <select name="product" id="">
                    <?php
                    foreach($selectp as $row){?>
                    <option value="<?=$row['productid']?>"><?=$row['productname']?></option>
                    <?php }?>
                </select>
                <label for="">company</label>
                <select name="company" id="">
                <?php
                    foreach($selectc as $row){?>
                    <option value="<?=$row['comp_id']?>"><?=$row['comp_name']?></option>
                    <?php }?>
                </select>
                <label for=""></label>
                <input type="submit" value="add supply" name="addsup">
              </form>
            </div>
            
    </div>
        <?php
    }
    ?>
    <?php
    if (isset($_GET['idu'])) {
        $id = $_GET['idu'];
        $select1 = $conn->query("select*from product,supplier,company where pid=productid
         and compid=comp_id and supplyid='$id'");
         $y= mysqli_fetch_array($select1);
        ?>
       <div class="form">
       <div class="loading"></div>

              <form action="add.php" method="post"  class='nform'>
                <h2>update supplier</h2><br>
                <input type="hidden" name="id" value='<?=$id?>'>
                <a href='?supplier'class="close">&times</a>
                <label for="">first name</label>
                <input type="text" name="fname" value="<?=$y['fistname']?>"id=""required>
                <label for="">last name</label>
                <input type="text" name="lname" value="<?=$y['lastname']?>" id=""required>
                <label for="">agree date</label>
                <input type="date" name="agdate" id="" value="<?=$y['aggree_date']?>">
                <label for="">termination date</label>
                <input type="date" name="tdate" id="" value="<?=$y['termination_date']?>">
                <label for="">product</label>
                <select name="product" id="">
                <option value="<?=$y['productid']?>"><?=$y['productname']?></option>
                    <?php
                    foreach($selectp as $row){?>
                    <option value="<?=$row['productid']?>"><?=$row['productname']?></option>
                    <?php }?>
                </select>
                <label for="">company</label>
                <select name="company" id="">
                <option value="<?=$y['comp_id']?>"><?=$y['comp_name']?></option>

                <?php
                    foreach($selectc as $row){?>
                    <option value="<?=$row['comp_id']?>"><?=$row['comp_name']?></option>
                    <?php }?>
                </select>
                <label for=""></label>
                <input type="submit" value="update supply" name="upsup">
              </form>
            </div>
            
    </div>
        <?php
    }
    ?>

  
<?php if (isset($_GET['idd'])) {
           $delete = $conn->query("delete from supplier where 
supplyid='{$_GET['idd']}'");
           if ($delete == true) {
             ?>
             <script>alert('supplier deleted');window.location.href='?supplier'</script>
             <?php
           }
         }
         ?>