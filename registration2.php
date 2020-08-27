<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<title>Register</title>
<link rel="stylesheet" href="css/style.css" />
</head>
<style>
body {font-family: Arial, Helvetica, sans-serif;}
* {box-sizing: border-box}


input[type=text], input[type=password] {
  width: 100%;
  padding: 15px;
  margin: 5px 0 22px 0;
  display: inline-block;
  border: none;
  background: #f1f1f1;
}

input[type=text]:focus, input[type=password]:focus {
  background-color: #ddd;
  outline: none;
}

hr {
  border: 1px solid #f1f1f1;
  margin-bottom: 25px;
}


button {
  background-color: #4CAF50;
  color: white;
  padding: 14px 20px;
  margin: 8px 0;
  border: none;
  cursor: pointer;
  width: 100%;
  opacity: 0.9;
}

button:hover {
  opacity:1;
}


.cancelbtn, .signupbtn {
  float: left;
  width: 50%;
}


.container {
  padding: 16px;
}

.clearfix::after {
  content: "";
  clear: both;
  display: table;
}

.@media screen and (max-width: 300px) {
  .cancelbtn, .signupbtn {
     width: 100%;
  }
}
</style>
<body>
<img src = "https://media1.picsearch.com/is?fTmt_O3p6InAG0O4GxS1m_C_iEg_IGIHOq2b_ax-9WU&height=341" align = "left" width="110">
<br>
<br>
<br>
<br>
<br>
<br>

<h1><font color="#A93226">Oil and Gas Corporation Limited</font></h1>




<?php
require('db.php');
// If form submitted, insert values into the database.
if (isset($_REQUEST['username'])){
        // removes backslashes
    $username = stripslashes($_REQUEST['username']);
        //escapes special characters in a string
    $username = mysqli_real_escape_string($con,$username); 
    $firstname = stripslashes($_REQUEST['firstname']);
        //escapes special characters in a string
    $firstname = mysqli_real_escape_string($con,$firstname); 
    $lastname = stripslashes($_REQUEST['lastname']);
        //escapes special characters in a string
    $lastname = mysqli_real_escape_string($con,$lastname); 
    $email = stripslashes($_REQUEST['email']);
    $email = mysqli_real_escape_string($con,$email);
    $password = stripslashes($_REQUEST['password']);
    $password = mysqli_real_escape_string($con,$password);
    $trn_date = date("Y-m-d H:i:s");
        $query = "INSERT into `users` (username, firstname, lastname, password, email, trn_date)
VALUES ('$username','$firstname','lastname', '".md5($password)."', '$email', '$trn_date')";
        $result = mysqli_query($con,$query);
        if($result){
            echo "<div class='form'>
<h3>You are registered successfully.</h3>
<br/>Click here to <a href='login2.php'>Login</a></div>";
        }
    }else{
?>
<div class="form">
<h1>Register</h1>
<form name="Register" action="" method="post" style="border:1px solid #ccc">

    <p>Please fill in this form to create an account.</p>
    <hr>
<div align="left">
<label for="User"><b>User Name:</b> </label>
<input type="text" name="username" placeholder="Username" required />
<br>
<label for="First"><b>First Name:</b> </label>
<input type="text" name="firstname" placeholder="firstname" required />
<br><label for="Last"><b>Last Name:</b></label>
<input type="text" name="lastname" placeholder="lastname" required />
<br>
<label for="email"><b> Email:</b></label>
<input type="text" name="email" placeholder="email" required />
<br>
<label for="Password"><b> Password:</b></label>
<input type="password" name="password" placeholder="Password" required />
<br>
<div align="center">
<div class="clearfix">
<input type="submit" name="submit" value="Register" />
<br>
</form>
</div>
<?php } ?>
</body>
</html>