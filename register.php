<?php require_once('includes/front_header.php') ?>
<?php 
if(isset($_POST['register'])){
    $input = [
    $_POST['name'],
    $_POST['address'],
    $_POST['password'],
    $_POST['pincode'],
    $_POST['mobile'],


    ];

$user = new User();
$user->create($input);
echo "<script>alert('Register Succesfully! Now Please Login');document.location='/login.php'</script>";

  
}


?>








		<!-- SECTION -->
		<div class="section">
			<!-- container -->
			<div class="container">
				<!-- row -->
				<div class="row">
                    <div class="col-md-6 col-md-offset-3">

                        <form action="" method="POST" class="col-md-12 img-thumbnail">
                            <h3 class="text-danger">User Registration</h3>
                            <div class="form-group">Username:<input type="text" name="name" class="form-control"  required></div>
                            <div class="form-group">Address:<input type="text" name="address" class="form-control" required></div>
                            <div class="form-group">Area Pincode:<input type="number" name="pincode" class="form-control" required></div>
                            <div class="form-group">Mobile Phone Number:<input type="number" name="mobile" class="form-control" required></div>
                            <div class="form-group">Password:<input type="password" name="password" class="form-control" required></div>
                            <div class="form-group"><input type="submit" name="register" value="Sign Up" class="btn btn-danger" required></div>
                        </form>

                    </div>
				</div>
				<!-- /row -->
			</div>
			<!-- /container -->
		</div>
		<!-- /SECTION -->

		<!-- NEWSLETTER -->
		<div id="newsletter" class="section">
			<!-- container -->
			<div class="container">
				<!-- row -->
				<div class="row">
					<div class="col-md-12">
						<div class="newsletter">
							<p>Sign Up for the <strong>NEWSLETTER</strong></p>
							<form>
								<input class="input" type="email" placeholder="Enter Your Email">
								<button class="newsletter-btn"><i class="fa fa-envelope"></i> Subscribe</button>
							</form>
							<ul class="newsletter-follow">
								<li>
									<a href="#"><i class="fa fa-facebook"></i></a>
								</li>
								<li>
									<a href="#"><i class="fa fa-twitter"></i></a>
								</li>
								<li>
									<a href="#"><i class="fa fa-instagram"></i></a>
								</li>
								<li>
									<a href="#"><i class="fa fa-pinterest"></i></a>
								</li>
							</ul>
						</div>
					</div>
				</div>
				<!-- /row -->
			</div>
			<!-- /container -->
		</div>
		<!-- /NEWSLETTER -->
<?php require_once('includes/front_header.php') ?>