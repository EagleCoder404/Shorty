<?php
include "redirect.php";
session_start();
if(!isset($_SESSION['status']))
     redirect("/");
?>