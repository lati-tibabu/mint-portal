<?php
include("config.php");
session_start();

$s_username = $_POST["username"];
$s_password = $_POST["password"];

$query = "SELECT * FROM super_user WHERE s_username = '$s_username';";
$result = mysqli_query($con, $query);

$data = array();

if (mysqli_num_rows($result) > 0) {
    while ($row = mysqli_fetch_assoc($result)) {
        $data[] = $row;
    }
}

if ($s_password == $data[0]['s_password']) {
    $_SESSION['s_user'] = $data[0]['s_username'];
    header("Location: ../user-management/dashboard.php");
    exit();
} else {
    echo "<script>alert('Login failed! Wrong username or password.');</script>";
    // header("Location: ../admin-content/cms-pages/home.php");
    exit();
}
