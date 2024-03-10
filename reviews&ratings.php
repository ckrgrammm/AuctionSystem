<?php
$title = "Reviews and Ratings";
session_start();
require_once 'auth_validate.php';
include("header.php");

?>

<style>
    .custom-file-upload {
        border: 1px solid #ccc;
        display: inline-block;
        padding: 6px 12px;
        cursor: pointer;
        background-color: #f8f8f8;
        border-radius: 4px;
        margin-top: 5px;
    }

    .custom-file-upload:hover {
        background-color: #e8e8e8;
    }

    #image-preview {
        max-width: 200px; /* You can set this to whatever width you prefer */
        max-height: 200px;
        margin-top: 10px;
    }
    
    .review-image {
        max-width: 200px; /* You can set this to whatever width you prefer */
        max-height: 200px;
        margin-top: 10px;
    }
</style>

<div class="tab-pane container" id="pd-rev">
    <div class="pd-tab__rev">
        <div class="u-s-m-b-30">
            <div class="pd-tab__rev-score">
                <div class="u-s-m-b-8 overall-review-rating">
                    <h2></h2>
                </div>
                <div class="gl-rating-style-2 u-s-m-b-8 overall-rating"></div>
                <div class="u-s-m-b-8">
                    <h4>We want to hear from you!</h4>
                </div>

                <span class="gl-text">Tell us what you think about this item</span>
            </div>
        </div>
        <div class="u-s-m-b-30">
            <form class="pd-tab__rev-f1">
                <div class="rev-f1__group">
                    <div class="u-s-m-b-15 total-reviews">
                        <h2></h2>
                    </div>
                    <!-- <div class="u-s-m-b-15">
                        <label for="sort-review"></label>
                        <select class="select-box select-box--primary-style" id="sort-review" onchange="sortReviews(this.value)">
                            <option value="best">Sort by: Best Rating</option>
                            <option value="worst">Sort by: Worst Rating</option>
                        </select>
                    </div> -->
                </div>
                <div class="rev-f1__review" id="rev-f1__review">
                    
                </div>
            </form>
        </div>
        <?php if(isset($_SESSION['user_logged_in']) && $_SESSION['user_logged_in'] == true): ?>
        <div class="u-s-m-b-30">
            <form class="pd-tab__rev-f2" enctype="multipart/form-data" id="review-form" method="post">
                <h2 class="u-s-m-b-15">Add a Review</h2>

                <span class="gl-text u-s-m-b-15">Your email address will not be published. Required fields are marked *</span>
                <div class="u-s-m-b-30">
                    <div class="rev-f2__table-wrap gl-scroll">
                        <table class="rev-f2__table">
                            <thead>
                                <tr>
                                    <th>
                                        <div class="gl-rating-style-2"><i class="fas fa-star"></i>
                                            <span>(1)</span>
                                        </div>
                                    </th>
                                    <th>
                                        <div class="gl-rating-style-2"><i class="fas fa-star"></i><i class="fas fa-star"></i>
                                            <span>(2)</span>
                                        </div>
                                    </th>
                                    <th>
                                        <div class="gl-rating-style-2"><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i>
                                            <span>(3)</span>
                                        </div>
                                    </th>
                                    <th>
                                        <div class="gl-rating-style-2"><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i>
                                            <span>(4)</span>
                                        </div>
                                    </th>
                                    <th>
                                        <div class="gl-rating-style-2"><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i>
                                            <span>(5)</span>
                                        </div>
                                    </th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>
                                        <!--====== Radio Box ======-->
                                        <div class="radio-box">
                                            <input type="radio" id="star-1" name="rating" value="1">
                                            <div class="radio-box__state radio-box__state--primary">
                                                <label class="radio-box__label" for="star-1"></label>
                                            </div>
                                        </div>
                                        <!--====== End - Radio Box ======-->
                                    </td>
                                    <td>
                                        <!--====== Radio Box ======-->
                                        <div class="radio-box">
                                            <input type="radio" id="star-2" name="rating" value="2">
                                            <div class="radio-box__state radio-box__state--primary">
                                                <label class="radio-box__label" for="star-2"></label>
                                            </div>
                                        </div>
                                        <!--====== End - Radio Box ======-->
                                    </td>
                                    <td>
                                        <!--====== Radio Box ======-->
                                        <div class="radio-box">
                                            <input type="radio" id="star-3" name="rating" value="3">
                                            <div class="radio-box__state radio-box__state--primary">
                                                <label class="radio-box__label" for="star-3"></label>
                                            </div>
                                        </div>
                                        <!--====== End - Radio Box ======-->
                                    </td>
                                    <td>
                                        <!--====== Radio Box ======-->
                                        <div class="radio-box">
                                            <input type="radio" id="star-4" name="rating" value="4">
                                            <div class="radio-box__state radio-box__state--primary">
                                                <label class="radio-box__label" for="star-4"></label>
                                            </div>
                                        </div>
                                        <!--====== End - Radio Box ======-->
                                    </td>
                                    <td>
                                        <!--====== Radio Box ======-->
                                        <div class="radio-box">
                                            <input type="radio" id="star-5" name="rating" value="5">
                                            <div class="radio-box__state radio-box__state--primary">
                                                <label class="radio-box__label" for="star-5"></label>
                                            </div>
                                        </div>
                                        <!--====== End - Radio Box ======-->
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
                <div class="rev-f2__group">
                    <div class="u-s-m-b-15">
                        <label class="gl-label" for="reviewer-text">YOUR REVIEW *</label><textarea class="text-area text-area--primary-style" id="reviewer-text"></textarea>
                    </div>
                    <div>
                        <p class="u-s-m-b-30">
                            <label class="gl-label" for="review-image">IMAGE (optional)</label>
                            <input type="file" class="input-file" id="review-image" name="review_image" style="display: none;">
                            <label for="review-image" class="custom-file-upload">Choose File</label>
                            <img id="image-preview" src="#" alt="Image Preview" style="display: none;"/>
                        </p>
                    </div>
                </div>
                <div>
                    <button class="btn btn--e-brand-shadow" type="submit">SUBMIT</button>
                </div>
            </form>
        </div>
        <?php endif; ?>
    </div>
