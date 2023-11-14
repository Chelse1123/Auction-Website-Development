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
	
<form style="text-align:center;" action="artwork_display_ongoing.php"  method="post" enctype="multipart/form-data">
<select name="tag_on">
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
	$tag_on = $_POST["tag_on"];
?>
<p>You can auction it now !</p>
<p><?php 
	if (isset($tag_on))
		echo "The tag you have selected is: ".$tag_on; 
	else
		echo "Please select the tag."
?></p>
<table  class="display" border=1 align="center">
	<tr><td  width="260">Artwork Name</td><td width="180">Artist Name</td><td width="180">Start Time</td><td width="180">Deadline</td><td width="130">Starting Price</td><td width="130">Latest Price</td><td width="100">Tag</td></tr>
	<?php
	if($tag_on == "All" )
		$query_on_all = "SELECT * FROM artwork WHERE auction_start_time<='$now_time' AND auction_deadline >='$now_time' ORDER BY auction_deadline ASC";
		$result_on_all = mysqli_query($link, $query_on_all);
		$num_on_all = mysqli_num_rows($result_on_all);
		if (isset($num_on_all))
			echo "There are ".$num_on_all." results.";
		while ( $row_on_all = mysqli_fetch_assoc($result_on_all))
		{
		?>
		<tr>
			<td> <?php $artwork_id = $row_on_all['artwork_id'] ?><a href="detail.php?artwork_id_p=<?php echo($artwork_id);?>"><?php echo $row_on_all['artwork_name']; ?> </td>
			<td> <?php echo $row_on_all['artist_name']?></td>	
			<td> <?php echo $row_on_all['auction_start_time']?></td>
			<td> <?php echo $row_on_all['auction_deadline']; ?> </td>
			<td> <?php echo $row_on_all['starting_price']; ?> </td>
			<td> <?php $artwork_id= $row_on_all['artwork_id'];
			$query_nowprice_all= "SELECT * FROM auction WHERE artwork_id='$artwork_id' ORDER BY auction_time DESC";
			$result_nowprice_all=mysqli_query($link,$query_nowprice_all);
			$row_nowprice_all=mysqli_fetch_assoc($result_nowprice_all);
			$nowprice_all=$row_nowprice_all['bid_price'];
			if (isset($nowprice_all))
				echo $nowprice_all;
			else echo "No bidding"?></td>
			<td> <?php echo $row_on_all['tag']; }?> </td>
			</tr>
	<?php
	if($tag_on == "Painting" )
		$query_on_painting = "SELECT * FROM artwork WHERE auction_start_time<='$now_time' AND auction_deadline >='$now_time' AND tag='Painting' ORDER BY auction_deadline ASC";
		$result_on_painting = mysqli_query($link, $query_on_painting);
		$num_on_painting = mysqli_num_rows($result_on_painting);
		if (isset($num_on_painting))
			echo "There are ".$num_on_painting." results.";
		while ( $row_on_painting = mysqli_fetch_assoc($result_on_painting))
		{
		?>
		<tr>
			<td> <?php $artwork_id = $row_on_painting['artwork_id'] ?><a href="detail.php?artwork_id_p=<?php echo($artwork_id);?>"><?php echo $row_on_painting['artwork_name']; ?> </td>
			<td> <?php echo $row_on_painting['artist_name']?></td>
			<td> <?php echo $row_on_painting['auction_start_time']?></td>
			<td> <?php echo $row_on_painting['auction_deadline']; ?> </td>
			<td> <?php echo $row_on_painting['starting_price']; ?> </td>
			<td> <?php $artwork_id= $row_on_painting['artwork_id'];
			$query_nowprice_painting= "SELECT * FROM auction WHERE artwork_id='$artwork_id' ORDER BY auction_time DESC";
			$result_nowprice_painting=mysqli_query($link,$query_nowprice_painting);
			$row_nowprice_painting=mysqli_fetch_assoc($result_nowprice_painting);
			$nowprice_painting=$row_nowprice_painting['bid_price'];
			if (isset($nowprice_painting))
				echo $nowprice_painting;
			else echo "No bidding"?></td>
			<td> <?php echo $row_on_painting['tag']; }?> </td>
		</tr>
	<?php
	if($tag_on == "Print" )
		$query_on_prints = "SELECT * FROM artwork WHERE auction_start_time<='$now_time' AND auction_deadline >='$now_time' AND tag='Print' ORDER BY auction_deadline ASC";
		$result_on_prints = mysqli_query($link, $query_on_prints);
		$num_on_prints = mysqli_num_rows($result_on_prints);
		if (isset($num_on_prints))
			echo "There are ".$num_on_prints." results.";
		while ( $row_on_prints = mysqli_fetch_assoc($result_on_prints))
		{
		?>
		<tr>
			<td> <?php $artwork_id = $row_on_prints['artwork_id'] ?><a href="detail.php?artwork_id_p=<?php echo($artwork_id);?>"><?php echo $row_on_prints['artwork_name']; ?> </td>
			<td> <?php echo $row_on_prints['artist_name']?></td>
			<td> <?php echo $row_on_prints['auction_start_time']?></td>
			<td> <?php echo $row_on_prints['auction_deadline']; ?> </td>
			<td> <?php echo $row_on_prints['starting_price']; ?> </td>
			<td> <?php $artwork_id= $row_on_prints['artwork_id'];
			$query_nowprice_prints= "SELECT * FROM auction WHERE artwork_id='$artwork_id' ORDER BY auction_time DESC";
			$result_nowprice_prints=mysqli_query($link,$query_nowprice_prints);
			$row_nowprice_prints=mysqli_fetch_assoc($result_nowprice_prints);
			$nowprice_prints=$row_nowprice_prints['bid_price'];
			if (isset($nowprice_prints))
				echo $nowprice_prints;
			else echo "No bidding"?></td>
			<td> <?php echo $row_on_prints['tag']; }?> </td>
		</tr>
	<?php
	if($tag_on == "Photography" )
		$query_on_photography = "SELECT * FROM artwork WHERE auction_start_time<='$now_time' AND auction_deadline >='$now_time' AND tag='Photography' ORDER BY auction_deadline ASC";
		$result_on_photography = mysqli_query($link, $query_on_photography);
		$num_on_photography = mysqli_num_rows($result_on_photography);
		if (isset($num_on_photography))
			echo "There are ".$num_on_photography." results.";
		while ( $row_on_photography = mysqli_fetch_assoc($result_on_photography))
		{
		?>
		<tr>
			<td> <?php $artwork_id = $row_on_photography['artwork_id'] ?><a href="detail.php?artwork_id_p=<?php echo($artwork_id);?>"><?php echo $row_on_photography['artwork_name']; ?> </td>
			<td> <?php echo $row_on_photography['artist_name']?></td>
			<td> <?php echo $row_on_photography['auction_start_time']?></td>
			<td> <?php echo $row_on_photography['auction_deadline']; ?> </td>
			<td> <?php echo $row_on_photography['starting_price']; ?> </td>
			<td> <?php $artwork_id= $row_on_photography['artwork_id'];
			$query_nowprice_photography= "SELECT * FROM auction WHERE artwork_id='$artwork_id' ORDER BY auction_time DESC";
			$result_nowprice_photography=mysqli_query($link,$query_nowprice_photography);
			$row_nowprice_photography=mysqli_fetch_assoc($result_nowprice_photography);
			$nowprice_photography=$row_nowprice_photography['bid_price'];
			if (isset($nowprice_photography))
				echo $nowprice_photography;
			else echo "No bidding"?></td>
			<td> <?php echo $row_on_photography['tag']; }?> </td>
		</tr>
	<?php
	if($tag_on == "Sculpture" )
		$query_on_sculpture = "SELECT * FROM artwork WHERE auction_start_time<='$now_time' AND auction_deadline >='$now_time' AND tag='Sculpture' ORDER BY auction_deadline ASC";
		$result_on_sculpture = mysqli_query($link, $query_on_sculpture);
		$num_on_sculpture = mysqli_num_rows($result_on_sculpture);
		if (isset($num_on_sculpture))
			echo "There are ".$num_on_sculpture." results.";
		while ( $row_on_sculpture = mysqli_fetch_assoc($result_on_sculpture))
		{
		?>
		<tr>
			<td> <?php $artwork_id = $row_on_sculpture['artwork_id'] ?><a href="detail.php?artwork_id_p=<?php echo($artwork_id);?>"><?php echo $row_on_sculpture['artwork_name']; ?> </td>
			<td> <?php echo $row_on_sculpture['artist_name']?></td>
			<td> <?php echo $row_on_sculpture['auction_start_time']?></td>
			<td> <?php echo $row_on_sculpture['auction_deadline']; ?> </td>
			<td> <?php echo $row_on_sculpture['starting_price']; ?> </td>
			<td> <?php $artwork_id= $row_on_sculpture['artwork_id'];
			$query_nowprice_sculpture= "SELECT * FROM auction WHERE artwork_id='$artwork_id' ORDER BY auction_time DESC";
			$result_nowprice_sculpture=mysqli_query($link,$query_nowprice_sculpture);
			$row_nowprice_sculpture=mysqli_fetch_assoc($result_nowprice_sculpture);
			$nowprice_sculpture=$row_nowprice_sculpture['bid_price'];
			if (isset($nowprice_sculpture))
				echo $nowprice_sculpture;
			else echo "No bidding"?></td>
			<td> <?php echo $row_on_sculpture['tag']; }?> </td>
		</tr>
	<?php
	if($tag_on == "Design" )
		$query_on_design = "SELECT * FROM artwork WHERE auction_start_time<='$now_time' AND auction_deadline >='$now_time' AND tag='Design' ORDER BY auction_deadline ASC";
		$result_on_design = mysqli_query($link, $query_on_design);
		$num_on_design = mysqli_num_rows($result_on_design);
		if (isset($num_on_design))
			echo "There are ".$num_on_design." results.";
		while ( $row_on_design = mysqli_fetch_assoc($result_on_design))
		{
		?>
		<tr>
			<td> <?php $artwork_id = $row_on_design['artwork_id'] ?><a href="detail.php?artwork_id_p=<?php echo($artwork_id);?>"><?php echo $row_on_design['artwork_name']; ?> </td>
			<td> <?php echo $row_on_design['artist_name']?></td>
			<td> <?php echo $row_on_design['auction_start_time']?></td>
			<td> <?php echo $row_on_design['auction_deadline']; ?> </td>
			<td> <?php echo $row_on_design['starting_price']; ?> </td>
			<td> <?php $artwork_id= $row_on_design['artwork_id'];
			$query_nowprice_design= "SELECT * FROM auction WHERE artwork_id='$artwork_id' ORDER BY auction_time DESC";
			$result_nowprice_design=mysqli_query($link,$query_nowprice_design);
			$row_nowprice_design=mysqli_fetch_assoc($result_nowprice_design);
			$nowprice_design=$row_nowprice_design['bid_price'];
			if (isset($nowprice_design))
				echo $nowprice_design;
			else echo "No bidding"?></td>
			<td> <?php echo $row_on_design['tag']; ?> </td>
		</tr>
	<?php
	}

	echo '</table>';
	mysqli_close($link);
	?>	
		
	
</body>
</html>
