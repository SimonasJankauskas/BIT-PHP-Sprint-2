<?php $conn=mysqli_connect('localhost','root','mysql','sprint2db');

$getEmployeeData="SELECT 
projects.pid, 
projects.pname, 
group_concat(employees.ename ORDER BY employees.ename ASC SEPARATOR ', ') as employee
FROM employees
RIGHT JOIN projects
ON employees.pid = projects.pid
GROUP BY projects.pid;";
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
   
    <h2>Project List</h2>
    <div id="top_btns">
        <a href="employees.php"><button id="top">Employees</button></a>
        <a href="projects.php"><button id="top">Projects</button></a>
        <a href="createProject.php"><button id="top">Create new project</button></a>
        <a href="homePage.php"><button id="top">Back to Home Page</button></a>
    </div>
    <table id="main_tbl" style="width:40%" border="1px solid black";>
			<thead>
				<th>#</th>
                <th>Project Name</th>	
                <th>Employees</th>
                <th>Actions</th>		
			</thead>
			<tbody>

				<?php while($row=mysqli_fetch_assoc($result)) { ?>

				<tr>
					<td><?php echo $row['pid']?></td>
                    <td><?php echo $row['pname']?></td>
                    <td><?php echo $row['employee']?></td>
                    <td><a href="deleteProject.php?pid=<?php echo $row['pid'];?>" onclick="return confirm('Are you sure?')"><button id="del_btn">Delete</button></a> <a href="projectEdit.php?id=<?php echo $row['pid'];?>"><button id="edit_btn">Edit</button></a></td>
				</tr>

				<?php } ?>

			</tbody>
		</table>
</body>
</html>