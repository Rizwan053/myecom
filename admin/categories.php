<?php include('includes/admin_header.php') ?>
<?php 

$categories = Category::find_all();

///////Create//////////

if(isset($_POST['submit'])){
    $cat = new Category();

    $name = [$_POST['name']];
    $cat->create($name);
        echo "<script>alert('Category Added Succesfully');document.location='categories.php'</script>";
   

}

///////Update//////////

if(isset($_POST['update'])){
    $cat = new Category();
    $id= $_POST['id'];
    $name = [$_POST['name']];
    $cat->update($name,$id);
        echo "<script>alert('Category Updated Succesfully');document.location='categories.php'</script>";
   

}

///////Delete//////////

if(isset($_POST['delete'])){
        $id = $_POST['id'];
        $cat = new Category();
        $cat->cascade_delete($id);
    echo "<script>alert('Category Deleted Succesfully');document.location='categories.php'</script>";
    
}




?>



        <div class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-12">
                        <div class="card">
                            <div class="header">
                            <h4 class="title">Add New Category</h4><br>
                            <form action="" method="POST" class="form-inline img-thumbnail">
                                <div class="form-group"><input type="text" name="name" class="form-control" placeholder="Type Here"></div>
                                <div class="form-group"><input type="submit" name="submit" value="Add" class="btn btn-success"></div>
                            </form>
                            <hr>
                                <h4 class="title">Categories</h4>
                                <p class="category">Categories Available to this Application</p>
                            </div>
                            <div class="content table-responsive">
                                <table class="table table-striped">
                                    <thead>
                                        <th>ID</th>
                                        <th>Name</th>
                                        <th>Edit</th>
                                        <th>Delete</th>
                                    
                                    	
                                    </thead>
                                    <tbody>
<?php while($category = $categories->fetch_object()):?>
                                       <tr>
                                        	<td><?php echo $category->id?></td>
                                        	<td><?php echo $category->name?></td>
                                        	<td>
                                            <form action="" method="POST" class="form-inline img-thumbnail">
                                                <div class="form-group">
                                                        
                                                <input type="text" name="name" value="<?php echo $category->name ?>" class="form-control">
                                                
                                                </div>

                                                <div class="form-group">
                                                
                                                <input type="hidden" name="id" value="<?php echo $category->id ?>">
                                                
                                                </div>

                                                <div class="form-group">
                                                
                                                <input type="submit" name="update" value="Update" class="btn btn-info">
                                                
                                                </div>
                                            </form>
                                            
                                            </td>
                                        	<td> 
                                            <form action="" method="POST">
                                                <div class="form-group">
                                                <input type="hidden"  name="id" value="<?php echo $category->id;?>">
                                                <input type="submit" value="Delete" name="delete" class="btn btn-danger">
                                                </div>
                                            </form>
                                            </td>
                                        
                                        	
                                        </tr>
<?php endwhile ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>




                </div>
            </div>
        </div>
<?php include('includes/admin_footer.php') ?>

