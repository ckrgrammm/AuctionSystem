<?php
session_start();
require_once '../../includes/auth_validate.php';
include_once('../../includes/header.php');

?>

<!-- <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css"> -->
<link rel="stylesheet" href="https://cdn.datatables.net/2.0.1/css/dataTables.bootstrap.css">
<!-- <script src="https://code.jquery.com/jquery-3.7.1.js"></script> -->
<!-- <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script> -->
<script src="https://cdn.datatables.net/2.0.1/js/dataTables.js"></script>
<script src="https://cdn.datatables.net/2.0.1/js/dataTables.bootstrap.js"></script>

<!-- Main container -->
<div id="page-wrapper">
    <div class="row">
        <div class="col-lg-6">
            <h1 class="page-header">Bids</h1>
        </div>
        <div class="col-lg-6">
            <div class="page-action-links text-right">
                <a href="add_product.php" class="btn btn-success"><i class="glyphicon glyphicon-plus"></i> Add new</a>
            </div>
        </div>
    </div>
    <?php include '../../includes/flash_messages.php' ;?>

    <table id="example" class="table table-striped table-bordered" style="width:100%">
        
    </table>
    
</div>
<!-- //Main container -->
<?php include_once('../../includes/footer.php'); ?>

<script type="module">
  import { getFirestore, collection, getDocs, getDoc, updateDoc, deleteDoc, doc as firestoreDoc } from "https://www.gstatic.com/firebasejs/9.6.10/firebase-firestore.js";
  import { db } from '../../firebase/firebaseInit.js'; // Make sure you export db in firebaseInit.js

  async function loadproductsData() {
    const productsSnapshot = await getDocs(collection(db, "products"));

    const productsData = [];


    for (const doc of productsSnapshot.docs) {
        let productData = doc.data();
        productData['id'] = doc.id; // Store the document ID
        // Check if the 'deleted' field is not present or is set to 0
        if (!productData.deleted || productData.deleted === 0) {
            if (productData.sellerId) {
                const auctioneerDoc = await getDoc(firestoreDoc(db, "auctioneers", productData.sellerId));
                if (auctioneerDoc.exists()) {
                    const auctioneerData = auctioneerDoc.data();
                    productData['auctioneerUsername'] = auctioneerData.firstName + " " + auctioneerData.lastName;
                    console.log(productData.auctioneerUsername);
                } else {
                    productData['auctioneerUsername'] = "admin";
                }
            }
            productsData.push([
                productData.title, // Name column
                productData.description,
                productData.startPrice, 
                productData.currentBid, 
                productData.imageUrl, 
                productData.category, 
                new Date(productData.startTime).toLocaleString(),
                new Date(productData.endTime).toLocaleString(),
                productData.auctioneerUsername,
                productData.status, 
                "", // Action column
                productData.id  
            ]);
        }
    }

    // Initialize the DataTable with the productsData array
    $(document).ready(function() {
        var table = $('#example').DataTable({
            data: productsData,
            columns: [
            { title: "Title" },
            { title: "Description" },
            { title: "Start Price" },
            { title: "Current Bid" },
            {
                title: "Image",
                render: function(data, type, row) {
                  return '<img src="'+data+'" style="height:50px;"/>'; // Render image
                }
            },
            { title: "Category" },
            { title: "Start Time" },
            { title: "End Time" },
            { title: "Auctioneer" },
            { title: "status" },
            { title: "Action", orderable: false },
            { title: "productId", visible: false },
            ],
            columnDefs: [
            {
                // Targets the 'Action' column
                targets: 10, 
                render: function (data, type, row, meta) {
                // Append the Firestore document ID to the buttons as a data attribute
                return "<button class='btn btn-primary edit-btn' data-id='" + row[11] + "'><i class='glyphicon glyphicon-pencil'></i></button> " +
                        "<button class='btn btn-danger delete-btn' data-id='" + row[11] + "'><i class='glyphicon glyphicon-trash'></i></button>";
                }
            }
            ]
        });

        // Event listener for edit button
        $('#example tbody').on('click', '.edit-btn', function () {
            var id = $(this).attr('data-id');
            window.location.href = 'edit_product.php?id=' + id;
        });

        // Event listener for delete button
        $('#example tbody').on('click', '.delete-btn', async function () {
            var id = $(this).attr('data-id');
            if(confirm('Are you sure you want to delete this product?')) {
                try {
                    // Update the document in Firestore, setting 'deleted' to 1
                    const productRef = firestoreDoc(db, 'products', id);
                    await updateDoc(productRef, {
                        deleted: 1
                    });
                    table.row($(this).parents('tr')).remove().draw();
                } catch (error) {
                    console.error("Error removing document: ", error);
                }
            }
        });
      // Event listener code for edit and delete buttons goes here (as you already have in your script)
    });
  }

  loadproductsData();
</script>


