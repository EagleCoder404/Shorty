<?php

include "redirect.php";
include "user_exists.php";
include_once "get_con.php";
session_start();

if($_SERVER['REQUEST_METHOD'] == 'POST')
{
    $con = get_con();   

    $email = $_POST['email'];
    $password = $_POST['password'];

    if(userexists($email))
    {
        $account = pg_fetch_row(pg_query($con,"select password,firstname from accounts where email='$email';"));
        if(password_verify($password,$account[0]))
        {
            $_SESSION['email'] = $email;            
            $_SESSION['status'] = true;
            $_SESSION['firstname'] = $account[1];
            redirect('/home');
        }        
        else
            redirect("/");
    }
    else
        redirect('/');
}

?>