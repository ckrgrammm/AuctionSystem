<?php
include("header.php");




include("db.php");



?>


<!--====== App Content ======-->
<div class="app-content">

    <!--====== Section 1 ======-->
    <div class="u-s-p-y-60">

        <!--====== Section Content ======-->
        <div class="section__content">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12 col-md-12 u-s-m-b-30">
                        <div class="empty">
                            <div class="empty__wrap">

                                <span class="empty__big-text">404</span>

                                <span class="empty__text-1">Looks like you're in wrong place.</span>

                                <a class="empty__redirect-link btn--e-brand" href="index.php">GO TO HOME</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!--====== End - Section Content ======-->
    </div>
    <!--====== End - Section 1 ======-->
</div>
<!--====== End - App Content ======-->


<h1> HI<?php echo $status; ?></h1>


</div>
<!--====== End - Main App ======-->




<!--====== Vendor Js ======-->
<script src="js/vendor.js"></script>

<!--====== jQuery Shopnav plugin ======-->
<script src="js/jquery.shopnav.js"></script>

<!--====== App ======-->
<script src="js/app.js"></script>


</body>

</html>

<?php
include("footer.php");

?>