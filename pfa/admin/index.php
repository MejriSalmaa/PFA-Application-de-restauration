<?php include('partials/menu.php');
$bdd = maConnexion();
?>

<div class="main-content">
    <div class="wrapper">
        <h1>Dashboard</h1>
        <br><br>
        <?php
        if (isset($_SESSION['login'])) {
            echo $_SESSION['login'];
            unset($_SESSION['login']);
        }
        ?>
        <br><br>

        <div class="col-4 text-center">

            <?php
            $sql = "SELECT * FROM tbl_category";
            $res = $bdd->query($sql) or die($bdd->errorInfo()[2]);
            $count = $res->rowCount();
            ?>

            <h1><?php echo $count; ?></h1>
            <br />
            Categories
        </div>

        <div class="col-4 text-center">

            <?php

            $sql2 = "SELECT * FROM tbl_food";

            $res2 = $bdd->query($sql2) or die($bdd->errorInfo()[2]);

            $count2 = $res2->rowCount();
            ?>

            <h1><?php echo $count2; ?></h1>
            <br />
            Foods
        </div>

        <div class="col-4 text-center">

            <?php

            $sql3 = "SELECT * FROM tbl_order";

            $res3 = $bdd->query($sql3) or die($bdd->errorInfo()[2]);

            $count3 = $res3->rowCount();
            ?>

            <h1><?php echo $count3; ?></h1>
            <br />
            Total Orders
        </div>

        <div class="col-4 text-center">

            <?php

            $sql4 = "SELECT SUM(total) AS Total FROM tbl_order WHERE status='Delivered'";


            $res4 = $bdd->query($sql4) or die($bdd->errorInfo()[2]);


            $row4 =  $res4->fetchObject();


            $total_revenue = $row4->Total;

            ?>

            <h1><?php echo $total_revenue; ?>DT</h1>
            <br />
            Revenue Generated
        </div>

        <div class="col-4 text-center">



            <h1>5</h1>
            <br />
            Reservations
        </div>

        <div class="clearfix"></div>

    </div>
</div>

<?php include('partials/footer.php') ?>