<?php
    if(isset($_GET['p_id'])){
        $post_id=$_GET['p_id'];
    }
     $select_query="SELECT * FROM post WHERE post_id=$post_id";
     $edit_query=mysqli_query($connection,$select_query);
     while($row=mysqli_fetch_assoc($edit_query)){
     $post_id=$row['post_id'];
     $post_author=$row['post_author'];
     $post_title=$row['post_title'];
     $post_category_id=$row['post_category_id'];
     $post_status=$row['post_status'];
     $post_image=$row['post_image'];
     $post_tags=$row['post_tags'];
     $post_comment_count=$row['post_comment_count'];
     $post_date=$row['post_date'];
     $post_content=$row['post_content'];
     }
?>


<form action="" method="post" enctype="multipart/form-data">    


<div class="form-group">
<label for="title">Post Title</label>
<input type="text" class="form-control" name="title" value="<?php echo $post_title;?>">
</div>


<!-- <div class="form-group">
<label for="post_category_id">Post Category Id</label>
<input type="text" class="form-control" name="post_category_id" value="<?php echo $post_category_id;?>">
</div> -->
<div class="form-group">
<label for="category">Category</label>
<select name="post_category" id="">
     <?php
        $query="SELECT * FROM categories";
        $select_all_cat_query=mysqli_query($connection,$query);
        confirmQuery($select_all_cat_query);
        while($row=mysqli_fetch_assoc($select_all_cat_query)){
        $cat_id=$row['cat_id'];
        $cat_title=$row['cat_title'];
        echo "<option value='$cat_id'>$cat_title</option>";
    }
     ?>
</select>

</div> 


<!-- <div class="form-group">
<label for="users">Users</label>
<select name="post_user" id="">




</select>

</div> -->





<div class="form-group">
<label for="title">Post Author</label>
<input type="text" class="form-control" name="author" value="<?php echo $post_author;?>">
</div>

<div class="form-group">
<label for="post_status">Post Status</label>
<input type="text" class="form-control" name="post_status" value="<?php echo $post_status;?>">
</div>

<!-- 
<div class="form-group">
<select name="post_status" id="">
<option value="draft">Post Status</option>
<option value="published">Published</option>
<option value="draft">Draft</option>
</select>
</div> -->



<div class="form-group">
<img src="../images/<?php echo $post_image;?>" alt="" width="100px"><br>
<input  type="file" name="image">
</div>

<div class="form-group">
<label for="post_tags">Post Tags</label>
<input type="text" class="form-control" name="post_tags" value="<?php echo $post_tags;?>">
</div>

<div class="form-group">
<label for="post_content">Post Content</label>
<textarea class="form-control "name="post_content" id="body" cols="30" rows="10">
<?php echo $post_content;?>
</textarea>
</div>



<div class="form-group">
<input class="btn btn-primary" type="submit" name="update" value="update post">
</div>


</form>
<?php
    if(isset($_POST['update'])){
     $post_id=$_GET['p_id'];
     $post_title=$_POST['title'];
     $post_author=$_POST['author'];
     $post_category_id=$_POST['post_category'];
     $post_status=$_POST['post_status'];
     $post_image=$_FILES['image']['name'];
     $post_image_temp=$_FILES['image']['tmp_name'];
     $post_tags=$_POST['post_tags'];
     $post_content=$_POST['post_content'];
     $post_date=date('d-m-y');
     $post_comment_count=4;
     move_uploaded_file($post_image_temp, "../images/$post_image");
     if(empty($post_image)){
         $query="SELECT post_image FROM post WHERE post_id=$post_id";
         $image_query=mysqli_query($connection,$query);
         confirmQuery($image_query);
         while($row=mysqli_fetch_assoc($image_query)){
             $post_image=$row['post_image'];
         }
     }
    
     $query = "UPDATE post SET ";
     $query .="post_title  = '{$post_title}', ";
     $query .="post_category_id = '{$post_category_id}', ";
     $query .="post_date   =  now(), ";
     //$query .="post_user = '{$post_user}', ";
     $query .="post_status = '{$post_status}', ";
     $query .="post_tags   = '{$post_tags}', ";
     $query .="post_content= '{$post_content}', ";
     $query .="post_image  = '{$post_image}' ";
     $query .= "WHERE post_id = {$post_id} ";
    $update_post = mysqli_query($connection,$query);
        
    confirmQuery($update_post);
    
    echo "<p class='bg-success'>Post Updated. <a href='../post.php?p_id={$post_id}'>View Post </a> or <a href='posts.php'>Edit More Posts</a></p>";
    }
?>