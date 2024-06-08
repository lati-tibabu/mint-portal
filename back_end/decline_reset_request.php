<?php
include("config.php");

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'phpmailer/src/Exception.php';
require 'phpmailer/src/PHPMailer.php';
require 'phpmailer/src/SMTP.php';


// if (isset($_GET['user_id'])) {
$request_id = $_GET['request_id'];
$user_email = $_GET['user_email'];

// Perform database query to delete the news item with the given news_id
$deleteQuery = "DELETE FROM password_request WHERE request_id = $request_id";
if (mysqli_query($con, $deleteQuery)) {

    // Deletion successful

    $message_body = "<html><body>";
    $message_body .= "<h2>Password Reset Request Declined</h2>";
    $message_body .= "<p>We regret to inform you that your password reset request has been declined. Your password remains unchanged.</p>";
    $message_body .= "<p>If you believe this decision is in error or you continue to experience issues accessing your account, please contact the Ministry of Innovation and Technology Portal Manager immediately at <a href='[Contact Information]'>Contact Information</a>.</p>";
    $message_body .= "<p>We are committed to ensuring the security and integrity of our platform, and we appreciate your understanding and cooperation in this matter.</p>";
    $message_body .= "<p>If you have any other questions or require further assistance, please do not hesitate to reach out to our dedicated support team at <a href='[Support Email Address]'>Support Email Address</a>. We are here to assist you and provide guidance whenever needed.</p>";
    $message_body .= "<p>Thank you for your understanding and cooperation.</p>";
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

        $mail->Subject = 'Password Reset Request Declined!';
        $mail->Body = $message_body;

        $mail->send();

        echo '<!DOCTYPE html>';
        echo '<html lang="en">';
        echo '<head>';
        echo '    <meta charset="UTF-8">';
        echo '    <meta name="viewport" content="width=device-width, initial-scale=1.0">';
        echo '    <title>Request Declined</title>';
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
        echo '        .error-icon {';
        echo '            font-size: 60px;';
        echo '            color: #e53935;';
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
        echo '            background-color: #e53935;';
        echo '            color: #fff;';
        echo '            text-decoration: none;';
        echo '            border-radius: 5px;';
        echo '            margin-top: 20px;';
        echo '            transition: background-color 0.3s;';
        echo '        }';
        echo '';
        echo '        .back-to-home:hover {';
        echo '            background-color: #d32f2f;';
        echo '        }';
        echo '    </style>';
        echo '</head>';
        echo '<body>';
        echo '    <div class="message-box">';
        echo '        <div class="error-icon">&#10008;</div>';
        echo '        <h1>Request Declined</h1>';
        echo '        <p>Your request has been declined.</p>';
        echo '        <a href="../user-management/dashboard.php" class="back-to-home">Back to Home</a>';
        echo '    </div>';
        echo '</body>';
        echo '</html>';
        exit();
    } catch (Exception $e) {
        echo "Email could not be sent. Error: {$mail->ErrorInfo}";
    }
    // header("Location: ../admin-content/cms-pages/desks.php");
    exit();
} else {
    // Deletion failed
    echo "<h3>Error deleting request: " . mysqli_error($con) . "</h3>";
}
// }
