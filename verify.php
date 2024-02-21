<?php 
   if(isset($_POST['submit'])){
   	$email=$_POST['email'];
   	$code = $_POST['code'];
   	$conn=mysqli_connect("localhost","root","","admins");
    $sql="select *from registration where email='$email'";
    $result=$conn->query($sql);
    $row=mysqli_fetch_array($result);
    $codedata=$row['vkey'];
    if($row['verified']==1)
    {
        echo "<script>alert('Your accounnt is already verified!')</script>";
        echo "<script>window.location='login.php'</script>";
    }
    else
    {
    	if($codedata==$code)
        {
          $sql = "update registration set verified= '1' where email='$email'";
          if($conn->query($sql)==true)
          {
    	      echo "<script>alert('Your accounnt has been verified successfully!')</script>";
              echo "<script>window.location='login.php'</script>";
          }
          else
          {
    	      echo "Error verifying!";
          }
        }
        else
        {
        	  echo "<script>alert('Wrong code or Email Address!')</script>";
              echo "<script>window.location='thankyou.php'</script>";
        }
    }
   }
   else
   {
   	die("OOPs something went wrong!");
   }
 ?>