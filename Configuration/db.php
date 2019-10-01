<?php

$db = mysqli_connect("localhost","root", "", "myrepo");

if(mysqli_connect_error()){
    echo "Failed to connect cause of: " . mysqli_connect_error();
}

?>