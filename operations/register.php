<?php
include "user_exists.php";
include "redirect.php";
include_once "get_con.php";

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
    $con = get_con();    
    $res = pg_query($con,"insert into accounts values('$email','$firstname','$lastname','$hash');");
    if ($res)
    {
        session_start();
        $_SESSION['email']=$email;
        $_SESSION['status']=true;
        $_SESSION['fisrtname']=$firstname;
        redirect('/home');
    }
}

?>