<?php include('includes/admin_header.php') ?>
<?php 

$users = User::find_all();


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
                                    </thead>
                                    <tbody>
<?php while ($user = $users->fetch_object()) : ?> 
    
                                        <tr>
                                        	<td><?php echo $user->id?></td>
                                        	<td><?php echo $user->name?></td>
                                        	<td><?php echo $user->address?></td>
                                        	<td><?php echo $user->pincode?></td>
                                        	<td><?php echo $user->mobile?></td>
                                        	
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

