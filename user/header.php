<?php
session_start();
require_once'../conn.php';
header("Cache-Control: no-store, no-cache, must-revalidate, max-age=0");
header("Cache-Control: post-check=0, pre-check=0", false);
header("Pragma: no-cache");

if (!isset($_SESSION['kullanici_id'])) {
    header("Location: ../signup.php");
    exit();
}
?>
<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml" lang="tr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="keywords" content="Blog, Gezi">
    <title>Düşünce Durağı</title>
    <link rel="shortcut icon" type="image/x-icon" href="../images/favicon.png">
    <link href="../css/bootstrap.min.css" rel="stylesheet" type="text/css">
    <link href="../css/dashboard.css" rel="stylesheet" type="text/css">
    <link href="../css/default.css" rel="stylesheet" type="text/css">
    <link href="../css/style.css" rel="stylesheet" type="text/css">
    <link href="../css/plugin.css" rel="stylesheet" type="text/css">
    <link href="../css/font-awesome.css" rel="stylesheet" type="text/css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css"
        integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    </head>
<body class="home-default">


    <div id="preloader">
        <div id="status"></div>
    </div>
    <header id="inner-navigation">
        <?php
        function LinkDuzelt($url)
        {
            $url = mb_strtolower($url, 'UTF-8');
            $trKarakterler = array('ç', 'ğ', 'ı', 'i', 'ö', 'ş', 'ü');
            $enKarakterler = array('c', 'g', 'i', 'i', 'o', 's', 'u');
            $url = str_replace($trKarakterler, $enKarakterler, $url);
            $url = str_replace(" ", "", $url);
            return $url;
        }
        ?>
        <nav class="navbar navbar-default navbar-fixed-top navbar-sticky-function navbar-arrow">
            <div class="container">
                <div class="logo pull-left">
                    <h1><a href="index.php"><img src="../images/Logo.png.png"></a></h1>
                </div>
                <div id="navbar" class="navbar-nav-wrapper text-center">
                    <ul class="nav navbar-nav navbar-right" id="responsive-menu">
                        <li class="active"><a href="index.php">Ana Sayfa</a>
                        </li>
                        <li><a href="bloglar.php">Blog Yazıları <i class="fa fa-angle-down"></i></a>
                            <ul>
                                <?php
                                $stmt = $conn->prepare("SELECT * FROM kategoriler");
                                $stmt->execute();
                                while ($row = $stmt->fetch()) { ?>
                                    <li><a href="bloglar.php?tur=<?= urlencode($row[1]) ?>">
                                            <?= htmlspecialchars($row[1]) ?>
                                        </a></li>
                                <?php }
                                ?>
                            </ul>
                        </li>
                        <li><a href="bloglarım.php">Bloglarım</a></li>
                        <li><a href="profilim.php">Profilim</a></li>
                        <li><a href="iletisim.php">Bizimle İletişime Geç</a></li>
                        <li><a href="../logout.php"><i class="sl sl-icon-user"></i>Çıkış Yap</a></li>
                    </ul>
                </div>
            </div>
            <div id="slicknav-mobile"></div>
        </nav>
    </header>
