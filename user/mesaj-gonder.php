<?php
require_once 'conn.php';
date_default_timezone_set('Europe/Istanbul');

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $ad = htmlspecialchars($_POST['adsoyad']);
    $email = htmlspecialchars($_POST['email']);
    $mesaj = htmlspecialchars($_POST['mesaj']);
    $tarih = date("Y-m-d H:i:s"); // MySQL datetime uyumlu format

    $sql = "INSERT INTO mesajlar (ad, email, mesaj, tarih) VALUES (?, ?, ?, ?)";
    $stmt = $conn->prepare($sql);
    $basari = $stmt->execute([$ad, $email, $mesaj, $tarih]);

    if ($basari) {
        echo "OK";
    } else {
        echo "Veritabanına kaydedilemedi.";
    }
}
?>
