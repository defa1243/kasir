<?php

include 'config/koneksi.php';
include 'function/proses.php';
include 'function/upload.php';

$db = new Koneksi;
$koneksi = $db->DBConnect();
$proses = new Proses($koneksi);
$upload = new Upload($koneksi);

error_reporting(1);
