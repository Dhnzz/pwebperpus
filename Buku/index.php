<?php
// include "./Controller/library.php";
// include "./Controller/Flashdata.php";
$lib = new Library();

$data = array();

if (isset($_POST['submit'])) {
    $namaSampul = $_FILES['sampul']['name'];
    $x = explode('.', $namaSampul);
    $ekstensi = strtolower(end($x));
    $ukuran = $_FILES['sampul']['size'];
    $temp = $_FILES['sampul']['tmp_name'];
    if ($ukuran < 1044070) {
        $finalName = time().$namaSampul;
        move_uploaded_file($temp, './assets/img/Buku/'.$finalName);
    }
    
    $data = [
        'judul' => $_POST['judul'],
        'sampul' => $finalName,
        'penulis' => $_POST['penulis'],
        'penerbit' => $_POST['penerbit'],
        'tahun_terbit' => $_POST['tahun_terbit'],
    ];
    $simpan = $lib->simpan('buku', $data);

    if ($simpan == true) {
        Flashdata::add('sukses', 'Berhasil Tambah Data');
    } elseif ($simpan == false) {
        Flashdata::add('error', 'Gagal Menambah Data');
    }
}
$tampil = $lib->getData('member');
?>


<?php
$render = Flashdata::render();
if ($render == null) {
    $render['sukses'] = '';
    $render['error'] = '';
}
?>

<h3>Data Buku</h3>

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
                    <th>Judul</th>
                    <th>Penulis</th>
                    <th>Kategori</th>
                    <th>Stok Buku</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $select = [
                    'buku.*',
                    'kategori.kategori'
                ];
                $tabel = [
                    'buku',
                    'kategori'
                ];
                $condition = [
                    'kategori.id = buku.id_kategori'
                ];
                
                $data = $lib->select($select, $tabel, $condition);
                $no = 0;
                while ($row = mysqli_fetch_array($data)) {
                    $no++;
                ?>
                    <tr>
                        <td><?= $no ?></td>
                        <td><?= $row['judul'] ?></td>
                        <td><?= $row['penulis'] ?></td>
                        <td><?= $row['id_kategori'] ?></td>
                        <td><?= $row['jumlah_buku'] ?></td>
                        <td>
                            <a href="?page=Buku-detail&id=<?= $row['id'] ?>" class="btn btn-sm btn-info"><i class="fas fa-eye"></i></a>
                            <a href="?page=Buku-edit&id=<?= $row['id'] ?>" class="btn btn-sm btn-warning"><i class="fas fa-pen"></i></a>
                            <a href="?page=Buku-delete&id=<?= $row['id'] ?>" class="btn btn-sm btn-danger"><i class="fas fa-trash"></i></a>
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
                <h5 class="modal-title" id="exampleModalLabel">Tambah Data Buku</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form method="post" id="addMember" enctype="multipart/form-data">
                    <div class="form-group">
                        <label for="judul">Judul Buku</label>
                        <input type="text" name="judul" class="form-control" id="judul">
                    </div>
                    <div class="form-group">
                        <label for="penulis">Penulis</label>
                        <input type="text" name="penulis" class="form-control" id="penulis">
                    </div>
                    <div class="form-group">
                        <label for="penerbit">Penerbit</label>
                        <input type="text" name="penerbit" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="tahun_terbit">Tahun Terbit</label>
                        <input type="number" maxlength="4" name="tahun_terbit" class="form-control">
                    </div>
                    <div class="form-group">
                        <div class="row">
                            <div class="col">
                                <label for="sampul">Sampul</label>
                                <input type="file" name="sampul" onchange="ubahgambar(event)" class="form-control-file">
                            </div>
                            <div class="col-auto">
                                <img id="sampul" width="250px" src="" alt="">
                            </div>
                        </div>
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