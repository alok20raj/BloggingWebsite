<!DOCTYPE html>
<html>
<head>
<title>Comment System using PHP and Ajax</title>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" type="text/css" href="Styling.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.mim.css">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
  <style type="text/css">
  	
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


h1 {
  font-family: verdana, sans-serif;
  font-weight: bold;
  text-align: center;
  position: relative;
  top: -10px;
}

a {
  text-decoration: none;
}

#btn1 {
  top: 100px;
}


div.button {
  background-color: #C0C0C0;
  color: #2c3e50;
  border: none;
  border-radius: 30px;
  width: 500px;
  height: 60px;
  position: fixed;
  left: -435px;
  transition: .7s ease;
}

div.button:hover {
  background-color: #C0C0C0;
  position: fixed;
  left: -50px;
  width: 600px;
  border-radius: 0px;
  box-shadow: 0px 5px 0px #c0392b;
}

div.button:active {
  background-color: #2c3e50;
  transition: 0s;
  color: #ecf0f1;
}


</style>
<body>
<?php
require('db.php');
include("auth.php");
?>


<img  align="center" src = "https://media1.picsearch.com/is?fTmt_O3p6InAG0O4GxS1m_C_iEg_IGIHOq2b_ax-9WU&height=341" width="110">
<br>
<br>
<br>
<br>
<br>
<br>
<h2 align="center"><font color="#A93226" align="left"><b>Oil and Gas Corporation Limited</b></font></h2>
<hr>

<div class="navbar">
<a href="index.php">Home</a>    
<!-- something left here really important -->
<a href="login2.php">Login</a>
<a href="registration2.php">Sign Up</a>
<a href="welcome_home.php">Logout</a>
</div>
<div align="left">
<div class="form">

<marquee>
<h4><i><font color="#000000"><b>Start writing no matter what....  :)</b></font></i></h4>
</marquee>
<marquee>
<h4><i><font color="#000000" align="center"><b>And at the end , we have got all the articles that you would love to bing about ... :)</b></font></i></h4>
</marquee>

  </style>
<br />
<br>
<br>
<h2 align="center"><b>Dashboard <span class="glyphicon glyphicon-pencil"></span></b></h2>
<br />

<br>
 <br>
  <div class="container">
  

   <form method="POST" id="comment_form">
    <div class="form-group">
     <input type="text" name="article_name" id="article_name" class="form-control" placeholder="Enter Name of the article on which you want to comment" />
    </div>
    <div class="form-group">
     <input type="text" name="comment_name" id="comment_name" class="form-control" placeholder="Enter your Name" />
    </div>
    <div class="form-group">
     <textarea name="comment_content" id="comment_content" class="form-control" placeholder="Enter Comment" rows="5"></textarea>
    </div>
    <div class="form-group">
     <input type="hidden" name="comment_id" id="comment_id" value="0" />
     <input type="submit" name="submit" id="submit" class="btn btn-info" value="Submit" />
    </div>
   </form>
   <span id="comment_message"></span>
   <br />
   <div id="display_comment"></div>
  </div>

<script>
$(document).ready(function(){
 
 $('#comment_form').on('submit', function(event){
  event.preventDefault();
  var form_data = $(this).serialize();
  $.ajax({
   url:"add_comment1.php",
   method:"POST",
   data:form_data,
   dataType:"JSON",
   success:function(data)
   {
    if(data.error != '')
    {
     $('#comment_form')[0].reset();
     $('#comment_message').html(data.error);
     $('#comment_id').val('0');
     load_comment();
    }
   }
  })
 });

 load_comment();

 function load_comment()
 {
  $.ajax({
   url:"fetch_comment1.php",
   method:"POST",
   success:function(data)
   {
    $('#display_comment').html(data);
   }
  })
 }

 $(document).on('click', '.reply', function(){
  var comment_id = $(this).attr("id");
  $('#comment_id').val(comment_id);
  $('#comment_name').focus();
 });
 
});
</script>

</div>

<script>
var acc = document.getElementsByClassName("accordion");
var i;

for (i = 0; i < acc.length; i++) {
  acc[i].addEventListener("click", function() {
    this.classList.toggle("active");
    var panel = this.nextElementSibling;
    if (panel.style.display === "block") {
      panel.style.display = "none";
    } else {
      panel.style.display = "block";
    }
  });
}
</script>
</body>
</html>
<script>

$(document).ready(function(){
$('#comment_form').on('submit', function(event){
event.preventDefault();
var form_data = $(this).serialize();
$.ajax({
url:"add_comment1.php",
method:"POST",
data:form_data,
dataType:"JSON",
success:function(data)
{
if(data.error != '')
{
$('#comment_form')[0].reset();
$('#comment_message').html(data.error);
$('#comment_id').val('0');
load_comment();
}
}
})
});
load_comment();
function load_comment()
{
$.ajax({
url:"fetch_comment1.php",
method:"POST",
success:function(data)
{
$('#display_comment').html(data);
}
})
}
$(document).on('click', '.reply', function(){
var comment_id = $(this).attr("id");
$('#comment_id').val(comment_id);
$('#comment_name').focus();
});
});
</script>

    
  

<?php
// article without comments 
?>         
    </body>

</html>
<br>
  <br>
  <br>
<a href="index.php">
  <div id="btn1" class="button" >
    <h1 align="left">Home page</h1>
  </div>

</body>
</html>