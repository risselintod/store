<?php require_once '../partials/template.php'; ?>

<?php function get_page_content() { 
	if (isset($_SESSION['user']) && $_SESSION['user']['roles_id'] == 1) {
	global $conn ?>

	<div class="container orderAdminPage mt-5 p-5">
		<h4 class="text-center"> Orders Admin Page </h4>
		<div class="row">
			<div class="col-sm-8 offset-sm-2">
				<table class="table responsive">
					<thead>
						<th> Transaction Code </th>
						<th> Status </th>
						<th colspan="2" class="text-center"> Actions </th>
					</thead>
					<tbody>
						<?php 
							$orderQuery = "SELECT o.id, o.transaction_code, o.status_id, s.name AS status FROM orders o JOIN statuses s ON (o.status_id = s.id);";
							$orders = mysqli_query($conn, $orderQuery);
							foreach($orders as $order) {
						?>
						<tr>
							<td> <?php echo $order['transaction_code']; ?> </td>
							<td> <?php echo $order['status']; ?> </td>
							<td colspan="2">
								<?php 
									if ($order['status'] == "pending") { ?>

										<a href="../controllers/completeOrder.php?id=<?php echo $order['id']; ?>" class="btn btn-success"> Complete Order </a>
										<a href="../controllers/cancelOrder.php?id=<?php echo $order['id']; ?>" class="btn btn-primary"> Cancel Order </a>

									<?php } ?>
							</td>
						</tr>
						<?php } ?>
					</tbody>
				</table> <!-- end table -->
			</div> <!-- end column -->
		</div> <!-- end row -->
	</div> <!-- end container -->



<?php } else {
	header("Location: ./error.php");
} ?>

<?php }; ?>