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
	
<form style="text-align:center;" action="artwork_display_ended.php"  method="post" enctype="multipart/form-data">
<select name="tag_end">
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
	$tag_end = $_POST["tag_end"];
?>
<p>Sorry, the auction has ended. You can check the auction result.</p>
<p><?php 
	if (isset($tag_end))
		echo "The tag you have selected is: ".$tag_end; 
	else
		echo "Please select the tag."
?></p>
<table class="display" border=1 align="center" style="text-align:center;">
	<tr><td width="260">Artwork Name</td><td width="180">Artist Name</td><td width="180">Start Time</td><td width="180">Deadline</td><td width="130">Starting Price</td><td width="130">Auction Results</td><td width="100">Tag</td></tr>
	<?php
	if($tag_end == "All" )
		$query_end_all = "SELECT * FROM artwork WHERE auction_deadline <='$now_time' ORDER BY auction_deadline DESC";
		$result_end_all = mysqli_query($link, $query_end_all);
		$num_end_all = mysqli_num_rows($result_end_all);
		if (isset($num_end_all))
			echo "There are ".$num_end_all." results.";
		while ( $row_end_all = mysqli_fetch_assoc($result_end_all))
		{
		?>
		<tr>
			<td> <?php echo $row_end_all['artwork_name']; ?> </td>
			<td> <?php echo $row_end_all['artist_name']?></td>
			<td> <?php echo $row_end_all['auction_start_time']?></td>
			<td> <?php echo $row_end_all['auction_deadline']; ?> </td>
			<td> <?php echo $row_end_all['starting_price']; ?> </td>
			<td> <?php $artwork_id= $row_end_all['artwork_id'];
			$query_endprice_all= "SELECT * FROM auction WHERE artwork_id='$artwork_id' ORDER BY auction_time DESC";
			$result_endprice_all=mysqli_query($link,$query_endprice_all);
			$row_endprice_all=mysqli_fetch_assoc($result_endprice_all);
			$endprice_all=$row_endprice_all['bid_price'];
			if (isset($endprice_all))
				echo $endprice_all;
			else echo "Not sold"?></td>
			<td> <?php echo $row_end_all['tag']; }?> </td>
		</tr>
	    <?php echo $result_endprice; ?>
	<?php
	if($tag_end == "Painting" )
		$query_end_painting = "SELECT * FROM artwork WHERE auction_deadline <='$now_time' AND tag='Painting' ORDER BY auction_deadline DESC";
		$result_end_painting = mysqli_query($link, $query_end_painting);
		$num_end_painting = mysqli_num_rows($result_end_painting);
		if (isset($num_end_painting))
			echo "There are ".$num_end_painting." results.";
		while ( $row_end_painting = mysqli_fetch_assoc($result_end_painting))
		{
		?>
		<tr>
			<td> <?php echo $row_end_painting['artwork_name']; ?> </td>
			<td> <?php echo $row_end_painting['artist_name']?></td>
			<td> <?php echo $row_end_painting['auction_start_time']?></td>
			<td> <?php echo $row_end_painting['auction_deadline']; ?> </td>
			<td> <?php echo $row_end_painting['starting_price']; ?> </td>
			<td> <?php $artwork_id= $row_end_painting['artwork_id'];
			$query_endprice_painting= "SELECT * FROM auction WHERE artwork_id='$artwork_id' ORDER BY auction_time DESC";
			$result_endprice_painting=mysqli_query($link,$query_endprice_painting);
			$row_endprice_painting=mysqli_fetch_assoc($result_endprice_painting);
			$endprice_painting=$row_endprice_painting['bid_price'];
			if (isset($endprice_painting))
				echo $endprice_painting;
			else echo "Not sold"?></td>
			<td> <?php echo $row_end_painting['tag']; }?> </td>
		</tr>
	<?php
	if($tag_end == "Print" )
		$query_end_prints = "SELECT * FROM artwork WHERE auction_deadline <='$now_time' AND tag='Print' ORDER BY auction_deadline DESC";
		$result_end_prints = mysqli_query($link, $query_end_prints);
		$num_end_prints = mysqli_num_rows($result_end_prints);
		if (isset($num_end_prints))
			echo "There are ".$num_end_prints." results.";
		while ( $row_end_prints = mysqli_fetch_assoc($result_end_prints))
		{
		?>
		<tr>
			<td> <?php echo $row_end_prints['artwork_name']; ?> </td>
			<td> <?php echo $row_end_prints['artist_name']?></td>
			<td> <?php echo $row_end_prints['auction_start_time']?></td>
			<td> <?php echo $row_end_prints['auction_deadline']; ?> </td>
			<td> <?php echo $row_end_prints['starting_price']; ?> </td>
			<td> <?php $artwork_id= $row_end_prints['artwork_id'];
			$query_endprice_prints= "SELECT * FROM auction WHERE artwork_id='$artwork_id' ORDER BY auction_time DESC";
			$result_endprice_prints=mysqli_query($link,$query_endprice_prints);
			$row_endprice_prints=mysqli_fetch_assoc($result_endprice_prints);
			$endprice_prints=$row_endprice_prints['bid_price'];
			if (isset($endprice_prints))
				echo $endprice_prints;
			else echo "Not sold"?></td>
			<td> <?php echo $row_end_prints['tag']; }?> </td>
		</tr>
	<?php
	if($tag_end == "Photography" )
		$query_end_photography = "SELECT * FROM artwork WHERE auction_deadline <='$now_time' AND tag='Photography' ORDER BY auction_deadline DESC";
		$result_end_photography = mysqli_query($link, $query_end_photography);
		$num_end_photography = mysqli_num_rows($result_end_photography);
		if (isset($num_end_photography))
			echo "There are ".$num_end_photography." results.";
		while ( $row_end_photography = mysqli_fetch_assoc($result_end_photography))
		{
		?>
		<tr>
			<td> <?php echo $row_end_photography['artwork_name']; ?> </td>
			<td> <?php echo $row_end_photography['artist_name']?></td>
			<td> <?php echo $row_end_photography['auction_start_time']?></td>
			<td> <?php echo $row_end_photography['auction_deadline']; ?> </td>
			<td> <?php echo $row_end_photography['starting_price']; ?> </td>
			<td> <?php $artwork_id= $row_end_photography['artwork_id'];
			$query_endprice_photography= "SELECT * FROM auction WHERE artwork_id='$artwork_id' ORDER BY auction_time DESC";
			$result_endprice_photography=mysqli_query($link,$query_endprice_photography);
			$row_endprice_photography=mysqli_fetch_assoc($result_endprice_photography);
			$endprice_photography=$row_endprice_photography['bid_price'];
			if (isset($endprice_photography))
				echo $endprice_photography;
			else echo "Not sold"?></td>
			<td> <?php echo $row_end_photography['tag']; }?> </td>
		</tr>
	<?php
	if($tag_end == "Sculpture" )
		$query_end_sculpture = "SELECT * FROM artwork WHERE auction_deadline <='$now_time' AND tag='Sculpture' ORDER BY auction_deadline DESC";
		$result_end_sculpture = mysqli_query($link, $query_end_sculpture);
		$num_end_sculpture = mysqli_num_rows($result_end_sculpture);
		if (isset($num_end_sculpture))
			echo "There are ".$num_end_sculpture." results.";
		while ( $row_end_sculpture = mysqli_fetch_assoc($result_end_sculpture))
		{
		?>
		<tr>
			<td> <?php echo $row_end_sculpture['artwork_name']; ?> </td>
			<td> <?php echo $row_end_sculpture['artist_name']?></td>
			<td> <?php echo $row_end_sculpture['auction_start_time']?></td>
			<td> <?php echo $row_end_sculpture['auction_deadline']; ?> </td>
			<td> <?php echo $row_end_sculpture['starting_price']; ?> </td>
			<td> <?php $artwork_id= $row_end_sculpture['artwork_id'];
			$query_endprice_sculpture= "SELECT * FROM auction WHERE artwork_id='$artwork_id' ORDER BY auction_time DESC";
			$result_endprice_sculpture=mysqli_query($link,$query_endprice_sculpture);
			$row_endprice_sculpture=mysqli_fetch_assoc($result_endprice_sculpture);
			$endprice_sculpture=$row_endprice_sculpture['bid_price'];
			if (isset($endprice_sculpture))
				echo $endprice_sculpture;
			else echo "Not sold"?></td>
			<td> <?php echo $row_end_sculpture['tag']; }?> </td>
		</tr>
	<?php
	if($tag_end == "Design" )
		$query_end_design = "SELECT * FROM artwork WHERE auction_deadline <='$now_time' AND tag='Design' ORDER BY auction_deadline DESC";
		$result_end_design = mysqli_query($link, $query_end_design);
		$num_end_design = mysqli_num_rows($result_end_design);
		if (isset($num_end_design))
			echo "There are ".$num_end_design." results.";
		while ( $row_end_design = mysqli_fetch_assoc($result_end_design))
		{
		?>
		<tr>
			<td> <?php echo $row_end_design['artwork_name']; ?> </td>
			<td> <?php echo $row_end_design['artist_name']?></td>
			<td> <?php echo $row_end_design['auction_start_time']?></td>
			<td> <?php echo $row_end_design['auction_deadline']; ?> </td>
			<td> <?php echo $row_end_design['starting_price']; ?> </td>
			<td> <?php $artwork_id= $row_end_design['artwork_id'];
			$query_endprice_design= "SELECT * FROM auction WHERE artwork_id='$artwork_id' ORDER BY auction_time DESC";
			$result_endprice_design=mysqli_query($link,$query_endprice_design);
			$row_endprice_design=mysqli_fetch_assoc($result_endprice_design);
			$endprice_design=$row_endprice_design['bid_price'];
			if (isset($endprice_design))
				echo $endprice_design;
			else echo "Not sold"?></td>
			<td> <?php echo $row_end_design['tag']; ?> </td>
		</tr>
	<?php
	}

	echo '</table>';
	mysqli_close($link);
	?>		
	
</body>
</html>
