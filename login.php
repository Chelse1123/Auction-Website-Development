<!doctype html>
<html>
<head>
<meta charset="UTF-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<link rel="stylesheet" href="./homepage.css">
<title>login</title>
<script type="text/javascript">
function MM_callJS(jsStr) 
{ //v2.0
  return eval(jsStr)
}
</script>
</head>

<body>
<p>
  <?php

require 'db/db_connect.php';

$user_email		= $_POST["user_email"];
$user_password	= $_POST["user_password"];

$query="SELECT user_id FROM user WHERE user_email='$user_email' AND user_password='$user_password'";
$result=mysqli_query($link, $query);
$num = mysqli_num_rows($result);
mysql_close($link);

if ($num > 0)
{
	$row = mysqli_fetch_assoc($result);
	$user_id = $row['user_id'];
	session_start();
	$_SESSION['user_id'] = $user_id;
	header("location:artwork_display_menu.php");
}
else 
{
	?>
</p>
<p>&nbsp;</p>
<p>&nbsp;</p>
<p>&nbsp;</p>
<p>&nbsp;</p>
<p>&nbsp;</p>
<p>&nbsp;</p>
<p><a href="art_entrance.html">Artwork Auction System</a>
</p>
<p>&nbsp;</p>
    <h1>Log in</h1>
<p>&nbsp;</p>
	<p>Wrong Email or Password. </p>
	<p>
	  <input type="button" onclick="MM_callJS('history.go(-1)')" value="Retry">
</p>
	<p>
	<a href="register.html">Register as a new bidder.</a>
	</p>
	<p>&nbsp;</p>
	<?php
}

?>
	
</body>
</html>
