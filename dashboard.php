<?php

include("header.php");
?>


<!--====== App Content ======-->
<div class="app-content">

    <!--====== Section 1 ======-->
    <div class="u-s-p-y-60">

        <!--====== Section Content ======-->
        <div class="section__content">
            <div class="container">
                <div class="breadcrumb">
                    <div class="breadcrumb__wrap">
                        <ul class="breadcrumb__list">
                            <li class="has-separator">

                                <a href="index.php">Home</a>
                            </li>
                            <li class="is-marked">

                                <a href="dashboard.html">My Account</a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--====== End - Section 1 ======-->


    <!--====== Section 2 ======-->
    <div class="u-s-p-b-60">

        <!--====== Section Content ======-->
        <div class="section__content">
            <div class="dash">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-3 col-md-12">

                            <!--====== Dashboard Features ======-->
                            <div class="dash__box dash__box--bg-white dash__box--shadow u-s-m-b-30">
                                <div class="dash__pad-1">

                                    <span class="dash__text u-s-m-b-16">Hello, John Doe</span>
                                    <ul class="dash__f-list">
                                        <li>

                                            <a class="dash-active" href="dashboard.html">Manage My Account</a>
                                        </li>
                                        <li>

                                            <a href="dash-my-profile.html">My Profile</a>
                                        </li>
                                        <li>

                                            <a href="dash-address-book.html">Address Book</a>
                                        </li>
                                        <li>

                                            <a href="dash-track-order.html">Track Order</a>
                                        </li>
                                        <li>

                                            <a href="dash-my-order.html">My Orders</a>
                                        </li>
                                        <li>

                                            <a href="dash-payment-option.html">My Payment Options</a>
                                        </li>
                                        <li>

                                            <a href="dash-cancellation.html">My Returns & Cancellations</a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                            <div class="dash__box dash__box--bg-white dash__box--shadow dash__box--w">
                                <div class="dash__pad-1">
                                    <ul class="dash__w-list">
                                        <li>
                                            <div class="dash__w-wrap">

                                                <span class="dash__w-icon dash__w-icon-style-1"><i class="fas fa-cart-arrow-down"></i></span>

                                                <span class="dash__w-text">4</span>

                                                <span class="dash__w-name">Orders Placed</span>
                                            </div>
                                        </li>
                                        <li>
                                            <div class="dash__w-wrap">

                                                <span class="dash__w-icon dash__w-icon-style-2"><i class="fas fa-times"></i></span>

                                                <span class="dash__w-text">0</span>

                                                <span class="dash__w-name">Cancel Orders</span>
                                            </div>
                                        </li>
                                        <li>
                                            <div class="dash__w-wrap">

                                                <span class="dash__w-icon dash__w-icon-style-3"><i class="far fa-heart"></i></span>

                                                <span class="dash__w-text">0</span>

                                                <span class="dash__w-name">Wishlist</span>
                                            </div>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                            <!--====== End - Dashboard Features ======-->
                        </div>
                        <div class="col-lg-9 col-md-12">
                            <div class="dash__box dash__box--shadow dash__box--radius dash__box--bg-white u-s-m-b-30">
                                <div class="dash__pad-2">
                                    <h1 class="dash__h1 u-s-m-b-14">Manage My Account</h1>

                                    <span class="dash__text u-s-m-b-30">From your My Account Dashboard you have the ability to view a snapshot of your recent account activity and update your account information. Select a link below to view or edit information.</span>
                                    <div class="row">
                                        <div class="col-lg-4 u-s-m-b-30">
                                            <div class="dash__box dash__box--bg-grey dash__box--shadow-2 u-h-100">
                                                <div class="dash__pad-3">
                                                    <h2 class="dash__h2 u-s-m-b-8">PERSONAL PROFILE</h2>
                                                    <div class="dash__link dash__link--secondary u-s-m-b-8">

                                                        <a href="dash-edit-profile.html">Edit</a>
                                                    </div>

                                                    <span class="dash__text">John Doe</span>

                                                    <span class="dash__text">johndoe@domain.com</span>
                                                    <div class="dash__link dash__link--secondary u-s-m-t-8">

                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-lg-4 u-s-m-b-30">
                                            <div class="dash__box dash__box--bg-grey dash__box--shadow-2 u-h-100">
                                                <div class="dash__pad-3">
                                                    <h2 class="dash__h2 u-s-m-b-8">ADDRESS BOOK</h2>

                                                    <span class="dash__text-2 u-s-m-b-8">Default Shipping Address</span>
                                                    <div class="dash__link dash__link--secondary u-s-m-b-8">

                                                        <a href="dash-address-book.html">Edit</a>
                                                    </div>

                                                    <span class="dash__text">4247 Ashford Drive Virginia - VA-20006 - USA</span>

                                                    <span class="dash__text">(+0) 900901904</span>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-lg-4 u-s-m-b-30">
                                            <div class="dash__box dash__box--bg-grey dash__box--shadow-2 u-h-100">
                                                <div class="dash__pad-3">
                                                    <h2 class="dash__h2 u-s-m-b-8">BILLING ADDRESS</h2>

                                                    <span class="dash__text-2 u-s-m-b-8">Default Billing Address</span>

                                                    <span class="dash__text">4247 Ashford Drive Virginia - VA-20006 - USA</span>

                                                    <span class="dash__text">(+0) 900901904</span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="dash__box dash__box--shadow dash__box--bg-white dash__box--radius">
                                <h2 class="dash__h2 u-s-p-xy-20">RECENT ORDERS</h2>
                                <div class="dash__table-wrap gl-scroll">
                                    <table class="dash__table">
                                        <thead>
                                            <tr>
                                                <th>Order #</th>
                                                <th>Placed On</th>
                                                <th>Items</th>
                                                <th>Total</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td>3054231326</td>
                                                <td>26/13/2016</td>
                                                <td>
                                                    <div class="dash__table-img-wrap">

                                                        <img class="u-img-fluid" src="images/product/electronic/product3.jpg" alt="">
                                                    </div>
                                                </td>
                                                <td>
                                                    <div class="dash__table-total">

                                                        <span>$126.00</span>
                                                        <div class="dash__link dash__link--brand">

                                                            <a href="dash-manage-order.php">MANAGE</a>
                                                        </div>
                                                    </div>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>3054231326</td>
                                                <td>26/13/2016</td>
                                                <td>
                                                    <div class="dash__table-img-wrap">

                                                        <img class="u-img-fluid" src="images/product/electronic/product14.jpg" alt="">
                                                    </div>
                                                </td>
                                                <td>
                                                    <div class="dash__table-total">

                                                        <span>$126.00</span>
                                                        <div class="dash__link dash__link--brand">

                                                            <a href="dash-manage-order.php">MANAGE</a>
                                                        </div>
                                                    </div>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>3054231326</td>
                                                <td>26/13/2016</td>
                                                <td>
                                                    <div class="dash__table-img-wrap">

                                                        <img class="u-img-fluid" src="images/product/men/product8.jpg" alt="">
                                                    </div>
                                                </td>
                                                <td>
                                                    <div class="dash__table-total">

                                                        <span>$126.00</span>
                                                        <div class="dash__link dash__link--brand">

                                                            <a href="dash-manage-order.php">MANAGE</a>
                                                        </div>
                                                    </div>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>3054231326</td>
                                                <td>26/13/2016</td>
                                                <td>
                                                    <div class="dash__table-img-wrap">

                                                        <img class="u-img-fluid" src="images/product/women/product10.jpg" alt="">
                                                    </div>
                                                </td>
                                                <td>
                                                    <div class="dash__table-total">

                                                        <span>$126.00</span>
                                                        <div class="dash__link dash__link--brand">

                                                            <a href="dash-manage-order.php">MANAGE</a>
                                                        </div>
                                                    </div>
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!--====== End - Section Content ======-->
    </div>
    <!--====== End - Section 2 ======-->
