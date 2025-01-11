<?php
include "koneksi.php"; // Include your database connection file

// Process the form submission
if (isset($_POST['Input'])) {
    $nm_kategori = addslashes(strip_tags($_POST['nm_kategori']));
    $deskripsi = addslashes(strip_tags($_POST['deskripsi']));

    // Insert into the kategori table
    $query = "INSERT INTO kategori (nm_kategori, deskripsi) VALUES ('$nm_kategori', '$deskripsi')";
    $sql = mysqli_query($conn, $query);

    if ($sql) {
        echo '<div class="toast align-items-center text-bg-success border-0 fade show position-fixed bottom-0 end-0 m-3" role="alert" aria-live="assertive" aria-atomic="true">
                <div class="d-flex align-items-center">
                    <i class="bi bi-check-all fs-5 px-2 ps-2"></i>
                    <div class="toast-body ps-3">Kategori telah berhasil ditambahkan</div>
                    <button type="button" class="btn-close btn-close-white me-2 m-auto" data-bs-dismiss="toast" aria-label="Close"></button>
                </div>
              </div>';
    } else {
        echo '<div class="toast align-items-center text-bg-danger border-0 fade show position-fixed bottom-0 end-0 m-3" role="alert" aria-live="assertive" aria-atomic="true">
                <div class="d-flex align-items-center">
                    <i class="bi bi-exclamation-triangle-fill fs-5 px-2 ps-2"></i>
                    <div class="toast-body ps-3">Kategori gagal ditambahkan</div>
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
    <h2>Buat Kategori</h2>
    <form action="" method="POST" class="d-flex flex-column gap-4">
        <div class="form-group">
            <label for="nm_kategori">Nama Kategori</label>
            <input type="text" class="form-control" id="nm_kategori" name="nm_kategori" required>
        </div>
        <div class="form-group">
            <label for="deskripsi">Deskripsi</label>
            <textarea class="form-control" id="deskripsi" name="deskripsi" rows="4" required></textarea>
        </div>
        <div class="form-group">
            <button type="submit" name="Input" class="btn btn-primary">Input Kategori</button>
            <button type="reset" class="btn btn-secondary" onclick="window.history.back()">Cancel</button>
        </div>
    </form>
</div>
<?php include("./template/footer.php"); ?>