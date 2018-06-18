<?php include('includes/front_header.php') ?>
<?php 

if (isset($_POST['order'])) {
	$input = [
		$_POST['product_id'],
		$_POST['user_id'],
		time(),

	];
	$order = new Order();
	$order->create($input);
	unset($_SESSION['cart']);
	header('location:/index.php');
}

if(isset($_SESSION['name'])){
$result = $db->query("SELECT * FROM users WHERE password='{$_SESSION['password']}'");
}


	if (isset($_POST['update'])) {
	$input = [
		$_POST['name'],
		$_POST['address'],
		$_POST['password'],
		$_POST['pincode'],
		$_POST['mobile'],

	];
	$obj = $result->fetch_object();
	$user = new User();
	$user->update($input, $obj->id);
	header('location:/checkout.php');

}






?>


		<!-- BREADCRUMB -->
		<div id="breadcrumb" class="section">
			<!-- container -->
			<div class="container">
				<!-- row -->
				<div class="row">
					<div class="col-md-12">
						<h3 class="breadcrumb-header">Checkout</h3>
						<ul class="breadcrumb-tree">
							<li><a href="#">Home</a></li>
							<li class="active">Checkout</li>
						</ul>
					</div>
				</div>
				<!-- /row -->
			</div>
			<!-- /container -->
		</div>
		<!-- /BREADCRUMB -->

		<!-- SECTION -->
		<div class="section">
			<!-- container -->
			<div class="container">
				<!-- row -->
				<div class="row">

					<div class="col-md-7">

<?php if(isset($_SESSION['name'])):?>
						<!-- Billing Details -->
						<div class="billing-details">
							<div class="section-title">
								<h3 class="title">Billing address</h3>
							</div>
							<form action="" method="POST">
<?php while($user = $result->fetch_object()): ?>


				    <div class="form-group">Username:<input type="text" name="name" class="form-control"  value="<?php echo $user->name?>" required></div>
                            <div class="form-group">Address:<input type="text" name="address" class="form-control"  value="<?php echo $user->address ?>" required></div>
                            <div class="form-group">Area Pincode:<input type="number" name="pincode" class="form-control"  value="<?php echo $user->pincode ?>" required></div>
							<div class="form-group">Mobile Phone Number:<input type="number" name="mobile" class="form-control" value="<?php echo $user->mobile ?>" required></div>
                            <div class="form-group"><input type="hidden" name="password" class="form-control" value="<?php echo $user->password?>" required></div>							
                            <div class="form-group"><input type="submit" name="update" value="Update" class="btn btn-danger" required></div>
<?php endwhile;?>
							</form>

				
							</div>
<?php else: ?>
<a class=" btn btn-info " href="/login.php">Login To Checkout </a>

<?php endif ?>
						</div>
				
<?php 


?>
					<!-- Order Details -->
					<div class="col-md-5 order-details">
<?php if (isset($_SESSION['cart'])) : ?>
<?php $total = 0; 
	  $id;
?>

						<div class="section-title text-center">
							<h3 class="title">Your Order</h3>
						</div>
	
						<div class="order-summary">
							<div class="order-col">
								<div><strong>PRODUCT</strong></div>
								<div><strong>TOTAL</strong></div>
								<div><strong>Place</strong></div>
							</div>
							<div class="order-products">
<?php foreach($_SESSION['cart'] as $id =>$qty): ?>
<?php $result = $db->query("SELECT * FROM products WHERE id=$id")?>
<?php while($pro = $result->fetch_object()):?> 
<?php
$cost = $pro->price * $qty; //work out the line cost
$total = $total + $cost; //add to the total cost
$id = $pro->id;
?>
								<div class="order-col">
									<div><?php echo $qty?>x <?php echo $pro->name?><?php ?></div>
									<div><?php echo $pro->price ?></div>
									<div>
										<?php 
										if(isset($_SESSION['name'])):?> 
											
										
										<form action="" method="POST" class="">
														<input type="hidden" name="product_id" value="<?php echo  $id ?>">
														<input type="hidden" name="user_id" value="<?php echo isset($_SESSION['name']) ? $_SESSION['name']: ''?>">
														<input type="submit" name="order" value="Place order" class=" btn btn-danger">
														</form>

										<?php else:?>
<a class=" btn btn-info " href="/login.php">Login To Checkout </a>

										<?php endif;?>
									</div>
														
								</div>
<?php endwhile; ?>
<?php endforeach?>
							</div>
							<div class="order-col">
								<div>Shiping</div>
								<div><strong>FREE</strong></div>
							</div>
							<div class="order-col">
								<div><strong>TOTAL</strong></div>
								<div><strong class="order-total">Rs <?php echo number_format($total)?></strong></div>
							</div>
						</div>
						<div class="payment-method">
							<div class="input-radio">
								<input type="radio" name="payment" id="payment-1">
								<label for="payment-1">
									<span></span>
									COD
								</label>
								<div class="caption">
									<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>
								</div>
							</div>
					
						
						</div>
						<div class="input-checkbox">
							<input type="checkbox" id="terms">
							<label for="terms">
								<span></span>
								I've read and accept the <a href="#">terms & conditions</a>
							</label>
						</div>

						
						<a href="#" ></a>
<?php endif;?>
					</div>
					<!-- /Order Details -->
				</div>
				<!-- /row -->
			</div>
			<!-- /container -->
		</div>
		<!-- /SECTION -->

<?php include('includes/front_footer.php') ?>
	