<?php
session_start(); 
//Check if the user is authenticated first. Or else redirect to login page 
if(isset($_SESSION['IS_AUTHENTICATED'])){
//Header ("Content-type: text/css; charset=utf-8");
$uid=$_SESSION['USER_ID'];
$link = mysqli_connect('localhost', 'root', '', 'project');  
if(!$link)
{ 
die('Failed to connect to server: ');
 } 
 $qry = "SELECT w.stock_name,d.c_price,d.inc_dec
 FROM watchlist w,dummy_data d
 WHERE uid='$uid' AND d.stock_name=w.stock_name";
 $result = mysqli_query($link, $qry);                               
 $qry2 = "SELECT h.stock_name,h.qty,h.cost,d.c_price,(qty*c_price) as c_val, (cost-qty*(c_price)) as p_l, ((cost-qty*(c_price))/cost) as net_chg
 FROM holdings h, dummy_data d
 WHERE h.uid='$uid' and h.stock_name=d.stock_name";
 $result2 = mysqli_query($link,$qry2);
 $qry3 = "SELECT stock_name
 FROM dummy_data";
 $result3 = mysqli_query($link, $qry3); 
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
    <title>Holdings project DBMS</title>
    <link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Abel&amp;display=swap">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Actor&amp;display=swap">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Bitter:400,700&amp;display=swap">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Bitter:400,700">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Redressed&amp;display=swap">
    <link rel="stylesheet" href="assets/css/Data-Table-1.css">
    <link rel="stylesheet" href="assets/css/Data-Table.css">
    <link rel="stylesheet" href="assets/css/Footer-Basic.css">
    <link rel="stylesheet" href="assets/css/Footer-Clean.css">
    <link rel="stylesheet" href="assets/css/Footer-Dark.css">
    <link rel="stylesheet" href="assets/css/Header-Dark.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.15/css/dataTables.bootstrap.min.css">
    <link rel="stylesheet" href="assets/css/styles.css">
    <link rel="stylesheet" href="assets/css/Table-with-search-1.css">
    <link rel="stylesheet" href="assets/css/Table-with-search.css">
    <style>
    .fixTableHead {
      overflow-y: auto;
    }
    .fixTableHead thead th {
      position: sticky;
      top: 0;
    }
    th {
      background: grey;
    }
  </style>
</head>

<body style="width:100vw;">
    <header class="header-dark" style="width: 100vw;margin-left:-1.05vw;height: 82px;padding: 0px;">
        <nav class="navbar navbar-dark navbar-expand-lg navigation-clean-search" style="margin-top: -20px;">
            <div class="container"><a class="navbar-brand" style="font-family: Redressed, serif;font-size: 35px;" href="#">PaTra</a><button data-bs-toggle="collapse" class="navbar-toggler" data-bs-target="#navcol-3"><span class="visually-hidden">Toggle navigation</span><span class="navbar-toggler-icon"></span></button>
                <div class="collapse navbar-collapse" id="navcol-3">
                    <ul class="navbar-nav" style="padding-right: 0px;margin-left: 55%;">
                        <li class="nav-item"><a class="nav-link" href="HomePage.php">Dashboard</a></li>
                        <li class="nav-item"><a class="nav-link" href="Holdings.php" style="color: rgb(235,59,96);">Holdings</a></li>
                        <li class="nav-item"><a class="nav-link" href="transHistory.php" style="width: 200px;">Transaction History</a></li>
                    </ul><?php if($_SESSION['ADMIN']=='YES') echo '<a href="admin_info.php"><img src="assets/img/customer.png"></a>';
                          else echo '<a href="user_info.php"><img src="assets/img/customer.png"></a>';
                    ?>
                </div>
            </div>
        </nav>
    </header>
    <div class="container" style="width:100vw;">
        <div class="row" style="margin-left: -16.2vw;width: 100vw;font-size: 15px;height: 600px;border-style: none;margin-top: 10px;">
            <div class="col-md-6" style="height: 600px;padding: 0px;margin: 0px;margin-left: 0.6%;width: 25.5%;margin-top: 0;">
                <div class="table-responsive" style="width: 100%;height: 70%;margin-top: 10px;">
                <table class="table table-bordered ">
                        <thead >
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
                </div>
                <form  method="post" action="function.php">
                <input list="a_w"  name="a_w" placeholder="Stock Name" style="margin-top: 5%;margin-left: 4%;width:60%;">
                <datalist id="a_w">
                    <?php
                    while($row3=mysqli_fetch_assoc($result3)){
                    echo '<option value="'.$row3['stock_name'].'">';
                    }
                    ?>
                </datalist>
                <input type="number" name="qty" placeholder="Quantity" max="250" min="1" style="margin-top:5%;margin-left: 4%;width: 26%;">
                <input class="btn btn-primary" type="submit" name="submit" value="Buy" style="margin-top: 4%;border-style: none;margin-left: 15%;width: 30%;background: rgb(254,49,124);box-shadow: 1px 1px 4px rgb(85,0,0);">
                <input class="btn btn-primary" type="submit" name="submit" value="Sell" style="margin-top: 4%;border-style: none;margin-left: 10%;width: 30%;background: rgb(254,49,124);box-shadow: 1px 1px 4px rgb(85,0,0);margin-right: 1%;">
                </form>
            </div>
            <div class="col" style="width: 75%;height: 600px;border-left-style: groove;">
                <div style="height: 600px;width: 100%;">
                    <div class="table-responsive" style="width: 100%;height: auto;margin-top: 10px;">
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th>Stocks&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;&nbsp;</th>
                                    <th>Qty.</th>
                                    <th>&nbsp;Avg. Cost</th>
                                    <th>LTP</th>
                                    <th>Curr. Val</th>
                                    <th>P&amp;L</th>
                                    <th>Net Chg.</th>
                                </tr>
                            </thead>
                            <tbody>
                            <?php
                                while($row2=mysqli_fetch_assoc($result2)){
                                echo '<tr>';
                                    echo '<td>'.$row2['stock_name'].'</td>';
                                    echo '<td>'.$row2['qty'].'</td>';
                                    echo '<td>'.$row2['cost']/$row2['qty'].'</td>';
                                    echo '<td>'.$row2['c_price'].'</td>';
                                    echo '<td>'.round($row2['c_val'],2).'</td>';
                                    if($row2['p_l']>0 )echo '<td style="color: var(--bs-teal);">'.round($row2['p_l'],2).'</td>';
                                    else echo '<td style="color: red;">'.round($row2['p_l'],2).'</td>';
                                    if($row2['p_l']>0 )echo '<td style="color: var(--bs-teal);">'.round($row2['net_chg'],2).'%</td>';
                                    else echo '<td style="color: red;">'.round($row2['net_chg'],2).'%</td>';
                                echo '</tr>';
                                }
                            echo '</tbody>';
                            ?>
                        </table>
                    </div>
                </div>
            </div>
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
    <script src="https://cdn.datatables.net/1.10.15/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.15/js/dataTables.bootstrap.min.js"></script>
    <script src="assets/js/Table-with-search.js"></script>
</body>

</html>