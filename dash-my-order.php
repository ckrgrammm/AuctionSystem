<?php
$title = "Order";
session_start();
require_once 'auth_validate.php';
include("header.php");

?>

<style>
    .description__img-wrap {
        width: 100px; /* Set a fixed width */
        height: 100px; /* Set a fixed height */
        border-radius: 50%; /* Makes it round */
        overflow: hidden; /* Ensures the image doesn't break out of the boundary */
        display: flex; /* Enables the use of flex properties for centering */
        justify-content: center; /* Centers horizontally */
        align-items: center; /* Centers vertically */
    }

    .description__img-wrap img {
        width: 100%; /* Ensures the image covers the available width */
        height: auto; /* Maintains aspect ratio */
        min-height: 100%; /* Ensures the image covers the height */
        object-fit: cover; /* Ensures the image covers the area without distorting aspect ratio */
    }
</style>

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

                                        <a href="dash-my-order.html">My Account</a></li>
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
                                                    <a href="dash-my-profile.php">My Profile</a>
                                                </li>
                                                <li>
                                                    <a class="dash-active" href="dash-my-order.php">My Orders</a>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                    <!--====== End - Dashboard Features ======-->
                                </div>
                                <div class="col-lg-9 col-md-12">
                                    <div class="dash__box dash__box--shadow dash__box--radius dash__box--bg-white u-s-m-b-30">
                                        <div class="dash__pad-2">
                                            <h1 class="dash__h1 u-s-m-b-14">My Orders</h1>

                                            <span class="dash__text u-s-m-b-30">Here you can see all products that have been delivered.</span>
                                            
                                            <div class="m-order__list">
                                                
                                            </div>
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
        import { collection, query, where, getDocs, doc, getDoc } from "https://www.gstatic.com/firebasejs/9.6.10/firebase-firestore.js";

        // This function will fetch and render the payments and their related product details
        async function renderMyPayments(userId) {
            const paymentsCollectionRef = collection(db, "payments");
            const q = query(paymentsCollectionRef, where("buyerId", "==", userId));
            
            const paymentsSnapshot = await getDocs(q);

            let paymentsHtml = '';

            for (const paymentDoc of paymentsSnapshot.docs) {
                const paymentData = paymentDoc.data();

                const shipmentCollectionRef = collection(db, "payments", paymentDoc.id, "shipments");
                const shipmentSnapshot = await getDocs(shipmentCollectionRef);

                const productRef = doc(db, "products", paymentData.productId);
                const productSnap = await getDoc(productRef);

                if (productSnap.exists()) {
                    const productData = productSnap.data();

                    var orderHtml = `
                        <div class="m-order__get">
                        <div class="manage-o__header u-s-m-b-30">
                            <div class="dash-l-r">
                            <div>
                                <div class="manage-o__text-2 u-c-secondary">Order #${paymentDoc.id}</div>
                                <div class="manage-o__text u-c-silver">Placed on ${paymentData.timestamp}</div>
                            </div>
                            </div>
                        </div>
                        <div class="manage-o__description">
                            <div class="description__container">
                            <div class="description__img-wrap">
                                <img class="u-img-fluid" src="${productData.imageUrl}" alt="${productData.title}">
                            </div>
                            <div class="description-title">${productData.title}</div>
                            </div>
                            <div class="description__info-wrap">
                            <div>
                                <span class="manage-o__badge badge--processing">Processing</span>
                            </div>
                            <div>
                                <span class="manage-o__text-2 u-c-silver">Payment Method: 
                                <span class="manage-o__text-2 u-c-secondary">${paymentData.paymentMethod}</span>
                                </span>
                            </div>
                    `;
                    // Check if there are any shipments in the subcollection
                    if (!shipmentSnapshot.empty) {
                        // Loop over each shipment document
                        shipmentSnapshot.forEach((shipmentDoc) => {
                            const shipmentData = shipmentDoc.data(); // Access the data of each shipment document
                            // Append address details to orderHtml
                            orderHtml += `
                                <div>
                                    <span class="manage-o__text-2 u-c-silver">Address:
                                        <span class="manage-o__text-2 u-c-secondary">
                                            ${shipmentData.streetAddress}, ${shipmentData.city}, ${shipmentData.state}, ${shipmentData.zipCode}, ${shipmentData.country}
                                        </span>
                                    </span>
                                </div>
                            `;
                        });
                    }
                    orderHtml += `
                            <div>
                                <span class="manage-o__text-2 u-c-silver">Total: 
                                <span class="manage-o__text-2 u-c-secondary">$${paymentData.amount}</span>
                                </span>
                            </div>
                            </div>
                        </div>
                        </div>
                    `;
                    paymentsHtml += orderHtml;
                }
            }

            document.querySelector('.m-order__list').innerHTML = paymentsHtml;
        }

        // Call this function on page load with the actual userId
        document.addEventListener('DOMContentLoaded', () => {
            const userId = "<?= $_SESSION['uid'] ?>"; // Replace with actual user id
            renderMyPayments(userId);
        });

    </script>
