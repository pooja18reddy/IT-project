<html>
<body>
<center>
<h1> REGISTRATION</h1>
</center>
<form method="post" action="">
name    : <input type="text" size="10" maxlength="40" name="candname"></br>
id      : <input type="text" size="10" maxlength="40" name="candid"></br>
section : <input type="text" size="10" maxlength="40" name="sec"></br>
CGPA    : <input type="text" size="10" maxlength="40" name="cgpa"></br>
	<input type="submit" value="register" name="submit">
</form> 
<?php
include("connect.php");
if(isset($_POST["submit"])){
$name=$_POST["candname"];
$id=$_POST["candid"];
$sec=$_POST["sec"];
$cgpa=$_POST["cgpa"];
$query = mysqli_query($dbh, "insert into candidate(name,id,section,cgpa) values('$name','$id','$sec','$cgpa');")or die("Error adding");
echo "added";
}

?>
</body>
</html>
