<?php
include 'database.php';
require 'src/PHPMailer.php';
require 'src/SMTP.php';
require 'src/Exception.php';

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

$message = ""; // To hold messages to display to the user

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $userEmail = $_POST['userEmail'];

    // Check if email exists in the database
    $sql = "SELECT * FROM tbl_user WHERE userEmail = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("s", $userEmail);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        // User found, generate reset token
        $token = bin2hex(random_bytes(32));
        $expiry = date("Y-m-d H:i:s", strtotime("+1 hour")); // Token expires in 1 hour

        // Save token and expiry in the database
        $update_sql = "UPDATE tbl_user SET resetToken = ?, resetTokenExpiry = ? WHERE userEmail = ?";
        $update_stmt = $conn->prepare($update_sql);
        $update_stmt->bind_param("sss", $token, $expiry, $userEmail);
        $update_stmt->execute();

        // Send password reset email
        $mail = new PHPMailer(true);
        try {
            // Mail server settings
            $mail->isSMTP();
            $mail->Host = 'smtp.gmail.com'; // Correct SMTP server for Gmail
            $mail->SMTPAuth = true;
            $mail->Username = 'a193897@siswa.ukm.edu.my'; // Your SMTP username (email address)
            $mail->Password = 'luqmaanul27*'; // Your email password
            $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
            $mail->Port = 587;

            // Recipient and sender
            $mail->setFrom('a193897@siswa.ukm.edu.my', 'Guest House Booking System');
            $mail->addAddress($userEmail);

            // Content
            $mail->isHTML(true);
            $mail->Subject = 'Password Reset Request';
            $mail->Body = "Hello, <br><br> Click the link below to reset your password: <br> <a href='http://localhost/RumahTamuUKMBookingSystem/reset_pass.php?token=$token'>Reset Password</a><br><br> This link will expire in 1 hour.";

            $mail->send();
            $message = "<div class='alert success'>Password reset email sent!</div>";
        } catch (Exception $e) {
            $message = "<div class='alert error'>Message could not be sent. Mailer Error: {$mail->ErrorInfo}</div>";
        }
    } else {
        $message = "<div class='alert error'>No account found with the email: $userEmail</div>";
    }
    $stmt->close();
}
$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Forgot Password</title>
    <link rel="stylesheet" href="styles2.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <style>
        /* Overlay for the loading animation */
        .overlay {
            position: fixed;
            display: none; /* Hidden by default */
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: rgba(0, 0, 0, 0.5);
            z-index: 1000;
            justify-content: center;
            align-items: center;
        }

        /* Spinner */
        .spinner {
            border: 8px solid #f3f3f3;
            border-top: 8px solid #3498db;
            border-radius: 50%;
            width: 60px;
            height: 60px;
            animation: spin 1s linear infinite;
        }

        @keyframes spin {
            0% { transform: rotate(0deg); }
            100% { transform: rotate(360deg); }
        }

        /* Alert box styles */
        .alert {
            padding: 10px;
            margin-top: 20px;
            border-radius: 5px;
            font-weight: bold;
            text-align: center;
        }
        .alert.success {
            background-color: #4CAF50;
            color: white;
        }
        .alert.error {
            background-color: #f44336;
            color: white;
        }
    </style>
</head>
<body>
<div class="container">
    <div class="header">
        <img src="ukm.png" alt="Logo" class="logo">
        <h2>LUPA KATA LALUAN</h2>
        <p>FORGOT PASSWORD</p>
    </div>

    <div class="user-guide">
        <a href="#"><i class="fas fa-info-circle"></i> Panduan Pengguna / User Guide</a>
    </div>

    <!-- Display message if exists -->
    <?php if (!empty($message)) { echo $message; } ?>

    <form action="forgetpass.php" method="POST" onsubmit="showLoading();">
        <div class="login-box">
            <label for="userEmail">Email:</label>
            <input type="text" id="userEmail" name="userEmail" required>

            <div class="buttons">
                <button type="submit">Teruskan</button>
                <button type="reset" onclick="redirectToLogin()">Kembali</button>
            </div>
        </div>
    </form>

    <!-- Loading Overlay -->
    <div class="overlay" id="loadingOverlay">
        <div class="spinner"></div>
    </div>
</div>

<script>
    // Function to display the loading overlay
    function showLoading() {
        document.getElementById("loadingOverlay").style.display = "flex";
    }
    function redirectToLogin() {
        // Redirect to login.php
        window.location.href = "login.php";
    }
</script>
</body>
</html>
