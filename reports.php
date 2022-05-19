<?php
session_start();
$uid=$_SESSION['USER_ID'];
$link = mysqli_connect('localhost', 'root', '', 'project');  
if(!$link)
{ 
    die('Failed to connect to server: ');
 } 
 $qry = 'SELECT * FROM reports WHERE uid=8'; 
 $result = mysqli_query($link, $qry);
                             
?>
<!DOCTYPE html>
<html lang="en" style="width: 100vw;">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <title>Reports</title>
    <link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Salsa&amp;display=swap">
    <link rel="stylesheet" href="assets/css/Footer-Basic.css">
    <link rel="stylesheet" href="assets/css/nav-patra-header.css">
    <link rel="stylesheet" href="assets/css/Header-Dark.css">
    <link rel="stylesheet" href="assets/css/styles.css">
</head>

<body style="width: 100vw;">
<header class="header-dark" style="height: 82px;padding-bottom: 12px;width: 100vw;">
        <nav class="navbar navbar-dark navbar-expand-lg navigation-clean-search" style="padding: 0px;width: 100vw;">
            <div class="container"><a class="navbar-brand d-xl-flex" style="margin-bottom: 20px;font-family: Redressed, serif;font-size: 35px;" href="#">PaTra</a><button data-bs-toggle="collapse" class="navbar-toggler" data-bs-target="#navcol-1"><span class="visually-hidden">Toggle navigation</span><span class="navbar-toggler-icon"></span></button>
                <div class="collapse navbar-collapse" id="navcol-1">
                    <ul class="navbar-nav"></ul>
                    <form class="me-auto" target="_self">
                        <div class="d-flex align-items-center"></div>
                    </form>
                    <div></div><span class="navbar-text" style="margin-right: 0px;margin-bottom: 25px;"><a class="login" href="HomePage.php" style="margin-right: 30px;">Dashboard</a><a class="login" href="Holdings.php" style="margin-right: 30px;">Holding</a><a class="login" href="transHistory.php" style="color: rgb(235,59,96);margin-left: 0px;margin-right: 28px;">Transaction History</a>
                    <?php if($_SESSION['ADMIN']=='YES') echo '<a href="admin_info.php"><img src="assets/img/customer.png"></a>';
                          else echo '<a href="user_info.php"><img src="assets/img/customer.png"></a>';
                    ?></span>
                    <ul class="navbar-nav">
                        <li class="nav-item"></li>
                    </ul>
                </div>
            </div>
        </nav>
    </header>
    <div class="row" style="height: 60px;border-bottom-width: 1px;border-bottom-style: solid;">
        <div class="col col-9" style="padding-right: 0px;padding-top: 10px;height: 60px;padding-left: 60px;"><a href="reports.php" style="font-size: 28px;font-family: Salsa, serif;color: #eb3b60;">Reports</a></div>
        <div class="col col-3" style="padding-right: 0px;padding-top: 15px;height: 60px;padding-left: 40px;border-style:groove;"><a  style="font-size: 20px;font-family: Salsa, serif;color: #362929;padding-right: 6px;" href="transHistory.php">Trans. history</a></div>
    </div>
    <div class="row" style="width: 100vw;font-size: 15px;height: 30vw;border-style: none;margin-top: 10px;margin-left:0vw;">
    <div class="table-responsive">
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>Stocks</th>
                    <th>Avg. Buy price</th>
                    <th>Avg. Sell Price</th>
                    <th>Quantity</th>
                    <th>Total Buy Value</th>
                    <th>Total Sell Value</th>
                    <th>P&amp;L</th>
                    <th>% Return</th>
                </tr>
            </thead>
            <tbody>
                <?php
                    while ($row=mysqli_fetch_assoc($result)){
                    echo '<tr>';
                        echo '<td>'.$row['stock_name'].'</td>';
                        echo '<td>'.$row['avg_b_price'].'</td>';
                        echo '<td>'.$row['avg_s_price'].'</td>';
                        echo '<td>'.$row['qty'].'</td>';
                        echo '<td>'. $row['avg_b_price']*$row['qty'] .'</td>'; // ttl buy val
                        echo '<td>'. $row['avg_s_price']*$row['qty'] .'</td>'; // ttl sell val
                        if($row['avg_s_price']-$row['avg_b_price']>0) echo '<td style="color:green;">+'.  ( $row['avg_s_price']-$row['avg_b_price'] )*$row['qty'] .'</td>';//pnl
                        else echo '<td style="color:red;">'.  ( $row['avg_s_price']-$row['avg_b_price'] )*$row['qty'] .'</td>';
                        
                        // if( $row['avg_b_price'] < $row['avg_s_price'] ) echo '<td style="color: var(--bs-teal); >&nbsp +'.  ( $row['avg_s_price']-$row['avg_b_price'] )*$row['qty'] .'</td>' ;
                        // else echo '<td style="color: red;" >&nbsp -'.  ( $row['avg_s_price']-$row['avg_b_price'] )*$row['qty'] .'</td>'; 

                        //%returm
                        if($row['avg_s_price']-$row['avg_b_price']>0) echo '<td style="color:green;">+'.round( ( ( $row['avg_s_price']-$row['avg_b_price'] )*100 ) /$row['avg_b_price'] ,2)  .'&nbsp %</td>';
                        else echo '<td class="d-xxl-flex justify-content-xxl-start align-items-xxl-end" style="color: red;">'.round( ( ( $row['avg_s_price']-$row['avg_b_price'] )*100 ) /$row['avg_b_price'] ,2)  .'&nbsp %</td>';
                    echo '</tr>';
                    }
                    ?>
            </tbody>
        </table>
    </div>
    </div>
    <footer class="footer-basic" style="margin-top:0px;">
        <div class="table-responsive">
            <table class="table">
                <thead>
                    <tr>
                        <th>Invested Amount</th>
                        <th>Current Value</th>
                        <th>P&amp;L</th>
                        <th>Net Return</th>
                    </tr>
                </thead>
                <tbody>
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
                        $p_l=$investedAmt-$c_val;
                        echo '<tr>';
                            echo '<td>'.$investedAmt.'</td>';
                            echo '<td>'.$c_val.'</td>';
                            if($investedAmt-$c_val>0)echo '<td style="color:green">'.round($p_l,2).'</td>';
                            else echo '<td style="color:red">'.round($p_l,2).'</td>';
                            if($investedAmt-$c_val>0)echo '<td style="color:green">'.round(($p_l/$investedAmt),2).'%</td>';
                            else echo '<td style="color:red">'.round(($p_l/$investedAmt),2).'%</td>';
                        echo '</tr>';
                        
                    ?>
                    <tr></tr>
                </tbody>
            </table>
        </div>
        <p class="copyright">PaTra © 2021</p>
    </footer>
    <script src="assets/bootstrap/js/bootstrap.min.js"></script>
</body>

</html>