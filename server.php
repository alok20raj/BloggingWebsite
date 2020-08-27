<?php
session_start();

$Email = "";
$Password = "";
$errors = array();


$db = mysqli_connect('localhost','root','','register') or die("could not connect to database");

$Email = mysqli_real_escape_string($db,$_POST['Email']);
//$Last_name = mysqli_real_escape_string($db, $_POST['Last_name']);
//$Gender = mysqli_real_escape_string($db, $_POST['Gender']);
$Password = mysqli_real_escape_string($db, $_POST['Password']);
//$Password = mysqli_real_escape_string($db, $_POST['Password']);
//$Date_of_Birth = mysqli_real_escape_string($db, $_POST['Date_of_Birth']);

if(empty($First_name)) array_push($errors, "First_name is required");
if(empty($Last_name)) array_push($errors, "Last_name is required");
//if(empty($gender)) array_push($errors, "Gender is required");
if(empty($Email)) array_push($errors, "Email is required");
if(empty($Password)) array_push($errors, "Password is required");
if(empty($Date_of_Birth)) array_push($errors, "Date_of_Birth is required");

$user_check_query = "SELECT * FROM form WHERE Email = '$Email' or Email = '$Password' LIMIT 1";

$result = mysqli_query($db, $user_check_query);
$user = mysqli_fetch_assoc($result);

if($user)
{
	if($user['First_name'] === $First_name)
	{
		array_push($errors, "Username already exists");
	}
		if($user['Email'] === $Email)
		{
			aray_push($errors, " This email id has s registerd username");
		}
	}

	if(count($errors) == 0)
	{
		$Password = md5($Password);
		print $Password;
		$query = "INSERT INTO sign_up(First_name,Last_name, Gender, Email, Password, Date_of_Birth) VALUES ('$First_name', '$Last_name', '$Gender', '$Email', '$Password', '$Date_of_Birth')";

		mysqli_query($db,$query);
		$_SESSION['First_name'] = $First_name;
		$_SESSION['success'] = "You are now logged in";

        header('location: index.php');
	}


if(isset($_POST['login_user']))
{
	$Email = mysqli_real_escape_string($db, $_POST['Email']);
	$Password = mysqli_real_escape_string($db, $_POST['Password']);

	if(empty($Email))
	{
		array_push($errors, "Email is required");
	}
	if(empty($Password))
	{
		array_push($errors, "Password is required");
	}

	if(count($errors) == 0)
	{
		$Passowrd = md5($Password);

		$query = "SELECT * FROM user WHERE Email= '$Email' AND Password= '$Password'";
		$results = mysqli_query($db, $query);

		if(mysqli_num_results($results))
		{
			$_SESSION['Email'] = $Email;
			$_SESSion['success'] = "Logged in successfully";
			header('location: index.php');
		}
		else
		{
			array_push($errors, "wrong username or passowrd . Please try again");
		}
	}
}