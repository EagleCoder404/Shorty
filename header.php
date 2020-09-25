<?php
if(session_status() === PHP_SESSION_NONE) session_start();	//if session hasn't been start, start it

$code = "";

if(isset($_SESSION['status']))	// if logged in, add logout button html to nav_html variable
{
  $code =<<<EOD
  	<li class="nav-item">
  		<a class="nav-link" href="/"><button class="btn btn-light my-2 my-sm-0">Logout</button></a>
	</li>
EOD;
}
$nav_html=<<<EOD
<nav class="navbar navbar-expand-sm navbar-dark bg-dark">
	<a class="navbar-brand" href="#">Shorty</a>

	<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
	  <span class="navbar-toggler-icon"></span>
	</button>

	<div class="collapse navbar-collapse" id="navbarSupportedContent">
		  <ul class="navbar-nav mr-auto">
		  $code
		  </ul>
	</div>
</nav>
EOD;

echo $nav_html; 	//echo the header html
?>