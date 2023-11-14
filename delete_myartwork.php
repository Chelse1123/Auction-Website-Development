<!doctype html>
<html>
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<link rel="stylesheet" href="./all.css">
<title>无标题文档</title>
</head>

<body>
<?php	
require 'login_validate.php';
require 'db/db_connect.php';

$artwork_id = $_POST["artwork_id"];
$query = "DELETE FROM artwork WHERE artwork_id = $artwork_id";
$result = mysqli_query($link, $query);

mysqli_close($link);

if ($result)
	header("location:myartwork.php");
else
	echo 'Delete Error';
?>
</body>
</html>

