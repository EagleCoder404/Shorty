<?php
include "operations/redirect.php";
include "operations/get_original.php";
include "operations/flash_alerts.php";

$code=array_key_first($_GET);
if($code !== NULL)
{
	$code = htmlspecialchars($code);
	$n = get_url($code);
	redirect($n);
}

session_start();
if(isset($_SESSION['status']))
	session_destroy();
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">		
	<!-- <link href="https://fonts.googleapis.com/css2?family=Raleway:wght@500&display=swap" rel="stylesheet"> -->
	<!-- <link href="https://fonts.googleapis.com/css2?family=Raleway:wght@500;800&display=swap" rel="stylesheet"> -->
	<link href="https://fonts.googleapis.com/css2?family=Roboto+Slab:wght@800&display=swap" rel="stylesheet">
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
	<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
	<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js" integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV" crossorigin="anonymous"></script>
	<title>Foyer</title>
	<style>
		*{
			font-family: 'roboto slab';
		}
	</style>
</head>
<body class='bg-warning'>
	<?php include "header.php"; ?>
	<div class='jumbotron bg-light m-sm-3'>
		<div class='row'>
			<div class='col-sm-6'>
				<h1 class="display-1">Welcome Back!</h1>
				<form action="/operations/login.php" method="post">

					<div class="form-group">
					  <label for="email">Email</label>
					  <input type="text" name="email" id="email" class="form-control" placeholder="Email" aria-describedby="helpId" required>
					</div>
					<div class="form-group">
						<label for="password">Password</label>
						<input type="password" name="password" id="password" class="form-control" placeholder="Password" aria-describedby="helpId" required>
					</div>
					<button type="submit" class="btn btn-primary">Login</button>
					
				</form>
			</div>

			<div class='col-sm-6'>
				<h1 class="display-1">Hello There!</h1>
				<form action="operations/register.php" method="post">
					<div class="form-group">
					  <label for="firstname">First Name</label>
					  <input type="text" name="firstname" id="firstname" class="form-control" placeholder="First Name" aria-describedby="helpId" required>
					</div>
					<div class="form-group">
					  <label for="lastname">Last Name</label>
					  <input type="text" name="lastname" id="lastname" class="form-control" placeholder="Last Name" aria-describedby="helpId" required>
					</div>
					<div class="form-group">
					  <label for="email">E-Mail</label>
					  <input type="email" name="email" id="email" class="form-control" placeholder="E-Mail" aria-describedby="helpId" required>
					</div>
					<div class="form-group">
					  <label for="password">Password</label>
					  <input type="password" name="password" id="password" class="form-control" placeholder="Password" aria-describedby="" required>
					</div>
					<button type="submit" class="btn btn-primary">Register</button>
				</form>
			</div>

		</div>
	</div>
</body>
</html>	<script>
		
		</script>