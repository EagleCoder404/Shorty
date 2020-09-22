<?php
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

    $con = pg_connect("host=localhost dbname=accounts user=url_shortner password=root"); 
}
?>