<?php

include 'connection.php';
header('Access-Control-Allow-Origin: http://localhost:5173');
header("Access-Control-Allow-Methods: POST, GET, OPTIONS, PUT, DELETE");
header('Access-Control-Allow-Headers: Content-Type');
$conn = getConnection();

$id = isset($_POST['id']) ? $_POST['id'] : '';
$nomor = isset($_POST['nomor']) ? $_POST['nomor'] : '';
$nama = isset($_POST['nama']) ? $_POST['nama'] : '';
$jenis_kelamin = isset($_POST['jenis_kelamin']) ? $_POST['jenis_kelamin'] : '';
$alamat = isset($_POST['alamat']) ? $_POST['alamat'] : '';
$no_hp = isset($_POST['no_hp']) ? $_POST['no_hp'] : '';
$tanggal_terdaftar = isset($_POST['tanggal_terdaftar']) ? $_POST['tanggal_terdaftar'] : '';

try {
    
    $query = "UPDATE anggota SET id = :id, nama = :nama, jenis_kelamin = :jenis_kelamin, alamat = :alamat, no_hp = :no_hp, tanggal_terdaftar = :tanggal_terdaftar WHERE nomor = :nomor";
    
   
    $statement = $conn->prepare($query);
    
    $statement->bindParam(':id', $id);
    $statement->bindParam(':nomor', $nomor);
    $statement->bindParam(':nama', $nama);
    $statement->bindParam(':jenis_kelamin', $jenis_kelamin);
    $statement->bindParam(':alamat', $alamat);
    $statement->bindParam(':no_hp', $no_hp);
    $statement->bindParam(':tanggal_terdaftar', $tanggal_terdaftar);
    
   
    $statement->execute();
    
    
    $response = [
        'status' => 'success',
        'message' => 'Data anggota berhasil diupdate'
    ];
} catch(PDOException $e) {
    
    $response = [
        'status' => 'error',
        'message' => 'Terjadi kesalahan saat memperbarui data anggota: ' . $e->getMessage()
    ];
}


echo json_encode($response);


$conn = null;
?>