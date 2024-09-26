<!DOCTYPE html>
<html>
<head>
    <title>Form Pembaruan Data</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css" crossorigin="anonymous"> 
</head>
<body>
<div class="container">
    <?php
    include "koneksi.php";

    function input($data) {
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }

    if (isset($_GET['id'])) {
        $id = input($_GET["id"]);
        $sql = "SELECT * FROM crud_penyidikan WHERE id=$id";
        $hasil = mysqli_query($kon, $sql);
        if (!$hasil) {
            echo "<div class='alert alert-danger'>Error: " . mysqli_error($kon) . "</div>";
            exit;
        }
        $data = mysqli_fetch_assoc($hasil);
        if (!$data) {
            echo "<div class='alert alert-danger'>Data tidak ditemukan!</div>";
            exit;
        }
    }

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $id = input($_POST["id"]);
        $nama_dik = input($_POST["nama_dik"]);
        $nama_sesuai_p8 = input($_POST["nama_sesuai_p8"]);
        $p_8 = input($_POST["p_8"]);
        $identitas_tersangka = input($_POST["identitas_tersangka"]);
        $status_tersangka = input($_POST["status_tersangka"]);
        $nomor_dan_tanggal = input($_POST["nomor_dan_tanggal"]);
        $perhentian_dik = input($_POST["perhentian_dik"]);
        $pengalihan = input($_POST["pengalihan"]);
        $pelimpahan = input($_POST["pelimpahan"]);
        $keterangan = input($_POST["keterangan"]);

        $sql = "UPDATE crud_penyidikan SET
            nama_dik='$nama_dik',
            nama_sesuai_p8='$nama_sesuai_p8',
            p_8='$p_8',
            identitas_tersangka='$identitas_tersangka',
            status_tersangka='$status_tersangka',
            nomor_dan_tanggal='$nomor_dan_tanggal',
            perhentian_dik ='$perhentian_dik',
            pengalihan='$pengalihan',
            pelimpahan='$pelimpahan',
            keterangan='$keterangan'
            WHERE id=$id";

        if (mysqli_query($kon, $sql)) {
            header("Location:sheet3.php");
        } else {
            echo "<div class='alert alert-danger'>Error: " . mysqli_error($kon) . "</div>";
        }
    }
    ?>
    <h2>Update Data</h2>

    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
        <div class="form-group">
            <label>Nama Dik</label>
            <input type="text" name="nama_dik" class="form-control" value="<?php echo isset($data['nama_dik']) ? $data['nama_dik'] : ''; ?>" required />
        </div>
        <div class="form-group">
            <label>Nama Sesuai P8 </label>
            <input type="text" name="nama_sesuai_p8" class="form-control" value="<?php echo isset($data['nama_sesuai_p8']) ? $data['nama_sesuai_p8'] : ''; ?>" required />
        </div>
        <div class="form-group">
            <label>P8</label>
            <input type="text" name="p_8" class="form-control" value="<?php echo isset($data['p_8']) ? $data['p_8'] : ''; ?>" required />
        </div>
        <div class="form-group">
            <label>Identitas Tersangka</label>
            <input type="text" name="identitas_tersangka" class="form-control" value="<?php echo isset($data['identitas_tersangka']) ? $data['identitas_tersangka'] : ''; ?>" required />
        </div>
        <div class="form-group">
            <label>Status Tersangka</label>
            <input type="text" name="status_tersangka" class="form-control" value="<?php echo isset($data['status_tersangka']) ? $data['status_tersangka'] : ''; ?>" required />
        </div>
        <div class="form-group">
            <label>Nomor & Tanggal </label>
            <input type="text" name="nomor_dan_tanggal" class="form-control" value="<?php echo isset($data['nomor_dan_tanggal']) ? $data['nomor_dan_tanggal'] : ''; ?>" required />
        </div>
        <div class="form-group">
            <label>Perhentian Dik</label>
            <input type="text" name="perhentian_dik" class="form-control" value="<?php echo isset($data['perhentian_dik']) ? $data['perhentian_dik'] : ''; ?>" required />
        </div>
        <div class="form-group">
            <label>Pengalihan</label>
            <input type="text" name="pengalihan" class="form-control" value="<?php echo isset($data['pengalihan']) ? $data['pengalihan'] : ''; ?>" required />
        </div> <div class="form-group">
            <label>Pelimpahan</label>
            <input type="text" name="pelimpahan" class="form-control" value="<?php echo isset($data['pelimpahan']) ? $data['pelimpahan'] : ''; ?>" required />
        </div>
        <div class="form-group">
            <label>Keterangan:</label>
            <textarea name="keterangan" class="form-control" required><?php echo isset($data['keterangan']) ? $data['keterangan'] : ''; ?></textarea>
        </div>
        <input type="hidden" name="id" value="<?php echo isset($data['id']) ? $data['id'] : ''; ?>" />
        <button type="submit" name="submit" class="btn btn-primary">Submit</button>
    </form>
</div>
</body>
</html>
