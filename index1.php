<?php 
include('db_connect.php');

 $sql='select name,project,id from project';
 $result=mysqli_query($conn,$sql);
 $project = mysqli_fetch_all($result, MYSQLI_ASSOC);
 mysqli_free_result($result);
 mysqli_close($conn);
 
?>

<!DOCTYPE html>
<html>
	
	<?php include('header.php'); ?>
    <h4 class="center grey-text">Project details</h4>

	<div class="container">
		<div class="row">

		<?php foreach($project as $p): ?>

<div class="col s6 m4">
	<div class="card z-depth-0">
		<img src="fe.jpg"class="p">
		<div class="card-content center">
			<h6><?php echo htmlspecialchars($p['name']); ?></h6>
			<ul class="grey-text">
				<?php foreach(explode(',', $p['project']) as $pro): ?>
					<li><?php echo htmlspecialchars($pro); ?></li>
				<?php endforeach; ?>
			</ul>
		</div>
		<div class="card-action right-align">
			<a class="brand-text" href="details.php?id=<?php echo $p['id'] ?>">more info</a>
		</div>
	</div>
</div>

<?php endforeach; ?>

</div>
</div>
	<?php include('footer.php'); ?>

</html>