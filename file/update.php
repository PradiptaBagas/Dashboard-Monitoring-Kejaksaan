<!DOCTYPE html>
<html>
<head>
    <title>Form Pendaftaran Anggota</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css" integrity="sha384-zCbKRCUGaJDkqS1kPbPd7TveP5iyJE0EjAuZQTgFLD2ylzuqKfdKlfG/eSrtxUkn" crossorigin="anonymous"> 
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
        $sql = "SELECT * FROM crud_kejaksaan WHERE id=$id";
        $hasil = mysqli_query($kon, $sql);
        $data = mysqli_fetch_assoc($hasil);
        if (!$data) {
            echo "<div class='alert alert-danger'>Data tidak ditemukan!</div>";
            exit;
        }
    }

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $id = input($_POST["id"]);
        $kode = input($_POST["kode"]);
        $nama_singkat_tug = input($_POST["nama_singkat_tug"]);
        $nama_tug = input($_POST["nama_tug"]);
        $sumber = input($_POST["sumber"]);
        $telaahan = input($_POST["telaahan"]);
        $sprintug = input($_POST["sprintug"]);
        $tanggal_sprintug = input($_POST["tanggal_sprintug"]);
        $laphastug = input($_POST["laphastug"]);
        $keterangan = input($_POST["keterangan"]);

        $sql = "UPDATE crud_kejaksaan SET
            kode='$kode',
            nama_singkat_tug='$nama_singkat_tug',
            nama_tug='$nama_tug',
            sumber='$sumber',
            telaahan='$telaahan',
            sprintug='$sprintug',
            tanggal_sprintug='$tanggal_sprintug',
            laphastug='$laphastug',
            keterangan='$keterangan'
            WHERE id='$id'";
        $hasil = mysqli_query($kon, $sql);
        if ($hasil) {
            header("Location:index.php");
        } else {
            echo "<div class='alert alert-danger'> Data Gagal disimpan. Error: " . mysqli_error($kon) . "</div>";
        }
    }
    ?>
    <h2>Update Data</h2>
    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
        <div class="form-group">
            <label>Kode :</label>
            <input type="text" name="kode" class="form-control" placeholder="Masukan kode" value="<?php echo isset($data['kode']) ? $data['kode'] : ''; ?>" required />
        </div>
        <div class="form-group">
            <label>Nama Singkat Tug :</label>
            <input type="text" name="nama_singkat_tug" class="form-control" placeholder="Masukan Nama Singkat Tug" value="<?php echo isset($data['nama_singkat_tug']) ? $data['nama_singkat_tug'] : ''; ?>" required />
        </div>
        <div class="form-group">
            <label>Nama Tug :</label>
            <input type="text" name="nama_tug" class="form-control" placeholder="Masukan Nama Tug" value="<?php echo isset($data['nama_tug']) ? $data['nama_tug'] : ''; ?>" required />
        </div>
        <div class="form-group">
            <label>Sumber :</label>
            <input type="text" name="sumber" class="form-control" placeholder="Masukan Sumber" value="<?php echo isset($data['sumber']) ? $data['sumber'] : ''; ?>" required />
        </div>
        <div class="form-group">
            <label>Telahaan :</label>
            <input type="date" name="telaahan" class="form-control" placeholder="Masukan telaahan" value="<?php echo isset($data['telaahan']) ? $data['telaahan'] : ''; ?>" required />
        </div>
        <div class="form-group">
            <label>Sprintug :</label>
            <input type="text" name="sprintug" class="form-control" placeholder="Masukan sprintug" value="<?php echo isset($data['sprintug']) ? $data['sprintug'] : ''; ?>" required />
        </div>
        <div class="form-group">
            <label>Tanggal Sprintug :</label>
            <input type="date" name="tanggal_sprintug" class="form-control" placeholder="Masukan Tanggal Sprintug" value="<?php echo isset($data['tanggal_sprintug']) ? $data['tanggal_sprintug'] : ''; ?>" required />
        </div>
        <div class="form-group">
            <label>Laphastug :</label>
            <input type="text" name="laphastug" class="form-control" placeholder="Masukan laphastug" value="<?php echo isset($data['laphastug']) ? $data['laphastug'] : ''; ?>" required />
        </div>
        <div class="form-group">
            <label>Keterangan :</label>
            <input type="text" name="keterangan" class="form-control" placeholder="Masukan Keterangan" value="<?php echo isset($data['keterangan']) ? $data['keterangan'] : ''; ?>" required />
        </div>
        <input type="hidden" name="id" value="<?php echo isset($data['id']) ? $data['id'] : ''; ?>" />
        <button type="submit" name="submit" class="btn btn-primary">Submit</button>
    </form>
</div>
</body>
</html>
