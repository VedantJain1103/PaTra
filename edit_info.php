<?php
session_start();
if(isset($_SESSION['IS_AUTHENTICATED'])){
$uid=$_SESSION['USER_ID'];
$link = mysqli_connect('localhost', 'root', '', 'Project');  
if(!$link)
{ 
die('Failed to connect to server: ');
} 
$name=$_POST['name'];
$email=$_POST['email'];
$pnumber=$_POST['pnumber'];
if(!($_POST['name'])||!($_POST['pnumber'])||!($_POST['email'])) echo "<center>No Field can be empty</center>";
$qry = "UPDATE users SET name='$name',pnumber='$pnumber',email='$email' WHERE uid='$uid'"; 
$result = mysqli_query($link, $qry);
if($result==TRUE) echo "<center>Information Updated</center>";
else echo "<center> Cannot Update Information</center>";
}
else{ 
    header('location:index.html'); 
    exit(); 
} 
?>