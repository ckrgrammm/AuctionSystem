import { app } from './firebaseInit'; 
import { getAuth, createUserWithEmailAndPassword } from "https://www.gstatic.com/firebasejs/9.6.10/firebase-auth.js";
import { getFirestore, collection, addDoc } from "https://www.gstatic.com/firebasejs/9.6.10/firebase-firestore.js";


// Get a reference to the auth service
const auth = getAuth(app);
const db = getFirestore(app);

document.getElementById('signup-form').addEventListener('submit', function(e) {
    e.preventDefault();

    // Get user info from form
    const email = document.getElementById('reg-email').value;
    const password = document.getElementById('reg-password').value;
    const firstName = document.getElementById('reg-fname').value;
    const lastName = document.getElementById('reg-lname').value;
    // Add other form fields as necessary

    // Create user with email and password
    createUserWithEmailAndPassword(auth, email, password)
        .then((userCredential) => {
            // Signed in 
            const user = userCredential.user;
            
            // Optionally save additional user info in Firestore
            const collectionName = document.getElementById('status').value === 'Auctioneer' ? 'auctioneers' : 'bidders';
            addDoc(collection(db, collectionName), {
                firstName,
                lastName,
                // Add other fields as necessary
                uid: user.uid // Store the Firebase Auth user ID for reference
            }).then(() => {
                console.log("User information saved to Firestore");
                window.location.href = 'signin.php'; // Redirect to sign-in page
            }).catch((error) => {
                console.error("Error saving user information to Firestore", error);
            });
        })
        .catch((error) => {
            const errorCode = error.code;
            const errorMessage = error.message;
            // Show error messages to the user
            console.error("Error creating user", errorCode, errorMessage);
        });
});
