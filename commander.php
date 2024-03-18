<?php include('partials-front/menu.php');
$bdd = maConnexion(); ?>


<?php

$sql2 = "SELECT * FROM tbl_food WHERE active='Yes' AND featured='Yes'";

$res2 = $bdd->query($sql2) or die($bdd->errorInfo()[2]);

$count2 = $res2->rowCount();

if ($count2 > 0) {

    while ($row = $res2->fetchObject()) {
        $id = $row->id;
        $title = $row->title;
        $price = $row->price;
        $description = $row->description;
        $image_name = $row->image_name;
?>

        <div class="food-menu-box">
            <div class="food-menu-img">
                <?php
                if ($image_name == "") {
                    echo "<div class='error'>Image not available.</div>";
                } else {
                ?>
                    <img src="<?php echo SITEURL; ?>images/food/<?php echo $image_name; ?>" alt="Chicke Hawain Pizza" class="img-responsive img-curve">
                <?php
                }
                ?>

            </div>

            <div class="food-menu-desc">
                <h4><?php echo $title; ?></h4>
                <p class="food-price"><?php echo $price; ?></p>
                <p class="food-detail">
                    <?php echo $description; ?>
                </p>
                <br>

                <a href="<?php echo SITEURL; ?>order.php?food_id=<?php echo $id; ?>" class="btn btn-primary">Order Now</a>
            </div>
        </div>

<?php
    }
} else {
    echo "<div class='error'>Food not available.</div>";
}

?>





<div class="clearfix"></div>



</div>
</section>

<section class="sign-up">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="heading">

                </div>
            </div>
        </div>
        <form id="contact" action="" method="get">
            <div class="row">
                <div class="col-md-4 col-md-offset-3">

                    <input name="email" type="text" class="form-control" id="email" placeholder="Entre votre email ..." required="">

                </div>
                <div class="col-md-2">

                    <button type="submit" id="form-submit" class="btn">Envoyer Message</button>

                </div>
            </div>
        </form>
    </div>
</section>


<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
<script>
    window.jQuery || document.write('<script src="js/vendor/jquery-1.11.2.min.js"><\/script>')
</script>

<script src="js/vendor/bootstrap.min.js"></script>

<script src="js/plugins.js"></script>
<script src="js/main.js"></script>

<script type="text/javascript">
    $(document).ready(function() {
        $('.scroll-link').on('click', function(event) {
            event.preventDefault();
            var sectionID = $(this).attr("data-id");
            scrollToID('#' + sectionID, 750);
        });
        // scroll to top action
        $('.scroll-top').on('click', function(event) {
            event.preventDefault();
            $('html, body').animate({
                scrollTop: 0
            }, 'slow');
        });
        // mobile nav toggle
        $('#nav-toggle').on('click', function(event) {
            event.preventDefault();
            $('#main-nav').toggleClass("open");
        });
    });
    // scroll function
    function scrollToID(id, speed) {
        var offSet = 0;
        var targetOffset = $(id).offset().top - offSet;
        var mainNav = $('#main-nav');
        $('html,body').animate({
            scrollTop: targetOffset
        }, speed);
        if (mainNav.hasClass("open")) {
            mainNav.css("height", "1px").removeClass("in").addClass("collapse");
            mainNav.removeClass("open");
        }
    }
    if (typeof console === "undefined") {
        console = {
            log: function() {}
        };
    }
</script>