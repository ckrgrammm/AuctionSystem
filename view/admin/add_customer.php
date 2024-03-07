<?php
session_start();
require_once '../../includes/auth_validate.php';
require_once '../../includes/header.php'; 
?>
<div id="page-wrapper">
<div class="row">
     <div class="col-lg-12">
            <h2 class="page-header">Add Customers</h2>
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
                    <input type="radio" name="role" value="auctioneer" required="required"/> Auctioneer
                </label>
                <label class="radio-inline">
                    <input type="radio" name="role" value="bidder" required="required" id="female"/> Bidder
                </label>
            </div>

            <div class="form-group">
                <label for="password">Password *</label>
                <input type="password" name="password" value="" placeholder="Password" class="form-control" required="required" id="password">
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
    import { getAuth, createUserWithEmailAndPassword } from "https://www.gstatic.com/firebasejs/9.6.10/firebase-auth.js";
    import { auth, db } from '../../firebase/firebaseInit.js'; // Make sure you export db in firebaseInit.js
    import { getFirestore, doc, setDoc } from "https://www.gstatic.com/firebasejs/9.6.10/firebase-firestore.js";

    document.getElementById('customer_form').addEventListener('submit', async function (e) {
        e.preventDefault();

        // Get user info from form
        const email = document.getElementById('email').value;
        const password = document.getElementById('password').value;
        const firstName = document.getElementById('f_name').value;
        const lastName = document.getElementById('l_name').value;
        const role = document.querySelector('input[name="role"]:checked').value;

        try {
            // Create user with email and password in Firebase Auth
            const userCredential = await createUserWithEmailAndPassword(auth, email, password);
            const user = userCredential.user;

            // Determine collection name based on the role
            const collectionName = role === 'auctioneer' ? 'auctioneers' : 'bidders';

            // Save the user data in Firestore
            await setDoc(doc(db, collectionName, user.uid), {
                firstName,
                lastName,
                email, 
                status: role.charAt(0).toUpperCase() + role.slice(1) // Capitalize the first letter
            });

            console.log("User information saved to Firestore");
            alert("Account Created Successfully!");

            // Redirect user to sign-in page or dashboard
            window.location.href = 'customers.php';
        } catch (error) {
            console.error("Error creating user", error.code, error.message);
            alert("Error creating account: " + error.message);
        }
    });
</script>
