<?php 
require_once('includes/front_header.php') ?>
<?php 



?>








		<!-- SECTION -->
		<div class="section">
			<!-- container -->
			<div class="container">
				<!-- row -->
				<div class="row">
                    <div class="col-md-12 ">


<?php if(isset($_SESSION['cart'])):?>
<?php $total=0; ?>

<div class="col-md-12 div">



    <table class="table table-striped">

                    <thead>
                        <th>Product Image</th>
                        <th>Product Name</th>
                        <th>Product Quantity</th>
                        <th>Product Price</th>
                    </thead>



                    <tbody>
<a class="btn btn-danger" href="update-cart.php?action=empty">Delete All </a>
<a class="btn btn-info pull-right" href="/index.php">Continue Shopping </a>

<?php foreach ($_SESSION['cart'] as $product_id => $qty) : ?>
<?php $product = $db->query("SELECT * FROM products WHERE id=$product_id");

if($product):
    while($pro = $product->fetch_object()):
$cost = $pro->price * $qty; //work out the line cost
$total = $total + $cost; //add to the total cost
?>
                        <tr>
                            <td><img width= 100 height= 100 src="admin/images/<?php echo $pro->image ?>" alt=""></td>
                            <td><?php echo $pro->name ?></td>
                            <td>
                            <a class='btn btn-sm  btn-success' href="update-cart.php?action=add&id=<?php echo $pro->id ?>">+</a>   
                            <strong><?php echo $qty ?></strong>
                            <a class='btn  btn-sm btn-danger' href="update-cart.php?action=remove&id=<?php echo $pro->id ?>">-</a> 
                            
                            </td>
                            <td>Rs <?php echo number_format($pro->price) ?></td>
                        </tr>
<?php endwhile; ?>
<?php endif; ?>
<?php endforeach; ?>
                        <tr>
                            <td><h4>Total</h4></td>
                            <td></td>
                            <td></td>
                            <td>Rs <?php echo  number_format($total) ?></td>
                        </tr> 
                    
                        
                  
        </tbody>
    </table>


</div>
                            <td><a class="btn btn-lg btn-success pull-right" href="/checkout.php">Checkout</a></td>

<?php else:?>
<h1 class="text-danger">Cart Doesn't have Any item! You Must Shop First.</h1>
<?php endif;?>
                    </div>
				</div>
				<!-- /row -->
			</div>
			<!-- /container -->
		</div>
		<!-- /SECTION -->

<?php require_once('includes/front_footer.php') ?>