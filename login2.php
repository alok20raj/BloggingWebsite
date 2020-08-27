<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<title>Login</title>
<style type="text/css">
	<style>
body {font-family: Arial, Helvetica, sans-serif;}
form {border: 3px solid #f1f1f1;}

input[type=text], input[type=password] {
  width: 100%;
  padding: 12px 20px;
  margin: 8px 0;
  display: inline-block;
  border: 1px solid #ccc;
  box-sizing: border-box;
}

button {
  background-color: #4CAF50;
  color: white;
  padding: 14px 20px;
  margin: 8px 0;
  border: none;
  cursor: pointer;
  width: 100%;
}

button:hover {
  opacity: 0.8;
}

.cancelbtn {
  width: auto;
  padding: 10px 18px;
  background-color: #f44336;
}

.imgcontainer {
  text-align: center;
  margin: 24px 0 12px 0;
}

img.avatar {
  width: 40%;
  border-radius: 50%;
}

.container {
  padding: 16px;
}

span.psw {
  float: right;
  padding-top: 16px;
}

/* Change styles for span and cancel button on extra small screens */
@media screen and (max-width: 300px) {
  span.psw {
     display: block;
     float: none;
  }
  .cancelbtn {
     width: 100%;
  }
}
</style>
</style>
<link rel="stylesheet" type="text/css" href="style.css" />
		<meta name="viewport" content="width=device-width, initial-scale">
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">

	    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
	    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
	
</head>
<body>

	<BODY background="pro.jpg">
		<img src = "https://media1.picsearch.com/is?fTmt_O3p6InAG0O4GxS1m_C_iEg_IGIHOq2b_ax-9WU&height=341" align = "left" width=110>
		<br>
		<br>
		<br>
		<br>
		<br>
	

<h2><font color="#A93226"><b>Oil and Gas Corporation Limited</b></font></h2>
		<form action="https://www.ongcindia.com" target="https://www.ongcindia.com" method="GET">
			 
			<!--	<fieldset>
					
					<br>
 					<label for="Username">USERNAME:</label>
		<div align="center">	
			<input id="username" class="textbox" type="email" placeholder="email" required><br><br>
					<label for="password">PASSWORD:</label>
					<input id="password" class="textbox" type="password" placeholder="password" required><br><br><br>
					<input type="reset">
				</fieldset> -->
			</form>
			
			<!-- </div> -->
<?php
require('db.php');
session_start();
// If form submitted, insert values into the database.
if (isset($_POST['email'])){
        // removes backslashes
	$email = stripslashes($_REQUEST['email']);
        //escapes special characters in a string
	$email = mysqli_real_escape_string($con,$email);
	$password = stripslashes($_REQUEST['password']);
	$password = mysqli_real_escape_string($con,$password);
	//Checking is user existing in the database or not
        $query = "SELECT * FROM `users` WHERE email='$email'
and password='".md5($password)."'";
	$result = mysqli_query($con,$query) or die(mysql_error());
	$rows = mysqli_num_rows($result);
        if($rows==1){
	    $_SESSION['email'] = $email;
            // Redirect user to index.php
	    header("Location: index.php");
         }else{
	echo "<div class='form'>
<h3>Firstname/password is incorrect.</h3>
<br/>Click here to <a href='login.php'>Login</a></div>";
	}
    }else{
?>
<div class="form">
<h1>Log In</h1>
<form action="" method="post" name="login">
<label for="firstname">EMAIL:</label>
<input type="text" name="email" placeholder="email" required /><br>
<label for="password">PASSWORD:</label>
<input type="password" name="password" placeholder="Password" required /><br>
<input name="submit" type="submit" value="Login" />
<input type="reset">
</form>
<p>Not registered yet? <a href='registration2.php'>Register Here</a></p>
</div>
<?php } ?>
</body>
</html>