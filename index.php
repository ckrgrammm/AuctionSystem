<?php
$title = "Home"; // Define the title before including header.php
session_start();
include("header.php");

?>


<!--====== App Content ======-->
<div class="app-content">

    <?php
    include("slider.php");
    ?>
    <br>

    <!--====== Section 2 ======-->
    <div class="u-s-p-b-60">

        <!--====== Section Intro ======-->
        <div class="section__intro u-s-m-b-16">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="section__text-wrap">
                            <h1 class="section__heading u-c-secondary u-s-m-b-12">TRENDING ITEM</h1>

                            <span class="section__span u-c-silver">CHOOSE CATEGORY</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!--====== End - Section Intro ======-->


        <!--====== Section Content ======-->
        <div class="section__content">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="filter-category-container">
                            <div class="filter__category-wrapper">

                                <button class="btn filter__btn filter__btn--style-1 js-checked" type="button" data-filter="*">ALL</button>
                            </div>
                            <div class="filter__category-wrapper">

                                <button class="btn filter__btn filter__btn--style-1" type="button" data-filter=".headphone">HEADPHONES</button>
                            </div>
                            <div class="filter__category-wrapper">

                                <button class="btn filter__btn filter__btn--style-1" type="button" data-filter=".smartphone">SMARTPHONES</button>
                            </div>
                            <div class="filter__category-wrapper">

                                <button class="btn filter__btn filter__btn--style-1" type="button" data-filter=".sportgadget">SPORT GADGETS</button>
                            </div>
                            <div class="filter__category-wrapper">

                                <button class="btn filter__btn filter__btn--style-1" type="button" data-filter=".dslr">DSLR</button>
                            </div>
                        </div>
                        <div class="filter__grid-wrapper u-s-m-t-30">
                            <div class="row">
                                <div class="col-xl-3 col-lg-4 col-md-6 col-sm-6 u-s-m-b-30 filter__item headphone">
                                    <div class="product-o product-o--hover-on product-o--radius">
                                        <div class="product-o__wrap">

                                            <a class="aspect aspect--bg-grey aspect--square u-d-block" href="product-detail.php">

                                                <img class="aspect__img" src="images/product/electronic/product2.jpg" alt=""></a>
                                            <div class="product-o__action-wrap">
                                                <ul class="product-o__action-list">
                                                    <li>
                                                        <a data-modal="modal" data-modal-id="#add-to-cart" data-tooltip="tooltip" data-placement="top" title="Add to Cart"><i class="fas fa-plus-circle"></i></a>
                                                    </li>
                                                    <li>
                                                        <a href="signin.php" data-tooltip="tooltip" data-placement="top" title="Add to Wishlist"><i class="fas fa-heart"></i></a>
                                                    </li>
                                                </ul>
                                            </div>
                                        </div>

                                        <span class="product-o__category">

                                            <a href="shop-side-version-2.php">Electronics</a></span>

                                        <span class="product-o__name">

                                            <a href="product-detail.php">Red Wireless Headphone</a></span>
                                        <div class="product-o__rating gl-rating-style"><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star-half-alt"></i>

                                            <span class="product-o__review">(23)</span>
                                        </div>

                                        <span class="product-o__price">$125.00

                                            <span class="product-o__discount">$160.00</span></span>
                                    </div>
                                </div>
                                <div class="col-xl-3 col-lg-4 col-md-6 col-sm-6 u-s-m-b-30 filter__item headphone">
                                    <div class="product-o product-o--hover-on product-o--radius">
                                        <div class="product-o__wrap">

                                            <a class="aspect aspect--bg-grey aspect--square u-d-block" href="product-detail.php">

                                                <img class="aspect__img" src="images/product/electronic/product3.jpg" alt=""></a>
                                            <div class="product-o__action-wrap">
                                                <ul class="product-o__action-list">
                                                    <li>

                                                        <a data-modal="modal" data-modal-id="#add-to-cart" data-tooltip="tooltip" data-placement="top" title="Add to Cart"><i class="fas fa-plus-circle"></i></a>
                                                    </li>
                                                    <li>

                                                        <a href="signin.php" data-tooltip="tooltip" data-placement="top" title="Add to Wishlist"><i class="fas fa-heart"></i></a>
                                                    </li>
                                                </ul>
                                            </div>
                                        </div>

                                        <span class="product-o__category">

                                            <a href="shop-side-version-2.php">Electronics</a></span>

                                        <span class="product-o__name">

                                            <a href="product-detail.php">Yellow Wireless Headphone</a></span>
                                        <div class="product-o__rating gl-rating-style"><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star-half-alt"></i><i class="far fa-star"></i><i class="far fa-star"></i>

                                            <span class="product-o__review">(23)</span>
                                        </div>

                                        <span class="product-o__price">$125.00

                                            <span class="product-o__discount">$160.00</span></span>
                                    </div>
                                </div>
                                <div class="col-xl-3 col-lg-4 col-md-6 col-sm-6 u-s-m-b-30 filter__item sportgadget">
                                    <div class="product-o product-o--hover-on product-o--radius">
                                        <div class="product-o__wrap">

                                            <a class="aspect aspect--bg-grey aspect--square u-d-block" href="product-detail.php">

                                                <img class="aspect__img" src="images/product/electronic/product4.jpg" alt=""></a>
                                            <div class="product-o__action-wrap">
                                                <ul class="product-o__action-list">

                                                    <li>

                                                        <a data-modal="modal" data-modal-id="#add-to-cart" data-tooltip="tooltip" data-placement="top" title="Add to Cart"><i class="fas fa-plus-circle"></i></a>
                                                    </li>
                                                    <li>

                                                        <a href="signin.php" data-tooltip="tooltip" data-placement="top" title="Add to Wishlist"><i class="fas fa-heart"></i></a>
                                                    </li>

                                                </ul>
                                            </div>
                                        </div>

                                        <span class="product-o__category">

                                            <a href="shop-side-version-2.php">Electronics</a></span>

                                        <span class="product-o__name">

                                            <a href="product-detail.php">Hover Skateboard Scooter</a></span>
                                        <div class="product-o__rating gl-rating-style"><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star-half-alt"></i>

                                            <span class="product-o__review">(23)</span>
                                        </div>

                                        <span class="product-o__price">$125.00

                                            <span class="product-o__discount">$160.00</span></span>
                                    </div>
                                </div>
                                <div class="col-xl-3 col-lg-4 col-md-6 col-sm-6 u-s-m-b-30 filter__item sportgadget">
                                    <div class="product-o product-o--hover-on product-o--radius">
                                        <div class="product-o__wrap">

                                            <a class="aspect aspect--bg-grey aspect--square u-d-block" href="product-detail.php">

                                                <img class="aspect__img" src="images/product/electronic/product5.jpg" alt=""></a>
                                            <div class="product-o__action-wrap">
                                                <ul class="product-o__action-list">

                                                    <li>

                                                        <a data-modal="modal" data-modal-id="#add-to-cart" data-tooltip="tooltip" data-placement="top" title="Add to Cart"><i class="fas fa-plus-circle"></i></a>
                                                    </li>
                                                    <li>

                                                        <a href="signin.php" data-tooltip="tooltip" data-placement="top" title="Add to Wishlist"><i class="fas fa-heart"></i></a>
                                                    </li>

                                                </ul>
                                            </div>
                                        </div>

                                        <span class="product-o__category">

                                            <a href="shop-side-version-2.php">Electronics</a></span>

                                        <span class="product-o__name">

                                            <a href="product-detail.php">Hover Red Skateboard Scooter</a></span>
                                        <div class="product-o__rating gl-rating-style"><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star-half-alt"></i>

                                            <span class="product-o__review">(23)</span>
                                        </div>

                                        <span class="product-o__price">$125.00

                                            <span class="product-o__discount">$160.00</span></span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-12">
                        <div class="load-more">

                            <button class="btn btn--e-brand" type="button">Load More</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!--====== End - Section Content ======-->
    </div>
    <!--====== End - Section 2 ======-->


    <!--====== Section 6 ======-->
    <div class="u-s-p-y-60">

        <!--====== Section Intro ======-->
        <div class="section__intro u-s-m-b-46">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="section__text-wrap">
                            <h1 class="section__heading u-c-secondary u-s-m-b-12">FEATURED ITEMS</h1>

                            <span class="section__span u-c-silver">FIND NEW FEATURED ITEMS</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!--====== End - Section Intro ======-->


        <!--====== Section Content ======-->
        <div class="section__content">
            <div class="container">
                <div class="row">
                    <div class="col-xl-3 col-lg-4 col-md-6 col-sm-6 u-s-m-b-30 filter__item headphone">
                        <div class="product-o product-o--hover-on product-o--radius">
                            <div class="product-o__wrap">

                                <a class="aspect aspect--bg-grey aspect--square u-d-block" href="product-detail.php">

                                    <img class="aspect__img" src="images/product/electronic/product2.jpg" alt=""></a>
                                <div class="product-o__action-wrap">
                                    <ul class="product-o__action-list">
                                        <li>
                                            <a data-modal="modal" data-modal-id="#add-to-cart" data-tooltip="tooltip" data-placement="top" title="Add to Cart"><i class="fas fa-plus-circle"></i></a>
                                        </li>
                                        <li>
                                            <a href="signin.php" data-tooltip="tooltip" data-placement="top" title="Add to Wishlist"><i class="fas fa-heart"></i></a>
                                        </li>
                                    </ul>
                                </div>
                            </div>

                            <span class="product-o__category">

                                <a href="shop-side-version-2.php">Electronics</a></span>

                            <span class="product-o__name">

                                <a href="product-detail.php">Red Wireless Headphone</a></span>
                            <div class="product-o__rating gl-rating-style"><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star-half-alt"></i>

                                <span class="product-o__review">(23)</span>
                            </div>

                            <span class="product-o__price">$125.00

                                <span class="product-o__discount">$160.00</span></span>
                        </div>
                    </div>
                    <div class="col-xl-3 col-lg-4 col-md-6 col-sm-6 u-s-m-b-30 filter__item headphone">
                        <div class="product-o product-o--hover-on product-o--radius">
                            <div class="product-o__wrap">

                                <a class="aspect aspect--bg-grey aspect--square u-d-block" href="product-detail.php">

                                    <img class="aspect__img" src="images/product/electronic/product3.jpg" alt=""></a>
                                <div class="product-o__action-wrap">
                                    <ul class="product-o__action-list">
                                        <li>

                                            <a data-modal="modal" data-modal-id="#add-to-cart" data-tooltip="tooltip" data-placement="top" title="Add to Cart"><i class="fas fa-plus-circle"></i></a>
                                        </li>
                                        <li>

                                            <a href="signin.php" data-tooltip="tooltip" data-placement="top" title="Add to Wishlist"><i class="fas fa-heart"></i></a>
                                        </li>
                                    </ul>
                                </div>
                            </div>

                            <span class="product-o__category">

                                <a href="shop-side-version-2.php">Electronics</a></span>

                            <span class="product-o__name">

                                <a href="product-detail.php">Yellow Wireless Headphone</a></span>
                            <div class="product-o__rating gl-rating-style"><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star-half-alt"></i><i class="far fa-star"></i><i class="far fa-star"></i>

                                <span class="product-o__review">(23)</span>
                            </div>

                            <span class="product-o__price">$125.00

                                <span class="product-o__discount">$160.00</span></span>
                        </div>
                    </div>
                    <div class="col-xl-3 col-lg-4 col-md-6 col-sm-6 u-s-m-b-30 filter__item sportgadget">
                        <div class="product-o product-o--hover-on product-o--radius">
                            <div class="product-o__wrap">

                                <a class="aspect aspect--bg-grey aspect--square u-d-block" href="product-detail.php">

                                    <img class="aspect__img" src="images/product/electronic/product4.jpg" alt=""></a>
                                <div class="product-o__action-wrap">
                                    <ul class="product-o__action-list">

                                        <li>

                                            <a data-modal="modal" data-modal-id="#add-to-cart" data-tooltip="tooltip" data-placement="top" title="Add to Cart"><i class="fas fa-plus-circle"></i></a>
                                        </li>
                                        <li>

                                            <a href="signin.php" data-tooltip="tooltip" data-placement="top" title="Add to Wishlist"><i class="fas fa-heart"></i></a>
                                        </li>

                                    </ul>
                                </div>
                            </div>

                            <span class="product-o__category">

                                <a href="shop-side-version-2.php">Electronics</a></span>

                            <span class="product-o__name">

                                <a href="product-detail.php">Hover Skateboard Scooter</a></span>
                            <div class="product-o__rating gl-rating-style"><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star-half-alt"></i>

                                <span class="product-o__review">(23)</span>
                            </div>

                            <span class="product-o__price">$125.00

                                <span class="product-o__discount">$160.00</span></span>
                        </div>
                    </div>
                    <div class="col-xl-3 col-lg-4 col-md-6 col-sm-6 u-s-m-b-30 filter__item sportgadget">
                        <div class="product-o product-o--hover-on product-o--radius">
                            <div class="product-o__wrap">

                                <a class="aspect aspect--bg-grey aspect--square u-d-block" href="product-detail.php">

                                    <img class="aspect__img" src="images/product/electronic/product5.jpg" alt=""></a>
                                <div class="product-o__action-wrap">
                                    <ul class="product-o__action-list">

                                        <li>

                                            <a data-modal="modal" data-modal-id="#add-to-cart" data-tooltip="tooltip" data-placement="top" title="Add to Cart"><i class="fas fa-plus-circle"></i></a>
                                        </li>
                                        <li>

                                            <a href="signin.php" data-tooltip="tooltip" data-placement="top" title="Add to Wishlist"><i class="fas fa-heart"></i></a>
                                        </li>

                                    </ul>
                                </div>
                            </div>

                            <span class="product-o__category">

                                <a href="shop-side-version-2.php">Electronics</a></span>

                            <span class="product-o__name">

                                <a href="product-detail.php">Hover Red Skateboard Scooter</a></span>
                            <div class="product-o__rating gl-rating-style"><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star-half-alt"></i>

                                <span class="product-o__review">(23)</span>
                            </div>

                            <span class="product-o__price">$125.00

                                <span class="product-o__discount">$160.00</span></span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!--====== End - Section Content ======-->
    </div>
    <!--====== End - Section 6 ======-->



    <!--====== Section 9 ======-->
    <div class="u-s-p-b-60">

        <!--====== Section Content ======-->
        <div class="section__content">
            <div class="container">
                <div class="row">
                    <div class="col-lg-4 col-md-6 u-s-m-b-30">
                        <div class="service u-h-100">
                            <div class="service__icon"><i class="fas fa-truck"></i></div>
                            <div class="service__info-wrap">

                                <span class="service__info-text-1">Free Shipping</span>

                                <span class="service__info-text-2">Free shipping on all US order or order above $200</span>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-6 u-s-m-b-30">
                        <div class="service u-h-100">
                            <div class="service__icon"><i class="fas fa-redo"></i></div>
                            <div class="service__info-wrap">

                                <span class="service__info-text-1">Shop with Confidence</span>

                                <span class="service__info-text-2">Our Protection covers your purchase from click to delivery</span>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-6 u-s-m-b-30">
                        <div class="service u-h-100">
                            <div class="service__icon"><i class="fas fa-headphones-alt"></i></div>
                            <div class="service__info-wrap">

                                <span class="service__info-text-1">24/7 Help Center</span>

                                <span class="service__info-text-2">Round-the-clock assistance for a smooth shopping experience</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!--====== End - Section Content ======-->
    </div>
    <!--====== End - Section 9 ======-->


