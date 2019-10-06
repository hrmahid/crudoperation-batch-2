<!DOCTYPE HTML>
<html lang="en-US">
<head>
	<meta charset="UTF-8">
	<title>Edit Data</title>
	<link rel="stylesheet" href="bootstrap.min.css" />
</head>
<body>
	<?php 
		$user_id = $_GET['user_id'];
		
		$con = mysqli_connect("localhost","root","","crud");
		if(!$con){
			echo "Database Not Connected";
		}
		
		$sql = "SELECT * FROM students WHERE s_id = '$user_id' ";
		
		$run = mysqli_query($con,$sql);
		
		$result = mysqli_fetch_assoc($run);
			
	?>
	<div class="container">
		<div class="jumbotron">
			<h2 class="text-center">Edit Data</h2>
		</div>
		<div class="card">
			<div class="card-body">
				<form action="" method="POST">
					<div class="form-group">
						<label>Name</label>
						<input type="text" class="form-control" name="u_name" value="<?php echo $result['name']; ?>" />
					</div>
					<div class="form-group">
						<label>Roll</label>
						<input type="number" class="form-control" name="u_roll" value="<?php echo $result['roll']; ?>" />
					</div>
					<div class="form-group">
						<label>Class</label>
						<input type="text" class="form-control" name="u_class" value="<?php echo $result['class']; ?>" />
					</div>
					<div class="form-group">
						<input type="hidden" name="user_id" value="<?php echo $result['s_id']; ?>" />
						<input type="submit" name="update" class="btn btn-success" value="Update" />
					</div>
				</form>
			</div>
		</div>
		
		
	</div>
	<?php 
		if(isset($_POST['update'])){
			 $name = $_POST['u_name'];
			 $roll = $_POST['u_roll'];
			 $class = $_POST['u_class'];
			 $id = $_POST['user_id'];
			 
			 $sql = "UPDATE students SET name = '$name', roll = '$roll', class='$class' WHERE s_id ='$id'";
			 
			 $run = mysqli_query($con,$sql);
			 if($run){
				header('location:read.php'); 
			 }else{
				 echo "<script>alert('Update Failed');</script>";
			 }
			
			
		}
	
	
	?>
	
	
	
	
</body>
</html>