<!DOCTYPE HTML>
<html lang="en-US">
<head>
	<meta charset="UTF-8">
	<title>CRUD Operation</title>
	<link rel="stylesheet" href="bootstrap.min.css" />
</head>
<body>
	<div class="container">
		<div class="jumbotron">
			<h1>Student Information</h1>
		</div>
		
		<div class="card">
			<div class="card-body">
				<form action="" method="POST" enctype="multipart/form-data">
					<div class="form-group">
						<label>Name</label>
						<input type="text" name="std_name" placeholder="Enter Student Name" class="form-control" />
					</div>
					<div class="form-group">
						<label>Roll</label>
						<input type="number" name="std_roll" placeholder="Enter Your Roll"  class="form-control" />
					</div>
					<div class="form-group">
						<label>Class</label>
						<input type="number" name="std_class" placeholder="Enter Your class"  class="form-control" />
					</div>
					<div class="form-group">
						<label>Photo</label>
						<input type="file" name="std_photo" class="form-control-file" />
					</div>
					<div class="form-group">
						<button type="submit" name="addData" class="btn btn-success">Add Student</button>
					</div>
				</form>
			</div>
		</div>
	</div>
	<?php
		const DB_HOST ='localhost';
		const DB_USER ='root';
		const DB_PASS ='';
		const DB_NAME ='crud';
		
		if(isset($_POST['addData'])){
			$name = $_POST['std_name'];
			$roll = $_POST['std_roll'];
			$class = $_POST['std_class'];
			
			$photo = $_FILES['std_photo']['name'];
			$tmp_name = $_FILES['std_photo']['tmp_name'];
			
			$directory = 'photo/';
			
			$upload = move_uploaded_file($tmp_name,$directory.$photo);
			
			if($upload == true){
				$image_name = $directory.$photo;
				
				$con = mysqli_connect(DB_HOST,DB_USER,DB_PASS,DB_NAME);
				
				$sql = "INSERT INTO students (name) VALUES ('$name')";
				
				$run = mysqli_query($con,$sql);
				if($run == true){
					echo "<script>alert('Success')</script>";
				}else{
					echo "<script>alert('Failed')</script>";
				}
				
			}
			else{
				echo "<script>alert('Photo Upload Failed')</script>";
			}
			
			
			
			
		}

	
	?>
	
	
	
</body>
</html>