<?php
global $conn;
if(isset($_GET['u_id']))
    $the_user_id = $_GET['u_id'];
$query ="SELECT * FROM users WHERE user_id = $the_user_id";
$select_user_query = mysqli_query($conn, $query);

while ($row = mysqli_fetch_assoc($select_user_query)) {
    $user_id = $row['user_id'];
    $user_name = $row['user_name'];
    $user_password = $row['user_password'];
    $user_first_name = $row['user_first_name'];
    $user_last_name = $row['user_last_name'];
    $user_email = $row['user_email'];
    $user_image = $row['user_image'];
    $user_role = $row['user_role'];
}


if(isset($_POST['edit_user'])){

    $user_name = $_POST['user_name'];
    $user_first_name = $_POST['user_first_name'];
    $user_last_name = $_POST['user_last_name'];
    $user_image = $_FILES['user_image']['name'];
    $user_image_temp = $_FILES['user_image']['tmp_name'];
    $user_role = $_POST['user_role'];
    $user_email = $_POST['user_email'];
    $user_password= $_POST['user_password'];



    move_uploaded_file($user_image_temp, "../images/$user_image");
    if (empty($user_image)) {
        $query = "SELECT * FROM users WHERE user_id = $the_user_id ";
        $select_image = mysqli_query($conn, $query);
        while ($row = mysqli_fetch_array($select_image)) {
            $user_image = $row['user_image'];
        }

    }

    $query ="UPDATE users SET user_name = '{$user_name}', user_first_name = '{$user_first_name}', user_last_name = '{$user_last_name}',user_image = '{$user_image}', user_role = '{$user_role}', user_email = '{$user_email}', user_password = '{$user_password}' WHERE user_id = $the_user_id";

    $edit_user_query= mysqli_query($conn, $query);
    confirmQuery($edit_user_query);
}

?>
<form action="" method="post" enctype="multipart/form-data">

    <div class="form-group">
        <label for="user_name">User Name</label>
        <input type="text" value="<?php echo $user_name;?>" class="form-control" name="user_name">
    </div>
    <div class="form-group">
        <select name="user_role" id="">
            <option value="subscriber">Subscriber</option>
            <option value="admin">Admin</option>
        </select>
    </div>

    <div class="form-group">
        <label for="user_first_name">First Name</label>
        <input type="text" value="<?php echo $user_first_name;?>" class="form-control" name="user_first_name">
    </div>
    <div class="form-group">
        <label for="user_last_name">Last Name</label>
        <input type="text" value="<?php echo $user_last_name ;?>" class="form-control" name="user_last_name">
    </div>

    <div class="form-group">
        <img width="100" src="../images/<?php echo $user_image; ?>" alt="">
        <input type="file" name="user_image">
    </div>

    <div class="form-group">
        <label for="user_email">E-mail</label>
        <input type="email" value="<?php echo $user_email;?>" class="form-control" name="user_email">
    </div>

    <div class="form-group">
        <label for="user_password">Password</label>
        <input type="password" value="<?php echo $user_password;?>" class="form-control" name="user_password">
    </div>
    <div class="form-group">
        <input class="btn btn-primary" type="submit" name="edit_user" value="Update User">
    </div>

</form>