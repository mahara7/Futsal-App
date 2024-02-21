<?php
session_start();
//$data=array();

$date=$_POST['booked_for'];

				$conn=mysqli_connect("localhost","root","","admins");
                $sql="select * from time_slot";
                $result=$conn->query($sql);
				
                  while($row = $result->fetch_assoc()) {

				?>
      <tr>
        <th><?php echo $row['time']; ?></th>
        <td><?php
                
              $sql1="select * from ticket  where time_slot_id=$row[id] and booked_for = '$date'";
			   
				
                $result1=$conn->query($sql1);
                $row1=$result1->fetch_assoc();
                if (empty($row1['id'])) {
                  echo "not booked";
                }
                else
                  echo "booked";
                ?>
                </td>
        <td>
          <?php
        if(empty($row1['id']))
        {
          ?>
            <a href="today.php?time_slot_id=<?php echo $row['id']; ?> &date=<?php echo $date; ?>"><button>Book</button></a>
            <?php
          }
          ?>
        </td>
        <td>
            <?php

            if(!empty($row1['id']) && $_SESSION["email"]==$row1['email'])
            {
              ?>
          <a href="canceltoday.php?time_slot_id=<?php echo $row1['time_slot_id']; ?>&date=<?php echo $date; ?>"><button>cancel</button></a>
          <?php
            }
          ?>
        </td>
      </tr>
	  
				<?php } ?>
    

//echo json_encode($data,JSON_PRETTY_PRINT);