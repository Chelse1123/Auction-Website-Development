<!doctype html>
<html>
<head>
<meta charset="UTF-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<link rel="stylesheet" href="./all.css">
<title>Untitled Document</title>
<style>
	body {text-align: center;} table {margin: auto;}
	</style>
</head>
<?php
require 'login_validate.php';
require 'header_menu.php';
?>

<body>
	<h1 style="text-align:center;">&nbsp;</h1>
	<h1 style="text-align:center;">&nbsp;</h1>
	<h1 style="text-align:center;">Artwork Display</h1>
	<p style="text-align:center;">&nbsp;</p>
	<p style="text-align:center;">&nbsp;</p>
	<p style="text-align:center;">&nbsp;</p>
	<p style="text-align:center;">Please select:<br>
		Ongoing: You can participate in the auction now!<br>
		Coming: You can view upcoming auctions and prepare for them.<br>
		Ended: You can view the results of auctions that have already ended.</p>
	<p style="text-align:center;">&nbsp;</p>
	<p style="text-align:center;">&nbsp;</p>
	<p style="text-align:center;">&nbsp;</p>
	<table  border="1" align="center">
		<tr>
			<td width="100"><a href="artwork_display_ongoing.php">Ongoing</a></td>
			<td width="100"><a href="artwork_display_coming.php">Coming</a></td>
			<td width="100"><a href="artwork_display_ended.php">Ended</a></td>
		</tr>
	</table>
</body>
</html>
