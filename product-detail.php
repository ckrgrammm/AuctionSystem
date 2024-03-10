<?php
$title = "Product Detail";
session_start();
require_once 'auth_validate.php';
include("header.php");
$productId = isset($_GET['productId']) ? $_GET['productId'] : '';
$category = isset($_GET['category']) ? $_GET['category'] : '';

?>


<!--====== App Content ======-->
<div class="app-content">

    <!--====== Section 1 ======-->
    <div class="u-s-p-t-90">
        <div class="container">
            <div class="row">
                <div class="col-lg-5">

                    <!--====== Product Breadcrumb ======-->
                    <div class="pd-breadcrumb u-s-m-b-30">
                        <ul class="pd-breadcrumb__list">
                            <li class="has-separator">
                                <a href="index.php">Home</a>
                            </li>
                            <li class="has-separator">
                                <a href="shop-side-version-2.php?category=<?= $category; ?>"><?= $category; ?></a>
                            </li>
                            <li class="product-title">
                                <a href="product-detail.php?category=<?= $category; ?>&productId=<?= $productId; ?>"></a>
                            </li>
                        </ul>
                    </div>
                    <!--====== End - Product Breadcrumb ======-->


                    <!--====== Product Detail Zoom ======-->
                    <div class="pd u-s-m-b-30">
                        <div class="slider-fouc pd-wrap">
                            <div id="pd-o-initiate">
                                <div class="pd-o-img-wrap" data-src="">
                                    <img class="u-img-fluid" src="" data-zoom-image="" alt="">
                                </div>
                            </div>
                        </div>
                        <div class="u-s-m-t-15">
                            <div class="slider-fouc">
                                <div id="pd-o-thumbnail">
                                    
                                </div>
                            </div>
                        </div>
                    </div>
                    <!--====== End - Product Detail Zoom ======-->
                </div>
                <div class="col-lg-7">

                    <!--====== Product Right Side Details ======-->
                    <div class="pd-detail">
                        <div>

                            <span class="pd-detail__name"></span>
                        </div>
                        <div>
                            <div class="pd-detail__inline">

                                <span class="pd-detail__price"></span>

                            </div>
                        </div>
                        <div class="u-s-m-b-15">

                            <span class="pd-detail__preview-desc"></span>
                        </div>
                        <div class="u-s-m-b-15">
                            <form class="pd-detail__form">
                                <div class="pd-detail-inline-2">
                                    <div class="u-s-m-b-15">
                                        <button class="btn btn--e-brand-b-2 bid-btn" type="submit">Bid</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                        <div class="u-s-m-b-15">

                            <span class="pd-detail__label u-s-m-b-8">Product Policy:</span>
                            <ul class="pd-detail__policy-list">
                                <li><i class="fas fa-check-circle u-s-m-r-8"></i>

                                    <span>Buyer Protection.</span>
                                </li>
                                <li><i class="fas fa-check-circle u-s-m-r-8"></i>

                                    <span>Full Refund if you don't receive your order.</span>
                                </li>
                                <li><i class="fas fa-check-circle u-s-m-r-8"></i>

                                    <span>Returns accepted if product not as described.</span>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <!--====== End - Product Right Side Details ======-->
                </div>
            </div>
        </div>
    </div>

    <!--====== Product Detail Tab ======-->
    <div class="u-s-p-y-90">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="pd-tab">
                        <div class="u-s-m-b-30">
                            <ul class="nav pd-tab__list">
                                <li class="nav-item">
                                    <a class="nav-link active" data-toggle="tab" href="#pd-desc">DESCRIPTION</a>
                                </li>
                            </ul>
                        </div>
                        <div class="tab-content">

                            <!--====== Tab 1 ======-->
                            <div class="tab-pane fade show active" id="pd-desc">
                                <div class="pd-tab__desc">
                                    <div class="u-s-m-b-15 prod-desc">
                                        <p></p>
                                    </div>
                                    <br>
                                    
                                    <div class="u-s-m-b-15">
                                        <h4>PRODUCT INFORMATION</h4>
                                    </div>
                                    <div class="u-s-m-b-15">
                                        <div class="pd-table gl-scroll">
                                            <table>
                                                <tbody>
                                                    
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!--====== End - Tab 1 ======-->

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

</div>
<!--====== End - App Content ======-->


<!--====== Modal Section ======-->


