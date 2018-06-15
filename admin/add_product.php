<?php include('includes/admin_header.php') ?>
<?php 


if(isset($_POST['submit'])){

    $tmp_name = $_FILES['image']['tmp_name'];
    $directory = 'images';
    $file_name = $_FILES['image']['name'];
    $input=[
        $_POST['category_id'],
        $_POST['name'],
        $_POST['description'],
        $_FILES['image']['name'],
        $_POST['price'],
        $_POST['quantity'],
    ];

    move_uploaded_file($tmp_name, $directory.'/'.$file_name);


$product = Product::create($input);

    echo "<script>alert('Product Added Succesfully');document.location='products.php'</script>";

}



?>



        <div class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-12">
                        <div class="card">
                            <div class="header">
                                <h4 class="title">Products</h4>
                                <p class="category">Products Available to this Application</p>
                            </div>
                            <div class="content table-responsive ">
<form action="" method="POST" enctype="multipart/form-data">
    <div class="form-group">Name:<input type="text" name="name" class="form-control"></div>

    <div class="form-group">Category:
    <select name="category_id" class="form-control" id="">
    <option value="">Choose Option...</option>
 <?php    $category = Category::find_all();  ?>
 <?php    while($cat = $category->fetch_object()) :  ?>
<option value="<?php echo $cat->id?>"><?php echo $cat->name?></option>
<?php endwhile; ?>

    </select>
    
    </div>
    <div class="form-group">Image:<input type="file" name="image" class="form-control"></div>
    <div class="form-group">Price<input type="number" name="price" class="form-control"></div>
    <div class="form-group">Quantity<input type="number" name="quantity" class="form-control"></div>
    <div class="form-group">Description <textarea name="description" class="form-control" id="" cols="30" rows="10"></textarea>
    <div class="form-group"><input type="submit" name="submit" value="Add Category"  class="btn btn-success"></div>
</form>
                            </div>
                        </div>
                    </div>




                </div>
            </div>
        </div>
<?php include('includes/admin_footer.php') ?>

