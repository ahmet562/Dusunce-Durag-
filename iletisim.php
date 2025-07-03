<?php require_once 'header.php';
date_default_timezone_set('Europe/Istanbul');
?>
<section class="breadcrumb-outer text-center bg-orange">
    <div class="container">
        <div class="breadcrumb-content">
            <h2>İletişim</h2>
        </div>
    </div>
</section>
<section class="contact">
    <div class="container">
        <div class="row">
            <div class="col-md-8">
                <div id="contact-form" class="contact-form">
                    <div id="contactform-error-msg"></div>
                    <form id="iletisimForm" method="post">
                        <div class="form-group">
                            <input type="text" name="adsoyad" class="form-control" placeholder="Ad Soyad" required>
                        </div>
                        <div class="form-group">
                            <input type="email" name="email" class="form-control" placeholder="Email" required>
                        </div>
                        <div class="form-group">
                            <textarea name="mesaj" class="form-control" placeholder="Mesajınız" required></textarea>
                        </div>
                        <button type="submit" id="mesajGonderBtn" class="btn btn-primary">Mesaj Gönder</button>
                    </form>
                    <div id="formSonuc" class="mt-3"></div>
                </div>
            </div>
        </div>
    </div>
</section>
<a id="back-to-top" href="#" class="btn btn-primary btn-lg back-to-top" role="button" title="" data-placement="left">
    <span class="fa fa-arrow-up"></span>
</a>
<?php require_once 'footer.php';?>
<script src="js/jquery-3.2.1.min.js"></script>
<script src="js/plugin.js"></script>
<script src="js/custom-nav.js"></script>
<script src="js/main.js"></script>
</body>
<script>
$(document).ready(function() {
  $('#iletisimForm').on('submit', function(e) {
    e.preventDefault();
    $.ajax({
      url: 'mesaj-gonder.php',
      type: 'POST',
      data: $(this).serialize(),
      success: function(cevap) {
        if (cevap.trim() === 'OK') {
          alert('Mesajınız başarıyla gönderildi.');
          $('#iletisimForm')[0].reset();
        } else {
          alert('Hata: ' + cevap);
        }
      },
      error: function() {
        alert('Mesaj gönderilirken bir hata oluştu.');
      }
    });
  });
});
</script>
</html>
