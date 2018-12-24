<!DOCTYPE html>
<html>
<head>
	<title>Rutgers Parking Ticket Database</title>
	<link rel="stylesheet" type="text/css" href="lgStyles.css">
</head>
<body>
<form id='login' action="login.php" method='post'>
	<img src="https://d3pb9c7cezktlk.cloudfront.net/wp-content/uploads/2015/03/auto-sync-250x333.gif">
  <input type="text" placeholder="Username" name="User" required>
  <input type="password" placeholder="Password" name="Pass" required>
  <button type='submit' name="Submit" value="submit">Login</button>
</form>
<div class="content"></div>
<div id="alert"></div>  
</body>

	<script src="https://code.jquery.com/jquery-3.3.1.min.js" integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8=" crossorigin="anonymous"></script>
<script src="//code.jquery.com/ui/1.12.1/jquery-ui.js"></script>


<script>
	$(document).ready(function(){
		$('#login').submit(function(e){
			$('.alert').text('');
			 $('.content').text('Please Wait..');

			$.ajax({
				type: "POST",
				url: "login.php",
				data: $("#login").serialize(),
				success: function(data){ 
					  $('.content').text('');
					  $("#alert").html(data);
					 if (data.indexOf("Invalid Username or Password") == -1){
					  $("#login").hide();
					  console.log(data);
					}
					$("#login").effect( "shake", {times:4}, 700 );
				}
			})
			e.preventDefault();
		})
	})
</script>
</html>