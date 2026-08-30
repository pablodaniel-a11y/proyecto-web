<?php
$conn = new mysqli("localhost", "root", "", "proyecto");
if($conn->connect_error){
	die("conexion fallida: ".$conn->connect_error);
}

?>