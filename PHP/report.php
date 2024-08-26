<?php
include 'connect.php';
?>
<div class="table">
    <div class="repot">
        <form action="#" method="post" class='repotr' id="data">
            <label for="">supply date</label>
            <input type="date" name="date" id="">
            <input type="submit" value="generate" name='gen'>
        </form>
    </div>
    <?php if (isset($_POST['gen'])) {
        $date = $_POST['date'];
        $select = $conn->query("select*from product,supplier,company where 
        pid=productid and compid=comp_id and supply_date='$date'");
        if (mysqli_num_rows($select)>0) {
          
        ?>
        <div class="heads"> supplier report </div>
        <div class="add" style="position: absolute;top: 250px;right: 60px;text-align: center;cursor: pointer;" onclick="pdf()">DOWNLOAD PDF</div>
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
            <?php }else{
                ?><h1><center>!!no result found</center></h1>
                <?php
            }
            } ?>
        </div>
         <script src="html2.js"></script>
        <script>
            function pdf(){
                const table=document.querySelector('table')
                html2pdf(table).save('report')
            }
        </script>