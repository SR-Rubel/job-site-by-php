<?php include "includes/db.php";?>
<?php include "includes/header.php";?>
<?php include "admin/function.php";?>

<!-- navigation -->
    <?php include "includes/navigation.php"; ?>
<!-- navigation -->

    <!-- Page Content -->
    <div class="container">




        <div class="row">

            <!-- Blog Entries Column -->
            <div class="col-md-8">

    <?php
    if(isset($_GET['p_id'])){
        $the_post_id=$_GET['p_id'];
    }
    
    $query="SELECT * FROM post WHERE post_id=$the_post_id";
    $select_all_post_query=mysqli_query($connection,$query);
    while($row=mysqli_fetch_assoc($select_all_post_query)){
        $post_title=$row['post_title'];
        $post_author=$row['post_author'];
        $post_date=$row['post_date'];
        $post_image=$row['post_image'];
        $post_content=$row['post_content'];
    ?>
    
                        
                <!-- First Blog Post -->
                <h2>
                    <a href="#"><?php echo $post_title; ?></a>
                </h2>
                <p class="lead">
                    by <a href="index.php"><?php echo $post_author; ?></a>
                </p>
                <p><span class="glyphicon glyphicon-time"></span> <?php echo $post_date; ?></p>
                <hr>
                <img class="img-responsive" src="images/<?php echo $post_image?>" alt="">
                <hr>
                <p><?php echo $post_content; ?></p>

                <hr>

            <?php  }

                    ?>

                


            </div>





            <!-- Blog Sidebar Widgets Column -->
                <?php include "includes/sidebar.php" ?>
            <!-- Blog Sidebar Widgets Column -->
            

        </div>
        <!-- /.row -->


        
                <!-- Comments Form -->
<?php
    // if(isset($_POST['create_comment'])){
    //     $post_id=$_GET['p_id'];
    //     $comment_author=$_POST['comment_author'];
    //     $comment_email=$_POST['comment_email'];
    //     $comment_content=$_POST['comment_content'];
    //     // if(!empty($comment_author)&& !empty($comment_email)&&!empty($comment_content)){
            
    //     $query="INSERT INTO comments(comment_author,comment_email,comment_content,comment_status,comment_date)VALUES('$comment_author','$comment_email','$comment_content','unapproved',now())";
    // }
?>

        <div class="well sadow2">
            <h4>Leave a Comment:</h4>
            <form role="form" method="post" action="">
                <div class="form-group">
                    <div class="form-group">
                        <label for="">Author</label>
                        <input type="text" class="form-control" name="comment_author">
                    </div>
                    <div class="form-group">
                        <label for="">Email</label>
                        <input type="email" class="form-control" name="comment_email">
                    </div>
                    
                    <textarea class="form-control" rows="3" name="comment_content"></textarea>
                </div>
                <button type="submit" class="btn btn-primary" name="create_comment">Submit</button>
            </form>
        </div>

        <hr>

        <!-- Posted Comments -->
        <?php
            if(isset($_POST['create_comment'])){
                $the_post_id=$_GET['p_id'];
                $comment_author=$_POST['comment_author'];
                $comment_email=$_POST['comment_email'];
                $comment_content=$_POST['comment_content'];
                if(!empty($comment_author)&& !empty($comment_email)&&!empty($comment_content)){

                $query="INSERT INTO comments(comment_post_id,comment_author,comment_email,comment_content,comment_status,comment_date) VALUES($the_post_id,'$comment_author','$comment_email','$comment_content','unapproved',now())";
                $insert_comment_query=mysqli_query($connection,$query);
                confirmQuery($insert_comment_query);

                $query="UPDATE post SET post_comment_count=post_comment_count+1 WHERE post_id=$the_post_id";
                $cmnt_count_query=mysqli_query($connection,$query);
                confirmQuery($cmnt_count_query);
                }
                else{
                    echo "<script> alert('feild should not be empty');</script>";
                }

            }
        ?>



      <?php
            $p_id=$_GET['p_id'];
            $query="SELECT * FROM comments WHERE comment_post_id=$p_id AND comment_status='Approved' ORDER BY comment_id DESC;
            ";
            $all_cmnt_query=mysqli_query($connection,$query);
            while($row=mysqli_fetch_assoc($all_cmnt_query)){
                $author=$row['comment_author'];
                $content=$row['comment_content'];
                $date=$row['comment_date'];
            ?>
            
            <!-- Comment -->
        <div class="media">
            <a class="pull-left" href="#">
                <img class="media-object" src="http://placehold.it/64x64" alt="">
            </a>
            <div class="media-body">
                <h4 class="media-heading"><?php echo $author;?>
                    <small><?php echo $date;?></small>
                </h4>
                <?php echo $content;?>
            </div>
        </div>
            
            <?php

            }
      ?>

        

<?php
include "includes/footer.php";
?>