</div>

<!--====== Vendor Js ======-->
<script src="js/vendor.js"></script>

<!--====== jQuery Shopnav plugin ======-->
<script src="js/jquery.shopnav.js"></script>

<!--====== App ======-->
<script src="js/app.js"></script>

<?php
include("footer.php");
?>

<script type="module">
    import { db } from './firebase/firebaseInit.js';
    import { collection, getDocs, query, where, doc, getDoc } from 'https://www.gstatic.com/firebasejs/9.6.10/firebase-firestore.js';
    import { onSnapshot } from "https://www.gstatic.com/firebasejs/9.6.10/firebase-firestore.js";

    // Function to fetch and render reviews
    async function fetchAndRenderReviews() {
        const reviewsCollectionRef = collection(db, "Review and Rating"); // Adjust the collection path as needed

        // Get the reviews snapshot
        const reviewsSnapshot = await getDocs(reviewsCollectionRef);
        
        // Process each review
        for (const doc of reviewsSnapshot.docs) {
            const reviewData = doc.data();
            const reviewElement = await createReviewElement(reviewData);
            document.getElementById('rev-f1__review').appendChild(reviewElement);
        }
    }

    // Function to create review HTML element
    async function createReviewElement(reviewData) {
        // Create the outer div for the review
        const reviewDiv = document.createElement('div');
        reviewDiv.className = 'review-o u-s-m-b-15';

        // Create the info div that will contain the reviewer name and date
        const infoDiv = document.createElement('div');
        infoDiv.className = 'review-o__info u-s-m-b-8';

        // Create and append the reviewer's name span
        const nameSpan = document.createElement('span');
        nameSpan.className = 'review-o__name';
        const userName = await fetchUserName(reviewData.reviewerId);
        nameSpan.textContent = userName;
        infoDiv.appendChild(nameSpan);

        // Create and append the date span
        const dateSpan = document.createElement('span');
        dateSpan.className = 'review-o__date';
        // Convert timestamp to a readable format
        const reviewDate = new Date(reviewData.timestamp).toLocaleString(); // Firestore timestamp
        dateSpan.textContent = reviewDate;
        infoDiv.appendChild(dateSpan);

        // Append infoDiv to the main reviewDiv
        reviewDiv.appendChild(infoDiv);

        // Create and append the ratings div
        const ratingDiv = document.createElement('div');
        ratingDiv.className = 'review-o__rating gl-rating-style u-s-m-b-8';
        for (let i = 0; i < 5; i++) {
            const starIcon = document.createElement('i');
            starIcon.className = i < reviewData.rating ? 'fas fa-star' : 'far fa-star'; // full star for ratings, empty star otherwise
            ratingDiv.appendChild(starIcon);
        }
        const ratingSpan = document.createElement('span');
        ratingSpan.textContent = `(${reviewData.rating})`;
        ratingDiv.appendChild(ratingSpan);
        
        // Append ratingDiv to the main reviewDiv
        reviewDiv.appendChild(ratingDiv);

        // Create and append the review text paragraph
        const textParagraph = document.createElement('p');
        textParagraph.className = 'review-o__text';
        textParagraph.textContent = reviewData.comment;
        reviewDiv.appendChild(textParagraph);

        // Create and append the image if imageUrl is available
        if (reviewData.imageUrl) {
            const image = document.createElement('img');
            image.src = reviewData.imageUrl;
            image.alt = 'Review Image';
            image.className = 'review-image';
            reviewDiv.appendChild(image);
        }

        return reviewDiv;
    }

    async function fetchUserName(reviewerId) {
        const userRef = doc(db, "auctioneers", reviewerId);
        const userSnap = await getDoc(userRef);

        if (userSnap.exists() && userSnap.data()) {
            return userSnap.data().firstName + " " + userSnap.data().lastName;
        } else {
            const bidderRef = doc(db, "bidders", reviewerId);
            const bidderSnap = await getDoc(bidderRef);
            if (bidderSnap.exists() && bidderSnap.data()) {
                return bidderSnap.data().firstName + " " + bidderSnap.data().lastName;
            } else {
                return "Admin";
            }
        }
    }


    // Call the function to fetch and render reviews
    fetchAndRenderReviews();

