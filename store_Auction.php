<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Untitled Document</title>
<script type="text/javascript">
function MM_callJS(jsStr) 
{ //v2.0
  return eval(jsStr)
}
</script>
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<link rel="stylesheet" href="./all.css">
</head>

<body>
	<?php
	echo '<h3>Auction Record Result</h3>';
	require 'login_validate.php';
	require 'db/db_connect.php';
		  
	session_start();
	$user_id = $_SESSION['user_id'];
	$bid_price_me = $_POST["bid_price"];
	$artwork_id = $_GET["artwork_id_a"];
	
	$query_artwork = "SELECT * FROM artwork WHERE artwork_id='$artwork_id'";
	$result_artwork = mysqli_query($link, $query_artwork);
	mysqli_close($link);
	$row = mysqli_fetch_assoc($result_artwork);
	$starting_price = $row['starting_price'];
	$user_id_a = $row['user_id'];
	
	require 'db/db_connect.php';
	$query_auction = "SELECT bid_price FROM auction WHERE artwork_id ='$artwork_id' ORDER BY auction_time DESC LIMIT 1";
	$result_auction = mysqli_query($link, $query_auction);
	mysqli_close($link);
	$row_auction = mysqli_fetch_assoc($result_auction);	  	
	$bid_price_highest = $row_auction['bid_price'];
	
	if ($user_id_a == $user_id)
	{
	?>
		<p>You can not bid on your own work!</p>
		<input type="button" onclick="MM_callJS('history.go(-1)')" value="Retry">
	<?php
	}
	else
	{
		if ($bid_price_me <= $bid_price_highest || $bid_price_me <= $starting_price)
		{
			?>
			<p>Your bid is lower than the highest!</p>
			<input type="button" onclick="MM_callJS('history.go(-1)')" value="Retry">
			<?php	
		}	
	
	
		elseif(is_numeric($bid_price_me)<>1)
		{
			?>
			<p>Please enter a number!</p>
			<input type="button" onclick="MM_callJS('history.go(-1)')" value="Retry">
			<?php
		}		  
		else
		{
			require 'db/db_connect.php';
		
			$query="INSERT INTO auction VALUES
			(NULL, '$artwork_id', '$user_id', '$bid_price_me',NOW())";
			$result=mysqli_query($link, $query);
			mysqli_close($link);
		
			if (!$result)
				echo 'Cannot insert records.';
			else
				echo 'Your bid has been successfully recorded.';

			header("Refresh:2; url=detail.php?artwork_id_p=$artwork_id");
		}
  	}
?>	
</body>
</html>