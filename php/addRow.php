<?php
require_once "connection.php";
$connection = connection();
$name = $_POST['name'];
$category_id = $_POST['category_id'];

$php = $_POST['php'];
$javascript = $_POST['javascript'];
$css = $_POST['css'];


$sql = "INSERT INTO categoryType (php,javascript,css) values ($php,$javascript,$css)";
mysqli_query($connection, $sql) or die("database error:" . mysqli_error($connection));

$category_id = mysqli_insert_id($connection);

$sql = "INSERT INTO task (name,category_id) values ('$name',$category_id)";
mysqli_query($connection, $sql) or die("database error:" . mysqli_error($connection));

$id = mysqli_insert_id($connection);


$array = [
    "id" => $id,
    "category_id" => $category_id
];

echo json_encode($array);