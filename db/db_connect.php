<?php
    $link = mysqli_connect('localhost',  
                '22a5503group01', 'Wdd2ekhV', '22a5503group01' );
    if (!$link)
    {
    echo 'MySQL connection error: '. mysqli_connect_error();
    }
?>