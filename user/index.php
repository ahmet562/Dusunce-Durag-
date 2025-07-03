<?php require_once 'header.php';
$stmt = $conn->prepare('SELECT * FROM footer');
$stmt->execute();
$user = $stmt->fetch();
?>
<section id="mt_banner">
    <div class="swiper-container">
        <div class="swiper-wrapper">
            <?php
            $stmt = $conn->prepare("SELECT * FROM slider");
            $stmt->execute();
            while ($row = $stmt->fetch()) { ?>
                <div class="swiper-slide">
                    <div class="slide-inner" style="background-image:url(../<?= substr($row[4], 3) ?>)"></div>
                    <div class="banner_caption_text">
                        <div class="post-category">
                            <ul>
                                <li class="cat-blue"><a class="white">
                                        <?= $row[1]; ?>
                                    </a>
                                </li>
                            </ul>
                        </div>
                        <h1><a>
                                <?= $row[3] ?>
                            </a></h1>
                        <div class="item-meta">
                            <span></span>
                            <a>
                                <?= $row[2] ?>
                            </a></a>
                        </div>
                    </div>
                </div>
            <?php }
            ?>
        </div>
        <div class="swiper-button-next swiper-button-white"></div>
        <div class="swiper-button-prev swiper-button-white"></div>
    </div>
</section>
<style>
    .blog-post-image {
        width: 100%;
        height: 100%;
    }

    .blog-post-image img {
        width: 100%;
        height: 100%;
    }
</style>
<section id="mt_blog" class="light-bg">
    <div class="container">
        <div class="blog_post_sec blog_post_inner">
            <div class="row">
                <h2 style="text-align: center;">Son 4 Blog</h2>
                <?php
                function kisalt($metin, $uzunluk = 100, $ek = '...')
                {
                    if (mb_strlen($metin) <= $uzunluk) {
                        return $metin;
                    } else {
                        return mb_substr($metin, 0, $uzunluk) . $ek;
                    }
                }
                $stmt = $conn->prepare("SELECT * FROM bloglar ORDER BY id DESC LIMIT 4");
                $stmt->execute();
                while ($row = $stmt->fetch()) { ?>
                    <div class="col-md-6 col-sm-12 mar-bottom-30">
                        <div class="blog-post_wrapper image-wrapper">
                            <div class="blog-post-image">
                                <img src="../<?= substr($row[5], 3) ?>" alt="image"
                                    class="img-responsive center-block post_img" />
                            </div>
                            <div class="post-content">
                                <div class="post-category">
                                    <ul>
                                        <li class="cat-yellow"><a class="white">
                                                <?= $row[3] ?>
                                            </a>
                                        </li>
                                    </ul>
                                </div>
                                <div class="post-date">
                                    <p><a>
                                            <?= $row[4] ?>
                                        </a></p>
                                </div>
                                <h2 class="entry-title">
                                    <a href="blog-detay.php?id=<?= $row[0]; ?>" class="white">
                                        <?= $row[1] ?>
                                    </a>
                                </h2>
                                <div class="item-meta white">
                                    <span></span>
                                    <a class="author-name white">
                                        <?= kisalt($row[2], 30, '...') ?>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php }
                ?>
                <div class="col-xs-12">
                    <div class="blog-button text-center">
                        <button class="btn-blog"><a href="bloglar.php">Tüm Blogları Gör</a><i
                                class="fa fa-angle-double-right"></i></button>
                    </div>
                </div>
            </div>
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
            <h3 class="mar-0"><a href="https://www.instagram.com/<?= $user[3] ?>/">Takip @ Instagram</a></h3>
        </div>
    </div>
</div>
<?php require_once 'footer.php'; ?>
