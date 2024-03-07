<?php
session_start();
require_once '../../includes/auth_validate.php';
require_once '../../includes/header.php'; 

$userId = ''; // Default value
if(isset($_GET['id']) && $_GET['id'] != '') {
    $userId = $_GET['id'];
}

?>
<div id="page-wrapper">
<div class="row">
     <div class="col-lg-12">
            <h2 class="page-header">Edit Customer</h2>
        </div>
        
</div>
    <form class="form" action="" method="post"  id="customer_form" enctype="multipart/form-data">
        <fieldset>
            <div class="form-group">
                <label for="f_name">First Name *</label>
                <input type="text" name="f_name" value="" placeholder="First Name" class="form-control" required="required" id = "f_name" >
            </div> 

            <div class="form-group">
                <label for="l_name">Last name *</label>
                <input type="text" name="l_name" value="" placeholder="Last Name" class="form-control" required="required" id="l_name">
            </div> 

            <div class="form-group">
                <label for="email">Email</label>
                    <input  type="email" name="email" value="" placeholder="E-Mail Address" class="form-control" id="email">
            </div>

            <div class="form-group">
                <label>Role * </label>
                <label class="radio-inline">
                    <input type="radio" name="role" value="auctioneer" disabled/> Auctioneer
                </label>
                <label class="radio-inline">
                    <input type="radio" name="role" value="bidder" disabled /> Bidder
                </label>
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
  import { getFirestore, doc, getDoc, updateDoc, deleteDoc } from "https://www.gstatic.com/firebasejs/9.6.10/firebase-firestore.js";
  import { db } from '../../firebase/firebaseInit.js';

  // Assuming `userId` is declared and set from PHP's $userId
  const userId = "<?php echo $userId; ?>";

  async function loadUserData(userId) {
    // Attempt to get the user from both collections
    const auctioneerRef = doc(db, "auctioneers", userId);
    const bidderRef = doc(db, "bidders", userId);

    let userSnap = await getDoc(auctioneerRef);
    let collection = "auctioneers";
    
    // If not found in 'auctioneers', try 'bidders'
    if (!userSnap.exists()) {
      userSnap = await getDoc(bidderRef);
      collection = "bidders";
    }

    if (userSnap.exists()) {
      const userData = userSnap.data();
      document.getElementById('f_name').value = userData.firstName;
      document.getElementById('l_name').value = userData.lastName;
      document.getElementById('email').value = userData.email;
      // Handle role selection based on the collection
      if (collection === "auctioneers") {
        document.querySelector('input[name="role"][value="auctioneer"]').checked = true;
      } else if (collection === "bidders") {
        document.querySelector('input[name="role"][value="bidder"]').checked = true;
      }
      return collection; // Return the collection where the user was found
    } else {
      console.error("No user found with the given ID in either 'auctioneers' or 'bidders' collections.");
      return null; // Indicate the user was not found
    }
  }

  document.getElementById('customer_form').addEventListener('submit', async function (e) {
    e.preventDefault();

    // Fetch form data
    const firstName = document.getElementById('f_name').value;
    const lastName = document.getElementById('l_name').value;
    const email = document.getElementById('email').value;
    const role = document.querySelector('input[name="role"]:checked').value;

    // Define the collection based on the role
    const collection = role === "auctioneer" ? "auctioneers" : "bidders";

    // Firestore document reference
    const userRef = doc(db, collection, userId);

    try {
      // Update the user document
      await updateDoc(userRef, {
        firstName,
        lastName,
        email,
        // ... other fields to update
      });

      alert('User updated successfully!');
      // Redirect or handle the UI update
    } catch (error) {
      console.error("Error updating user:", error);
      alert('There was an error updating the user.');
    }
  });

  // When the script loads, we call `loadUserData` and capture the collection returned
  const userCollection = await loadUserData(userId);
</script>

