<?php
session_start();
$link = mysqli_connect('localhost', 'root', '', 'project'); 
$uid=$_SESSION['USER_ID'];
//Check link to the mysql server 
if(!$link){ 
die('Failed to connect to server'); 
} 
$email_qry="SELECT email FROM users WHERE uid='$uid'";
$email_result=mysqli_query($link,$email_qry);
$email_row=mysqli_fetch_assoc($email_result);
$email=$email_row['email'];
$qry="INSERT INTO admin_req VALUES ('$uid','$email')";
$result=mysqli_query($link,$qry);
if($result==FALSE) echo "<center>Request Pending</center>";
else echo "<center>Request sent</center>";
?>