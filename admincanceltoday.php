<?php

  $id=$_GET['id'];
  $conn=mysqli_connect("localhost","root","","admins");
  
  $sql="select *  from time_slot inner join  ticket on time_slot.id= ticket.time_slot_id where ticket.id = ".$id;
  $result = $conn->query($sql);
  $row = mysqli_fetch_assoc($result);
  $time = $row['time'];
  $date = $row['booked_for'];
  
  

  $sql="Delete from ticket where id = ".$id;
  $conn->query($sql);
  if($conn->query($sql)==true)
  {
    mail($email,"Booking futsal","Your booking has been canceled for $time, $date","From: ncitproject@gmail.com");
  	echo "<script>alert('$time booking has been removed')</script>";
  	echo "<script>window.location='balkumarifutsaladmin.php'</script>";
  }
  else{
  	echo "<script>alert('error occurred')</script>";
  	echo "<script>window.location='balkumarifutsaladmin.php'</script>";
  }
  ?>