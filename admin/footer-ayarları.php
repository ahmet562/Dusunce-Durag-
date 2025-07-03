<?php require_once 'header.php';
require_once 'loglar.php'; ?>
<div class="dashboard-content">
    <div class="dashboard-form">
        <div class="row">
            <div class="col-lg-6 col-md-6 col-xs-12 padding-right-30">
                <div class="dashboard-list-box">
                    <h4 class="gray">Footer Ayarları</h4>
                    <div class="dashboard-list-box-static">

                        <?php
                        $stmt = $conn->prepare("SELECT * FROM footer");
                        $stmt->execute();
                        $user = $stmt->fetch();

                        if (isset($_POST['gonder'])) {
                            $tanitim = $_POST['tanitim'];
                            $linkler = $_POST['linkler'];
                            $facebook = $_POST['face'];
                            $instagram = $_POST['insta'];

                            $sql = "UPDATE footer SET tanıtım=?, linkler=?, facebook=?, instagram=?";

                            $stmt = $conn->prepare($sql);
                            $stmt->execute([$tanitim, $linkler, $facebook, $instagram]);
                            logla($conn, "Footer güncellendi", "Admin footer ayarlarını güncelledi.");
                        }
                        ?>


                        <form action="" method="POST">
                            <label>Footer Tanıtım</label>
                            <input name="tanitim" value="<?= $user[0] ?>" type="text">

                            <label>Footer Linkler</label>
                            <textarea name="linkler" id="" cols="30" rows="10"><?= $user[1] ?></textarea>

                            <label>Footer Facebook</label>
                            <input name="face" value="<?= $user[2] ?>" type="text">

                            <label>Footer Instagram</label>
                            <input name="insta" value="<?= $user[3] ?>" type="text">

                            <button name="gonder" class="button">Değişiklikleri Kaydet</button>
                        </form>

                    </div>
                </div>
            </div>


        </div>
    </div>
</div>

<!-- Content / End -->
<?php require_once 'footer.php'; ?>
