<?php require_once '../partials/template.php'; ?>
<?php function get_page_content() {
	if (isset($_SESSION['user']) && $_SESSION['user']['roles_id'] == 1) {
	global $conn;	?>


	<div class="container">
		<div class="row">
			<div class="col-sm-8 offset-sm-2">
				<form action="../controllers/processAddItem.php" method="POST" enctype="multipart/form-data">
					<div class="form-group mt-3">
						<label for="name"> Name: </label>
						<input type="text" name="name" class="form-control" id="name" required>
					</div>
					<div class="form-group">
						<label for="price"> Price: </label>
						<input type="number" name="price" class="form-control" min="1" id="price" required>
					</div>
					<div class="form-group">
						<label for="description"> Description </label>
						<textarea type="text" name="description" class="form-control col-8" rows="5" id="descripton" required> </textarea>
					</div>
					<div class="form-group">
						<label for="categories"> Category: </label>
						<select name="category_id" id="categories" class="form-control col-8" required>
							<?php 
								$sql = "SELECT * FROM categories";
								$categories = mysqli_query($conn, $sql);
								foreach($categories as $category) {
									// extract is another way of getting data. it transform the columns into variables.
									extract($category);
									echo "<option value='$id'> $name </option>";
								}
							?>
						</select>
					</div>
					<div class="form-group">
						<label for="image"> Image: </label>
						<input type="file" id="image" name="image" class="form-control" required>
					</div>
					<button type="submit" class="btn btn-block btn-primary"> Add New Item </button>
				</form>
			</div>
		</div>
	</div>


<?php } else {
	header("Location: ./error.php");
} ?>
		

<?php } ?>