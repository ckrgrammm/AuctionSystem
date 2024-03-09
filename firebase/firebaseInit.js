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