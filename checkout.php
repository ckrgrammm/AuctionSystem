<?php
$title = "Payment";
session_start();
require_once 'auth_validate.php';
include("header.php");
$productId = isset($_GET['productId']) ? $_GET['productId'] : '';

?>

<style>
    .o-card__img-wrap {
        width: 60px;  /* or any other size */
        height: 60px; /* or any other size */
        display: flex;
        align-items: center;
        justify-content: center;
        overflow: hidden; /* This will hide any part of the image that exceeds the dimensions */
    }

    .o-card__img-wrap img {
        width: 100%;
        height: auto;
        object-fit: cover; 
        min-height: 100%; /* Ensures the image covers the height */
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

                                        <a href="checkout.php">Checkout</a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!--====== End - Section 1 ======-->

            <!--====== Section 3 ======-->
            <div class="u-s-p-b-60">

                <!--====== Section Content ======-->
                <div class="section__content">
                    <div class="container">
                        <div class="checkout-f">
                            <div class="row">
                                <div class="col-lg-6">
                                    <h1 class="checkout-f__h1">DELIVERY INFORMATION</h1>
                                    <form class="checkout-f__delivery">
                                        <div class="u-s-m-b-30">
                                            <!--====== First Name, Last Name ======-->
                                            <div class="gl-inline">
                                                <div class="u-s-m-b-15">

                                                    <label class="gl-label" for="billing-fname">FIRST NAME *</label>

                                                    <input class="input-text input-text--primary-style" type="text" id="billing-fname" data-bill=""></div>
                                                <div class="u-s-m-b-15">

                                                    <label class="gl-label" for="billing-lname">LAST NAME *</label>

                                                    <input class="input-text input-text--primary-style" type="text" id="billing-lname" data-bill=""></div>
                                            </div>
                                            <!--====== End - First Name, Last Name ======-->


                                            <!--====== E-MAIL ======-->
                                            <div class="u-s-m-b-15">

                                                <label class="gl-label" for="billing-email">E-MAIL *</label>

                                                <input class="input-text input-text--primary-style" type="text" id="billing-email" data-bill=""></div>
                                            <!--====== End - E-MAIL ======-->


                                            <!--====== PHONE ======-->
                                            <div class="u-s-m-b-15">

                                                <label class="gl-label" for="billing-phone">PHONE *</label>

                                                <input class="input-text input-text--primary-style" type="text" id="billing-phone" data-bill=""></div>
                                            <!--====== End - PHONE ======-->


                                            <!--====== Street Address ======-->
                                            <div class="u-s-m-b-15">

                                                <label class="gl-label" for="billing-street">STREET ADDRESS *</label>

                                                <input class="input-text input-text--primary-style" type="text" id="billing-street" placeholder="House name and street name" data-bill=""></div>
                                            <div class="u-s-m-b-15">

                                                <label for="billing-street-optional"></label>

                                                <input class="input-text input-text--primary-style" type="text" id="billing-street-optional" placeholder="Apartment, suite unit etc. (optional)" data-bill=""></div>
                                            <!--====== End - Street Address ======-->


                                            <!--====== Country ======-->
                                            <div class="u-s-m-b-15">

                                                <!--====== Select Box ======-->

                                                <label class="gl-label" for="billing-country">COUNTRY *</label><select class="select-box select-box--primary-style" id="billing-country" data-bill="">
                                                    <option selected value="">Choose Country</option>
                                                    <option value="uae">United Arab Emirate (UAE)</option>
                                                    <option value="uk">United Kingdom (UK)</option>
                                                    <option value="us">United States (US)</option>
                                                </select>
                                                <!--====== End - Select Box ======-->
                                            </div>
                                            <!--====== End - Country ======-->


                                            <!--====== Town / City ======-->
                                            <div class="u-s-m-b-15">

                                                <label class="gl-label" for="billing-town-city">TOWN/CITY *</label>

                                                <input class="input-text input-text--primary-style" type="text" id="billing-town-city" data-bill=""></div>
                                            <!--====== End - Town / City ======-->


                                            <!--====== STATE/PROVINCE ======-->
                                            <div class="u-s-m-b-15">

                                                <!--====== Select Box ======-->

                                                <label class="gl-label" for="billing-state">STATE/PROVINCE *</label><select class="select-box select-box--primary-style" id="billing-state" data-bill="">
                                                    <option selected value="">Choose State/Province</option>
                                                    <option value="al">Alabama</option>
                                                    <option value="al">Alaska</option>
                                                    <option value="ny">New York</option>
                                                </select>
                                                <!--====== End - Select Box ======-->
                                            </div>
                                            <!--====== End - STATE/PROVINCE ======-->


                                            <!--====== ZIP/POSTAL ======-->
                                            <div class="u-s-m-b-15">

                                                <label class="gl-label" for="billing-zip">ZIP/POSTAL CODE *</label>

                                                <input class="input-text input-text--primary-style" type="text" id="billing-zip" placeholder="Zip/Postal Code" data-bill=""></div>
                                            <!--====== End - ZIP/POSTAL ======-->
                                            
                                            
                                            <div class="collapse u-s-m-b-15" id="create-account">

                                                <span class="gl-text u-s-m-b-15">Create an account by entering the information below. If you are a returning customer please login at the top of the page.</span>
                                                <div>

                                                    <label class="gl-label" for="reg-password">Account Password *</label>

                                                    <input class="input-text input-text--primary-style" type="text" data-bill id="reg-password"></div>
                                            </div>
                                            <div class="u-s-m-b-10">

                                                <label class="gl-label" for="order-note">ORDER NOTE</label><textarea class="text-area text-area--primary-style" id="order-note"></textarea></div>
                                        </div>
                                    </form>
                                </div>
                                <div class="col-lg-6">
                                    <h1 class="checkout-f__h1">ORDER SUMMARY</h1>

                                    <!--====== Order Summary ======-->
                                    <div class="o-summary">
                                        <div class="o-summary__section u-s-m-b-30">
                                            <div class="o-summary__item-wrap gl-scroll">
                                                <div class="o-card">
                                                    <div class="o-card__flex">
                                                        <div class="o-card__img-wrap">
                                                            <img class="u-img-fluid" src="" alt="">
                                                        </div>
                                                        <div class="o-card__info-wrap">
                                                            <span class="o-card__name">
                                                                <a href=""></a></span>
                                                            <span class="o-card__quantity"></span>

                                                            <span class="o-card__price"></span>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="o-summary__section u-s-m-b-30">
                                            <div class="o-summary__box">
                                                <table class="o-summary__table">
                                                    <tbody>
                                                        <tr>
                                                            <td>SHIPPING</td>
                                                            <td id="shipping-cost"></td>
                                                        </tr>
                                                        <tr>
                                                            <td>TAX</td>
                                                            <td id="tax-amount"></td>
                                                        </tr>
                                                        <tr>
                                                            <td>SUBTOTAL</td>
                                                            <td id="subtotal-amount"></td>
                                                        </tr>
                                                        <tr>
                                                            <td>GRAND TOTAL</td>
                                                            <td id="grand-total"></td>
                                                        </tr>
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                        <div class="o-summary__section u-s-m-b-30">
                                            <div class="o-summary__box">
                                                <h1 class="checkout-f__h1">PAYMENT INFORMATION</h1>
                                                <form class="checkout-f__payment" method="post">
                                                    <div class="u-s-m-b-10">

                                                        <!--====== Radio Box ======-->
                                                        <div class="radio-box">

                                                            <input type="radio" id="cash-on-delivery" name="payment">
                                                            <div class="radio-box__state radio-box__state--primary">

                                                                <label class="radio-box__label" for="cash-on-delivery">Cash on Delivery</label></div>
                                                        </div>
                                                        <!--====== End - Radio Box ======-->

                                                        <span class="gl-text u-s-m-t-6">Pay Upon Cash on delivery. (This service is only available for some countries)</span>
                                                    </div>
                                                    <div class="u-s-m-b-10">

                                                        <!--====== Radio Box ======-->
                                                        <div class="radio-box">

                                                            <input type="radio" id="direct-bank-transfer" name="payment">
                                                            <div class="radio-box__state radio-box__state--primary">

                                                                <label class="radio-box__label" for="direct-bank-transfer">Direct Bank Transfer</label></div>
                                                        </div>
                                                        <!--====== End - Radio Box ======-->

                                                        <span class="gl-text u-s-m-t-6">Make your payment directly into our bank account. Please use your Order ID as the payment reference. Your order will not be shipped until the funds have cleared in our account.</span>
                                                    </div>
                                                    <div class="u-s-m-b-10">

                                                        <!--====== Radio Box ======-->
                                                        <div class="radio-box">

                                                            <input type="radio" id="pay-with-check" name="payment">
                                                            <div class="radio-box__state radio-box__state--primary">

                                                                <label class="radio-box__label" for="pay-with-check">Pay With Check</label></div>
                                                        </div>
                                                        <!--====== End - Radio Box ======-->

                                                        <span class="gl-text u-s-m-t-6">Please send a check to Store Name, Store Street, Store Town, Store State / County, Store Postcode.</span>
                                                    </div>
                                                    <div class="u-s-m-b-10">

                                                        <!--====== Radio Box ======-->
                                                        <div class="radio-box">

                                                            <input type="radio" id="pay-with-card" name="payment">
                                                            <div class="radio-box__state radio-box__state--primary">

                                                                <label class="radio-box__label" for="pay-with-card">Pay With Credit / Debit Card</label></div>
                                                        </div>
                                                        <!--====== End - Radio Box ======-->

                                                        <span class="gl-text u-s-m-t-6">International Credit Cards must be eligible for use within the United States.</span>
                                                    </div>
                                                    <div class="u-s-m-b-10">

                                                        <!--====== Radio Box ======-->
                                                        <div class="radio-box">

                                                            <input type="radio" id="pay-pal" name="payment">
                                                            <div class="radio-box__state radio-box__state--primary">

                                                                <label class="radio-box__label" for="pay-pal">Pay Pal</label></div>
                                                        </div>
                                                        <!--====== End - Radio Box ======-->

                                                        <span class="gl-text u-s-m-t-6">When you click "Place Order" below we'll take you to Paypal's site to set up your billing information.</span>
                                                    </div>
                                                    <div class="u-s-m-b-15">

                                                        <!--====== Check Box ======-->
                                                        <div class="check-box">

                                                            <input type="checkbox" id="term-and-condition">
                                                            <div class="check-box__state check-box__state--primary">

                                                                <label class="check-box__label" for="term-and-condition">I consent to the</label></div>
                                                        </div>
                                                        <!--====== End - Check Box ======-->

                                                        <a class="gl-link">Terms of Service.</a>
                                                    </div>
                                                    <div>

                                                        <button class="btn btn--e-brand-b-2" type="submit">PLACE ORDER</button></div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                    <!--====== End - Order Summary ======-->
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!--====== End - Section Content ======-->
            </div>
            <!--====== End - Section 3 ======-->
        </div>
        <!--====== End - App Content ======-->
        
    </div>
    <!--====== End - Main App ======-->



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
    import { doc, collection, setDoc, getDoc, addDoc, updateDoc } from "https://www.gstatic.com/firebasejs/9.6.10/firebase-firestore.js";

    async function getProductDetails(productId) {
        if (!productId) {
            console.error('Product ID is not provided');
            return;
        }
        const productRef = doc(db, "products", productId);

        try {
            const productSnap = await getDoc(productRef);

            if (productSnap.exists()) {
                const productData = productSnap.data();

                // Update the image
                const productImageElement = document.querySelector('.o-card__img-wrap img');
                if (productImageElement) {
                    productImageElement.src = productData.imageUrl;
                    productImageElement.alt = productData.title;
                }

                // Update the title
                const productTitleElement = document.querySelector('.o-card__name a');
                if (productTitleElement) {
                    productTitleElement.textContent = productData.title;
                    productTitleElement.href = `product-detail.php?category=${productData.category}&productId=${productId}`;
                }

                // Update the price
                const productPriceElement = document.querySelector('.o-card__price');
                if (productPriceElement) {
                    productPriceElement.textContent = `$${productData.currentBid}`;
                }

                // Update the quantity
                const productQuantityElement = document.querySelector('.o-card__quantity');
                if (productQuantityElement) {
                    productQuantityElement.textContent = `${productData.description}`;
                }

                const shippingCost = 5;
                const taxRate = 0.06; // 6%

                // Calculate tax based on the current bid
                const taxAmount = productData.currentBid * taxRate;

                // Calculate the total before tax and shipping
                const subtotalAmount = productData.currentBid;

                // Calculate the grand total
                const grandTotal = subtotalAmount + taxAmount + shippingCost;

                // Update the DOM with the new values
                document.getElementById('shipping-cost').textContent = `$${shippingCost.toFixed(2)}`;
                document.getElementById('tax-amount').textContent = `$${taxAmount.toFixed(2)}`;
                document.getElementById('subtotal-amount').textContent = `$${subtotalAmount.toFixed(2)}`;
                document.getElementById('grand-total').textContent = `$${grandTotal.toFixed(2)}`;

                // Update other elements as needed...
            } else {
                console.error("No such product!");
            }
        } catch (error) {
            console.error("Error getting product:", error);
        }
    }

    const productId = "<?= $productId ?>";
    document.addEventListener('DOMContentLoaded', (event) => {
        // This code will run after the DOM is fully loaded
        // Call getProductDetails here if you need to display product details on page load
        // If productId is needed for display on page load
        if (productId) {
            getProductDetails(productId);
        }
    });

    // Assuming you have session UID available as 'sessionUID'
    const sessionUID = "<?= $_SESSION['uid'] ?>";

    async function savePaymentAndShipmentInfo(productId, sessionUID) {
        // Step 1: Gather form information
        const deliveryForm = document.querySelector('.checkout-f__delivery');
        const paymentForm = document.querySelector('.checkout-f__payment');
        
        const deliveryInfo = {
            firstName: deliveryForm.querySelector('#billing-fname').value,
            lastName: deliveryForm.querySelector('#billing-lname').value,
            email: deliveryForm.querySelector('#billing-email').value,
            phone: deliveryForm.querySelector('#billing-phone').value,
            streetAddress: deliveryForm.querySelector('#billing-street').value,
            apartment: deliveryForm.querySelector('#billing-street-optional').value,
            country: deliveryForm.querySelector('#billing-country').value,
            city: deliveryForm.querySelector('#billing-town-city').value,
            state: deliveryForm.querySelector('#billing-state').value,
            zipCode: deliveryForm.querySelector('#billing-zip').value,
        };

        // Step 2: Use the product ID to fetch the product's current bid
        const productRef = doc(db, "products", productId);
        const productSnap = await getDoc(productRef);
        let currentBid = 0;
        let grandTotal;
        if (productSnap.exists()) {
            currentBid = productSnap.data().currentBid;
            const shippingCost = 5;
            const taxRate = 0.06; // 6%

            // Calculate tax based on the current bid
            const taxAmount = currentBid * taxRate;

            // Calculate the total before tax and shipping
            const subtotalAmount = currentBid;

            // Calculate the grand total
            grandTotal = subtotalAmount + taxAmount + shippingCost;

            const updateData = {
                status: "sold"
            };
            await updateDoc(productRef, updateData);
        } else {
            console.error("Product not found");
            return;
        }
        
        // Step 3: Retrieve the selected payment method
        const selectedPaymentMethod = paymentForm.querySelector('input[name="payment"]:checked').id;

        // Step 4: Create a new payments document with the necessary information
        const paymentRef = await addDoc(collection(db, "payments"), {
            amount: grandTotal.toString(),
            buyerId: sessionUID,
            paymentMethod: selectedPaymentMethod,
            productId: productId,
            timestamp: new Date().toLocaleString()
        });

        // Step 5: Add a shipments subcollection to the new payments document with the delivery information
        await addDoc(collection(db, "payments", paymentRef.id, "shipments"), deliveryInfo);

        alert("Payment Successfully")
        // Step 6: Redirect the user to the payment history page
        window.location.href = `dash-my-order.php`;
    }

    // Call this function when the user submits the form
    const placeOrderButton = document.querySelector('.checkout-f__payment button[type="submit"]'); // Ensure this selector targets the correct button
    placeOrderButton.addEventListener('click', async (e) => {
        e.preventDefault();
        await savePaymentAndShipmentInfo(productId, sessionUID);
    });

</script>
