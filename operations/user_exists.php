<?php
include_once "get_con.php";

function userexists($email)
{
	    $con = get_con();
    $result = pg_query($con,"select email from accounts where email='$email';");
    $result = pg_fetch_row($result);
    if ($result == false)
        return false;
    else
        return true;
}
?>