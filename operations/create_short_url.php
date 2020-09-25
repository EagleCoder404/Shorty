<?php
include "redirect.php";

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
$con = pg_connect("host=localhost dbname=url_shortner user=url_shortner password=root");
$su = $_POST['original_url'];
$rand_code = generateRandomString();

$short_url = "http://".$host."/?".$rand_code;
$query =<<<EOD
insert into url_map values('$short_url','$su','$email',0);
EOD;
pg_query($con,$query);
redirect("/home");

?>