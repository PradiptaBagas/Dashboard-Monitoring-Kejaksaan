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
        $sql = "SELECT * FROM crud_penyelidikan WHERE id=$id";
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
        $nama_singkat = input($_POST["nama_singkat"]);
        $nama_sesuai_sprint = input($_POST["nama_sesuai_sprint"]);
        $sprinlid = input($_POST["sprinlid"]);
        $tanggal_sprint = input($_POST["tanggal_sprint"]);
        $nama_pelapor = input($_POST["nama_pelapor"]);
        $identitas_terlapor = input($_POST["identitas_terlapor"]);
        $ditutup = input($_POST["ditutup"]);
        $ditingkatkan = input($_POST["ditingkatkan"]);
        $keterangan = input($_POST["keterangan"]);

        $sql = "UPDATE crud_penyelidikan SET
            nama_singkat='$nama_singkat',
            nama_sesuai_sprint='$nama_sesuai_sprint',
            sprinlid='$sprinlid',
            tanggal_sprint='$tanggal_sprint',
            nama_pelapor='$nama_pelapor',
            identitas_terlapor='$identitas_terlapor',
            ditutup='$ditutup',
            ditingkatkan='$ditingkatkan',
            keterangan='$keterangan'
            WHERE id=$id";


        if (mysqli_query($kon, $sql)) {
            header("Location:sheet2.php");
        } else {
            echo "<div class='alert alert-danger'>Error: " . mysqli_error($kon) . "</div>";
        }
    }
    ?>
    <h2>Update Data</h2>

    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
        <div class="form-group">
            <label>Nama Singkat</label>
            <input type="text" name="nama_singkat" class="form-control" value="<?php echo isset($data['nama_singkat']) ? $data['nama_singkat'] : ''; ?>" required /> 
        </div>
        <div class="form-group">
            <label>Nama Sesuai Sprint:</label>
            <input type="text" name="nama_sesuai_sprint" class="form-control" value="<?php echo isset($data['nama_sesuai_sprint']) ? $data['nama_sesuai_sprint'] : ''; ?>" required />
        </div>
        <div class="form-group">
            <label>Sprinlid:</label>
            <input type="text" name="sprinlid" class="form-control" value="<?php echo isset($data['sprinlid']) ? $data['sprinlid'] : ''; ?>" required />
        </div>
        <div class="form-group">
            <label>Tanggal Sprint:</label>
            <input type="date" name="tanggal_sprint" class="form-control" value="<?php echo isset($data['tanggal_sprint']) ? $data['tanggal_sprint'] : ''; ?>" required />
        </div>
        <div class="form-group">
            <label>Nama Pelapor:</label>
            <input type="text" name="nama_pelapor" class="form-control" value="<?php echo isset($data['nama_pelapor']) ? $data['nama_pelapor'] : ''; ?>" required />
        </div>
        <div class="form-group">
            <label>Identitas Terlapor:</label>
            <input type="text" name="identitas_terlapor" class="form-control" value="<?php echo isset($data['identitas_terlapor']) ? $data['identitas_terlapor'] : ''; ?>" required />
        </div>
        <div class="form-group">
            <label>Ditutup:</label>
            <input type="text" name="ditutup" class="form-control" value="<?php echo isset($data['ditutup']) ? $data['ditutup'] : ''; ?>" required />
        </div>
        <div class="form-group">
            <label>Ditingkatkan:</label>
            <input type="text" name="ditingkatkan" class="form-control" value="<?php echo isset($data['ditingkatkan']) ? $data['ditingkatkan'] : ''; ?>" required />
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
