<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Document</title>
	<link rel="stylesheet" href="styles.css">
</head>
<body>
<?php 
	$conn=mysqli_connect('localhost','root','mysql','sprint2db');
	
	
	if(isset($_POST['save']))
	{	 
		 $ename = $_POST['ename'];
		
		 $sql = "INSERT INTO employees (ename)
		 VALUES ('$ename')";
		 if (mysqli_query($conn, $sql)) {
			header('Location: employees.php');
		 } else {
			echo "Error: " . $sql . "
	" . mysqli_error($conn);
		 }
		 mysqli_close($conn);
	}
	?>
   	 <div id="wrapper">
   		<a href="homePage.php"><button id="back_home_btn">Back to Home Page</button></a><br>
   </div>
    <form class="create_form" method="post" action="createEmployee.php">
		<p>Enter new employee name</p><br>
		<input type="text" name="ename">
		<br>
		<br><br>
		<input type="submit" name="save" value="Submit">
	</form>
</body>
</html>