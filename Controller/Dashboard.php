<?php 
function hitung($tabel)
{
    include "./koneksi.php";
    $sql = "SELECT id FROM $tabel";
    $result = mysqli_query($conn, $sql);
    
    
    return mysqli_num_rows($result);
}
 ?>