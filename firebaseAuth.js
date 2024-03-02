function signUpUser(email, password) {
    firebase.auth().createUserWithEmailAndPassword(email, password)
        .then((userCredential) => {
            // User signed up successfully
            console.log("User created:", userCredential.user);
            // Redirect to a PHP page for handling additional user details
            // You might want to use sessionStorage or localStorage to temporarily store user details
            sessionStorage.setItem('userEmail', email);
            // Then redirect
            window.location.href = 'additionalDetails.php'; // Adjust the URL as needed
        })
        .catch((error) => {
            console.error("Error signing up:", error.message);
            alert(error.message); // Show error message to the user
        });
}

// Listen for the form submit event
document.querySelector('#signup-form').addEventListener('submit', (e) => {
    e.preventDefault(); // Prevent the default form submission behavior

    // Capture the email and password from the form
    const email = document.querySelector('#reg-email').value;
    const password = document.querySelector('#reg-password').value;

    // Use Firebase Authentication to sign up the user
    firebase.auth().createUserWithEmailAndPassword(email, password)
        .then((userCredential) => {
            // User signed up successfully
            console.log("User created successfully with email:", email);
            alert("User created successfully. You can now log in.");
            // Optionally, redirect the user or clear the form
            // window.location.href = 'signin.html'; // Redirect to sign-in page
            // document.querySelector('#signup-form').reset(); // Clear the form
        })
        .catch((error) => {
            const errorCode = error.code;
            const errorMessage = error.message;
            console.error("Error during signup:", errorMessage);
            alert("Error during signup: " + errorMessage); // Display an error message
        });
});




  
  function signInUser(email, password) {
    firebase.auth().signInWithEmailAndPassword(email, password)
      .then((userCredential) => {
        // Signed in 
        var user = userCredential.user;
        console.log("User signed in:", user);
        // Redirect the user or update UI
      })
      .catch((error) => {
        var errorCode = error.code;
        var errorMessage = error.message;
        console.error("Error signing in:", errorMessage);
        alert(errorMessage); // Or display the error message on the webpage
      });
  }
  
  // Sign out function
  function signOutUser() {
    // Implementation
  }
  
  // Check for authenticated user
  function checkAuthState() {
    // Implementation
  }
  

  