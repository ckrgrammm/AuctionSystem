<?php
$title = "Profile";
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

                                        <a href="dash-my-profile.html">My Account</a></li>
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

                                            <span class="dash__text u-s-m-b-16">Account</span>
                                            <ul class="dash__f-list">
                                                <li>
                                                    <a class="dash-active" href="dash-my-profile.php">My Profile</a>
                                                </li>
                                                <li>
                                                    <a href="dash-my-order.php">My Orders</a>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                    <!--====== End - Dashboard Features ======-->
                                </div>
                                <div class="col-lg-9 col-md-12">
                                    <div class="dash__box dash__box--shadow dash__box--radius dash__box--bg-white u-s-m-b-30">
                                        <div class="dash__pad-2">
                                            <h1 class="dash__h1 u-s-m-b-14">My Profile</h1>

                                            <span class="dash__text u-s-m-b-30">Look all your info, you could customize your profile.</span>
                                            <div class="row">
                                                <div class="col-lg-4 u-s-m-b-30">
                                                    <h2 class="dash__h2 u-s-m-b-8">Full Name</h2>

                                                    <span class="dash__text text_username"></span>
                                                </div>
                                                <div class="col-lg-4 u-s-m-b-30">
                                                    <h2 class="dash__h2 u-s-m-b-8">E-mail</h2>

                                                    <span class="dash__text text_email"></span>
                                                </div>
                                                <div class="col-lg-4 u-s-m-b-30">
                                                    <h2 class="dash__h2 u-s-m-b-8">Status</h2>

                                                    <span class="dash__text text_status"></span>
                                                </div>
                                            </div>
                                            <!-- <div class="row">
                                                <div class="col-lg-12">
                                                    <div class="u-s-m-b-16">

                                                        <a class="dash__custom-link btn--e-transparent-brand-b-2" href="dash-edit-profile.html">Edit Profile</a></div>
                                                    <div>

                                                        <a class="dash__custom-link btn--e-brand-b-2" href="#">Change Password</a></div>
                                                </div>
                                            </div> -->
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

    <?php
        include("footer.php");
    ?>

<script type="module">
    import { db } from './firebase/firebaseInit.js';
    import { doc, getDoc } from "https://www.gstatic.com/firebasejs/9.6.10/firebase-firestore.js";

    async function fetchAndDisplayUserProfile(userId, userRole) {
        // Construct the correct collection name based on user role
        const collectionName = userRole; // "auctioneers", "bidders", or "admins"
        
        // Reference to the user's document in the Firestore collection
        const userDocRef = doc(db, collectionName, userId);

        try {
            // Fetch the document for the user
            const userDocSnap = await getDoc(userDocRef);

            if (userDocSnap.exists()) {
                // Extract the data from the snapshot
                const userData = userDocSnap.data();

                // Display the user data on the page
                document.querySelector('.text_username').textContent = userData.firstName + " " + userData.lastName || 'admin';
                document.querySelector('.text_email').textContent = userData.email || '';
                document.querySelector('.text_status').textContent = userData.status || '';
                // Add other fields as necessary
            } else {
                console.log("No such user!");
            }
        } catch (error) {
            console.error("Error fetching user data: ", error);
        }
    }

    // Call this function on page load
    document.addEventListener('DOMContentLoaded', () => {
        const userId = <?= json_encode($_SESSION['uid']) ?>; // Ensure this outputs a string
        const userRole = <?= json_encode($_SESSION['status']) ?>; // Ensure this outputs a string
        // Fetch and display user profile information
        fetchAndDisplayUserProfile(userId, userRole);
    });
</script>


