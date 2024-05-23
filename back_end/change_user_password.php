<?php
include("config.php");

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'phpmailer/src/Exception.php';
require 'phpmailer/src/PHPMailer.php';
require 'phpmailer/src/SMTP.php';

$old_password = $_POST["old_password"];
$new_password = $_POST["new_password"];
$user_email = $_POST["user_email"];

// Create a prepared statement
$query = "SELECT * FROM user WHERE user_email = ?";
$stmt = mysqli_prepare($con, $query);

if (!$stmt) {
    // Handle query preparation error
    echo "Error: " . mysqli_error($con);
    exit();
}

// Bind parameters and execute the statement
mysqli_stmt_bind_param($stmt, "s", $user_email);
mysqli_stmt_execute($stmt);

$result = mysqli_stmt_get_result($stmt);
$row = mysqli_fetch_assoc($result);

if (password_verify($old_password, $row['user_password'])) {
    // Hash the new password
    $hashed_password = password_hash($new_password, PASSWORD_DEFAULT);

    // Create a prepared statement for updating the password
    $update_query = "UPDATE `user` SET `user_password` = ? WHERE `user_email` = ?";
    $update_stmt = mysqli_prepare($con, $update_query);

    if (!$update_stmt) {
        // Handle query preparation error
        echo "Error: " . mysqli_error($con);
        exit();
    }

    // Bind parameters and execute the update statement
    mysqli_stmt_bind_param($update_stmt, "ss", $hashed_password, $user_email);

    if (mysqli_stmt_execute($update_stmt)) {
        // Redirect to a success page
        // header("Location: registration-success.php");
        $message_body = "<html><body>";
        $message_body .= "<p><strong>Your password has been changed successfully.</strong></p>";
        $message_body .= "<p>If you did not change your password or have any concerns about your account security, please contact the Ministry of Innovation and Technology Portal Manager immediately at <a href='[Contact Information]'>Contact Information</a>.</p>";
        $message_body .= "<p>If you have any other questions, encounter any issues, or require assistance with anything related to your account or the platform itself, please do not hesitate to reach out to our dedicated support team at <a href='[Support Email Address]'>Support Email Address</a>. We are here to assist you and provide guidance whenever needed.</p>";
        $message_body .= "<p>Thank you for choosing the Ministry of Innovation and Technology Portal.</p>";
        $message_body .= "<p>Warm regards,<br>Portal Manager<br>Ministry of Innovation and Technology<br>[Contact Information]</p>";
        $message_body .= "</body></html>";

        try {
            $mail = new PHPMailer(true);

            $mail->isSMTP();
            $mail->Host = 'smtp.gmail.com';
            $mail->SMTPAuth = true;
            $mail->Username = 'flexidon3@gmail.com';
            $mail->Password = 'isvjiytbuudldubp';
            $mail->SMTPSecure = 'ssl';
            $mail->Port = 465;

            $mail->setFrom('flexidon3@gmail.com');
            $mail->addAddress($user_email);

            $mail->isHTML(true);

            $mail->Subject = 'Your password has been changed successfully!';
            $mail->Body = $message_body;

            $mail->send();

            // echo '<script> alert("Email is sent");</script>';

            // Redirect to a success page
            // echo "password changed succesfully!";
            echo '<!DOCTYPE html>';
            echo '<html lang="en">';
            echo '<head>';
            echo '    <meta charset="UTF-8">';
            echo '    <meta name="viewport" content="width=device-width, initial-scale=1.0">';
            echo '    <title>Password Change Successful</title>';
            echo '    <style>';
            echo '        body {';
            echo '            font-family: Arial, sans-serif;';
            echo '            background-color: #f5f5f5;';
            echo '            margin: 0;';
            echo '            padding: 0;';
            echo '            display: flex;';
            echo '            justify-content: center;';
            echo '            align-items: center;';
            echo '            height: 100vh;';
            echo '        }';
            echo '';
            echo '        .message-box {';
            echo '            background-color: #fff;';
            echo '            border-radius: 8px;';
            echo '            box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.2);';
            echo '            padding: 20px;';
            echo '            text-align: center;';
            echo '            max-width: 400px;';
            echo '        }';
            echo '';
            echo '        .success-icon {';
            echo '            font-size: 60px;';
            echo '            color: #4CAF50;';
            echo '        }';
            echo '';
            echo '        h1 {';
            echo '            font-size: 24px;';
            echo '            margin: 20px 0;';
            echo '        }';
            echo '';
            echo '        p {';
            echo '            font-size: 18px;';
            echo '            margin: 10px 0;';
            echo '        }';
            echo '';
            echo '        .back-to-home {';
            echo '            display: inline-block;';
            echo '            padding: 10px 20px;';
            echo '            background-color: #4CAF50;';
            echo '            color: #fff;';
            echo '            text-decoration: none;';
            echo '            border-radius: 5px;';
            echo '            margin-top: 20px;';
            echo '            transition: background-color 0.3s;';
            echo '        }';
            echo '';
            echo '        .back-to-home:hover {';
            echo '            background-color: #45a049;';
            echo '        }';
            echo '    </style>';
            echo '</head>';
            echo '<body>';
            echo '    <div class="message-box">';
            echo '        <div class="success-icon">&#10004;</div>';
            echo '        <h1>Password Change Successful</h1>';
            echo '        <p>Your password has been changed successfully.</p>';
            echo '        <a href="../admin-content/cms-pages/home.php" class="back-to-home">Back to Home</a>';
            echo '    </div>';
            echo '</body>';
            echo '</html>';

            exit();
        } catch (Exception $e) {
            echo "Email could not be sent. Error: {$mail->ErrorInfo}";
        }
    } else {
        // Handle query execution error
        echo "Error: " . mysqli_error($con);
    }

    // Close the statement
    mysqli_stmt_close($update_stmt);
} else {
    // Password mismatch
    echo "<script>alert('Invalid password!');</script>";
}

// Close the statement
mysqli_stmt_close($stmt);
// Close the database connection
mysqli_close($con);
