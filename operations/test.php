<?php

function parse_heroku_postgres_url_string($url_string) {

	$parts = parse_url($url_string);

	return [
		'username'	=> $parts['user'],
		'password'	=> $parts['pass'],
		'hostname'	=> $parts['host'],
		'database'	=> substr($parts['path'], 1),
		'port'		=> $parts['port'],
	];

}
$v = "postgres://cxrakhyqjswhvc:18d6ceb942ea0545a974a58227e59c90d120e75f435a8db923ba1e89588e7eb4@ec2-52-21-247-176.compute-1.amazonaws.com:5432/d2jjbvpkojt9ld";
var_dump(parse_heroku_postgres_url_string($v));
?>