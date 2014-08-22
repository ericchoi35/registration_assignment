<?php
session_start();

if(isset($_POST['action']) && $_POST['action'] = 'register')
{	
	foreach($_POST as $key => $value)
	{
		if(empty($_POST[$key]))
		{
		$_SESSION['error_messages'][$key] = $key . " cannot be empty";
		}
	}
	if(!filter_var($_POST['email'],FILTER_VALIDATE_EMAIL))
	{
		$_SESSION['error_messages']['email'] = "Please enter a valid email";
	}
	if(preg_match("/[0-9]/",$_POST['first_name']))
	{
		$_SESSION['error_messages']['first_name'] = "First name cannot contain numbers";
	}
	if(preg_match("/[0-9]/",$_POST['last_name']))
	{
		$_SESSION['error_messages']['last_name'] = "Last name cannot contain numbers";
	}
	if(strlen($_POST['password']) < 6)
	{
		$_SESSION['error_messages']['password'] = "Password cannot be less than 6 characters";
	}
	if($_POST['confirm_password'] != $_POST['password'])
	{
		$_SESSION['error_messages']['confirm_password'] = "Passwords do not match";
	}
	if (!isset($_SESSION['error_messages']))
	{
		$_SESSION['confirm_message'] = "Congratulations, you are registered!";
	}
}
var_dump($_FILES);

$temp = explode(".", $_FILES["profile_picture"]["name"]);
// echo 'TEMP<br>';
// var_dump($temp);

$extension = end($temp);
// echo 'EXTENSION<br>';
// echo $extension . '<br>';

move_uploaded_file($_FILES["profile_picture"]["tmp_name"], "upload/" . $_FILES["profile_picture"]["name"]);

// echo '$_FILES["profile_picture"]["name"]<br>';
// echo $_FILES["profile_picture"]["name"];



header('Location: index.php');
?>