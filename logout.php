<?php

session_start();
unset($_SESSION['user_id']);
session_destroy();

header("location:art_entrance.html");

?>
