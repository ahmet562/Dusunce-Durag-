<?php
session_start();
require_once'../conn.php';
// Önbelleği devre dışı bırak
header("Cache-Control: no-store, no-cache, must-revalidate, max-age=0");
header("Cache-Control: post-check=0, pre-check=0", false);
header("Pragma: no-cache");

if (!isset($_SESSION['admin_id'])) {
    header("Location: ../signup.php");
    exit();
}
?>
<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml" lang="zxx">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description"
        content="Suchana is an online blog, news & magazine dedicated to different categories html template">
    <title>Düşünce Durağı | Admin</title>
    <link rel="shortcut icon" type="image/x-icon" href="../images/favicon.png">
    <link href="../css/bootstrap.min.css" rel="stylesheet" type="text/css">
    <link href="../css/default.css" rel="stylesheet" type="text/css">
    <link href="../css/style.css" rel="stylesheet" type="text/css">
    <link href="../font/flaticon.php" rel="stylesheet" type="text/css">
    <link href="../css/plugin.css" rel="stylesheet" type="text/css">
    <link href="../css/dashboard.css" rel="stylesheet" type="text/css">
    <link href="../css/icons.css" rel="stylesheet" type="text/css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css"
        integrity="sha512-KfkfwYDsLkIlwQp6LFnl8zNdLGxu9YAA1QvwINks4PhcElQSvqcyVLLD9aMhXd13uQjoXtEKNosOWaZqXgel0g=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet"
        href="../../../../cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/css/all.min.css" rel="stylesheet">
</head>
<body>
    <div id="preloader">
        <div id="status"></div>
    </div>
    <div id="container-wrapper">
        <div id="dashboard">
            <a href="#" class="dashboard-responsive-nav-trigger"><i class="fa fa-reorder"></i>Menü</a>
            <div class="dashboard-sticky-nav">
                <div class="content-left pull-left">
                    <a href="index.php"><img src="../images/Logo.png.png" alt="logo"></a>
                </div>
                <div class="content-right pull-right">
                    <div class="search-bar">
                        <form>
                            <div class="form-group">
                                <input type="text" class="form-control" id="search" placeholder="Search Now">
                                <a href="#"><span class="search_btn"><i class="fa fa-search"
                                            aria-hidden="true"></i></span></a>
                            </div>
                        </form>
                    </div>
                    <div class="dropdown">
                        <a class="dropdown-toggle" data-toggle="dropdown">
                            <div class="profile-sec">
                                <div class="dash-image">
                                    <img src="../images/comment.jpg" alt="">
                                </div>
                                <div class="dash-content">
                                    <h4>Ahmet</h4>
                                    <span>Admin</span>
                                </div>
                            </div>
                        </a>
                        <ul class="dropdown-menu">
                            <li><a href="#"><i class="sl sl-icon-power"></i>Çıkış Yap</a></li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="dashboard-nav">
                <div class="dashboard-nav-inner">
                    <ul>
                        <li class="active"><a href="index.php"><i class="sl sl-icon-settings"></i>Kontrol Paneli</a></li>
                        <li>
                            <a><i class="sl sl-icon-settings"></i>Ayarlar</a>
                            <ul>
                                <li><a href="ayarlar.php"><i class="sl sl-icon-settings"></i>Site Ayarları</a></li>
                                <li><a href="bakım.php"><i class="sl sl-icon-settings"></i>Bakımda Ayarları</a></li>
                                <li><a href="bulunamadı.php"><i class="sl sl-icon-settings"></i>Bulunamadı Ayarları</a></li>
                                <li><a href="footer-ayarları.php"><i class="sl sl-icon-settings"></i>Footer Ayarları</a></li>
                                <li><a href="hakkımda-ayarları.php"><i class="sl sl-icon-settings"></i>Hakkımda Ayarları</a></li>
                                <li><a href="sss.php"><i class="sl sl-icon-settings"></i>Sık Sorulan Sorular Ayarları</a></li>
                            </ul>
                        </li>

                        <li>
                            <a><i class="sl sl-icon-layers"></i>Blog & Kategori İşlemleri</a>
                            <ul>
                                <li><a href="blog-ekle.php">Blog Ekle</a></li>

                                <li><a href="blog-düzenle.php">Blog Düzenle</a></li>

                                <li><a href="kat-düzenle.php">Kategori Düzenle</a></li>

                            </ul>
                        </li>
                        <?php
                        $stmtUnread = $conn->prepare("SELECT COUNT(*) as okunmamis FROM mesajlar WHERE okundu = 0");
                        $stmtUnread->execute();
                        $unread = $stmtUnread->fetch(PDO::FETCH_ASSOC)['okunmamis'];
                        ?>
                        <li>
                            <a href="mesaj.php">
                                <i class="sl sl-icon-envelope-open"></i> Mesajlar
                                <?php if ($unread > 0): ?>
                                    <span style="background-color: red; color: white; padding: 2px 8px; border-radius: 12px; font-size: 12px; margin-left: 5px;">
                                        <?= $unread > 99 ? "99+" : $unread ?>
                                    </span>
                                <?php endif; ?>
                            </a>
                        </li>
                        <li>
                            <a><i class="sl sl-icon-layers"></i>Slider İşlemleri</a>
                            <ul>
                                <li><a href="slider.php">Slider Ekle</a></li>

                                <li><a href="slider-düzenle.php">Slider Düzenle</a></li>
                            </ul>
                        </li>
                        <li><a href="profilim.php"><i class="sl sl-icon-user"></i>profilim</a></li>
                        <li><a href="üyeler.php"><i class="sl sl-icon-user"></i>Üyeler</a></li>
                        <li><a href="log-listele.php"><i class="sl sl-icon-settings"></i>Tüm Logları Görüntüle</a></li>
                        <li><a href="../logout.php"><i class="sl sl-icon-user"></i>Çıkış Yap</a></li>
                    </ul>
                </div>
            </div>
