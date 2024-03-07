<?php
session_start();
require_once '../../includes/auth_validate.php';
include_once('../../includes/header.php');

?>

<!-- <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css"> -->
<link rel="stylesheet" href="https://cdn.datatables.net/2.0.1/css/dataTables.bootstrap.css">
<!-- <script src="https://code.jquery.com/jquery-3.7.1.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script> -->
<script src="https://cdn.datatables.net/2.0.1/js/dataTables.js"></script>
<script src="https://cdn.datatables.net/2.0.1/js/dataTables.bootstrap.js"></script>

<!-- Main container -->
<div id="page-wrapper">
    <div class="row">
        <div class="col-lg-6">
            <h1 class="page-header">Customers</h1>
        </div>
        <div class="col-lg-6">
            <div class="page-action-links text-right">
                <a href="add_customer.php" class="btn btn-success"><i class="glyphicon glyphicon-plus"></i> Add new</a>
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
  import { getFirestore, collection, getDocs, deleteDoc, doc } from "https://www.gstatic.com/firebasejs/9.6.10/firebase-firestore.js";
  import { db } from '../../firebase/firebaseInit.js'; // Make sure you export db in firebaseInit.js

  async function loadUsersData() {
    const auctioneersSnapshot = await getDocs(collection(db, "auctioneers"));
    const biddersSnapshot = await getDocs(collection(db, "bidders"));

    const usersData = [];

    auctioneersSnapshot.forEach(doc => {
      let userData = doc.data();
      userData['id'] = doc.id; // Store the document ID
      userData['role'] = 'auctioneer'; // Add role for the DataTable
      usersData.push([
        userData.firstName + ' ' + userData.lastName, // Name column
        userData.role, // Role column
        userData.email, // Email column
        "", // Action column
        userData.id  
        ]);
    });

    biddersSnapshot.forEach(doc => {
      let userData = doc.data();
      userData['id'] = doc.id; // Store the document ID
      userData['role'] = 'bidder'; // Add role for the DataTable
      usersData.push([
        userData.firstName + ' ' + userData.lastName, // Name column
        userData.role, // Role column
        userData.email, // Email column
        "", // Action column
        userData.id
    ]);
    });

    // Initialize the DataTable with the usersData array
    $(document).ready(function() {
        var table = $('#example').DataTable({
            data: usersData,
            columns: [
            { title: "Name" },
            { title: "Role" },
            { title: "Email" },
            { title: "Action", orderable: false },
            { title: "userId", visible: false },
            ],
            columnDefs: [
            {
                // Targets the 'Action' column
                targets: 3, 
                render: function (data, type, row, meta) {
                // Append the Firestore document ID to the buttons as a data attribute
                return "<button class='btn btn-primary edit-btn' data-id='" + row[4] + "'><i class='glyphicon glyphicon-pencil'></i></button> " +
                        "<button class='btn btn-danger delete-btn' data-id='" + row[4] + "' data-collection='" + row[1] + "'><i class='glyphicon glyphicon-trash'></i></button>";
                }
            }
            ]
        });

        // Event listener for edit button
        $('#example tbody').on('click', '.edit-btn', function () {
            var id = $(this).attr('data-id');
            window.location.href = 'edit_customer.php?id=' + id;
        });

        // Event listener for delete button
        $('#example tbody').on('click', '.delete-btn', async function () {
            var id = $(this).attr('data-id');
            const collection = $(this).data('collection');
            if(confirm('Are you sure you want to delete this user?')) {
            try {
                // Delete the document from Firestore
                await deleteDoc(doc(db, collection+'s', id));
                table.row($(this).parents('tr')).remove().draw();
            } catch (error) {
                console.error("Error removing document: ", error);
            }
            }
        });
      // Event listener code for edit and delete buttons goes here (as you already have in your script)
    });
  }

  loadUsersData();
</script>


