<?php

$conn=mysqli_connect('localhost','root','mysql','sprint2db');




$eid=$_GET['id']; 

$getEmployeeData="SELECT * FROM projects WHERE pid='$eid'";
$result=mysqli_query($conn,$getEmployeeData);
$emp=mysqli_fetch_assoc($result);

?>

<!DOCTYPE html>
<html>
<head>
	<title>Update Project Information</title>
	<link rel="stylesheet" href="styles.css">
</head>
<body>

<section class="mainBody" style="height: 500px; width: 500px; margin: 0 auto;">
	<div id="wrapper">
		<a href="projects.php"><input id="show_empl_btn" type="button" value="Show Project List"></a>
		<a href="homePage.php"><button id="top">Back to Home Page</button></a>
	</div>
	<h2>Update Project Information</h2>
	<hr>
	<form action="projectUpdate.php?id=<?php echo $eid?>" method="POST">
		<table id="update_tbl" cellspacing="15px;">
			<tr>
				<td>Project name:</td>
				<td><input id="update_input" type="text" name="pname" placeholder="Project Name..." required="1" value="<?php echo $emp['pname'] ?>"></td>
			</tr>
			<tr>
				<td></td>
				<td><input id="update_btn" type="submit" name="save" value="Update"></td>
			</tr>
		</table>
	</form>	
</section>

</body>
</html>