<?php require_once 'header.php';
require_once 'loglar.php';
date_default_timezone_set('Europe/Istanbul');
?>
<div class="dashboard-content">
    <div class="dashboard-form">
        <div class="row">
            <div class="col-lg-6 col-md-6 col-xs-12 padding-right-30">
                <div class="dashboard-list-box">
                    <h4 class="gray">Blog Kategori Ekle</h4>
                    <form action="" method="POST">
                        <label>Kategori İsmi</label>
                        <input required name="kat-isim" type="text">
                        <button name="kat-ekle" class="button">Kategori Ekle Ekle</button>
                    </form> <br>
                    <h4 class="gray">Blog Ekle</h4>
                    <div class="dashboard-list-box-static">
                        <?php
                        if (isset($_POST['kat-ekle'])) {
                            $katIsim = $_POST['kat-isim'];
                            $sql = "INSERT INTO kategoriler (ad, tarih) VALUES (?,?)";
                            $stmt = $conn->prepare($sql);
                            $stmt->execute([$katIsim, date("d.m.Y - H:i:s")]);
                            logla($conn, "Yeni Kategori Eklendi", "Admin yeni bir kategori ekledi!");
                        }
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
                            $sql = "INSERT INTO bloglar (baslik, icerik, etiketler, tarih, kategori, resim) VALUES (?,?,?,?,?,?)";
                            $stmt = $conn->prepare($sql);
                            $stmt->execute([$baslik, $icerik, $etiketler, date("d.m.Y - H:i:s"), $kategori, $ikonPath]);
                            logla($conn, "Yeni Blog Eklendi", "Admin yeni bir blog ekledi!");
                        }
                        ?>
                        <form action="" method="POST" enctype="multipart/form-data">
                            <div class="edit-profile-photo">
                                <img src="images/user-avatar.jpg" alt="">
                                <div class="change-photo-btn">
                                    <div class="photoUpload">
                                        <span><i class="fa fa-upload"></i>Resim Yükle</span>
                                        <input type="file" class="upload" name="resim" />
                                    </div>
                                </div>
                            </div>
                            <label>Blog Başlığı</label>
                            <input required name="baslik" type="text">
                            <label>Blog İçeriği</label>
                            <textarea name="icerik" id="" cols="30" required rows="10"></textarea>
                            <label>Blog Etiketler (virgül ile ayırın)</label>
                            <input required name="etiket" type="text">
                            <label>Kategori</label>
                            <select required name="kategori" id="">
                                <?php
                                $stmt = $conn->prepare("SELECT * FROM kategoriler");
                                $stmt->execute();
                                while ($row = $stmt->fetch()) {
                                    ?>
                                    <option value="<?= $row[1] ?>">
                                        <?= $row[1] ?>
                                    </option>
                                    <?php
                                }
                                ?>
                            </select>
                            <button name="ekle-blog" class="button">Blog Ekle</button>
                        </form>

                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?php require_once 'footer.php'; ?>
