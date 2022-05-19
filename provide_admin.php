<?php
session_start();
if(isset($_SESSION['IS_AUTHENTICATED'])&&$_SESSION['ADMIN']=='YES'){
$uid=$_SESSION['USER_ID'];
$link = mysqli_connect('localhost', 'root', '', 'Project');  
if(!$link)
{ 
die('Failed to connect to server: ');
} 
$uid=$_POST['uid'];
if(!($_POST['uid'])) echo "<center>No Field can be empty</center>";
else{
    if($_POST['submit']='Provide access'){
$qry = "UPDATE users SET is_admin='YES' WHERE uid='$uid'"; 
$result = mysqli_query($link, $qry);

$qry2 = "DELETE FROM admin_req WHERE uid='$uid'"; 
$result2 = mysqli_query($link, $qry2);

if($result==TRUE&&$result2==TRUE) echo "<center>Information Updated</center>";
else echo "<center> Cannot Update Information</center>";
}
else{
    $qry2 = "DELETE FROM admin_req WHERE uid='$uid'"; 
    $result2 = mysqli_query($link, $qry2);
    if($result2==TRUE) echo "<center>Information Updated</center>";
    else echo "<center> Cannot Update Information</center>"; 
}
}
}
else{ 
    header('location:logIn.php'); 
    exit(); 
} 
?>