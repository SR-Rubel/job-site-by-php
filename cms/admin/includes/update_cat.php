<form action="" method="post">
<div class="form-group">
<label for="cat-title">Edit Category</label>
        <?php
                $query="SELECT * FROM categories WHERE cat_id=$cat_id";
                $edit_cat_query=mysqli_query($connection,$query);
                while($row=mysqli_fetch_assoc($edit_cat_query)){
                    $cat_title=$row['cat_title'];
                    ?>
                        <input value="<?php echo $cat_title; ?>" type="text" class="form-control" name="cat_title">
                    <?php
                }
                if(isset($_POST['update_category'])){
                    $cat_title=$_POST['cat_title'];
                    $query="UPDATE categories SET cat_title='$cat_title' WHERE cat_id='$cat_id'";
                    mysqli_query($connection,$query);
                    header("Location: categories.php");
                }
        ?>

</div>
<div class="form-group">
<input class="btn btn-primary" type="submit" name="update_category" value="Update Category">
</div>
</form>