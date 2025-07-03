<?php
require_once '../conn.php';
require_once 'loglar.php';

if (isset($_GET['mesajid'])) {
    $mesajID = $_GET['mesajid'];
    $sql = "DELETE FROM mesajlar WHERE id=?";
    $stmt = $conn->prepare($sql);
    $stmt->execute([$mesajID]);

    if ($stmt) {
        logla($conn, "Mesaj Silindi", "Admin bir mesajı sildi.");
        header("location: mesaj.php");
    }
}

if (isset($_GET['uyeid'])) {
    $uyeID = $_GET['uyeid'];
    $sql = "DELETE FROM üyeler WHERE id=?";
    $stmt = $conn->prepare($sql);
    $stmt->execute([$uyeID]);

    if ($stmt) {
        logla($conn, "Üye Silindi", "Admin bir üyeyi sildi.");
        header("location: üyeler.php");
    }
}

if (isset($_GET['blogid'])) {
    $blogID = $_GET['blogid'];
    $sql = "DELETE FROM bloglar WHERE id=?";
    $stmt = $conn->prepare($sql);
    $stmt->execute([$blogID]);

    if ($stmt) {
        logla($conn, "Blog Silindi", "Admin bir blog sildi.");
        header("location: blog-düzenle.php");
    }
}


if (isset($_GET['katid'])) {
    $katID = $_GET['katid'];
    $sql = "DELETE FROM kategoriler WHERE id=?";
    $stmt = $conn->prepare($sql);
    $stmt->execute([$katID]);

    if ($stmt) {
        logla($conn, "Kategori Silindi", "Admin bir kategoriyi sildi.");
        header("location: kat-düzenle.php");
    }
}



if (isset($_GET['sliderid'])) {
    $sliderID = $_GET['sliderid'];
    $sql = "DELETE FROM slider WHERE id=?";
    $stmt = $conn->prepare($sql);
    $stmt->execute([$sliderID]);

    if ($stmt) {
        logla($conn, "Slider Silindi", "Admin bir slider sildi.");
        header("location: slider-düzenle.php");
    }
}
?>
