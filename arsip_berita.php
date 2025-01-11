<?php
include "koneksi.php";

if (isset($_GET['message']) && $_GET['message'] == 'deleted') {
    echo '<div class="toast align-items-center text-bg-success border-0 fade show position-fixed bottom-0 end-0 m-3" role="alert" aria-live="assertive" aria-atomic="true">
            <div class="d-flex align-items-center">
                <i class="bi bi-check-all fs-5 px-2 ps-2"></i>
                <div class="toast-body ps-3">Berita telah berhasil dihapus</div>
                <button type="button" class="btn-close btn-close-white me-2 m-auto" data-bs-dismiss="toast" aria-label="Close"></button>
            </div>
          </div>';
}
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
              ORDER BY berita.id_berita DESC ";
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
                echo    '<div class="card-body">';
                echo        "<h4 class='card-title'>$judul</h4>";
                echo        "<h5 class='card-title text-primary'>$headline</h5>";
                echo        "<p class='card-text'><small>Berita dikirimkan oleh <b>$pengirim</b> 
                            pada tanggal <b>$tanggal</b> dalam kategori 
                            <b>$kategori</b></small></p>";
                echo        "<a href='berita_lengkap.php?id=$id_berita' class='btn btn-primary'>Selengkapnya>></a>";
                echo        "<a href='edit_berita.php?id=$id_berita' class='ms-3'><i class='bi bi-pencil-square me-1'></i>Edit</a>";
                echo        "<a href='delete_berita.php?id=$id_berita' class='ms-3 text-danger'><i class='bi bi-trash3'></i>Hapus</a>";
                echo    '</div>';
                echo '</div>';
            }
            ?>
        </div>
    </div>
</div>


<?php include("./template/footer.php"); ?>