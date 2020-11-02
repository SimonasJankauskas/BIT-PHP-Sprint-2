  
<?php

$conn=mysqli_connect('localhost','root','mysql','sprint2db');


$eid=$_GET['id'];


$deleteEmployeeData="DELETE FROM employees WHERE eid='$eid'";
$result=mysqli_query($conn,$deleteEmployeeData);					

if ($result) {
	header("Location: employees.php");
}


?>