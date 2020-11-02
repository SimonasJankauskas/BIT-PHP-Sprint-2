<?php

$conn=mysqli_connect('localhost','root','mysql','sprint2db');

$pid=$_GET['pid'];

$deleteProjectData="DELETE FROM projects WHERE pid='$pid'";
$result=mysqli_query($conn,$deleteProjectData);					

if ($result) {
	header("Location: projects.php");
}
?>