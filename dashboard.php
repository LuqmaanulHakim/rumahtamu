<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            background-image: url('ukm.jpg');
            background-size: cover;
            background-position: center;
            display: flex;
            flex-direction: column;
        }
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
        /* Sidebar styling */
        .sidebar {
            width: 250px;
            background-color: rgba(61, 143, 217, 0.9);
            color: white;
            padding-top: 150px;
            position: fixed;
            top: 50px;
            height: calc(100vh - 60px);
        }
        .sidebar h1 {
            text-align: center;
            font-size: 16px;
            padding: 0 20px;
            margin-top: 20px;
        }
        .sidebar ul {
            list-style-type: none;
            padding: 0;
        }
        .sidebar ul li {
            padding: 15px 20px;
            cursor: pointer;
        }
        .sidebar ul li:hover {
            background-color: rgba(43, 108, 176, 0.9);
        }
        .content {
            margin-left: 300px;
            padding: 5px;
            width: calc(90% - 250px);
            padding-top: 80px;
        }
        .main {
            background-color: rgba(244, 244, 244, 0.9);
            border-radius: 8px;
            padding: 20px;
        }
        .main h2 {
            text-align: center;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }
        table, th, td {
            border: 1px solid #ddd;
        }
        th, td {
            padding: 12px;
            text-align: left;
        }
        th {
            background-color: #f2f2f2;
        }
        .filter-section {
            display: flex;
            justify-content: space-between;
            margin-bottom: 10px;
        }
        .filter-section select, .filter-section input[type="text"] {
            padding: 8px;
            font-size: 16px;
        }
    </style>
</head>
<body>

<div class="header">
    <span class="title">SISTEM TEMPAHAN RUMAH TAMU UNIVERSITI KEBANGSAAN MALAYSIA</span>
    <form action="login_staff.php" method="POST">
        <a href="login_staff.php" class="logout">Log Keluar</a>
    </form>
</div>

<div class="sidebar">
    <ul>
        <li>Senarai Tetamu</li>
        <li>Tarikh Tempahan</li>
        <li>Tambah Bilik</li>
        <li>Dashboard</li>
    </ul>
</div>

<div class="content">
    <div class="main">
        <h2>Senarai tetamu</h2>
        
        <!-- Filter and Search Section -->
        <div class="filter-section">
            <select>
                <option value="all">Semua</option>
                <!-- Additional options can be added here -->
            </select>
            <input type="text" placeholder="Search...">
        </div>

        <!-- Guest List Table -->
            <table>
                <thead>
                    <tr>
                        <th>Nama tetamu</th>
                        <th>Tarikh tempahan</th>
                        <th>Kolej</th>
                        <th>Jenis Bilik</th>
                        <th>Permintaan khas</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>Adam Harris</td>
                        <td>Khamis, 4-4-2024</td>
                        <td>KPZ</td>
                        <td>Single</td>
                        <td>—</td>
                    </tr>
                    <tr>
                        <td>Muhammad Luqmanul Hakim</td>
                        <td>Isnin, 11-3-2024</td>
                        <td>KIZ</td>
                        <td>Single</td>
                        <td>...</td>
                    </tr>
                    <tr>
                        <td>Yasha</td>
                        <td>Isnin, 31-2-2024</td>
                        <td>KIZ</td>
                        <td>Family</td>
                        <td>—</td>
                    </tr>
                    <tr>
                        <td>Aynuri</td>
                        <td>Jumaat, 28-2-2024</td>
                        <td>KIZ</td>
                        <td>Double</td>
                        <td>—</td>
                    </tr>
                    <tr>
                        <td>Kim So Hyun</td>
                        <td>Isnin, 21-2-2024</td>
                        <td>KIZ</td>
                        <td>Single</td>
                        <td>...</td>
                    </tr>
                    <tr>
                        <td>Freerider</td>
                        <td>Rabu, 17-2-2024</td>
                        <td>KIZ</td>
                        <td>Single</td>
                        <td>—</td>
                    </tr>
                    <tr>
                        <td>Aliff Aziz</td>
                        <td>Selasa, 16-2-2024</td>
                        <td>KIZ</td>
                        <td>Double</td>
                        <td>—</td>
                    </tr>
                    <tr>
                        <td>Aliff Teega</td>
                        <td>Khamis, 11-2-2024</td>
                        <td>KIZ</td>
                        <td>Single</td>
                        <td>—</td>
                    </tr>
                    <tr>
                        <td>Jamal</td>
                        <td>Sabtu, 8-2-2024</td>
                        <td>KIZ</td>
                        <td>Single</td>
                        <td>...</td>
                    </tr>
                </tbody>
            </table>
    </div>
</div>

</body>
</html>
