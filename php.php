<?php

	require ('vendor/autoload.php');
	use \Firebase\JWT\JWT;

	$key = "example_key";
	$token = array(
		"iss" => "http://example.org",
		"aud" => "http://example.com",
		"iat" => 1356999524,
		"nbf" => 1357000000,

	);



	/**
	 * IMPORTANT:
	 * You must specify supported algorithms for your application. See
	 * https://tools.ietf.org/html/draft-ietf-jose-json-web-algorithms-40
	 * for a list of spec-compliant algorithms.
	 */


   //'eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJpc3MiOiJodHRwOlwvXC9leGFtcGxlLm9yZyIsImF1ZCI6Imh0dHA6XC9cL2V4YW1wbGUuY29tIiwiaWF0IjoxMzU2OTk5NTI0LCJuYmYiOjEzNTcwMDAwMDB9.KcNaeDRMPwkRHDHsuIh1L2B01VApiu3aTOkWplFjoYI'

	$jwt = JWT::encode($token, $key,'HS256');
	var_dump($jwt);
	$decoded = JWT::decode($jwt, $key, array('HS256'));


//	print_r($decoded);
	var_dump($decoded);


	/*
	 NOTE: This will now be an object instead of an associative array. To get
	 an associative array, you will need to cast it as such:
	*/

	$decoded_array = (array) $decoded;

	/**
	 * You can add a leeway to account for when there is a clock skew times between
	 * the signing and verifying servers. It is recommended that this leeway should
	 * not be bigger than a few minutes.
	 *
	 * Source: http://self-issued.info/docs/draft-ietf-oauth-json-web-token.html#nbfDef
	 */


	JWT::$leeway = 60; // $leeway in seconds
	$decoded = JWT::decode($jwt, $key, array('HS256'));


	var_dump($decoded);
	var_dump($decoded_array);


?>