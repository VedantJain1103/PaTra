<?php
session_start();
if(isset($_SESSION['IS_AUTHENTICATED'])){
$uid=$_SESSION['USER_ID'];
$link = mysqli_connect('localhost', 'root', '', 'Project');  
if(!$link)
{ 
die('Failed to connect to server: ');
} 
$qry = "SELECT * FROM users WHERE uid='$uid'"; 
$result = mysqli_query($link, $qry);
}
else{ 
    header('location:index.html'); 
    exit(); 
} 
?>
<!DOCTYPE html>
<html lang="en" style="height: 100%;">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <title>user info edit</title>
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
</head>

<body style="width: 100%;height: 100%;background: rgb(0,0,0);">
    <div id="wrapper" style="height: 100%;">
        <div id="sidebar-wrapper" style="height: 100%;">
            <ul class="sidebar-nav">
                <li class="sidebar-brand"> <a href="#" style="color: rgb(249,54,124);border-color: rgb(249,54,124);">User Info</a></li>
                <li> <a href="HomePage.php">Home&nbsp;</a></li>
                <li> <a href="Holdings.php">Holdings</a></li>
                <li> <a href="transHistory.php">Transactions</a></li>
                <li> </li>
            </ul>
        </div>
        <div class="page-content-wrapper" style="height: 100%;">
            <div class="container-fluid" style="height: 100%;">
                <div class="row" style="height: 100%;">
                    <div class="col-md-12" style="height: 100%;color: rgb(249,54,124);background: url(&quot;assets/img/desk.jpg&quot;) no-repeat, #151515;background-size: cover, auto;border-left-style: solid;border-left-color: rgb(190,12,76);">
                    <form action="edit_info.php" method="post">    
                    <div style="width: 90%;background: rgba(146,146,146,0.79);height: 100%;margin-left: 4%;border-color: rgb(33, 37, 41);border-top-color: rgb(33,37,41);">
                            <h1 style="text-align: center;padding-top: 8%;font-family: Lora, serif;text-shadow: 1px 1px 20px rgb(255,255,255);color: rgb(41,0,15);">User Info</h1>
                            <div class="table-responsive text-center" style="height: auto;font-size: 26px;margin-top: 4%;margin-right: 10%;margin-left: 20%;">
                                <table class="table table-hover table-borderless">
                                    <tbody>
                                       
                                    <?php
                                        while($row=mysqli_fetch_assoc($result)){
                                        echo '<tr>';
                                            echo '<td style="width: 50%;font-family: Alegreya, serif;color: rgb(0,0,0);text-align: left;text-shadow: 1px 1px 20px rgb(255,255,255);">UID</td>';
                                            echo '<td style="width: 50%;font-family: Alegreya, serif;color: rgb(255,255,255);text-shadow: 1px 1px 14px rgb(0,0,0);">'.$row['uid'].' </td>';
                                        echo '</tr>';
                                        echo '<tr style="font-family: Alegreya, serif;text-shadow: 1px 1px 14px rgb(0,0,0);">';
                                            echo '<td style="width: 50%;font-family: Alegreya, serif;color: rgb(0,0,0);text-align: left;text-shadow: 1px 1px 20px rgb(255,255,255);">Name</td>';
                                            echo '<td style="width: 50%;font-family: Alegreya, serif;color: rgb(255,255,255);text-shadow: 1px 1px 14px rgb(0,0,0);"> <input type="text" name="name" placeholder="'.$row['name'].'" value="'.$row['name'].'" ></td>';
                                        echo '</tr>';
                                        echo '<tr style="font-family: Alegreya, serif;text-shadow: 1px 1px 14px rgb(0,0,0);">';
                                            echo '<td style="width: 50%;font-family: Alegreya, serif;color: rgb(0,0,0);text-align: left;text-shadow: 1px 1px 20px rgb(255,255,255);">DOB</td>';
                                            echo '<td style="width: 50%;font-family: Alegreya, serif;color: rgb(255,255,255);text-shadow: 1px 1px 14px rgb(0,0,0);">'.$row['dob'].' </td>';
                                        echo '</tr>';
                                        echo '<tr style="font-family: Alegreya, serif;text-shadow: 1px 1px 14px rgb(0,0,0);">';
                                            echo '<td style="width: 50%;font-family: Alegreya, serif;color: rgb(0,0,0);text-align: left;text-shadow: 1px 1px 20px rgb(255,255,255);">Gender</td>';
                                            echo '<td style="width: 50%;font-family: Alegreya, serif;color: rgb(255,255,255);text-shadow: 1px 1px 14px rgb(0,0,0);">'.$row['gender'] .'</td>';
                                        echo '</tr>';
                                        echo '<tr style="font-family: Alegreya, serif;text-shadow: 1px 1px 14px rgb(0,0,0);">';
                                            echo '<td style="width: 50%;font-family: Alegreya, serif;color: rgb(0,0,0);text-align: left;text-shadow: 1px 1px 20px rgb(255,255,255);">Phone Number</td>';
                                            echo '<td style="width: 50%;font-family: Alegreya, serif;color: rgb(255,255,255);text-shadow: 1px 1px 14px rgb(0,0,0);"><input type="text" name="pnumber" placeholder="'.$row['pnumber'].'" value="'.$row['pnumber'].'"></td>';
                                        echo '</tr>';
                                        echo '<tr style="font-family: Alegreya, serif;text-shadow: 1px 1px 14px rgb(0,0,0);">';
                                            echo '<td style="width: 50%;font-family: Alegreya, serif;color: rgb(0,0,0);text-align: left;text-shadow: 1px 1px 20px rgb(255,255,255);">E-Mail</td>';
                                            echo '<td style="width: 50%;font-family: Alegreya, serif;color: rgb(255,255,255);text-shadow: 1px 1px 14px rgb(0,0,0);"><input type="email" name="email" placeholder="'.$row['email'].'" value="'.$row['email'].'"></td>';
                                        echo '</tr>';
                                        echo '<tr style="font-family: Alegreya, serif;text-shadow: 1px 1px 14px rgb(0,0,0);">';
                                            echo '<td style="width: 50%;font-family: Alegreya, serif;color: rgb(0,0,0);text-align: left;text-shadow: 1px 1px 20px rgb(255,255,255);">Money</td>';
                                            echo '<td style="width: 50%;font-family: Alegreya, serif;color: rgb(255,255,255);text-shadow: 1px 1px 14px rgb(0,0,0);">'.round($row['money'],2).'</td>';
                                        echo '</tr>';
                                        echo '<tr style="font-family: Alegreya, serif;text-shadow: 1px 1px 14px rgb(0,0,0);">';
                                            echo '<td style="width: 50%;font-family: Alegreya, serif;color: rgb(0,0,0);text-align: left;text-shadow: 1px 1px 20px rgb(255,255,255);">Admin</td>';
                                            echo '<td style="width: 50%;font-family: Alegreya, serif;color: rgb(255,255,255);text-shadow: 1px 1px 14px rgb(0,0,0);">'.$row['is_admin'].'</td>';
                                        echo '</tr>';
                                        }
                                        ?>

                                    </tbody>
                                </table>
                            </div>
                            <div class="d-xl-flex align-items-center justify-content-xl-start align-items-xl-center" style="border-style: none;"><input class="btn btn-primary" type="submit" style="background: linear-gradient(-76deg, rgb(249,54,124) 0%, rgb(247,0,88) 100%);border-radius: 10px;border-style: none;box-shadow: 0px 0px 4px rgb(85,0,0);margin: 0px;margin-left: 34vw;width: 60px;height: 40px;margin-top: 5vw;padding: 0px;"></div>
                            <a href="log_out.php"><button class="btn btn-primary" type="button" style="background: linear-gradient(-76deg, rgb(249,54,124) 0%, rgb(247,0,88) 100%);border-radius: 10px;border-style: none;box-shadow: 0px 0px 4px rgb(85,0,0);margin-left: 34vw;width: 60px;height: 40px;margin-top: 5vw;">Log Out</button></a>
                        </div></form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="assets/bootstrap/js/bootstrap.min.js"></script>
    <script src="assets/js/Sidebar-Menu.js"></script>
</body>

</html>