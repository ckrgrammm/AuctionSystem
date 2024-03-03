import { initializeApp } from "https://www.gstatic.com/firebasejs/9.6.10/firebase-app.js";
import { getAuth, createUserWithEmailAndPassword } from "https://www.gstatic.com/firebasejs/9.6.10/firebase-auth.js";
import { getFirestore, doc, setDoc } from "https://www.gstatic.com/firebasejs/9.6.10/firebase-firestore.js";
import { signInWithEmailAndPassword } from "https://www.gstatic.com/firebasejs/9.6.10/firebase-auth.js";




const firebaseConfig = {
  apiKey: "AIzaSyDh5BYXJjnTzoovmpx9_kyFCOMxasi3J4g",
  authDomain: "auctionsystem-c68b7.firebaseapp.com",
  databaseURL: "https://auctionsystem-c68b7-default-rtdb.firebaseio.com",
  projectId: "auctionsystem-c68b7",
  storageBucket: "auctionsystem-c68b7.appspot.com",
  messagingSenderId: "376813246187",
  appId: "1:376813246187:web:481ae61618f648feec50ae",
  measurementId: "G-VMYG978N9N"
};

// Initialize Firebase
export const app = initializeApp(firebaseConfig);
const auth = getAuth(app);
const db = getFirestore(app);
export { auth, db };


document.getElementById('signup-form').addEventListener('submit', async function (e) {
  e.preventDefault();

  // Get user info from form
  const email = document.getElementById('reg-email').value;
  const password = document.getElementById('reg-password').value;
  const firstName = document.getElementById('reg-fname').value;
  const lastName = document.getElementById('reg-lname').value;
  const status = document.getElementById('status').value; // Assuming you have a 'status' field


  try {
    const userCredential = await createUserWithEmailAndPassword(auth, email, password);
    const user = userCredential.user;

    const collectionName = status === 'Auctioneer' ? 'auctioneers' : 'bidders';

    await setDoc(doc(db, collectionName, user.uid), {
      firstName,
      lastName,
      email, 
      status,
    });

    console.log("User information saved to Firestore");
    alert("Account Created Successfully !");

    setTimeout(() => {
      window.location.href = 'signin.php';
    }, 6000);
  } catch (error) {
    if (error.code === 'auth/email-already-in-use') {
      alert("The Email Has Been Used");
    } else if (error.code === 'firestore/permission-denied') {
      window.location.href = '404.php';
    } else {
      window.location.href = 'signin.php';
    }
    console.error("Error creating user", error.code, error.message);
  }
});


// Sign-in functionality
document.addEventListener('DOMContentLoaded', () => {
  const signInForm = document.getElementById('signin-form');
  if (signInForm) {
      signInForm.addEventListener('submit', async (e) => {
          e.preventDefault();

          const email = document.getElementById('signin-email').value; // Ensure you have this ID in your HTML
          const password = document.getElementById('signin-password').value; // Ensure you have this ID in your HTML

          try {
              const userCredential = await signInWithEmailAndPassword(auth, email, password);
              console.log("User signed in:", userCredential.user);

              // Redirect after successful sign-in
              window.location.href = 'dashboard.php'; // Adjust the redirection URL as needed
          } catch (error) {
              console.error("Error signing in:", error.message);
              // Optionally, handle/display error messages in your HTML
          }
      });
  }
});