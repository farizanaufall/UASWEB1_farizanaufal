<?php
session_start();
include 'koneksi.php'; // WAJIB agar $koneksi dikenali

// keamanan page
$page = $_GET['page'] ?? 'home';
$allowed_pages = ['home', 'profile', 'produk', 'customer']; // Tambahkan 'customer' ke allowed pages
if (!in_array($page, $allowed_pages)) {
    $page = 'home';
}
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Dashboard POLGANMART</title>
    <style>
        body {
            margin: 0;
            font-family: Arial;
            background: #f4f4f4;
        }

        .sidebar {
            width: 220px;
            height: 100vh;
            background: #2c3e50;
            color: white;
            position: fixed;
        }

        .sidebar h2 {
            text-align: center;
            padding: 20px 0;
            border-bottom: 1px solid rgba(255,255,255,.2);
        }

        .sidebar a {
            display: block;
            color: white;
            padding: 12px 20px;
            text-decoration: none;
        }

        .sidebar a:hover {
            background: #34495e;
        }

        .header {
            height: 60px;
            background: white;
            margin-left: 220px;
            padding: 0 20px;
            display: flex;
            justify-content: flex-end;
            align-items: center;
            border-bottom: 1px solid #ddd;
        }

        .profile-btn {
            background: #3498db;
            color: white;
            padding: 8px 15px;
            border-radius: 20px;
            cursor: pointer;
        }

        .dropdown {
            position: relative;
        }

        .dropdown-content {
            display: none;
            position: absolute;
            right: 0;
            background: white;
            min-width: 150px;
            box-shadow: 0 2px 8px rgba(0,0,0,.2);
            border-radius: 5px;
            overflow: hidden;
        }

        .dropdown-content a,
        .dropdown-content button {
            display: block;
            width: 100%;
            padding: 10px;
            text-align: left;
            border: none;
            background: none;
            cursor: pointer;
            text-decoration: none;
            color: #333;
        }

        .dropdown-content a:hover,
        .dropdown-content button:hover {
            background: #f0f0f0;
        }

        .content {
            margin-left: 220px;
            padding: 20px;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            background: white;
        }

        th, td {
            padding: 10px;
            border: 1px solid #ddd;
        }

        th {
            background: #3498db;
            color: white;
        }
    </style>
</head>

<body>

<div class="sidebar">
    <h2>Dashboard</h2>
    <a href="dashboard.php">Home</a>
    <a href="dashboard.php?page=produk">List Produk</a>
    <a href="dashboard.php?page=customer">Customer</a> <!-- Ubah link Customer agar mengarah ke dashboard.php?page=customer -->
    <a href="#">Transaksi</a>
    <a href="#">Laporan</a>
</div>

<div class="header">
    <div class="dropdown">
        <div class="profile-btn" onclick="toggleMenu()">Profile ▾</div>
        <div class="dropdown-content" id="profileMenu">
            <a href="dashboard.php?page=profile">My Profile</a>
            <form action="logout.php" method="post">
                <button type="submit">Logout</button>
            </form>
        </div>
    </div>
</div>

<div class="content">
<?php
    if ($page == 'home') {
        echo "<h2>Welcome Dashboard POLGANMART</h2>";
    } elseif ($page == 'produk') {
        include 'pages/listproduct.php';
    } elseif ($page == 'customer') { // Tambahkan kondisi untuk page customer
        include 'pages/list-customer.php'; // Include file list-customer.php
    } elseif ($page == 'profile') {
        // Jika ada file profile.php di folder pages, include di sini
        // include 'pages/profile.php';
        echo "<h2>My Profile</h2><p>Profile content here.</p>"; // Placeholder jika belum ada
    }
?>
</div>

<script>
function toggleMenu() {
    const menu = document.getElementById("profileMenu");
    menu.style.display = menu.style.display === "block" ? "none" : "block";
}

window.onclick = function(e) {
    if (!e.target.matches('.profile-btn')) {
        document.getElementById("profileMenu").style.display = "none";
    }
}
</script>

</body>
</html>