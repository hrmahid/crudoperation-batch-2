<!DOCTYPE HTML>
<html lang="en-US">
<head>
	<meta charset="UTF-8">
	<title>Read Operation</title>
	<link rel="stylesheet" href="bootstrap.min.css" />
	
</head>
<body>
	<?php
		const DB_HOST ="localhost";
		const DB_USER = "root";
		const DB_PASS = "";
		const DB_NAME = "crud";
		
		$con = mysqli_connect(DB_HOST,DB_USER,DB_PASS,DB_NAME);
		if($con == false){
			echo "Database Not Connected";
		}
		
		$sql = "SELECT * FROM students";
		
		$run = mysqli_query($con,$sql);
	?>



	<div class="container">
		<div class="jumbotron">
			<h1 class="text-center">All Data</h1>
		</div>
		<table class="table table-striped">
			<thead>
				<tr>
					<th>Name</th>
					<th>Roll</th>
					<th>Class</th>
					<th>Action</th>
				</tr>
			</thead>
			<tbody>
			<?php
				while($result = mysqli_fetch_assoc($run)){
					

			?>
				<tr>
					<td><?php echo $result['name']; ?></td>
					<td><?php echo $result['roll']; ?></td>
					<td><?php echo $result['class']; ?></td>
					<td>
						<a href="single_view.php?userId=<?php echo $result['s_id']; ?>" class="btn btn-sm btn-primary">View</a>
						
						<a href="edit.php?user_id=<?php echo $result['s_id']; ?>" class="btn btn-sm btn-warning">Edit</a>
						
						<a href="delete.php?userId=<?php echo $result['s_id']; ?>" id="delete" class="btn btn-sm btn-danger">Delete</a>
						
					</td>
				</tr>
				<?php 
				}
				?>
			</tbody>
		</table>
	</div>
	
</body>
</html>