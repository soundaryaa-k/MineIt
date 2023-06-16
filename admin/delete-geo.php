<?php 

require_once "../connection.php";

$id =  $_GET["id"];

$sql = "DELETE FROM geologydata WHERE `geologydata`.`id` =  $id";

mysqli_query($conn , $sql); 

header("Location: geologydata.php?delete-success-where-id=" .$id );

?>