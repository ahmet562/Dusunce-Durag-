<?php
ob_start();
require_once 'header.php';
require_once 'loglar.php'; ?>
<div class="dashboard-content">
    <div class="dashboard-form">
        <div class="row">

            <!-- Profile -->
            <div class="col-lg-6 col-md-6 col-xs-12 padding-right-30">
                <div class="dashboard-list-box">
                    <h4 class="gray">Slider Ayarları</h4>
                    <div class="dashboard-list-box-static">
                        <?php
                        if (isset($_GET['sliderid'])) {
                            $id = $_GET['sliderid'];
                            $stmt = $conn->prepare("SELECT * FROM slider WHERE id=?");
                            $stmt->execute([$id]);

                            $user = $stmt->fetch();
                        } else {
                            header('location: index.php');
                        }
                        $resimPath = $user[4];
                        if (isset($_POST['ekle'])) {

                            if (isset($_FILES['resim'])) {
                                $targetDir = "../uploads/";
                                $targetFile = $targetDir . basename($_FILES['resim']['name']);
                                $tempFile = $_FILES['resim']['tmp_name'];
                                if (move_uploaded_file($tempFile, $targetFile)) {
                                    $resimPath = $targetFile;
                                }
                            }
                            $etiket = $_POST["etiket"];
                            $baslik = $_POST["baslik"];
                            $aciklama = $_POST["aciklama"];
                            $id = $_GET['sliderid'];
                            $sql = "UPDATE slider SET etiket=?, başlık=?, açıklama=?, resim=? WHERE id=?";
                            $stmt = $conn->prepare($sql);
                            $stmt->execute([$etiket, $baslik, $aciklama, $resimPath, $id]);

                            logla($conn, "Slider Güncellendi", "Admin bir slider güncelledi!");
                        }
                        ?>
                        <form action="" method="POST" enctype="multipart/form-data">
                            <!-- Avatar -->
                            <div class="edit-profile-photo">
                                <img src="images/user-avatar.jpg" alt="">
                                <div class="change-photo-btn">
                                    <div class="photoUpload">
                                        <span><i class="fa fa-upload"></i>Resim Yükle</span>
                                        <input name="resim" type="file" class="upload" />
                                    </div>
                                </div>
                            </div>
                            <!-- Details -->

                            <label>Etiketler (virgül ile ayırın)</label>
                            <input name="etiket" type="text" value="<?= $user[1] ?>">

                            <label>Slider Başlık</label>
                            <input value="<?= $user[2] ?>" name="baslik" type="text">


                            <label>Slider Açıklama</label>
                            <input value="<?= $user[3] ?>" name="aciklama" type="text">
                            <button name="ekle" class="button">Güncelle</button>

                        </form>
                    </div>
                </div>
            </div>


        </div>
    </div>
</div>

<!-- Content / End -->
<?php require_once 'footer.php'; ?>
