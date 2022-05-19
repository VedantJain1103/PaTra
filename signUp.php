<?php
session_start(); 
session_unset(); 
session_destroy();
// database connection code
// $con = mysqli_connect('localhost', 'database_user', 'database_password','database');
$link = mysqli_connect('localhost', 'root', '', 'project'); 
//Check link to the mysql server 
if(!$link){ 
die('Failed to connect to server'); 
} 
//Create Insert query
$txtName = $_POST['name'];
$txtGender = $_POST['gender'];
$txtDOB = $_POST['dob'];
$intPhone = $_POST['pnumber'];
$txtPassword= $_POST['password'];
$txtPasswordrepeat= $_POST['password-repeat'];
if($txtPassword!=$txtPasswordrepeat) {
    $msg = "Enter Same Password";
    echo $msg;
}
if(!isset($_POST['check'])) echo '<script>alert("Welcome to Geeks for Geeks")</script>'; 
//if($_POST['check']!=1) echo "Agree to Terms and condition";
$txtEmail = $_POST['email']; 
$money=100000;
$sql = "INSERT INTO users ( name, dob,Password,gender,pnumber,email,money) VALUES ( '$txtName','$txtDOB','$txtPasswordrepeat', '$txtGender', '$intPhone', '$txtEmail','$money')";
//Execute query 
$results = mysqli_query($link, $sql); 


//Check if query executes successfully 
if($results == FALSE) 
echo 'Email already exist<br>'; 
else{
    $qry2="SELECT password,uid FROM users WHERE email = '$txtEmail'"; 
//Execute query 
$result2=mysqli_query($link, $qry2); 
$row2=mysqli_fetch_assoc($result2);
session_start(); 
$_SESSION['IS_AUTHENTICATED'] = 1; 
$_SESSION['USER_ID'] = $row2['uid']; 
header('location:HomePage.php'); 
}

?>