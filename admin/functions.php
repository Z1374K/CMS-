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
