<?php require_once 'header.php'; ?>

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
                <?php
                $kategori = isset($_GET['tur']) ? $_GET['tur'] : null;

                // Eğer kategori varsa, o kategoriye ait blogları filtrele
                if ($kategori) {
                    $stmt = $conn->prepare("SELECT * FROM bloglar WHERE kategori = ? ORDER BY id DESC");
                    $stmt->execute([$kategori]);
                    echo '<h2 style="text-align: center;">' . htmlspecialchars($kategori) . ' Kategorisindeki Bloglar</h2>';
                } else {
                    // Eğer kategori yoksa, tüm blogları göster
                    $stmt = $conn->prepare("SELECT * FROM bloglar ORDER BY id DESC");
                    $stmt->execute();
                    echo '<h2 style="text-align: center;">Tüm Bloglar</h2>';
                }

                // Blogları listeleme fonksiyonu
                function kisalt($metin, $uzunluk = 100, $ek = '...')
                {
                    if (mb_strlen($metin) <= $uzunluk) {
                        return $metin;
                    } else {
                        return mb_substr($metin, 0, $uzunluk) . $ek;
                    }
                }

                // Blogları ekrana yazdırma
                while ($row = $stmt->fetch()) { ?>
                    <div class="col-md-4 col-sm-12 mar-bottom-30">
                        <div class="blog-post_wrapper image-wrapper">
                            <div class="blog-post-image">
                                <img src="<?= substr($row[5], 3) ?>" alt="image" class="img-responsive center-block post_img" />
                            </div>
                            <div class="post-content">
                                <div class="post-category">
                                    <ul>
                                        <li class="cat-yellow">
                                            <a class="white">
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
            </div>
        </div>
    </div>
</section>

<?php require_once 'footer.php'; ?>
