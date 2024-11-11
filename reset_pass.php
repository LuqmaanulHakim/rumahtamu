<?php
session_start();
include 'database.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Get the email and new password from the form
    $userEmail = $_POST['userEmail'];
    $newPassword = $_POST['newPassword'];

    // Check if the email exists in the database
    $sql = "SELECT * FROM tbl_user WHERE userEmail = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("s", $userEmail);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        // Email exists, so proceed with password update

        // Hash the new password before updating it in the database
        $hashedPassword = password_hash($newPassword, PASSWORD_DEFAULT);

        // Update the password in the database
        $update_sql = "UPDATE tbl_user SET userPassword = ? WHERE userEmail = ?";
        $update_stmt = $conn->prepare($update_sql);
        $update_stmt->bind_param("ss", $hashedPassword, $userEmail);
        $update_stmt->execute();

        // Fetch the updated user details
        $user = $result->fetch_assoc();

        // Set session variables
        $_SESSION['userName'] = $user['userName'];
        $_SESSION['userCategory'] = $user['userCategory'];

        // Redirect to the rumahtamu.php page after successful password reset
        header("Location: rumahtamu.php");
        exit();
    } else {
        echo "No account found with that email address.";
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
    <title>Reset Password</title>
    <link rel="stylesheet" href="styles.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
</head>

<body>
    <header>
        <div class="logo">
            <img src="logo.png" alt="UKM Logo">
            <h2>Mengilham Harapan, Mencipta Masa Depan</h2>
        </div>
        <nav>
            <a href="#">Staff</a>
            <a href="#">Tetapan</a>
        </nav>
    </header>

    <div class="main-content">
        <div class="hero">
            <h1 class="ai">TEMPAHAN </h1>
            <h1 class="ab"> RUMAH TAMU DI UKM</h1>
        </div>

        <div class="facilities">
            <h3>Kemudahan</h3>

            <div class="facility-container">
                <div class="facility-item">
                    <div class="facility">
                        <i class="fas fa-snowflake"></i> <!-- Aircond Icon -->
                    </div>
                    <p class="facility-text">Aircond</p>
                </div>

                <div class="facility-item">
                    <div class="facility">
                        <i class="fas fa-wifi"></i> <!-- WiFi Icon -->
                    </div>
                    <p class="facility-text">WiFi</p>
                </div>

                <div class="facility-item">
                    <div class="facility">
                        <i class="fas fa-bed"></i> <!-- Bed Icon -->
                    </div>
                    <p class="facility-text">Bed</p>
                </div>

                <div class="facility-item">
                    <div class="facility">
                        <i class="fas fa-parking"></i> <!-- Parking Icon -->
                    </div>
                    <p class="facility-text">Parking</p>
                </div>
            </div>
        </div>
    </div>

    <div class="login-form">
        <form action="reset_pass.php" method="POST">
            <div class="input-group">
                <i class="fa-solid fa-user"></i>
                <input type="email" id="userEmail" name="userEmail" placeholder="Email" required>
            </div>

            <div class="input-group">
                <i class="fa-solid fa-lock"></i>
                <input type="password" id="newPassword" name="newPassword" placeholder="Kata Laluan" required>
            </div>

            <button type="submit">Reset Password</button>
        </form>

    </div>
</body>
</html>
