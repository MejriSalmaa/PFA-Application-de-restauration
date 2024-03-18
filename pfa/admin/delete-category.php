<?php
include('../config/constants.php');
$bdd = maConnexion();

if (isset($_GET['id']) and isset($_GET['image_name'])) {
    $id = $_GET['id'];
    $image_name = $_GET['image_name'];

    if ($image_name != "") {
        $path = "../images/category/" . $image_name;
        $remove = unlink($path);
        if ($remove == false) {
            $_SESSION['remove'] = "<div class='error'>Failed to Remove Category Image.</div>";
            header('location:' . SITEURL . 'admin/manage-category.php');
            die();
        }
    }

    $sql = "DELETE FROM tbl_category WHERE id=$id";
    $res = $bdd->exec($sql) or die($bdd->errorInfo()[2]);
    if ($res == true) {
        $_SESSION['delete'] = "<div class='success'>Category Deleted Successfully.</div>";
        header('location:' . SITEURL . 'admin/manage-category.php');
    } else {
        $_SESSION['delete'] = "<div class='error'>Failed to Delete Category.</div>";
        header('location:' . SITEURL . 'admin/manage-category.php');
    }
} else {
    header('location:' . SITEURL . 'admin/manage-category.php');
}
