<?php
$title = "Auction";
session_start();
require_once 'auth_validate.php';
include("header.php");
?>

<!--====== Vendor Js ======-->
<script src="js/vendor.js"></script>

<!--====== jQuery Shopnav plugin ======-->
<script src="js/jquery.shopnav.js"></script>

<!--====== App ======-->
<script src="js/app.js"></script>

<link rel="stylesheet" href="https://cdn.datatables.net/2.0.2/css/dataTables.dataTables.css">
<script src="https://code.jquery.com/jquery-3.7.1.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
<script src="https://cdn.datatables.net/2.0.2/js/dataTables.js"></script>
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
</style>

<!-- Main container -->
<div id="page-wrapper">
    <div class="container">
        <div class="row justify-content-center">
            <div class="row mb-3">
                <div class="col-12 d-flex justify-content-between align-items-center">
                    <h1 class="page-header">Products</h1>
                    <a href="add_auction.php" class="btn btn-success"><i class="glyphicon glyphicon-plus"></i> Add new</a>
                </div>
            </div>

            <table id="example" class="table table-striped table-bordered" style="width:100%">
            
            </table>
        </div>
    </div>
</div>
<!-- //Main container -->
<?php
    include_once('footer.php'); 
?>

<script type="module">
  import { getFirestore, collection, getDocs, getDoc, updateDoc, deleteDoc, doc as firestoreDoc } from "https://www.gstatic.com/firebasejs/9.6.10/firebase-firestore.js";
  import { db } from './firebase/firebaseInit.js'; // Make sure you export db in firebaseInit.js

  async function loadproductsData() {
    const productsSnapshot = await getDocs(collection(db, "products"));

    const productsData = [];

    const userId = <?= json_encode($_SESSION['uid']); ?>;
    for (const doc of productsSnapshot.docs) {
        let productData = doc.data();
        productData['id'] = doc.id; // Store the document ID
        // Check if the 'deleted' field is not present or is set to 0
        if ((productData.sellerId == userId) && (!productData.deleted || productData.deleted === 0)) {
            const auctioneerDoc = await getDoc(firestoreDoc(db, "auctioneers", productData.sellerId));
            if (auctioneerDoc.exists()) {
                const auctioneerData = auctioneerDoc.data();
                productData['auctioneerUsername'] = auctioneerData.firstName + " " + auctioneerData.lastName;
                // console.log(productData.auctioneerUsername);
            } else {
                productData['auctioneerUsername'] = "admin";
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
            window.location.href = 'edit_auction.php?id=' + id;
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



