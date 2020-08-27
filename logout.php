<!DOCTYPE HTML>
<HEAD><TITLE>hella</TITLE>
</HEAD>
<BODY>
<?php
session_start();
// Destroying All Sessions
if(session_destroy())
{
// Redirecting To Home Page
header("Location: login2.php");
}
?>
<a href="welcome_home.php"></a>
</BODY>
</HTML>