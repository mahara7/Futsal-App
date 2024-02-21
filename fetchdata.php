<?php
session_start();
$t=$_POST['id'];

if($t == 1) {
	$booked_for=date('Y-m-d');
} else if ($t == 2) {
	$booked_for = date("Y-m-d", strtotime("+1 day"));
}
else if ($t == 3) {
	$booked_for = date("Y-m-d", strtotime("+2 day"));
}

$conn=mysqli_connect("localhost","root","","admins");
			
                
					$sql = "select * from time_slot left join ticket  on time_slot.id=ticket.time_slot_id and ticket.booked_for='$booked_for'";
				
				
                $result=$conn->query($sql);
				
                $i=0;
                while($row=mysqli_fetch_assoc($result))
                {
					?>
					<tr>
        <th><?php echo $row['time']; ?></th>
		<td><?php echo $row['booked_for']; ?>
		
		<?php
        if(empty($row['time_slot_id']))
        {
          ?>
            <!--<a href="manualbookformtoday.php?time=<?php // echo $row['time']; ?>"><button>Book</button></a>-->
			<b>Not booked</b>
            <?php
          }
          ?> </td>
		<td>
                 
            <?php
            
          echo $row['mobile'];
                ?>
        </td>
        <td>
          <?php         
          echo $row['register'];
                ?>
        </td>
        <td>
            <?php
            if(!empty($row['time_slot_id']))
            {
              ?>
          <a href="admincanceltoday.php?id=<?php echo $row['id']; ?>"><button>cancel</button></a>
          <?php
            }
          ?>
        </td>
      </tr>
					
				<?php } ?>
                    

