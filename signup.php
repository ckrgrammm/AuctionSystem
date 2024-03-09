<?php
$title = "Sign Up";
session_start();
include('header.php');
?>


<!DOCTYPE html>
<html lang="en">
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

                                <a href="signup.php">Register</a>
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
                            <h1 class="section__heading u-c-secondary">CREATE AN ACCOUNT</h1>
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
                                <h1 class="gl-h1">PERSONAL INFORMATION</h1>
                                <form class="l-f-o__form" id="signup-form" action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST">

                                    <div class="u-s-m-b-30">

                                        <label class="gl-label" for="reg-fname">FIRST NAME *</label>

                                        <input class="input-text input-text--primary-style" type="text" id="reg-fname" name="firstName" placeholder="First Name">
                                    </div>
                                    <div class="u-s-m-b-30">

                                        <label class="gl-label" for="reg-lname">LAST NAME *</label>

                                        <input class="input-text input-text--primary-style" type="text" id="reg-lname" placeholder="Last Name">
                                    </div>
                                    <!-- <div class="u-s-m-b-30">

                                        <label class="gl-label" for="reg-lname">CONTACT *</label>

                                        <input class="input-text input-text--primary-style" type="number" id="reg-lname" placeholder="Contact Number">
                                    </div> -->
                                    <!-- <div class="gl-inline">
                                        <div class="u-s-m-b-30">
                                            <span class="gl-label">BIRTHDAY</span>
                                            <div class="gl-dob"><select class="select-box select-box--primary-style">
                                                    <option selected>Month</option>
                                                    <option value="male">January</option>
                                                    <option value="male">February</option>
                                                    <option value="male">March</option>
                                                    <option value="male">April</option>
                                                </select><select class="select-box select-box--primary-style">
                                                    <option selected>Day</option>
                                                    <option value="01">01</option>
                                                    <option value="02">02</option>
                                                    <option value="03">03</option>
                                                    <option value="04">04</option>
                                                </select><select class="select-box select-box--primary-style">
                                                    <option selected>Year</option>
                                                    <option value="1991">1991</option>
                                                    <option value="1992">1992</option>
                                                    <option value="1993">1993</option>
                                                    <option value="1994">1994</option>
                                                </select></div>
                                        </div>
                                        <div class="u-s-m-b-30">

                                            <label class="gl-label" for="gender">GENDER</label><select class="select-box select-box--primary-style u-w-100" id="gender">
                                                <option selected>Select</option>
                                                <option value="male">Male</option>
                                                <option value="male">Female</option>
                                            </select>
                                        </div>
                                    </div> -->
                                    <div class="u-s-m-b-30">

                                        <label class="gl-label" for="reg-email">E-MAIL *</label>

                                        <input class="input-text input-text--primary-style" type="text" id="reg-email" name="email" placeholder="Enter E-mail">
                                    </div>
                                    <div class="u-s-m-b-30">

                                        <label class="gl-label" for="reg-password">PASSWORD *</label>

                                        <input class="input-text input-text--primary-style" type="text" id="reg-password" name="password" placeholder="Enter Password">
                                    </div>

                                    <div class="u-s-m-b-30">

                                        <label class="gl-label" for="status">STATUS *</label>
                                        <select class="select-box select-box--primary-style u-w-100" id="status" name="status">
                                            <option selected>Select</option>
                                            <option value="Auctioneer">Auctioneer</option>
                                            <option value="Bidder">Bidder</option>
                                        </select>
                                    </div>
                                    <div class="u-s-m-b-15">

                                        <button class="btn btn--e-transparent-brand-b-2" type="submit">CREATE</button>
                                    </div>
                                    <a class="gl-link" style="color:#ADD8E6;" href="signin.php">Already Have An Account ?</a>
                                    <br>

                                    <a class="gl-link" href="#">Return to Store</a>
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

<!-- Firebase SDK -->
<script type="module" src="https://www.gstatic.com/firebasejs/9.6.10/firebase-app.js"></script>
<script type="module" src="https://www.gstatic.com/firebasejs/9.6.10/firebase-auth.js"></script>
<script type="module" src="https://www.gstatic.com/firebasejs/9.6.10/firebase-firestore.js"></script>
<script type="module" src="https://www.gstatic.com/firebasejs/9.6.10/firebase-storage.js"></script>


<script type="module" src="./firebase/firebaseInit.js"></script>
<script type="module">
    import { getAuth, createUserWithEmailAndPassword } from "https://www.gstatic.com/firebasejs/9.6.10/firebase-auth.js";
    import { auth, db } from './firebase/firebaseInit.js'; // Make sure db is properly exported
    import { getFirestore, doc, setDoc } from "https://www.gstatic.com/firebasejs/9.6.10/firebase-firestore.js";

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

            // console.log("User information saved to Firestore");
            alert("Account Created Successfully !");

            setTimeout(() => {
                window.location.href = 'signin.php';
            }, 2000);
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
</script>

</body>

</html>

<?php

include("footer.php");

?>