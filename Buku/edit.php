<?php
$lib = new Library();

$data = $lib->getDataId('buku', $_GET['id']);
$row = mysqli_fetch_assoc($data);

if (isset($_POST['submit'])) {
    $namaSampul = $_FILES['sampul']['name'];
    $x = explode('.', $namaSampul);
    $ekstensi = strtolower(end($x));
    $temp = $_FILES['sampul']['tmp_name'];
    if (isset($_FILES['sampul']) != '') {
        $finalName = time().$namaSampul;
        $moved = move_uploaded_file($temp, './assets/img/Buku/'.$finalName);
        if ($moved) {
            unlink('./assets/img/Buku/'.$row['sampul']);
        }else{
            $finalName = $row['sampul'];
        }
    }
    
    $data = [
        'judul' => $_POST['judul'],
        'sampul' => $finalName,
        'penulis' => $_POST['penulis'],
        'penerbit' => $_POST['penerbit'],
        'tahun_terbit' => $_POST['tahun_terbit'],
    ];
    $update = $lib->update('buku',$data, $_GET['id']);
    if ($update == true) {
        Flashdata::add('sukses','Berhasil update data');
        header('location: ?page=Buku');
    }else{
        Flashdata::add('error','Gagal update data');
        header('location: ?page=Buku');
    }
}


?>
<h3>Edit Member</h3>

<form method="post" enctype="multipart/form-data">
        <div class="card">
            <div class="card-body">
                <h4>Data <?= $row['judul'] ?></h4>
                <div class="row">
                    <div class="col-auto">
                        <img id="sampul" width="250px" src="./assets/img/Buku/<?= $row['sampul'] ?>" alt="">
                    </div>
                    <div class="col">
                        <div class="form-group">
                            <label for="judul">Judul</label>
                            <input type="text" name="judul" class="form-control" id="judul" value="<?= $row['judul'] ?>">
                        </div>
                        <div class="form-group row">
                            <div class="col">
                                <label for="penulis">Penulis</label>
                                <input type="text" name="penulis" class="form-control" id="penulis" value="<?= $row['penulis'] ?>">
                            </div>
                            <div class="col">
                                <label for="penerbit">Penerbit</label>
                                <input type="text" name="penerbit" class="form-control" id="penerbit" value="<?= $row['penerbit'] ?>">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="tahun_terbit">Tahun Terbit</label>
                            <input type="number" name="tahun_terbit" class="form-control" value="<?= $row['tahun_terbit'] ?>">
                        </div>
                        <div class="form-group">
                            <label for="sampul">Sampul</label>
                            <input type="file" name="sampul" onchange="ubahgambar(event)" class="form-control-file" value="<?= $row['sampul'] ?>">
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
        var sampul = document.getElementById('sampul');
        sampul.src = URL.createObjectURL(event.target.files[0]);
        sampul.onload = function(){
            URL.revokeObjectURL(sampul.src)
        }
    }
</script>