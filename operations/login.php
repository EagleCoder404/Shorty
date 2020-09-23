<?php

include "redirect.php";
include "user_exists.php";

session_start();
$_SESSION['status'] = false;

if($_SERVER['REQUEST_METHOD'] == 'POST')
{
    $con = pg_connect("host=localhost dbname=url_shortner user=url_shortner password=root");   

    $email = $_POST['email'];
    $password = $_POST['password'];

    if(userexists($email))
    {
        $account = pg_fetch_row(pg_query($con,"select password,firstname from accounts where email='$email';"));
        if(password_verify($password,$account[0]))
        {
            redirect('/home');
            $_SESSION['email'] = $email;            
            $_SESSION['status'] = true;
            $_SESSION['firstname'] = $account[1];
        }        
        else
            redirect("/");
    }
    else
        redirect('/');
}

?>