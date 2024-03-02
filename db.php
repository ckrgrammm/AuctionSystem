<?php

require 'vendor/autoload.php';

use Google\Cloud\Firestore\FirestoreClient;

$serviceAccountPath = __DIR__ . '/auctionsystem-c68b7-firebase-adminsdk-i5fpv-0d559df87f.json';
$projectId = 'auctionsystem-c68b7';

try {
    // Create an instance of FirestoreClient
    $firestore = new FirestoreClient([
        'keyFilePath' => $serviceAccountPath,
        'projectId' => $projectId,
    ]);

    // Assuming $firestore is being used somewhere below...
    $database = $firestore;

    // Example: Fetch a document
    $document = $firestore->collection('YourCollection')->document('YourDocumentId')->snapshot();
    if ($document->exists()) {
        print_r($document->data());
    } else {
        echo "Document does not exist!" . PHP_EOL;
    }
} catch (Exception $e) {
    // Catch and display errors
    echo 'Firestore connection failed: ' . $e->getMessage();
}

?>