</div>
<!--====== End - App Content ======-->


<!--====== Main Footer ======-->
<footer>
    <div class="outer-footer">
        <div class="container">
            <div class="row">
                <div class="col-lg-4 col-md-6">
                    <div class="outer-footer__content u-s-m-b-40">

                        <span class="outer-footer__content-title">Contact Us</span>
                        <div class="outer-footer__text-wrap"><i class="fas fa-home"></i>

                            <span>4247 Ashford Drive Virginia VA-20006 USA</span>
                        </div>
                        <div class="outer-footer__text-wrap"><i class="fas fa-phone-volume"></i>

                            <span>(+0) 900 901 904</span>
                        </div>
                        <div class="outer-footer__text-wrap"><i class="far fa-envelope"></i>

                            <span>contact@domain.com</span>
                        </div>
                        <div class="outer-footer__social">
                            <ul>
                                <li>

                                    <a class="s-fb--color-hover" href="#"><i class="fab fa-facebook-f"></i></a>
                                </li>
                                <li>

                                    <a class="s-tw--color-hover" href="#"><i class="fab fa-twitter"></i></a>
                                </li>
                                <li>

                                    <a class="s-youtube--color-hover" href="#"><i class="fab fa-youtube"></i></a>
                                </li>
                                <li>

                                    <a class="s-insta--color-hover" href="#"><i class="fab fa-instagram"></i></a>
                                </li>
                                <li>

                                    <a class="s-gplus--color-hover" href="#"><i class="fab fa-google-plus-g"></i></a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6">
                    <div class="row">
                        <div class="col-lg-6 col-md-6">
                            <div class="outer-footer__content u-s-m-b-40">

                                <span class="outer-footer__content-title">Information</span>
                                <div class="outer-footer__list-wrap">
                                    <ul>
                                        <li>

                                            <a href="cart.php">Cart</a>
                                        </li>
                                        <li>

                                            <a href="dashboard.html">Account</a>
                                        </li>
                                        <li>

                                            <a href="shop-side-version-2.php">Manufacturer</a>
                                        </li>
                                        <li>

                                            <a href="dash-payment-option.html">Finance</a>
                                        </li>
                                        <li>

                                            <a href="shop-side-version-2.php">Shop</a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-6 col-md-6">
                            <div class="outer-footer__content u-s-m-b-40">
                                <div class="outer-footer__list-wrap">

                                    <span class="outer-footer__content-title">Our Company</span>
                                    <ul>
                                        <li>

                                            <a href="about.html">About us</a>
                                        </li>
                                        <li>

                                            <a href="contact.html">Contact Us</a>
                                        </li>
                                        <li>

                                            <a href="index.php">Sitemap</a>
                                        </li>
                                        <li>

                                            <a href="dash-my-order.html">Delivery</a>
                                        </li>
                                        <li>

                                            <a href="shop-side-version-2.php">Store</a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-12">
                    <div class="outer-footer__content">

                        <span class="outer-footer__content-title">Join our Newsletter</span>
                        <form class="newsletter">
                            <div class="u-s-m-b-15">
                                <div class="radio-box newsletter__radio">

                                    <input type="radio" id="male" name="gender">
                                    <div class="radio-box__state radio-box__state--primary">

                                        <label class="radio-box__label" for="male">Male</label>
                                    </div>
                                </div>
                                <div class="radio-box newsletter__radio">

                                    <input type="radio" id="female" name="gender">
                                    <div class="radio-box__state radio-box__state--primary">

                                        <label class="radio-box__label" for="female">Female</label>
                                    </div>
                                </div>
                            </div>
                            <div class="newsletter__group">

                                <label for="newsletter"></label>

                                <input class="input-text input-text--only-white" type="text" id="newsletter" placeholder="Enter your Email">

                                <button class="btn btn--e-brand newsletter__btn" type="submit">SUBSCRIBE</button>
                            </div>

                            <span class="newsletter__text">Subscribe to the mailing list to receive updates on promotions, new arrivals, discount and coupons.</span>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="lower-footer">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="lower-footer__content">
                        <div class="lower-footer__copyright">

                            <span>Copyright © 2018</span>

                            <a href="index.php">Reshop</a>

                            <span>All Right Reserved</span>
                        </div>
                        <div class="lower-footer__payment">
                            <ul>
                                <li><i class="fab fa-cc-stripe"></i></li>
                                <li><i class="fab fa-cc-paypal"></i></li>
                                <li><i class="fab fa-cc-mastercard"></i></li>
                                <li><i class="fab fa-cc-visa"></i></li>
                                <li><i class="fab fa-cc-discover"></i></li>
                                <li><i class="fab fa-cc-amex"></i></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</footer>

<!--====== Modal Section ======-->


<!--====== Unsubscribe or Subscribe Newsletter ======-->
<div class="modal fade" id="dash-newsletter">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content modal--shadow">
            <div class="modal-body">
                <form class="d-modal__form">
                    <div class="u-s-m-b-15">
                        <h1 class="gl-modal-h1">Newsletter Subscription</h1>

                        <span class="gl-modal-text">I have read and understood</span>

                        <a class="d_modal__link" href="dashboard.html">Ludus Privacy Policy</a>
                    </div>
                    <div class="gl-modal-btn-group">

                        <button class="btn btn--e-brand-b-2" type="submit">SUBSCRIBE</button>

                        <button class="btn btn--e-grey-b-2" type="button" data-dismiss="modal">CANCEL</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<!--====== Unsubscribe or Subscribe Newsletter ======-->
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