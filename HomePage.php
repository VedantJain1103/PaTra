<?php
session_start();
if(isset($_SESSION['IS_AUTHENTICATED'])){
//Header ("Content-type: text/css; charset=utf-8");
$link = mysqli_connect('localhost', 'root', '', 'project');  
if(!$link)
{ 
die('Failed to connect to server: ');
 } 
 $uid=$_SESSION['USER_ID'];
 $qry = "SELECT w.stock_name,d.c_price,d.inc_dec
 FROM watchlist w,dummy_data d
 WHERE uid='$uid' AND d.stock_name=w.stock_name"; 
 $qry2 = "SELECT stock_name
 FROM dummy_data ";
 $result = mysqli_query($link, $qry);
 $result2 = mysqli_query($link, $qry2);  
}
else{ 
    header('location:logIn.php'); 
    exit(); 
}                
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <title>HomePage project DBMS</title>
    <link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Abel&amp;display=swap">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Actor&amp;display=swap">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Bitter:400,700&amp;display=swap">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Bitter:400,700">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Redressed&amp;display=swap">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,700">
    <link rel="stylesheet" href="assets/css/Data-Table-1.css">
    <link rel="stylesheet" href="assets/css/Data-Table.css">
    <link rel="stylesheet" href="assets/css/Footer-Basic.css">
    <link rel="stylesheet" href="assets/css/Footer-Clean.css">
    <link rel="stylesheet" href="assets/css/Footer-Dark.css">
    <link rel="stylesheet" href="assets/css/Header-Blue.css">
    <link rel="stylesheet" href="assets/css/Header-Dark.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.15/css/dataTables.bootstrap.min.css">
    <link rel="stylesheet" href="assets/css/styles.css">
    <link rel="stylesheet" href="assets/css/Table-with-search-1.css">
    <link rel="stylesheet" href="assets/css/Table-with-search.css">
</head>

