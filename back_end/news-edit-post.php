<?php
include("config.php");

$upload_file = $_POST["update_file"];

$newsIdToUpdate = $_POST["news_id"]; // Assuming you have a news_id passed via POST

$headline = $_POST["news-headline"];
$detail = $_POST["news-detail"];
$category = $_POST["news-category"];

// $imageFileName = ""; // Initialize the image filename variable

// if ($_FILES['image']['name']) {

if ($upload_file == '1') {
    // $imageDirectory = __DIR__ . '\images\\';
    $imageDirectory = __DIR__ . '/images/';
    $imageFileName = uniqid() . '.' . pathinfo($_FILES['image']['name'])['extension'];

    $destination = $imageDirectory . $imageFileName;

    echo $destination."<br>";

    if (!move_uploaded_file($_FILES["image"]["tmp_name"], $destination)) {

        exit("Can't move uploaded file");
    }
    // }

    $query = "UPDATE news SET news_headline = ?, news_detail = ?, news_category = ?, news_image = ? WHERE news_id = ?";

    $stmt = mysqli_prepare($con, $query);
    mysqli_stmt_bind_param($stmt, "ssssi", $headline, $detail, $category, $imageFileName, $newsIdToUpdate);
}else{
    $query = "UPDATE news SET news_headline = ?, news_detail = ?, news_category = ? WHERE news_id = ?";

    $stmt = mysqli_prepare($con, $query);
    mysqli_stmt_bind_param($stmt, "sssi", $headline, $detail, $category, $newsIdToUpdate); 
}
$result = mysqli_stmt_execute($stmt);

if ($result) {
    echo "<script>alert(`Entry updated!`)</script>";
} else {
    echo "Error: " . mysqli_error($con);
}

mysqli_stmt_close($stmt);
mysqli_close($con);

header("Location: ../admin-content/cms-pages/edit_items_news.php?news_id_no=$newsIdToUpdate");
exit();

// header("Location: ../admin-content/cms-pages/news.php");
// exit();
