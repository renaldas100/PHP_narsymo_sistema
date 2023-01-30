<?php

if (! isset($_SESSION['user_id']) || $_SESSION['user_id']==0){
    header('location: login.php');
    die();
}

?>