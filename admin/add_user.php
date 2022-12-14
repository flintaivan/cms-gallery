<?php include("includes/header.php"); ?>
<?php if(!$session->is_signed_in()) {redirect("login.php");} ?>

<?php 

$user = new User();
$message = "";
if(isset($_POST['submit'])) {
 
        $user->username   = $_POST['username'];
        $user->password   = $_POST['password'];
        $user->first_name = $_POST['first_name'];
        $user->last_name  = $_POST['last_name'];

        $user->set_file($_FILES['user_image']);
        $user->save_user_and_image();
        $user->create();
}
    





?>



        <!-- Navigation -->
        <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
            <!-- Brand and toggle get grouped for better mobile display -->
            
            
<?php include("includes/top_nav.php"); ?>
            
            
            
            <!-- Sidebar Menu Items - These collapse to the responsive navigation menu on small screens -->
            
<?php include("includes/side_nav.php"); ?>
            
            <!-- /.navbar-collapse -->
        </nav>
        
        
        
        
        
        
        

        <div id="page-wrapper">
        
        <div class="container-fluid">

                <!-- Page Heading -->
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">
                            Add User
                            <small>Subheading</small>
                        </h1>

                        <div class="col-md-6 col-md-offset-3">

                            <?php echo $message; ?>
                            <form action="" method="post" enctype="multipart/form-data">

                                <div class="form-group">
                                    <label for="caption">Image</label>
                                    <input type="file" name="user_image">
                                </div>

                                <div class="form-group">
                                    <label for="first name">First Name</label>
                                    <input class="form-control" type="text" name="first_name">
                                </div>

                                <div class="form-group">
                                    <label for="last name">Last Name</label>
                                    <input class="form-control" type="text" name="last_name">
                                </div>

                                <div class="form-group">
                                    <label for="username">Username</label>
                                    <input class="form-control" type="text" name="username">
                                </div>

                                <div class="form-group">
                                    <label for="password">Password</label>
                                    <input class="form-control" type="password" name="password">
                                </div>

                                <div class="form-group">
                                    <input type="submit" name="submit" value="Create" class="btn btn-primary btn-md pull-right">
                                </div>

                            </form>
                        </div>


                        
                    </div>
                </div>
                <!-- /.row -->

            </div>
            <!-- /.container-fluid -->

        </div>
        <!-- /#page-wrapper -->

  <?php include("includes/footer.php"); ?>