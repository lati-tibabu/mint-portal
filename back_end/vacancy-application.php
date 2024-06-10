<?php

include("config.php");

// if ($_SERVER["REQUEST_METHOD"] === "POST") {

$first_name = $_POST["first-name"];
$middle_name = $_POST["middle-name"];
$last_name = $_POST["last-name"];
$gender = $_POST["gender"];
$phone = $_POST["phone"];
$email = $_POST["email"];
$dob = $_POST["dob"];
$marital_status = $_POST["marital-status"];
$address = $_POST["address"];
$address2 = $_POST["address2"];
$work_experience = $_POST["work-experience"];
$employment_status = $_POST["employment-status"];
$current_organization = $_POST["current-organization"];
$educational_status = $_POST["educational-status"];
$field_of_study = $_POST["field-of-study"];
$cgpa = $_POST["cgpa"];
$grad_year = $_POST["grad-year"];
$institution_name = $_POST["institution-name"];
$job_id = $_POST["job_id"];

// $resume_cv_filename = $first_name . '_resume' . uniqid() . '.' . pathinfo($_FILES["resume-cv"]["name"])['extension'];
// $cover_letter_filename = $first_name . '_cover_letter' . uniqid() . '.' . pathinfo($_FILES["cover-letter"]["name"])['extension'];
// $apply_image_filename = $first_name . '_photo' . uniqid() . '.' . pathinfo($_FILES["apply-image"]["name"])['extension'];

$resume_cv_filename = uniqid() . '.' . pathinfo($_FILES["resume-cv"]["name"])['extension'];
$cover_letter_filename = uniqid() . '.' . pathinfo($_FILES["cover-letter"]["name"])['extension'];
$apply_image_filename = uniqid() . '.' . pathinfo($_FILES["apply-image"]["name"])['extension'];


// Move uploaded files to a designated folder (make sure the folder is writable)
$upload_folder = __DIR__ . "/uploads/";

move_uploaded_file($_FILES["resume-cv"]["tmp_name"], $upload_folder . $resume_cv_filename);
move_uploaded_file($_FILES["cover-letter"]["tmp_name"], $upload_folder . $cover_letter_filename);
move_uploaded_file($_FILES["apply-image"]["tmp_name"], $upload_folder . $apply_image_filename);

$query = "INSERT INTO vacancy_applications (first_name, middle_name, last_name, gender, phone, email, dob, marital_status, address, address2, work_experience, employment_status, current_organization, educational_status, field_of_study, cgpa, grad_year, institution_name, resume_cv, cover_letter, apply_image, job_id) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";

$stmt = mysqli_prepare($con, $query);
mysqli_stmt_bind_param($stmt, "ssssssssssssssssssssss", $first_name, $middle_name, $last_name, $gender, $phone, $email, $dob, $marital_status, $address, $address2, $work_experience, $employment_status, $current_organization, $educational_status, $field_of_study, $cgpa, $grad_year, $institution_name, $resume_cv_filename, $cover_letter_filename, $apply_image_filename, $job_id);
$result = mysqli_stmt_execute($stmt);

if ($result) {
    // echo "<script>alert('Application submitted successfully!')</script>";
    
    echo '<!DOCTYPE html>';
    echo '<html lang="en">';
    echo '<head>';
    echo '    <meta charset="UTF-8">';
    echo '    <meta name="viewport" content="width=device-width, initial-scale=1.0">';
    echo '    <title>Application Submitted Successfully</title>';
    echo '    <style>';
    echo '        body {';
    echo '            font-family: Arial, sans-serif;';
    echo '            text-align: center;';
    echo '            background-color: #f0f0f0;';
    echo '            margin: 0;';
    echo '            padding: 0;';
    echo '        }';
    echo '';
    echo '        .container {';
    echo '            max-width: 600px;';
    echo '            margin: 0 auto;';
    echo '            padding: 20px;';
    echo '            background-color: #ffffff;';
    echo '            box-shadow: 0 0 10px rgba(0, 0, 0, 0.2);';
    echo '            border-radius: 5px;';
    echo '            margin-top: 50px;';
    echo '        }';
    echo '';
    echo '        h1 {';
    echo '            font-size: 24px;';
    echo '            color: #333;';
    echo '            margin: 20px 0;';
    echo '        }';
    echo '';
    echo '        .message {';
    echo '            font-size: 24px;';
    echo '            margin-top: 20px;';
    echo '        }';
    echo '';
    echo '        .back-button {';
    echo '            margin-top: 30px;';
    echo '        }';
    echo '';
    echo '        .back-button a {';
    echo '            display: inline-block;';
    echo '            padding: 10px 20px;';
    echo '            background-color: #007bff;';
    echo '            color: #fff;';
    echo '            text-decoration: none;';
    echo '            border-radius: 5px;';
    echo '            transition: background-color 0.3s;';
    echo '        }';
    echo '';
    echo '        .back-button a:hover {';
    echo '            background-color: #0056b3;';
    echo '        }';
    echo '    </style>';
    echo '</head>';
    echo '<body>';
    echo '    <div class="container">';
    echo '        <h1>Application Submitted Successfully</h1>';
    //echo ' <h2>'.$upload_folder . $resume_cv_filename.'</h2>';
    //echo ' <h2>'.$upload_folder . $cover_letter_filename.'</h2>';
    //echo ' <h2>'.$upload_folder . $apply_image_filename.'</h2>';
    echo '        <p class="message">Thank you for submitting your application.</p>';
    echo '        <div class="back-button">';
    echo '            <a href="#" onclick="history.back()">Back</a>';
    echo '        </div>';
    echo '    </div>';
    echo '</body>';
    echo '</html>';
    // Redirect to a success page or display a success message
} else {
    echo "Error: " . mysqli_error($con);
}

mysqli_stmt_close($stmt);
mysqli_close($con);
// }
