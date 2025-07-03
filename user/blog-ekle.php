<?php
require_once '../conn.php';
session_start();
header("Cache-Control: no-store, no-cache, must-revalidate, max-age=0");
header("Cache-Control: post-check=0, pre-check=0", false);
header("Pragma: no-cache");
date_default_timezone_set('Europe/Istanbul');
$userId = isset($_SESSION['kullanici_id']) ? $_SESSION['kullanici_id'] : null;
?>
<link rel="shortcut icon" href="../images/favicon.png">
<link rel="stylesheet" href="../css/ekle.css">
<div class="header-container">
    <div class="header-left">
    <h3><a href="index.php"><img src="../images/Logo.png.png"></a></h3>
    </div>
    <div class="header-right">
      <a href="bloglarım.php" class="logout-button">Geri Dön</a>
    </div>
</div>
<div class="container">
    <h4>Blog Ekle</h4>
    <div>
        <?php
        $ikonPath = "";
        if (isset($_POST['ekle-blog'])) {
            if (isset($_FILES['resim'])) {
                $targetDir = "../uploads/";
                $targetFile = $targetDir . basename($_FILES['resim']['name']);
                $tempFile = $_FILES['resim']['tmp_name'];
                if (move_uploaded_file($tempFile, $targetFile)) {
                    $ikonPath = $targetFile;
                }
            }
            $baslik = $_POST['baslik'];
            $icerik = $_POST['icerik'];
            $etiketler = $_POST['etiket'];
            $kategori = $_POST['kategori'];
            $sql = "INSERT INTO bloglar (baslik, icerik, etiketler, tarih, kategori, resim, üyeid) VALUES (?,?,?,?,?,?,?)";
            $stmt = $conn->prepare($sql);
            if ($stmt->execute([$baslik, $icerik, $etiketler, date("d.m.Y - H:i:s"), $kategori, $ikonPath, $userId])) {
                header("Location: " . $_SERVER['PHP_SELF'] . "?durum=basari");
                exit;
            } else {
                header("Location: " . $_SERVER['PHP_SELF'] . "?durum=hatali");
                exit;
            }
        }
        ?>
        <form action="" method="POST" enctype="multipart/form-data">
            <div class="file-input">
                <input required type="file" name="resim" />
                <label>Resim Yükle</label>
            </div>
            <label>Blog Başlığı</label>
            <input required name="baslik" type="text">
            <label>Blog İçeriği</label>
            <textarea name="icerik" cols="30" required rows="10"></textarea>
            <label>Blog Etiketler (virgül ile ayırın)</label>
            <input required name="etiket" type="text">
            <label>Kategori</label>
            <select required name="kategori">
                <?php
                $stmt = $conn->prepare("SELECT * FROM kategoriler");
                $stmt->execute();
                while ($row = $stmt->fetch()) {
                    ?>
                    <option value="<?= $row[1] ?>"><?= $row[1] ?></option>
                    <?php
                }
                ?>
            </select>
            <button name="ekle-blog">Blog Ekle</button>
        </form>
    </div>
</div>
<script>
    <?php if (isset($_GET['durum'])): ?>
        <?php if ($_GET['durum'] == 'basari'): ?>
            alert("Blog başarıyla eklendi!");
        <?php elseif ($_GET['durum'] == 'hatali'): ?>
            alert("Bir sorun oluştu, lütfen tekrar deneyin.");
        <?php endif; ?>
    <?php endif; ?>
</script>
