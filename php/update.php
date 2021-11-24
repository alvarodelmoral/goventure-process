<?php
include_once("connection.php");
$input = filter_input_array(INPUT_POST);
if ($input['action'] == 'edit') {
    $update_field = '';
    if (isset($input['name'])) {
        $update_field .= "name='" . $input['name'] . "'";
    } else if (isset($input['category_id'])) {
        $update_field .= "category_id='" . $input['category_id'] . "'";
    if ($update_field && $input['id']) {
        $sql = "UPDATE task SET $update_field WHERE id='" . $input['id'] . "'";
        mysqli_query($connection, $sql) or die("database error:" . mysqli_error($connection));
    }
}