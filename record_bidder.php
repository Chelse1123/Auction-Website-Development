<!doctype html>
<html>
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<link rel="stylesheet" href="./homepage.css">
<title>Untitled Document</title>
<script type="text/javascript">
function MM_callJS(jsStr) 
{ //v2.0
  return eval(jsStr)
}
</script>
</head>

<body>
<p>&nbsp;</p>
<p>&nbsp;</p>
<p>&nbsp;</p>
<p>&nbsp;</p>
<p><a href="art_entrance.html" target="_parent">Art Entrance</a>
</p>
<p>&nbsp;</p>
    <p>
      <?php
	require 'db/db_connect.php';
	$user_email			= $_POST["user_email"];
	$user_password		= $_POST["user_password"];
	$query = "SELECT user_email FROM user WHERE user_email='$user_email'";
	$result = mysqli_query($link, $query);
	$num = mysqli_num_rows($result);
	
	echo 
		'<h1>Register</h1>';
	
	if ($num > 0)
	{
	?>
    </p>
	    <p>Your email address has been used.</p>
	    <p>&nbsp;</p>
		<input type="button" onclick="MM_callJS('history.go(-1)')" value="Retry">
	<?php
		mysqli_close($link);
	}
	else
	{
		$query="INSERT INTO user VALUES
		(NULL,'$user_email', '$user_password')";
		$result=mysqli_query($link, $query);
		mysqli_close($link);

		if (!$result)
			echo 'Cannot insert records: ' . mysqli_error($link);
		else
			echo "Bidder successfully registered!";

		header("Refresh:3; url=art_entrance.html");
	}

?>
</body>
</html>
