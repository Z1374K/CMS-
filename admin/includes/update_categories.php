<form action="" method="post">
    <div class="form-group">
        <label for="cat_title">Edit Category</label>
        <?php
        if (isset($_GET['edit'])) {
            $cat_id = $_GET['edit'];

            $query = "SELECT * FROM categories WHERE cat_id = $cat_id ";
            $select_categories_id = mysqli_query($conn, $query);

            while ($row = mysqli_fetch_assoc($select_categories_id)) {
                $cat_id = $row['cat_id'];
                $cat_title = $row['cat_title'];
                ?>
                <input value="<?php if (isset($cat_title)) {
                    echo $cat_title;
                } ?> " type="text" class="form-control" name="cat_title">
            <?php }
        } ?>
        <?php
        if (isset($_POST['update_category'])) {
            $cat_id_upd = $_POST['cat_title'];
            if ($cat_id_upd == "" || empty ($cat_id_upd)) {
                echo "this cannot be empty";
            } else {
                $query = "UPDATE categories SET cat_title = '{$cat_id_upd}' WHERE cat_id = {$cat_id} ";
                $update_query = mysqli_query($conn, $query);
                if (!$update_query) {
                    die("Query failed" . mysqli_error($conn));
                }
            }

        }

        ?>
    </div>
    <div class="form-group">
        <input class="btn btn-primary" type="submit" name="update_category" value="Update">
    </div>

</form>