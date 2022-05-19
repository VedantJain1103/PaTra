<?php
session_start();
$link = mysqli_connect('localhost', 'root', '', 'project'); 
$uid=$_SESSION['USER_ID'];
//Check link to the mysql server 
if(!$link){ 
die('Failed to connect to server'); 
} 
//Create Insert query
$stock_name = $_POST['browsers'];

if($_POST['submit'] == 'Add to watchlist'){
    $qry = "INSERT INTO watchlist VALUES ('$uid','$stock_name')";
    $result = mysqli_query($link, $qry);
    if($result == FALSE) 
    echo '<center>Stock already existss in watchlist<br></center>'; 
    else 
    echo '<center>Stock inserted successfully!</center>';
}
?>