<?php

//$first_date = '2005-04-02';
//echo date('Y-m-d', strtotime("$first_date +1 day"));


$today_date = date("Ymd");
$previous_date=date('Ymd', strtotime("$today_date -1 day"));
$conn=mysqli_connect("localhost","root","","admins");
$sql="select *from notifier where id=1";
    $result=$conn->query($sql);
    $row=mysqli_fetch_array($result);
    $date=$row['date'];
  // echo "<script>alert('$date')</script>";

if($today_date!=$date)
{
    $sql= "drop table date$previous_date;";
    $conn->query($sql);

    $next_date= date('Ymd', strtotime("$today_date +2 day"));
    $sql="CREATE TABLE date$next_date(
      id INT PRIMARY KEY,
      time VARCHAR(20),
      status SMALLINT default 0,
      register VARCHAR(50),
      mobile BIGINT,
      email VARCHAR(100)
       );";
    $conn->query($sql);
    $sql= "insert into date$next_date(id,time)
       values
       (1,'7AM-8AM'),
       (2,'8AM-9AM'),
       (3,'9AM-10AM'),
       (4,'10AM-11AM'),
       (5,'11AM-12PM'),
       (6,'12PM-1PM'),
       (7,'1PM-2PM'),
       (8,'2PM-3PM'),
       (9,'3PM-4PM'),
       (10,'4PM-5PM'),
       (11,'5PM-6PM'),
       (12,'6PM-7PM');";
    $conn->query($sql);
    $sql="update notifier set date=$today_date where id=1";
    $conn->query($sql);





}


$sec = "2";
header("Refresh: $sec; ");
?>