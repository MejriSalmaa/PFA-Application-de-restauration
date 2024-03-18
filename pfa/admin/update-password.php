<?php include('partials/menu.php');
$bdd = maConnexion();
?>

<div class="main-content">
    <div class="wrapper">
        <h1>Change Password</h1>
        <br><br>

        <?php
        if (isset($_GET['id'])) {
            $id = $_GET['id'];
        }
        ?>

        <form action="" method="POST">

            <table class="tbl-30">
                <tr>
                    <td>Current Password: </td>
                    <td>
                        <input type="password" name="current_password" placeholder="Current Password">
                    </td>
                </tr>

                <tr>
                    <td>New Password:</td>
                    <td>
                        <input type="password" name="new_password" placeholder="New Password">
                    </td>
                </tr>

                <tr>
                    <td>Confirm Password: </td>
                    <td>
                        <input type="password" name="confirm_password" placeholder="Confirm Password">
                    </td>
                </tr>

                <tr>
                    <td colspan="2">
                        <input type="hidden" name="id" value="<?php echo $id; ?>">
                        <input type="submit" name="submit" value="Change Password" class="btn-secondary">
                    </td>
                </tr>

            </table>

        </form>

    </div>
</div>

<?php

if (isset($_POST['submit'])) {
    $id = $_POST['id'];
    $current_password = md5($_POST['current_password']);
    $new_password = md5($_POST['new_password']);
    $confirm_password = md5($_POST['confirm_password']);


    $id = $bdd->quote($id);
    $current_password = $bdd->quote($current_password);
    $new_password = $bdd->quote($new_password);
    $confirm_password = $bdd->quote($confirm_password);


    $sql = "SELECT * FROM tbl_admin WHERE id=$id AND password=$current_password";

    $res = $bdd->query($sql) or die($bdd->errorInfo()[2]);

    if ($res == true) {
        $count = $res->rowCount();

        if ($count == 1) {
            if ($new_password == $confirm_password) {
                $sql2 = "UPDATE tbl_admin SET 
                                password=$new_password
                                WHERE id=$id
                            ";

                $res2 = $bdd->query($sql2) or die($bdd->errorInfo()[2]);

                if ($res2) {
                    $_SESSION['change-pwd'] = "<div class='success'>Password Changed Successfully. </div>";
                    header('location:' . SITEURL . 'admin/manage-admin.php');
                } else {
                    $_SESSION['change-pwd'] = "<div class='error'>Failed to Change Password. </div>";

                    header('location:' . SITEURL . 'admin/manage-admin.php');
                }
            } else {
                $_SESSION['pwd-not-match'] = "<div class='error'>Password Did not Patch. </div>";

                header('location:' . SITEURL . 'admin/manage-admin.php');
            }
        } else {
            $_SESSION['user-not-found'] = "<div class='error'>User Not Found. </div>";

            header('location:' . SITEURL . 'admin/manage-admin.php');
        }
    }
}

?>


<?php include('partials/footer.php'); ?>