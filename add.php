<?php 
    include('db_connect.php');
	$email = $name = $project = $id='';
	$errors = array('email' => '', 'name' => '', 'project' => '' ,'id' => '');

	if(isset($_POST['submit'])){
		
		// check email
		if(empty($_POST['email'])){
			$errors['email'] = 'An email is required';
		} else{
			$email = $_POST['email'];
			if(!filter_var($email, FILTER_VALIDATE_EMAIL)){
				$errors['email'] = 'Email must be a valid email ';
			}
		}

		// check name
		if(empty($_POST['name'])){
			$errors['name'] = 'A name is required';
		} else{
			$name = $_POST['name'];
			if(!preg_match('/^[a-zA-Z\s]+$/', $name)){
				$errors['name'] = 'name must be letters and spaces only';
			}
		}
        if(empty($_POST['id'])){
			$errors['id'] = 'A id is required';
		} else{
			$name = $_POST['id'];
			if(!preg_match('/^[0-9\s]+$/', $id)){
				$errors['id'] = 'id must be numbers only';
			}
		}
		// check project
		if(empty($_POST['project'])){
			$errors['project'] = 'project details are required';
		} else{
			$project = $_POST['project'];
			if(!preg_match('/^[a-zA-Z\s]+$/', $project)){
				$errors['project'] = 'please enter project';
			}
		}

		if(array_filter($errors)){
			//echo 'errors in form';
		} else {
			// escape sql chars
			$email = mysqli_real_escape_string($conn, $_POST['email']);
			$name = mysqli_real_escape_string($conn, $_POST['name']);
			$project = mysqli_real_escape_string($conn, $_POST['project']);
			$id = mysqli_real_escape_string($conn, $_POST['id']);


			// create sql
			$sql = "INSERT INTO project(name,email,project,id) VALUES('$name','$email','$project','$id')";

			// save to db and check
			if(mysqli_query($conn, $sql)){
				// success
				header('Location: index1.php');
			} else {
				echo 'query error: '. mysqli_error($conn);
			}

		}

	} // end POST check


?>
<!DOCTYPE html>

<html>
	
	<?php include('header.php'); ?>

	<section class="container grey-text">
		<h4 class="center">edit profile</h4>
		<form class="white" action="add.php" method="POST">
			<label>Your Email</label>
			<input type="text" name="email" value="<?php echo htmlspecialchars($email) ?>">
			<div class="red-text"><?php echo $errors['email']; ?></div>
			<label>Name</label>
			<input type="text" name="name" value="<?php echo htmlspecialchars($name) ?>">
			<div class="red-text"><?php echo $errors['name']; ?></div>
			<label>project</label>
			<input type="text" name="project" value="<?php echo htmlspecialchars($project) ?>">
			<div class="red-text"><?php echo $errors['project']; ?></div>
			<label>id</label>
			<input type="text" name="project" value="<?php echo htmlspecialchars($id) ?>">
			<div class="red-text"><?php echo $errors['id']; ?></div>
			<div class="center">
				<input type="submit" name="submit" value="Submit" class="btn brand z-depth-0">
		

			</div>
		</form>
	</section>

	<?php include('footer.php'); ?>

</html>