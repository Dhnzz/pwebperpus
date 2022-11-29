<?php
// include "./Controller/library.php";
$lib = new Library();
$pinjam = new Peminjaman();
$data = mysqli_fetch_array($pinjam->getPeminjamanID($_GET['id']));
?>

<h3 class="text-capitalize">Detail Peminjaman</h3>

<div class="card w-75" style="background-color: purple;">
    <div class="card-body text-white">
        <a href="?page=Buku" class="btn btn-sm btn-danger"><i class="fas fa-chevron-left"></i> Kembali</a>
        <div class="row mt-3">
            <h3 class="mx-auto text-center"><b><?= $data['judul'] ?></b></h3>
        </div>

        <div class="row mt-5">
            <div class="col-3">
                <span>Judul Buku</span>
            </div>
            <div class="col-auto text-center">
                <span>:</span>
            </div>
            <div class="col-auto">
                <span><?= $data['judul'] ?></span>
            </div>
        </div>

        <div class="row">
            <div class="col-3">
                <span>Nama Peminjam</span>
            </div>
            <div class="col-auto text-center">
                <span>:</span>
            </div>
            <div class="col-auto">
                <span><?= $data['nama'] ?></span>
            </div>
        </div>

        <div class="row">
            <div class="col-3">
                <span>Tanggal Pinjam</span>
            </div>
            <div class="col-auto text-center">
                <span>:</span>
            </div>
            <div class="col-auto">
                <span><?= $data['tanggal_pinjam'] ?></span>
            </div>
        </div>

        <div class="row">
            <div class="col-3">
                <span>Jatuh Tempo</span>
            </div>
            <div class="col-auto text-center">
                <span>:</span>
            </div>
            <div class="col-auto">
                <span><?= $data['jatuh_tempo'] ?></span>
            </div>
        </div>
        
        <div class="row">
            <div class="col-3">
                <span>Jatuh Tempo</span>
            </div>
            <div class="col-auto text-center">
                <span>:</span>
            </div>
            <div class="col-auto">
                <span><?= $data['jatuh_tempo'] ?></span>
            </div>
        </div>
    </div>
</div>