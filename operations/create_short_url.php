<?php
include "redirect.php";
include_once "get_con.php";
function generateRandomString($length = 10) 		//generates random string of length specified
{
    $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
    $charactersLength = strlen($characters);
    $randomString = '';
    for ($i = 0; $i < $length; $i++) {
        $randomString .= $characters[rand(0, $charactersLength - 1)];
    }
    return $randomString;
}

session_start();
$host = $_SERVER['HTTP_HOST'];		//get domain name example: "shorty"
$email = $_SESSION['email'];
$su = $_POST['original_url'];
$rand_code = generateRandomString();

$con = get_con();

$short_url = "http://".$host."/?".$rand_code;

$query =<<<EOD
insert into url_map values('$short_url','$su','$email',0);
EOD;

pg_query($con,$query);
redirect("/home");

?>