<?php $conn=mysqli_connect('localhost','root','mysql','sprint2db');

$getEmployeeData="SELECT employees.eid, employees.ename, projects.pid as project_id, projects.pname FROM employees
LEFT JOIN projects
ON employees.pid = projects.pid";
$result=mysqli_query($conn,$getEmployeeData);

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Sprint2</title>
	<link rel="stylesheet" href="styles.css">	
</head>
<body>
   

	<h2>Employee Management System</h2>
	<div id="top_btns">
		<a href="employees.php"><button id="top">Employees</button></a>
		<a href="projects.php"><button id="top">Projects</button></a>
	</div>
	<table id="main_tbl" style="width:40%" border="1px solid black";>
			<thead>
				<th>#</th>
				<th>Employee Name</th>
				<th>Project name</th>	
				<th>Actions</th>			
			</thead>

			<tbody>

				<?php while($row=mysqli_fetch_assoc($result)) { ?>

				<tr>
					<td><?php echo $row['eid']?></td>
					<td><?php echo $row['ename']?></td>
					<td><?php echo $row['pname']?></td>
					<td><a href="delete.php?id=<?php echo $row['eid'];?>" onclick="return confirm('Are you sure?')"><button id="del_btn">Delete</button></a> <a href="edit.php?id=<?php echo $row['eid'];?>"><button id="edit_btn">Edit</button></a></td>

					
					<!-- <td>
						<a href="show.php?id=<?php echo $row['eid'];?>"><button>View</button></a>
						<a href="edit.php?id=<?php echo $row['eid'];?>"><button>Edit</button></a>
						<a href="delete.php?id=<?php echo $row['eid'];?>" onclick="return confirm('Are you sure?')"><button>Delete</button></a>
					</td> -->
				</tr>

				<?php } ?>

			</tbody>
		</table>
</body>
</html>