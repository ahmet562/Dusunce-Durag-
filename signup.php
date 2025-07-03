<?php
session_start();
date_default_timezone_set('Europe/Istanbul');
require_once 'conn.php';

$mesaj = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Kayıt işlemi
    if (isset($_POST['form_tipi']) && $_POST['form_tipi'] === 'kayit') {
        $ad = trim($_POST['ad']);
        $soyad = trim($_POST['soyad']);
        $email = trim($_POST['gmail']);
        $sifre = password_hash($_POST['sifre'], PASSWORD_DEFAULT);

        try {
            $kontrol = $conn->prepare("SELECT COUNT(*) FROM üyeler WHERE gmail = :email");
            $kontrol->execute(['email' => $email]);
            $say = $kontrol->fetchColumn();

            if ($say > 0) {
                $mesaj = "❗ Bu e-posta adresiyle zaten bir hesap var!";
            } else {
                $tarih = date('Y-m-d H:i:s');
                $stmt = $conn->prepare("INSERT INTO üyeler (ad, soyad, gmail, sifre, tarih) VALUES (:ad, :soyad, :gmail, :sifre, :tarih)");
                $stmt->execute([
                    'ad' => $ad,
                    'soyad' => $soyad,
                    'gmail' => $email,
                    'sifre' => $sifre,
                    'tarih' => $tarih,
                ]);
                $mesaj = "✅ Kayıt başarılı! Giriş yapabilirsiniz.";
            }
        } catch (PDOException $e) {
            $mesaj = "⚠️ Hata: " . $e->getMessage();
        }
    }

    // Giriş işlemi
    if (isset($_POST['login_ad']) && isset($_POST['login_sifre'])) {
        $email = $_POST['login_ad'];
        $sifre = $_POST['login_sifre'];

        try {
            // Admin kontrolü
            $adminQuery = $conn->prepare("SELECT * FROM admins WHERE email = :email");
            $adminQuery->execute([':email' => $email]);
            $admin = $adminQuery->fetch(PDO::FETCH_ASSOC);

            if ($admin && password_verify($sifre, $admin['sifre'])) {
                $_SESSION['admin_id'] = $admin['id'];
                $_SESSION['admin_ad'] = $admin['ad'];
                $_SESSION['giris_basarili'] = true;
                header("Location: admin");
                exit;
            }

            // Normal kullanıcı kontrolü
            $stmt = $conn->prepare("SELECT * FROM üyeler WHERE gmail = :email");
            $stmt->execute([':email' => $email]);
            $kullanici = $stmt->fetch(PDO::FETCH_ASSOC);

            if ($kullanici && password_verify($sifre, $kullanici['sifre'])) {
                $_SESSION['kullanici_id'] = $kullanici['id'];
                $_SESSION['kullanici_ad'] = $kullanici['ad'];
                $_SESSION['kullanici_soyad'] = $kullanici['soyad'];
                $_SESSION['kullanici_gmail'] = $kullanici['gmail'];
                $_SESSION['giris_basarili'] = true;
                header("Location: user");
                exit;
            } else {
                $mesaj = "❌ Kullanıcı bulunamadı veya şifre yanlış.";
            }
        } catch (PDOException $e) {
            $mesaj = "⚠️ Hata: " . $e->getMessage();
        }
    }
}
?>
<!DOCTYPE html>
<html lang="tr">
<head>
    <meta charset="UTF-8">
    <title>Giriş Sayfası</title>
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <link rel="stylesheet" href="css/login.css">
    <link rel="shortcut icon" type="image/x-icon" href="images/favicon.png">
</head>
<body>
<div class="site-blocks-cover overlay">
    <div class="container">

        <!-- Mesaj Kutusu -->
        <?php if (!empty($mesaj)): ?>
            <div class="form-mesaj" style="padding:10px; margin-bottom:15px; background:#f0f0f0; border:1px solid #ccc; border-left:5px solid #007bff;">
                <?= $mesaj ?>
            </div>
        <?php endif; ?>

        <!-- Giriş Formu -->
        <div class="form-box login">
            <form method="post">
                <h1>Giriş Yap</h1>
                <div class="input-box">
                    <input type="text" name="login_ad" placeholder="Kullanıcı Adı" required>
                    <i class='bx bxs-user'></i>
                </div>
                <div class="input-box">
                    <input type="password" name="login_sifre" placeholder="Şifre" required>
                    <i class='bx bxs-lock-alt'></i>
                </div>
                <button type="submit" class="btn">Giriş Yap</button>
            </form>
        </div>

        <!-- Kayıt Formu -->
        <div class="form-box register">
            <form method="post">
                <input type="hidden" name="form_tipi" value="kayit">
                <h1>Kayıt Ol</h1>
                <div class="input-box">
                    <input type="text" name="ad" placeholder="Kullanıcı Adı" required>
                    <i class='bx bxs-user'></i>
                </div>
                <div class="input-box">
                    <input type="text" name="soyad" placeholder="Kullanıcı Soyadı" required>
                    <i class='bx bxs-user'></i>
                </div>
                <div class="input-box">
                    <input type="email" name="gmail" placeholder="Email" required>
                    <i class='bx bxs-envelope'></i>
                </div>
                <div class="input-box">
                    <input type="password" name="sifre" placeholder="Şifre" required>
                    <i class='bx bxs-lock-alt'></i>
                </div>
                <button type="submit" class="btn">Kayıt Ol</button>
            </form>
        </div>

        <!-- Geçiş Paneli -->
        <div class="toggle-box">
            <div class="toggle-panel toggle-left">
                <h1>Merhaba, Hoşgeldiniz!</h1>
                <p>Hesabınız yok mu?</p>
                <button class="btn register-btn">Kayıt Olun</button>
            </div>
            <div class="toggle-panel toggle-right">
                <h1>Tekrar Hoşgeldiniz!</h1>
                <p>Hesabınız var mı?</p>
                <button class="btn login-btn">Giriş Yapın</button>
            </div>
        </div>

    </div>
</div>
<script src="js/script.js"></script>
</body>
</html>
