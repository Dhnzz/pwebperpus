<?php 
// include "./Controller/library.php";
$lib = new Library();
$data = mysqli_fetch_array($lib->getDataId('member', $_GET['id']));
 ?>

<h3 class="text-capitalize">Detail <?=$data['nama']?></h3>

<div class="card w-50" style="background-color: purple;">
    <div class="card-header">
        <div class="row">
            <a href="?page=Member" class="btn btn-sm btn-danger"><i class="fas fa-chevron-left"></i> Kembali</a>
        </div>
        <div class="row justify-content-center">
            <img src="./assets/img/Member/<?= $data['foto'] ?>" alt="" width="300px" class="p-2">
        </div>
    </div>
    <div class="card-body text-white">
        <div class="row">
            <h3 class="mx-auto"><b><?= $data['nama'] ?></b></h3>
        </div>

        <div class="row mt-5">
            <div class="col-4">
                <span>Nama Lengkap</span>
            </div>
            <div class="col-auto text-center">
                <span>:</span>
            </div>
            <div class="col-auto">
                <span><?= $data['nama'] ?></span>
            </div>
        </div>
        
        <div class="row">
            <div class="col-4">
                <span>Jenis Kelamin</span>
            </div>
            <div class="col-auto text-center">
                <span>:</span>
            </div>
            <div class="col-auto">
                <span><?= ($data['jk'] == 0)?'Pria':'Wanita' ?></span>
            </div>
        </div>

        <div class="row">
            <div class="col-4">
                <span>Tanggal Daftar</span>
            </div>
            <div class="col-auto text-center">
                <span>:</span>
            </div>
            <div class="col-auto">
                <span><?= $data['mendaftar'] ?></span>
            </div>
        </div>
    </div>
</div>
