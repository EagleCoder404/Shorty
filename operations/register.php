<?php
include "user_exists.php";

function clean_string($str)
{
    $str = trim($str);
    $str = htmlspecialchars($str);
    return $str;
}

if($_SERVER["REQUEST_METHOD"] == "POST")
{
    $email = clean_string($_POST['email']);
    $firstname = clean_string($_POST['firstname']);
    $lastname = clean_string($_POST['lastname']);
    $password = clean_string($_POST['password']);
    $hash = password_hash($password,PASSWORD_DEFAULT);
    $con = pg_connect("host=localhost dbname=url_shortner user=url_shortner password=root");    
    pg_query($con,"insert into accounts values('$email','$firstname','$lastname','$hash');");
}

?>