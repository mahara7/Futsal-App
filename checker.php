<?php
$today_date = date("Ymd");
$conn=mysqli_connect("localhost","root","","admins");


    $next_date= date('Ymd', strtotime("$today_date +2 day"));
    $sql="CREATE TABLE date$today_date(
      id INT,
      time VARCHAR(20),
      status SMALLINT default 0,
      register VARCHAR(50),
      mobile BIGINT,
      email VARCHAR(100)
       );";
    $conn->query($sql);
    $sql= "insert into date$today_date(id,time)
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

?>