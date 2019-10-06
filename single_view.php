<!DOCTYPE HTML>
<html lang="en-US">
<head>
	<meta charset="UTF-8">
	<title>Single Data View</title>
		<link rel="stylesheet" href="bootstrap.min.css" />
		
</head>
<body>
	<?php 
		$userId = $_GET['userId'];
		$con = mysqli_connect('localhost','root','','crud');
		
		$sql = "SELECT * FROM students WHERE s_id = '$userId'";
		$run = mysqli_query($con,$sql);
		$result = mysqli_fetch_assoc($run);
	
	?>
	<div class="container">
		<table class="table table-bordered">
			<thead>
				<tr>
					<th colspan="2">Information</th>
					<th>Image</th>
				</tr>
			</thead>
			<tbody>
				<tr>
					<td>Name</td>
					<td><?php echo $result['name']; ?></td>
					<td rowspan="5">
						<img src="<?php echo $result['photo']; ?>" alt="" class="img-fluid" />
					</td>
				</tr>
				<tr>
					<td>Class</td>
					<td><?php echo $result['class']; ?></td>
				</tr>
				<tr>
					<td>Roll</td>
					<td><?php echo $result['roll']; ?></td>
				</tr>
			</tbody>
		</table>
	</div>
	
	
	
</body>
</html>