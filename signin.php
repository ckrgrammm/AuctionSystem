<?php
$title = "Sign In";
session_start();
require_once 'auth_validate.php';
include("header.php");
?>
<style>
    .alert {
        padding: 15px;
        margin-bottom: 20px;
        border: 1px solid transparent;
        border-radius: 4px;
        position: relative;
        box-sizing: border-box;
    }

    .alert-danger {
        color: #a94442;
        background-color: #f2dede;
        border-color: #ebccd1;
    }

    .alert-dismissable .close {
        position: absolute;
        top: 0;
        right: 0;
        padding: 0.75rem 1.25rem;
        color: inherit;
    }

    .alert-dismissable .close:hover {
        text-decoration: none;
        cursor: pointer;
    }

    .fade {
        opacity: 0;
        transition: opacity 0.15s linear;
    }

    .in {
        opacity: 1;
    }
</style>

<!--====== App Content ======-->
<div class="app-content">

    <!--====== Section 1 ======-->
    <div class="u-s-p-y-60">

        <!--====== Section Content ======-->
        <div class="section__content">
            <div class="container">
                <div class="breadcrumb">
                    <div class="breadcrumb__wrap">
                        <ul class="breadcrumb__list">
                            <li class="has-separator">

                                <a href="index.php">Home</a>
                            </li>
                            <li class="is-marked">

                                <a href="signin.php">Login</a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--====== End - Section 1 ======-->


    <!--====== Section 2 ======-->
    <div class="u-s-p-b-60">

        <!--====== Section Intro ======-->
        <div class="section__intro u-s-m-b-60">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="section__text-wrap">
                            <h1 class="section__heading u-c-secondary">ALREADY REGISTERED?</h1>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!--====== End - Section Intro ======-->


        <!--====== Section Content ======-->
        <div class="section__content">
            <div class="container">
                <div class="row row--center">
                    <div class="col-lg-6 col-md-8 u-s-m-b-30">
                        <div class="l-f-o">
                            <div class="l-f-o__pad-box">
                                <h1 class="gl-h1">I'M NEW CUSTOMER</h1>

                                <span class="gl-text u-s-m-b-30">By creating an account with our store, you will be able to move through the checkout process faster, store shipping addresses, view and track your orders in your account and more.</span>
                                <div class="u-s-m-b-15">

                                    <a class="l-f-o__create-link btn--e-transparent-brand-b-2" href="signup.php">CREATE AN ACCOUNT</a>
                                </div>
                                <h1 class="gl-h1">SIGNIN</h1>
                                <form class="l-f-o__form" action="" method="POST" id="user_login_form">
                                    <div class="u-s-m-b-30">

                                        <label class="gl-label" for="login-email">E-MAIL *</label>

                                        <input class="input-text input-text--primary-style" type="text" id="signin-email" name="email" placeholder="Enter E-mail">
                                    </div>
                                    <div class="u-s-m-b-30">

                                        <label class="gl-label" for="login-password">PASSWORD *</label>

                                        <input class="input-text input-text--primary-style" type="text" id="signin-password" name="password" placeholder="Enter Password">
                                    </div>
                                    <div id="loginError" class="alert alert-danger alert-dismissable in" style="display: none;">
                                        <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                                        <!-- Error message will be inserted here by JavaScript -->
                                    </div>
                                    <div class="gl-inline">
                                        <div class="u-s-m-b-30">

                                            <button class="btn btn--e-transparent-brand-b-2" type="submit">LOGIN</button>
                                        </div>
                                        <div class="u-s-m-b-30">

                                            <a class="gl-link" href="lost-password.php">Lost Your Password?</a>
                                        </div>
                                    </div>
                                    <div class="u-s-m-b-30">

                                        <!--====== Check Box ======-->
                                        <!-- <div class="check-box">

                                            <input type="checkbox" id="remember-me">
                                            <div class="check-box__state check-box__state--primary">

                                                <label class="check-box__label" for="remember-me">Remember Me</label>
                                            </div>
                                        </div> -->
                                        <!--====== End - Check Box ======-->
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!--====== End - Section Content ======-->
    </div>
    <!--====== End - Section 2 ======-->
</div>
<!--====== End - App Content ======-->


</div>
<!--====== End - Main App ======-->




<!--====== Vendor Js ======-->
<script src="js/vendor.js"></script>

<!--====== jQuery Shopnav plugin ======-->
<script src="js/jquery.shopnav.js"></script>

<!--====== App ======-->
<script src="js/app.js"></script>



</body>

</html>

<script type="module" src="https://www.gstatic.com/firebasejs/9.6.10/firebase-app.js"></script>
<script type="module" src="https://www.gstatic.com/firebasejs/9.6.10/firebase-auth.js"></script>
<script type="module" src="https://www.gstatic.com/firebasejs/9.6.10/firebase-firestore.js"></script>
<script type="module" src="https://www.gstatic.com/firebasejs/9.6.10/firebase-storage.js"></script>

<script type="module" src="./firebase/firebaseInit.js"></script>
<script type="module">
  import { auth, db } from './firebase/firebaseInit.js'; 
  import { signInWithEmailAndPassword } from "https://www.gstatic.com/firebasejs/9.6.10/firebase-auth.js";
  import { doc, getDoc } from "https://www.gstatic.com/firebasejs/9.6.10/firebase-firestore.js";

  document.querySelector('#user_login_form').addEventListener('submit', async function (e) {
    e.preventDefault();

    const email = document.querySelector('input[name="email"]').value;
    const password = document.querySelector('input[name="password"]').value;
    const loginErrorDiv = document.getElementById('loginError');
    
    try {
      const userCredential = await signInWithEmailAndPassword(auth, email, password);
      const user = userCredential.user;

      // Check if the user is in the admin collection
      const adminRef = doc(db, "admin", user.uid);
      const adminSnap = await getDoc(adminRef);

      if (adminSnap.exists()) {
        window.location.href = `authenticate.php?uid=${encodeURIComponent(user.uid)}`;
      } else {
        // Check if the user is in the auctioneers collection
        const auctioneersRef = doc(db, "auctioneers", user.uid);
        const auctioneersSnap = await getDoc(auctioneersRef);

        if (auctioneersSnap.exists()) {
          window.location.href = `authenticate.php?uid=${encodeURIComponent(user.uid)}&status=auctioneers`;
        } else {
          // Check if the user is in the bidders collection
          const biddersRef = doc(db, "bidders", user.uid);
          const biddersSnap = await getDoc(biddersRef);

          if (biddersSnap.exists()) {
            window.location.href = `authenticate.php?uid=${encodeURIComponent(user.uid)}`;
          } else {
            // User is not found in any role-specific collections
            loginErrorDiv.textContent = 'Wrong email or password. Please try again.';
            loginErrorDiv.style.display = 'block'; 
          }
        }
      }
    } catch (error) {
      // Display an error message to the user
      loginErrorDiv.textContent = 'Wrong email or password. Please try again.';
      loginErrorDiv.style.display = 'block';
    }
  });
</script>

<?php

include("footer.php")
?>