<?php

function get_con()
{
	$database_url = getenv('DATABASE_URL');
	$parts = parse_url($database_url);

	$dbname = substr($parts['path'], 1);
	$user = $parts['user'];
	$password = $parts['pass']; 
	$port = $parts['port'];
	$host = $parts['host'];

	$con = pg_connect("host=$host dbname=$dbname user=$user password=$password port=$port");
	return $con;
}
?>