<?php 
// include "./Controller/library.php";
$lib = new Library();
$data = mysqli_fetch_array($lib->getDataId('buku', $_GET['id']));
 ?>

<h3 class="text-capitalize">Detail <?=$data['judul']?></h3>

<div class="card w-50" style="background-color: purple;">
    <div class="card-header">
        <div class="row">
            <a href="?page=Buku" class="btn btn-sm btn-danger"><i class="fas fa-chevron-left"></i> Kembali</a>
        </div>
        <div class="row justify-content-center">
            <img src="./assets/img/Buku/<?= $data['sampul'] ?>" alt="Gambar" width="300px" class="p-2">
        </div>
    </div>
    <div class="card-body text-white">
        <div class="row">
            <h3 class="mx-auto text-center"><b><?= $data['judul'] ?></b></h3>
        </div>

        <div class="row mt-5">
            <div class="col-3">
                <span>Judul</span>
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
                <span>Penulis</span>
            </div>
            <div class="col-auto text-center">
                <span>:</span>
            </div>
            <div class="col-auto">
                <span><?= $data['penulis'] ?></span>
            </div>
        </div>

        <div class="row">
            <div class="col-3">
                <span>Penerbit</span>
            </div>
            <div class="col-auto text-center">
                <span>:</span>
            </div>
            <div class="col-auto">
                <span><?= $data['penerbit'] ?></span>
            </div>
        </div>

        <div class="row">
            <div class="col-3">
                <span>Tahun Terbit</span>
            </div>
            <div class="col-auto text-center">
                <span>:</span>
            </div>
            <div class="col-auto">
                <span><?= $data['tahun_terbit'] ?></span>
            </div>
        </div>
    </div>
</div>
