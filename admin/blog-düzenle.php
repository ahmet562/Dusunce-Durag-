<?php require_once 'header.php';
function kisalt($metin, $uzunluk = 100, $ek = '...')
{
    if (mb_strlen($metin) <= $uzunluk) {
        return $metin;
    } else {
        return mb_substr($metin, 0, $uzunluk) . $ek;
    }
}
?>
<div class="dashboard-content">
    <style>
        button a {
            color: #fff;
        }
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f0f0f0;
        }
        .blog-list {
            max-width: 800px;
            margin: 0 auto;
            padding: 20px;
        }
        .blog-item {
            display: flex;
            border: 1px solid #ddd;
            margin-bottom: 20px;
            background-color: #fff;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
        }
        .blog-image {
            flex: 1;
        }
        .blog-image img {
            width: 100%;
            height: 100%;
        }
        .blog-content {
            flex: 3;
            padding: 20px;
        }
        .blog-content h2 {
            margin: 0;
            font-size: 24px;
        }
        .blog-content p {
            margin-top: 10px;
            font-size: 16px;
        }
        .actions {
            margin-top: 20px;
        }
        .delete-btn,
        .edit-btn {
            padding: 5px 10px;
            border: none;
            background-color: #f44336;
            color: white;
            font-size: 14px;
            cursor: pointer;
            margin-right: 10px;
        }
        .edit-btn {
            background-color: #4caf50;
        }
    </style>
    <div class="row">
        <div class="col-lg-12 col-md-12">
            <div class="dashboard-list-box">
                <h4 class="gray">Blogları Düzenle</h4>
                <div class="blog-list">
                    <?php
                    $stmt = $conn->prepare("SELECT * FROM bloglar");
                    $stmt->execute();
                    while ($row = $stmt->fetch()) {
                        ?>
                        <div class="blog-item">
                            <div class="blog-image">
                                <img src="<?= $row[5]; ?>" alt="Blog Resmi">
                            </div>
                            <div class="blog-content">
                                <span class="date">
                                    <?= $row[4] ?>
                                </span>
                                <h2>
                                    <?= $row[1] ?>
                                </h2>
                                <p>
                                    <?php echo kisalt($row[2], 150, '...') ?>
                                </p>
                                <div class="actions">
                                    <button class="delete-btn">
                                        <a href="sil.php?blogid=<?= $row[0] ?>">Sil</a>
                                    </button>

                                    <button class="edit-btn"><a
                                            href="düzenle-blog.php?blogid=<?= $row[0] ?>">Düzenle</a></button>
                                </div>
                            </div>
                        </div>

                        <?php
                    }
                    ?>
                </div>
            </div>
        </div>
    </div>
</div>
<?php require_once 'footer.php'; ?>