</div>
<!--====== End - App Content ======-->




<!--====== Modal Section ======-->


<!--====== Add to Cart Modal ======-->
<div class="modal fade" id="add-to-cart">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content modal-radius modal-shadow">

            <button class="btn dismiss-button fas fa-times" type="button" data-dismiss="modal"></button>
            <div class="modal-body">
                <div class="row">
                    <div class="col-lg-6 col-md-12">
                        <div class="success u-s-m-b-30">
                            <div class="success__text-wrap"><i class="fas fa-check"></i>

                                <span>Item is added successfully!</span>
                            </div>
                            <div class="success__img-wrap">

                                <img class="u-img-fluid" src="images/product/electronic/product1.jpg" alt="">
                            </div>
                            <div class="success__info-wrap">

                                <span class="success__name">Beats Bomb Wireless Headphone</span>

                                <span class="success__quantity">Quantity: 1</span>

                                <span class="success__price">$170.00</span>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6 col-md-12">
                        <div class="s-option">

                            <span class="s-option__text">1 item (s) in your cart</span>
                            <div class="s-option__link-box">

                                <a class="s-option__link btn--e-white-brand-shadow" data-dismiss="modal">CONTINUE SHOPPING</a>

                                <a class="s-option__link btn--e-white-brand-shadow" href="cart.php">VIEW CART</a>

                                <a class="s-option__link btn--e-brand-shadow" href="checkout.php">PROCEED TO CHECKOUT</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!--====== End - Add to Cart Modal ======-->


<!--====== End - Modal Section ======-->
</div>
<!--====== End - Main App ======-->


<!--====== Google Analytics: change UA-XXXXX-Y to be your site's ID ======-->
<script>
    window.ga = function() {
        ga.q.push(arguments)
    };
    ga.q = [];
    ga.l = +new Date;
    ga('create', 'UA-XXXXX-Y', 'auto');
    ga('send', 'pageview')
</script>
<script src="https://www.google-analytics.com/analytics.js" async defer></script>

<!--====== Vendor Js ======-->
<script src="js/vendor.js"></script>

<!--====== jQuery Shopnav plugin ======-->
<script src="js/jquery.shopnav.js"></script>

<!--====== App ======-->
<script src="js/app.js"></script>

<!--====== Noscript ======-->
<noscript>
    <div class="app-setting">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="app-setting__wrap">
                        <h1 class="app-setting__h1">JavaScript is disabled in your browser.</h1>

                        <span class="app-setting__text">Please enable JavaScript in your browser or upgrade to a JavaScript-capable browser.</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
</noscript>
</body>

</html>


<?php
include("footer.php")
?>