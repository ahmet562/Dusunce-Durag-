<?php require_once 'header.php';
?>
<div class="dashboard-content">

    <div class="row">

        <!-- Listings -->
        <div class="col-lg-12 col-md-12">
            <div class="dashboard-list-box">
                <h4 class="gray">Mevcut Üyeler</h4>
                <div class="table-box">
                    <table class="basic-table booking-table">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>AD</th>
                                <th>SOYAD</th>
                                <th>EMAİL</th>
                                <th>ŞİFRE</th>
                                <th>TARİH</th>
                                <th class="textright">ÜYE İLE İLGİLİ İŞLEMLER</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $stmt = $conn->prepare("SELECT * FROM üyeler");
                            $stmt->execute();
                            while ($row = $stmt->fetch()) {
                                echo "<tr>";
                                echo "<td>" . $row[0] . "</td>";
                                echo "<td>" . $row[1] . "</td>";
                                echo "<td>" . $row[2] . "</td>";
                                echo "<td>" . $row[3] . "</td>";
                                echo "<td>********</td>";
                                echo "<td>" . $row[5] . "</td>";
                                echo "<td style=\"display:flex; justify-content:center; \">
                                 <a class=\"btn btn-danger\" href=\"sil.php?uyeid=$row[0]\">SİL</a>
                                 <a style=\"margin: 0px 5px;\" class=\"btn btn-success\" href=\"uyeguncelle.php?uyeid=$row[0]\">GÜNCELLE</a>
                                  </td>";
                                echo "</tr>";
                            }
                            ?>

                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>


<?php require_once 'footer.php'; ?>
