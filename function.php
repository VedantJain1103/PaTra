<?php
session_start();
$link = mysqli_connect('localhost', 'root', '', 'project'); 
$uid=$_SESSION['USER_ID'];
//Check link to the mysql server 
if(!$link){ 
die('Failed to connect to server'); 
} 
$a_w = $_POST['a_w'];
$qty = $_POST['qty'];
if($_POST['submit'] == 'Buy'){
    $qry2 = "SELECT stock_name,c_price FROM dummy_data WHERE stock_name='$a_w'";
    $result2 = mysqli_query($link, $qry2);
    $row2=mysqli_fetch_assoc($result2);
    $price=$row2['c_price'];

    $qry3 = "SELECT money FROM users WHERE uid='$uid'";
    $result3 = mysqli_query($link, $qry3);
    $row3=mysqli_fetch_assoc($result3);
    $money=$row3['money'];

    $date=date("Y/m/d");
    $time=date("h:i:sa");
    $t_price=$qty*$price;

    if($t_price>$money) echo "<center>Not enough money.</center>";
    else{
    $qry = "INSERT INTO transaction_history VALUES ('$uid','$a_w','$qty','B','$t_price','$date','$time')";
    $result = mysqli_query($link, $qry);
    $qry4 = "UPDATE users 
            SET money = money-'$t_price'
            WHERE uid='$uid'";
    $result4 = mysqli_query($link, $qry4);

    $qry5 = "SELECT EXISTS(SELECT * FROM holdings WHERE uid='$uid' AND stock_name='$a_w')";
    $result5 = mysqli_query($link, $qry5);
    $row5=mysqli_fetch_assoc($result5);
    if($row5["EXISTS(SELECT * FROM holdings WHERE uid='$uid' AND stock_name='$a_w')"]==1){
        $qry6 = "UPDATE holdings SET qty=qty+'$qty', cost=cost+'$t_price' WHERE uid='$uid' AND stock_name='$a_w'";
        $result6 = mysqli_query($link, $qry6); 
    }
    else{
        $qry6 = "INSERT INTO holdings VALUES ('$uid','$a_w','$qty','$t_price')";
        $result6 = mysqli_query($link, $qry6);
    }
    if($result == TRUE && $result4==TRUE && $result3==TRUE && $result2==TRUE && $result6==TRUE) 
    echo '<center>'.$qty.' stocks of '.$a_w.' bought successfully.<br></center>'; 
    else 
    echo '<center>Transaction Failed</center>';
    }
}else if($_POST['submit']=='Sell'){
    $qry_main = "SELECT EXISTS(SELECT * FROM holdings WHERE uid='$uid' AND stock_name='$a_w')";
    $result_main = mysqli_query($link, $qry_main);
    $row_main=mysqli_fetch_assoc($result_main);
    if($row_main["EXISTS(SELECT * FROM holdings WHERE uid='$uid' AND stock_name='$a_w')"]==1){
    $qry2 = "SELECT c_price FROM dummy_data WHERE stock_name='$a_w'";
    $result2 = mysqli_query($link, $qry2);
    $row2=mysqli_fetch_assoc($result2);
    $price=$row2['c_price'];

    $qry3 = "SELECT qty,cost FROM holdings WHERE uid='$uid' AND stock_name='$a_w'";
    $result3 = mysqli_query($link, $qry3);
    $row3=mysqli_fetch_assoc($result3);
    $h_qty=$row3['qty'];
    $b_price=$row3['cost'];
    $b_avg_price=$b_price/$h_qty;
    $date=date("Y/m/d");
    $time=date("h:i:sa");
    $t_price=$qty*$price;

    if($qty>$h_qty) echo "<center>Not enough stocks bought.</center>";
    else{
    $qry = "INSERT INTO transaction_history VALUES ('$uid','$a_w','$qty','S','$t_price','$date','$time')";
    $result = mysqli_query($link, $qry);
    $qry4 = "UPDATE users 
            SET money = money+'$t_price'
            WHERE uid='$uid'";
    $result4 = mysqli_query($link, $qry4);

    $qry7 = "SELECT EXISTS(SELECT * FROM reports WHERE uid='$uid' AND stock_name='$a_w')";
    $result7 = mysqli_query($link, $qry7);
    $row7=mysqli_fetch_assoc($result7);
    if($row7["EXISTS(SELECT * FROM reports WHERE uid='$uid' AND stock_name='$a_w')"]==1){
        $qry5 = "UPDATE reports SET avg_s_price=(avg_s_price*qty+'$t_price')/(qty+'$qty'),avg_b_price=(avg_b_price*qty+'$b_price')/(qty+'$qty'),qty=qty+'$qty' WHERE uid='$uid' AND stock_name='$a_w'";
    }
    else{
        $qry5 = "INSERT INTO reports VALUES ('$uid','$a_w','$qty','$price','$b_avg_price')";
    }
    $result5 = mysqli_query($link, $qry5);
    if($qty==$h_qty){
    $qry6 = "DELETE FROM holdings 
            WHERE uid='$uid' AND stock_name='$a_w'";
    $result6 = mysqli_query($link, $qry6);
    }
    else{
        $qry6 = "UPDATE holdings 
                SET qty = qty-'$qty'
                WHERE uid='$uid' AND stock_name='$a_w'";
    $result6 = mysqli_query($link, $qry6);
    }
    if($result == TRUE && $result4==TRUE && $result3==TRUE && $result2==TRUE && $result5==TRUE  && $result6==TRUE) 
    echo '<center>'.$qty.' stocks of '.$a_w.' sold successfully.<br></center>'; 
    else 
    echo '<center>Transaction Failed</center>';
    }
    }
    else echo '<center>Cannot sell a stock that is not bought</center>';
}
?>