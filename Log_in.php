<?php 
if ($_POST['submit'] == 'submit'){ 
//Collect POST values 
$login = $_POST['email']; 
$password = $_POST['password']; 
if($login && $password){ 
//Connect to mysql server 
$link = mysqli_connect('localhost', 'root', '','project'); 
//Check link to the mysql server 
if(!$link) { 
die('Failed to connect to server: '); 
} 
//Create query (if you have a Logins table the you can select login id and password from there)
$qry="SELECT password,uid,is_admin FROM users WHERE email = '$login'"; 
//Execute query 
$result=mysqli_query($link, $qry); 
$row=mysqli_fetch_assoc($result);
//Check whether the query was successful or not 
if($password ==$row['password']){ 
//$count = mysql_num_rows($result);
$count = 1; 
} 
else{ 
//Login failed 
include('logIn.php'); 
echo '<center>Incorrect E-mail or Password !!!<center>'; 
exit(); 
} 
//if query was successful it should fetch 1 matching record from the table. 
if( $count == 1){ 
//Login successful set session variables and redirect to main page. 
session_start(); 
$_SESSION['IS_AUTHENTICATED'] = 1; 
$_SESSION['USER_ID'] = $row['uid']; 
$_SESSION['ADMIN']=$row['is_admin'];
header('location:HomePage.php'); 
} 
else{ 
//Login failed 
include('logIn.php'); 
echo '<center>Incorrect Username or Password !!!<center>'; 
exit(); 
} 
} 
else{ 
include('logIn.php'); 
echo '<center>Username or Password missing!!</center>'; 
exit(); 
} 
} 
else{ 
header("location: logIn.php"); 
exit(); 
} 
?>