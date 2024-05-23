<?php
include("config.php");
// if (isset($_POST['submit'])) {
$announcement_name = $_POST["announcement-name"];
$announcement_description = $_POST["announcement-description"];
$announcement_date = $_POST["announcement-date"];

// $event_location = $_POST["event-location"];

// $category = $_POST["category"];

// $news_view_count = 0;
// $news_like_count = 0;

// $imageDirectory = __DIR__ . '\images\event\\'; // Adjust the path as needed
// $imageFileName = uniqid() . '.' . pathinfo($_FILES['image']['name'])['extension'];

// // echo $imageFileName;

// $destination = $imageDirectory . $imageFileName;

// echo $destination;

// if (!move_uploaded_file($_FILES["image"]["tmp_name"], $destination)) {

//     exit("Can't move uploaded file");

// }

$query = "INSERT INTO announcements (announcement_name, announcement_description, announcement_upload_date, announcement_date) VALUES (?,?,NOW(),?)";

//     // Prepare and execute the statement
$stmt = mysqli_prepare($con, $query);
mysqli_stmt_bind_param($stmt, "sss", $announcement_name, $announcement_description, $announcement_date);
$result = mysqli_stmt_execute($stmt);

if ($result) {
    echo "<script>alert(`Entry added!`)</script>";
    // header("Location: ../admin-content/index.html");
} else {
    echo "Error: " . mysqli_error($con);
}

mysqli_stmt_close($stmt);
mysqli_close($con);
header("Location: ../admin-content/cms-pages/announcements.php");
exit();
// }

?>