<?php
include "koneksi.php";
//proses input berita
if (isset($_POST['Input'])) {
    $judul = addslashes(strip_tags($_POST['judul']));
    $kategori = $_POST['kategori'];
    $headline = addslashes(strip_tags($_POST['headline']));
    $isi_berita = addslashes(strip_tags($_POST['isi']));
    $pengirim = addslashes(strip_tags($_POST['pengirim']));
    
    //insert ke tabel
    $query = "INSERT INTO berita (id_berita, id_kategori, judul, headline, isi, pengirim, tanggal)
              VALUES ('','$kategori','$judul','$headline','$isi_berita','$pengirim', now())";
    $sql = mysqli_query($conn, $query);
    
    if ($sql) {
        echo '<div class="toast align-items-center text-bg-success border-0 fade show position-fixed bottom-0 end-0 m-3" role="alert" aria-live="assertive" aria-atomic="true">
                <div class="d-flex align-items-center">
                    <i class="bi bi-check-all fs-5 px-2 ps-2"></i>
                    <div class="toast-body ps-3">Berita telah berhasil ditambahkan</div>
                    <button type="button" class="btn-close btn-close-white me-2 m-auto" data-bs-dismiss="toast" aria-label="Close"></button>
                </div>
              </div>';
    } else {
        echo '<div class="toast align-items-center text-bg-danger border-0 fade show position-fixed bottom-0 end-0 m-3" role="alert" aria-live="assertive" aria-atomic="true">
                <div class="d-flex align-items-center">
                    <i class="bi bi-exclamation-triangle-fill fs-5 px-2 ps-2"></i>
                    <div class="toast-body ps-3">Berita gagal ditambahkan</div>
                    <button type="button" class="btn-close btn-close-white me-2 m-auto" data-bs-dismiss="toast" aria-label="Close"></button>
                </div>
              </div>';
    }
}
?>
<?php include("./template/head.php"); ?>
<?php include("./template/navbar.php"); ?>
<br><br>
<div class="container-xl">
    <form action="" method="POST" name="input" class="d-flex flex-column gap-4">
        <div class="form-group">
            <label for="judul">Judul Berita</label>
            <input type="text" class="form-control" id="judul" name="judul" required>
        </div>
        <div class="form-group">
            <label for="kategori">Kategori</label>
            <select class="form-control" id="kategori" name="kategori" required>
                <option value="">Pilih Kategori</option>
                <?php
                $query = "SELECT id_kategori, nm_kategori FROM kategori ORDER BY nm_kategori";
                $sql = mysqli_query($conn, $query);
                while ($hasil = mysqli_fetch_array($sql)) {
                    echo "<option value='$hasil[id_kategori]'>$hasil[nm_kategori]</option>";
                }
                ?>
            </select>
        </div>
        <div class="form-group">
            <label for="headline">Headline Berita</label>
            <input type="text" class="form-control" id="headline" name="headline" required>
        </div>
        <div class="form-group">
            <label for="isi">Isi Berita</label>
            <textarea class="form-control" id="isi" name="isi" rows="10" required></textarea>
        </div>
        <div class="form-group">
            <label for="pengirim">Pengirim</label>
            <input type="text" class="form-control" id="pengirim" name="pengirim" required>
        </div>
        <div class="form-group">
            <button type="submit" name="Input" class="btn btn-primary" id="liveToastBtn">Input Berita</button>
            <button type="reset" class="btn btn-secondary">Cancel</button>
        </div>
    </form>
</div>
<?php include("./template/footer.php"); ?>