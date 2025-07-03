<?php require_once 'header.php';

require_once 'loglar.php'; ?>
<div class="dashboard-content">
    <div class="dashboard-form">
        <div class="row">

            <div class="col-lg-6 col-md-6 col-xs-12 padding-right-30">
                <div class="dashboard-list-box">
                    <h4 class="gray">Hakkımda Ayarları</h4>
                    <div class="dashboard-list-box-static">
                        <?php
                        $stmt = $conn->prepare("SELECT * FROM hakkımda");
                        $stmt->execute();
                        $user = $stmt->fetch();

                        if (isset($_POST['kaydet'])) {
                            $benKimim = $_POST['benkimim'];
                            $hangiUlkelereGittim = $_POST['hangiulkeler'];
                            $begendiginUlke = $_POST['begendiginulke'];
                            $ozluSoz = $_POST['ozlusoz'];
                            $ozluSozSahibi = $_POST['ozlusozsahibi'];
                            $insta = $_POST['insta'];

                            $sql = "UPDATE hakkımda SET ben_kimim=?, nerelere_gittim=?, en_begendigim_yer=?, ozlu_soz=?, ozlu_soz_sahibi=?, instagram=?";
                            $stmt = $conn->prepare($sql);
                            $stmt->execute([$benKimim, $hangiUlkelereGittim, $begendiginUlke, $ozluSoz, $ozluSozSahibi,$insta]);
                            logla($conn, "Hakkımda güncellendi", "Admin Hakkımda ayarlarını güncelledi.");
                        }
                        ?>
                        <form action="" method="POST">
                            <label>Ben Kimim?</label>
                            <textarea name="benkimim" id="" cols="30" rows="10"><?= $user[0] ?></textarea>

                            <label>Nerelere Gittim</label>
                            <textarea name="hangiulkeler" id="" cols="30" rows="10"><?= $user[1] ?></textarea>

                            <label>En Beğendiğim Yer</label>
                            <input value="<?= $user[2] ?>" name="begendiginulke" type="text">

                            <label>Özlü Söz</label>
                            <input value="<?= $user[3] ?>" name="ozlusoz" type="text">

                            <label>Özlü Söz Sahibi</label>
                            <input value="<?= $user[4] ?>" name="ozlusozsahibi" type="text">
                            <label>İnstagram</label>
                            <input value="<?= $user[5] ?>" name="insta" type="text">

                            <button name="kaydet" class="button">Değişiklikleri Kaydet</button>
                        </form>

                    </div>
                </div>
            </div>


        </div>
    </div>
</div>

<?php require_once 'footer.php'; ?>
