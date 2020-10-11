<?php

function countCategory(){
    global $connection;
    $query="SELECT * FROM categories";
    $select_all_cat_query=mysqli_query($connection,$query);
    $count_row=mysqli_num_rows($select_all_cat_query);
    echo "<p class='count'>$count_row</p>";

}
function countPost(){
    global $connection;
    $query="SELECT * FROM post";
    $select_all_cat_query=mysqli_query($connection,$query);
    $count_row=mysqli_num_rows($select_all_cat_query);
    echo "<p class='count'>$count_row</p>";

}
function countComment(){
    global $connection;
    $query="SELECT * FROM comments";
    $select_all_cat_query=mysqli_query($connection,$query);
    $count_row=mysqli_num_rows($select_all_cat_query);
    echo "<p class='count'>$count_row</p>";

}

function listCategories(){
    global $connection;
    $query="SELECT * FROM categories";
    $select_all_cat_query=mysqli_query($connection,$query);
    while($row=mysqli_fetch_assoc($select_all_cat_query)){
    $cat_title=$row['cat_title'];
    //$cat_id=$row['cat_id'];
    echo "<li class='list-group-item'>$cat_title</li>";
    }
}

?>