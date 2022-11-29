<?php
// include "./Controller/library.php";
// include "./Controller/Flashdata.php";
$lib = new Library();

$data = array();

if (isset($_POST['submit'])) {
    $data = [
        'kategori' => $_POST['kategori'],
    ];
    $simpan = $lib->simpan('kategori', $data);

    if ($simpan == true) {
        Flashdata::add('sukses', 'Berhasil Tambah Data');
    } elseif ($simpan == false) {
        Flashdata::add('error', 'Gagal Menambah Data');
    }
}
$tampil = $lib->getData('kategori');
?>


<?php
$render = Flashdata::render();
if ($render == null) {
    $render['sukses'] = '';
    $render['error'] = '';
}
?>

<h3>Data Kategori</h3>

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
                    <th>Kategori</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $data = $lib->getData('kategori');
                $no = 0;
                while ($row = mysqli_fetch_array($data)) {
                    $no++;
                ?>
                    <tr>
                        <td><?= $no ?></td>
                        <td><?= $row['kategori'] ?></td>
                        <td>
                            <a href="?page=Kategori-detail&id=<?= $row['id'] ?>" class="btn btn-sm btn-info"><i class="fas fa-eye"></i></a>
                            <a href="?page=Kategori-edit&id=<?= $row['id'] ?>" class="btn btn-sm btn-warning"><i class="fas fa-pen"></i></a>
                            <a href="?page=Kategori-delete&id=<?= $row['id'] ?>" class="btn btn-sm btn-danger"><i class="fas fa-trash"></i></a>
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
                <h5 class="modal-title" id="exampleModalLabel">Tambah Data Kategori</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form method="post" id="addMember" enctype="multipart/form-data">
                    <div class="form-group">
                        <label for="judul">Nama Kategori</label>
                        <input type="text" name="kategori" class="form-control">
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