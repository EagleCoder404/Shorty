<?php
include_once "get_con.php";
function get_url($code){

    $host = $_SERVER['HTTP_HOST'];
    $con = get_con();

    $short_url =  "http://".$host."/?".$code; 

    $result = pg_fetch_row(pg_query("select original_url from url_map where short_url='$short_url';"));

    if($result==false)	//if no url is found,return NULL
        return NULL;
        
    pg_query("update url_map set use_count = use_count+1 where short_url='$short_url'");

    $url = $result[0];		//get original url from array
    return $url;			//return orignal url
}
?>