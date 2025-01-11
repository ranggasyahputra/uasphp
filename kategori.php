<?php
include "koneksi.php"; // Include your database connection file

// Fetch categories from the database
$query = "SELECT id_kategori, nm_kategori, deskripsi FROM kategori ORDER BY id_kategori";
$sql = mysqli_query($conn, $query);
?>

<?php include("./template/head.php"); ?>
<?php include("./template/navbar.php"); ?>
<br><br>
<div class="container-xl">
    <h2>Daftar Kategori</h2>
    <div class="mb-3">
        <a href="buat_kategori.php" class="btn btn-primary"><i class="bi bi-plus-circle me-2"></i>Tambah Kategori</a>
    </div>
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>ID Kategori</th>
                <th>Nama Kategori</th>
                <th>Deskripsi</th>
            </tr>
        </thead>
        <tbody>
            <?php
            // Check if there are categories and display them
            if (mysqli_num_rows($sql) > 0) {
                while ($hasil = mysqli_fetch_assoc($sql)) {
                    $id_kategori = htmlspecialchars($hasil['id_kategori']);
                    $nm_kategori = htmlspecialchars($hasil['nm_kategori']);
                    $deskripsi = htmlspecialchars($hasil['deskripsi']);
                    echo "<tr>";
                    echo "<td>$id_kategori<a href='edit_kategori.php?id=$id_kategori' class='ms-3'><i class='bi bi-pencil-square me-1'></i></a></td>";
                    echo "<td>$nm_kategori</td>";
                    echo "<td>$deskripsi</td>";
                    echo "</tr>";
                }
            } else {
                echo "<tr><td colspan='3' class='text-center'>Tidak ada kategori ditemukan.</td></tr>";
            }
            ?>
        </tbody>
    </table>
</div>
<?php include("./template/footer.php"); ?>