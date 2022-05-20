<?php
$con = mysqli_connect('localhost', 'root', '', 'cooks_collection');
if ($con) {
    //echo "Connection Successful";
} else {
    die(mysqli_error(mysqli_connect('localhost', 'root', '', 'cooks_collection')));
}