<?php
session_start();
include 'database.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Check if form inputs are set before using them
    if (isset($_POST['userMatric']) && isset($_POST['userPassword'])) {
        $userMatric = $_POST['userMatric'];
        $userPassword = $_POST['userPassword'];

        // Prepare SQL statement to prevent SQL injection
        $sql = "SELECT * FROM tbl_user WHERE userMatric = ?";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("s", $userMatric);
        $stmt->execute();
        $result = $stmt->get_result();

        if ($result->num_rows > 0) {
            // User found, fetch details
            $user = $result->fetch_assoc();

            // Verify the password against the hashed password stored in the database
            if (password_verify($userPassword, $user['userPassword'])) {
                // Password matches, set session variables
                $_SESSION['userName'] = $user['userName'];
                $_SESSION['userCategory'] = $user['userCategory'];
                // Redirect to the desired page after login
                header("Location: rumahtamu.php");
                exit();
            } else {
                $error = "Invalid matric number or password.";
            }
        } else {
            $error = "Invalid matric number or password.";
        }
        $stmt->close();
    }
}

$conn->close();
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tempahan Rumah Tamu di UKM</title>
    <link rel="stylesheet" href="styles.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
</head>

<body>
    <!-- Testing push v.1 kali kedua -->
    <header>
        <div class="logo">
            <img src="logo_ukm.png" alt="UKM Logo">
            <h2>Mengilham Harapan, Mencipta Masa Depan</h2>
        </div>
        <nav>
            <a href="login_staff.php">Staff</a>
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
        <form action="login.php" method="post">
            <div class="input-group">
                <i class="fa-solid fa-user"></i>
                <input type="text" id="userMatric" name="userMatric" placeholder="UKMPer / No. Matrik" required>
            </div>

            <div class="input-group">
                <i class="fa-solid fa-lock"></i>
                <input type="password" id="userPassword" name="userPassword" placeholder="Kata Laluan" required>
            </div>

            <button type="submit">Log Masuk</button>
            <a href="forgetpass.php" class="forgot-password"> Lupa Kata Laluan</a>
        </form>
        <?php if (isset($error)) { echo "<p style='color:red;'>$error</p>"; } ?>
    </div>
</body>
</html>
