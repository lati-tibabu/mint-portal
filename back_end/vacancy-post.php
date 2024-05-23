<?php
include("config.php");

$job_title = $_POST["job-title"];
$department_division = $_POST["department-division"];
$location = $_POST["location"];
$deadline = $_POST["deadline"];
$job_description = $_POST["job-description"];
$job_responsibility = $_POST["responsibility"];
$qualification = $_POST["qualification"];
$skills = $_POST["skills"];
$instruction = $_POST["instruction"];
$benefits = $_POST["benefits"];
$co_overview = $_POST["co-overview"];

$query = "INSERT INTO vacancy (
    job_title,
    department_division,
    location,
    deadline,
    job_description,
    job_responsibility,
    qualification,
    skills,
    instruction,
    benefits,
    co_overview
) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";

$stmt = mysqli_prepare($con, $query);

mysqli_stmt_bind_param(
        $stmt,
        "sssssssssss",
        $job_title,
        $department_division,
        $location,
        $deadline,
        $job_description,
        $job_responsibility,
        $qualification,
        $skills,
        $instruction,
        $benefits,
        $co_overview
    );
$result = mysqli_stmt_execute($stmt);

if ($result) {
    echo "<script>alert(`Entry added!`)</script>";
} else {
    echo "Error: " . mysqli_error($con);
}

mysqli_stmt_close($stmt);
mysqli_close($con);
header("Location: ../admin-content/cms-pages/vacancy.php");
exit();
