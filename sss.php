<?php require_once 'header.php'; ?>

<!-- Breadcrumb -->
<section class="breadcrumb-outer text-center bg-orange">
    <div class="container">
        <div class="breadcrumb-content">
            <h2>Sık Sorulan Sorular</h2>
        </div>
    </div>
</section>
<!-- BreadCrumb Ends -->

<!--* faq Section*=-->
<section id="mt_faq" class="">
    <div class="container">
        <div class="faq-detail">
            <div class="accrodion-grp faq-accrodion" data-grp-name="faq-accrodion">

                <?php
                $stmt = $conn->prepare("SELECT * FROM sss");
                $stmt->execute();
                while ($row = $stmt->fetch()) { ?>
                    <div class="accrodion">
                        <div class="accrodion-title">
                            <h4>
                                <?= $row[1]; ?>
                            </h4>
                        </div>
                        <div class="accrodion-content" style="display: block;">
                            <div class="inner">
                                <p>
                                    <?= $row[2]; ?>
                                </p>
                            </div><!-- /.inner -->
                        </div>
                    </div>

                <?php }
                ?>




            </div>
        </div>
    </div>
</section>
<!--* End faq Section*=-->

<!-- back to top -->
<a id="back-to-top" href="#" class="btn btn-primary btn-lg back-to-top" role="button" title="" data-placement="left">
    <span class="fa fa-arrow-up"></span>
</a>

<?php require_once 'footer.php'; ?>
