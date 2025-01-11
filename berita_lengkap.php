<?php
include "koneksi.php";
if (isset($_GET['id'])) {
    $id_berita = $_GET['id'];
} else {
    die("Error. No Id Selected! ");
}
?>
<?php include("./template/head.php") ?>
<?php include("./template/navbar.php") ?>
<div class="content d-flex flex-column">
</div>
<form action="arsip_berita.php"></form>
<div class="d-flex align-items-center flex-column">
    <?php
    $query = "SELECT berita.id_berita, kategori.nm_kategori, berita.judul, berita.isi, berita.pengirim, berita.tanggal, berita.headline, berita.isi FROM berita INNER JOIN kategori WHERE berita.id_kategori= kategori.id_kategori && berita.id_berita='$id_berita'";
    $sql = mysqli_query($conn, $query);
    while ($hasil = mysqli_fetch_array($sql)) {
        $id_berita = $hasil['id_berita'];
        $kategori = stripslashes($hasil['nm_kategori']);
        $judul = stripslashes($hasil['judul']);
        $headline = nl2br(stripslashes($hasil['headline']));
        $pengirim = stripslashes($hasil['pengirim']);
        $tanggal = stripslashes($hasil['tanggal']);
        $isi = htmlspecialchars(stripslashes($hasil['isi']));
        $formattedIsi = nl2br($isi);
        // Tampilkan berita
        echo '<div class="container-xl">';
        echo '<div class="d-flex flex-column align-items-center justify-content-center mb-4">';
        echo '    <div class="m-5 d-flex flex-column align-items-center justify-content-center" style="width:100%;">'; // Add margin to the right for spacing
        echo "        <div class='fs-1 d-flex w-100 justify-content-between'>

                       <button type='button' class='btn-close btn-sm' onclick='window.history.back()'aria-label='Close'></button>
                        <h2 style='margin-left:-50px;'> $judul </h2>
                        <div></div>
                     </div>";
        echo '        <h4 class="fs-2">' . $headline . '</h4>';
        echo '    </div>';
        echo '    <div>';
        echo '        <p><small>' . $tanggal . '</small></p>';
        echo '        <p><strong>' . $pengirim . '</strong></p>';
        echo '        <p>' . $formattedIsi . '</p>'; // Display the content of the news article
        echo '    </div>';
        echo '</div>';
        echo '</div>';

    }
    ?>
</div>
</div>
</div>
<?php include("./template/footer.php") ?>