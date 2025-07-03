<?php
require_once 'header.php';
$stmt = $conn->prepare('SELECT * FROM footer');
$stmt->execute();
$user = $stmt->fetch();
?>
<footer id="mt_footer" class="mt_footer_style1">
    <div class="container">
        <div class="mt_footer_col">
            <div class="row">
                <div class="col-md-3 col-sm-6 col-xs-12">
                    <a href="hakkimda.php"><h2>Ben Kimim ?</h2></a>
                    <p><?= $user[0] ?></p>
                </div>
                <div class="col-md-3 col-sm-6 col-xs-12">
                    <div class="mt_footer_list">
                        <h3>Hızlı Linkler</h3>
                        <ul class="footer-quick-links-4">
                            <li><a href="bloglar.php?tur=Gezi+Blogları"><i class="fa-solid fa-arrow-right-long"></i> Gezi Blogları</a></li>
                            <li><a href="bloglar.php?tur=Sağlık%2C+Beslenme"><i class="fa-solid fa-arrow-right-long"></i> Sağlık, Beslenme Blogları</a></li>
                            <li><a href="bloglar.php?tur=Fotoğrafçılık"><i class="fa-solid fa-arrow-right-long"></i>Fotoğrafçılık Blogları</a></li>
                            <li><a href="bloglar.php?tur=Yaratıcılık"><i class="fa-solid fa-arrow-right-long"></i> Yaratıcılık Blogları</a></li>
                            <li><a href="bloglar.php?tur=Dijital+Pazarlama%2C+Teknoloji%2C+Trendler"><i class="fa-solid fa-arrow-right-long"></i> Teknoloji Blogları</a></li>
                            <li><a href="bloglar.php?tur=Kişisel+Gelişim"><i class="fa-solid fa-arrow-right-long"></i> Kişisel Gelişim Blogları</a></li>
                        </ul>
                    </div>
                </div>
                <div class="col-md-3 col-sm-6 col-xs-12">
                    <div class="mt_footer_gallery">
                        <h3>Fotoğraf Galerisi</h3>
                        <div class="row">
                            <div class="col-sm-4 col-xs-6"><a href="#"><img src="../images/insta/insta_01.jpg" alt="Image"></a></div>
                            <div class="col-sm-4 col-xs-6"><a href="#"><img src="../images/insta/insta_02.jpg" alt="Image"></a></div>
                            <div class="col-sm-4 col-xs-6"><a href="#"><img src="../images/insta/insta_03.jpg" alt="Image"></a></div>
                            <div class="col-sm-4 col-xs-6"><a href="#"><img src="../images/insta/insta_04.jpg" alt="Image"></a></div>
                            <div class="col-sm-4 col-xs-6"><a href="#"><img src="../images/insta/insta_05.jpg" alt="Image"></a></div>
                            <div class="col-sm-4 col-xs-6"><a href="#"><img src="../images/insta/insta_06.jpg" alt="Image"></a></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</footer>
<a id="back-to-top" href="#" class="btn btn-primary btn-lg back-to-top" role="button" title="" data-placement="left">
    <span class="fa fa-arrow-up"></span>
</a>
<script src="../js/jquery-3.2.1.min.js"></script>
<script src="../js/plugin.js"></script>
<script src="../js/custom-nav.js"></script>
<script src="../js/main.js"></script>
</body>
</html>
