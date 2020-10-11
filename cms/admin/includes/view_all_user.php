<div style="overflow-x:auto;">
<table class="table table-bordered table-hover">
    <thead>
        <tr>
            <th>Id</th>
            <th>Username</th>
            <th>Firstname</th>
            <th>Lastname</th>
            <th>Email</th>
            <th>Image</th>
            <th>Role</th>
        </tr>
    </thead>
    <tbody>
        <?php
        $query="SELECT * FROM users";
        $all_user_query=mysqli_query($connection,$query);
        while($row=mysqli_fetch_assoc($all_user_query)){
        $user_id=$row['user_id'];
        $user_name=$row['user_name'];
        $user_password=$row['user_password'];
        $user_firstname=$row['user_firstname'];
        $user_lastname=$row['user_lastname'];
        $user_email=$row['user_email'];
        $user_image=$row['user_image'];
        $user_role=$row['user_role'];
        

        

        echo "<tr>";
       echo "
        <td>$user_id</td>
        <td>$user_name</td>
        <td>$user_firstname</td>
        <td>$user_lastname</td>";
        // $query="SELECT * FROM post WHERE post_id=$comment_post_id";
        // $select_all_cat_query=mysqli_query($connection,$query);
        // while($row=mysqli_fetch_assoc($select_all_cat_query)){
        // $post_id=$row['post_id'];
        // $cat_title=$row['post_title'];
        // echo "<td><a href='../post.php?p_id=$post_id'>$cat_title</a></td>";
        // }
       echo "<td>$user_email</td>
            <td><img src='./images/user_img/$user_image' width='100'></img></td>
            <td>$user_role</td>
            <td><a href='./users.php?source=edit_user&user_id={$user_id}'>Edit<a/></td>
            <td><a href='./users.php?Admin={$user_id}'>Admin<a/></td>
            <td><a href='./users.php?Subscriber={$user_id}'>Subscriber<a/></td>
            <td><a href='./users.php?delete={$user_id}'>DELETE<a/></td>
            </tr>";
        }
        ?>
    </tbody>
</table>
</div>


<!-- <?php 
    if(isset($_GET['delete'])){
        $user_id=$_GET['delete'];
        $query="DELETE FROM users WHERE user_id=$user_id";
        $delete_query=mysqli_query($connection,$query);
        confirmQuery($delete_query);
        header("Location: users.php");
    }
?>
<?php 
    if(isset($_GET['Admin'])){
        $user_id=$_GET['Admin'];
        $query="UPDATE users SET user_role='admin' WHERE user_id=$user_id";
        $delete_query=mysqli_query($connection,$query);
        confirmQuery($delete_query);
        header("Location: users.php");
    }
?>
<?php 
    if(isset($_GET['Subscriber'])){
        $user_id=$_GET['Subscriber'];
        $query="UPDATE users SET user_role='subscriber' WHERE user_id=$user_id";
        $delete_query=mysqli_query($connection,$query);
        confirmQuery($delete_query);
        header("Location: users.php");
    }
?> -->