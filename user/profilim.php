<?php
ob_start();
session_start();
require_once 'header.php';
?>

<div class="dashboard-content">
    <div class="dashboard-form">
        <div class="row">
            <?php
            if (isset($_SESSION['kullanici_id'])) {
                $id = $_SESSION['kullanici_id'];
                $stmt = $conn->prepare("SELECT * FROM üyeler WHERE id=?");
                $stmt->execute([$id]);
                $user = $stmt->fetch(PDO::FETCH_ASSOC);

                // Hesap silme işlemi
                if (isset($_POST['hesabi_sil'])) {
                    // Kullanıcıyı sil
                    $deleteStmt = $conn->prepare("DELETE FROM üyeler WHERE id=?");
                    $deleteStmt->execute([$id]);

                    // Oturumu sonlandır
                    session_destroy();
                    header('Location: ../index.php');
                    exit;
                }

                if (isset($_POST['gonder'])) {
                    $ad = !empty($_POST['ad']) ? $_POST['ad'] : $user['ad'];
                    $soyad = !empty($_POST['soyad']) ? $_POST['soyad'] : $user['soyad'];
                    $posta = !empty($_POST['gmail']) ? $_POST['gmail'] : $user['gmail'];

                    // E-POSTA DEĞİŞTİYSE VE BAŞKA KULLANICIDA VAR MI KONTROLÜ
                    if ($posta !== $user['gmail']) {
                        $checkMail = $conn->prepare("SELECT id FROM üyeler WHERE gmail=? AND id != ?");
                        $checkMail->execute([$posta, $id]);

                        if ($checkMail->rowCount() > 0) {
                            echo "<div style='color:red; padding:10px; background:#ffe0e0; margin-bottom:15px;'>Bu e-posta zaten kayıtlı!</div>";
                        } else {
                            // Güncelleme işlemi (şifreli ya da şifresiz)
                            if (!empty(trim($_POST['yeni_sifre']))) {
                                $sifre = password_hash($_POST['yeni_sifre'], PASSWORD_BCRYPT);
                                $sql = "UPDATE üyeler SET ad=?, soyad=?, gmail=?, sifre=? WHERE id=?";
                                $stmt = $conn->prepare($sql);
                                $stmt->execute([$ad, $soyad, $posta, $sifre, $id]);
                            } else {
                                $sql = "UPDATE üyeler SET ad=?, soyad=?, gmail=? WHERE id=?";
                                $stmt = $conn->prepare($sql);
                                $stmt->execute([$ad, $soyad, $posta, $id]);
                            }

                            header("Location: " . basename(__FILE__) . "?guncelle=ok");
                            exit;
                        }
                    } else {
                        // E-posta değişmemişse doğrudan güncelle
                        if (!empty(trim($_POST['yeni_sifre']))) {
                            $sifre = password_hash($_POST['yeni_sifre'], PASSWORD_BCRYPT);
                            $sql = "UPDATE üyeler SET ad=?, soyad=?, gmail=?, sifre=? WHERE id=?";
                            $stmt = $conn->prepare($sql);
                            $stmt->execute([$ad, $soyad, $posta, $sifre, $id]);
                        } else {
                            $sql = "UPDATE üyeler SET ad=?, soyad=?, gmail=? WHERE id=?";
                            $stmt = $conn->prepare($sql);
                            $stmt->execute([$ad, $soyad, $posta, $id]);
                        }

                        header("Location: " . basename(__FILE__) . "?guncelle=ok");
                        exit;
                    }
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
                        <form action="" method="POST">
                            <label>Ad</label>
                            <input name="ad" value="<?= htmlspecialchars($user['ad']) ?>" type="text" required>
                            <label>Soyad</label>
                            <input name="soyad" value="<?= htmlspecialchars($user['soyad']) ?>" type="text" required>
                            <input type="hidden" name="full_phone" id="fullPhone">
                            <label>E-Posta</label>
                            <input name="gmail" value="<?= htmlspecialchars($user['gmail']) ?>" type="text" required>
                            <label>Yeni Şifre</label>
                            <input name="yeni_sifre" type="password">
                            <button name="gonder" class="button">Güncelle</button>
                        </form>

                        <!-- Hesap Silme Butonu -->
                        <form action="" method="POST" onsubmit="return confirm('Hesabınızı silmek istediğinizden emin misiniz?');">
                            <button type="submit" name="hesabi_sil" class="button" style="background-color: red;">Hesabı Sil</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?php require_once 'footer.php'; ?>
