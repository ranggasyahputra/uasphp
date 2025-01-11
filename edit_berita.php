<?php
include "koneksi.php";

// Check if the id_berita is set in the URL
if (isset($_GET['id'])) {
    $id_berita = $_GET['id'];

    // Fetch the existing article data
    $query = "SELECT * FROM berita WHERE id_berita = '$id_berita'";
    $result = mysqli_query($conn, $query);
    $article = mysqli_fetch_assoc($result);

    // Check if the article exists
    if (!$article) {
        echo "Berita tidak ditemukan.";
        exit;
    }
}

// Process the form submission
if (isset($_POST['Update'])) {
    $judul = addslashes(strip_tags($_POST['judul']));
    $kategori = $_POST['kategori'];
    $headline = addslashes(strip_tags($_POST['headline']));
    $isi_berita = addslashes(strip_tags($_POST['isi']));
    $pengirim = addslashes(strip_tags($_POST['pengirim']));

    // Update the article in the database
    $query = "UPDATE berita SET id_kategori='$kategori', judul='$judul', headline='$headline', isi='$isi_berita', pengirim='$pengirim', tanggal=now() WHERE id_berita='$id_berita'";
    $sql = mysqli_query($conn, $query);

    if ($sql) {
        echo '<div class="toast align-items-center text-bg-success border-0 fade show position-fixed bottom-0 end-0 m-3" role="alert" aria-live="assertive" aria-atomic="true">
                <div class="d-flex align-items-center">
                    <i class="bi bi-check-all fs-5 px-2 ps-2"></i>
                    <div class="toast-body ps-3">Berita telah berhasil diperbarui</div>
                    <button type="button" class="btn-close btn-close-white me-2 m-auto" data-bs-dismiss="toast" aria-label="Close"></button>
                </div>
              </div>';
    } else {
        echo '<div class="toast align-items-center text-bg-danger border-0 fade show position-fixed bottom-0 end-0 m-3" role="alert" aria-live="assertive" aria-atomic="true">
                <div class="d-flex align-items-center">
                    <i class="bi bi-exclamation-triangle-fill fs-5 px-2 ps-2"></i>
                    <div class="toast-body ps-3">Berita gagal diperbarui</div>
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
    <form action="" method="POST" name="edit" class="d-flex flex-column gap-4">
        <div class="form-group">
            <label for="judul">Judul Berita</label>
            <input type="text" class="form-control" id="judul" name="judul" value="<?php echo htmlspecialchars($article['judul']); ?>" required>
        </div>
        <div class="form-group">
            <label for="kategori">Kategori</label>
            <select class="form-control" id="kategori" name="kategori" required>
                <option value="">Pilih Kategori</option>
                <?php
                $query = "SELECT id_kategori, nm_kategori FROM kategori ORDER BY nm_kategori";
                $sql = mysqli_query($conn, $query);
                while ($hasil = mysqli_fetch_array($sql)) {
                    $selected = ($hasil['id_kategori'] == $article['id_kategori']) ? 'selected' : '';
                    echo "<option value='$hasil[id_kategori]' $selected>$hasil[nm_kategori]</option>";
                }
                ?>
            </select>
        </div>
        <div class="form-group">
            <label for="headline">Headline Berita</label>
 <input type="text" class="form-control" id="headline" name="headline" value="<?php echo htmlspecialchars($article['headline']); ?>" required>
        </div>
        <div class="form-group">
            <label for="isi">Isi Berita</label>
            <textarea class="form-control" id="isi" name="isi" rows="10" required><?php echo htmlspecialchars($article['isi']); ?></textarea>
        </div>
        <div class="form-group">
            <label for="pengirim">Pengirim</label>
            <input type="text" class="form-control" id="pengirim" name="pengirim" value="<?php echo htmlspecialchars($article['pengirim']); ?>" required>
        </div>
        <div class="form-group">
            <button type="submit" name="Update" class="btn btn-primary">Update Berita</button>
            <button type="reset" class="btn btn-secondary" onclick="window.history.back()">Cancel</button>
        </div>
    </form>
</div>
<?php include("./template/footer.php"); ?>