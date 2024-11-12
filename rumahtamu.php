<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tempahan Rumah Tamu di UKM</title>
    <link rel="stylesheet" href="style3.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Inria+Serif:wght@700&family=Inria+Sans:wght@700&display=swap" rel="stylesheet">  
    <link href="https://fonts.googleapis.com/css2?family=Inria+Serif:wght@700&display=swap" rel="stylesheet">
    <style>
        /* Top header styling */
        .header {
            background-color: #001f54;
            color: white;
            padding: 15px 20px;
            display: flex;
            align-items: center;
            justify-content: space-between;
            position: fixed;
            width: 100%;
            top: 0;
            left: 0;
            z-index: 1000;
        }
        .header .title {
            text-align: center;
            font-size: 18px;
            font-weight: normal; /* Less bold */
        }
        .header .logout {
            text-decoration: none;
            color: white;
            font-size: 14px;
            position: absolute;
            right: 55px;
            font-weight: normal; /* Less bold */
        }
    </style>

</head>
<body>

    <!-- Background container -->
    <div class="background-image"></div>

    <!-- Header Section -->
    <div class="header">
        <span class="title">SISTEM TEMPAHAN RUMAH TAMU UNIVERSITI KEBANGSAAN MALAYSIA</span>
        <form action="login.php" method="POST">
            <a href="login.php" class="logout">Log Keluar</a>
        </form>
    </div>

    <!-- <header class="navbar">
        <div class="navbar-content">
            <h1>SISTEM TEMPAHAN RUMAH TAMU UNIVERSITI KEBANGSAAN MALAYSIA</h1>
            <form action="login.php" method="POST">
                <div class="logout">
                    <button type="submit" class="logout"><i class="fas fa-user"></i> Log Keluar</button>
                </div>
            </form>
        </div>
    </header> -->

    <!-- Main Content Container -->
    <div class="main-container">
        <!-- Grey Card with Search and College List -->
        <div class="card">
            <div class="search-bar">
                <button class="map-button">
                    <i class="fas fa-map-marker-alt"></i> Lihat Peta
                </button>
                <button class="fav-button">
                    <i class="fas fa-heart"></i> Kegemaran
                </button>
                <div class="family-filter">
                    <i class="fas fa-users"></i> <!-- Keluarga Icon -->
                    <select>
                        <option value="family">Keluarga</option>
                        <option value="single">Single</option>
                    </select>
                </div>
                <div class="search-input-container">
                    <input type="text" class="search-input" placeholder="Carian">
                    <button class="search-button">
                        <i class="fas fa-search"></i> <!-- Carian Icon -->
                    </button>
                </div>
            </div>

            <!-- College List -->
            <div class="college-list">
                <!-- College 1 -->
                <div class="college-card">
                    <img src="kiz.png" alt="Kolej Ibu Zain" class="college-image">
                    <div class="college-info">
                        <h2>KIZ</h2>
                        <p>Kolej Ibu Zain</p>
                    </div>
                    <div class="rating">
                        ★★★★★
                    </div>
                </div>

                <!-- College 2 -->
                <div class="college-card">
                    <img src="kkm.jpg" alt="Kolej Keris Mas" class="college-image">
                    <div class="college-info">
                        <h2>KKM</h2>
                        <p>Kolej Keris Mas</p>
                    </div>
                    <div class="rating">
                        ★★★★☆
                    </div>
                </div>

                <!-- College 3 -->
                <div class="college-card">
                    <img src="kab.jpg" alt="Kolej Aminuddin Baki" class="college-image">
                    <div class="college-info">
                        <h2>KAB</h2>
                        <p>Kolej Aminuddin Baki</p>
                    </div>
                    <div class="rating">
                        ★★★★☆
                    </div>
                </div>

                <!-- College 4 -->
                <div class="college-card">
                    <img src="kbh.jpg" alt="Kolej Burhanuddin Helmi" class="college-image">
                    <div class="college-info">
                        <h2>KBH</h2>
                        <p>Kolej Burhanuddin Helmi</p>
                    </div>
                    <div class="rating">
                        ★★★★☆
                    </div>
                </div>

                <!-- College 5 -->
                <div class="college-card">
                    <img src="kiy.jpeg" alt="Kolej Ibrahim Yaakub" class="college-image">
                    <div class="college-info">
                        <h2>KIY</h2>
                        <p>Kolej Ibrahim Yaakub</p>
                    </div>
                    <div class="rating">
                        ★★★★☆
                    </div>
                </div>

                <!-- College 6 -->
                <div class="college-card">
                    <img src="kpz.jpg" alt="Kolej Pendeta Za'ba" class="college-image">
                    <div class="college-info">
                        <h2>KPZ</h2>
                        <p>Kolej Pendeta Za'ba</p>
                    </div>
                    <div class="rating">
                        ★★★★☆
                    </div>
                </div>

                <!-- College 7 -->
                <div class="college-card">
                    <img src="krk.jpeg" alt="Kolej Rahim Kajai" class="college-image">
                    <div class="college-info">
                        <h2>KRK</h2>
                        <p>Kolej Rahim Kajai</p>
                    </div>
                    <div class="rating">
                        ★★★★☆
                    </div>
                </div>

                <!-- College 8 -->
                <div class="college-card">
                    <img src="kuo.png" alt="Kolej Ungku Omar" class="college-image">
                    <div class="college-info">
                        <h2>KUO</h2>
                        <p>Kolej Ungku Omar</p>
                    </div>
                    <div class="rating">
                        ★★★★☆
                    </div>
                </div>

                <!-- College 9 -->
                <div class="college-card">
                    <img src="ktsn.jpg" alt="Kolej Tun Syed Nasir" class="college-image">
                    <div class="college-info">
                        <h2>KTSN</h2>
                        <p>Kolej Tun Syed Nasir</p>
                    </div>
                    <div class="rating">
                        ★★★★☆
                    </div>
                </div>

                <!-- College 10 -->
                <div class="college-card">
                    <img src="ktdi.jpg" alt="Kolej Tun Dr Ismail" class="college-image">
                    <div class="college-info">
                        <h2>KTDI</h2>
                        <p>Kolej Tun Dr Ismail</p>
                    </div>
                    <div class="rating">
                        ★★★★☆
                    </div>
                </div>

                <!-- College 11 -->
                <div class="college-card">
                    <img src="kdo.jpg" alt="Kolej Dato Onn" class="college-image">
                    <div class="college-info">
                        <h2>KDO</h2>
                        <p>Kolej Dato Onn</p>
                    </div>
                    <div class="rating">
                        ★★★★☆
                    </div>
                </div>
            </div> <!-- End of college-list -->
        </div> <!-- End of card -->
    </div> <!-- End of main-container -->
    
</body>
</html>
