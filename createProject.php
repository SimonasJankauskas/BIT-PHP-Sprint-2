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
		 $pname = $_POST['pname'];
		
		 $sql = "INSERT INTO projects (pname)
		 VALUES ('$pname')";
		 if (mysqli_query($conn, $sql)) {
			header('Location: projects.php');
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
    <form class="create_form" method="post" action="createProject.php">		
		<p>Enter new project name</p><br>
		<input type="text" name="pname">
		<br>
		<br><br>
		<input type="submit" name="save" value="Submit">
	</form>
</body>
</html>