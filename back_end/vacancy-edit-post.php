<?php
include("config.php");

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $jobIdToUpdate = $_POST["job_id"];

    $jobTitle = $_POST["job-title"];
    $departmentDivision = $_POST["department-division"];
    $location = $_POST["location"];
    $applicationDeadline = $_POST["deadline"];
    $jobDescription = $_POST["job-description"];
    $jobResponsibility = $_POST["responsibility"];
    $qualificationRequirements = $_POST["qualification"];
    $preferredSkills = $_POST["skills"];
    $applicationInstructions = $_POST["instruction"];
    $benefits = $_POST["benefits"];
    $companyOverview = $_POST["co-overview"];

    $query = "UPDATE vacancy SET 
            job_title = ?,
            department_division = ?,
            location = ?,
            deadline = ?,
            job_description = ?,
            job_responsibility = ?,
            qualification = ?,
            skills = ?,
            instruction = ?,
            benefits = ?,
            co_overview = ?
            
            WHERE job_id = ?";


    $stmt = mysqli_prepare($con, $query);

    mysqli_stmt_bind_param(
        $stmt,
        "sssssssssssi",
        $jobTitle,
        $departmentDivision,
        $location,
        $applicationDeadline,
        $jobDescription,
        $jobResponsibility,
        $qualificationRequirements,
        $preferredSkills,
        $applicationInstructions,
        $benefits,
        $companyOverview,

        $jobIdToUpdate
    );
    $result = mysqli_stmt_execute($stmt);

    if ($result) {
        echo "<script>alert('Vacancy updated!')</script>";
    } else {
        echo "Error: " . mysqli_error($con);
    }

    mysqli_stmt_close($stmt);
}

mysqli_close($con);

// Redirect to the appropriate page after updating
header("Location: ../admin-content/cms-pages/edit_items_vacancy.php?job_id_no=$jobIdToUpdate");
exit();
?>
