<?php include('includes/admin_header.php') ?>
<?php 


if(isset($_GET['id'])){

if(isset($_POST['update'])){

    if($_FILES['image']['tmp_name']){
    $tmp_name = $_FILES['image']['tmp_name'];
    $directory = 'images';
    $file_name = $_FILES['image']['name'];
    $input=[
        // $_POST['id'],
        $_POST['category_id'],
        $_POST['name'],
        $_POST['description'],
        $_FILES['image']['name'],
        $_POST['price'],
        $_POST['quantity'],
    ];

    move_uploaded_file($tmp_name, $directory.'/'.$file_name);
    }
    
    else{
            $input = [
                // $_POST['id'],
                $_POST['category_id'],
                $_POST['name'],
                $_POST['description'],
                $_POST['image2'],
                $_POST['price'],
                $_POST['quantity'],
            ];
    }

$product = new Product();
$product->update($input, $_GET['id']);
    echo "<script>alert('Product Updated Succesfully');document.location='products.php'</script>";

}
} else {
    echo "<script>document.location='products.php'</script>";

}



?>



        <div class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-12">
                        <div class="card">
                            <div class="header">
                                <h4 class="title">Update Products</h4>
                                <p class="category">Products Available to this Application</p>
                            </div>
                            <div class="content table-responsive ">
<?php $product = Product::find_by_id($_GET['id'])?>


<form action="" method="POST" enctype="multipart/form-data">
<?php while($pro = $product->fetch_object()):?>
    <div class="form-group">Name:<input type="text" name="name" class="form-control" value="<?php echo $pro->name  ?>">
    <input type="hidden" name="id" class="form-control" value="<?php echo $pro->id ?>">
    
    </div>
    <div class="form-group">Category:
    <select name="category_id" class="form-control" id="">
<?php $cate = Category::find_by_id($pro->id) ?>

            <?php while ($category = $cate->fetch_object()) : ?>
            <option value="<?php echo $cate->id ?>"><?php echo $category->name  ?></option>
            <?php endwhile; ?>

            <?php    $category = Category::find_all();  ?>
            <?php    while($cat = $category->fetch_object()) :  ?>
            <option value="<?php echo $cat->id?>"><?php echo $cat->name?></option>
            <?php endwhile; ?>

    </select>    
    </div>
    <div class="form-group"><input type="hidden" name="image2" class="form-control" value="<?php echo $pro->image ?>"></div>
    <div class="form-group">Image:<input type="file" name="image" class="form-control" ></div>
    <div class="form-group">Price<input type="number" name="price" class="form-control" value="<?php echo $pro->price ?>"></div>
    <div class="form-group">Quantity<input type="number" name="quantity" class="form-control" value="<?php echo $pro->quantity ?>"></div>
    <div class="form-group">Description <textarea name="description" class="form-control" id="" cols="30" rows="10"><?php echo $pro->description ?></textarea>
    <div class="form-group"><input type="submit" name="update" value="Update Category"  class="btn btn-info"></div>
    <?php endwhile; ?>
    
</form>
                            </div>
                        </div>
                    </div>




                </div>
            </div>
        </div>
<?php include('includes/admin_footer.php') ?>

