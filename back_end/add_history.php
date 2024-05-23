<?php
include("config.php");

if (isset($_POST['submit'])) {
    $history_year = $_POST["history-year"];
    $history_event = $_POST["history-event"]; // Note the correct field name "history-event"

    $query = "INSERT INTO mint_history (history_year, history_event) VALUES (?, ?)";

    // Prepare and execute the statement
    $stmt = mysqli_prepare($con, $query);
    if ($stmt) {
        mysqli_stmt_bind_param($stmt, "ss", $history_year, $history_event);
        $result = mysqli_stmt_execute($stmt);

        if ($result) {
            echo "<script>alert('Entry added!')</script>";
            // Redirect to the appropriate page after successful submission
            // header("Location: ../admin-content/index.php");
            // exit();
        } else {
            echo "Error executing the statement: " . mysqli_error($con);
        }

        mysqli_stmt_close($stmt);
    } else {
        echo "Error preparing the statement: " . mysqli_error($con);
    }

    mysqli_close($con);
} else {
    echo "Form not submitted.";
}

header("Location: ../admin-content/cms-pages/history.php");
exit();
?>
