<!doctype html>
<html>
<head>
<meta charset="UTF-8">
<title>Untitled Document</title>
	
<style>

ul {
    list-style-type: none;
    padding: 0;
    width: 15%;
    position: fixed;
    overflow: auto;
}
li a {
    display: block;
    color: #1E2135;
    padding: 8px 16px;
    text-decoration: none;
}

li a.active {
    background-color: #7B7B7B;
    color: #FFFFFF;
}

li a:hover:not(.active) {
    background-color: #D6D6D6;
    color: #FFFFFF;
}
</style>
<script src="./javascript/vue.min.js"></script>

</head>
	
	
	

<body>

<?php

	require 'db/db_connect.php';
	$now_time = date("Y-m-d H:i:s");
	//$query_on = "SELECT * FROM artwork WHERE auction_start_time<='$now_time' AND auction_deadline >='$now_time' ORDER BY auction_start_time DESC";
	//$query_come = "SELECT * FROM artwork WHERE auction_start_time>='$now_time' ORDER BY auction_start_time DESC";
	//$query_end = "SELECT * FROM artwork WHERE auction_deadline <='$now_time' ORDER BY auction_start_time DESC";
	//$result_on = mysqli_query($link, $query_on);
	//$result_come = mysqli_query($link, $query_come);
	//$result_end = mysqli_query($link, $query_end);

?>
	
