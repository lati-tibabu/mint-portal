<?php
    // include("config.php");
    // // if (isset($_POST['submit'])) {
    // $document_name = $_POST["document-name"];
    // $document_description = $_POST["document-description"];
    // // $category = $_POST["category"];
    // // $news_view_count = 0;
    // // $news_like_count = 0;

    // $fileDirectory = __DIR__ . '\document\\'; // Adjust the path as needed
    // $file_FileName = uniqid() . '.' . pathinfo($_FILES['document']['name'])['extension'];

    // // echo $imageFileName;

    // $destination = $fileDirectory . $file_FileName;

    // echo $destination;

    // if (!move_uploaded_file($_FILES["document"]["tmp_name"], $destination)) {

    //     exit("Can't move uploaded file");

    // }

    // // $query = "INSERT INTO event (event_name, event_description, event_date, event_image) VALUES (?, ?, NOW(), ?)";
    // $query = "INSERT INTO documents (document_name, document_description, document_file_name, document_file_type, document_file_size, document_upload_date) 
    //           VALUES (?, ?, ?, ?, ?, NOW())";

    // //     // Prepare and execute the statement
    // $stmt = mysqli_prepare($con, $query);

    // // echo '<h1>This is Statement</h1>'.$stmt;

    // $extension = pathinfo($_FILES['document']['name'])['extension'];
    // $file_size = $_FILES['document']['size'];

    // try {
    //     //code...
    //     mysqli_stmt_bind_param($stmt, "ssssi", $document_name, $document_description, $file_FileName, $extension, $file_size);
    //     $result = mysqli_stmt_execute($stmt);

    //     if ($result) {
    //         echo "<script>alert(`Entry added!`)</script>";
    //         // header("Location: ../admin-content/index.html");
    //     } else {
    //         echo "Error: " . mysqli_error($con);
    //     }

    // } catch (\Throwable $th) {
    //     //throw $th;
    //     echo $th;
    // } finally {
    //     mysqli_stmt_close($stmt);
    //     mysqli_close($con);
    // }
    // // mysqli_stmt_bind_param($stmt, "ssssi", $document_name, $document_description, $file_FileName, $extension, $file_size);

    // // mysqli_stmt_bind_param($stmt, "ssssi", $document_name, $document_description, $file_FileName, pathinfo($_FILES['document']['name'])['extension'], $_FILES['document']['size']);
    // header("Location: ../admin-content/cms-pages/documents.php");
    // exit();
    // }
include("config.php");

$document_name = $_POST["document-name"];
$document_description = $_POST["document-description"];

$fileDirectory = __DIR__ . '\document\\';
$file_FileName = uniqid() . '.' . pathinfo($_FILES['document']['name'])['extension'];
$destination = $fileDirectory . $file_FileName;

// Check if there was an error during the upload

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

$query = "INSERT INTO documents (document_name, document_description, document_file_name, document_file_type, document_file_size, document_upload_date) 
          VALUES (?, ?, ?, ?, ?, NOW())";

$stmt = mysqli_prepare($con, $query);

$extension = pathinfo($_FILES['document']['name'])['extension'];
$file_size = $_FILES['document']['size'];

try {
    mysqli_stmt_bind_param($stmt, "ssssi", $document_name, $document_description, $file_FileName, $extension, $file_size);
    $result = mysqli_stmt_execute($stmt);

    if ($result) {
        echo "<script>alert(`Entry added!`)</script>";
    } else {
        echo "Error: " . mysqli_error($con);
    }

} catch (\Throwable $th) {
    echo $th;
} finally {
    mysqli_stmt_close($stmt);
    mysqli_close($con);
}

header("Location: ../admin-content/cms-pages/documents.php");
exit();
?>