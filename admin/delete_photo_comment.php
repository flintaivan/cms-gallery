<?php include("includes/init.php"); ?>
<?php if(!$session->is_signed_in()) {redirect("login.php");} ?>

<?php 


        if(empty($_GET['id'])) {

        redirect("photo_comment.php");
        }

$comment = Comment::find_by_id($_GET['id']);

        if($comment) {

        $comment->delete();
        redirect("photo_comment.php?id={$comment->photo_id}");

        } else {

        redirect("photo_comment.php?id={$comment->photo_id}");
        }



/*
$photo = new Photo();

$photo->find_by_id($_GET['id']);
$photo->delete();
*/

?>