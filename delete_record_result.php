<!doctype html>
<html>
<head>
<meta charset="UTF-8">
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<link rel="stylesheet" href="./all.css">
<title>delete_record_result.php</title>
</head>

<body>
<?php	
require 'login_validate.php';
require 'db/db_connect.php';

$bid_id = $_POST["bid_id"];

$query_bid = " DELETE FROM auction WHERE bid_id=$bid_id ";
$result_bid = mysqli_query($link, $query_bid);

mysqli_close($link);

if ($result_bid)
	header("location:result.php");
else
	echo 'Delete Error';
?>
</body>
</html>