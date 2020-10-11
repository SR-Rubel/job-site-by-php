<?php


    function confirmQuery($result){
        global $connection;
        if(!$result){
        die("<h1>Query failed </h1>".mysqli_error($connection));
        }
    }


   function insert_categories(){
        global $connection;
        if(isset($_POST['submit'])){

            $cat_title=$_POST['cat_title'];

            if($cat_title=="" || empty($cat_title)){
                echo "Title not be empty";
            }
            else{

                $query="INSERT INTO categories(cat_title)";
                $query .= "VALUE('$cat_title')";
                $create_category_query=mysqli_query($connection,$query);
                if(!$create_category_query){
                    die('query failed'.mysqli_error($connection));
                }
            }
        }
    }

    function findAllCategories(){
        global $connection;
        $query="SELECT * FROM categories";
        $select_all_cat_query=mysqli_query($connection,$query);
        while($row=mysqli_fetch_assoc($select_all_cat_query)){
        $cat_title=$row['cat_title'];
        $cat_id=$row['cat_id'];
        echo "<tr>
                <td>{$cat_id}</td>
                <td>{$cat_title}</td>
                <td><a class='btn btn-danger' href='categories.php?delete={$cat_id}'><i class='fa fa-trash-o fa-lg'></i>delete</a></td>
                <td><a class='btn btn-primary' href='categories.php?edit={$cat_id}'><i class='fa fa-pencil fa-lg'></i>edit</a></td>
              </tr>";
        }
    }


    function deleteCategories(){
        global $connection;
        if(isset($_GET['delete'])){
            $del_cat_id=$_GET['delete'];
            $query="DELETE FROM categories WHERE cat_id='$del_cat_id'";
            $del_cat_query=mysqli_query($connection,$query);
            header("Location: categories.php");
        }
    }











?>