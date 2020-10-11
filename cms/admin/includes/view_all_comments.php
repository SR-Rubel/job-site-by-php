<div style="overflow-x:auto;">
<table class="table table-bordered table-hover">
    <thead>
        <tr>
            <th>Comment_id</th>
            <th>Comment_post_id</th>
            <th>Comment_author</th>
            <th>Comment_email</th>
            <th>Comment_content</th>
            <th>Comment_status</th>
            <th>In Respons To</th>
            <th>Comment_date</th>
            <th>Approve</th>
            <th>Unapprove</th>
            <th>Delete</th>
        </tr>
    </thead>
    <tbody>
        <?php
        $query="SELECT * FROM comments";
        $all_post_query=mysqli_query($connection,$query);
        while($row=mysqli_fetch_assoc($all_post_query)){
        $comment_id=$row['comment_id'];
        $comment_post_id=$row['comment_post_id'];
        $comment_author=$row['comment_author'];
        $comment_email=$row['comment_email'];
        $comment_content=$row['comment_content'];
        $comment_status=$row['comment_status'];
        $comment_date=$row['comment_date'];
        

        

        echo "<tr>";
       echo" <td>$comment_id</td>
        <td>$comment_post_id</td>
        <td>$comment_author</td>
        <td>$comment_email</td>
        <td>$comment_content</td>
        <td>$comment_status</td>";
        $query="SELECT * FROM post WHERE post_id=$comment_post_id";
        $select_all_cat_query=mysqli_query($connection,$query);
        while($row=mysqli_fetch_assoc($select_all_cat_query)){
        $post_id=$row['post_id'];
        $cat_title=$row['post_title'];
        echo "<td><a href='../post.php?p_id=$post_id'>$cat_title</a></td>";
        }
       echo "<td>$comment_date</td>
        <td><a href='./comments.php?approve={$comment_id}'>Approve<a/></td>
        <td><a href='./comments.php?unapprove={$comment_id}'>Unapprove<a/></td>
        <td><a href='./comments.php?delete={$comment_id}'>DELETE<a/></td>
        </tr>";

        }
        ?>
        <?php ?>
    </tbody>
</table>
</div>


<?php 
    if(isset($_GET['delete'])){
        $comment_id=$_GET['delete'];
        $query="DELETE FROM comments WHERE comment_id=$comment_id";
        $delete_query=mysqli_query($connection,$query);
        confirmQuery($delete_query);
        header("Location: comments.php");
    }
?>
<?php 
    if(isset($_GET['unapprove'])){
        $comment_id=$_GET['unapprove'];
        $query="UPDATE comments SET comment_status='Unapproved' WHERE comment_id=$comment_id";
        $delete_query=mysqli_query($connection,$query);
        confirmQuery($delete_query);
        header("Location: comments.php");
    }
?>
<?php 
    if(isset($_GET['approve'])){
        $comment_id=$_GET['approve'];
        $query="UPDATE comments SET comment_status='Approved' WHERE comment_id=$comment_id";
        $delete_query=mysqli_query($connection,$query);
        confirmQuery($delete_query);
        header("Location: comments.php");
    }
?>