<!DOCTYPE html>
<html class="no-js" lang="en">
<head>
    <meta charset="UTF-8">
    <!--[if IE]><meta http-equiv="X-UA-Compatible" content="IE=edge"><![endif]-->
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link href="images/favicon.png" rel="shortcut icon">
    <title><?php echo $title; ?></title>

    <!--====== Google Font ======-->
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:400,600,700,800" rel="stylesheet">

    <!--====== Vendor Css ======-->
    <link rel="stylesheet" href="css/vendor.css">

    <!--====== Utility-Spacing ======-->
    <link rel="stylesheet" href="css/utility.css">

    <!--====== App ======-->
    <link rel="stylesheet" href="css/app.css">

    <style>
        .custom-margin-top {
            margin-top: 30px; /* or any value that works for your layout */
        }
    </style>
</head>
<body class="config">
    <div class="preloader is-active">
        <div class="preloader__wrap">
            <img class="preloader__img" src="images/preloader.png" alt="">
        </div>
    </div>

    <!--====== Main App ======-->
    <div id="app">

        <!--====== Main Header ======-->
        <header class="header--style-1 header--box-shadow">

            <!--====== Nav 1 ======-->
            <nav class="primary-nav primary-nav-wrapper--border">
                <div class="container">

                    <!--====== Primary Nav ======-->
                    <div class="primary-nav">

                        <!--====== Main Logo ======-->

                        <a class="main-logo" href="index.php">

                            <img src="images/logo/logo-1.png" alt=""></a>
                        <!--====== End - Main Logo ======-->


                        <!--====== Search Form ======-->
                        <form class="main-form">

                            <label for="main-search"></label>

                            <input class="input-text input-text--border-radius input-text--style-1" type="text" id="main-search" placeholder="Search">

                            <button class="btn btn--icon fas fa-search main-search-button" type="submit"></button></form>
                        <!--====== End - Search Form ======-->


                        <!--====== Dropdown Main plugin ======-->
                        <div class="menu-init" id="navigation">

                            <button class="btn btn--icon toggle-button fas fa-cogs" type="button"></button>

                            <!--====== Menu ======-->
                            <div class="ah-lg-mode">

                                <span class="ah-close">✕ Close</span>

                                <!--====== List ======-->
                                <ul class="ah-list ah-list--design1 ah-list--link-color-secondary">
                                    <li class="has-dropdown" data-tooltip="tooltip" data-placement="left" title="Account">

                                        <a><i class="far fa-user-circle"></i></a>

                                        <!--====== Dropdown ======-->

                                        <span class="js-menu-toggle"></span>
                                        <ul style="width:120px">
                                            <?php if (isset($_SESSION['user_logged_in']) && $_SESSION['user_logged_in'] === true): ?>
                                                <!-- User is logged in, show Account and Sign Out -->
                                                <li>
                                                    <a href="dashboard.php"><i class="fas fa-user-circle u-s-m-r-6"></i>
                                                        <span>Account</span>
                                                    </a>
                                                </li>
                                                <li>
                                                    <a href="logout.php"><i class="fas fa-lock-open u-s-m-r-6"></i>
                                                        <span>Sign Out</span>
                                                    </a>
                                                </li>
                                                <?php if (isset($_SESSION['status']) && $_SESSION['status'] === 'auctioneers'): ?>
                                                    <li>
                                                        <a href="auction.php"><i class="fas fa-tags u-s-m-r-6"></i>
                                                            <span>Auction</span>
                                                        </a>
                                                    </li>
                                                <?php endif; ?>
                                            <?php else: ?>
                                                <!-- User is not logged in, show Sign In and Sign Up -->
                                                <li>
                                                    <a href="signup.php"><i class="fas fa-user-plus u-s-m-r-6"></i>
                                                        <span>Sign Up</span>
                                                    </a>
                                                </li>
                                                <li>
                                                    <a href="signin.php"><i class="fas fa-lock u-s-m-r-6"></i>
                                                        <span>Sign In</span>
                                                    </a>
                                                </li>
                                            <?php endif; ?>
                                        </ul>
                                        <!--====== End - Dropdown ======-->
                                    </li>
                                    <li class="has-dropdown" data-tooltip="tooltip" data-placement="left" title="Settings">

                                        <a><i class="fas fa-user-cog"></i></a>

                                        <!--====== Dropdown ======-->

                                        <span class="js-menu-toggle"></span>
                                        <ul style="width:120px">
                                
                                            <li class="has-dropdown has-dropdown--ul-right-100">

                                                <a>Currency<i class="fas fa-angle-down u-s-m-l-6"></i></a>

                                                <!--====== Dropdown ======-->

                                                <span class="js-menu-toggle"></span>
                                                <ul style="width:225px">
                                                    <li>

                                                        <a class="u-c-brand">$ - US DOLLAR</a></li>
                                                    <li>

                                                        <a>£ - BRITISH POUND STERLING</a></li>
                                                    <li>

                                                        <a>€ - EURO</a></li>
                                                </ul>
                                                <!--====== End - Dropdown ======-->
                                            </li>
                                        </ul>
                                        <!--====== End - Dropdown ======-->
                                    </li>
                            
                                </ul>
                                <!--====== End - List ======-->
                            </div>
                            <!--====== End - Menu ======-->
                        </div>
                        <!--====== End - Dropdown Main plugin ======-->
                    </div>
                    <!--====== End - Primary Nav ======-->
                </div>
            </nav>
            <!--====== End - Nav 1 ======-->


            <!--====== Nav 2 ======-->
            <nav class="secondary-nav-wrapper">
                <div class="container">

                    <!--====== Secondary Nav ======-->
                    <div class="secondary-nav">

                        <!--====== Dropdown Main plugin ======-->
                        <div class="menu-init" id="navigation1">

                            <button class="btn btn--icon toggle-mega-text toggle-button" type="button">M</button>

                            <!--====== Menu ======-->
                            <div class="ah-lg-mode">

                                <span class="ah-close">✕ Close</span>

                                <!--====== List ======-->
                                <ul class="ah-list">
                                    <li class="has-dropdown">

                                        <span class="mega-text">M</span>

                                        <!--====== Mega Menu ======-->

                                        <span class="js-menu-toggle"></span>
                                        <div class="mega-menu">
                                            <div class="mega-menu-wrap">
                                                <div class="mega-menu-list">
                                                    <ul>
                                                        <!-- <li>
                                                            <a href="shop-side-version-2.php">
                                                                <span>Men's Clothing</span>
                                                            </a>
                                                            <span class="js-menu-toggle"></span>
                                                        </li>
                                                        <li>
                                                            <a href="index.php">
                                                                <span>Beauty & Health</span>
                                                            </a>
                                                            <span class="js-menu-toggle"></span>
                                                        </li> -->
                                                    </ul>
                                                </div>

                                                <!--====== Men ======-->
                                                <!-- <div class="mega-menu-content js-active">
                                                    <div class="row">
                                                        <div class="col-lg-4 mega-image custom-margin-top">
                                                            <div class="mega-banner">
                                                                <a class="u-d-block" href="shop-side-version-2.php">
                                                                    <img class="u-img-fluid u-d-block" src="images/banners/banner-mega-5.jpg" alt="">
                                                                </a>
                                                            </div>
                                                        </div>
                                                        <div class="col-lg-4 mega-image custom-margin-top">
                                                            <div class="mega-banner">
                                                                <a class="u-d-block" href="shop-side-version-2.php">
                                                                    <img class="u-img-fluid u-d-block" src="images/banners/banner-mega-6.jpg" alt="">
                                                                </a>
                                                            </div>
                                                        </div>
                                                        <div class="col-lg-4 mega-image custom-margin-top">
                                                            <div class="mega-banner">
                                                                <a class="u-d-block" href="shop-side-version-2.php">
                                                                    <img class="u-img-fluid u-d-block" src="images/banners/banner-mega-7.jpg" alt="">
                                                                </a>
                                                            </div>
                                                        </div>
                                                        <div class="col-lg-4 mega-image custom-margin-top">
                                                            <div class="mega-banner">
                                                                <a class="u-d-block" href="shop-side-version-2.php">
                                                                    <img class="u-img-fluid u-d-block" src="images/banners/banner-mega-7.jpg" alt="">
                                                                </a>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div> -->
                                                <!--====== End - Men ======-->

                                                <!--====== No Sub Categories ======-->
                                                <!-- <div class="mega-menu-content">
                                                    <h5>No Categories</h5>
                                                </div> -->
                                            </div>
                                        </div>
                                        <!--====== End - Mega Menu ======-->
                                    </li>
                                </ul>
                                <!--====== End - List ======-->
                            </div>
                            <!--====== End - Menu ======-->
                        </div>
                        <!--====== End - Dropdown Main plugin ======-->


                        <!--====== Dropdown Main plugin ======-->
                        <div class="menu-init" id="navigation2">

                            <button class="btn btn--icon toggle-button fas fa-cog" type="button"></button>

                            <!--====== Menu ======-->
                            <div class="ah-lg-mode">

                                <span class="ah-close">✕ Close</span>
                            </div>
                            <!--====== End - Menu ======-->
                        </div>
                        <!--====== End - Dropdown Main plugin ======-->


                        <!--====== Dropdown Main plugin ======-->
                        <div class="menu-init" id="navigation3">

                            <button class="btn btn--icon toggle-button fas fa-shopping-bag toggle-button-shop" type="button"></button>

                            <span class="total-item-round">2</span>

                            <!--====== Menu ======-->
                            <div class="ah-lg-mode">

                                <span class="ah-close">✕ Close</span>

                                <!--====== List ======-->
                                <ul class="ah-list ah-list--design1 ah-list--link-color-secondary">
                                    <li>

                                        <a href="index.php"><i class="fas fa-home"></i></a></li>
                                    <li>

                                        <a href="wishlist.php"><i class="far fa-heart"></i></a></li>
                                    <li class="has-dropdown">

                                        <a class="mini-cart-shop-link"><i class="fas fa-shopping-bag"></i>

                                            <span class="total-item-round">2</span></a>

                                        <!--====== Dropdown ======-->

                                        <span class="js-menu-toggle"></span>
                                        <div class="mini-cart">

                                            <!--====== Mini Product Container ======-->
                                            <div class="mini-product-container gl-scroll u-s-m-b-15">

                                                <!--====== Card for mini cart ======-->
                                                <div class="card-mini-product">
                                                    <div class="mini-product">
                                                        <div class="mini-product__image-wrapper">

                                                            <a class="mini-product__link" href="product-detail.php">

                                                                <img class="u-img-fluid" src="images/product/electronic/product3.jpg" alt=""></a></div>
                                                        <div class="mini-product__info-wrapper">

                                                            <span class="mini-product__category">

                                                                <a href="shop-side-version-2.php">Electronics</a></span>

                                                            <span class="mini-product__name">

                                                                <a href="product-detail.php">Yellow Wireless Headphone</a></span>

                                                            <span class="mini-product__quantity">1 x</span>

                                                            <span class="mini-product__price">$8</span></div>
                                                    </div>

                                                    <a class="mini-product__delete-link far fa-trash-alt"></a>
                                                </div>
                                                <!--====== End - Card for mini cart ======-->


                                                <!--====== Card for mini cart ======-->
                                                <div class="card-mini-product">
                                                    <div class="mini-product">
                                                        <div class="mini-product__image-wrapper">

                                                            <a class="mini-product__link" href="product-detail.php">

                                                                <img class="u-img-fluid" src="images/product/electronic/product18.jpg" alt=""></a></div>
                                                        <div class="mini-product__info-wrapper">

                                                            <span class="mini-product__category">

                                                                <a href="shop-side-version-2.php">Electronics</a></span>

                                                            <span class="mini-product__name">

                                                                <a href="product-detail.php">Nikon DSLR Camera 4k</a></span>

                                                            <span class="mini-product__quantity">1 x</span>

                                                            <span class="mini-product__price">$8</span></div>
                                                    </div>

                                                    <a class="mini-product__delete-link far fa-trash-alt"></a>
                                                </div>
                                                <!--====== End - Card for mini cart ======-->


                                                <!--====== Card for mini cartcart ======-->
                                                <div class="card-mini-product">
                                                    <div class="mini-product">
                                                        <div class="mini-product__image-wrapper">

                                                            <a class="mini-product__link" href="product-detail.php">

                                                                <img class="u-img-fluid" src="images/product/women/product8.jpg" alt=""></a></div>
                                                        <div class="mini-product__info-wrapper">

                                                            <span class="mini-product__category">

                                                                <a href="shop-side-version-2.php">Women Clothing</a></span>

                                                            <span class="mini-product__name">

                                                                <a href="product-detail.php">New Dress D Nice Elegant</a></span>

                                                            <span class="mini-product__quantity">1 x</span>

                                                            <span class="mini-product__price">$8</span></div>
                                                    </div>

                                                    <a class="mini-product__delete-link far fa-trash-alt"></a>
                                                </div>
                                                <!--====== End - Card for mini cart ======-->


                                                <!--====== Card for mini cart ======-->
                                                <div class="card-mini-product">
                                                    <div class="mini-product">
                                                        <div class="mini-product__image-wrapper">

                                                            <a class="mini-product__link" href="product-detail.php">

                                                                <img class="u-img-fluid" src="images/product/men/product8.jpg" alt=""></a></div>
                                                        <div class="mini-product__info-wrapper">

                                                            <span class="mini-product__category">

                                                                <a href="shop-side-version-2.php">Men Clothing</a></span>

                                                            <span class="mini-product__name">

                                                                <a href="product-detail.php">New Fashion D Nice Elegant</a></span>

                                                            <span class="mini-product__quantity">1 x</span>

                                                            <span class="mini-product__price">$8</span></div>
                                                    </div>

                                                    <a class="mini-product__delete-link far fa-trash-alt"></a>
                                                </div>
                                                <!--====== End - Card for mini cart ======-->
                                            </div>
                                            <!--====== End - Mini Product Container ======-->


                                            <!--====== Mini Product Statistics ======-->
                                            <div class="mini-product-stat">
                                                <div class="mini-total">

                                                    <span class="subtotal-text">SUBTOTAL</span>

                                                    <span class="subtotal-value">$16</span></div>
                                                <div class="mini-action">

                                                    <a class="mini-link btn--e-brand-b-2" href="checkout.php">PROCEED TO CHECKOUT</a>

                                                    <a class="mini-link btn--e-transparent-secondary-b-2" href="cart.php">VIEW CART</a></div>
                                            </div>
                                            <!--====== End - Mini Product Statistics ======-->
                                        </div>
                                        <!--====== End - Dropdown ======-->
                                    </li>
                                </ul>
                                <!--====== End - List ======-->
                            </div>
                            <!--====== End - Menu ======-->
                        </div>
                        <!--====== End - Dropdown Main plugin ======-->
                    </div>
                    <!--====== End - Secondary Nav ======-->
                </div>
            </nav>
            <!--====== End - Nav 2 ======-->
        </header>
        <!--====== End - Main Header ======-->

