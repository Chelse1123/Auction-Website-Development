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
</head>

<body>
<?php
    require 'header_menu.php';
	require 'login_validate.php';
	require 'db/db_connect.php';
    $artwork_id = $_POST["artwork_id"];
    $artwork_name = $_POST["artwork_name"];
    $artist_name = $_POST["artist_name"];
	$tag = $_POST["tag"];
    $auction_start_time = $_POST["auction_start_time"];
    $auction_deadline = $_POST["auction_deadline"];
    $starting_price = $_POST["starting_price"];
    $time=date("Y-m-d H-i-s");

$query = " SELECT * FROM artwork WHERE artwork_id='$artwork_id' ";
$result = mysqli_query($link, $query);   
    
if ($auction_start_time < $time)
    {
    ?>
    <P>The start time should be later than now.</P> 
    <input type="button" onclick="MM_callJS('history.go(-2)')" value="Retry" > 
    <?php
    }
    elseif($auction_deadline <= $auction_start_time)
      {   
      ?>
      <P>The end time should be later than the start time.</P> 
      <input type="button" onclick="MM_callJS('history.go(-2)')" value="Retry" > 
      <?php       
      }
        else
        {
        require 'db/db_connect.php';
        $query = " UPDATE artwork SET
			auction_start_time = '$auction_start_time',
			auction_deadline = '$auction_deadline',
			starting_price = $starting_price
				WHERE artwork_id = '$artwork_id' ";
		$result=mysqli_query($link, $query);
		mysqli_close($link);

		   if (!$result)
			  echo 'Cannot update the record.';
		   else
 		 	  echo 'Artwork updated. ';

		      header("Refresh:1; url=myartwork.php");
	   }	
?>   
</body>
</html>
