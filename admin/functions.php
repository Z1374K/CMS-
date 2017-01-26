<?php


function insert_categories(){
    global $conn;
    if (isset($_POST['submit'])) {
        $cat_title = $_POST['cat_title'];
        if ($cat_title == "" || empty($cat_title)) {
            echo "This field cannot be empty";
        } else {
            $query = "INSERT INTO categories(cat_title) VALUES ('{$cat_title}') ";

            $create_category_query = mysqli_query($conn, $query);

            if (!$create_category_query) {
                die('Query failed' . mysqli_error($conn));
            }
        }


    }
}

function findAllCategories(){
    global $conn;
    $query = "SELECT * FROM categories";
    $select_categories = mysqli_query($conn, $query);

    while ($row = mysqli_fetch_assoc($select_categories)) {
        $cat_id = $row['cat_id'];
        $cat_title = $row['cat_title'];
        echo "<tr>";
        echo "<td>{$cat_id}</td>";
        echo "<td>{$cat_title}</td>";
        echo "<td><a href='categories.php?delete={$cat_id}'>Delete</a></td>";
        echo "<td><a href='categories.php?edit={$cat_id}'>Edit</a></td>";
        echo "</tr>";
    }
}

function deleteCategories(){
    global $conn;
    if (isset($_GET['delete'])) {
        $cat_id_del = $_GET['delete'];
        $query = "DELETE FROM categories WHERE cat_id = {$cat_id_del} ";
        $delete_query = mysqli_query($conn, $query);
        header("Location: categories.php");
    }

}

function confirmQuery($result){
    global $conn;
    if(!$result){
        die("Query failed ." . mysqli_error($conn));
    }

}
