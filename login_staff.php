<?php
session_start();
include 'database.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Check if the POST variables are set
    if (isset($_POST['staffID']) && isset($_POST['staffPassword'])) {
        $staffID = $_POST['staffID'];
        $staffPassword = $_POST['staffPassword'];

        // Prepare SQL statement to prevent SQL injection
        $sql = "SELECT * FROM tbl_staff WHERE staffID = ? AND staffPassword = ?";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("ss", $staffID, $staffPassword);
        $stmt->execute();
        $result = $stmt->get_result();

        if ($result->num_rows > 0) {
            // User found, fetch details
            $user = $result->fetch_assoc();
            $_SESSION['staffName'] = $user['staffName'];
            $_SESSION['staffCategory'] = $user['staffCategory'];
            // Redirect to the desired page after login
            header("Location: dashboard.php");
            exit();
        } else {
            $error = "Invalid staff ID or password.";
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
    <!-- Testing push -->
    <header>
        <div class="logo">
            <img src="logo_ukm.png" alt="UKM Logo">
            <h2>Mengilham Harapan, Mencipta Masa Depan</h2>
        </div>
        <nav>
            <a href="login.php">Tetamu</a>
            <a href="#">Tetapan</a>
        </nav>
    </header>

    <div class="main-content">
        <div class="hero">
            <h1 class="ai">STAFF</h1>
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
        <form action="login_staff.php" method="post">
            <div class="input-group">
                <i class="fas fa-user"></i>
                <input type="text" id="staffID" name="staffID" placeholder="UKMPer" required>
            </div>

            <div class="input-group">
                <i class="fas fa-lock"></i>
                <input type="password" id="staffPassword" name="staffPassword" placeholder="Kata Laluan" required>
            </div>

            <button type="submit">Log Masuk</button>
            <!-- <a href="" class="forgot-password"> Lupa Kata Laluan</a> -->
        </form>
        <?php if (!empty($error)) { echo "<p style='color:red;'>$error</p>"; } ?>
    </div>
</body>
</html>
