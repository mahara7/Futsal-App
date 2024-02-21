
<?php
if(isset($_POST['submit'])){
	$email=$_POST['email'];
	$password=md5($_POST['password']);
	$conn=mysqli_connect("localhost","root","","admins");
	echo $sql="select * from registration where email='$email' and password = '$password'";
	$result=$conn->query($sql);
    $row=mysqli_fetch_assoc($result);
	if (mysqli_num_rows ($result) > 0) {
		if($row['verified']==1)
		{
			session_start();
		    $_SESSION["status"]="loggedin";
		    $_SESSION["email"]=$email;
			$_SESSION["mobile"] = $row['mobile'];	
		    $_SESSION["password"]=$row['password'];
		    echo "<script>alert('successfully logged in')</script>";
		    echo "<script>window.location='balkumarifutsalbooking.php'</script>";
		}
		else
		{
			echo "<script>alert('Please verify your account to continue')</script>";
		    echo "<script>window.location='login.php'</script>";
		}
	}
	else
	   {
		echo "<script>alert('Not registered')</script>";
	    echo "<script>window.location='login.php'</script>";
	}
}
else
{
	echo "<script>alert('Illegal access')</script>";
	echo "<script>window.location='index.html'</script>";
}
	?>

