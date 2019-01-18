<?php require_once '../partials/template.php'; ?>

<?php function get_page_content() {
	global $conn;	?>

	<div class="container">
		<div class="jumbotron bg-dark mt-3 px-5 text-center text-white">
			<h1> Register </h1>
		</div> <!-- end jumbotron -->
		<form>
			<div class="row">
				<div class="col-md-6">
					<div class="form-group">
						<label for="firstname"> First Name: </label>
						<input id="firstname" type="text" name="firstname" class="form-control" placeholder="Enter first name">
						<span class="validation"></span>
					</div>
					<div class="form-group">
						<label for="lastname"> Last Name: </label>
						<input id="lastname" type="text" name="lastname" class="form-control" placeholder="Enter last name">
						<span class="validation"></span>
					</div>
					<div class="form-group">
						<label for="email"> Email: </label>
						<input id="email" type="email" name="email" class="form-control" placeholder="Enter email address">
						<span class="validation"></span>
					</div>
					<div class="form-group">
						<label for="address"> Address: </label>
						<input id="address" type="text" name="address" class="form-control" placeholder="Enter home address">
						<span class="validation"></span>
					</div>
				</div>
				<div class="col-md-6">
					<div class="form-group">
						<label for="username"> Username: </label>
						<input id="username" type="text" name="username" class="form-control" placeholder="Enter username">
						<span class="validation"></span>
					</div>
					<div class="form-group">
						<label for="password"> Password: </label>
						<input id="password" type="password" name="password" class="form-control" placeholder="Enter password">
						<span class="validation"></span>
					</div>
					<div class="form-group">
						<label for="confirmPassword"> Confirm Password: </label>
						<input id="confirmPassword" type="password" name="password" class="form-control" placeholder="Confirm password">
						<span class="validation"></span>
					</div>
				</div>	
			</div> <!-- end of row -->
			
		</form>
		<div class="text-center py-4 mb-5">
			<a href="./login.php" class="btn btn-secondary"> Login </a>
			<button id="addUser" type="button" class="btn btn-primary"> Register </button>
		</div>
		
	</div> <!-- end container-fluid -->

<?php }; ?>