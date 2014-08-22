<?php
session_start();
// session_destroy();
?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Registration without DB</title>
	<style type="text/css">
		.container{
			width: 300px;
			padding: 30px;
			border: 2px solid silver;
			font-family: sans-serif;
			display: inline-block;
			vertical-align: top;
		}
		.error{
			padding: 0 0 0 10px;
			border: none;
			display: inline-block;
		}
		input{
			display: block;
			margin-bottom: 10px;
		}
		input[type=submit]{
			margin-top: 20px;
			width: 100px;
		}
		#green{
			background-color: green;
			border: 1px solid silver;
			display: inline-block;
		}
		#red{
			background-color: red;
			border: 1px solid silver;
			display: inline-block;
		}
		p{
			padding: 10px;
			width: 400px;
		}
		
	</style>
</head>
<body>
	<div class="container">
		<form action="process.php" method="post" enctype="multipart/form-data">
			<input type="hidden" name="action" value="register">
			Email: <input type="text" name="email">
			First name: <input type="text" name="first_name">
			Last name: <input type="text" name="last_name">
			Password: <input type="password" name="password">
			Confirm Password: <input type="password" name="confirm_password">
			Birth Date: <input type="date" name="birth_date" placeholder="MM/DD/YYYY">
			Upload Profile Picture: <input type="file" name="profile_picture">
			<input type="submit" value="Register">
		</form>
	</div>
	<div class="container error">
<?php 	if(isset($_SESSION['error_messages']))
		{
			foreach($_SESSION['error_messages'] as $error)
			{
				echo "<p id=red>" . $error . "</p>";
			}
		}
		if(isset($_SESSION['confirm_message'])) 
		{
			echo "<p id=green>" . $_SESSION['confirm_message'] . "</p>";
		}	?>
	</div>
</body>
</html>

<?php 
// echo '<br>POST<br>';
// var_dump($_POST);
// echo '<br>SESSION<br>';
// var_dump($_SESSION['error_messages']);
$_SESSION = array();
?>