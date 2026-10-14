<?php
$ukuran = $_POST["ukuran"];
$warna = $_POST["warna"];
$halaman = $_POST["halaman"];
$rangkap = $_POST["rangkap"];

$tarif = 0;
$total = 0;
$valid = false;
$pesan = "Perhitungan belum dibuat.";

if (
    isset($_POST["ukuran"]) && isset($_POST["warna"]) && isset($_POST["halaman"]) && isset($_POST["rangkap"])
) {
    $ukuran = $_POST["ukuran"];
    $warna = $_POST["warna"];
    $halaman = $_POST["halaman"];
    $rangkap = $_POST["rangkap"];

    if ($ukuran == "A4" && $warna == "Hitam Putih") {
        $tarif = 500;
        $valid = true;
    } elseif ($ukuran == "A4" && $warna == "Berwarna") {
        $tarif = 1500;
        $valid = true;
    } elseif ($ukuran == "F4" && $warna == "Hitam Putih") {
        $tarif = 700;
        $valid = true;
    } elseif ($ukuran == "F4" && $warna == "Berwarna") {
        $tarif = 1800;
        $valid = true;
    }

    if (
        filter_var($halaman, FILTER_VALIDATE_INT) === false ||
        filter_var($rangkap, FILTER_VALIDATE_INT) === false ||
        $halaman <= 0 ||
        $rangkap <= 0
    ) {
        $valid = false;
        $pesan = "Maaf, kami tidak bisa memproses permintaan anda.";
    } elseif ($valid) {
        $total = $tarif * $halaman * $rangkap;
        $pesan = "Perhitungan berhasil.";
    } else {
        $pesan = "Maaf, kami tidak bisa memproses permintaan anda.";
    }
} else {
    $valid = false;
    $pesan = "Maaf, kami tidak bisa memproses permintaan anda.";
}

