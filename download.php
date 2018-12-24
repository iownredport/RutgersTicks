<?php
include "connect.php";
if(isset($_POST["download"])){
	  header('Content-Type: text/csv; charset=utf-8');  
      header('Content-Disposition: attachment; filename=GSParking.csv');  
      $output = fopen("php://output", "w");  
      fputcsv($output, array('TicketID',"Reason","Date"));  
      $query = "select * from tickets order by Date ASC";  
      $result = $conn->query($query); 
      while($row = mysqli_fetch_assoc($result))  
      {  
           fputcsv($output, $row);  
      }  
      fclose($output);

}

?>
