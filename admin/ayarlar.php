<?php require_once './header.php';
require_once '../conn.php';
require_once 'loglar.php';
?>
            <div class="dashboard-content">
            <div class="dashboard-form">
                <div class="row">
                    <div class="col-lg-6 col-md-6 col-xs-12 padding-right-30">
                        <div class="dashboard-list-box">
                            <h4 class="gray">Site Ayarları</h4>
                            <div class="dashboard-list-box-static">

                                <?php
                                $stmt = $conn->prepare("SELECT*FROM ayarlar");
                                $stmt->execute();
                                $user= $stmt->fetch();
                                if (isset($_POST['kaydet'])) {
                                    $logoPath =$user[4];
                                    $ikonPath =$user[2];

                                    if (isset($_FILES['logofile'])) {
                                        $targetDir = "../uploads/";
                                        $targetFile= $targetDir . basename ($_FILES["logofile"]["name"]);

                                        $tempfile = $_FILES["logofile"]["tmp_name"];

                                        if (move_uploaded_file ($tempfile, $targetFile)) {
                                            $logoPath = $targetFile;
                                        }
                                    }
                                    if (isset($_FILES['ikonfile'])) {
                                        $targetDir = "../uploads/";
                                        $targetFile= $targetDir . basename ($_FILES["ikonfile"]["name"]);

                                        $tempfile = $_FILES["ikonfile"]["tmp_name"];

                                        if (move_uploaded_file ($tempfile, $targetFile)) {
                                            $ikonPath = $targetFile;
                                        }
                                    }

                                    $baslik = $_POST['baslik'];
                                    $aciklama = $_POST['aciklama'];
                                    $kelimeler = $_POST['kelimeler'];
                                    $bakim = $_POST['bakim'];

                                    $sql = 'UPDATE ayarlar SET baslik=?, aciklama=?, kelimeler=?, bakim=?, logo=?, ikon=?';
                                    $stmt = $conn->prepare($sql);
                                    $stmt->execute([$baslik,$aciklama,$kelimeler,$bakim,$logoPath, $ikonPath]);
                                    if($stmt->rowCount() > 0) {?>
                                    <script> alert("Başarıyla Güncellendi!");</script>
                                    <?php }
                                    logla($conn, "Ayarlar güncellendi", "Admin site ayarlarını güncelledi.");
                                }
                                ?>

                                <form action="ayarlar.php" method="post" enctype="multipart/form-data">
                                <div class="edit-profile-photo">
                                    <img src="images/user-avatar.jpg" alt="">
                                    <div class="change-photo-btn">
                                        <div class="photoUpload">
                                            <span><i class="fa fa-upload"></i> İkon Yükle</span>
                                            <input type="file" name="ikonfile" class="upload" />
                                        </div>
                                    </div>
                                </div>
                                <div class="edit-profile-photo">
                                    <img src="images/user-avatar.jpg" alt="">
                                    <div class="change-photo-btn">
                                        <div class="photoUpload">
                                            <span><i class="fa fa-upload"></i> Logo Yükle</span>
                                            <input type="file" name="logofile" class="upload" />
                                        </div>
                                    </div>
                                </div>
                                <div class="my-profile">
                                    <label>Logo Yolu <img style="width: 50px; height: 50px; border-radius: 50%;" src="<?= $user[4]; ?>" alt=""> </label>
                                    <input name="logoyol" disabled value="<?= $user[4]; ?>" type="text">
                                    <label>İkon Yolu <img style="width: 50px; height: 50px; border-radius: 50%;" src="<?= $user[2]; ?>" alt=""> </label>
                                    <input name="ikonyol" disabled value="<?= $user[2]; ?>" type="text">

                                    <label>Site Başlığı </label>
                                    <input name="baslik" value="<?= $user[0]; ?>" type="text">

                                    <label>Site Açıklama </label>
                                    <input name="aciklama" value="<?= $user[1]; ?>" type="text">
                                    <label>Site Kelimeler </label>
                                    <input name="kelimeler" value="<?= $user[3]; ?>" type="text">

                                    <label>Site Bakım </label>
                                    <select name="bakim" id="">
                                        <?php
                                        if ($user[5] == 0) {
                                            ?>
                                            <option value="1">Bakımda</option>
                                            <option selected value="0">Bakımda Değil</option>
                                            <?php
                                        }else {
                                            ?>
                                            <option selected value="1">Bakımda</option>
                                            <option value="0">Bakımda Değil</option>
                                            <?php
                                        }

                                        ?>

                                    </select>
                                </div>

                                </div>

                                <button name="kaydet" class="button">Değişiklikleri Kaydet</button>
                                </form>

                            </div>
                        </div>
                    </div>

                </div>
            </div>
            </div>

            <!-- Content / End -->
            <?php require_once './footer.php'; ?>
