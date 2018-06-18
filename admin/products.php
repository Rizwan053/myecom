<?php include('includes/admin_header.php') ?>
<?php 

$products = Product::find_all();

//////DELETE/////
if(isset($_POST['delete'])){
    $id = $_POST['id'];
    $image = $_POST['image'];
    $pro = new Product();
    $pro->delete($id);
    unlink('images/' . $image);
    echo "<script>alert('Product Deleted Succesfully');document.location='products.php'</script>";


}


?>



        <div class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-12">
                        <div class="card">
                            <div class="header">
                            <a class="btn btn-success pull-right" href="add_product.php">Add New Product</a>
                                <h4 class="title">Products</h4>
                                <p class="category">Products Available to this Application</p>
                            </div>
                            <div class="content table-responsive table-full-width">
<?php if($products):?>
                                <table class="table table-striped">
                                    <thead>
                                        <th>ID</th>
                                        <th>Category ID</th>
                                        <th>Image</th>
                                        <th>Name</th>
                                        <th>Price</th>
                                        <th>Quantity</th>
                                        <th>Description</th>
                                        <th>Edit</th>
                                        <th>Delete</th>
                                    	
                                    </thead>
                                    <tbody>
<?php while($product = $products->fetch_object()):?>
                                       <tr>
                                        	<td><?php echo $product->id?></td>
                                        	<td><?php echo $product->category_id?></td>
                                        	<td><img width=50 height=50 src="images/<?php echo $product->image ?>" class="img-thubnail"></td>
                                        	<td><?php echo $product->name ?></td>
                                        	<td><?php echo $product->price?></td>
                                        	<td><?php echo $product->quantity?></td>
                                        	<td><?php echo $product->description?></td>
                                        	<td><a class="btn btn-info" href="edit_product.php?id=<?php echo $product->id ?>">Edit</a></td>
                                        	<td>
                                            <form action="" method="POST">
                                                <div class="form-group"><input type="hidden" name="id" value="<?php echo $product->id ?>" class="btn btn-danger"></div>
                                                <div class="form-group"><input type="hidden" name="image" value="<?php echo $product->image ?>" class="btn btn-danger"></div>
                                                <div class="form-group"><input type="submit" name="delete" value="Delete" class="btn btn-danger"></div>
                                            </form>

                                            </td>
                                        	
                                        </tr>
<?php endwhile ?>
                                    </tbody>
                                </table>
<?php endif?>
                            </div>
                        </div>
                    </div>




                </div>
            </div>
        </div>
<?php include('includes/admin_footer.php') ?>