<div id="databinding">
	<h1 style="text-align:center;">Artwork display</h1>
	<p style="text-align:center;"><a href="personal_center.php">Personal Center</a></p>
	<p style="text-align:center;"><a href="logout.php">Log Out</a></p>	
	<ul>
		<li v-on:click="show_ongoing=true;show_coming=false;show_ended=false;">
			<a v-bind:class="{active: show_ongoing}" href="file:///Macintosh HD/Users/isla/Desktop/ #ongoing">Ongoing</a>
		</li>
		<li v-on:click="show_ongoing=false;show_coming=true;show_ended=false;">
			<a v-bind:class="{active: show_coming}" href="#coming">Coming</a>
		</li>
		<li v-on:click="show_ongoing=false;show_coming=false;show_ended=true;">
			<a v-bind:class="{active: show_ended}" href="#ended">Ended</a>
        </li>
    </ul>

	
	
	<div style="margin-left:20%" v-show="show_ongoing">
		<form action="artwork_display.php" method="post" enctype="multipart/form-data">
		<select name="tag_on">
		<option value="please">Please select</option>
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
		<p><?php echo "Tag: ".$tag_on ?></p>
		<table border=1>
			<tr><td width="250">Artwork_name</td><td width="150">Start_time</td><td width="150">Deadline</td><td width="100">Price</td><td width="100">Tag</td></tr>
			<?php
			if($tag_on == "All" )
				$query_on_all = "SELECT * FROM artwork WHERE auction_start_time<='$now_time' AND auction_deadline >='$now_time' ORDER BY auction_start_time DESC";
				$result_on_all = mysqli_query($link, $query_on_all);
				while ( $row_on_all = mysqli_fetch_assoc($result_on_all))
				{
				?>
				<tr>
					<td> <?php $artwork_id = $row_on_all['artwork_id'] ?><a href="detail.php?artwork_id_p=$artwork_id"><?php echo $row_on_all['artwork_name']; ?> </td>
					<td> <?php echo $row_on_all['auction_start_time']?></td>
					<td> <?php echo $row_on_all['auction_deadline']; ?> </td>
					<td> <?php echo $row_on_all['starting_price']; ?> </td>
					<td> <?php echo $row_on_all['tag']; }?> </td>
				</tr>
			<?php
			if($tag_on == "Painting" )
				$query_on_painting = "SELECT * FROM artwork WHERE auction_start_time<='$now_time' AND auction_deadline >='$now_time' AND tag='Painting' ORDER BY auction_start_time DESC";
				$result_on_painting = mysqli_query($link, $query_on_painting);
				while ( $row_on_painting = mysqli_fetch_assoc($result_on_painting))
				{
				?>
				<tr>
					<td> <?php echo $row_on_painting['artwork_name']; ?> </td>
					<td> <?php echo $row_on_painting['auction_start_time']?></td>
					<td> <?php echo $row_on_painting['auction_deadline']; ?> </td>
					<td> <?php echo $row_on_painting['starting_price']; ?> </td>
					<td> <?php echo $row_on_painting['tag']; }?> </td>
				</tr>
			<?php
			if($tag_on == "Print" )
				$query_on_prints = "SELECT * FROM artwork WHERE auction_start_time<='$now_time' AND auction_deadline >='$now_time' AND tag='Print' ORDER BY auction_start_time DESC";
				$result_on_prints = mysqli_query($link, $query_on_prints);
				while ( $row_on_prints = mysqli_fetch_assoc($result_on_prints))
				{
				?>
				<tr>
					<td> <?php echo $row_on_prints['artwork_name']; ?> </td>
					<td> <?php echo $row_on_prints['auction_start_time']?></td>
					<td> <?php echo $row_on_prints['auction_deadline']; ?> </td>
					<td> <?php echo $row_on_prints['starting_price']; ?> </td>
					<td> <?php echo $row_on_prints['tag']; }?> </td>
				</tr>
			<?php
			if($tag_on == "Photography" )
				$query_on_photography = "SELECT * FROM artwork WHERE auction_start_time<='$now_time' AND auction_deadline >='$now_time' AND tag='Photography' ORDER BY auction_start_time DESC";
				$result_on_photography = mysqli_query($link, $query_on_photography);
				while ( $row_on_photography = mysqli_fetch_assoc($result_on_photography))
				{
				?>
				<tr>
					<td> <?php echo $row_on_photography['artwork_name']; ?> </td>
					<td> <?php echo $row_on_photography['auction_start_time']?></td>
					<td> <?php echo $row_on_photography['auction_deadline']; ?> </td>
					<td> <?php echo $row_on_photography['starting_price']; ?> </td>
					<td> <?php echo $row_on_photography['tag']; }?> </td>
				</tr>
			<?php
			if($tag_on == "Sculpture" )
				$query_on_sculpture = "SELECT * FROM artwork WHERE auction_start_time<='$now_time' AND auction_deadline >='$now_time' AND tag='Sculpture' ORDER BY auction_start_time DESC";
				$result_on_sculpture = mysqli_query($link, $query_on_sculpture);
				while ( $row_on_sculpture = mysqli_fetch_assoc($result_on_sculpture))
				{
				?>
				<tr>
					<td> <?php echo $row_on_sculpture['artwork_name']; ?> </td>
					<td> <?php echo $row_on_sculpture['auction_start_time']?></td>
					<td> <?php echo $row_on_sculpture['auction_deadline']; ?> </td>
					<td> <?php echo $row_on_sculpture['starting_price']; ?> </td>
					<td> <?php echo $row_on_sculpture['tag']; }?> </td>
				</tr>
			<?php
			if($tag_on == "Design" )
				$query_on_design = "SELECT * FROM artwork WHERE auction_start_time<='$now_time' AND auction_deadline >='$now_time' AND tag='Design' ORDER BY auction_start_time DESC";
				$result_on_design = mysqli_query($link, $query_on_design);
				while ( $row_on_design = mysqli_fetch_assoc($result_on_design))
				{
				?>
				<tr>
					<td> <?php echo $row_on_design['artwork_name']; ?> </td>
					<td> <?php echo $row_on_design['auction_start_time']?></td>
					<td> <?php echo $row_on_design['auction_deadline']; ?> </td>
					<td> <?php echo $row_on_design['starting_price']; ?> </td>
					<td> <?php echo $row_on_design['tag']; ?> </td>
				</tr>
			<?php
			}

			echo '</table>';
			//mysqli_close($link);
			?>		
    </div>

		
		
	<div style="margin-left:20%" v-show="show_coming">
		<form action="artwork_display.php" method="post" enctype="multipart/form-data">
		<select name="tag_come">
		<option value="please">Please select</option>
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
		<p><?php echo "Tag: ".$tag_come ?></p>
		<table border=1>
			<tr><td width="250">Artwork_name</td><td width="150">Start_time</td><td width="150">Deadline</td><td width="100">Price</td><td width="100">Tag</td></tr>
			<?php
			if($tag_come == "All" )
				$query_come_all = "SELECT * FROM artwork WHERE auction_start_time>='$now_time' ORDER BY auction_start_time DESC";
				$result_come_all = mysqli_query($link, $query_come_all);
				while ( $row_come_all = mysqli_fetch_assoc($result_come_all))
				{
				?>
				<tr>
					<td> <?php echo $row_come_all['artwork_name']; ?> </td>
					<td> <?php echo $row_come_all['auction_start_time']?></td>
					<td> <?php echo $row_come_all['auction_deadline']; ?> </td>
					<td> <?php echo $row_come_all['starting_price']; ?> </td>
					<td> <?php echo $row_come_all['tag']; }?> </td>
				</tr>
			<?php
			if($tag_come == "Painting" )
				$query_come_painting = "SELECT * FROM artwork WHERE auction_start_time>='$now_time' AND tag='Painting' ORDER BY auction_start_time DESC";
				$result_come_painting = mysqli_query($link, $query_come_painting);
				while ( $row_come_painting = mysqli_fetch_assoc($result_come_painting))
				{
				?>
				<tr>
					<td> <?php echo $row_come_painting['artwork_name']; ?> </td>
					<td> <?php echo $row_come_painting['auction_start_time']?></td>
					<td> <?php echo $row_come_painting['auction_deadline']; ?> </td>
					<td> <?php echo $row_come_painting['starting_price']; ?> </td>
					<td> <?php echo $row_come_painting['tag']; }?> </td>
				</tr>
			<?php
			if($tag_come == "Print" )
				$query_come_prints = "SELECT * FROM artwork WHERE auction_start_time>='$now_time' AND tag='Print' ORDER BY auction_start_time DESC";
				$result_come_prints = mysqli_query($link, $query_come_prints);
				while ( $row_come_prints = mysqli_fetch_assoc($result_come_prints))
				{
				?>
				<tr>
					<td> <?php echo $row_come_prints['artwork_name']; ?> </td>
					<td> <?php echo $row_come_prints['auction_start_time']?></td>
					<td> <?php echo $row_come_prints['auction_deadline']; ?> </td>
					<td> <?php echo $row_come_prints['starting_price']; ?> </td>
					<td> <?php echo $row_come_prints['tag']; }?> </td>
				</tr>
			<?php
			if($tag_come == "Photography" )
				$query_come_photography = "SELECT * FROM artwork WHERE auction_start_time>='$now_time' AND tag='Photography' ORDER BY auction_start_time DESC";
				$result_come_photography = mysqli_query($link, $query_come_photography);
				while ( $row_come_photography = mysqli_fetch_assoc($result_come_photography))
				{
				?>
				<tr>
					<td> <?php echo $row_come_photography['artwork_name']; ?> </td>
					<td> <?php echo $row_come_photography['auction_start_time']?></td>
					<td> <?php echo $row_come_photography['auction_deadline']; ?> </td>
					<td> <?php echo $row_come_photography['starting_price']; ?> </td>
					<td> <?php echo $row_come_photography['tag']; }?> </td>
				</tr>
			<?php
			if($tag_come == "Sculpture" )
				$query_come_sculpture = "SELECT * FROM artwork WHERE auction_start_time>='$now_time' AND tag='Sculpture' ORDER BY auction_start_time DESC";
				$result_come_sculpture = mysqli_query($link, $query_come_sculpture);
				while ( $row_come_sculpture = mysqli_fetch_assoc($result_come_sculpture))
				{
				?>
				<tr>
					<td> <?php echo $row_come_sculpture['artwork_name']; ?> </td>
					<td> <?php echo $row_come_sculpture['auction_start_time']?></td>
					<td> <?php echo $row_come_sculpture['auction_deadline']; ?> </td>
					<td> <?php echo $row_come_sculpture['starting_price']; ?> </td>
					<td> <?php echo $row_come_sculpture['tag']; }?> </td>
				</tr>
			<?php
			if($tag_come == "Design" )
				$query_come_design = "SELECT * FROM artwork WHERE auction_start_time>='$now_time' AND tag='Design' ORDER BY auction_start_time DESC";
				$result_come_design = mysqli_query($link, $query_come_design);
				while ( $row_come_design = mysqli_fetch_assoc($result_come_design))
				{
				?>
				<tr>
					<td> <?php echo $row_come_design['artwork_name']; ?> </td>
					<td> <?php echo $row_come_design['auction_start_time']?></td>
					<td> <?php echo $row_come_design['auction_deadline']; ?> </td>
					<td> <?php echo $row_come_design['starting_price']; ?> </td>
					<td> <?php echo $row_come_design['tag']; ?> </td>
				</tr>
			<?php
			}

			echo '</table>';
			//mysqli_close($link);
			?>
    </div>

		
		
	<div style="margin-left:20%" v-show="show_ended">
		<form action="artwork_display.php" method="post" enctype="multipart/form-data">
		<select name="tag_end">
		<option value="please">Please select</option>
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
		<p>Sorry, the auction has ended.</p>
		<p><?php echo "Tag: ".$tag_end ?></p>
		<table border=1>
			<tr><td width="250">Artwork_name</td><td width="150">Start_time</td><td width="150">Deadline</td><td width="100">Price</td><td width="100">Tag</td></tr>
			<?php
			if($tag_end == "All" )
				$query_end_all = "SELECT * FROM artwork WHERE auction_deadline <='$now_time' ORDER BY auction_start_time DESC";
				$result_end_all = mysqli_query($link, $query_end_all);
				while ( $row_end_all = mysqli_fetch_assoc($result_end_all))
				{
				?>
				<tr>
					<td> <?php echo $row_end_all['artwork_name']; ?> </td>
					<td> <?php echo $row_end_all['auction_start_time']?></td>
					<td> <?php echo $row_end_all['auction_deadline']; ?> </td>
					<td> <?php echo $row_end_all['starting_price']; ?> </td>
					<td> <?php echo $row_end_all['tag']; }?> </td>
				</tr>
			<?php
			if($tag_end == "Painting" )
				$query_end_painting = "SELECT * FROM artwork WHERE auction_deadline <='$now_time' AND tag='Painting' ORDER BY auction_start_time DESC";
				$result_end_painting = mysqli_query($link, $query_end_painting);
				while ( $row_end_painting = mysqli_fetch_assoc($result_end_painting))
				{
				?>
				<tr>
					<td> <?php echo $row_end_painting['artwork_name']; ?> </td>
					<td> <?php echo $row_end_painting['auction_start_time']?></td>
					<td> <?php echo $row_end_painting['auction_deadline']; ?> </td>
					<td> <?php echo $row_end_painting['starting_price']; ?> </td>
					<td> <?php echo $row_end_painting['tag']; }?> </td>
				</tr>
			<?php
			if($tag_end == "Print" )
				$query_end_prints = "SELECT * FROM artwork WHERE auction_deadline <='$now_time' AND tag='Print' ORDER BY auction_start_time DESC";
				$result_end_prints = mysqli_query($link, $query_end_prints);
				while ( $row_end_prints = mysqli_fetch_assoc($result_end_prints))
				{
				?>
				<tr>
					<td> <?php echo $row_end_prints['artwork_name']; ?> </td>
					<td> <?php echo $row_end_prints['auction_start_time']?></td>
					<td> <?php echo $row_end_prints['auction_deadline']; ?> </td>
					<td> <?php echo $row_end_prints['starting_price']; ?> </td>
					<td> <?php echo $row_end_prints['tag']; }?> </td>
				</tr>
			<?php
			if($tag_end == "Photography" )
				$query_end_photography = "SELECT * FROM artwork WHERE auction_deadline <='$now_time' AND tag='Photography' ORDER BY auction_start_time DESC";
				$result_end_photography = mysqli_query($link, $query_end_photography);
				while ( $row_end_photography = mysqli_fetch_assoc($result_end_photography))
				{
				?>
				<tr>
					<td> <?php echo $row_end_photography['artwork_name']; ?> </td>
					<td> <?php echo $row_end_photography['auction_start_time']?></td>
					<td> <?php echo $row_end_photography['auction_deadline']; ?> </td>
					<td> <?php echo $row_end_photography['starting_price']; ?> </td>
					<td> <?php echo $row_end_photography['tag']; }?> </td>
				</tr>
			<?php
			if($tag_end == "Sculpture" )
				$query_end_sculpture = "SELECT * FROM artwork WHERE auction_deadline <='$now_time' AND tag='Sculpture' ORDER BY auction_start_time DESC";
				$result_end_sculpture = mysqli_query($link, $query_end_sculpture);
				while ( $row_end_sculpture = mysqli_fetch_assoc($result_end_sculpture))
				{
				?>
				<tr>
					<td> <?php echo $row_end_sculpture['artwork_name']; ?> </td>
					<td> <?php echo $row_end_sculpture['auction_start_time']?></td>
					<td> <?php echo $row_end_sculpture['auction_deadline']; ?> </td>
					<td> <?php echo $row_end_sculpture['starting_price']; ?> </td>
					<td> <?php echo $row_end_sculpture['tag']; }?> </td>
				</tr>
			<?php
			if($tag_end == "Design" )
				$query_end_design = "SELECT * FROM artwork WHERE auction_deadline <='$now_time' AND tag='Design' ORDER BY auction_start_time DESC";
				$result_end_design = mysqli_query($link, $query_end_design);
				while ( $row_end_design = mysqli_fetch_assoc($result_end_design))
				{
				?>
				<tr>
					<td> <?php echo $row_end_design['artwork_name']; ?> </td>
					<td> <?php echo $row_end_design['auction_start_time']?></td>
					<td> <?php echo $row_end_design['auction_deadline']; ?> </td>
					<td> <?php echo $row_end_design['starting_price']; ?> </td>
					<td> <?php echo $row_end_design['tag']; ?> </td>
				</tr>
			<?php
			}

			echo '</table>';
			mysqli_close($link);
			?>		
    </div>

</div>

<script type="text/javascript">
	var vm = new Vue({
		el: '#databinding',
		data: {
			show_ongoing: true,
            show_coming: false,
            show_ended: false}
        });
</script>

</body>


</html>	
	
	
	
	
	

