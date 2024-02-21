<?php
$mobile=$_POST['mobile'];
$name=$_POST['name'];
$address=$_POST['address'];
$email=$_POST['email'];
$vkey= $address.$name;
$password=md5($_POST['password']);
$conn=mysqli_connect("localhost","root","","admins");
$sql="select *from registration where email='$email'";
$result = mysqli_query($conn, $sql);
$row= mysqli_fetch_assoc($result);
if(isset($row['email']) && $row['email']==$email)
{ 
    echo "<script>alert('Account already exists')</script>";
	echo "<script>window.location='signup.php' </script>";
}
$sql="insert into registration values('','$name','$mobile','$address','$email','$password','$vkey',0)";

if($conn->query($sql)==true)
	{
		$to = $email;
		$subject = "Email verification";
		//$message = "<a href='http://localhost/consula/verify.php?vkey=$vkey'>Register Account</a>";
		$message=$vkey;
		//$headers = "From: ncitproject@gmail.com \r\n";
		//$headers .= "MIME-Version: 1.0" . "\r\n";
		//$headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";
		mail($to,$subject,$message,"From: ncitproject@gmail.com");
		header('location: thankyou.php');
	}
	else
		echo "<script>alert('error registering')</script>";
		echo "<script>window.location='signup.php' </script>";
  ?>