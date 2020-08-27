<!DOCTYPE html>
<html>
<head>
<style>
label {
  /* Presentation */
  font-size: 48px
}
.fa {
  padding: 20px;
  font-size: 30px;
  width: 50px;
  text-align: center;
  text-decoration: none;
  height: 5px;
  width: 5px;
}

/* Add a hover effect if you want */
.fa:hover {
  opacity: 0.7;
}

/* Set a specific color for each brand */

/* Facebook */
.fa-facebook {
  background: #3B5998;
  color: white;
  height: 5px;
  width: 5px;
}

/* Twitter */
.fa-twitter {
  background: #55ACEE;
  color: white;
  height: 5px;
  width: 5px;
}

.fa-linkedin {
  background: #0077B5;
  color: white;
  height: 5px;
  width: 5px;
}

</style>
</head>
<body>

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
   
  <div class="panel-footer" align="right"><i>Share the above article on -</i><p>


<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

<!-- Add font awesome icons -->
<a href="https://www.facebook.com/sharer?u=https://www.siamcomm.com&amp;t=Siam-Communications" class="fa fa-facebook"></a>
<a href="https://twitter.com/intent/tweet?text=How%20To%20Embed%20Social%20Wall%20On%20HTML%20Website%3F&url=https%3A%2F%2Ftaggbox.com%2Fsupport%2Fembed-social-wall-html-website%2F" class="fa fa-twitter"></a>
<a href="http://www.linkedin.com/shareArticle?mini=true&amp;url=https://www.siamcomm.com&amp;title=The title of the page or post&amp;summary=&amp;source=Siam-Communications" class="fa fa-linkedin"></a>




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