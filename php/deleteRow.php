<?php
require_once "connection.php";
$connection = connection();
$id = $_POST['idTask'];
$idC = $_POST['idCategory'];

$sql = "DELETE from task where id=" . $id;
mysqli_query($connection, $sql) or die("database error:" . mysqli_error($connection));


$sql = "DELETE from categoryType where id=" . $idC;
mysqli_query($connection, $sql) or die("database error:" . mysqli_error($connection));