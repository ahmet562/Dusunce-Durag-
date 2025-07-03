<?php
require_once '../conn.php';
session_start();

if (!isset($_SESSION['kullanici_id'])) {
    echo "Giriş yapmanız gerekiyor.";
    exit;
}
if (isset($_GET['blogid'])) {
    $blogID = $_GET['blogid'];
    $userId = $_SESSION['kullanici_id'];
    $sql = "DELETE FROM bloglar WHERE id = ? AND üyeid = ?";
    $stmt = $conn->prepare($sql);
    $stmt->execute([$blogID, $userId]);
    if ($stmt->rowCount() > 0) {
        header("Location: bloglarım.php?durum=silindi");
    } else {
        header("Location: bloglarım.php?durum=hata");
    }
} else {
    header("Location: bloglarım.php?durum=hata");
}
?>
