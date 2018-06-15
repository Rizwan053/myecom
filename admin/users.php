<?php include('includes/admin_header.php') ?>
<?php 

$users = User::find_all();


///////Delete//////////
if (isset($_POST['delete'])) {
    $id = $_POST['id'];
    $use = new User();
    $use->delete($id);
    echo "<script>alert('User Deleted Succesfully');document.location='users.php'</script>";

}

?>




        <div class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-12">
                        <div class="card">
                            <div class="header">
                                <h4 class="title">Users</h4>
                                <p class="category">Users Register to this Application</p>
                            </div>
                            <div class="content table-responsive table-full-width">
                                <table class="table table-striped">
                                    <thead>
                                        <th>ID</th>
                                    	<th>Name</th>
                                    	<th>Address</th>
                                    	<th>Pincode</th>
                                    	<th>Mobile</th>
                                    	<th>Delete</th>
                                    </thead>
                                    <tbody>
<?php while ($user = $users->fetch_object()) : ?> 
    
                                        <tr>
                                        	<td><?php echo $user->id?></td>
                                        	<td><?php echo $user->name?></td>
                                        	<td><?php echo $user->address?></td>
                                        	<td><?php echo $user->pincode?></td>
                                        	<td><?php echo $user->mobile?></td>
                                        	<td>
                                                <form action="" method="POST">
                                                <div class="form-group">
                                                <input type="hidden"  name="id" value="<?php echo $user->id; ?>">
                                                <input type="submit" value="Delete" name="delete" class="btn btn-danger">
                                                </div>
                                                </form>
                                            </td>
                                        </tr>
<?php endwhile; ?>                    
                                    </tbody>
                                </table>

                            </div>
                        </div>
                    </div>




                </div>
            </div>
        </div>
<?php include('includes/admin_footer.php') ?>

