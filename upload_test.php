<head>
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<link rel="stylesheet" href="./all.css">
</head>
<script type="text/javascript">
function MM_callJS(jsStr) 
{ //v2.0
  return eval(jsStr)
}
</script>
<?php
  $artwork_name = $_POST["artwork_name"];
  $artist_name = $_POST["artist_name"];
  $tag = $_POST["tag"];
  $auction_start_time = $_POST["auction_start_time"];
  $auction_deadline = $_POST["auction_deadline"];
  $starting_price = $_POST["starting_price"];	   
  $time = date("Y-m-d H-i-s");
?>

<?php
 if(is_null($artwork_name,$artist_name)){
  echo "Please fii in all blanks";
 }
 else
 	echo "others"


	
    ?> 

    <input type="button" onclick="MM_callJS('history.go(-1)')" value="Retry" >
    <?php

  
    require 'db/db_connect.php';
	session_start();
	$user_id = $_SESSION['user_id'];
            $query = " INSERT INTO artwork
            (artwork_id, artwork_name, artist_name, tag, user_id, upload_time, auction_start_time, auction_deadline, starting_price)
            VALUE
            (NULL, '$artwork_name', '$artist_name', '$tag', '$user_id' , CURRENT_TIMESTAMP, '$auction_start_time', '$auction_deadline', '$starting_price' ) " ;
            $result = mysqli_query($link, $query);
            mysqli_close($link);

	        if ($result)
		       header ("location:myartwork.php");      
      ?>