  
<?php

$conn=mysqli_connect('localhost','root','mysql','sprint2db');

 
$eid=$_GET['id'];

$ename=$_POST['ename'];


$updateEmployeeData="UPDATE employees SET ename='$ename' WHERE eid='$eid'";

if (mysqli_query($conn,$updateEmployeeData)) {
	header("Location: edit.php?id=".$eid);
}
?>