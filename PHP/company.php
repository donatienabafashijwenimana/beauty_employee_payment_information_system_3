<?php
include 'connect.php';
$select1 = $conn->query("select*from company");
?>
<a href="?company&&add" class="add" >add new</a>
<div class="table">
        <div class="heads">company</div>
           <table border="1">

                <thead>
                    <td>id</td>
                    <td>company name</td>
                    <td>telphone</td>
                    <td>location</td>
                    <td colspan="2">action</td>
                </thead>
                <?php
                $y=1;
                 foreach($select1 as $x){?>
                <tr>
                    <td><?=$y++?></td>
                    <td><?=$x['comp_name']?></td>
                    <td><?=$x['tel']?></td>
                    <td><?=$x['complocation']?></td>
                  <td><a href="?company&&idu=<?=$x['comp_id']?>"><button id="up">update</button></a></td>
                  <td><a href="?company&&idd=<?=$x['comp_id']?>"><button id="del">delete</button></a></td>
                  
                </tr><?php }?>
            </table>
        </div>
    <?php
    if (isset($_GET['add'])) {
        ?>
       <div class="form">
       <div class="loading"></div>

              <form action="add.php" method="post" class='nform'>
                <h2>add new company</h2><br>
                <a href='?company'class="close">&times</a>
                <label for="">company name</label>
                <input type="text" pattern="[a-zA-Z ]{3,}" title="company name must be alphabetics and must be 3 characters longer." name="cname" id=""required>
                <label for="">telphone</label>
                <input type="text" pattern="07[8923]\d{7}" title="phone number must start with 07 followed by 8 or 9 or 2 or 3 and must be 10 digits" name="tel" id=""required>
                <label for="">location</label>
                <select name="location" id="">
                    <option value="RWANDA">RWANDA</option>
                    <option value="BURUNDI">BURUNDI</option>
                    <option value="DRC">DRC</option>
                    <option value="TANZANIA">TANZANIA</option>
                    <option value="KENYA">KENYA</option>
                </select>
                <input type="submit" value="add company" name="addcompany">
              </form>
            </div>
            
    </div>
        <?php
    }
    ?>
  <?php
  if (isset($_GET['idu'])) {
    $id = $_GET['idu'];
    $select1 =$conn->query("select*from company where comp_id='$id'");
    $row= mysqli_fetch_array($select1);
    ?>
    <div class="form">
    <div class="loading"></div>

           <form action="add.php" method="post"  class='nform'>
             <h2>update company</h2><br>
             <a href='?company'class="close">&times</a>
             <label for="">company name</label>
             <input type="hidden" name="id" value="<?=$id?>">
             <input type="text" name="cname" value=<?=$row['comp_name']?> id=""required>
             <label for="">telphone</label>
             <input type="text" pattern="07[8923]\d{7}" title="phone number must start with 07 followed by 8 or 9 or 2 or 3 and must be 10 digits" name="tel" value=<?=$row['tel']?> id="" >
             <label for="">location</label>
             <select name="location" id="">
                <option value="<?=$row['complocation']?>"><?=$row['complocation']?></option>
                <option value="RWANDA">RWANDA</option>
                <option value="BURUNDI">BURUNDI</option>
                <option value="DRC">DRC</option>
                <option value="TANZANIA">TANZANIA</option>
                <option value="KENYA">KENYA</option>
             </select>
             <input type="submit" value="update company" name="upcompany">
           </form>
         </div>
         
         
 </div>
     <?php
  }
  ?>
<?php if (isset($_GET['idd'])) {
           $delete = $conn->query("delete from company where comp_id='{$_GET['idd']}'");
           if ($delete == true) {
             ?>
             <script>alert('company deleted');window.location.href='?company'</script>
             <?php
           }
         }
         ?>