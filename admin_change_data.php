<?php
session_start();
if(isset($_SESSION['IS_AUTHENTICATED'])){
$uid=$_SESSION['USER_ID'];
$link = mysqli_connect('localhost', 'root', '', 'Project');  
if(!$link)
{ 
die('Failed to connect to server: ');
} 
$qry = "SELECT * FROM dummy_data"; 
$result = mysqli_query($link, $qry);
}
else{ 
    header('location:logIn.php'); 
    exit(); 
} 
$qry2 = "SELECT stock_name
 FROM dummy_data ";
 $result2 = mysqli_query($link, $qry2);  
?>
<!DOCTYPE html>
<html lang="en" style="height: 100%;">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <title>user change stock</title>
    <link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Aclonica&amp;display=swap">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Alegreya&amp;display=swap">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Alegreya+Sans&amp;display=swap">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Bitter:400,700&amp;display=swap">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Lora&amp;display=swap">
    <link rel="stylesheet" href="assets/css/Animated-rainbow-shadow.css">
    <link rel="stylesheet" href="assets/css/Article-Dual-Column.css">
    <link rel="stylesheet" href="assets/css/Header-Dark.css">
    <link rel="stylesheet" href="assets/css/Sidebar-Menu-1.css">
    <link rel="stylesheet" href="assets/css/Sidebar-Menu.css">
    <link rel="stylesheet" href="assets/css/styles.css">
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

<body style="width: 100vw;height: auto;background: rgb(0,0,0);">
    <div id="wrapper" style="height: 100%;">
        <div id="sidebar-wrapper" style="height: 100%;">
            <ul class="sidebar-nav">
                <li class="sidebar-brand"> <a href="#" style="color: rgb(249,54,124);border-color: rgb(249,54,124);">User Info</a></li>
                <li> <a href="HomePage.php">Home&nbsp;</a></li>
                <li> <a href="Holdings.php">Holdings</a></li>
                <li> <a href="transHistory.php">Transactions</a></li>
                <li> <a href="admin_access.php">Provide Admin Access</a></li>
                <li> <a href="admin_change_data.php" style="color: rgb(249,54,124);border-color: rgb(249,54,124);">Edit Stock Data</a></li>
            </ul>
        </div>
        <div class="page-content-wrapper" style="height: 100%;">
            <div class="container-fluid" style="height: 100%;">
                <div class="row" style="height: 100%;">
                    <div class="col-md-12" style="height: 100%;color: rgb(249,54,124);background: url(&quot;assets/img/desk.jpg&quot;) no-repeat, #151515;background-size: cover, auto;border-left-style: solid;border-left-color: rgb(190,12,76);">
                        <div style="width: 90%;background: rgba(146,146,146,0.79);height: 100%;margin-left: 4%;border-color: rgb(33, 37, 41);border-top-color: rgb(33,37,41);">
                            <h1 style="text-align: center;padding-top: 4vw;font-family: Lora, serif;text-shadow: 1px 1px 20px rgb(255,255,255);color: rgb(41,0,15);">Stocks</h1>
                            <div style="height: 40vw;">
                                <div class="table-responsive" style="margin-right: 4vw;margin-left: 4vw;height:40vw;">
                                    <table class="table table-hover fixTableHead table-dark table-bordered">
                                        <thead>
                                            <tr>
                                                <th style="width: 50%;">Name</th>
                                                <th style="width: 30%;">Value</th>
                                                <th style="width: 20%;">Change</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                            while($row=mysqli_fetch_assoc($result)){
                                            echo '<tr>';
                                                echo '<td style="width: 50%;">'.$row['stock_name'].'</td>';
                                                echo '<td style="width: 30%;">'.$row['c_price'].'</td>';
                                                if($row['inc_dec']>0) echo '<td style="width: 20%;color:rgb(166, 252, 129);">+'.$row['inc_dec'].'</td>';
                                                else echo '<td style="width: 20%;color:rgb(250, 112, 112);">'.$row['inc_dec'].'</td>';
                                            echo '</tr>';
                                            }
                                            ?>
                                        </tbody>
                                    </table>
                                </div>
                            </div><form action="change_stock.php" method="post">
                            <div style="height: 10vw;">
                            <input list="browsers" name="browsers" placeholder="Stock Name" style="margin-top: 5%;margin-left: 24%;width:30%;box-shadow: 0px 0px 14px rgb(0,0,0);border-style: none;">
                            <datalist id="browsers">
                                <?php
                                while($row2=mysqli_fetch_assoc($result2)){
                                echo '<option value="'.$row2['stock_name'].'">';
                                }
                                ?>
                            </datalist>
                            <input type="text" placeholder="Value" name="val" style="margin-left: 10px;margin-right: 10px;width: 100px;box-shadow: 0px 0px 20px;border-style: none;">
                            <input class="btn btn-primary" type="submit" style="background: linear-gradient(-76deg, rgb(249,54,124) 0%, rgb(247,0,88) 100%);border-radius: 10px;border-style: none;box-shadow: 0px 0px 14px rgb(0,0,0);width: auto;height: 38px;"></div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="assets/bootstrap/js/bootstrap.min.js"></script>
    <script src="assets/js/Sidebar-Menu.js"></script>
</body>

</html>