<!--====== Quick Look Modal ======-->
<div class="modal fade" id="quick-look">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content modal--shadow">

            <button class="btn dismiss-button fas fa-times" type="button" data-dismiss="modal"></button>
            <div class="modal-body">
                <div class="row">
                    <div class="col-lg-5">

                        <!--====== Product Breadcrumb ======-->
                        <div class="pd-breadcrumb u-s-m-b-30">
                            <ul class="pd-breadcrumb__list">
                                <li class="has-separator">

                                    <a href="index.hml">Home</a>
                                </li>
                                <li class="has-separator">

                                    <a href="shop-side-version-2.php">Electronics</a>
                                </li>
                                <li class="has-separator">

                                    <a href="shop-side-version-2.php">DSLR Cameras</a>
                                </li>
                                <li class="is-marked">

                                    <a href="shop-side-version-2.php">Nikon Cameras</a>
                                </li>
                            </ul>
                        </div>
                        <!--====== End - Product Breadcrumb ======-->


                        <!--====== Product Detail ======-->
                        <div class="pd u-s-m-b-30">
                            <div class="pd-wrap">
                                <div id="js-product-detail-modal">
                                    <div>

                                        <img class="u-img-fluid" src="images/product/product-d-1.jpg" alt="">
                                    </div>
                                    <div>

                                        <img class="u-img-fluid" src="images/product/product-d-2.jpg" alt="">
                                    </div>
                                    <div>

                                        <img class="u-img-fluid" src="images/product/product-d-3.jpg" alt="">
                                    </div>
                                    <div>

                                        <img class="u-img-fluid" src="images/product/product-d-4.jpg" alt="">
                                    </div>
                                    <div>

                                        <img class="u-img-fluid" src="images/product/product-d-5.jpg" alt="">
                                    </div>
                                </div>
                            </div>
                            <div class="u-s-m-t-15">
                                <div id="js-product-detail-modal-thumbnail">
                                    <div>

                                        <img class="u-img-fluid" src="images/product/product-d-1.jpg" alt="">
                                    </div>
                                    <div>

                                        <img class="u-img-fluid" src="images/product/product-d-2.jpg" alt="">
                                    </div>
                                    <div>

                                        <img class="u-img-fluid" src="images/product/product-d-3.jpg" alt="">
                                    </div>
                                    <div>

                                        <img class="u-img-fluid" src="images/product/product-d-4.jpg" alt="">
                                    </div>
                                    <div>

                                        <img class="u-img-fluid" src="images/product/product-d-5.jpg" alt="">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!--====== End - Product Detail ======-->
                    </div>
                    <div class="col-lg-7">

                        <!--====== Product Right Side Details ======-->
                        <div class="pd-detail">
                            <div>

                                <span class="pd-detail__name">Nikon Camera 4k Lens Zoom Pro</span>
                            </div>
                            <div>
                                <div class="pd-detail__inline">

                                    <span class="pd-detail__price">$6.99</span>

                                    <span class="pd-detail__discount">(76% OFF)</span><del class="pd-detail__del">$28.97</del>
                                </div>
                            </div>
                            <div class="u-s-m-b-15">
                                <div class="pd-detail__rating gl-rating-style"><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star-half-alt"></i>

                                    <span class="pd-detail__review u-s-m-l-4">

                                        <a href="product-detail.php">23 Reviews</a></span>
                                </div>
                            </div>
                            <div class="u-s-m-b-15">
                                <div class="pd-detail__inline">

                                    <span class="pd-detail__stock">200 in stock</span>

                                    <span class="pd-detail__left">Only 2 left</span>
                                </div>
                            </div>
                            <div class="u-s-m-b-15">

                                <span class="pd-detail__preview-desc">Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.</span>
                            </div>
                            <div class="u-s-m-b-15">
                                <div class="pd-detail__inline">

                                    <span class="pd-detail__click-wrap"><i class="far fa-heart u-s-m-r-6"></i>

                                        <a href="signin.php">Add to Wishlist</a>

                                        <span class="pd-detail__click-count">(222)</span></span>
                                </div>
                            </div>
                            
                           
                            <div class="u-s-m-b-15">
                                <form class="pd-detail__form">
                                    <div class="pd-detail-inline-2">
                                        <div class="u-s-m-b-15">

                                            <!--====== Input Counter ======-->
                                            <div class="input-counter">

                                                <span class="input-counter__minus fas fa-minus"></span>

                                                <input class="input-counter__text input-counter--text-primary-style" type="text" value="1" data-min="1" data-max="1000">

                                                <span class="input-counter__plus fas fa-plus"></span>
                                            </div>
                                            <!--====== End - Input Counter ======-->
                                        </div>
                                        <div class="u-s-m-b-15">

                                            <button class="btn btn--e-brand-b-2" type="submit">Add to Cart</button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                            <div class="u-s-m-b-15">

                                <span class="pd-detail__label u-s-m-b-8">Product Policy:</span>
                                <ul class="pd-detail__policy-list">
                                    <li><i class="fas fa-check-circle u-s-m-r-8"></i>

                                        <span>Buyer Protection.</span>
                                    </li>
                                    <li><i class="fas fa-check-circle u-s-m-r-8"></i>

                                        <span>Returns accepted if product not as described.</span>
                                    </li>
                                </ul>
                            </div>
                        </div>
                        <!--====== End - Product Right Side Details ======-->
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!--====== End - Quick Look Modal ======-->


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

