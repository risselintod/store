$(document).ready( () => {
	function validate_registration_form(){
		let errors = 0;
		let username = $("#username").val();
		let password = $("#password").val();
		let firstname = $("#firstname").val();
		let lastname = $("#lastname").val();
		let email = $("#email").val();
		let address = $("#address").val();

		//username should be greater than or equal to 6 chars
		if(username.length < 6){
			$("#username").next().css("color", "red");
			$("#username").next().html("Username should be atleast 6 characters");
			errors++;
		} else{
			$("#username").next().html(" ");
		}

		//password should be atleast 8
		if(password.length < 6){
			$("#password").next().css("color", "red");
			$("#password").next().html("Please provide a stronger password");
			errors++;
		} else {
			$("#password").next().html(" ");
		}

		//email
		if(!email.includes("@")){
			$("#email").next().css("color", "red");
			$("#email").next().html("Please provide a valid email");
			errors++;
		} else{
			$("#email").next().html(" ");
		}

		//address
		if(!address != ""){
			$("#address").next().css("color", "red");
			$("#address").next().html("Please provide a valid address");
			errors++;
		} else{
			$("#address").next().html(" ");
		}

		//firstname
		if(!firstname != ""){
			$("#firstname").next().css("color", "red");
			$("#firstname").next().html("Please provide a valid name");
			errors++;
		} else{
			$("#firstname").next().html(" ");
		}	

		//lastname
		if(!lastname != ""){
			$("#lastname").next().css("color", "red");
			$("#lastname").next().html("Please provide a valid name");
			errors++;
		} else{
			$("#lastname").next().html(" ");
		}	

		//confirm password
		if(password !== $("#confirmPassword").val()){
			$("#confirmPassword").next().css("color", "red");
			$("#confirmPassword").next().html("Passwords should match");
			errors++;
		} else{
			$("#confirmPassword").next().html(" ");
		}	


		if(errors > 0){
			return false; //this means thre are erros
		} else {
			return true;
		}
	}
	$("#addUser").click( (e) => {
		if(validate_registration_form()){
			let username = $("#username").val();
			let password = $("#password").val();
			let firstname = $("#firstname").val();
			let lastname = $("#lastname").val();
			let email = $("#email").val();
			let address = $("#address").val();

			$.ajax({
			"url" : '../controllers/createUser.php',
			"method" : "POST",
			"data" : {
			'username' :username,
			'password' :password,
			'firstname' :firstname,
			'lastname' :lastname,
			'email' :email,
			'address' :address
			},
			"success":(data) => {
			if(data == "user exists"){
				$("#username").next().css("color", "red");
				$("#username").next().html("Username already exists");
			} else {
					alert("user created successfully");
						//redirect broswer
						window.location.replace("../../index.php")
					}
				}
			});

		}
	});

		//login and session
		$("#login").click( (e) => {
			let username = $("#username").val();
			let password = $("#password").val();

			$.ajax({

				"url": "../controllers/authenticate.php",
				"method": "POST",
				"data": {
					'username':username,
					'password':password
				},
				"success" : (data) => {
					if (data == "login failed") {
						$("#username").next().html("Please provide correct credentials")
					} else {
						window.location.replace("../views/home.php")
					}
				}
			})
		});

		//prep for add to cart
		$(document).on('click', '.add-to-cart', (e) => {
			//to prevent dafault behavior and tp override it with our own
			e.preventDefault();
			//prevent parent elements to be triggered
			e.stopPropagation();
			// target is the one who triggered event
			let item_id = $(e.target).attr("data-id");
			let item_quantity = parseInt($(e.target).prev().val());

			$.ajax({
				"url": "../controllers/updateCart.php",
				"method": "POST",
				"data": {
					'item_id':item_id,
					'item_quantity':item_quantity,
					'update_from_cart_page': 0
				},
				"success": (data) => {
					$("#cartCount").html(data);
				}
			});

		});
			function getTotal() {
				let total = 0;
				$(".item_subtotal").each(function(e) {
					total += parseFloat($(this).html());
				});
				$("#total_price").html(total.toFixed(2));
			}

			// edit cart
			$(".item_quantity>input").on("input", (e) => {
				// alert('hello');
				let item_id = $(e.target).attr('data-id');
				let quantity = parseInt($(e.target).val());
				let price = parseFloat($(e.target).parents('tr').find(".item_price").html());

				let subTotal = quantity * price;
				$(e.target).parents('tr').find('.item_subtotal').html(subTotal.toFixed(2));

				getTotal();

				$.ajax({
					"method": "POST",
					"url": "../controllers/updateCart.php",
					"data": {
						'item_id': item_id,
						'item_quantity': quantity,
						'update_from_cart_page':1
					},
					"success": (data) => {
						$("#cartCount").html(data);
					}
				});

		});

		// DELETE BUTTON

		$(document).on("click", '.item_remove', (e) => {
			e.preventDefault();
			e.stopPropagation();

			let item_id = $(e.target).attr('data-id');
			
			$.ajax({
				"method": "POST",
				"url": "../controllers/updateCart.php",
				"data": {
					'item_id': item_id,
					'item_quantity': 0
				},
				"beforeSend": () => {
					return confirm("Are you sure you want to delete?");
				},
				"success": (data) => {
					$(e.target).parents('tr').remove();
					$("#cartCount").html(data);
					getTotal();
					window.location.replace("../views/cart.php");
				}
			})
		});


		// Submit profile from update
		$('#updateInfo').click(() => {
			alert('hello');
			$('#updateUserDetails').submit();
		});












});