<?php require_once "../partials/template.php";
function get_page_content(){
    if (!isset($_SESSION['user']) || isset($_SESSION['user']) && $_SESSION['user']['roles_id'] == 2) {
    global $conn;   ?>
	<div class="container main-container my-4">
        <div class="row">
            <div class="col-sm-12">
                <h1 class="text-center mb-3">Confirmation Page</h1>

                <h3>Reference No.: <?php echo $_SESSION['new_txn_number']; ?></h3>
                <?php unset($_SESSION['new_txn_number']); ?>

                <p>Thank you for shopping! Your order is being processed.</p>

                <a class="btn btn-primary" href="./catalog.php">Continue Shopping</a>
            </div>
        </div>
    </div>

<?php } else {
    header("Location: ./error.php");
} ?>
        

<?php } ?>