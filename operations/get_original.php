<?php

function get_url($code){
    $host = $_SERVER['HTTP_HOST'];
    $con = pg_connect("host=localhost dbname=url_shortner user=url_shortner password=root");   
    $result = pg_fetch_row(pg_query("select original_url from url_map where short_url='http://$host/?$code';"));
    if($result==false)
    return NULL;
    $url = $result[0];
    return $url;
}
?>