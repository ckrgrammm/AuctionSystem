import { app } from './firebaseInit.js'; // Ensure this path is correct
import { getAuth, createUserWithEmailAndPassword } from "https://www.gstatic.com/firebasejs/9.6.10/firebase-auth.js";
import { getFirestore, collection, addDoc } from "https://www.gstatic.com/firebasejs/9.6.10/firebase-firestore.js";

const auth = getAuth(app);
const db = getFirestore(app);

alert("asdfasdf");
console.log("asdfasdfasdfas");
