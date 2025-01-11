<?php include("head.php"); ?>
<nav class="navbar navbar-expand-lg bg-body-tertiary px-5 py-3" data-bs-theme="dark">
    <div class="container-fluid">
        <a class="navbar-brand" href="#">
            <img src="./img/logo.png" style="width:100px;height:100px" alt="">
        </a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavAltMarkup"
            aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
            <div class="navbar-nav">
                <a class="nav-link active" aria-current="page" href="index.php">Home</a>
                <a class="nav-link" href="arsip_berita.php">Arsip Berita</a>
                <a class="nav-link" href="input_berita.php">Input Berita</a>
                <a class="nav-link" href="kategori.php">Kategori</a>
            </div>
        </div>
    </div>
</nav>
<?php include("footer.php"); ?>