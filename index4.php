<?php include('server.php'); ?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Like and Dislike system</title>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" />
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
  <link rel="stylesheet" href="main.css">
  <style>
  .posts-wrapper {
  width: 50%;
  margin: 20px auto;
  border: 1px solid #eee;
}
.post {
  width: 90%;
  margin: 20px auto;
  padding: 10px 5px 0px 5px;
  border: 1px solid green;
}
.post-info {
  margin: 10px auto 0px;
  padding: 5px;
}
.fa {
  font-size: 1.2em;
}
.fa-thumbs-down, .fa-thumbs-o-down {
  transform:rotateY(180deg);
}
.logged_in_user {
  padding: 10px 30px 0px;
}
i {
  color: blue;
}
  </style>
</head>
<body>
 <!-- <div class="posts-wrapper">
   <?php foreach ($tbl_comment as $post): ?>
    <div class="post">
      <?php echo $post['comment']; ?>
      <div class="post-info">
      <!-- if user likes post, style button differently --> 
        <i <?php if (userLiked($post['comment_id'])): ?>
            class="fa fa-thumbs-up like-btn"
          <?php else: ?>
            class="fa fa-thumbs-o-up like-btn"
          <?php endif ?>
          data-id="<?php echo $post['comment_id'] ?>"></i>
        <span class="likes"><?php echo getLikes($post['comment_id']); ?></span>
        
        &nbsp;&nbsp;&nbsp;&nbsp;

      <!-- if user dislikes post, style button differently -->
        <i 
          <?php if (userDisliked($post['comment_id'])): ?>
            class="fa fa-thumbs-down dislike-btn"
          <?php else: ?>
            class="fa fa-thumbs-o-down dislike-btn"
          <?php endif ?>
          data-id="<?php echo $post['comment_id'] ?>"></i>
        <span class="dislikes"><?php echo getDislikes($post['comment_id']); ?></span>
      </div>
    </div>
   <?php endforeach ?>
  </div>
  <script>
$(document).ready(function(){

// if the user clicks on the like button ...
$('.like-btn').on('click', function(){
  var post_id = $(this).data('comment_id');
  $clicked_btn = $(this);
  if ($clicked_btn.hasClass('fa-thumbs-o-up')) {
    action = 'like';
  } else if($clicked_btn.hasClass('fa-thumbs-up')){
    action = 'unlike';
  }
  $.ajax({
    url: 'index4.php',
    type: 'post',
    data: {
      'action': action,
      'post_id': post_id
    },
    success: function(data){
      res = JSON.parse(data);
      if (action == "like") {
        $clicked_btn.removeClass('fa-thumbs-o-up');
        $clicked_btn.addClass('fa-thumbs-up');
      } else if(action == "unlike") {
        $clicked_btn.removeClass('fa-thumbs-up');
        $clicked_btn.addClass('fa-thumbs-o-up');
      }
      // display the number of likes and dislikes
      $clicked_btn.siblings('span.likes').text(res.likes);
      $clicked_btn.siblings('span.dislikes').text(res.dislikes);

      // change button styling of the other button if user is reacting the second time to post
      $clicked_btn.siblings('i.fa-thumbs-down').removeClass('fa-thumbs-down').addClass('fa-thumbs-o-down');
    }
  });   

});

// if the user clicks on the dislike button ...
$('.dislike-btn').on('click', function(){
  var post_id = $(this).data('comment_id');
  $clicked_btn = $(this);
  if ($clicked_btn.hasClass('fa-thumbs-o-down')) {
    action = 'dislike';
  } else if($clicked_btn.hasClass('fa-thumbs-down')){
    action = 'undislike';
  }
  $.ajax({
    url: 'index4.php',
    type: 'post',
    data: {
      'action': action,
      'post_id': post_id
    },
    success: function(data){
      res = JSON.parse(data);
      if (action == "dislike") {
        $clicked_btn.removeClass('fa-thumbs-o-down');
        $clicked_btn.addClass('fa-thumbs-down');
      } else if(action == "undislike") {
        $clicked_btn.removeClass('fa-thumbs-down');
        $clicked_btn.addClass('fa-thumbs-o-down');
      }
      // display the number of likes and dislikes
      $clicked_btn.siblings('span.likes').text(res.likes);
      $clicked_btn.siblings('span.dislikes').text(res.dislikes);
      
      // change button styling of the other button if user is reacting the second time to post
      $clicked_btn.siblings('i.fa-thumbs-up').removeClass('fa-thumbs-up').addClass('fa-thumbs-o-up');
    }
  }); 

});

});
  </script>
</body>
</html>