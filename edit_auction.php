<?php
$title = "Auction";
session_start();
require_once 'auth_validate.php';
include("header.php");

$productId = ''; // Default value
if(isset($_GET['id']) && $_GET['id'] != '') {
    $productId = $_GET['id'];
}

?>

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

<link  rel="stylesheet" href="view/admin/assets/css/bootstrap.min.css"/>

<div id="page-wrapper">
    <div class="row">
        <div class="col-lg-12">
            <h2 class="page-header">Edit Product</h2>
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
                <input type="file" name="image" placeholder="Image" class="form-control" id="image">
                <!-- Image Preview -->
                <img id="imagePreview" src="#" alt="Image Preview" style="max-height: 200px;" />
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

<?php include_once './includes/footer.php'; ?>

<script type="module" src="./firebase/firebaseInit.js"></script>

<script type="module">
    import { getFirestore, doc, getDoc, updateDoc } from "https://www.gstatic.com/firebasejs/9.6.10/firebase-firestore.js";
    import { getStorage, ref as storageRef, uploadBytes, getDownloadURL } from "https://www.gstatic.com/firebasejs/9.6.10/firebase-storage.js";
    import { db } from './firebase/firebaseInit.js';

    // Assuming `productId` is declared and set from PHP's $productId
    const productId = "<?php echo $productId; ?>";

    async function loadProductData(productId) {
        const productRef = doc(db, "products", productId);
        const productSnap = await getDoc(productRef);

        if (productSnap.exists()) {
            const productData = productSnap.data();
            document.getElementById('title').value = productData.title;
            document.getElementById('description').value = productData.description;
            document.getElementById('startPrice').value = productData.startPrice;
            document.getElementById('category').value = productData.category;
            document.getElementById('startTime').value = convertToDateTimeLocal(productData.startTime);
            document.getElementById('endTime').value = convertToDateTimeLocal(productData.endTime);
            document.getElementById('imagePreview').src = productData.imageUrl;
        } else {
            console.error("No product found with the given ID.");
        }
    }

    function convertToDateTimeLocal(firestoreTimestamp) {
        const date = new Date(firestoreTimestamp);
        const normalizedDate = new Date(date.getTime() - date.getTimezoneOffset() * 60000);
        return normalizedDate.toISOString().slice(0,16);
    }

    document.getElementById('product_form').addEventListener('submit', async function (e) {
        e.preventDefault();

        const title = document.getElementById('title').value;
        const description = document.getElementById('description').value;
        const startPrice = parseFloat(document.getElementById('startPrice').value);
        const category = document.getElementById('category').value;
        const startTime = document.getElementById('startTime').value; // Already in the correct format for Firestore
        const endTime = document.getElementById('endTime').value; // Already in the correct format for Firestore

        const productRef = doc(db, "products", productId);
        
        let imageUrl;

        // Handle image upload if a new image has been chosen
        const imageFile = document.getElementById('image').files[0];
        if (imageFile) {
            const storage = getStorage();
            const imageRef = storageRef(storage, 'productImages/' + imageFile.name);
            const snapshot = await uploadBytes(imageRef, imageFile);
            imageUrl = await getDownloadURL(snapshot.ref);
        }

        try {
            // Update the product document
            const updateData = {
                title,
                description,
                startPrice,
                category,
                startTime,
                endTime,
                // conditionally add imageUrl if it was updated
                ...(imageFile && { imageUrl })
            };
            
            await updateDoc(productRef, updateData);

            alert("Product updated successfully!");
            window.location.href = 'auction.php'; // Redirect to the product list page
        } catch (error) {
            // console.error("Error updating product", error);
            alert("Error updating product: " + error.message);
        }
    });

    // Call `loadProductData` when the script loads
    await loadProductData(productId);
</script>
