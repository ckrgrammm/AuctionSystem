<?php
$title = "Auction";
session_start();
require_once 'auth_validate.php';
include("header.php");
?>
<link  rel="stylesheet" href="view/admin/assets/css/bootstrap.min.css"/>

<style>
    .btn{
        display: none !important;
    }

    .btn-success{
        display: inline-block !important;
    }

    .btn-primary{
        display: inline-block !important;
    }

    .btn-danger{
        display: inline-block !important;
    }

    .btn-warning{
        display: inline-block !important;
    }

    #page-wrapper {
        display: flex;
        flex-direction: column;
        align-items: center;
        justify-content: center;
        min-height: 100vh; /* Use vh (viewport height) to take full height of the viewport */
        padding: 20px; /* Add padding for some space around the content */
    }

    .form {
        width: 100%; /* Use 100% of the #page-wrapper width */
        max-width: 600px; /* Maximum width of the form */
        margin: auto; /* Auto margin for automatic alignment */
        padding: 15px; /* Padding inside the form */
        box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1); /* Optional: adds a shadow for some depth */
        background: #fff; /* Optional: in case you want to differentiate the form from the background */
    }

    /* Adjust form inputs width */
    .form input[type="text"],
    .form input[type="datetime-local"],
    .form input[type="file"],
    .form button {
        width: 100%; /* Make form inputs take up the full width */
        box-sizing: border-box; /* Include padding and border in the element's total width and height */
    }

    /* Adjust the button size and alignment */
    .form-group.text-center {
        text-align: center; /* Center-align the content */
    }
    
    /* Style for the page title */
    .page-header {
        text-align: center; /* Center the page header text */
        width: 100%; /* Make the header take full width */
    }
</style>

<!--====== Vendor Js ======-->
<script src="js/vendor.js"></script>

<!--====== jQuery Shopnav plugin ======-->
<script src="js/jquery.shopnav.js"></script>

<!--====== App ======-->
<script src="js/app.js"></script>

<div id="page-wrapper">
    <div class="row">
        <div class="col-lg-12">
            <h2 class="page-header">Add Products</h2>
        </div>
    </div>
    <form class="form" action="" method="post"  id="product_form" enctype="multipart/form-data">
        <fieldset>
            <div class="form-group col-md-12">
                <label for="title">Title *</label>
                <input type="text" name="title" value="" placeholder="Product Name" class="form-control" required="required" id = "title" >
            </div> 

            <div class="form-group col-md-12">
                <label for="description">Description *</label>
                <input type="text" name="description" value="" placeholder="Description" class="form-control" required="required" id="description">
            </div> 

            <div class="form-group col-md-12">
                <label for="startPrice">start Price</label>
                    <input  type="text" name="startPrice" value="" placeholder="startPrice" class="form-control" id="startPrice">
            </div>

            <div class="form-group col-md-12">
                <label for="image">Image *</label>
                <input type="file" name="image" value="" placeholder="Image" class="form-control" required="required" id = "image" >
            </div> 

            <div class="form-group col-md-12">
                <label for="category">Category *</label>
                <input type="text" name="category" value="" placeholder="Category" class="form-control" required="required" id = "category" >
            </div> 

            <div class="form-group col-md-12">
                <label for="startTime">start Time *</label>
                <input type="datetime-local" name="startTime" value="" placeholder="start Time" class="form-control" required="required" id = "startTime" >
            </div> 

            <div class="form-group col-md-12">
                <label for="endTime">end Time *</label>
                <input type="datetime-local" name="endTime" value="" placeholder="end Time" class="form-control" required="required" id = "endTime" >
            </div> 

            <div class="form-group text-center col-md-offset-4 col-md-4">
                <label></label>
                <button type="submit" class="btn btn-warning" >Save <span class="glyphicon glyphicon-send"></span></button>
            </div>            
        </fieldset>
    </form>
</div>

<?php include_once 'footer.php'; ?>

<script type="module" src="./firebase/firebaseInit.js"></script>
<script type="module">
    import {
        getFirestore,
        collection,
        addDoc
    } from "https://www.gstatic.com/firebasejs/9.6.10/firebase-firestore.js";

    import {
        getStorage,
        ref as storageRef,
        uploadBytes,
        getDownloadURL
    } from "https://www.gstatic.com/firebasejs/9.6.10/firebase-storage.js";

    import { auth, db } from './firebase/firebaseInit.js'; // Make sure db is properly exported

    document.getElementById('product_form').addEventListener('submit', async function (e) {
        e.preventDefault();

        // Get product info from form
        const title = document.getElementById('title').value;
        const description = document.getElementById('description').value;
        const startPrice = parseFloat(document.getElementById('startPrice').value); // Convert to number
        const category = document.getElementById('category').value;
        const startTime = new Date(document.getElementById('startTime').value).toLocaleString(); // Convert to ISO string
        const endTime = new Date(document.getElementById('endTime').value).toLocaleString(); // Convert to ISO string

        // Handle image upload
        const imageFile = document.getElementById('image').files[0]; // Get the file
        const storage = getStorage();
        const imageRef = storageRef(storage, 'productImages/' + imageFile.name);

        try {
            // Upload the image file to Firebase Storage
            const snapshot = await uploadBytes(imageRef, imageFile);
            // Get the URL of the uploaded file
            const imageUrl = await getDownloadURL(snapshot.ref);

            // Save the product data in Firestore
            await addDoc(collection(db, 'products'), {
                title,
                description,
                startPrice,
                imageUrl, // Save the image URL from Firebase Storage
                category,
                startTime,
                endTime,
                sellerId: auth.currentUser.uid, // Assuming the seller is the current user
                currentBid: startPrice, // Initial current bid is the starting price
                status: 'active' // Initial status
            });

            // console.log("Product saved to Firestore");
            alert("Product added successfully!");
            window.location.href = 'auction.php'; // Redirect to the product list page
        } catch (error) {
            // console.error("Error adding product", error);
            alert("Error adding product: " + error.message);
        }
    });
</script>

