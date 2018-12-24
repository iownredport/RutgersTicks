<?php
include "connect.php";
include "download.php";
if(!(isset($_SERVER['HTTP_REFERER']))){
	exit('Direct access is not allowed. Please log in.');
}

?>

<!DOCTYPE html>
<html>
<head>
	<title>Rutgers Parking Ticket Database</title>
	<link rel="stylesheet" type="text/css" href="infostyles.css">
</head>
<body>
<form id= "total" action="get.php" method="POST">
  <select name="Reason">
  	<option value="" disabled selected hidden>Who is this ticket for?</option>
    <option value="Student">Student</option>
    <option value="Instructor">Instructor</option>
    <option value="Onsite Coordinator">Onsite Coordinator</option>
    <option value="Visitor">Visitor</option>
    <option value="Other">Other</option>
  </select>
<input id="TicketID" type="text" name="TicketID" placeholder="TicketID Goes Here" >
  <input type="submit" class="submit">
<div class="content"></div>  
<div id="alert"></div>
</form>

<form method ="POST" action="download.php">
	<input type="submit" name="download" value ="Download Current Database" class="download">
</form>

</body>


	<script src="https://code.jquery.com/jquery-3.3.1.min.js" integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8=" crossorigin="anonymous"></script>
	<script src="//code.jquery.com/ui/1.12.1/jquery-ui.js"></script>

<script>
	$(document).ready(function(){
		$('#total').submit(function(e){
			$('.alert').text('');
			 $('.content').text('Please Wait..');

			$.ajax({
				type: "POST",
				url: "get.php",
				data: $("#total").serialize(),
				success: function(data){
					
					 $("#alert").html(data); 
					  $('.content').text('');
					  $('#TicketID').val('');
					  $('#TicketID').focus();
					console.log(data);
				}
			})
			e.preventDefault();
		})
	})
</script>


</html>