<?php 

require_once "../connection.php";

$id =  $_GET["id"];

$sql = "DELETE FROM salesdata WHERE `salesdata`.`id` =  $id";

mysqli_query($conn , $sql); 

header("Location: salesdata.php?delete-success-where-id=" .$id );

?>