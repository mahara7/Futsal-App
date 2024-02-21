<?php
session_start();



$mobile=$_SESSION["mobile"];
$time_slot_id=$_GET['time_slot_id'];
$date=$_GET['date'];

  $conn=mysqli_connect("localhost","root","","admins");
    $sql="select *from registration where mobile='$mobile'";
    $result=$conn->query($sql);
    $row=mysqli_fetch_array($result);
    $email=$row['email'];
    $register=$row['name'];
	$today = date('Y-m-d H:i:s');


$sql="select * from ticket where time_slot_id='$time_slot_id' and booked_for='$date'";
$result=$conn->query($sql);
$row=mysqli_fetch_assoc($result);
if (empty($row['id'])) {
	$sql="insert into ticket(time_slot_id,register,mobile,email,booked_for,booked_at) values ($time_slot_id,'$register','$mobile','$email','$date','$today')";
	
	$conn->query($sql);
	
	$timeSlotQuery = "select * from time_slot where id=$time_slot_id";
	$resultTimeSlot=$conn->query($timeSlotQuery);
    $rowTimeSlot=mysqli_fetch_array($resultTimeSlot);
    $time=$rowTimeSlot['time'];
    
	
	echo "<script>alert('you have booked for $time on date $date')</script>";



    $sql="select *from registration where mobile='$mobile'";
    $result=$conn->query($sql);
    $row=mysqli_fetch_array($result);
    $email=$row['email'];
    $date=date("Y-m-d");
    mail($email,"Booking futsal","Your booking has been done for $time, $date","From: rocklifebehappy@gmail.com");


	echo "<script>window.location='balkumarifutsalbooking.php'</script>";
}
else
{
	echo "<script>alert('already booked!')</script>";
	echo "<script>window.location='balkumarifutsalbooking.php'</script>";
}
?>