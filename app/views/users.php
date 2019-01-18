<?php require_once '../partials/template.php'; ?>

<?php function get_page_content() { 
	if (isset($_SESSION['user']) && $_SESSION['user']['roles_id'] == 1) {
	global $conn ?>

	<div class="container userPage">
		<h4 class="text-center mt-5 p-4"> User Admin Page </h4>	
		<div class="row">
			<div class="col-sm-8 offset-sm-2">
				<table class="table responsive table-striped">
					<thead>
						<tr>
							<th> User Name </th>
							<th colspan="2"> First Name </th>
							<th colspan="2"> Last Name </th>
							<th> Email </th>
							<th> Role </th>
							<th> Actions </th>
						</tr>
					</thead>
					<tbody>
						<?php 
							$getUserDetailQuery = "SELECT u.id, u.username, u.firstname, u.lastname, u.email, r.name AS role FROM users u JOIN roles r ON (u.roles_id = r.id);";
							$userDetails = mysqli_query($conn, $getUserDetailQuery);
							foreach($userDetails as $indivUser) {
								// var_export($indivUser);
							
						?>
						<tr>
							<td> <?php echo $indivUser['username']; ?> </td>
							<td colspan="2"> <?php echo $indivUser['firstname']; ?> </td>
							<td colspan="2"> <?php echo $indivUser['lastname']; ?> </td>
							<td> <?php echo $indivUser['email']; ?> </td>
							<td> <?php echo $indivUser['role']; ?> </td>
							<td>
								<?php 
									$id = $indivUser['id'];
									if ($indivUser['role'] == "admin") {
										echo "<a href='../controllers/grantAdmin.php?id=$id' class='btn btn-danger btn-block'> Revoke Admin </a>";
									} else {
										echo "<a href='../controllers/grantAdmin.php?id=$id' class='btn btn-primary btn-block'> Make Admin </a>";
									}
								?>
							</td>
						</tr>
					<?php } ?>
					</tbody>
				</table>
			</div>
		</div>
	</div> <!-- end container -->


<?php } else {
	header("Location: ./error.php");
} ?>
		

<?php } ?>