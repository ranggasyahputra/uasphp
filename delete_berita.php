<?php
include "koneksi.php"; // Include your database connection file

// Check if the id_berita is set in the URL
if (isset($_GET['id'])) {
    $id_berita = $_GET['id'];

    // Fetch the existing article data to confirm deletion
    $query = "SELECT * FROM berita WHERE id_berita = '$id_berita'";
    $result = mysqli_query($conn, $query);
    $berita = mysqli_fetch_assoc($result);

    // Check if the article exists
    if (!$berita) {
        echo "Berita tidak ditemukan.";
        exit;
    }
} else {
    echo "ID berita tidak diberikan.";
    exit;
}

// Process the deletion
if (isset($_POST['delete'])) {
    // Delete the article from the database
    $query = "DELETE FROM berita WHERE id_berita = '$id_berita'";
    $sql = mysqli_query($conn, $query);

    if ($sql) {
        header("Location: arsip_berita.php?message=deleted");
        exit;
    } else {
        echo '<div class="toast align-items-center text-bg-danger border-0 fade show position-fixed bottom-0 end-0 m-3" role="alert" aria-live="assertive" aria-atomic="true">
                <div class="d-flex align-items-center">
                    <i class="bi bi-exclamation-triangle-fill fs-5 px-2 ps-2"></i>
                    <div class="toast-body ps-3">Berita gagal dihapus</div>
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
    <h2>Hapus Berita</h2>
    <p>Anda yakin ingin menghapus berita dengan judul: <strong><?php echo htmlspecialchars($berita['judul']); ?></strong>?</p>
    <form action="" method="POST">
        <div class="form-group">
            <button type="button" class="btn btn-secondary" onclick="window.history.back();">Kembali</button>
            <button type="submit" name="delete" class="btn btn-danger">Hapus Berita</button>
        </div>
    </form>
</div>
<?php include("./template/footer.php"); ?>