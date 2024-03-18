<?php

include('../config/constants.php');
$bdd = maConnexion();

$id = $_GET['id'];

$sql = "DELETE FROM tbl_admin WHERE id=$id";

$res = $bdd->exec($sql) or die($bdd->errorInfo()[2]);
if ($res == true) {
    $_SESSION['delete'] = "<div class='success'>Admin Deleted Successfully.</div>";
    header('location:' . SITEURL . 'admin/manage-admin.php');
} else {

    $_SESSION['delete'] = "<div class='error'>Failed to Delete Admin. Try Again Later.</div>";
    header('location:' . SITEURL . 'admin/manage-admin.php');
}
