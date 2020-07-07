<?php

$conn = mysqli_connect('localhost', 'root', '', 'nawaazish_db');

if(!$conn){
    die(mysqli_error($conn));
} else {
    // echo "Connected";
}

?>