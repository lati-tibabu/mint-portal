<?php
include("config.php");

if (isset($_GET['document_id'])) {
    $documentId = $_GET['document_id'];

    // Perform database query to delete the news item with the given news_id
    $deleteQuery = "DELETE FROM documents WHERE document_id = $documentId";
    
    if (mysqli_query($con, $deleteQuery)) {
        // Deletion successful
        header("Location: ../admin-content/cms-pages/documents.php");
        exit();
    } else {
        // Deletion failed
        echo "Error deleting document: " . mysqli_error($con);
    }
}
?>
