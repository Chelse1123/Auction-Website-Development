<!doctype html>
<html>
<head>
<meta charset="UTF-8">
<title>result.php</title>
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
<p>
	
  <?php
require 'header_menu.php';
require 'login_validate.php';
require 'db/db_connect.php'; 


$query_auction=" SELECT * FROM auction WHERE user_id=$user_id ORDER BY auction_time DESC "; #按照user_id 去提取 auction record，并输出相关信息在表格中
$result_auction = mysqli_query($link, $query_auction);
$num = mysqli_num_rows($result_auction);
if ($num<=0)
	echo 'Come and bid your first artwork!';
else
    {		
?>
</p>
<p>&nbsp; </p>
<h1> Auction Result</h1>
<p>&nbsp;</p>
<table  width="1000" border="1">
<!--先建立一个表头!-->
	<tr>
		<td > Artwork ID      </td>
		<td > Artwork Name    </td>
		<td > Artist          </td>
		<td > Auction Deadline</td>
		<td > Bid Price       </td>
		<td > Bid Time        </td>
		<td > Bid Result      </td>
		<td> Management      </td>
	</tr>
 <?php
    } 
?>
<!--按照表头的顺序 显示每一条动态的record，从artwork和auction table中获取数据 ！-->
<?php
while ($row_auction= mysqli_fetch_assoc($result_auction))
{	
	?>   
	<tr> 
		<td>
		<?php
		$bid_id      =$row_auction['bid_id'];
		$user_id     =$row_auction['user_id']; # match and display record in the corresponding user's personal cetre
		$bid_time    =$row_auction['auction_time'];
		$bid_price   =$row_auction['bid_price'];
		$artwork_id  =$row_auction['artwork_id'];
		echo  $artwork_id;  #所有echo的前缀都可以去掉，目前是为了方便识别
		?>
		</td>
		
		<td >
		<?php
		$query_artwork = " SELECT artwork_name,artist_name,auction_deadline FROM artwork WHERE artwork_id=$artwork_id";
		$result_artwork=mysqli_query($link, $query_artwork); 
		$row_artwork = mysqli_fetch_assoc($result_artwork);
		$artwork_name = $row_artwork['artwork_name'];
		$artist_name=$row_artwork['artist_name'];
		$deadline = $row_artwork['auction_deadline'];
		echo $artwork_name; ?></td>
		
		<td ><?php echo  $artist_name; ?></td>
		<td ><?php echo  $deadline; ?> </td>
		<td > <?php echo  $bid_price; ?></td>
		<td > <?php echo  $bid_time; ?></td>
	
		<!-- result的计算和输出+pay button !-->
		<td > 
		<?php
			$query_compare= "SELECT bid_id,user_id FROM auction WHERE artwork_id=$artwork_id ORDER BY auction_time DESC";
			$result_compare=mysqli_query($link,$query_compare);
			$row_compare=mysqli_fetch_assoc($result_compare);
			#在截止日期时，从auction表中提取出 时间最新的那一条记录 输出user_id,如果user_id和session中的一致，那么输出pay
			$winner=$row_compare['user_id'][0];
			$d=date("Y-m-d H-i-s");
			if($d>=$deadline and $winner==$user_id)
				echo 'successful bid!';
			elseif ($d>=$deadline) 
				echo 'The successful bidder is user '. $winner;  
			else 
				echo 'Results will be updated after the auction deadline';		
			?>
		</td>
		
			<td>
			<?php
			if ($d <= $deadline) #如果在截止日期之前，那么允许delete
			{
				?>
				<form action="delete_record_result.php" method="post">
				<input name="bid_id" type="hidden" value="<?php echo $bid_id; ?>" > <!--#hidden value？!-->
				<input type="submit" value="Delete this bidding" >
				</form>
			<?php
			}
			?>
			</td>
		
				
<?php
}
	?>
	</tr>
	<?php
	mysqli_close($link);
	?>
</table>	   
</body>
</html>
