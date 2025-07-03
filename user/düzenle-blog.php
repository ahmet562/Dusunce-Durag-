<?php
require_once '../conn.php';
session_start();
header("Cache-Control: no-store, no-cache, must-revalidate, max-age=0");
header("Cache-Control: post-check=0, pre-check=0", false);
header("Pragma: no-cache");
if (isset($_GET['blogid'])) {
    $blogID = $_GET['blogid'];
    $userId = $_SESSION['kullanici_id'];
    $sql = "SELECT * FROM bloglar WHERE id = ? AND üyeid = ?";
    $stmt = $conn->prepare($sql);
    $stmt->execute([$blogID, $userId]);
    $blog = $stmt->fetch(PDO::FETCH_ASSOC);
    if (!$blog) {
        echo "Bu blog size ait değil veya bulunamadı.";
        exit;
    }
} else {
    echo "Blog ID'si geçersiz.";
    exit;
}
if (isset($_POST['duzenle-blog'])) {
    $baslik = $_POST['baslik'];
    $icerik = $_POST['icerik'];
    $etiketler = $_POST['etiket'];
    $kategori = $_POST['kategori'];
    $ikonPath = $blog['resim'];
    if (isset($_FILES['resim']) && $_FILES['resim']['error'] == 0) {
        $targetDir = "../uploads/";
        $targetFile = $targetDir . basename($_FILES['resim']['name']);
        $tempFile = $_FILES['resim']['tmp_name'];
        if (move_uploaded_file($tempFile, $targetFile)) {
            $ikonPath = $targetFile;
        }
    }
    $updateSql = "UPDATE bloglar SET baslik = ?, icerik = ?, etiketler = ?, kategori = ?, resim = ? WHERE id = ? AND üyeid = ?";
    $stmt = $conn->prepare($updateSql);
    $stmt->execute([$baslik, $icerik, $etiketler, $kategori, $ikonPath, $blogID, $userId]);
    header("Location: bloglarım.php?durum=guncellendi");
    exit;
}
?>
<title>Düşünce Durağı</title>
<link rel="shortcut icon" href="../images/favicon.png">
<link rel="stylesheet" href="../css/ekle.css">
<div class="header-container">
    <div class="header-left">
    <h3><a href="bloglarım.php"><img src="../images/Logo.png.png"></a></h3>
    </div>
    <div class="header-right">
      <a href="bloglarım.php" class="logout-button">Geri Dön</a>
    </div>
</div>
<div class="container">
    <h4>Blog Düzenle</h4>
    <form action="" method="POST" enctype="multipart/form-data">
        <div class="file-input">
            <input type="file" name="resim" />
            <label>Yeni Resim Yükle</label>
        </div>
        <label>Blog Başlığı</label>
        <input required name="baslik" type="text" value="<?= htmlspecialchars($blog['baslik']); ?>">
        <label>Blog İçeriği</label>
        <textarea name="icerik" cols="30" required rows="10"><?= htmlspecialchars($blog['icerik']); ?></textarea>
        <label>Blog Etiketler (virgül ile ayırın)</label>
        <input required name="etiket" type="text" value="<?= htmlspecialchars($blog['etiketler']); ?>">
        <label>Kategori</label>
        <select required name="kategori">
            <?php
            $stmt = $conn->prepare("SELECT * FROM kategoriler");
            $stmt->execute();
            while ($row = $stmt->fetch()) {
                $selected = ($row[1] == $blog['kategori']) ? "selected" : "";
                echo "<option value=\"{$row[1]}\" $selected>{$row[1]}</option>";
            }
            ?>
        </select>
        <button name="duzenle-blog">Blogu Güncelle</button>
    </form>
</div>
