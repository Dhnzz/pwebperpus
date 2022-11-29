<?php
include "Controller/Dashboard.php";
?>

<h3>Dashboard</h3>

<div class="row">
    <div class="col-3">
        <div class="card" style="background-color:purple">
            <div class="card-body p-4 text-white">
                <div class="row">
                    <div class="col">
                        <h5><b>Jumlah Buku</b></h5>
                    </div>
                </div>
                <div class="row mt-3">
                    <div class="col"><i class="fa fa-book fa-2x"></i></div>
                    <div class="col-auto pr-3"><h3><b><?= hitung('buku') ?></b></h3></div>
                </div>
            </div>
        </div>
    </div>

    <div class="col-3">
        <div class="card" style="background-color:purple">
            <div class="card-body p-4 text-white">
                <div class="row">
                    <div class="col">
                        <h5><b>Jumlah Member</b></h5>
                    </div>
                </div>
                <div class="row mt-3">
                    <div class="col"><i class="fa fa-users fa-2x"></i></div>
                    <div class="col-auto pr-3"><h3><?= hitung('member') ?></h3></div>
                </div>
            </div>
        </div>
    </div>
</div>

