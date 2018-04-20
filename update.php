<?php
session_start();
include('connect.php');
echo "update page";
$name=$_GET['q'];
$u=$_SESSION['user'];
$query="update candidate set vote_count=vote_count+1 where id=\"$name\"";
mysqli_query($dbh,$query) or die("error querying");
$que="update login set voted=1 where id=\"$u\"";
mysqli_query($dbh,$que) or die("error querying");
?>

