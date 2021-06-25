<?php 
	$host = "localhost";
	$user = "root";
	$pass = "";
	$db = "untuk_form";

	$koneksi = mysqli_connect($host, $user, $pass, $db);

	if(!$koneksi) {
		die("Koneksi gagal : ".mysql_connect_error());
	}
?>