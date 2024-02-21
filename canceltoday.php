<?php
  $time_slot_id=$_GET['time_slot_id'];
  $date=$_GET['date'];
  $conn=mysqli_connect("localhost","root","","admins");
  $sql="delete from ticket where time_slot_id='$time_slot_id' && booked_for='$date'";
  $conn->query($sql);
  if($conn->query($sql)==true)
  {
	$timeSlotQuery = "select * from time_slot where id=$time_slot_id";
	$resultTimeSlot=$conn->query($timeSlotQuery);
    $rowTimeSlot=mysqli_fetch_array($resultTimeSlot);
    $time=$rowTimeSlot['time'];
    
  	echo "<script>alert('booking has been removed for date:$date and time $time')</script>";
  	echo "<script>window.location='balkumarifutsalbooking.php'</script>";
  }
  else{
  	echo "<script>alert('error occurred')</script>";
  	echo "<script>window.location='balkumarifutsalbooking.php'</script>";
  }
  ?>