<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>无标题文档</title>
<script type="text/javascript">
function MM_callJS(jsStr) 
{ //v2.0
  return eval(jsStr)
}
</script>
<style>
	body {text-align: center;} table {margin: auto;}
	</style>
</head>

<body>
<?php
require 'header_menu.php';
?>
<h2>&nbsp;</h2>
<h2>Update an artwork:</h2>
<p>&nbsp;</p>
    
<?php  
require 'login_validate.php';
require 'db/db_connect.php';   
    session_start();
	$user_id = $_SESSION['user_id'];
    $artwork_id = $_POST["artwork_id"];
    $query = " SELECT * FROM artwork WHERE artwork_id = $artwork_id";
    $result = mysqli_query($link, $query);
	mysqli_close($link);
	$num = mysqli_num_rows($result);
    
    if ($num<=0)
	{
		echo 'Cannot find the artwork.';
		header("Refresh: 2; url=myartwork.php");
		exit();
	}
    require 'db/db_connect.php';
    $row = mysqli_fetch_assoc($result);
    $artwork_name = $row ['artwork_name'];
    $artist_name = $row['artist_name'];
	$tag = $row['tag'];
    $auction_start_time = $row['auction_start_time'];
    $auction_deadline = $row['auction_deadline'];
    $starting_price = $row['starting_price'];
?>  
<form method="post" action="update_record_myartwork.php">    
<table border="1">
    <tr>
        <td width="150">User ID:</td>
		<td> <input name="user_id" type="text" value="<?php echo $user_id; ?>"readonly></td>
    </tr>
    <tr>
        <td>Artwork ID:</td>
		<td> <input name="artwork_id" type="text" value="<?php echo $artwork_id;?>"readonly> </td>
    </tr>
    <tr>
        <td>Artwork Name:</td>
		<td><input name="artwork_name" type="text" value="<?php echo $artwork_name;?>"readonly></td>
    </tr>
    <tr>
        <td>Artist:</td>
		<td><input name="artist_name" type="text" value="<?php echo $artist_name;?>"readonly></td>
    </tr>
    <tr>
        <td>Artwork Medium:</td>
		<td><input name="tag" type="text" value="<?php echo $tag;?>"readonly></td>
    </tr>
    <tr>
        <td>Start Time:</td>
        <td><input type="datetime-local" id="auction_start_time" name="auction_start_time" value="<?php echo $auction_start_time;?>"></td>
    </tr>
    <tr>
        <td>End Time:</td>
        <td><input type="datetime-local" id="auction_deadline" name="auction_deadline" value="<?php echo $auction_deadline;?>"></td>
    </tr>
    <tr>
        <td>Start price:</td>
        <td><input type="number" name="starting_price" value="<?php echo $starting_price;?>"></td>
    </tr>
</table>
<p>&nbsp;</p>
<p>
  <input type="submit" value="Submit" >  
  <input type="reset" value="Reset" > 
   <input type="button" onclick="MM_callJS('history.go(-1)')" value="Cancel" >
</p>
</form>        
</body>
</html>
