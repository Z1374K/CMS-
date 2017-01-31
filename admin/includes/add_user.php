<?php
global $conn;
if(isset($_POST['create_user'])){


    $user_name = $_POST['user_name'];
    $user_first_name = $_POST['user_first_name'];
    $user_last_name = $_POST['user_last_name'];
    $user_image = $_FILES['user_image']['name'];
    $user_image_temp = $_FILES['user_image']['tmp_name'];
    $user_role = $_POST['user_role'];
    $user_email = $_POST['user_email'];
    $user_password= $_POST['user_password'];



    move_uploaded_file($user_image_temp, "../images/$user_image");

    $query ="INSERT INTO users(user_name, user_first_name, user_last_name, user_image, user_role, user_email, user_password) VALUES('{$user_name}', '{$user_first_name}', '{$user_last_name}','{$user_image}','{$user_role}', '{$user_email}','{$user_password}') ";

    $create_user_query = mysqli_query($conn, $query);
    confirmQuery($create_user_query);
    echo "User created: " . " " . "<a href='users.php'>View Users</a>";
}

?>
<form action="" method="post" enctype="multipart/form-data">

    <div class="form-group">
        <label for="user_name">User Name</label>
        <input type="text" class="form-control" name="user_name">
    </div>
    <div class="form-group">
        <select name="user_role" id="">
            <option value="admin">Admin</option>
            <option value="subscriber">Subscriber</option>
        </select>
    </div>

    <div class="form-group">
        <label for="user_first_name">First Name</label>
        <input type="text" class="form-control" name="user_first_name">
    </div>
    <div class="form-group">
        <label for="user_last_name">Last Name</label>
        <input type="text" class="form-control" name="user_last_name">
    </div>

    <div class="form-group">
        <label for="user_image">Image</label>
        <input type="file" name="user_image">
    </div>

    <div class="form-group">
        <label for="user_email">E-mail</label>
        <input type="email" class="form-control" name="user_email">
    </div>

    <div class="form-group">
        <label for="user_password">Password</label>
        <input type="password" class="form-control" name="user_password">
    </div>
    <div class="form-group">
        <input class="btn btn-primary" type="submit" name="create_user" value="Add User">
    </div>

</form>