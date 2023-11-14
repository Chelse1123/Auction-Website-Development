<!doctype html>
<html>
<head>
<meta charset="UTF-8">
<title>Untitled Document</title>
</head>
<?php
require 'login_validate.php';
require 'header_menu.php';
?>

<body>
<h1 style="text-align:center;">Artwork Display</h1>

<?php

	require 'db/db_connect.php';
	$now_time = date("Y-m-d H:i:s");
?>
	
<form style="text-align:center;" action="artwork_display_coming.php" method="post" enctype="multipart/form-data">
<select name="tag_come">
<option value="All">All</option>
<option value="Painting">Painting</option>
<option value="Print">Print</option>
<option value="Photography">Photography</option>
<option value="Sculpture">Sculpture</option>
<option value="Design">Design</option>
</select>
<input type="submit" value="Submit">
</form>
<?php 
	$tag_come = $_POST["tag_come"];
?>
<p>Sorry, the auction has not started, please wait.</p>
<p><?php 
	if (isset($tag_come))
		echo "The tag you have selected is: ".$tag_come; 
	else
		echo "Please select the tag."
?></p>
<table border=1 align="center" style="text-align:center;" class="display">
	<tr><td width="260">Artwork Name</td><td width="180">Artist Name</td><td width="180">Start Time</td><td width="180">Deadline</td><td width="130">Starting Price</td><td width="100">Tag</td></tr>
	<?php
	if($tag_come == "All" )
		$query_come_all = "SELECT * FROM artwork WHERE auction_start_time>='$now_time' ORDER BY auction_start_time ASC";
		$result_come_all = mysqli_query($link, $query_come_all);
		$num_come_all = mysqli_num_rows($result_come_all);
		if (isset($num_come_all))
			echo "There are ".$num_come_all." results.";
		while ( $row_come_all = mysqli_fetch_assoc($result_come_all))
		{
		?>
		<tr>
			<td> <?php echo $row_come_all['artwork_name']; ?> </td>
			<td> <?php echo $row_come_all['artist_name']?></td>
			<td> <?php echo $row_come_all['auction_start_time']?></td>
			<td> <?php echo $row_come_all['auction_deadline']; ?> </td>
			<td> <?php echo $row_come_all['starting_price']; ?> </td>
			<td> <?php echo $row_come_all['tag']; }?> </td>
		</tr>
	<?php
	if($tag_come == "Painting" )
		$query_come_painting = "SELECT * FROM artwork WHERE auction_start_time>='$now_time' AND tag='Painting' ORDER BY auction_start_time ASC";
		$result_come_painting = mysqli_query($link, $query_come_painting);
		$num_come_painting = mysqli_num_rows($result_come_painting);
		if (isset($num_come_painting))
			echo "There are ".$num_come_painting." results.";
		while ( $row_come_painting = mysqli_fetch_assoc($result_come_painting))
		{
		?>
		<tr>
			<td> <?php echo $row_come_painting['artwork_name']; ?> </td>
			<td> <?php echo $row_come_painting['artist_name']?></td>
			<td> <?php echo $row_come_painting['auction_start_time']?></td>
			<td> <?php echo $row_come_painting['auction_deadline']; ?> </td>
			<td> <?php echo $row_come_painting['starting_price']; ?> </td>
			<td> <?php echo $row_come_painting['tag']; }?> </td>
		</tr>
	<?php
	if($tag_come == "Print" )
		$query_come_prints = "SELECT * FROM artwork WHERE auction_start_time>='$now_time' AND tag='Print' ORDER BY auction_start_time ASC";
		$result_come_prints = mysqli_query($link, $query_come_prints);
		$num_come_prints = mysqli_num_rows($result_come_prints);
		if (isset($num_come_prints))
			echo "There are ".$num_come_prints." results.";
		while ( $row_come_prints = mysqli_fetch_assoc($result_come_prints))
		{
		?>
		<tr>
			<td> <?php echo $row_come_prints['artwork_name']; ?> </td>
			<td> <?php echo $row_come_prints['artist_name']?></td>
			<td> <?php echo $row_come_prints['auction_start_time']?></td>
			<td> <?php echo $row_come_prints['auction_deadline']; ?> </td>
			<td> <?php echo $row_come_prints['starting_price']; ?> </td>
			<td> <?php echo $row_come_prints['tag']; }?> </td>
		</tr>
	<?php
	if($tag_come == "Photography" )
		$query_come_photography = "SELECT * FROM artwork WHERE auction_start_time>='$now_time' AND tag='Photography' ORDER BY auction_start_time ASC";
		$result_come_photography = mysqli_query($link, $query_come_photography);
		$num_come_photography = mysqli_num_rows($result_come_photography);
		if (isset($num_come_photography))
			echo "There are ".$num_come_photography." results.";
		while ( $row_come_photography = mysqli_fetch_assoc($result_come_photography))
		{
		?>
		<tr>
			<td> <?php echo $row_come_photography['artwork_name']; ?> </td>
			<td> <?php echo $row_come_photography['artist_name']?></td>
			<td> <?php echo $row_come_photography['auction_start_time']?></td>
			<td> <?php echo $row_come_photography['auction_deadline']; ?> </td>
			<td> <?php echo $row_come_photography['starting_price']; ?> </td>
			<td> <?php echo $row_come_photography['tag']; }?> </td>
		</tr>
	<?php
	if($tag_come == "Sculpture" )
		$query_come_sculpture = "SELECT * FROM artwork WHERE auction_start_time>='$now_time' AND tag='Sculpture' ORDER BY auction_start_time ASC";
		$result_come_sculpture = mysqli_query($link, $query_come_sculpture);
		$num_come_sculpture = mysqli_num_rows($result_come_sculpture);
		if (isset($num_come_sculpture))
			echo "There are ".$num_come_sculpture." results.";
		while ( $row_come_sculpture = mysqli_fetch_assoc($result_come_sculpture))
		{
		?>
		<tr>
			<td> <?php echo $row_come_sculpture['artwork_name']; ?> </td>
			<td> <?php echo $row_come_sculpture['artist_name']?></td>
			<td> <?php echo $row_come_sculpture['auction_start_time']?></td>
			<td> <?php echo $row_come_sculpture['auction_deadline']; ?> </td>
			<td> <?php echo $row_come_sculpture['starting_price']; ?> </td>
			<td> <?php echo $row_come_sculpture['tag']; }?> </td>
		</tr>
	<?php
	if($tag_come == "Design" )
		$query_come_design = "SELECT * FROM artwork WHERE auction_start_time>='$now_time' AND tag='Design' ORDER BY auction_start_time ASC";
		$result_come_design = mysqli_query($link, $query_come_design);
		$num_come_design = mysqli_num_rows($result_come_design);
		if (isset($num_come_design))
			echo "There are ".$num_come_design." results.";
		while ( $row_come_design = mysqli_fetch_assoc($result_come_design))
		{
		?>
		<tr>
			<td> <?php echo $row_come_design['artwork_name']; ?> </td>
			<td> <?php echo $row_come_design['artist_name']?></td>
			<td> <?php echo $row_come_design['auction_start_time']?></td>
			<td> <?php echo $row_come_design['auction_deadline']; ?> </td>
			<td> <?php echo $row_come_design['starting_price']; ?> </td>
			<td> <?php echo $row_come_design['tag']; ?> </td>
		</tr>
	<?php
	}

	echo '</table>';
	mysqli_close($link);
	?>
		
	
</body>
</html>
