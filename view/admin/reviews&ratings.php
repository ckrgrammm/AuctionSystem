<?php
session_start();
require_once '../../includes/auth_validate.php';
include_once('../../includes/header.php');

?>

<!-- <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css"> -->
<link rel="stylesheet" href="https://cdn.datatables.net/2.0.1/css/dataTables.bootstrap.css">
<!-- <script src="https://code.jquery.com/jquery-3.7.1.js"></script> -->
<!-- <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script> -->
<script src="https://cdn.datatables.net/2.0.1/js/dataTables.js"></script>
<script src="https://cdn.datatables.net/2.0.1/js/dataTables.bootstrap.js"></script>

<style>
    .review-img{
        max-width: 100px; /* You can set this to whatever width you prefer */
        max-height: 100px;
    }
</style>

<!-- Main container -->
<div id="page-wrapper">
    <div class="row">
        <div class="col-lg-6">
            <h1 class="page-header">Reviews & Ratings</h1>
        </div>
    </div>
    <?php include '../../includes/flash_messages.php' ;?>

    <table id="example" class="table table-striped table-bordered" style="width:100%">
        
    </table>
    
</div>
<!-- //Main container -->
<?php include_once('../../includes/footer.php'); ?>

<script type="module">
    import { db } from '../../firebase/firebaseInit.js';
    import { collection, getDocs, doc, getDoc } from 'https://www.gstatic.com/firebasejs/9.6.10/firebase-firestore.js';

    async function loadReviewsAndRatingsData() {
        const reviewsSnapshot = await getDocs(collection(db, "Review and Rating"));
        let reviewsData = [];

        for (const docSnapshot of reviewsSnapshot.docs) {
            let review = docSnapshot.data();
            let reviewerName = "Admin";
            // Try to get the name from the auctioneers collection
            const auctioneerRef = doc(db, "auctioneers", review.reviewerId);
            const auctioneerSnap = await getDoc(auctioneerRef);
            if (auctioneerSnap.exists()) {
                reviewerName = auctioneerSnap.data().firstName + " " + auctioneerSnap.data().lastName;
            } else {
                // If not found, try to get the name from the bidders collection
                const bidderRef = doc(db, "bidders", review.reviewerId);
                const bidderSnap = await getDoc(bidderRef);
                if (bidderSnap.exists()) {
                    reviewerName = bidderSnap.data().firstName + " " + bidderSnap.data().lastName;
                }
            }

            // Push the review data along with the reviewer's name and image
            reviewsData.push([
                reviewerName, // Reviewer's name
                review.comment,
                review.rating,
                new Date(review.timestamp).toLocaleString(),
                review.imageUrl // Image URL
            ]);
        }

        // Initialize DataTable with this data
        $(document).ready(function() {
            $('#example').DataTable({
                data: reviewsData,
                columns: [
                    { title: "Reviewer" },
                    { title: "Comment" },
                    { title: "Rating" },
                    { title: "Date" },
                    {
                        title: "Image",
                        render: function(data, type, row) {
                            return '<img src="'+data+'" class="review-img"/>'; // Image column with CSS class
                        }
                    }
                ]
            });
        });
    }

    loadReviewsAndRatingsData();
</script>




