<?php require_once 'header.php';
require_once 'loglar.php'; ?>
<div class="dashboard-content">
    <div class="dashboard-form">
        <div class="row">

            <!-- Profile -->
            <div class="col-lg-6 col-md-6 col-xs-12 padding-right-30">
                <div class="dashboard-list-box">
                    <h4 class="gray">Sık Sorulan Sorular </h4>
                    <div class="dashboard-list-box-static">

                        <?php
                        if (isset($_POST['ekle'])) {
                            $baslik = $_POST['baslik'];
                            $icerik = $_POST['icerik'];

                            $sql = "INSERT INTO sss (başlık, içerik) VALUES (?,?)";
                            $stmt = $conn->prepare($sql);
                            $stmt->execute([$baslik, $icerik]);
                            logla($conn, "SSS güncellendi", "Admin SSS ayarlarını güncelledi.");
                        }
                        ?>

                        <form action="" method="POST">
                            <label>Soru Başlığı</label>
                            <input name="baslik" type="text">

                            <label>Detay</label>
                            <textarea name="icerik" id="" cols="30" rows="10"></textarea>


                            <button name="ekle" class="button">Soruyu Ekle</button>

                        </form>
                    </div>
                </div>
            </div>


        </div>
    </div>
</div>
<?php require_once 'footer.php'; ?>