</script>

<script type="module">
    import { db } from './firebase/firebaseInit.js';
    import { collection, addDoc } from 'https://www.gstatic.com/firebasejs/9.6.10/firebase-firestore.js';
    import { getStorage, ref as storageRef, uploadBytes, getDownloadURL } from "https://www.gstatic.com/firebasejs/9.6.10/firebase-storage.js";
    
    // Get a reference to the storage service, which is used to create references in your storage bucket
    const storage = getStorage();

    document.getElementById('review-form').addEventListener('submit', async function(e) {
        e.preventDefault();

        // Get the review text
        const reviewText = document.getElementById('reviewer-text').value;
        
        // Get the rating
        const ratingInputs = document.querySelectorAll('input[name="rating"]');
        let rating;
        for (const input of ratingInputs) {
            if (input.checked) {
                rating = input.value;
                break;
            }
        }

        let imageUrl = '';
        const file = document.getElementById('review-image').files[0];
        if (file) {
            // File is selected, upload it to Firebase Storage
            const imageRef = storageRef(storage, `reviewImages/${file.name}`);
            try {
                const snapshot = await uploadBytes(imageRef, file);
                imageUrl = await getDownloadURL(snapshot.ref);
            } catch (error) {
                console.error("Error uploading image: ", error);
            }
        }
        
        // Use the current timestamp
        const timestamp = new Date().toLocaleString();

        // Add a new document with a generated id to Firestore
        try {
            const docRef = await addDoc(collection(db, "Review and Rating"), {
                comment: reviewText,
                rating: Number(rating),
                imageUrl: imageUrl,
                timestamp: timestamp,
                reviewerId: "<?= $_SESSION['uid']; ?>"
                // You may want to add other fields like bidderId here
            });
            console.log("Document written with ID: ", docRef.id);
            alert('Review submitted successfully');
            location.reload();
        } catch (error) {
            console.error("Error adding document: ", error);
        }
    });
