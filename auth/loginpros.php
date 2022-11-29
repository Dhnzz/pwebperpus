<?php
    
    include "../koneksi.php";

    if(isset($_POST['submit'])){
        $email = $_POST['email'];
        $pass = $_POST['password'];

        $sql = "SELECT * FROM petugas WHERE email = '".$email."' AND password = '".$pass."'";
        $result = mysqli_query($conn, $sql);

        if ($result->num_rows > 0) {
            $row = mysqli_fetch_assoc($result);
            session_start();
            $_SESSION['nama'] = $row['nama'];
            $_SESSION['kontol'] = 'kontol';
            header("location: ../index2.php");
            // var_dump($row);
        }

    }

?>