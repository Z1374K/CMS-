<?php include "db.php"; ?>
<?php include "../admin/functions.php"; ?>
<?php session_start(); ?>

<?php

if(isset($_POST['login'])){

    $user_name = $_POST['user_name'];
    $user_password = $_POST['user_password'];

    $user_name = mysqli_real_escape_string($conn, $user_name);
    $user_password = mysqli_real_escape_string($conn, $user_password);

    $query = "SELECT * FROM users WHERE user_name = '{$user_name}'";
    $select_user_query = mysqli_query($conn, $query);
    confirmQuery($select_user_query);

}
while ($row = mysqli_fetch_array($select_user_query)){
    $db_id = $row['user_id'];
    $db_user_name = $row['user_name'];
    $db_user_password = $row['user_password'];
    $db_user_first_name = $row['user_first_name'];
    $db_user_last_name = $row['user_last_name'];
    $db_user_role = $row['user_role'];
}
if($user_name === $db_user_name && $user_password === $db_user_password){
    $_SESSION['user_name'] = $db_user_name;
    $_SESSION['first_name'] = $db_user_first_name;
    $_SESSION['last_name'] = $db_user_last_name;
    $_SESSION['user_role'] = $db_user_role;
    header("Location: ../admin");
} else {
    header("Location: ../index.php");
}
