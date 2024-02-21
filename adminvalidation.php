<?php

  $name=$_POST['name'];
  $pass=$_POST['password'];
  $conn=mysqli_connect("localhost","root","","admins");
  $sql="select *from names where name='$name' and password = '$pass'";
  $result=$conn->query($sql);
  $row=mysqli_fetch_array($result);
  if(mysqli_num_rows($result)> 0){
         echo "<script>alert('successfully logged in')</script>";
         echo "<script>window.location='balkumarifutsaladmin.php'</script>";
    }
  else
     {
      echo "<script>alert('Incorrect password or owner')</script>";
      echo "<script>window.location='adminpage.php'</script>";
  }


  ?>