<script type="module">
    import { db } from './firebase/firebaseInit.js';
    import { doc, getDoc } from "https://www.gstatic.com/firebasejs/9.6.10/firebase-firestore.js";

    async function getProductDetails(productId) {
        // Get a reference to the product document
        const productRef = doc(db, "products", productId);
        const productImageElement = document.querySelector('.pd-o-img-wrap img');
        const productTitleElement = document.querySelector('.product-title a');
        const productImageWrap = productImageElement.closest('.pd-o-img-wrap');
        const productInfoTableBody = document.querySelector('.pd-table tbody');
        
        try {
            // Fetch the document from Firestore
            const docSnap = await getDoc(productRef);

            // Check if the document exists
            if (docSnap.exists()) {
                // Get the data of the document
                const productData = docSnap.data();

                document.querySelector('.pd-detail__name').textContent = productData.title;
                document.querySelector('.pd-detail__price').textContent = `$${productData.currentBid}`;
                document.querySelector('.pd-detail__preview-desc').textContent = productData.description;
                // Set the image if you have an image element
                productImageElement.src = productData.imageUrl;
                productImageElement.setAttribute('data-zoom-image', productData.imageUrl);
                productImageWrap.setAttribute('data-src', productData.imageUrl);

                productTitleElement.textContent = productData.title;

                document.querySelector('.prod-desc p').textContent = productData.description;
                if(productInfoTableBody) {
                    const productInfoHtml = `
                        <tr>
                            <td>Item Name</td>
                            <td>${productData.title || 'N/A'}</td>
                        </tr>
                        <tr>
                            <td>Item Initial Price</td>
                            <td>${productData.startPrice || 'N/A'}</td>
                        </tr>
                        <tr>
                            <td>Item Category</td>
                            <td>${productData.category || 'N/A'}</td>
                        </tr>
                        <tr>
                            <td>Item Status</td>
                            <td>${productData.status || 'N/A'}</td>
                        </tr>
                        <tr>
                            <td>Start Time</td>
                            <td>${new Date(productData.startTime).toLocaleString() || 'N/A'}</td>
                        </tr>
                        <tr>
                            <td>End Time</td>
                            <td>${new Date(productData.endTime).toLocaleString() || 'N/A'}</td>
                        </tr>
                    `;
                    productInfoTableBody.innerHTML = productInfoHtml;
                }
                // Add more fields as needed...

            } else {
                // doc.data() will be undefined in this case
                console.log("No such document!");
            }
        } catch (error) {
            console.error("Error getting document:", error);
        }
    }

    // Assuming the productId is obtained from the URL as you mentioned
    const productId = "<?= $productId; ?>";
    if (productId) {
        getProductDetails(productId);
    }

</script>

<script>
    var isLoggedIn = <?= json_encode(isset($_SESSION['user_logged_in']) && $_SESSION['user_logged_in']); ?>;
    const productId = "<?= $productId; ?>";
    
    // Add event listener to handle bid button clicks
    document.addEventListener('click', function(event) {
        if (event.target.classList.contains('bid-btn')) {
            event.preventDefault();
            if (!isLoggedIn) {
                alert('Please log in to place a bid.');
            } else {
                window.location.href = `checkout.php?productId=${productId}`;
            }
        }
    });
</script>