<?php
// Memulai sesi
session_start();

// Jika pengguna belum login, redirect ke halaman login
if (!isset($_SESSION['username'])) {
    header("Location: login.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
</head>
<body class="bg-gray-100 flex items-center justify-center min-h-screen">
    <div class="text-center">
        <h1 class="text-5xl font-bold text-red-600 mb-6">Selamat Datang di Dashboard</h1>
        <p class="text-xl text-gray-700">Hallo <?= htmlspecialchars($_SESSION['username']) ?>, Selamat kamu sudah berhasil login.</p>
        <a href="logout.php" class="mt-6 inline-block bg-red-600 text-white py-3 px-8 rounded-lg text-lg font-semibold hover:bg-red-700 transition duration-200">Logout</a>
    </div>
</body>
</html>
