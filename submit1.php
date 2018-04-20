<?php
session_start();
include("connect.php");
if(isset($_POST["submit"])){
if(!empty($_POST["username"]) && !empty($_POST["password"])){
$username=$_POST["username"];
$password=$_POST["password"];
$query = mysqli_query($dbh, "SELECT * FROM login WHERE id='$username'");
$row= mysqli_fetch_array($query,MYSQLI_ASSOC);
if($password==$row['password']&&$row['user_type']==1)
		header('location:admin.php');
	elseif($password==$row['password']&&$row['voted']==0){
		$_SESSION['sess_sec']=$row['section'];
		$_SESSION['user']=$username;
		header('location:index.html');
	}
	elseif($password==$row['password']&&$row['voted']==1)
		echo"already voted";
	else
		header('location:login.php');

}
}

?>

