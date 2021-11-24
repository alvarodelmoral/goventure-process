<?php
function connection()
{
	$server = "localhost";
	$user = "root";
	$password = "usuario";
	$bd = "goventure";

	$connection = mysqli_connect($server, $user, $password, $bd);

	return $connection;
}