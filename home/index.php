<?php
include "../operations/auth_redirections.php";
$email = $_SESSION['email'];

$con = pg_connect("host=localhost dbname=url_shortner user=url_shortner password=root");

$links = [];
$rows = pg_query($con,"select * from url_map where owner_id='$email';");
$size=0;

while($row = pg_fetch_assoc($rows))
{
	array_push($links,$row);
	$size+=1;
}

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
<body class=''>
	<?php include "../header.php";?>

	<div class="container mt-3 p-sm-3">
		<div class="container-fluid">
			<button class="btn btn-outline-primary rounded-0 btn-block" type="button" data-toggle="collapse" data-target="#collapseExample" aria-expanded="true" aria-controls="collapseExample">
				Make A URL
			</button>
			<div class="collapse border border-primary border-top-0" id="collapseExample">
				
				<form action="../operations/create_short_url.php" method='post' class='p-3'>
					<div class="row">
	
						<div class="col-lg-10">
							<div class="form-group">
							  <input type="text" class="form-control" name="original_url" id="original_url" aria-describedby="helpId" placeholder="Your URL">
							</div>
						</div>
	
						<div class="col-lg-2">
							<button class='btn btn-outline-success'>Submit</button>
						</div>
		
					</div>
				</form>
	
			</div>
		</div>
		<div class="mt-3 container-fluid">
			<table class="table">
				<thead class='thead-dark'>
					<tr>
						<th>Shorty URL</th>
						<th>Original URL</th>
						<th>Open Count</th>
					</tr>
				</thead>
				<tbody>
					<?php for ($i=0; $i < $size ; $i++) { ?>
					<tr>
						<td scope="row"><?= $links[$i]['short_url'] ?></td>
						<td><?= $links[$i]['original_url'] ?></td>
						<td><?= $links[$i]['use_count'] ?></td>
					</tr>
					<?php } ?>
				</tbody>
			</table>
		</div>
	</div>
	
</body>
</html>