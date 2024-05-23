<?php
include("config.php");

if (isset($_POST['submit'])) {
    $headline = $_POST["headline"];
    $detail = $_POST["news_detail"];
    $category = $_POST["category"];
    $news_view_count = 0;
    $news_like_count = 0;
    $sector_id = $_POST["news-sector"];

    $imageDirectory = __DIR__ . '\images\\'; // Adjust the path as needed
    $imageFileName = uniqid() . '.' . pathinfo($_FILES['image']['name'])['extension'];
    $destination = $imageDirectory . $imageFileName;

    if (!move_uploaded_file($_FILES["image"]["tmp_name"], $destination)) {
        exit("Can't move uploaded file");
    }

    $query = "INSERT INTO news (news_headline, news_detail, news_category, news_view_count, news_like_count, news_date, news_image, sector_id) VALUES (?, ?, ?, ?, ?, NOW(), ?, ?)";

    // Prepare and execute the statement
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
