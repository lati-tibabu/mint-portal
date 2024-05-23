<?php
include("config.php");

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $heroImageLink = $_POST["hero_image_link"];
    $heroText = $_POST["hero_text"];
    $default_priority = 1;

    // Prepare and execute the SQL query
    $query = "INSERT INTO hero_image (image_link, hero_text, priority) VALUES (?, ?, ?)";
    $stmt = mysqli_prepare($con, $query);

    // Bind the parameters
    mysqli_stmt_bind_param($stmt, "ssi", $heroImageLink, $heroText, $default_priority);

    // Execute the statement
    $result = mysqli_stmt_execute($stmt);

    if ($result) {
        // Data insertion was successful
        echo "Data inserted successfully!";
    } else {
        // Data insertion failed
        echo "Error: " . mysqli_error($con);
    }

    mysqli_stmt_close($stmt);
    mysqli_close($con);
} else {
    // Handle the case where the form wasn't submitted via POST
    echo "Form submission error!";
}

header("Location: ../admin-content/cms-pages/hero_content.php");
exit();
