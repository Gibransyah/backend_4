<?php
$servername = "localhost";
$username = "root"; 
$password = "Gibran2507_"; 
$dbname = "db_crud_pweb2"; 

$conn = new mysqli($servername, $username, $password, $dbname);

// Cek koneksi
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
?>
