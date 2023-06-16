<?php 

require_once "../connection.php";

$id =  $_GET["id"];

$sql = "DELETE FROM minesdata WHERE `minesdata`.`id` =  $id";

mysqli_query($conn , $sql); 

header("Location: minesdata.php?delete-success-where-id=" .$id );

?>