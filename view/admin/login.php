<?php

include '../../includes/header.php';
?>
<div id="page-" class="col-md-4 col-md-offset-4">
	<form class="form loginform" method="POST" id="admin_login_form">
		<div class="login-panel panel panel-default">
			<div class="panel-heading">Please Sign in</div>
			<div class="panel-body">
				<div class="form-group">
					<label class="control-label">email</label>
					<input type="text" name="email" class="form-control" required="required">
				</div>
				<div class="form-group">
					<label class="control-label">password</label>
					<input type="password" name="passwd" class="form-control" required="required">
				</div>
				<!-- <div class="checkbox">
					<label>
						<input name="remember" type="checkbox" value="1">Remember Me
					</label>
				</div> -->
				<div id="loginError" class="alert alert-danger alert-dismissable fade in" style="display: none;">
					<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
					<!-- Error message will be inserted here by JavaScript -->
				</div>
				<button type="submit" class="btn btn-success loginField">Login</button>
			</div>
		</div>
	</form>
</div>
<?php include '../../includes/footer.php'; ?>

<script type="module" src="../../firebase/firebaseInit.js"></script>
<script type="module">
  import { auth, db } from '../../firebase/firebaseInit.js'; // Make sure you export db in firebaseInit.js
  import { signInWithEmailAndPassword } from "https://www.gstatic.com/firebasejs/9.6.10/firebase-auth.js";
  import { doc, getDoc } from "https://www.gstatic.com/firebasejs/9.6.10/firebase-firestore.js";

	document.querySelector('#admin_login_form').addEventListener('submit', async function (e) {
		e.preventDefault();

		const email = document.querySelector('input[name="email"]').value;
		const password = document.querySelector('input[name="passwd"]').value;

		try {
			const userCredential = await signInWithEmailAndPassword(auth, email, password);
			const user = userCredential.user;

			// Now check if the user is in the admin collection
			const adminRef = doc(db, "admin", user.uid);
			const adminSnap = await getDoc(adminRef);

			if (adminSnap.exists()) {
				// User is an admin, proceed to the dashboard
				window.location.href = `authenticate.php?uid=${encodeURIComponent(user.uid)}`;
			} else {
				// User is not an admin, handle accordingly
				const loginErrorDiv = document.getElementById('loginError');
				loginErrorDiv.textContent = 'Access denied. You are not an admin.';
				loginErrorDiv.style.display = 'block'; // Make the error div visible
			}
		} catch (error) {
			// console.error("Error signing in", error);
			// Display an error message to the user
			const loginErrorDiv = document.getElementById('loginError');
			loginErrorDiv.textContent = 'Wrong email or password. Please try again.';
			loginErrorDiv.style.display = 'block'; // Make the error div visible
		}
	});
</script>

