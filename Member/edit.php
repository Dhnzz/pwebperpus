<?php
$lib = new Library();

$data = $lib->getDataId('member', $_GET['id']);
$row = mysqli_fetch_assoc($data);


if (isset($_POST['submit'])) {
    $namaFoto = $_FILES['foto']['name'];
    $x = explode('.', $namaFoto);
    $ekstensi = strtolower(end($x));
    $temp = $_FILES['foto']['tmp_name'];
    if (isset($_FILES['foto']) != '') {
        $finalName = time().$namaFoto;
        $moved = move_uploaded_file($temp, './assets/img/Member/' . $finalName);
        if ($moved) {
            unlink('./assets/img/Member/' . $row['foto']);
        } else {
            $finalName = $row['foto'];
        }
    }

    $data = [
        'nama' => $_POST['nama'],
        'jk' => $_POST['jk'],
        'mendaftar' => $_POST['mendaftar'],
        'foto' => $finalName

    ];
    $update = $lib->update('member', $data, $_GET['id']);
    if ($update == true) {
        Flashdata::add('sukses', 'Berhasil update data');
        header('location: ?page=Member');
    } else {
        Flashdata::add('error', 'Gagal update data');
        header('location: ?page=Member');
    }
}


?>
<h3>Edit Member</h3>

<form method="post" enctype="multipart/form-data">
    <div class="card">
        <div class="card-body">
            <h4>Data <?= $row['nama'] ?></h4>
            <div class="row">
                <div class="col-auto">
                    <img id="foto" width="250px" src="./assets/img/Member/<?= $row['foto'] ?>" alt="">
                </div>
                <div class="col">
                    <div class="form-group">
                        <label for="nama">Nama</label>
                        <input type="text" name="nama" class="form-control" id="nama" value="<?= $row['nama'] ?>">
                    </div>
                    <div class="form-group">
                        <label for="jk">Jenis Kelamin</label>
                        <select name="jk" id="jk" class="form-control">
                            <option value="">Jenis Kelamin</option>
                            <option value="0" <?= ($row['jk'] == 0) ? 'selected' : '' ?>>Pria</option>
                            <option value="1" <?= ($row['jk'] == 1) ? 'selected' : '' ?>>Wanita</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="mendaftar">Tanggal Daftar</label>
                        <input type="date" name="mendaftar" class="form-control" value="<?= $row['mendaftar'] ?>">
                    </div>
                    <div class="form-group">
                        <label for="foto">Foto Diri</label>
                        <input type="file" onchange="ubahgambar(event)" name="foto" id="foto" class="form-control-file">
                    </div>
                </div>
            </div>
        </div>
        <div class="card-footer">
            <input type="submit" name="submit" value="Update" class="btn btn-sm btn-warning">
        </div>
    </div>
</form>
<script>
    var ubahgambar = function(event){
        var foto = document.getElementById('foto');
        foto.src = URL.createObjectURL(event.target.files[0]);
        foto.onload = function(){
            URL.revokeObjectURL(foto.src)
        }
    }
</script>