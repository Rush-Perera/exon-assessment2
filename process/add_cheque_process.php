<?php
include "../com/database.php";

//get the current date and time
date_default_timezone_set("Asia/Colombo");
$datetime = date("Y-m-d H:i:s");


$id = $_POST['cheque_id'];
$value = $_POST['cheque_value'];

$q = "INSERT INTO cheque (id, value, datetime) VALUES ('$id', '$value','$datetime')";
Database::push($q);

echo "success";
?>