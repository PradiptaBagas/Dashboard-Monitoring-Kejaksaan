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
        $nama_singkat = input($_POST["nama_singkat"]);
        $nama_sesuai_sprint = input($_POST["nama_sesuai_sprint"]);
        $sprinlid = input($_POST["sprinlid"]);
        $tanggal_sprint = input($_POST["tanggal_sprint"]);
        $nama_pelapor = input($_POST["nama_pelapor"]);
        $identitas_terlapor = input($_POST["identitas_terlapor"]);
        $ditutup = input($_POST["ditutup"]);
        $ditingkatkan = input($_POST["ditingkatkan"]);
        $keterangan = input($_POST["keterangan"]);

        $sql = "INSERT INTO crud_penyelidikan (id, nama_singkat, nama_sesuai_sprint, sprinlid, tanggal_sprint, nama_pelapor, identitas_terlapor, ditutup, ditingkatkan, keterangan) 
                VALUES ('$id', '$nama_singkat', '$nama_sesuai_sprint', '$sprinlid', '$tanggal_sprint', '$nama_pelapor', '$identitas_terlapor', '$ditutup', '$ditingkatkan', '$keterangan')";

        if (mysqli_query($kon, $sql)) {
            header("Location: sheet2.php");
        } else {
            echo "<div class='alert alert-danger'> Data Gagal disimpan.</div>";
        }
    }
    ?>
    <h2>Input Data</h2>

    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
        <div class="form-group">
            <label>Nama Singkat</label>
            <input type="text" name="nama_singkat" class="form-control" placeholder="Masukan Nama Sinkat" required />
        </div>
        <div class="form-group">
            <label>Nama Sesuai Sprint:</label>
            <input type="text" name="nama_sesuai_sprint" class="form-control" placeholder="Masukan Nama Sesuai Sprint" required />
        </div>
        <div class="form-group">
            <label>Sprinlid:</label>
            <input type="text" name="sprinlid" class="form-control" placeholder="Masukan Sprinlid" required />
        </div>
        <div class="form-group">
            <label>Tanggal Sprint:</label>
            <input type="date" name="tanggal_sprint" class="form-control" required />
        </div>
        <div class="form-group">
            <label>Nama Pelapor:</label>
            <input type="text" name="nama_pelapor" class="form-control" placeholder="Masukan Nama Pelapor" required />
        </div>
        <div class="form-group">
            <label>Identitas Terlapor:</label>
            <input type="text" name="identitas_terlapor" class="form-control" placeholder="Masukan Identitas Terlapor" required />
        </div>
        <div class="form-group">
            <label>Ditutup:</label>
            <input type="text" name="ditutup" class="form-control" required />
        </div>
        <div class="form-group">
            <label>Ditingkatkan:</label>
            <input type="text" name="ditingkatkan" class="form-control" required />
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
