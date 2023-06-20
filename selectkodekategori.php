<?php
include 'koneksi.php';

// Mendapatkan data dari request
$kode = $_GET['kode'];

// Query SQL untuk mengambil data buku berdasarkan kode
$sql = "SELECT * FROM kategori WHERE kode='$kode'";
$result = $koneksi->query($sql);

if ($result->num_rows > 0) {
    $buku = $result->fetch_assoc();
    $response = [
        'status' => 'success',
        'data' => $buku
    ];
} else {
    $response = [
        'status' => 'error',
        'message' => 'Data buku tidak ditemukan.'
    ];
}

echo json_encode($response);
?>