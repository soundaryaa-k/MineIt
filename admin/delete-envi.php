<?php 

require_once "../connection.php";

$id =  $_GET["id"];

$sql = "DELETE FROM environmentdata WHERE `environmentdata`.`id` =  $id";

mysqli_query($conn , $sql); 

header("Location: environmentdata.php?delete-success-where-id=" .$id );

?>