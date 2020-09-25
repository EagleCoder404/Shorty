<?php

include "redirect.php";

session_start();
if(!isset($_SESSION['status']))		//if not authenticated, redirect to login page
     redirect("/");
?>