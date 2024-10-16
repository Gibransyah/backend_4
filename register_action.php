<?php
include("db.php"); // Pastikan file ini berisi koneksi ke database

// Ambil data dari form
$nama = $_POST['nama'] ?? '';
$username = $_POST['username'] ?? '';
$password = $_POST['password'] ?? '';

// Cek apakah data tidak kosong
if (!empty($nama) && !empty($username) && !empty($password)) {
    // Cek apakah username sudah ada
    $stmt = $conn->prepare("SELECT * FROM user WHERE username = ?");
    $stmt->bind_param("s", $username);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        echo "Username sudah digunakan, silakan coba username lain.";
    } else {
        // Hash password untuk penyimpanan yang aman
        $hashed_password = password_hash($password, PASSWORD_DEFAULT);

        // Siapkan query untuk memasukkan data
        $stmt = $conn->prepare("INSERT INTO user (nama, username, password) VALUES (?, ?, ?)");
        $stmt->bind_param("sss", $nama, $username, $hashed_password);

        // Eksekusi query
        if ($stmt->execute()) {
            echo "Pendaftaran berhasil! Silakan <a href='login.php'>login</a>.";
        } else {
            echo "Pendaftaran gagal: " . $stmt->error;
        }
    }

    // Tutup statement
    $stmt->close();
} else {
    echo "Semua field harus diisi.";
}

// Tutup koneksi
$conn->close();
?>
