<?php

echo "<style> 
p{
	color:green;
     text-align: center;
     position:relative;
     font-size: 1rem;
  font-weight: 400;
   font-family: 'Montserrat', sans-serif;
  font-weight: 700;
  letter-spacing: 1px;
   margin-bottom:10%;
	}
</style>";



include "connect.php";
//echo var_dump($_POST);
$TicketID = $_POST["TicketID"];
$Reason = $_POST["Reason"];

if($Reason == ''){
  die("Error: Blank Person");
}

if($TicketID == ''){
  die("Error: Blank TicketID");
}



$sql = "insert into tickets (TicketID, Reason, Date)
Values ('$TicketID', '$Reason', NOW()) ";

if ($conn->query($sql) === TRUE) {
    echo "<p>New record of '$TicketID' created successfully</p>";
}
else {

  if (mysqli_errno($conn) == 1062) {
    die ("Error: TicketID of '$TicketID' Already Exists In Database");
}
    echo "Error: " . $error =$conn->error;
    }
?>

