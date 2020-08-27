<HTML>
<HEAD>
<TITLE>ukhfeu</TITLE>
<style>
.like-btn {
  background: navy;
  border: none;
  padding: 1.25rem 2.5rem;
  color: #fff;
  font-size: 18px;
  text-align: left;
  min-width: 11rem;
  box-sizing: border-box;
  text-align: center;
  line-height: 2;
}

.like-btn__spinner {
  vertical-align: middle;
}


</style>
<script>
function save(isLiked, callback) {
  // Pretend this is an AJAX call.
  return Promise.delay(!isLiked, 2000);
}

$('.js-like-button').on('click', function(evt) {
  evt.preventDefault();
  var $btn = $(this);
  var liked = ($btn.text().match('Unlike') === null);
  $btn.html('<img class="like-btn__spinner" src="http://jxnblk.com/loading/loading-bars.svg" alt="loading"/> Saving');
  save(liked).then(function(isLiked) {
    if (liked) {
      $btn.html('☹&nbsp; Unlike');
    } else {
      $btn.html('♥︎&nbsp; Like');
    }
  });
});

</script>
</HEAD>
<BODY>
<?php
// judt a random button
?>
<button type="button" class="js-like-button like-btn">♥︎&nbsp; Like</button>

</BODY>
</HTML>