<script type="module">
    // Importing the necessary functions from Firebase
    import { db } from './firebase/firebaseInit.js';
    import { collection, getDocs } from "https://www.gstatic.com/firebasejs/9.6.10/firebase-firestore.js";

    async function renderProducts() {
        const querySnapshot = await getDocs(collection(db, "products"));

        const categorizedProducts = {};

        querySnapshot.forEach((doc) => {
            const product = doc.data();
            
            if (!categorizedProducts[product.category]) {
                categorizedProducts[product.category] = [];
            }
            
            categorizedProducts[product.category].push(product);
        });

        // Find the menu where you want to insert the categories and products
        const megaMenuList = document.querySelector('.mega-menu-list > ul');
        const megaMenuWrap = document.querySelector('.mega-menu-wrap');

        // Clear the contents before appending new ones
        megaMenuList.innerHTML = '';

        // Render categories
        for (const [category, products] of Object.entries(categorizedProducts)) {
            // Category list
            const categoryListItem = document.createElement('li');
            const categoryLink = document.createElement('a');
            const categorySpan = document.createElement('span');
            const categorySpan2 = document.createElement('span');
            categoryLink.href = "shop-side-version-2.php?category=" + category; // Change URL as needed
            categorySpan.innerText = category;
            categorySpan2.className = 'js-menu-toggle';

            categoryLink.appendChild(categorySpan);
            categoryListItem.appendChild(categoryLink);
            categoryListItem.appendChild(categorySpan2);
            megaMenuList.appendChild(categoryListItem);

            // Create mega-menu-content for each category
            const megaMenuContent = document.createElement('div');
            megaMenuContent.className = 'mega-menu-content';

            // Creating a row for the product images
            const productsRow = document.createElement('div');
            productsRow.className = 'row';

            products.forEach((product) => {
                const productCol = document.createElement('div');
                productCol.className = 'col-lg-4 mega-image custom-margin-top';
                productCol.innerHTML = `
                    <div class="mega-banner">
                        <a class="u-d-block" href="shop-side-version-2.php">
                            <img class="u-img-fluid u-d-block" src="${product.imageUrl}" alt="${product.title}" style="width: 370px; height: 270px; object-fit: cover;">
                        </a>
                    </div>
                `;
                productsRow.appendChild(productCol);
            });

            megaMenuContent.appendChild(productsRow);

            megaMenuWrap.appendChild(megaMenuContent);
        }
        $('#navigation1').shopNav();

    }

    renderProducts();
</script>