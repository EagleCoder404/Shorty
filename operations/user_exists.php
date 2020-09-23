<?php
function userexists($email)
{
    $con = pg_connect("host=localhost dbname=url_shortner user=url_shortner password=root");
    $result = pg_query($con,"select email from accounts where email='$email';");
    $result = pg_fetch_row($result);
    if ($result == false)
        return false;
    else
        return true;
}
?>