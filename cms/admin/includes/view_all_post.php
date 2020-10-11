<form method='post' action=''>
<table class="table mt-5 table-hover sadow">


   <div class='bluck'>
    <div id="bluckOptionContainer" class="col-xs-4">
            <select name="bulk_options" id="" class="form-control">
                <option value="">select option</option>
                <option value="published">Publish</option>
                <option value="draft">Draft</option>
                <option value="delete">Delete</option>
            </select>
        </div>

        <div class="col-xs-8">
            <input type="submit" name="submit" class="btn btn-success" value="Apply">
            <a class="btn btn-primary" href="./posts.php?source=add_post">Add New</a>
        </div>
   </div>


<?php 
    if(isset($_POST['checkBoxArray'])){
        foreach($_POST['checkBoxArray'] as $post_id){
            $bulk_options=$_POST['bulk_options'];
            switch($bulk_options){

                case 'published':
                $query="UPDATE post SET post_status='$bulk_options' WHERE post_id=$post_id";
                $update_query=mysqli_query($connection,$query);
                confirmQuery($update_query);
                break;

                case 'draft':
                $query="UPDATE post SET post_status='$bulk_options' WHERE post_id=$post_id";
                $update_query=mysqli_query($connection,$query);
                confirmQuery($update_query);
                break;

                case 'delete':
                $query="DELETE FROM post WHERE post_id=$post_id";
                $delete_query=mysqli_query($connection,$query);
                confirmQuery($delete_query);
                break;
            }
        }
    }
?>


    <thead>
        <tr>
            <th><input type="checkbox" id="selectAllBoxes"></th>
            <th>Id</th>
            <th>Author</th>
            <th>Title</th>
            <th>Category</th>
            <th>Status</th>
            <th>Image</th>
            <th>Tags</th>
            <th>Comments</th>
            <th>Date</th>
            <th>Edit</th>
            <th>View</th>
            <th>Delete</th>
        </tr>
    </thead>
    <tbody>
        <?php
        $query="SELECT * FROM post";
        $all_post_query=mysqli_query($connection,$query);
        while($row=mysqli_fetch_assoc($all_post_query)){
        $post_id=$row['post_id'];
        $post_author=$row['post_author'];
        $post_title=$row['post_title'];
        $post_category_id=$row['post_category_id'];
        $post_status=$row['post_status'];
        $post_image=$row['post_image'];
        $post_tags=$row['post_tags'];
        $post_comment_count=$row['post_comment_count'];
        $post_date=$row['post_date'];

        $query="SELECT * FROM categories WHERE cat_id=$post_category_id";
        $select_all_cat_query=mysqli_query($connection,$query);
        while($row=mysqli_fetch_assoc($select_all_cat_query)){
        $cat_title=$row['cat_title'];
        }

        echo "<tr>
        <td><input class='chekBoxes' type='checkbox' id='selectAllBoxes' name='checkBoxArray[]' value='$post_id'></td>
        <td>$post_id</td>
        <td>$post_author</td>
        <td>$post_title</td>
        <td>$cat_title</td>
        <td>$post_status</td>
        <td><img src='../images/$post_image' alt='this is post image' class='img-reponsive' width='100'></td>
        <td>$post_tags</td>
        <td>$post_comment_count</td>
        <td>$post_date</td>
        <td><a class='btn btn-danger' href='posts.php?delete={$post_id}'><i class='fa fa-trash-o fa-lg'></i>DELETE<a/></td>
        <td><a href='../post.php?p_id={$post_id}'>VIEW POST<a/></td>
        <td><a class='btn btn-primary' href='posts.php?source=edit_post&p_id={$post_id}'><i class='fa fa-pencil fa-lg'></i>EDIT POST<a/></td>
        </tr>";
        }
        ?>
        <?php ?>
    </tbody>
</table>
</form>

<?php 
    if(isset($_GET['delete'])){
        $delete_id=$_GET['delete'];
        $query="DELETE FROM post WHERE post_id=$delete_id";
        $delete_query=mysqli_query($connection,$query);
        confirmQuery($delete_query);
        header("location: ./posts.php");
    }
?>