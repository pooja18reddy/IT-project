<html>







	<head>
		<?php
	session_start();
	include('connect.php');
	$query1="select * from candidate where section=1 and cgpa>6.5 order by vote_count desc;";
	$result1=mysqli_query($dbh,$query1);
	$query2="select * from candidate where section=2 and cgpa>6.5 order by vote_count desc;";
	$result2=mysqli_query($dbh,$query2);	
	$query3="select * from candidate where section=3 and cgpa>6.5 order by vote_count desc;";
	$result3=mysqli_query($dbh,$query3);	
?>
	<style>
		.table{
			float:left;
			margin-right:10px;
		}
		.tab{
			//float: left;
			margin-left:32%;
			width:100%;
		}
	</style>
	</head>
	<body>
	

		<center><h2>Welcome, Admin</h2></center>
<div class="tab"><table class="table" border=1px rules="all">
		<tr>
				<th colspan="2">Section 1</th>
		</tr>
		<tr>
			<th>Candidate</th>
			<th>Vote</th>
		</tr>
		<?php while($row1=mysqli_fetch_array($result1,MYSQLI_ASSOC)){ ?>
		<tr>
			<td><?php echo $row1['name']; ?></td>
			<td><?php echo $row1['vote_count']; ?></td>
		<?php } ?>
		</tr>
		</table>


		<table class="table" border=1px rules="all">
		<tr>
				<th colspan="2">Section 2</th>
		</tr>
		<tr>
			<th>Candidate</th>
			<th>Vote</th>
		</tr>
		<?php while($row2=mysqli_fetch_array($result2,MYSQLI_ASSOC)){ ?>
		<tr>
			<td><?php echo $row2['name']; ?></td>
			<td><?php echo $row2['vote_count']; ?></td>
		</tr>
			<?php } ?>
		</table>
		<table border=1px rules="all">
		<tr>
				<th colspan="2">Section 3</th>
		</tr>
		<tr>
			<th>Candidate</th>
			<th>Vote</th>
		</tr>
		<?php while($row3=mysqli_fetch_array($result3,MYSQLI_ASSOC)){ ?>
		<tr>
			<td><?php echo $row3['name']; ?></td>
			<td><?php echo $row3['vote_count']; ?></td>
		</tr>
			<?php } ?>
		</table>
		
</div>
<center>
<form action=" " method="post">
	<input type="submit" value="show result" name="submit">
</form>
</center>

<?php
include("connect.php");
if(isset($_POST["submit"])){
$qr="select c1.* from candidate c1 join (select section,max(vote_count) as vote_count from candidate  group by section)b on c1.section=b.section and c1.vote_count=b.vote_count and c1.cgpa>6.5;";
$r=mysqli_query($dbh,$qr) or die ("error querying");
while($row=mysqli_fetch_array($r,MYSQLI_ASSOC))
{
echo '<h1> WINNERS </h1>';
echo '<table border=2 align=center>';
echo '<tr>';
echo '<th WIDTH=50> STUDENT ID </th>';
echo '<th WIDTH=90> NAME </th>';
echo '<th WIDTH=90> SECTION </th>';
echo '<table border=1 align=center>';
echo '<tr>';
echo '<td width=50> '.$row['id'].' </td>';
echo '<td width=90> '.$row['name'].' </td>';
echo '<td width=90> '.$row['section'].' </td>';
echo '</tr>';
echo '</table>';
}
}

?>

	</body>
</html>		

	

