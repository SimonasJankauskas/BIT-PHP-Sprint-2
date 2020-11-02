<?php

$conn=mysqli_connect('localhost','root','mysql','sprint2db');


if (isset($_GET['id']) && intval($_GET['id'])) {
    $id = (int) $_GET['id'];
    

    $sql = "SELECT * FROM employees 
            WHERE eid='$id'";


    $qry = mysqli_query($conn, $sql); // select query

    $row = mysqli_fetch_array($qry); // fetch data

    if(isset($_POST['update'])) // when click on Update button
    {
        $name = $_POST['ename'];
        $projects = $_POST['project_id'];

        $edit = mysqli_query($conn,"UPDATE employees 
                                    SET ename='$name', pid='$projects' 
                                    WHERE eid='$id'");

        
        if($edit)
        {
            mysqli_close($conn); // Close connection
			header("Location: employees.php"); // redirects to index page
            exit;
        }
          	
    }
}     	


?>

<!DOCTYPE html>
<html>

<head>
	<title>Update employee information</title>
	<link rel="stylesheet" href="styles.css">
</head>

<body>
<section class="mainBody" style="height: 500px; width: 500px; margin: 0 auto;">
	<div id="wrapper">
		<a href="employees.php"><input id="show_empl_btn" type="button" value="Show Employee List"></a>
		<a href="homePage.php"><button id="top">Back to Home Page</button></a>
	</div>
	<h2>Update Project Information</h2>
	<hr>
	<form method="POST" class="formDiv">
		<table id="update_tbl" cellspacing="15px;">
			<tr>
				<td> <label for="name">Update name:</label></td>
				<td> <input type="text" id="name" name="ename" value="<?php echo $row['ename'] ?>" Required></td>
			</tr>
			<tr>
				<td><label for="project_id">Assign/Change project:</label></td>
				<td><select id="project_id" name="project_id">
            <?php
            $sql = "SELECT projects.pid, projects.pname 
                FROM projects";

            $result = mysqli_query($conn, $sql);
            if (mysqli_num_rows($result) > 0) {
                while($row = mysqli_fetch_assoc($result)) {
                    ?>
                    <option value="<?php echo $row['pid']; ?>"><?php echo $row['pname']; ?></option>
                    <?php 
                }
            } ?>
        </select></td>
			</tr>
	
	<tr><td><input id="update_btn" type="submit" name="update" value="Update"></td></tr>		
		</table>
	</form>	
</section>
</body>

</html>