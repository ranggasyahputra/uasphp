<?php
include "koneksi.php";
?>
<?php include("./template/head.php"); ?>
<?php include("./template/navbar.php"); ?>
<br><br>
<div class="container-xl">
    <div class="content d-flex flex-column">
        <h2 class="d-flex justify-content-center mb-5">Halaman Depan ~ Lima Berita Terbaru</h2>
        <div class="d-flex align-items-center flex-column">
            <?php
            $query = "SELECT berita.id_berita, kategori.nm_kategori, berita.judul, 
                         berita.headline, berita.pengirim, berita.tanggal
                  FROM berita 
                  INNER JOIN kategori ON berita.id_kategori = kategori.id_kategori
                  ORDER BY berita.id_berita DESC 
                  LIMIT 0, 5";

            $sql = mysqli_query($conn, $query);
            if (!$sql) {
                die("Query failed: " . mysqli_error($conn));
            }

            while ($hasil = mysqli_fetch_array($sql)) {
                $id_berita = $hasil['id_berita'];
                $kategori = stripslashes($hasil['nm_kategori']);
                $judul = stripslashes($hasil['judul']);
                $headline = nl2br(stripslashes($hasil['headline']));
                $pengirim = stripslashes($hasil['pengirim']);
                $tanggal = stripslashes($hasil['tanggal']);

                // Tampilkan berita
            
                echo '<div class="card mb-5" style="width: 40rem;">';
                echo '<div class="card-body">';
                echo "<h4 class='card-title'>$judul</h4>";
                echo "<h5 class='card-title text-primary'>$headline</h5>";
                echo "<p class='card-text'><small>Berita dikirimkan oleh <b>$pengirim</b> 
                        pada tanggal <b>$tanggal</b> dalam kategori 
                        <b>$kategori</b></small></p>";
                echo "<a href='berita_lengkap.php?id=$id_berita' class='btn btn-primary'>Selengkapnya>></a>";
                echo '</div>';
                echo '</div>';

            }
            ?>
        </div>
    </div>
</div>

<?php include("/.");