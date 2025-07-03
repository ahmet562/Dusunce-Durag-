<?php require_once './header.php';
require_once '../conn.php';
require_once 'loglar.php';
?>
<div class="dashboard-content">
     <div class="dashboard-form">
        <div class="row">
            <div class="col-lg-6 col-md-6 col-xs-12 padding-right-30">
                <div class="dashboard-list-box">
                    <h4 class="gray">Bakım Ayarları</h4>
                    <div class="dashboard-list-box-static">

                        <?php
                        $stmt = $conn->prepare("SELECT*FROM bakımda");
                        $stmt->execute();
                        $user= $stmt->fetch();
                        $logoPath=$user[0];
                        if (isset($_POST['guncelle'])) {
                            $logoPath =$user[0];
                            if (isset($_FILES['logofile'])) {
                                $targetDir = "../uploads/";
                                $targetFile= $targetDir . basename ($_FILES["logofile"]["name"]);

                                $tempfile = $_FILES["logofile"]["tmp_name"];

                                if (move_uploaded_file ($tempfile, $targetFile)) {
                                    $logoPath = $targetFile;
                                }
                            }
                            $baslik=$_POST['baslik'];
                            $icerik=$_POST['icerik'];
                            $altbaslik=$_POST['altbaslik'];
                            $facebook=$_POST['facebook'];
                            $instagram=$_POST['instagram'];

                            $sql="UPDATE bakımda SET  baslik=?, icerik=?, altbaslik=?, facebook=?, instagram=?,logo=? ";
                            $stmt = $conn->prepare($sql);
                            $stmt->execute([$baslik,$icerik,$altbaslik,$facebook,$instagram,$logoPath]);

                            if ($stmt->rowCount() > 0) {
                                ?> <script>alert("Bakımda ayarları Güncellendi")</script>
                                <?php
                            } logla($conn, "Ayarlar güncellendi", "Admin bakım ayarlarını güncelledi.");
                        }
                        ?>

                        <form action="" method="POST" enctype="multipart/form-data">
                            <div class="edit-profile-photo">
                                <img src="images/user-avatar.jpg" alt="">
                                <div class="change-photo-btn">
                                    <div class="photoUpload">
                                        <span><i class="fa fa-upload"></i> Logo Yükle</span>
                                        <input type="file" name="logofile" class="upload" />
                                    </div>
                                </div>
                            </div>
                            <label>Logo Yolu <img style="width: 50px; height: 50px; border-radius: 50%;" src="<?= $user[0]; ?>" alt=""> </label>
                            <input name="logoyol" disabled value="<?= $user[0]; ?>" type="text">
                                <label>Bakımda Başlığı *</label>
                                <input value="<?= $user[1]; ?>" name="baslik" type="text">
                                <label>Bakımda Alt Başlık *</label>
                                <input value="<?= $user[3]; ?>" type="text" name="altbaslik">
                                <label>Bakımda İçerik Yazısı *</label>
                                <input value="<?= $user[2]; ?>" type="text" name="icerik">
                                <label>Facebook *</label>
                                <input value="<?= $user[4]; ?>" type="text" name="facebook">
                                <label>Instagram *</label>
                                <input value="<?= $user[5]; ?>" type="text" name="instagram">

                            <button class="button" name="guncelle">Değişiklikleri Kaydet</button>

                        </form>
                    </div>
                </div>
            </div>

        </div>
    </div>
</div>

<?php require_once './footer.php'; ?>
