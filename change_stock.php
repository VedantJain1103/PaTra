<?php
session_start();
if(isset($_SESSION['IS_AUTHENTICATED'])&&$_SESSION['ADMIN']=='YES'){
$uid=$_SESSION['USER_ID'];
$link = mysqli_connect('localhost', 'root', '', 'Project');  
if(!$link)
{ 
die('Failed to connect to server: ');
} 
$name=$_POST['browsers'];
$val=$_POST['val'];
if(!($_POST['val'])||!($_POST['browsers'])) echo "<center>No Field can be empty</center>";
else{
$qry = "UPDATE dummy_data SET inc_dec='$val'-c_price,c_price='$val' WHERE stock_name='$name'"; 
$result = mysqli_query($link, $qry);
if($result==TRUE) echo "<center>Information Updated</center>";
else echo "<center> Cannot Update Information</center>";
}
}
else{ 
    header('location:logIn.php'); 
    exit(); 
} 
?>