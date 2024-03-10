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

        #suggestion-box {
            display: none; /* Hidden by default */
            position: absolute;
            background: white;
            width: 100%; /* Match the width of the search bar */
            max-height: 300px;
            overflow-y: auto;
            z-index: 1000; /* High z-index to ensure it's on top */
            border: 1px solid #CCC;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1); /* Optional: adds a shadow for better visibility */
            top: 100%; /* Directly below the search input */
            left: 0;
        }

        .suggestion-item {
            padding: 10px;
            border-bottom: 1px solid #EEE;
            cursor: pointer;
            display: flex; /* Aligns the image and text side by side */
            align-items: center; /* Vertically centers the content in the suggestion item */
        }

        .suggestion-item:hover {
            background-color: #F9F9F9;
        }

        .suggestion-item img {
            width: 30px;
            height: 30px;
            object-fit: cover;
            margin-right: 10px;
            border-radius: 50%; /* Makes the image round */
        }

        .suggestion-item-title {
            font-size: 1rem; /* Adjust size as needed */
            font-weight: 600; /* Makes the font bold */
            color: #333; /* Dark color for better readability */
            margin-right: auto; /* Pushes the price to the right */
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

                            <input class="input-text input-text--border-radius input-text--style-1" type="text" id="main-search" placeholder="Search" onkeyup="searchProducts(this.value)">
                            <!-- Suggestion Box -->
                            <div id="suggestion-box">
                                <!-- Search suggestions will appear here -->
                            </div>

                            <button class="btn btn--icon fas fa-search main-search-button" type="submit"></button>
                        </form>
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
                                                    <a href="dash-my-profile.php"><i class="fas fa-user-circle u-s-m-r-6"></i>
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
                                                    </ul>
                                                </div>
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
                                        <a href="index.php"><i class="fas fa-home"></i></a>
                                    </li>
                                    <li>
                                        <a href="reviews&ratings.php"><i class="fas fa-comment"></i></a>
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
            if (product.deleted === 0 && product.status === 'active') {
                product.id = doc.id;

                if (!categorizedProducts[product.category]) {
                    categorizedProducts[product.category] = [];
                }
            
                categorizedProducts[product.category].push(product);
            }
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
                        <a class="u-d-block" href="product-detail.php?category=${product.category}&productId=${product.id}">
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

<script type="module">
    import { db } from './firebase/firebaseInit.js';
    import { collection, query, where, getDocs } from "https://www.gstatic.com/firebasejs/9.6.10/firebase-firestore.js";

    // Function to search products
    async function searchProducts(searchText) {
        if (searchText.length < 1) {
            document.getElementById('suggestion-box').style.display = 'none';
            return;
        }

        // Query the products collection
        const productsRef = collection(db, "products");
        const q = query(
            productsRef, 
            where("title", ">=", searchText), 
            where("title", "<=", searchText + '\uf8ff'), 
        );

        const querySnapshot = await getDocs(q);
        let suggestionsHTML = '';
        let result = false;
        // console.log(`Found ${querySnapshot.docs.length} items`); // Debugging lin
        querySnapshot.forEach((doc) => {
            const product = doc.data();
            // console.log(`Item: ${product.title}`);
            if(product.deleted == 0 && product.status == "active"){
                result = true;
                suggestionsHTML += `
                    <div class="suggestion-item" onclick="window.location.href='product-detail.php?productId=${doc.id}&category=${product.category}'">
                        <img src="${product.imageUrl}" alt="${product.title}" />
                        <span class="suggestion-item-title">${product.title}</span>
                    </div>
                `;
            }
        });

        if(result){
            const suggestionBox = document.getElementById('suggestion-box');
            suggestionBox.innerHTML = suggestionsHTML;
            suggestionBox.style.display = 'block';
        }
        
    }

    window.searchProducts = searchProducts;
</script>