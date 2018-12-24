<?php 

echo "<style> 
p{
	color:red;
	 text-align: center;
	 position:relative;
	 right:2%;
	 font-size: 1rem;
  font-weight: 400;
   font-family: 'Montserrat', sans-serif;
  font-weight: 700;
  letter-spacing: 1px;
	}
</style>";

$user = $_POST["User"];
$pass = $_POST["Pass"];



if($user == "a" && $pass == "a"){
	
	echo "<script> window.location.assign('info.php'); </script>";

	exit();
}
else{
	die ("<p> Invalid Username or Password </p>");
}
 ?>
