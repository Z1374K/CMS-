<table class="table table-border table-hover">
    <thead>
    <tr>
        <th>Id</th>
        <th>User Name</th>
        <th>First Name</th>
        <th>Last Name</th>
        <th>Email</th>
        <th>Role</th>
        <th>Change role to</th>
        <th>Change role to</th>
        <th>Edit</th>
        <th>Delete</th>

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

        echo "<td style='text-align: center'><a href='users.php?change_role_admin={$user_id}'>Admin</a></td>";
        echo "<td style='text-align: center'><a href='users.php?change_role_sub={$user_id}'>Subscriber</a></td>";
        echo "<td><a href='users.php?source=edit_user&u_id={$user_id}'>Edit</a></td>";
        echo "<td><a href='users.php?delete={$user_id}'>Delete</a></td>";
        echo "<td><img width='50' height='50' class ='img-responsive' src='../images/$user_image' alt='image'> </td>";
        echo "</tr>";


    }

    ?>

    </tbody>
</table>
<?php
if(isset($_GET['change_role_admin'])){

    $the_user_id = $_GET['change_role_admin'];
    $query = "UPDATE users SET user_role = 'Admin' WHERE user_id = $the_user_id";
    $change_to_admin_query = mysqli_query($conn, $query);
    header("Location: users.php");

}

if(isset($_GET['change_role_sub'])){

    $the_user_id = $_GET['change_role_sub'];
    $query = "UPDATE users SET user_role = 'Subscriber' WHERE user_id = $the_user_id";
    $change_to_sub_query = mysqli_query($conn, $query);
    header("Location: users.php");

}





if(isset($_GET['delete'])){

    $the_user_id= $_GET['delete'];
    $query = "DELETE FROM users WHERE user_id = {$the_user_id} ";
    $delete_query = mysqli_query($conn, $query);
    header("Location: users.php");

}


?>