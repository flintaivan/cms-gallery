<?php include("includes/header.php"); ?>
<?php if(!$session->is_signed_in()) {redirect("login.php");} ?>

        <!-- Navigation -->
        <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
            <!-- Brand and toggle get grouped for better mobile display -->
            
            
<?php include("includes/top_nav.php"); ?>
            
            
            
            <!-- Sidebar Menu Items - These collapse to the responsive navigation menu on small screens -->
            
<?php include("includes/side_nav.php"); ?>
            
            <!-- /.navbar-collapse -->
        </nav>
        
<?php 


if(empty($_GET['id'])) {
    redirect('photos.php');
}

$comments = Comment::find_the_comments($_GET['id']);
$photo = Photo::find_by_id($_GET['id']);



?>      
        
        
        
        
        
        
        

        <div id="page-wrapper">
        
        <div class="container-fluid">

                <!-- Page Heading -->
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">
                            Comments
                            <small>Subheading</small>
                        </h1>
                        <div class="col-md-4">
                            
                            <div class="form-group">
                                <a class="thumbnail" href="#">
                                    <img src="<?php echo $photo->picture_path(); ?>">
                                </a>
                            </div>
                        </div>
                        <div class="col-md-8">
                            <table class="table table-hover">
                                <thead>
                                    <tr>
                                        <th>Id</th>
                                        <th>Author</th>
                                        <th>Body</th>
                                    </tr>
                                </thead>
                                <tbody>

                        <?php foreach($comments as $comment) : ?>
                                    <tr>
                                        <td><?php echo $comment->id; ?></td>
                                        <td><?php echo $comment->author; ?>
                                            <div class="actions_links">
                                                <a href="delete_photo_comment.php?id=<?php echo $comment->id; ?>">Delete</a>
                                        </td>
                                        <td><?php echo $comment->body; ?></td>
                                    </tr>
                        <?php endforeach; ?>
                                </tbody>
                            </table> <!-- end of table -->
                        </div>



                    </div>
                </div>
                <!-- /.row -->

            </div>
            <!-- /.container-fluid -->

        </div>
        <!-- /#page-wrapper -->

  <?php include("includes/footer.php"); ?>