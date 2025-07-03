<?php require_once 'header.php';
$stmt = $conn->prepare('SELECT * FROM hakkımda');
$stmt->execute();
$user = $stmt->fetch();
?>
<section class="about-us">
    <div class="container">
        <div class="about-main">
            <div class="about-image">
                <img src="../images/img-about.jpg" alt="about">
            </div>
            <div class="about-main-content mar-top-30">
                <div class="row">
                    <div class="col-md-4 col-sm-12">
                        <div class="about-content">
                            <h4>Ben Kimim?</h4>
                            <p>
                                <?= $user[0]; ?>
                            </p>
                        </div>
                    </div>
                    <div class="col-md-4 col-sm-12">
                        <div class="about-content">
                            <h4>Hangi Ülkelere Gittim?</h4>
                            <p>
                                <?= $user[1]; ?>
                            </p>
                        </div>
                    </div>
                    <div class="col-md-4 col-sm-12">
                        <div class="about-content">
                            <h4>En Beğendiğim Yer</h4>
                            <p>
                                <?= $user[2]; ?>.
                            </p>
                        </div>
                    </div>
                </div>
            </div>
            <blockquote class="mar-top-30">
                <p>
                    <?= $user[3]; ?>
                </p>
                <span>
                    <?= $user[4]; ?>
                </span>
            </blockquote>
        </div>
    </div>
</section>
<div class="mt_instagram">
    <div class="container">
        <div class="row">
            <div class="col-sm-2 col-xs-6"><a><img src="../images/insta/insta_01.jpg" alt="Image"></a></div>
            <div class="col-sm-2 col-xs-6"><a><img src="../images/insta/insta_02.jpg" alt="Image"></a></div>
            <div class="col-sm-2 col-xs-6"><a><img src="../images/insta/insta_03.jpg" alt="Image"></a></div>
            <div class="col-sm-2 col-xs-6"><a><img src="../images/insta/insta_04.jpg" alt="Image"></a></div>
            <div class="col-sm-2 col-xs-6"><a><img src="../images/insta/insta_05.jpg" alt="Image"></a></div>
            <div class="col-sm-2 col-xs-6"><a><img src="../images/insta/insta_06.jpg" alt="Image"></a></div>
            <div class="col-sm-2 col-xs-6"><a><img src="../images/insta/insta_07.jpg" alt="Image"></a></div>
            <div class="col-sm-2 col-xs-6"><a><img src="../images/insta/insta_08.jpg" alt="Image"></a></div>
            <div class="col-sm-2 col-xs-6"><a><img src="../images/insta/insta_09.jpg" alt="Image"></a></div>
            <div class="col-sm-2 col-xs-6"><a><img src="../images/insta/insta_10.jpg" alt="Image"></a></div>
            <div class="col-sm-2 col-xs-6"><a><img src="../images/insta/insta_11.jpg" alt="Image"></a></div>
            <div class="col-sm-2 col-xs-6"><a><img src="../images/insta/insta_12.jpg" alt="Image"></a></div>
        </div>
        <div class="sectio-title">
            <h3 class="mar-0"><a href="https://www.instagram.com/<?= $user[5] ?>/">Takip @ Instagram</a></h3>
        </div>
    </div>
</div>

<?php require_once 'footer.php'; ?>