</script>

<script>
    document.getElementById('review-image').addEventListener('change', function(event) {
        if (event.target.files.length === 0) {
            const preview = document.getElementById('image-preview');
            preview.style.display = 'none'; 
            return;
        }

        const [file] = event.target.files;
        if (file) {
            const reader = new FileReader();
            reader.onload = function(e) {
                const preview = document.getElementById('image-preview');
                preview.src = e.target.result;
                preview.style.display = 'block';
            };
            reader.readAsDataURL(file);
        }
    });
</script>

<script type="module">
    import { db } from './firebase/firebaseInit.js';
    import { collection, addDoc, getDocs, getDoc } from 'https://www.gstatic.com/firebasejs/9.6.10/firebase-firestore.js';
    import { getStorage, ref as storageRef, uploadBytes, getDownloadURL } from "https://www.gstatic.com/firebasejs/9.6.10/firebase-storage.js";
    
    // Function to calculate and display total reviews and overall ratings
    async function calculateAndDisplayTotalReviewsAndRatings() {
        const reviewsCollectionRef = collection(db, "Review and Rating");
        const reviewsSnapshot = await getDocs(reviewsCollectionRef);
        
        let totalRating = 0;
        let totalReviews = reviewsSnapshot.docs.length;
        
        reviewsSnapshot.forEach(doc => {
            const reviewData = doc.data();
            totalRating += reviewData.rating;
        });
        
        let overallRating = (totalReviews > 0) ? (totalRating / totalReviews) : 0;
        
        // Display the total reviews and overall rating on the page
        const totalReviewsElement = document.querySelector('.total-reviews');
        const overallReviewRatingElement = document.querySelector('.overall-review-rating');
        
        if (totalReviewsElement && overallReviewRatingElement) {
            overallReviewRatingElement.textContent = `${totalReviews} Review(s) - ${overallRating.toFixed(1)} (Overall)`;
            totalReviewsElement.textContent = `${totalReviews} Review(s) for Auction Store`;
        }
        
        // Update the star ratings if you have a dynamic star rating element
        updateStarRatings(overallRating);
    }

    // Function to update the star ratings dynamically
    function updateStarRatings(overallRating) {
        const starsFull = Math.floor(overallRating);
        const starsHalf = (overallRating % 1) >= 0.5 ? 1 : 0;
        const starsEmpty = 5 - starsFull - starsHalf;
        const ratingDiv = document.querySelector('.overall-rating');
        if (ratingDiv) {
            ratingDiv.innerHTML = ''; // Clear existing stars
            
            // Append full stars
            for (let i = 0; i < starsFull; i++) {
                ratingDiv.innerHTML += '<i class="fas fa-star"></i>';
            }
            
            // Append half star if needed
            if (starsHalf) {
                ratingDiv.innerHTML += '<i class="fas fa-star-half-alt"></i>';
            }
            
            // Append empty stars
            for (let i = 0; i < starsEmpty; i++) {
                ratingDiv.innerHTML += '<i class="far fa-star"></i>';
            }
        }
    }

    // Call this function when you want to display total reviews and overall ratings
    calculateAndDisplayTotalReviewsAndRatings();

</script>
