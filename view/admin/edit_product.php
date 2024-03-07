<?php
session_start();
require_once '../../includes/auth_validate.php';
require_once '../../includes/header.php'; 

$productId = ''; // Default value
if(isset($_GET['id']) && $_GET['id'] != '') {
    $productId = $_GET['id'];
}

?>
<div id="page-wrapper">
<div class="row">
     <div class="col-lg-12">
            <h2 class="page-header">Edit Product</h2>
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
                <input type="file" name="image" placeholder="Image" class="form-control" id="image">
                <!-- Image Preview -->
                <img id="imagePreview" src="#" alt="Image Preview" style="max-height: 200px;" />
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
    import { getFirestore, doc, getDoc, updateDoc } from "https://www.gstatic.com/firebasejs/9.6.10/firebase-firestore.js";
    import { getStorage, ref as storageRef, uploadBytes, getDownloadURL } from "https://www.gstatic.com/firebasejs/9.6.10/firebase-storage.js";
    import { db } from '../../firebase/firebaseInit.js';

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
            window.location.href = 'products.php'; // Redirect to the product list page
        } catch (error) {
            console.error("Error updating product", error);
            alert("Error updating product: " + error.message);
        }
    });

    // Call `loadProductData` when the script loads
    await loadProductData(productId);
</script>
