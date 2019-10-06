<?php 
	$getuser = $_GET['userId'];
	
	if(empty($getuser)){
		header('location:read.php');
	}
	
	$con = mysqli_connect('localhost','root','','crud');
		
	$sql = "SELECT * FROM students WHERE s_id = '$getuser'";
	$run = mysqli_query($con,$sql);
	$result = mysqli_fetch_assoc($run);
	
	$photo = $result['photo'];
	if(empty($photo)){
		$sql = "DELETE FROM students WHERE s_id = '$getuser'";
		$que = mysqli_query($con,$sql);
		if($que == true){
			echo "<script>
				alert('Data Deleted');
				window.open('read.php','_self');
				
				</script>";
		}
		else{
			echo "<script>
				alert('Data Delete Failed');
				window.open('read.php','_self');
				
				</script>";
		}
	}
	else{
		$delete = unlink($photo);
		if($delete == true){
			$sql = "DELETE FROM students WHERE s_id = '$getuser'";
			$que = mysqli_query($con,$sql);
			if($que == true){
				echo "<script>
				alert('Data Deleted');
				window.open('read.php','_self');
				
				</script>";
			}else{
				echo "<script>
				alert('Data Delete Failed');
				window.open('read.php','_self');
				
				</script>";
			}
		}
		else{
			echo "<script>
				alert('Photo Delete Failed');
				window.open('read.php','_self');
				</script>";
		}
	}
	
?>