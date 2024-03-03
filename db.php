<?php

require __DIR__.'/vendor/autoload.php';

use Google\Cloud\Firestore\FirestoreClient;

$serviceAccountPath = __DIR__ . '/firebase/auctionsystem-c68b7-firebase-adminsdk-i5fpv-0d559df87f.json';



// Create an instance of FirestoreClient
$firestore = new FirestoreClient([
    'keyFilePath' => $serviceAccountPath,
]);

$collectionName = 'auctioneers'; // The name of the collection
$documentId = 'Lh1dh6XxyaWTd7FgkNtpuF9x7vg1'; // The ID of the document you want to fetch

$firstName = ""; // Initialize the variable
$lastName = ""; // Initialize the variable
$status = ""; // Initialize the variable

try {
    $documentReference = $firestore->collection($collectionName)->document($documentId);
    $snapshot = $documentReference->snapshot();

    if ($snapshot->exists()) {
        $userData = $snapshot->data();
        $firstName = $userData['firstName']; // Assign the value from the document
        $lastName = $userData['lastName']; // Assign the value from the document
        $status = $userData['status']; // Assign the value from the document
    } else {
        echo "Document does not exist!";
    }
} catch (Exception $e) {
    echo 'Error: ' . $e->getMessage();
}
?>