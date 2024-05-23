<?php
include("config.php");

// if (isset($_POST['submit'])) {
$email = $_POST["email"];

$query = "INSERT INTO password_request (request_email) VALUES (?)";

// Prepare and execute the statement
$stmt = mysqli_prepare($con, $query);
mysqli_stmt_bind_param($stmt, "s", $email);
$result = mysqli_stmt_execute($stmt);

if ($result) {
    echo "<script>alert(`Request sent!`)</script>";
} else {
    echo "Error: " . mysqli_error($con);
}

mysqli_stmt_close($stmt);
mysqli_close($con);
// header("Location: ../admin-content/cms-pages/news.php");
exit();
// }
