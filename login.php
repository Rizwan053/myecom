<?php require_once('includes/front_header.php') ?>
<?php
if(isset($_POST['login'])){
$input = [
    'name'=>$_POST['name'],
    'password'=>$_POST['password']
];

$user = new User();
$output = $user->login($input);
if($output){
		$_SESSION['name'] = $input['name'];
		$_SESSION['password'] = $input['password'];
        echo "<script>document.location='/admin'</script>";

}else{
        echo "<script>alert('Username Or Password is Incorrect');document.location='/login.php'</script>";
}



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
                            <h3 class="text-danger">Login Page</h3>
                            <div class="form-group">Username:<input type="text" name="name" class="form-control" required></div>
                            <div class="form-group">Password:<input type="password" name="password" class="form-control" required></div>
                            <div class="form-group"><input type="submit" name="login" value="Login"class="btn btn-danger"></div>
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