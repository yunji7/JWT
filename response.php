<?php

	require ('vendor/autoload.php');
	use \Firebase\JWT\JWT;

	$key = "example_key";


	$jwt = $_POST['code'];


	JWT::$leeway = 60; // $leeway in seconds
	$decoded = JWT::decode($jwt, $key, array('HS256'));


	echo json_encode($decoded);


?>