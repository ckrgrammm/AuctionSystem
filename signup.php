<?php

ini_set('display_errors', 1);
error_reporting(E_ALL);
include('db.php');
$title = "Sign Up";
include('header.php');

// Handling form data
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Assuming you have form fields named 'status', 'firstName', and 'lastName'
    $status = $_POST['status']; // Example: 'Auctioneer' or 'Bidder'
    $firstName = $_POST['firstName'];
    $lastName = $_POST['lastName'];
    // Add other form fields as necessary

    // Decide the collection based on user status
    $collectionName = ($status == 'Auctioneer') ? 'auctioneers' : 'bidders';

    // Prepare the data to be saved
    $data = [
        'firstName' => $firstName,
        'lastName' => $lastName,
        // Add other form fields as necessary
    ];

    // Save data to Firestore
    try {
        $documentReference = $database->collection($collectionName)->add($data);
        // If needed, get the document ID of the newly created document
        $documentId = $documentReference->id();

        // Redirect or perform other actions as needed
        header('Location: signin.php');
        exit;
    } catch (Exception $e) {
        echo 'Error: ' . $e->getMessage();
    }
}
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

                                <a href="index.html">Home</a>
                            </li>
                            <li class="is-marked">

                                <a href="signup.html">Register</a>
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
                                    <div class="u-s-m-b-30">

                                        <label class="gl-label" for="reg-lname">CONTACT *</label>

                                        <input class="input-text input-text--primary-style" type="number" id="reg-lname" placeholder="Contact Number">
                                    </div>
                                    <div class="gl-inline">
                                        <div class="u-s-m-b-30">

                                            <!--====== Date of Birth Select-Box ======-->

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
                                            <!--====== End - Date of Birth Select-Box ======-->
                                        </div>
                                        <div class="u-s-m-b-30">

                                            <label class="gl-label" for="gender">GENDER</label><select class="select-box select-box--primary-style u-w-100" id="gender">
                                                <option selected>Select</option>
                                                <option value="male">Male</option>
                                                <option value="male">Female</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="u-s-m-b-30">

                                        <label class="gl-label" for="reg-email">E-MAIL *</label>

                                        <input class="input-text input-text--primary-style" type="text" id="reg-email" name="email" placeholder="Enter E-mail">
                                    </div>
                                    <div class="u-s-m-b-30">

                                        <label class="gl-label" for="reg-password">PASSWORD *</label>

                                        <input class="input-text input-text--primary-style" type="text" id="reg-password" name="password" placeholder="Enter Password">
                                    </div>

                                    <div class="u-s-m-b-30">

                                        <label class="gl-label" for="gender">STATUS *</label><select class="select-box select-box--primary-style u-w-100" id="status">
                                            <option selected>Select</option>
                                            <option value="male">Auctioneer</option>
                                            <option value="male">Bidder</option>
                                        </select>
                                    </div>
                                    <div class="u-s-m-b-15">

                                        <button class="btn btn--e-transparent-brand-b-2" type="submit">CREATE</button>
                                    </div>

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
<script src="https://www.gstatic.com/firebasejs/9.6.10/firebase-app.js"></script>
<script src="https://www.gstatic.com/firebasejs/9.6.10/firebase-auth.js"></script>


<script type="module" src="./firebase/firebaseInit.js"></script>
<script type="module" src="./firebase/firebaseAuth.js"></script>


</body>

</html>

<?php

include("footer.php");

?>