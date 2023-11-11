<?php
$servername = "localhost";
$username = "u986168358_images";
$password = "KxY7RKLoK!4";
$database = "u986168358_images";

// Veritabanı bağlantısını oluşturun
$conn = new mysqli($servername, $username, $password, $database);

// Bağlantı hatası kontrolü
if ($conn->connect_error) {
    die("Veritabanı bağlantı hatası: " . $conn->connect_error);
}
?>
