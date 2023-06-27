<?php
include "../com/database.php";

//get the current date and time
date_default_timezone_set("Asia/Colombo");
$datetime = date("Y-m-d H:i:s");


$id = $_POST['invoice_id'];
$value = $_POST['invoice_value'];

$q = "INSERT INTO invoice (id, value, datetime) VALUES ('$id', '$value','$datetime')";
Database::push($q);

echo "success";
?>