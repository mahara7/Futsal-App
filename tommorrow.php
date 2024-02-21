<?php
session_start();
$mobile=$_SESSION["mobile"];
$time=$_GET['time'];
$date=date("Ymd");
$tommorrow=date('Ymd', strtotime("$date +1 day"));
$table="date".$tommorrow;


    $conn=mysqli_connect("localhost","root","","admins");
    $sql="select *from registration where mobile='$mobile'";
    $result=$conn->query($sql);
    $row=mysqli_fetch_array($result);
    $email=$row['email'];
    $register=$row['name'];





$sql="select *from $table where time='$time'";
$result=$conn->query($sql);
$row=mysqli_fetch_array($result);
if ($row['status']==0) {
	$sql="update $table set status='1' where time='$time'";
	$conn->query($sql);
	$sql="update $table set register='$register' where time='$time'";
	$conn->query($sql);
	$sql="update $table set mobile='$mobile' where time='$time'";
	$conn->query($sql);
	$sql="update $table set email='$email' where time='$time'";
	$conn->query($sql);
	echo "<script>alert('you have booked for $time')</script>";


    $sql="select *from registration where mobile='$mobile'";
    $result=$conn->query($sql);
    $row=mysqli_fetch_array($result);
    $email=$row['email'];
    $date=date("Y-m-d");
    $tommorrow=date('Y-m-d', strtotime("$date +1 day"));
    mail($email,"Booking futsal","Your booking has been done for $time, $tommorrow","From: rocklifebehappy@gmail.com");

	echo "<script>window.location='mulpanibooking.php'</script>";
}
else
{
	echo "<script>alert('already booked!')</script>";
	echo "<script>window.location='mulpanibooking.php'</script>";
}
?>