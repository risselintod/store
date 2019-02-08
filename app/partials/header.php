	<nav class="navbar navbar-expand-lg navbar-dark">
		<a class="navbar-brand" href="home.php">
			<i class="far fa-hand-peace"></i> Fret Store
		</a>

		<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbar-nav">
			<span class="navbar-toggler-icon"></span>
		</button>

		<div id="navbar-nav" class="collapse navbar-collapse">
			<ul class="navbar-nav ml-auto">
				<?php if (!isset($_SESSION['user']) || (isset($_SESSION['user']) && ($_SESSION['user']['roles_id'] ==2))) { ?>
					
				<li class="nav-item">
					<a class="nav-link" href="./home.php"> 🏠 Home </a>
				</li>
				<li class="nav-item">
					<a class="nav-link" href="../views/catalog.php"> Catalog </a>
				</li>
				<li class="nav-item">
					<a class="nav-link" href="./cart.php"><span class="badge bg-light text-dark" id="cartCount">
						<?php
							if (isset($_SESSION['cart'])) {
								echo array_sum($_SESSION['cart']);
							} else {
								echo 0;
							}
						?>
					</span></a>
				</li>
			<?php } elseif(isset($_SESSION['user']) && ($_SESSION['user']['roles_id']==1)) { ?>

				<li class="nav-item">
					<a class="nav-link" href="./items.php"> Items </a>
				</li>
				<li class="nav-item">
					<a class="nav-link" href="./orders.php"> Orders </a>
				</li>
				<li class="nav-item">
					<a class="nav-link" href="./users.php"> Users </a>
				</li>


			<?php } ?>

			<?php if(isset($_SESSION['user'])) { ?>

				<li class="nav-item">
					<a class="nav-link" href="./profile.php"> Welcome, <?php echo $_SESSION['user']['firstname']; ?> </a>
				</li>
				<li class="nav-item">
					<a class="nav-link" href="../controllers/logout.php"> Logout </a>
				</li>

			<?php } else { ?>
				
				<li class="nav-item">
					<a class="nav-link" href="./login.php"> Login </a>
				</li>
				<li class="nav-item">
					<a class="nav-link" href="./register.php"> Register </a>
				</li>

			<?php } ?>

			</ul>
		</div> <!-- end navbar nav -->
	</nav> <!-- end nav -->