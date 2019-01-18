<?php require_once '../partials/template.php'; ?>

<?php function get_page_content() { 
	if (isset($_SESSION['user']) && $_SESSION['user']['roles_id'] == 1) {
	global $conn;	?>


	<div class="container">
		<div class="row">
			<a href="./addItem.php" class="btn btn-success mt-4 p-2"> Add New Item </a>
		</div>
		<?php  

			$sql = "SELECT * FROM items";
			$items = mysqli_query($conn, $sql);

			echo "<div class='row'>";
			foreach($items as $item) {
		?>
			<div class="col-sm-3 py-2">
				<div class="card h-100">
					<img src="<?php echo $item['image_path']; ?>" class="card-img-top" height="250">
					<div class="card-body">
						<h4 class="card-item"> <?php echo $item['name']; ?> </h4>
						<p class="card-text"> <?php echo $item['description']; ?> </p>
						<p class="card-text"> Price: <?php echo $item['price']; ?> </p>
						<input type="hidden" value="<?php echo $item['id']; ?>">
					</div> <!-- end of card-body -->
					<div class="card-footer">
						<a href="./editItem.php?id=<?php echo $item['id']; ?>" class="btn btn-primary"> Edit Item </a>
						<a href="../controllers/processDeleteItem.php?id=<?php echo $item['id']; ?>" class="btn btn-danger"> Delete Item </a>
					</div> <!-- end card-footer -->
				</div> <!-- end card -->
			</div> <!-- end column -->
		<?php } ?>
		</div> <!-- end row -->
	</div> <!-- end container -->




<?php } else {
	header("Location: ./error.php");
} ?>
		

<?php } ?>