<body style="width: 100vw;">
    <header class="header-dark" style="width: 100vw;height: 82px;padding: 0px;margin-left:-20px;">
        <nav class="navbar navbar-dark navbar-expand-lg navigation-clean-search" style="margin-top: -20px;">
            <div class="container" style="width:200vw;margin-left:0vw;margin-right:1vw;"><a class="navbar-brand" style="font-family: Redressed, serif;font-size: 35px;" href="#">PaTra</a>
            <button data-bs-toggle="collapse" class="navbar-toggler" data-bs-target="#navcol-3">
                <span class="visually-hidden">Toggle navigation</span><span class="navbar-toggler-icon"></span></button>
                <div class="collapse navbar-collapse" id="navcol-3">
                    <ul class="navbar-nav" style="padding-right: 0px;margin-left: 66vw;margin-right:0px;">
                        <li class="nav-item"><a class="nav-link" href="HomePage.php" style="color: rgb(235,59,96);">Dashboard</a></li>
                        <li class="nav-item"><a class="nav-link" href="Holdings.php" style="color: rgb(252,254,);">Holdings</a></li>
                        <li class="nav-item"><a class="nav-link" href="transHistory.php" style="width: 200px;">Transaction History</a></li>
                    </ul>
                    <?php if($_SESSION['ADMIN']=='YES') echo '<a href="admin_info.php"><img src="assets/img/customer.png"></a>';
                          else echo '<a href="user_info.php"><img src="assets/img/customer.png"></a>';
                    ?>
                </div>
            </div>
        </nav>
    </header>
    <div class="container">
        <div class="row" style="width: 100vw;font-size: 15px;height: 36vw;margin-top: 10px;margin-left:-16.2vw;border-bottom-style:groove;">
            <div class="col-md-6" style="height: 36vw;padding: 0px;width: 25.5vw;margin-top: 0;">
                <div class="table-responsive" style="width: auto;height: 70%;margin-top: 10px;">
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th>Name</th>
                                <th>LTP</th>
                                <th style="font-family: Abel, sans-serif;">Change</th>
                            </tr>
                        </thead>
                        <tbody><?php
                            while ($row=mysqli_fetch_assoc($result)){
                            echo '<tr>';
                                echo '<td>'.$row['stock_name'].'</td>';
                                //echo '<td></td>';
                                echo '<td>'.$row['c_price'].'</td>';
                                if($row['inc_dec']>0) echo '<td class="d-xxl-flex justify-content-xxl-start align-items-xxl-end" style="color: var(--bs-teal);">+'.$row['inc_dec'].'</td>';
                                else echo '<td class="d-xxl-flex justify-content-xxl-start align-items-xxl-end" style="color: red;">'.$row['inc_dec'].'</td>';
                            echo '</tr>';
                            }
                            ?>
                        </tbody>
                    </table>
                </div><form  method="post" action="add_w.php">
                <input list="browsers" name="browsers" placeholder="Stock Name" style="margin-top: 5%;margin-left: 4%;width:90%;">
                <datalist id="browsers">
                    <?php
                    while($row2=mysqli_fetch_assoc($result2)){
                    echo '<option value="'.$row2['stock_name'].'">';
                    }
                    ?>
                </datalist>
                <input class="btn btn-primary" type="submit" name="submit" value="Add to watchlist" style="background: rgb(254,49,124);border-style: none;margin-left: 4%;margin-top: 4%;box-shadow: 1px 1px 4px rgb(85,0,0);width: 90%;">
            </div>
            <?php
                    $qry4 = "SELECT * FROM holdings WHERE uid='$uid'"; 
                    $result4 = mysqli_query($link, $qry4);
                        $investedAmt = 0 ;
                        $c_val=0;
                        while ($row4=mysqli_fetch_assoc($result4)){
                            $investedAmt = $investedAmt + $row4['cost'];
                            $name=$row4['stock_name'];
                            $qry3 = "SELECT c_price FROM dummy_data WHERE stock_name='$name'"; 
                            $result3 = mysqli_query($link, $qry3);
                            $row3=mysqli_fetch_assoc($result3);
                            $stock_c_price = $row3['c_price'];
                            $c_val = $c_val+$stock_c_price*$row4['qty'];
                        }
                        $p_l=$c_val-$investedAmt;         
            echo '<div class="col-md-6" style="width:72.5vw;border-left-style:groove;">';
                echo '<h1 class="text-center" style="width: 350px;height: 50px;margin-top: 12%;margin-left: 31%;">Your Current P&amp;L</h1>';
                if($investedAmt-$c_val<0) echo '<h1 class="text-center" style="width: 350px;height: 50px;margin-top: 1%;margin-left: 31%;color: var(--bs-teal);">'.round($p_l,2).'</h1>';
                else echo '<h1 class="text-center" style="width: 350px;height: 50px;margin-top: 1%;margin-left: 31%;color: red;">'.round($p_l,2).'</h1>';
                echo '<h1 class="text-center" style="width: 250px;height: 45px;margin-top: 14%;margin-left: 3%;font-size: 30px;">&nbsp; Money Invested</h1>';
                echo '<h1 class="text-center" style="width: 250px;height: 45px;margin-top: 1%;margin-left: 3%;font-size: 30px;color: var(--bs-teal);">'.$investedAmt.'</h1>';
                echo '<h1 class="text-center" style="width: 250px;height: 45px;margin-top: -8.8%;margin-left: 60%;font-size: 30px;">% of Return&nbsp;&nbsp;</h1>';
                if($investedAmt-$c_val<0) echo '<h1 class="text-center" style="width: 250px;height: 45px;margin-top: 1%;margin-left: 60%;font-size: 30px;color: var(--bs-teal);">'.round(($p_l/$investedAmt),2).'%</h1>';
                else echo '<h1 class="text-center" style="width: 250px;height: 45px;margin-top: 1%;margin-left: 60%;font-size: 30px;color: red;">'.round(($p_l/$investedAmt),2).'%</h1>';
            echo '</div>';
            ?>
        </div>
    </div>
    <footer class="footer-basic" style="width: 100vw;">
        <p class="copyright">PaTra © 2021</p>
    </footer>
</body>

</html>