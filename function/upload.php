<?php
class Upload{

    protected $db;
    function __construct($db){
        $this->db = $db;
    }
    function Upload($name)
    {
        
        $namafile = $_FILES[$name]['name'];
        $ukuranfile = $_FILES[$name]['size'];
        $error = $_FILES[$name]['error'];
        $tmpname = $_FILES[$name]['tmp_name'];
        
        // cek sudah memilih foto atau belum
        if($error === 4){
            echo '<script>alert("Pilih Foto Terlebih Dahulu") </script>';
            return false;
        }

        $extensivalid = ['jpg','png','jpeg'];
        $extensifoto = explode('.', $namafile);
        $extensifoto = strtolower(end($extensifoto));

        // cek file yang dikirim foto atau bukan
        if(!in_array($extensifoto,$extensivalid)){
            echo '<script>alert("Foto Harus Berformat PNG, JPG, JPEG") </script>';
            return false;
        }
        // cek ukuran file agar tidak terlalu besar
        if($ukuranfile > 10000000) {
            echo '<script>alert("Ukuran Foto Terlalu Besar") </script>';
            return false;
        }

        // agar nama foto tidak sama
        $namafilebaru = uniqid();
        $namafilebaru .= '.';
        $namafilebaru .=$extensifoto;

        // jika foto siap upload
        move_uploaded_file($tmpname, 'assets/images/' . $namafilebaru);

        return $namafilebaru;
    }
}