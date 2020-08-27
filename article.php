<!DOCTYPE html>
<html>

  <head>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" href="Styling.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.mim.css">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
   <title> Daily articles</title>
<style>
 
 {font-family: Arial, Helvetica, sans-serif;
}

.navbar {
  overflow: hidden;
  background-color: #333;
}

.navbar a {
  float: left;
  font-size: 16px;
  color: white;
  text-align: center;
  padding: 14px 16px;
  text-decoration: none;
}

.navbar a:hover ,{background-color:#A93226;
}

<style>
label {
  /* Presentation */
  font-size: 48px
}

/* Required Styling */

label input[type="checkbox"] {
  display: none;
}

.custom-checkbox {
  margin-left: 2em;
  position: relative;
  cursor: pointer;
}

</style>
</style>
  </head>
<body>

    <body background="pro.jpg">
      <img src="https://media1.picsearch.com/is?fTmt_O3p6InAG0O4GxS1m_C_iEg_IGIHOq2b_ax-9WU&height=341" align="left" width=110>
      <br>
      <br>
      <br>
      <br>
      <br>
      <h1><b><font color="#A93226">Oil and Gas Corporation Limited</font></b></h1>
      <br>
      
      
      <pre>
<div align="center">
    <h1 style="font-size:275%";><b>ARTICLES</b></h1> <marquee>
              <h3>We've got all the articles you love to bing!
    </h3></marquee></pre>
    </div>
    <div class="navbar">
    
<!-- something left here really important -->
<a href="login2.php">Login</a>
<a href="registration2.php">Sign Up</a>
</div>  


      <pre>
      <h2 align="center">
                 Welcome to the official article sharing page of ONGC 
                        ( Oil and Gas Corporation Limited ). 
                Here you can post your own articles , comment on other
                               articles as well.
                 So what are you waiting for . Register yourself and 
                               get started :)
      

      </h2>
    </pre>
     

<?php

//fetch_comment.php

$connect = new PDO('mysql:host=localhost;dbname=testing', 'root', '');

$query = "
SELECT * FROM tbl_comment 
WHERE parent_comment_id = '0' 
ORDER BY comment_id DESC
";

$statement = $connect->prepare($query);

$statement->execute();

$result = $statement->fetchAll();
$output = '';
foreach($result as $row)
{
 $output .= '
 <div class="panel panel-default">
  <div class="panel-heading">Topic name- <b>'.$row["comment_sender_name"].'</b> on <i>'.$row["date"].'</i>
<link href="//netdna.bootstrapcdn.com/bootstrap/3.0.0/css/bootstrap.min.css" rel="stylesheet">
  </div>
  <div class="panel-body">'.$row["comment"].'</div>
  <div class="panel-footer" align="right">
<br>





</p></div>
</p>

</div>

<?php
// this is just a simple like code 
?> 
 </div>
 ';
 $output .= get_reply_comment($connect, $row["comment_id"]);
}

echo $output;

function get_reply_comment($connect, $parent_id = 0, $marginleft = 0)
{
 $query = "
 SELECT * FROM tbl_comment WHERE parent_comment_id = '".$parent_id."'
 ";
 $output = '';
 $statement = $connect->prepare($query);
// $statement->execute();
 $result = $statement->fetchAll();
 $count = $statement->rowCount();
 if($parent_id == 0)
 {
  $marginleft = 0;
 }
 else
 {
  $marginleft = $marginleft + 48;
 }
 if($count > 0)
 {
  foreach($result as $row)
  {
   $output .= '
   <div class="panel panel-default" style="margin-left:'.$marginleft.'px">
    <div class="panel-heading">Topic name- <b>'.$row["comment_sender_name"].'</b> on <i>'.$row["date"].'</i></div>
    <div class="panel-body">'.$row["comment"].'</div>
    
   </div>
   ';
   $output .= get_reply_comment($connect, $row["comment_id"], $marginleft);
  }
 }
 return $output;
}

?>

  
    </body>

</html>

