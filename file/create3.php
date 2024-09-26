<!DOCTYPE html>
<html>
<head>
    <title>Form Pendaftaran Peserta</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css" crossorigin="anonymous">
</head>
<body>
<div class="container my-4">
    <?php
    include "koneksi.php";

    function input($data) {
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }
    
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $id = input($_POST["id"]);
        $nama_dik = input($_POST["nama_dik"]);
        $nama_sesuai_p8 = input($_POST["nama_sesuai_p8"]);
        $p_8 = input($_POST["P_8"]);
        $identitas_tersangka = input($_POST["identitas_tersangka"]);
        $status_tersangka = input($_POST["status_tersangka"]);
        $nomor_dan_tanggal = input($_POST["nomor_dan_tanggal"]);
        $perhentian_dik = input($_POST["perhentian_dik"]);
        $pengalihan = input($_POST["pengalihan"]);
        $pelimpahan = input($_POST["pelimpahan"]);
        $keterangan = input($_POST["keterangan"]);

        $sql = "INSERT INTO crud_penyidikan (id, nama_dik, nama_sesuai_p8, p_8, identitas_tersangka, status_tersangka, nomor_dan_tanggal, perhentian_dik, pengalihan, pelimpahan, keterangan) 
                VALUES ('$id', '$nama_dik', '$nama_sesuai_p8', '$p_8', '$identitas_tersangka', '$status_tersangka', '$nomor_dan_tanggal', '$perhentian_dik', '$pengalihan', '$pelimpahan', '$keterangan')";

        if (mysqli_query($kon, $sql)) {
            header("Location: sheet3.php");
        } else {
            echo "<div class='alert alert-danger'>Data Gagal disimpan.</div>";
        }
    }
    ?>
    <h2>Input Data</h2>

    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
        <div class="form-group">
            <label>Nama Dik :</label>
            <input type="text" name="nama_dik" class="form-control" placeholder="Masukan Nama DIK" required />
        </div>
        <div class="form-group">
            <label>Nama Sesuai P8:</label>
            <input type="text" name="nama_sesuai_p8" class="form-control" placeholder="Masukan Nama Sesuai P8" required />
        </div>
        <div class="form-group">
            <label>P-8 (No & Tgl) :</label>
            <input type="text" name="P_8" class="form-control" placeholder="Masukan P8" required />
        </div>
        <div class="form-group">
            <label>Identitas Tersangka:</label>
            <input type="text" name="identitas_tersangka" class="form-control" required />
        </div>
        <div class="form-group">
            <label>Status Tersangka:</label>
            <input type="text" name="status_tersangka" class="form-control" placeholder="Masukan Status Tersangka" required />
        </div>
        <div class="form-group">
            <label>Nomor dan Tanggal Register :</label>
            <input type="text" name="nomor_dan_tanggal" class="form-control" placeholder="Masukan Nomor dan Tanggal" required />
        </div>
        <div class="form-group">
            <label>Perhentian DIK :</label>
            <input type="text" name="perhentian_dik" class="form-control" required />
        </div>
        <div class="form-group">
            <label>Pengalihan :</label>
            <input type="text" name="pengalihan" class="form-control" required />
        </div>
        <div class="form-group">
            <label>Pelimpahan :</label>
            <input type="text" name="pelimpahan" class="form-control" required />
        </div>
        <div class="form-group">
            <label>Keterangan:</label>
            <textarea name="keterangan" class="form-control" placeholder="Masukan Keterangan" required></textarea>
        </div>
        <input type="hidden" name="id" value="<?php echo isset($data['id']) ? $data['id'] : ''; ?>" />
        <button type="submit" name="submit" class="btn btn-primary">Submit</button>
    </form>
</div>
</body>
</html>
