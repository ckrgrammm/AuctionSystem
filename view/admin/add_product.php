<?php
session_start();
require_once '../../includes/auth_validate.php';
require_once '../../includes/header.php'; 
?>
<div id="page-wrapper">
<div class="row">
     <div class="col-lg-12">
            <h2 class="page-header">Add Products</h2>
        </div>
        
</div>
    <form class="form" action="" method="post"  id="product_form" enctype="multipart/form-data">
        <fieldset>
            <div class="form-group">
                <label for="title">Title *</label>
                <input type="text" name="title" value="" placeholder="Product Name" class="form-control" required="required" id = "title" >
            </div> 

            <div class="form-group">
                <label for="description">Description *</label>
                <input type="text" name="description" value="" placeholder="Description" class="form-control" required="required" id="description">
            </div> 

            <div class="form-group">
                <label for="startPrice">start Price</label>
                    <input  type="text" name="startPrice" value="" placeholder="startPrice" class="form-control" id="startPrice">
            </div>

            <div class="form-group">
                <label for="image">Image *</label>
                <input type="file" name="image" value="" placeholder="Image" class="form-control" required="required" id = "image" >
            </div> 

            <div class="form-group">
                <label for="category">Category *</label>
                <input type="text" name="category" value="" placeholder="Category" class="form-control" required="required" id = "category" >
            </div> 

            <div class="form-group">
                <label for="startTime">start Time *</label>
                <input type="datetime-local" name="startTime" value="" placeholder="start Time" class="form-control" required="required" id = "startTime" >
            </div> 

            <div class="form-group">
                <label for="endTime">end Time *</label>
                <input type="datetime-local" name="endTime" value="" placeholder="end Time" class="form-control" required="required" id = "endTime" >
            </div> 

            <div class="form-group text-center">
                <label></label>
                <button type="submit" class="btn btn-warning" >Save <span class="glyphicon glyphicon-send"></span></button>
            </div>            
        </fieldset>
    </form>
</div>

<?php include_once '../../includes/footer.php'; ?>

<script type="module" src="../../firebase/firebaseInit.js"></script>
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

    import { auth, db } from '../../firebase/firebaseInit.js'; // Make sure db is properly exported

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
                status: 'active', // Initial status
                deleted: 0
            });

            console.log("Product saved to Firestore");
            alert("Product added successfully!");
            window.location.href = 'products.php'; // Redirect to the product list page
        } catch (error) {
            console.error("Error adding product", error);
            alert("Error adding product: " + error.message);
        }
    });
</script>

