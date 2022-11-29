<?php
// include "./Controller/library.php";
// include "./Controller/Flashdata.php";
// $lib = new Library();

$data = array();

if (isset($_POST['submit'])) {
    $data = [
        'id_member' => $_POST['id_member'],
        'id_buku' => $_POST['id_buku'],
        'tanggal_pinjam' => $_POST['tanggal_pinjam'],
        'jatuh_tempo' => $_POST['jatuh_tempo'],
        'tanggal_balik' => null,
        'status' => 0,
    ];
    $simpan = $lib->simpan('peminjaman', $data);

    if ($simpan == true) {
        Flashdata::add('sukses', 'Berhasil Tambah Data');
    } elseif ($simpan == false) {
        Flashdata::add('error', 'Gagal Menambah Data');
    }
}
$tampil = $pinjam->getPeminjaman();
?>


<?php
$render = Flashdata::render();
if ($render == null) {
    $render['sukses'] = '';
    $render['error'] = '';
}
?>

<h3>Data Peminjaman</h3>

<div class="card">
    <div class="card-body">
        <button type="button" class="btn btn-success btn-sm mb-3" data-toggle="modal" data-target="#exampleModal">
            <i class="fas fa-plus"></i> Tambah Data
        </button>

        <?php 
        if ($render['sukses'] == true) {
        ?>
        <div class="alert alert-success alert-dismissible fade show" role="alert">
        <strong>Sukses</strong> <?=$render['sukses']?>
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
        </div>
        <?php
        }elseif ($render['error'] == true) {
        ?>
        <div class="alert alert-success alert-dismissible fade show" role="alert">
        <strong>Error</strong> <?=$render['error']?>
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
        </div>
        <?php
        }
         ?>

        <table class="table table-stripped table-sm" id="tabel">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Buku</th>
                    <th>Tanggal Pinjam</th>
                    <th>Jatuh Tempo</th>
                    <th>Status</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $data = $pinjam->getPeminjaman();
                $no = 0;
                while ($row = mysqli_fetch_array($data)) {
                    $no++;
                ?>
                    <tr>
                        <td><?= $no ?></td>
                        <td><?= $row['judul'] ?></td>
                        <td><?= $row['tanggal_pinjam'] ?></td>
                        <td><?= $row['jatuh_tempo'] ?></td>
                        <td><?= ($row['status'] == 0)? '<span class="text-white badge rounded-pill bg-danger">Dipinjam</span>':'<span class="text-white badge rounded-pill bg-success">Dikembalikan</span>' ?></td>
                        <td>
                            <a href="?page=Peminjaman-detail&id=<?= $row['id'] ?>" class="btn btn-sm btn-info"><i class="fas fa-eye"></i></a>
                            <a href="?page=Peminjaman-edit&id=<?= $row['id'] ?>" class="btn btn-sm btn-warning"><i class="fas fa-pen"></i></a>
                            <a href="?page=Peminjaman-delete&id=<?= $row['id'] ?>" class="btn btn-sm btn-danger"><i class="fas fa-trash"></i></a>
                        </td>
                    </tr>
                <?php
                }
                ?>
            </tbody>
        </table>
    </div>
</div>

<!-- Button trigger modal -->


<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Pinjam Buku</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form method="post" id="addMember" enctype="multipart/form-data">
                    <div class="form-group">
                        <label for="id_buku">Judul Buku</label><br>
                        <select name="id_buku" id="selectBuku" class="js-example-responsive form-control" style="width: 100%;">
                            <option value="">Pilih Judul</option>
                            <?php 
                            $data = $lib->getData('buku');
                            while($row = mysqli_fetch_assoc($data)){
                             ?>
                            <option value="<?= $row['id'] ?>"><?= $row['judul'] ?></option>
                            <?php } ?>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="penulis">Nama Peminjam</label>
                        <select name="id_member" id="selectMember" class="js-example-responsive form-control" style="width: 100%;">
                            <option value="">Pilih Member</option>
                            <?php 
                            $data = $lib->getData('member');
                            while($row = mysqli_fetch_assoc($data)){
                             ?>
                            <option value="<?= $row['id'] ?>"><?= $row['nama'] ?></option>
                            <?php } ?>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="penerbit">Tanggal Pinjam</label>
                        <input type="date" name="tanggal_pinjam" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="tahun_terbit">Jatuh Tempo</label>
                        <input type="date" maxlength="4" name="jatuh_tempo" class="form-control">
                    </div>
            </div>
            <div class="modal-footer">
                <input class="btn btn-success" type="submit" name="submit" id="submit" value="Submit">
                <button class="btn btn-warning text-white">Batal</button>
                </form>
            </div>
        </div>
    </div>
</div>
<script>
    var ubahgambar = function(event){
        var sampul = document.getElementById('sampul');
        sampul.src = URL.createObjectURL(event.target.files[0]);
        sampul.onload = function(){
            URL.revokeObjectURL(sampul.src)
        }
    }
</script>