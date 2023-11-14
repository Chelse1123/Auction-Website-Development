<!doctype html>
<html>
<head>
<meta charset="UTF-8">

<title>myartwork</title>
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
    
    $query= "SELECT * FROM artwork WHERE user_id = $user_id ORDER BY upload_time DESC";
	$result = mysqli_query($link, $query);
	$num = mysqli_num_rows($result);
    if ($num<=0)
		echo 'Come and upload your first artwork!';
    else
    {
    ?>    
</p>
<p>&nbsp;</p>
    <h1> My Uploaded Artworks</h1>
    <p>&nbsp;</p>
	<table border="1"  width="900">
	<tr>
		<td> Artwork Name </td>
		<td> Artist </td>
        <td> Tag </td>
		<td> Auction Start Time </td>
		<td> Auction Deadline </td>
		<td> Starting Price </td>
		<td> Upload Time </td>
        <td> Management </td>
		<td> Result</td>
	</tr>	
         
    <?php
    }    
while ($row = mysqli_fetch_assoc($result))
{
        $artwork_id = $row['artwork_id'];
	?>  
        <tr>
            <td> <?php echo $row['artwork_name']; ?> </td>
            <td> <?php echo $row['artist_name']; ?> </td>
            <td> <?php echo $row['tag']; ?> </td>
            <td> <?php echo $row['auction_start_time']; ?> </td>  
            <td> <?php echo $row['auction_deadline']; ?> </td>
            <td> <?php echo $row['starting_price']; ?> </td>
            <td> <?php echo $row['upload_time']; ?> </td>
            <td> 
            <?php
              $time=date("Y-m-d H-i-s");
			  $auction_start_time=$row['auction_start_time'];
              if($time < $auction_start_time)
           			{ 
               ?>
               <form action="update_myartwork.php" method="post">
               <input name="artwork_id" type="hidden" value="<?php echo $artwork_id; ?>" > 
               <input type="submit" value="Update record"></form>
               <form action="delete_myartwork.php" method="post">
               <input name="artwork_id" type="hidden" value="<?php echo $artwork_id; ?>" > 
               <input type="submit" value="Delete record">
                </form>
			    <?php	
			 		}  
                ?> 
				
			<td>
			<?php
				$query_compare= "SELECT user_id FROM auction WHERE artwork_id=$artwork_id ORDER BY auction_time DESC";
				$result_compare=mysqli_query($link,$query_compare);
				$row_compare=mysqli_fetch_assoc($result_compare);
				$winner=$row_compare['user_id'][0];
				$deadline=$row['auction_deadline'];
    			if($time>=$deadline)
				{
					if (!isset($winner))
						echo 'Bought-in';
					else
						echo 'Bought by User'."&nbsp". "$winner"; 
				}
				else 
					echo 'Results will be updated after the auction deadline';	
				
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

<br>
<br>
<p>
   <h1>Upload an artwork</h1>
   <p>&nbsp;</p>
   <form method="post" action="upload.php">
        Artwork Name:
		<input type="text" name="artwork_name" required="required"><br>
        Artist Name:
        <input type="text" name="artist_name" required="required"><br>
		Tag:
		<select name="tag" required="required">
            <option>Painting</option>
            <option>Print</option>
            <option>Photography</option>
            <option>Sculpture</option>
            <option>Design</option>  </select> <br>
       <label for="auction_start_time">Start Time:</label>
       <input type="datetime-local" id="auction_start_time" name="auction_start_time" required="required"><br>
       <label for="auction_deadline">End Time:</label>
       <input type="datetime-local" id="auction_deadline" name="auction_deadline" required="required"><br>
       Start Price:
       <input type="number" name="starting_price" required="required"> <br>   
       
       <br>
       <input type="Submit" value="Upload">
       <input type="Reset" name="Reset">
	</form>
</p>	
</body>
</html>