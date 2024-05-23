<?php
include("config.php");

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'phpmailer/src/Exception.php';
require 'phpmailer/src/PHPMailer.php';
require 'phpmailer/src/SMTP.php';

$full_name = $_POST["full_name"];
$user_name = $_POST["user_name"];
$user_email = $_POST["user_email"];
$user_password = uniqid();
$role = $_POST["role"];

// Hash the user's password
$hashed_password = password_hash($user_password, PASSWORD_DEFAULT);

// Create a prepared statement
$query = "INSERT INTO `user` (`user_email`, `user_password`, `full_name`, `user_name`, `role`) VALUES (?, ?, ?, ?, ?)";
$stmt = mysqli_prepare($con, $query);

if (!$stmt) {
    // Handle query preparation error
    echo "Error: " . mysqli_error($con);
    exit();
}

// Bind parameters and execute the statement
mysqli_stmt_bind_param($stmt, "sssss", $user_email, $hashed_password, $full_name, $user_name, $role);

if (mysqli_stmt_execute($stmt)) {

    $message_body = "<html><body>";
    $message_body .= "<h2>Welcome to the Ministry of Innovation and Technology Portal</h2>";
    $message_body .= "<p>Dear <strong>{$full_name}</strong>,</p>";
    $message_body .= "<p>We are thrilled to welcome you to the Ministry of Innovation and Technology Portal and are delighted to inform you that your account has been successfully created. You have been assigned the role of <strong>{$role}</strong>, which grants you access to a wide range of exciting features and opportunities.</p>";
    $message_body .= "<h3>Here are the details you need to get started:</h3>";
    $message_body .= "<ul>";
    $message_body .= "<li>Your Role: <strong>{$role}</strong></li>";
    $message_body .= "<li>Your Username: <strong>{$user_email}</strong></li>";
    $message_body .= "<li>Your Temporary Password: <strong>{$user_password}</strong></li>";
    $message_body .= "</ul>";
    $message_body .= "<p>We recommend that you log in using these credentials at your earliest convenience to explore the platform and familiarize yourself with its functionalities. However, for security reasons, we strongly advise you to change your password immediately upon your first login. To do so, please follow these simple steps:</p>";
    $message_body .= "<ol>";
    $message_body .= "<li>Visit our platform's login page: <a href='[Platform Login URL]'>Platform Login URL</a></li>";
    $message_body .= "<li>Enter your username, which is your email address.</li>";
    $message_body .= "<li>Use the temporary password provided above.</li>";
    $message_body .= "<li>Once logged in, navigate to your account settings.</li>";
    $message_body .= "<li>Locate the 'Change Password' option.</li>";
    $message_body .= "<li>Follow the on-screen instructions to create a new, secure password.</li>";
    $message_body .= "</ol>";
    $message_body .= "<p>Ensuring the security of your account is of utmost importance to us, and we encourage you to choose a password that is both strong and unique. This will help safeguard your personal information and ensure a safe and enjoyable experience on our platform.</p>";
    $message_body .= "<p>If you have any questions, encounter any issues, or require assistance with anything related to your account or the platform itself, please do not hesitate to reach out to our dedicated support team at <a href='[Support Email Address]'>Support Email Address</a>. We are here to assist you and provide guidance whenever needed.</p>";
    $message_body .= "<p>Thank you for choosing the Ministry of Innovation and Technology Portal, and we look forward to seeing you make the most of your <strong>{$role}</strong> privileges. We're confident that your journey with us will be both rewarding and exciting.</p>";
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

        $mail->Subject = 'Welcome to the Ministry of Innovation and Technology Portal - Your Account Has Been Created!';
        $mail->Body = $message_body;

        $mail->send();
        
        echo '<script> alert("Email is sent");</script>';

        // Redirect to a success page
        header("Location: registration-success.php");
        exit();
    } catch (Exception $e) {
        // echo "Email could not be sent. Error: {$mail->ErrorInfo}";
        $errorMsg = $mail->ErrorInfo;

        if (substr($errorMsg, 0, 10) == "SMTP Error") {

            $deleteQuery = "DELETE FROM user WHERE user_email = '$user_email'";

            if (mysqli_query($con, $deleteQuery)) {
                // Deletion successful
                // header("Location: deletion-success.php");
                // exit();
            } else {
                // Deletion failed
                // echo "Error deleting user: " . mysqli_error($con);
            }
        echo "
        <!DOCTYPE html>
<html>
<head>
  <style>
    body {
      font-family: Arial, sans-serif;
      background-color: #f7f7f7;
    }
    .error-box {
      max-width: 400px;
      margin: 0 auto;
      background-color: #f44336;
      color: #fff;
      padding: 20px;
      border-radius: 8px;
      box-shadow: 0px 2px 4px rgba(0, 0, 0, 0.2);
    }
    .error-title {
      font-size: 20px;
      font-weight: bold;
      margin-bottom: 10px;
    }
    .error-message {
      font-size: 16px;
      margin-bottom: 15px;
    }
    .error-link {
      display: block;
      font-size: 16px;
      text-decoration: none;
      color: #fff;
    }
    .error-link:hover {
      text-decoration: underline;
    }
    .emphasis {
      font-weight: bold;
      text-decoration: underline;
    }
  </style>
</head>
<body>
  <div class=\"error-box\">
    <div class=\"error-title\">Error</div>
    <div class=\"error-message\">
      <p>Email could not be sent. It seems like there is a problem with the internet connection.</p>
      <p>Account creation failed. Please check the server's internet connection and try again.</p>
    </div>
    <a class=\"error-link\" href=\"#\">Click here to resend the email</a>
  </div>
</body>
</html>

        ";
}
    }
} else {
    // Handle query execution error
    echo "Error: " . mysqli_error($con);
}

// Close the statement
mysqli_stmt_close($stmt);

// Close the database connection
mysqli_close($con);
exit();
