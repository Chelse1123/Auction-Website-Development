<head>
	<meta charset="UTF-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<link rel="stylesheet" href="all.css">
</head>
<?php
require 'login_validate.php';
require 'db/db_connect.php';
session_start();
	$user_id = $_SESSION['user_id'];
?>
<table class="lebt_nav" border="1">
	<tr>
		<td width="150">You are user <?php echo $user_id; ?></td>
		<td width="150"><a href="personal_center.php">Personal Center</a></td>
		<td width="150"><a href="artwork_display_menu.php">Artwork Display</a></td>
		<td width="150"><a href="logout.php">Log out</a></td>

	</tr>
</table>
<?php
mysqli_close($link);
?>
<p></p>
