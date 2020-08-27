<?php

//add_comment.php

$connect = new PDO('mysql:host=localhost;dbname=testings', 'root', '');

$error = '';
$article_name = '';
$comment_name = '';
$comment_content = '';

if(empty($_POST["article_name"]))
{
 $error .= '<p class="text-danger">Aricle name is required</p>';
}
else
{
 $article_name = $_POST["article_name"];
}

if(empty($_POST["comment_name"]))
{
 $error .= '<p class="text-danger">Name is required</p>';
}
else
{
 $comment_name = $_POST["comment_name"];
}

if(empty($_POST["comment_content"]))
{
 $error .= '<p class="text-danger">Comment is required</p>';
}
else
{
 $comment_content = $_POST["comment_content"];
}

if($error == '')
{
 $query = "
 INSERT INTO tbl_comments 
 (parent_comment_id,article_name, comment, comment_sender_name) 
 VALUES (:parent_comment_id,:article_name, :comment, :comment_sender_name)
 ";
 $statement = $connect->prepare($query);
 $statement->execute(
  array(
   ':parent_comment_id' => $_POST["comment_id"],
   ':article_name'    => $article_name,
   ':comment'    => $comment_content,
   ':comment_sender_name' => $comment_name
  )
 );
 $error = '<label class="text-success">Comment Added</label>';
}

$data = array(
 'error'  => $error
);

echo json_encode($data);

?>