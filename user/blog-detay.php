<?php
ob_start();
require_once 'header.php';
$user = "";
if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $stmt = $conn->prepare('SELECT * FROM bloglar WHERE id=?');
    $stmt->execute([$id]);
    $user = $stmt->fetch();
}
?>
<div id="mt_banner" class="innerbanner">
    <div class="container-fluid">
    <div class="featured-image" style="background-image: url('../<?= substr($user[5], 3) ?>')"></div>

        <div class="banner-caption">
            <div class="banner_caption_text">
                <div class="post-category">
                    <ul>
                        <li class="cat-yellow">
                            <a class="white">
                                <?= $user[3]; ?>
                            </a>
                        </li>
                    </ul>
                </div>
                <h1><a>
                        <?= $user[1]; ?>
                    </a></h1>

            </div>
        </div>
    </div>
</div>
<section id="blog_main_sec" class="section-inner">
    <div class="container">
        <div class="blog-detail-main">
            <div class="post_body">
                <p>
                    <?= $user[2]; ?>
                </p>
            </div>
            <?php
            $stmt = $conn->prepare('SELECT * FROM hakkımda');
            $stmt->execute();
            $user = $stmt->fetch();
            ?>
            <div class="author_box">
                <div class="author_img">
                    <img src="../images/blog/author.jpg" alt="Author">
                </div>
                <div class="author_bio">
                    <h5>Ahmet</h5>
                    <p>
                        <?= $user[0]; ?>
                    </p>

                </div>
            </div>
        </div>
    </div>
</section>

<section id="mt_blog" class="light-bg pad-top-0">
    <div class="container">
        <div class="blog_post_sec blog_post_inner">
            <div class="row">
                <?php
                function kisalt($metin, $uzunluk = 100, $ek = '...')
                {
                    if (mb_strlen($metin) <= $uzunluk) {
                        return $metin;
                    } else {
                        return mb_substr($metin, 0, $uzunluk) . $ek;
                    }
                }
                $stmt = $conn->prepare("SELECT * FROM bloglar ORDER BY id DESC LIMIT 3");
                $stmt->execute();
                while ($row = $stmt->fetch()) { ?>
                    <div class="col-md-12 col-sm-12 mar-bottom-30">
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
                                            </a></li>

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
                            </div>
                        </div>
                    </div>
                <?php } ?>
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

    </div>
</div>

<?php require_once 'footer.php'; ?>
