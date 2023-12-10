<?php 

	include('db_connect.php');

	if(isset($_POST['delete'])){

		$id_to_delete = mysqli_real_escape_string($conn, $_POST['id_to_delete']);

		$sql = "DELETE FROM project WHERE id = $id_to_delete";

		if(mysqli_query($conn, $sql)){
			header('Location: index1.php');
		} else {
			echo 'query error: '. mysqli_error($conn);
		}

	}

	// check GET request id param
	if(isset($_GET['id'])){
		
		// escape sql chars
		$id = mysqli_real_escape_string($conn, $_GET['id']);

		// make sql
		$sql = "SELECT * FROM project WHERE id = $id";

		// get the query result
		$result = mysqli_query($conn, $sql);

		// fetch result in array format
		$pro = mysqli_fetch_assoc($result);

		mysqli_free_result($result);
		mysqli_close($conn);

	}

?>

<!DOCTYPE html>
<html>

	<head>
	<title>Profile</title>

  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">
  <style type="text/css">
	  .brand{
	  	background: #cbb09c !important;
	  }
  	.brand-text{
  		color: #cbb09c !important;
  	}
  	form{
  		max-width: 460px;
  		margin: 20px auto;
  		padding: 20px;
  	}
    .pro{
      width: 100px;
      margin: 40px auto -30px;
      display: block;
      position: relative;
      top: -30px;
    }
  </style>
</head>
<body class="grey lighten-4">
	<nav class="white z-depth-0">
    <div class="container">
      <a href="../index1.php" class="brand-logo brand-text">Investor's Lancer</a>
      <ul id="nav-mobile" class="right hide-on-small-and-down">
       
        <li><a href="add.php" class="btn brand z-depth-0">Edit profile</a></li>
      </ul>
    </div>
  </nav>

	<div class="container center grey-text">
		<?php if($pro): ?>
			<h4><?php echo $pro['name']; ?></h4>
			<pro>Created by <?php echo $pro['email']; ?></pro>
			
			<h5>project:</h5>
			<pro><?php echo $pro['project']; ?></pro>

			<!-- DELETE FORM -->
			<form action="details.php" method="POST">
				<input type="hidden" name="id_to_delete" value="<?php echo $pro['id']; ?>">
				<input type="submit" name="delete" value="Delete" class="btn brand z-depth-0">
			</form>

		<?php else: ?>
			<h5>No such pro exists.</h5>
		<?php endif ?>
	</div>

	<footer class="section">
		<div class="center grey-text">&copy; Copyright 2023</div>
	</footer>
</body>

</html>