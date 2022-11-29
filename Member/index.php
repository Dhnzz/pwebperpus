<?php
// include "./Controller/library.php";
// include "./Controller/Flashdata.php";
$lib = new Library();

$data = array();

if (isset($_POST['submit'])) {
    $namafoto = $_FILES['foto']['name'];
    $x = explode('.', $namafoto);
    $ekstensi = strtolower(end($x));
    $ukuran = $_FILES['foto']['size'];
    $temp = $_FILES['foto']['tmp_name'];
    if ($ukuran < 1044070) {
        $finalName = time().$namafoto;
        move_uploaded_file($temp, './assets/img/Member/'.$finalName);
    }
    
    $data = [
        'nama' => $_POST['nama'],
        'jk' => $_POST['jk'],
        'mendaftar' => date('Y-m-d'),
        'foto' => $finalName
    ];
    $simpan = $lib->simpan('member', $data);

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

<h3>Data Member</h3>

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
                    <th>Nama</th>
                    <th>Jenis Kelamin</th>
                    <th>Tanggal Daftar</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $data = $lib->getData('member');
                $no = 0;
                while ($row = mysqli_fetch_array($data)) {
                    $no++;
                ?>
                    <tr>
                        <td><?= $no ?></td>
                        <td><?= $row['nama'] ?></td>
                        <td><?= ($row['jk'] == 0) ? 'Pria' : 'Wanita' ?></td>
                        <td><?= $row['mendaftar'] ?></td>
                        <td>
                            <a href="?page=Member-detail&id=<?= $row['id'] ?>" class="btn btn-sm btn-info"><i class="fas fa-eye"></i></a>
                            <a href="?page=Member-edit&id=<?= $row['id'] ?>" class="btn btn-sm btn-warning"><i class="fas fa-pen"></i></a>
                            <a href="?page=Member-delete&id=<?= $row['id'] ?>" class="btn btn-sm btn-danger"><i class="fas fa-trash"></i></a>
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
                <h5 class="modal-title" id="exampleModalLabel">Tambah Data Member</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form method="post" id="addMember" enctype="multipart/form-data">
                    <div class="form-group">
                        <label for="nama">Nama</label>
                        <input type="text" name="nama" class="form-control" id="nama">
                    </div>
                    <div class="form-group">
                        <label for="jk">Jenis Kelamin</label>
                        <select name="jk" id="jk" class="form-control">
                            <option value="">Jenis Kelamin</option>
                            <option value="0">Pria</option>
                            <option value="1">Wanita</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="mendaftar">Tanggal Daftar</label>
                        <input type="date" name="mendaftar" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="foto">Foto Diri</label>
                        <input type="file" name="foto" id="foto" class="form-control-file">
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