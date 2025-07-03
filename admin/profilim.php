<?php
ob_start();
session_start();

require_once 'header.php';
?>
<div class="dashboard-content">
    <div class="dashboard-form">
        <div class="row">
            <?php
            if (isset($_SESSION['admin_id'])) {
                $id = $_SESSION['admin_id'];
                $stmt = $conn->prepare("SELECT * FROM admins WHERE id=?");
                $stmt->execute([$id]);
                $user = $stmt->fetch(PDO::FETCH_ASSOC);
                if (isset($_POST['gonder'])) {
                    $ad = !empty($_POST['ad']) ? $_POST['ad'] : $user['ad'];
                    $soyad = !empty($_POST['soyad']) ? $_POST['soyad'] : $user['soyad'];
                    $posta = !empty($_POST['mail']) ? $_POST['mail'] : $user['email'];
                    if (!empty($_POST['yeni_sifre'])) {
                        $sifre = password_hash($_POST['yeni_sifre'], PASSWORD_BCRYPT);
                        $sql = "UPDATE admins SET ad=?, soyad=?, email=?, sifre=? WHERE id=?";
                        $stmt = $conn->prepare($sql);
                        $stmt->execute([$ad, $soyad, $posta, $sifre, $id]);
                    } else {
                        $sql = "UPDATE admins SET ad=?, soyad=?, email=? WHERE id=?";
                        $stmt = $conn->prepare($sql);
                        $stmt->execute([$ad, $soyad, $posta, $id]);
                    }
                    header("Location: " . basename(__FILE__) . "?guncelle=ok");
                    exit;
                }
            } else {
                header('Location: login.php');
                exit;
            }
            ?>
            <div class="col-lg-6 col-md-6 col-xs-12 padding-right-30">
                <div class="dashboard-list-box">
                    <h4 class="gray">Bilgileri Güncelle</h4>
                    <div class="dashboard-list-box-static">
                        <form action="" method="POST" enctype="multipart/form-data">
                            <label>Ad</label>
                            <input name="ad" value="<?= htmlspecialchars($user['ad']) ?>" type="text" required>
                            <label>Soyad</label>
                            <input name="soyad" value="<?= htmlspecialchars($user['soyad']) ?>" type="text" required>
                            <input type="hidden" name="full_phone" id="fullPhone">
                            <label>E-Posta</label>
                            <input name="mail" value="<?= htmlspecialchars($user['email']) ?>" type="text" required>
                            <label>Yeni Şifre</label>
                            <input name="yeni_sifre" type="password">
                            <button name="gonder" class="button">Güncelle</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?php require_once 'footer.php'; ?>
