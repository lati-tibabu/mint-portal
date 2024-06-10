<?php
include("config.php");

if (isset($_POST['submit'])) {
    $headline = $_POST["headline"];
    $detail = $_POST["news_detail"];
    $category = $_POST["category"];
    $news_view_count = 0;
    $news_like_count = 0;
    $sector_id = $_POST["news-sector"];

    // $imageDirectory = __DIR__ . '\images\\'; // Adjust the path as needed
    // $imageFileName = uniqid() . '.' . pathinfo($_FILES['image']['name'])['extension'];
    // $destination = $imageDirectory . $imageFileName;

    // if (!move_uploaded_file($_FILES["image"]["tmp_name"], $destination)) {
    //     exit("Can't move uploaded file");
    // }

    $imageDirectory = __DIR__ . '/images/'; // Adjust the path as needed
$imageFileName = uniqid() . '.' . pathinfo($_FILES['image']['name'], PATHINFO_EXTENSION);
$destination = $imageDirectory . $imageFileName;

// if (!move_uploaded_file($_FILES["image"]["tmp_name"], $destination)) {

//     echo $imageDirectory."<br>";
//     echo $imageFileName."<br>";
//     echo $destination."<br>";

//     exit("Can't move uploaded file");
// }

if (!move_uploaded_file($_FILES["image"]["tmp_name"], $destination)) {
    echo "Error: ";
    switch ($_FILES['image']['error']) {
        case UPLOAD_ERR_INI_SIZE:
            echo "The uploaded file exceeds the upload_max_filesize directive in php.ini.";
            break;
        case UPLOAD_ERR_FORM_SIZE:
            echo "The uploaded file exceeds the MAX_FILE_SIZE directive that was specified in the HTML form.";
            break;
        case UPLOAD_ERR_PARTIAL:
            echo "The uploaded file was only partially uploaded.";
            break;
        case UPLOAD_ERR_NO_FILE:
            echo "No file was uploaded.";
            break;
        case UPLOAD_ERR_NO_TMP_DIR:
            echo "Missing a temporary folder.";
            break;
        case UPLOAD_ERR_CANT_WRITE:
            echo "Failed to write file to disk.";
            break;
        case UPLOAD_ERR_EXTENSION:
            echo "A PHP extension stopped the file upload.";
            break;
        default:
            echo "Unknown error.";
            break;
    }
    exit();
}


    $query = "INSERT INTO news (news_headline, news_detail, news_category, news_view_count, news_like_count, news_date, news_image, sector_id) VALUES (?, ?, ?, ?, ?, NOW(), ?, ?)";

    $stmt = mysqli_prepare($con, $query);
    mysqli_stmt_bind_param($stmt, "sssiisi", $headline, $detail, $category, $news_view_count, $news_like_count, $imageFileName, $sector_id);
    $result = mysqli_stmt_execute($stmt);

    if ($result) {
        echo "<script>alert(`Entry added!`)</script>";
    } else {
        echo "Error: " . mysqli_error($con);
    }

    mysqli_stmt_close($stmt);
    mysqli_close($con);
    header("Location: ../admin-content/cms-pages/news.php");
    exit();
}
?>
