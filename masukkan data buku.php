<h3> Tambah Informasi Buku </h3>

<form action="" method="post">
    <table>
        <tr>
            <td width = "130" > Kode Kategori </td>
            <td><input type="text" name="kode_kategori"></td>
        </tr>
        <tr>
            <td width = "130" > Kode Buku </td>
            <td><input type="text" name="kode"></td>
        </tr>
        <tr>
            <td width = "130" > Judul </td>
            <td><input type="text" name="judul"></td>
        </tr>
        <tr>
            <td width = "130" > Pengarang </td>
            <td><input type="text" name="pengarang"></td>
        </tr>
        <tr>
            <td width = "130" > Penerbit </td>
            <td><input type="text" name="penerbit"></td>
        </tr>
        <tr>
            <td width = "130" > Tahun </td>
            <td><input type="text" name="tahun"></td>
        </tr>
        <tr>
            <td width = "130" > Tanggal Input </td>
            <td><input type="text" name="tanggal_input"></td>
        </tr>
        <tr>
            <td width = "130" > Harga </td>
            <td><input type="text" name="harga"></td>
        </tr>
        <tr>
            <td width = "130" > File Cover </td>
            <td><input type="text" name="file_cover"></td>
        </tr>
        <tr>
            <td></td>
            <td><input type="submit" value="Simpan" name="proses"></td>
        </tr>

    </table>
</form>

<?php
include "koneksi.php";

if (isset($_POST['proses'])){
    mysqli_query($koneksi,"insert into buku set
    kode_kategori = '$_POST[kode_kategori]',
    kode = '$_POST[kode]',
    judul = '$_POST[judul]',
    pengarang = '$_POST[pengarang]',
    penerbit = '$_POST[penerbit]',
    tahun = '$_POST[tahun]',
    tanggal_input = '$_POST[tanggal_input]',
    harga = '$_POST[harga]',
    file_cover = '$_POST[file_cover]'");
    echo "Data Buku Tersimpan";
}
?>