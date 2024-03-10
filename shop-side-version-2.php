<?php
$title = "Product";
session_start();
require_once 'auth_validate.php';
include("header.php");
$category = isset($_GET['category']) ? $_GET['category'] : '';

?>


    <!--====== App Content ======-->
    <div class="app-content">

        <!--====== Section 1 ======-->
        <div class="u-s-p-y-90">
            <div class="container">
                <div class="row">
                    
                    <div class="col-lg-12 col-md-12">
                        <div class="shop-p">
                            <div class="shop-p__toolbar u-s-m-b-30">
                                
                                <div class="shop-p__tool-style">
                                    <div class="tool-style__group u-s-m-b-8">

                                        <span class="js-shop-grid-target is-active">Grid</span>

                                        <span class="js-shop-list-target">List</span></div>
                                    <form>
                                        
                                    </form>
                                </div>
                            </div>
                            <div class="shop-p__collection">
                                <div class="row is-grid-active">
                                    <!-- product card -->
                                   
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!--====== End - Section 1 ======-->
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

</body>
</html>

<?php
include("footer.php");
?>

<script type="module">
    // Importing the necessary functions from Firebase
    import { db } from './firebase/firebaseInit.js';
    import { query, collection, where, getDocs } from "https://www.gstatic.com/firebasejs/9.6.10/firebase-firestore.js";

    const category = "<?= $category ?>";

    async function renderProducts(category) {
        const q = query(collection(db, "products"), 
        where("category", "==", category), 
        where("status", "==", "active"), 
        where("deleted", "==", 0));
        
        const querySnapshot = await getDocs(q);

        querySnapshot.forEach((doc) => {
            createProductCard(doc.data(), doc.id);
        });
    }

    function createProductCard(product, productId) {
        const productContainer = document.querySelector('.shop-p__collection .row');
        const productCard = `
            <div class="col-lg-4 col-md-6 col-sm-6">
                <div class="product-m">
                    <div class="product-m__thumb">
                        <a class="aspect aspect--bg-grey aspect--square u-d-block" href="product-detail.php?productId=${productId}&category=${category}">
                            <img class="aspect__img" src="${product.imageUrl}" alt="${product.title}">
                        </a>
                        <div class="product-m__add-cart">
                            <a class="btn--e-brand bid-btn" href="#" data-product-id="${productId}">Bid</a>
                        </div>
                    </div>
                    <div class="product-m__content">
                        <div class="product-m__category">
                            <a href="shop-side-version-2.php?category=${product.category}">${product.category}</a>
                        </div>
                        <div class="product-m__name">
                            <a href="product-detail.php?productId=${productId}&category=${category}">${product.title}</a>
                        </div>
                        <div class="product-m__price">$${product.currentBid}</div>
                        <div class="product-m__hover">
                            <div class="product-m__preview-description">
                                <span>${product.description}</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>`;

        productContainer.insertAdjacentHTML('beforeend', productCard);
    }

    if (category) {
        renderProducts(category);
    }
</script>

<script>
    var isLoggedIn = <?= json_encode(isset($_SESSION['user_logged_in']) && $_SESSION['user_logged_in']); ?>;

    // Add event listener to handle bid button clicks
    document.addEventListener('click', function(event) {
        if (event.target.classList.contains('bid-btn')) {
            event.preventDefault();
            if (!isLoggedIn) {
                alert('Please log in to place a bid.');
            } else {
                const productId = event.target.getAttribute('data-product-id');
                // Logic to handle the bidding process
                // For example, redirect to the bid page
                window.location.href = `checkout.php?productId=${productId}`;
            }
        }
    });
</script>

