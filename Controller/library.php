<?php 
include "Fungsi.php";
class Library extends Fungsi{
    public function __construct()
    {
        include "./koneksi.php";
        $this->conn = $conn;
    }
    
    public function getData($tabel)
    {
        include "./koneksi.php";
        $sql = "SELECT * FROM $tabel";
        $result = mysqli_query($conn, $sql);

        return $result;
    }

    public function getDataId($tabel, $id)
    {
        include "./koneksi.php";
        $sql = "SELECT * FROM $tabel WHERE id = $id";
        $result = mysqli_query($conn, $sql);

        return $result;
    }

    public function simpan($tabel, $data)
    {
        include "./koneksi.php";
        foreach($data as $keys => $value){
            $key = implode("`, `",array_keys($data));
            $value = implode('", "',$data);
        }
        $sql = 'INSERT INTO '.$tabel.' VALUES("", "'.$value.'")';
        // var_dump($sql);
        $result = mysqli_query($conn, $sql);
        if ($result) {
           return true;
        }else{
            return false;
        }
    }

    public function update($tabel, $data,  $id)
    {
        include "./koneksi.php";
        $kolom = '';
        $x = 1;
        foreach($data as $key => $value){
            $kolom .= $key.'="'.$value.'"';
            if ($x < count($data)) {
                $kolom .= ", ";
            }
            $x++;
        }
        $sql = 'UPDATE '.$tabel.' SET '.$kolom.' WHERE id = '.$id.'';
        $result = mysqli_query($conn, $sql);
        if ($result) {
            return true;
        }else{
            return false;
        }
    }

    public function hapus($tabel, $id)
    {
        include "./koneksi.php";
        $sql = "DELETE FROM $tabel WHERE id = $id";
        $result = mysqli_query($conn, $sql);
        if($result){
            Flashdata::add('sukses','Data Berhasil Di Hapus');
            return true;
        }else{
            Flashdata::add('error', 'Data Gagal Di Hapus');
            return false;
        }
    }

    public function select($s, $t, $c)
    {
        $kolom = Fungsi::arrToStr($s);
        $tabel = Fungsi::arrToStr($t);
        $condition = Fungsi::arrToStr($c);
        $sql = "SELECT $kolom FROM $tabel WHERE $condition";
        $result = mysqli_query($this->conn, $sql);
        return $result;
    }
}
 ?>