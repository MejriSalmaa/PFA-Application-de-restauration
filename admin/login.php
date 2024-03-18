<?php include('../config/constants.php');
$bdd = maConnexion();
?>

<html>

<head>
    <title>Login - Food Order System</title>
    <link rel="stylesheet" href="../css/admin.css">
</head>

<body>


    <div class="login">
        <h1 class="text-center">Login</h1>
        <br><br>

        <?php
        if (isset($_SESSION['login'])) {
            echo $_SESSION['login'];
            unset($_SESSION['login']);
        }

        if (isset($_SESSION['login-message'])) {
            echo $_SESSION['login-message'];
            unset($_SESSION['login-message']);
        }
        ?>
        <br><br>

        <form action="" method="POST" class="text-center">
            Username: <br>
            <input type="text" name="username" placeholder="Enter Username"><br><br>

            Password: <br>
            <input type="password" name="password" placeholder="Enter Password"><br><br>

            <input type="submit" name="submit" value="Login" class="btn-primary">
            <br><br>
        </form>

    </div>

</body>

</html>








<?php




if (isset($_POST['submit'])) {

    echo $username = $_POST['username'];
    echo $password = md5($_POST['password']);

    $username = $bdd->quote($username);
    $password = $bdd->quote($password);

    $sql = "SELECT * FROM tbl_admin WHERE username=$username AND password=$password ";

    $res = $bdd->query($sql) or die($bdd->errorInfo()[2]);

    $count = $res->rowCount();

    if ($count == 1) {
        $_SESSION['login'] = "<div class='success'>Login Successful.</div>";
        $_SESSION['user'] = $username;

        header('location:' . SITEURL . 'admin/');
    } else {

        $_SESSION['login'] = "<div class='error text-center'>Username or Password did not match.</div>";

        header('location:' . SITEURL . 'admin/login.php');
    }
}



?>