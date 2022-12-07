<?php include("includes/header.php"); ?>
<?php if(!$session->is_signed_in()) {redirect("login.php");} ?>

<?php include("includes/photo_library_modal.php"); ?>

<?php 


$message = "";
if(empty($_GET['id'])) {
    redirect("users.php");
} 

$user = User::find_by_id($_GET['id']);

if(isset($_POST['update'])) {

if($user) {
    $user->username   = $_POST['username']; 
    $user->first_name = $_POST['first_name'];
    $user->last_name  = $_POST['last_name'];

    if(empty($_POST['password'])) {
        $user->password = $user->password;
    } else {
        $user->password = $_POST['password'];
    }

    $user->set_file($_FILES['user_image']);

    $user->save_user_and_image();

    }

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
                            Upload
                            <small>Subheading</small>
                        </h1>

                        
                        <div class="col-md-6">
                            
                            <a href="#" data-toggle="modal" data-target="#photo-library">
                            <img class="img-responsive" src="<?php echo $user->image_path_and_placeholder(); ?>">
                        </a>

                        </div>

                            <?php echo $message; ?>
                            <form action="" method="post" enctype="multipart/form-data">

                                <div class="col-md-6">

                                <div class="form-group">
                                    <label for="caption">Image</label>
                                    <br>
                                    
                                    <input type="file" name="user_image">
                                </div>

                                <div class="form-group">
                                    <label for="first name">First Name</label>
                                    <input class="form-control" type="text" name="first_name" value="<?php echo $user->first_name; ?>">
                                </div>

                                <div class="form-group">
                                    <label for="last name">Last Name</label>
                                    <input class="form-control" type="text" name="last_name" value="<?php echo $user->last_name; ?>">
                                </div>

                                <div class="form-group">
                                    <label for="username">Username</label>
                                    <input class="form-control" type="text" name="username" value="<?php echo $user->username; ?>">
                                </div>

                                <div class="form-group">
                                    <label for="password">Password</label>
                                    <input class="form-control" type="password" name="password">
                                </div>

                                <div class="form-group">
                                    <a id="user-id" href="delete_user.php?id=<?php echo $user->id; ?>" class="btn btn-danger btn-md pull-left">Delete</a>
                                </div>

                                <div class="form-group">
                                    <input type="submit" name="update" value="Update" class="btn btn-primary btn-md pull-right">
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