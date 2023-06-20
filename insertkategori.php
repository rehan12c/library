<?php
include 'koneksi.php';

// Memeriksa apakah data telah dikirim melalui metode POST
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    // Memeriksa apakah elemen-elemen yang dibutuhkan tersedia dalam array $_POST
    if (isset($_POST['kode'], $_POST['katagori'])) {
        // Mendapatkan data dari request
        $kode = $_POST['kode'];
        $kategori = $_POST['kategori'];

        // Query SQL untuk memasukkan data buku ke database
        $sql = "INSERT INTO katagori (kode, kategori) 
                VALUES ('$kode', '$kode_kategori')";

        if ($koneksi->query($sql) === TRUE) {
            $response = [
                'status' => 'success',
                'message' => 'Data buku berhasil ditambahkan.'
            ];
        } else {
            $response = [
                'status' => 'error',
                'message' => 'Terjadi kesalahan: ' . $koneksi->error
            ];
        }
    } else {
        $response = [
            'status' => 'error',
            'message' => 'Data yang diperlukan tidak lengkap.'
        ];
    }
} else {
    $response = [
        'status' => 'error',
        'message' => 'Metode request yang tidak valid.'
    ];
}

echo json_encode($response);
?>