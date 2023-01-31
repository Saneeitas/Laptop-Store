<?php 
require('connection.php');

$sql = "SELECT * FROM products ORDER BY id DESC";
$query = mysqli_query($connection,$sql);
$result = mysqli_fetch_assoc($query);

$id = $result["id"]; 








?>