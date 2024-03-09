<?php
$title = "Forgot Password";
session_start();
require_once 'auth_validate.php';
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

                                    <a href="index.php">Home</a></li>
                                <li class="is-marked">

                                    <a href="lost-password.html">Reset</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!--====== End - Section 1 ======-->


        <!--====== Section 2 ======-->
        <div class="u-s-p-b-60">

            <!--====== Section Intro ======-->
            <div class="section__intro u-s-m-b-60">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="section__text-wrap">
                                <h1 class="section__heading u-c-secondary">FORGOT PASSWORD?</h1>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!--====== End - Section Intro ======-->


            <!--====== Section Content ======-->
            <div class="section__content">
                <div class="container">
                    <div class="row row--center">
                        <div class="col-lg-6 col-md-8 u-s-m-b-30">
                            <div class="l-f-o">
                                <div class="l-f-o__pad-box">
                                    <h1 class="gl-h1">PASSWORD RESET</h1>

                                    <span class="gl-text u-s-m-b-30">Enter your email or username below and we will send you a link to reset your password.</span>
                                    <form class="l-f-o__form">
                                        <div class="u-s-m-b-30">

                                            <label class="gl-label" for="reset-email">E-MAIL *</label>

                                            <input class="input-text input-text--primary-style" type="email" id="reset-email" placeholder="Enter E-mail"></div>
                                        <div class="u-s-m-b-30">

                                            <button class="btn btn--e-transparent-brand-b-2" type="submit">SUBMIT</button></div>
                                        <div class="u-s-m-b-30">

                                            <a class="gl-link" href="signin.php">Back to Login</a></div>
                                    </form>
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


    <?php
        include("footer.php")
    ?>
    <!--====== Main Footer ======-->

    <!--====== Vendor Js ======-->
    <script src="js/vendor.js"></script>

    <!--====== jQuery Shopnav plugin ======-->
    <script src="js/jquery.shopnav.js"></script>

    <!--====== App ======-->
    <script src="js/app.js"></script>

    <script type="module">
        import { auth } from './firebase/firebaseInit.js'; 
        import { sendPasswordResetEmail } from "https://www.gstatic.com/firebasejs/9.6.10/firebase-auth.js";

        document.querySelector('.l-f-o__form').addEventListener('submit', async function (e) {
            e.preventDefault();

            const email = document.querySelector('#reset-email').value;

            sendPasswordResetEmail(auth, email).then(function() {
                // Email sent.
                // console.log("Reset email sent successfully to: " + email);
                // You can replace this log with a user-friendly message in your application's UI.
            }).catch(function(error) {
                // An error happened.
                console.error(error);
                // You should display a user-friendly error message.
            });
        });
    </script>
