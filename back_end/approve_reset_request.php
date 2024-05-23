<?php
include("config.php");

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'phpmailer/src/Exception.php';
require 'phpmailer/src/PHPMailer.php';
require 'phpmailer/src/SMTP.php';

$reset_password = uniqid();
$request_id = $_GET["request_id"];

// Hash the user's password
$hashed_password = password_hash($reset_password, PASSWORD_DEFAULT);

$request_query = "SELECT * FROM password_request where request_id = " . $request_id . ";";

$request_result = mysqli_query($con, $request_query);

$request_data = array();

$request_count = 0;

if (mysqli_num_rows($request_result) > 0) {
    while ($row = mysqli_fetch_assoc($request_result)) {
        $request_data[] = $row;
        $request_count = $request_count + 1;
    }
}

if ($request_count > 0) {
    $user_email = $request_data[0]['request_email'];

    $fullname_query = "SELECT * FROM user WHERE user_email = ?";
    $stmt_fullname = mysqli_prepare($con, $fullname_query);

    if (!$stmt_fullname) {
        // Handle query preparation error
        echo "Error: " . mysqli_error($con);
        exit();
    }

    // Bind the email parameter
    mysqli_stmt_bind_param($stmt_fullname, "s", $user_email);

    // Execute the statement
    if (mysqli_stmt_execute($stmt_fullname)) {
        // Fetch the result
        $fullname_result = mysqli_stmt_get_result($stmt_fullname);

        $fullname_data = array();
        $fullname_count = 0;

        if (mysqli_num_rows($fullname_result) > 0) {
            while ($row = mysqli_fetch_assoc($fullname_result)) {
                $fullname_data[] = $row;
                $fullname_count = $fullname_count + 1;
            }
        }

        if ($fullname_count > 0) {
            $full_name = $fullname_data[0]['full_name'];

            $update_query = "UPDATE `user` SET `user_password` = ? WHERE `user_email` = ?";
            $stmt = mysqli_prepare($con, $update_query);

            if (!$stmt) {
                // Handle query preparation error
                echo "Error: " . mysqli_error($con);
                exit();
            }

            // Bind parameters and execute the statement
            mysqli_stmt_bind_param($stmt, "ss", $hashed_password, $user_email);

            if (mysqli_stmt_execute($stmt)) {
                $message_body = "<html><body>";
                $message_body .= "<h2>Password Reset Successful</h2>";
                $message_body .= "<p>Dear <strong>{$full_name}</strong>,</p>";
                $message_body .= "<p>Your password reset request has been successfully processed. Your new temporary password is: <strong>{$reset_password}</strong></p>";
                $message_body .= "<p>We recommend that you log in using these credentials at your earliest convenience to access your Content Manager account for the Ministry of Innovation and Technology Portal. However, for security reasons, we strongly advise you to change your password immediately upon your first login. To do so, please follow these simple steps:</p>";
                $message_body .= "<ol>";
                $message_body .= "<li>Visit our platform's login page: <a href='[Platform Login URL]'>Platform Login URL</a></li>";
                $message_body .= "<li>Enter your username, which is your email address.</li>";
                $message_body .= "<li>Use the temporary password provided above.</li>";
                $message_body .= "<li>Once logged in, navigate to your account settings.</li>";
                $message_body .= "<li>Locate the 'Change Password' option.</li>";
                $message_body .= "<li>Follow the on-screen instructions to create a new, secure password.</li>";
                $message_body .= "</ol>";
                $message_body .= "<p>Ensuring the security of your account is of utmost importance to us, and we encourage you to choose a password that is both strong and unique. This will help safeguard your personal information and ensure a safe and enjoyable experience as a Content Manager on our platform.</p>";
                $message_body .= "<p>If you have any questions, encounter any issues, or require assistance with anything related to your account or your role as a Content Manager on the platform, please do not hesitate to reach out to our dedicated support team at <a href='[Support Email Address]'>Support Email Address</a>. We are here to assist you and provide guidance whenever needed.</p>";
                $message_body .= "<p>Thank you for being a Content Manager for the Ministry of Innovation and Technology Portal. We look forward to your contributions and hope you have a secure and successful experience.</p>";
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

                    $mail->Subject = 'Password Reset Successful';
                    $mail->Body = $message_body;

                    $mail->send();

                    $deleteQuery = "DELETE FROM password_request WHERE request_id = $request_id";
                    if (mysqli_query($con, $deleteQuery)) {
                        // Deletion successful
                        // header("Location: ../admin-content/cms-pages/desks.php");
                        exit();
                    } else {
                        // Deletion failed
                        echo "<h3>Error deleting request: " . mysqli_error($con) . "</h3>";
                    }

                    // echo '<script> alert("Email is sent");</script>';
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
                    echo '        <h1>Password Reset Successful</h1>';
                    echo "        <p>Password has been reset successfully for {$full_name}.</p>";
                    echo '        <a href="../user-management/dashboard" class="back-to-home">Back to Dashboard</a>';
                    echo '    </div>';
                    echo '</body>';
                    echo '</html>';

                    // Redirect to a success page
                    // header("Location: registration-success.php");
                    exit();
                } catch (Exception $e) {
                    echo "Email could not be sent. Error: {$mail->ErrorInfo}";
                }
            } else {
                // Handle query execution error
                echo "Error: " . mysqli_error($con);
            }

            // Close the statement
            mysqli_stmt_close($stmt);
        } else {
            // No matching user found for the provided email
            echo "No user found for the provided email.";
        }
    } else {
        // Handle query execution error
        echo "Error: " . mysqli_error($con);
    }

    // Close the statement
    mysqli_stmt_close($stmt_fullname);
} else {
    // No matching request found for the provided request_id
    echo "No matching request found for the provided request_id.";
}

// Close the database connection
mysqli_close($con);
exit();
