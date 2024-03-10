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
            <h1 class="page-header">Payments</h1>
        </div>
    </div>
    <?php include '../../includes/flash_messages.php' ;?>

    <table id="example" class="table table-striped table-bordered" style="width:100%">
        
    </table>
    
</div>
<!-- //Main container -->
<?php include_once('../../includes/footer.php'); ?>

<script type="module">
  import { getFirestore, collection, getDocs, doc as firestoreDoc } from "https://www.gstatic.com/firebasejs/9.6.10/firebase-firestore.js";
  import { db } from '../../firebase/firebaseInit.js'; // Ensure db is properly exported from firebaseInit.js

  // Function to load payments and their shipment details
  async function loadPaymentsData() {
    const paymentsCollectionRef = collection(db, "payments");
    const paymentsSnapshot = await getDocs(paymentsCollectionRef);
    let paymentsData = [];

    for (const paymentDoc of paymentsSnapshot.docs) {
      const paymentData = paymentDoc.data();
      const shipmentsCollectionRef = collection(db, `payments/${paymentDoc.id}/shipments`);
      const shipmentsSnapshot = await getDocs(shipmentsCollectionRef);
      
      const shipmentsData = shipmentsSnapshot.docs.map(shipmentDoc => {
        return shipmentDoc.data();
      });

      paymentsData.push({
        ...paymentData, // Spread operator to include all payment data
        shipments: shipmentsData, // Array of shipment details
        id: paymentDoc.id // Firestore document ID of the payment
      });
    }

    // Now 'paymentsData' has all payments with their shipments included
    // Proceed to display this data in DataTables

    // Format the data for DataTables
    const formattedData = paymentsData.map(payment => {
      return [
        payment.id,
        payment.amount,
        payment.buyerId,
        payment.paymentMethod,
        payment.timestamp.toLocaleString(),
        payment.shipments.map(shipment => shipment.city + ' ' + shipment.country).join(', '), // Join all shipment cities and countries
      ];
    });

    // Initialize DataTables
    $(document).ready(function () {
      $('#example').DataTable({
        data: formattedData,
        columns: [
          { title: "Payment ID" },
          { title: "Amount" },
          { title: "Buyer ID" },
          { title: "Payment Method" },
          { title: "Timestamp" },
          { title: "Shipments" },
        ]
      });
    });
  }

  loadPaymentsData();
</script>



