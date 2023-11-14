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
<style>
	body {text-align: center;} table {margin: auto;}
	</style>	

</head>
<?php
	require 'header_menu.php';
	require 'login_validate.php';
	require 'db/db_connect.php';
	?>
<body>
	<p><!--call artwork information-->

	  <?php	
	$artwork_id = $_GET["artwork_id_p"];
	$query_artwork = "SELECT * FROM artwork WHERE artwork_id='$artwork_id'";
	$result_artwork = mysqli_query($link, $query_artwork);
	mysqli_close($link);
	$row = mysqli_fetch_assoc($result_artwork);
	
	$artwork_name = $row['artwork_name'];
	$tag = $row['tag'];
	$starting_price = $row['starting_price'];
	$auction_start_time = $row['auction_start_time'];
	$auction_deadline = $row['auction_deadline'];
	
			
	?>
</p>
<p>&nbsp; </p>
	<table style="text-align:center;" border="1">	
		<tr>
			<td>Artwork Name</td><td>Tag</td><td>Starting Price</td><td>Auction Start Time</td><td>Auction Deadline</td>
	  </tr>
		<tr>	
			<td><?php echo $artwork_name ?></td>
			<td><?php echo $tag ?></td>
			<td><?php echo $starting_price ?></td>
			<td><?php echo $auction_start_time ?></td>
			<td><?php echo $auction_deadline ?></td>
		</tr>
	</table>
	<p>&nbsp;</p>
	<p>

	  <!--call auction list for one artwork-->
	Latest 10 biding records:
	<table style="text-align:center;" class="mytable" border="1">
	<?php
		require 'db/db_connect.php';
		$query = "SELECT * FROM Auction WHERE artwork_id=$artwork_id ORDER BY auction_time DESC LIMIT 10";
		$result = mysqli_query($link, $query);
		?>
</p>
	<tr>
	  <td>Price</td><td>Bid Time</td>
		<?php
		while ( $row = mysqli_fetch_assoc($result))
		{
		?>
			
			</tr>
			<tr>
				<td> <?php echo $row['bid_price'];?> </td>
				<td> <?php echo $row['auction_time']; ?> </td>
			</tr>
	    <p>
		      <?php
		}

		echo '</table>';
		mysqli_close($link);
		header("Refresh:10;url=detail.php?artwork_id_p=$artwork_id");
				
		?>
</p>
<p>&nbsp; </p>
    <form method="post"  action="store_Auction.php?artwork_id_a=<?php echo($artwork_id);?>" >
		<p>Please Bid Here:
  <input type="text" name="bid_price" required><br>
	  TIPS: Your bid price should be higher than latest one.</p>
		<p><br>
		  <input type="submit" value="Submit">
		  
		  <input type="button" onclick="MM_callJS('history.go(-1)')" value="Cancel" >
	  </p>
		<!--refresh 导致倒退历史页处于该页面-->
	</form>
		

</body>
</html>