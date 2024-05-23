<?php
include("config.php");


if ($_SERVER["REQUEST_METHOD"] === "POST") {

    $upload_file = $_POST["update_file"];

    $documentIdToUpdate = $_POST["document_id"];

    $documentName = $_POST["document-name"];
    $documentDescription = $_POST["document-description"];

    if ($upload_file == '1') {
        $fileDirectory = __DIR__ . '\document\\';
        $file_FileName = uniqid() . '.' . pathinfo($_FILES['document']['name'])['extension'];
        $destination = $fileDirectory . $file_FileName;

        if ($_FILES["document"]["error"] !== UPLOAD_ERR_OK) {
            $uploadError = $_FILES["document"]["error"];
            $uploadErrorMessages = array(
                UPLOAD_ERR_INI_SIZE => "The uploaded file exceeds the upload_max_filesize directive in php.ini.",
                UPLOAD_ERR_FORM_SIZE => "The uploaded file exceeds the MAX_FILE_SIZE directive that was specified in the HTML form.",
                UPLOAD_ERR_PARTIAL => "The uploaded file was only partially uploaded.",
                UPLOAD_ERR_NO_FILE => "No file was uploaded.",
                UPLOAD_ERR_NO_TMP_DIR => "Missing a temporary folder.",
                UPLOAD_ERR_CANT_WRITE => "Failed to write file to disk.",
                UPLOAD_ERR_EXTENSION => "A PHP extension stopped the file upload."
            );

            $errorMessage = isset($uploadErrorMessages[$uploadError]) ? $uploadErrorMessages[$uploadError] : "Unknown upload error.";
            exit("Upload Error: " . $errorMessage);
        }

        if (!move_uploaded_file($_FILES["document"]["tmp_name"], $destination)) {
            exit("Can't move uploaded file");
        }

        $query = "UPDATE documents SET 
                    document_name = ?, 
                    document_description = ?,
                    document_file_name = ?,
                    document_file_type = ?,
                    document_file_size = ? 
                    WHERE document_id = ?";

        $stmt = mysqli_prepare($con, $query);

        $extension = pathinfo($_FILES['document']['name'])['extension'];
        $file_size = $_FILES['document']['size'];

        mysqli_stmt_bind_param($stmt, "sssssi", $documentName, $documentDescription, $file_FileName, $extension, $file_size, $documentIdToUpdate);
    } else {
        $query = "UPDATE documents SET 
        document_name = ?, 
        document_description = ?

        WHERE document_id = ?";

        $stmt = mysqli_prepare($con, $query);

        mysqli_stmt_bind_param($stmt, "ssi", $documentName, $documentDescription, $documentIdToUpdate);
    }

    $result = mysqli_stmt_execute($stmt);

    if ($result) {
        echo "<script>alert('Document updated!')</script>";
    } else {
        echo "Error: " . mysqli_error($con);
    }

    mysqli_stmt_close($stmt);
}

mysqli_close($con);

// Redirect to the appropriate page after updating
header("Location: ../admin-content/cms-pages/edit_items_document.php?document_id_no=$documentIdToUpdate");
exit();
