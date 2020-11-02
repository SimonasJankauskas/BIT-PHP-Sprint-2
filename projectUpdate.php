  
<?php

$conn=mysqli_connect('localhost','root','mysql','sprint2db');

 
$pid=$_GET['id'];

$pname=$_POST['pname'];


$updateEmployeeData="UPDATE projects SET pname='$pname' WHERE pid='$pid'";

if (mysqli_query($conn,$updateEmployeeData)) {
	header("Location: projectEdit.php?id=".$pid);
}
?>