<?php
$fname=$_POST['fname'];
$lname=$_POST['lname'];
$email=$_POST['email'];
$subject=$_POST['subject'];
$message=$_POST['message'];
$conn=mysqli_connect("localhost","root","","admins");
$sql="insert into messages values('','$fname','$lname','$email','$subject','$message')";
if($conn->query($sql)==true)
{
		echo "<script>alert('successfully sent!!')</script>";
		echo "<script>window.location='index.php'</script>";
	}
	else
	{
		echo "<script>alert('error sending!!!')</script>";
		echo "<script>window.location='index.php' </script>";
    }
?>