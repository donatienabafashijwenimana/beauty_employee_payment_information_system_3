<?php
include 'connect.php';

if (isset($_POST['addproduct'])) {
    $pname = $_POST['pname'];
    $qty = $_POST['quantity'];
    $uprice = $_POST['unitprice'];
    $select = $conn->query("select*from product where productname='$pname'");
    if (mysqli_num_rows($select)<=0) {
        $insert = $conn->query("insert into product values(null,'$pname','$qty','$uprice')");
        if ($insert) {
            ?>
            <script>
                alert('product recorded')
                window.location.href='dashboard.php'
            </script>
            <?php
        }
    }else{
        ?>
            <script>
                alert('product exist')
                window.history.back()
            </script>
            <?php
    }
}
if (isset($_POST['upproduct'])) {
     $id = $_POST['id'];
    $pname = $_POST['pname'];
    $qty = $_POST['quantity'];
    $uprice = $_POST['unitprice'];
    $select = $conn->query("select*from product where productname='$pname' and productid<>'$id'");
    if (mysqli_num_rows($select)<=0) {
        $insert = $conn->query("update product set productname='$pname',
        productquantity='$qty',unitprice='$uprice' where productid='$id'");
    //    var_dump("update product set productname='$pname',
    //     productquantity='$qty',unitprice='$uprice' where productid='$id'"); die();
        if ($insert) {
            ?>
            <script>
                alert('product updated')
                window.location.href='dashboard.php'
            </script>
            <?php
        }
    }else{
        ?>
            <script>
                alert('product exist')
                window.history.back()
            </script>
            <?php
    }
}
if(isset($_POST['addcompany'])){
    $cname = $_POST['cname'];
    $tel = $_POST['tel'];
    $location = $_POST['location'];
    $select = $conn->query("select*from company where comp_name='$cname'");
    if (mysqli_num_rows($select)<=0) {
       $insert = $conn->query("insert into company values (null,'$cname','$tel','$location')");
       if ($insert ==true) {
        ?>
        <script>
            alert('company added')
            window.location.href='dashboard.php?company'
        </script>
        <?php
       }
    }else{?>
        <script>
            alert('company exist')
            window.history.back()
        </script>
        <?php
    }
}
if(isset($_POST['upcompany'])){
    $id = $_POST['id'];
    $cname = $_POST['cname'];
    $tel = $_POST['tel'];
    $location = $_POST['location'];
    $select = $conn->query("select*from company where comp_name='$cname' and comp_id<>'$id'");
    if (mysqli_num_rows($select)<=0) {
       $insert = $conn->query("update company set comp_name='$cname',tel='$tel',
       complocation='$location' where comp_id='$id'");
       if ($insert ==true) {
        ?>
        <script>
            alert('company updated')
            window.location.href='dashboard.php?company'
        </script>
        <?php
       }
    }else{?>
        <script>
            alert('company exist')
            window.history.back()
        </script>
        <?php
    }
}
if (isset($_POST['addsup'])) {
    $fname = $_POST['fname'];
    $lname = $_POST['lname'];
    $agdate = $_POST['agdate'];
    $tdate= $_POST['tdate'];
    $product = $_POST['product'];
    $company = $_POST['company'];
    $insert = $conn->query("insert into supplier values(null,'$fname','$lname',
    current_date(),'$agdate','$tdate','$product','$company')");
    if ($insert) {
        ?>
        <script>
            alert('suppier added')
            window.location.href='dashboard.php?supplier'
        </script>
        <?php
    }
}
if (isset($_POST['upsup'])) {
    $id = $_POST['id'];
    $fname = $_POST['fname'];
    $lname = $_POST['lname'];
    $agdate = $_POST['agdate'];
    $tdate= $_POST['tdate'];
    $product = $_POST['product'];
    $company = $_POST['company'];
    $insert = $conn->query("update supplier set fistname='$fname',lastname='$lname',
    aggree_date='$agdate',termination_date='$tdate',pid='$product',compid='$company' where supplyid='$id'");
    if ($insert) {
        ?>
        <script>
            alert('suppier updated')
            window.location.href='dashboard.php?supplier'
        </script>
        <?php
    }
}