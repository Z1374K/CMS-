<table class="table table-border table-hover">
    <thead>
    <tr>
        <th>Id</th>
        <th>User Name</th>
        <th>First Name</th>
        <th>Last Name</th>
        <th>Email</th>
        <th>Role</th>

    </tr>
    </thead>
    <tbody>


    <?php
    global $conn;
    $query ="SELECT * FROM users";
    $select_users = mysqli_query($conn, $query);

    while ($row = mysqli_fetch_assoc($select_users)) {
        $user_id = $row['user_id'];
        $user_name = $row['user_name'];
        $user_password = $row['user_password'];
        $user_first_name = $row['user_first_name'];
        $user_last_name = $row['user_last_name'];
        $user_email = $row['user_email'];
        $user_image = $row['user_image'];
        $user_role = $row['user_role'];

        echo "<tr>";
        echo "<td>{$user_id}</td>";
        echo "<td>{$user_name}</td>";
        echo "<td>{$user_first_name}</td>";
        /* echo "<td>{$post_title}</td>";
         $query = "SELECT * FROM categories WHERE cat_id = $post_category_id ";
         $select_categories_id = mysqli_query($conn, $query);
         while ($row = mysqli_fetch_assoc($select_categories_id)) {
             $cat_id = $row['cat_id'];
             $cat_title = $row['cat_title'];
             echo "<td>{$cat_title}</td>";
         }*/

        echo "<td>{$user_last_name}</td>";
        echo "<td>{$user_email}</td>";
        echo "<td>{$user_role}</td>";

       /* $query = "SELECT * FROM posts WHERE post_id = $comment_post_id";
        $select_post_id_query = mysqli_query($conn, $query);
        while ($row = mysqli_fetch_assoc($select_post_id_query)){
            $post_id  = $row['post_id'];
            $post_title = $row['post_title'];
            echo "<td><a href='../post.php?p_id=$post_id'>$post_title</a> </td>";
        }
*/

        echo "<td><a href='comments.php?approve='>Approve</a></td>";
        echo "<td><a href='comments.php?unapprove='>Unapprove</a></td>";

        echo "<td><a href='comments.php?delete='>Delete</a></td>";
        echo "</tr>";

    }

    ?>

    </tbody>
</table>
<?php
if(isset($_GET['unapprove'])){

    $the_comment_id= $_GET['unapprove'];
    $query = "UPDATE comments SET comment_status = 'unapproved' WHERE comment_id = $the_comment_id";
    $unapproved_query = mysqli_query($conn, $query);
    header("Location: comments.php");

}

if(isset($_GET['approve'])){

    $the_comment_id= $_GET['approve'];
    $query = "UPDATE comments SET comment_status = 'approved' WHERE comment_id = $the_comment_id";
    $approved_query = mysqli_query($conn, $query);
    header("Location: comments.php");

}





if(isset($_GET['delete'])){

    $the_comment_id= $_GET['delete'];
    $query = "DELETE FROM comments WHERE comment_id = {$the_comment_id} ";
    $delete_query = mysqli_query($conn, $query);
    header("Location: comments.php");

}


?>