<?php require_once '../partials/template.php'; ?>

<?php function get_page_content() {
	if (isset($_SESSION['user']) && $_SESSION['user']['roles_id'] == 2) {
	global $conn;	?>

	<?php 
		if (!isset($_SESSION['user'])) {
			header("Location: ./login.php");
		}
	?>

	<h1 class="mt-3"> Hello, welcome to your checkout page. </h1>
	<form method="POST" action="../controllers/placeOrder.php">
		<div class="container mt-4">
			<div class="row">
				<div class="col-8">
					<h4 class="py-3"> Shipping Address </h4>
					<div class="form-gruop">
						<input type="text" class="form-control" name="addressLine1" value="<?php echo $_SESSION['user']['address']; ?>">
					</div>
				</div> <!-- end column -->
				<div class="col-sm-4">
					<h4 class=" py-3">Payment Methods</h4>
					<select name="payment_mode" id="payment_mode" class="form-control">
						<?php
							$payment_mode_query = "SELECT * FROM payment_modes";
							$payment_modes = mysqli_query($conn, $payment_mode_query);
							foreach ($payment_modes as $payment_mode) {
								extract($payment_mode); //convert columns galing sa db into variables
								echo "<option value='$id'>$name</option>";
							}
						?>
					</select>
				</div><!-- end payment methods -->
			</div>  <!-- end row -->
			<h4 class="mt-4"> Order Summary </h4>
			<div class="row">
				<div class="col-sm-6">
					<p> Total </p>
				</div>
				<div class="col-sm-6">
					<?php 
						$cartTotal = 0;
						foreach ($_SESSION['cart'] as $id => $qty) {
							$sql = "SELECT * FROM items WHERE id = '$id' ";
							$result = mysqli_query($conn, $sql);
							$item = mysqli_fetch_assoc($result);
							$subTotal = $_SESSION['cart'][$id] * $item['price'];
							// $cartTotal = $cartToral + $subTotal
							$cartTotal += $subTotal;
						}
						echo $cartTotal;
					?>
				</div>
			</div> <!-- end row -->
			<hr>
			<button type="submit" class="btn btn-primary btn-block"> Place order now </button>
			<div class="row cart-items mt-4">
				<div class="table-responsive">
					<table class="table table-striped table-bordered text-center" id="cartItems">
						<thead>
							<tr>
								<th colspan="2"> Item Name </th>
								<th> Item Price </th>
								<th> Item Quantity </th>
								<th> Item Subtotal </th>
							</tr>
						</thead>

						<tbody>
							<?php 
								foreach ($_SESSION['cart'] as $id => $qty) {
									$sql2 = "SELECT * FROM items WHERE id = $id ";
									$result = mysqli_query($conn, $sql2);
									$item = mysqli_fetch_assoc($result);
							?>

							<td colspan="2"> <?php echo $item['name']; ?> </td>
							<td> <?php echo $item['price']; ?> </td>
							<td> <?php echo $qty; ?> </td>
							<td> <?php echo $qty * $item['price']; ?></td>
						</tbody>
						<?php } ?>
					</table>
				</div>
			</div>
		</div> <!-- end container -->
	</form>

<?php } else {
	header("Location: ./login.php");
} ?>
		

<?php } ?>