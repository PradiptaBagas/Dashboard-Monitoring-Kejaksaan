<!DOCTYPE html>
<html lang="id">
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
        $terdakwa = input($_POST["terdakwa"]);
        $nomor_reg = input($_POST["nomor_reg"]);
        $jenis_tindak_pidana = input($_POST["jenis_tindak_pidana"]);
        $pasal_yang_didakwakan = input($_POST["pasal_yang_didakwakan"]);
        $acara_biasa = input($_POST["acara_biasa"]);
        $penghentian_penuntutan = input($_POST["penghentian_penuntutan"]);
        $tgl_pasal_surat = input($_POST["tgl_pasal_surat"]);
        $tgl_pasal_amar = input($_POST["tgl_pasal_amar"]);
        $banding = input($_POST["banding"]);
        $kasasi = input($_POST["kasasi"]);
        $grasi = input($_POST["grasi"]);
        $eksekusi = input($_POST["eksekusi"]);
        $keterangan = input($_POST["keterangan"]);

        $sql = "INSERT INTO crud_penuntutan (id, terdakwa, nomor_reg, jenis_tindak_pidana, pasal_yang_didakwakan, acara_biasa, penghentian_penuntutan, tgl_pasal_surat, tgl_pasal_amar, banding, kasasi, grasi, eksekusi, keterangan) 
                VALUES ('$id', '$terdakwa', '$nomor_reg', '$jenis_tindak_pidana', '$pasal_yang_didakwakan', '$acara_biasa', '$penghentian_penuntutan', '$tgl_pasal_surat', '$tgl_pasal_amar', '$banding', '$kasasi', '$grasi', '$eksekusi', '$keterangan')";

        if (mysqli_query($kon, $sql)) {
            header("Location: sheet4.php");
        } else {
            echo "<div class='alert alert-danger'>Data Gagal disimpan.</div>";
        }
    }
    ?>
    <h2>Input Data</h2>

    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
        <div class="form-group">
            <label>Terdakwa:</label>
            <input type="text" name="terdakwa" class="form-control" placeholder="Masukan Nama Terdakwa" required />
        </div>
        <div class="form-group">
            <label>Nomor Reg:</label>
            <input type="text" name="nomor_reg" class="form-control" placeholder="Masukan Nomor Reg" required />
        </div>
        <div class="form-group">
            <label>Jenis Tindak Pidana:</label>
            <input type="text" name="jenis_tindak_pidana" class="form-control" placeholder="Masukan Jenis Tindak Pidana" required />
        </div>
        <div class="form-group">
            <label>Pasal yang Didakwakan:</label>
            <input type="text" name="pasal_yang_didakwakan" class="form-control" required />
        </div>
        <div class="form-group">
            <label>Acara Biasa:</label>
            <input type="text" name="acara_biasa" class="form-control" placeholder="Masukan Acara Biasa" required />
        </div>
        <div class="form-group">
            <label>Penghentian Penuntutan:</label>
            <input type="text" name="penghentian_penuntutan" class="form-control" placeholder="Masukan Penghentian Penuntutan" required />
        </div>
        <div class="form-group">
            <label>Tanggal Pasal Surat:</label>
            <input type="text" name="tgl_pasal_surat" class="form-control" required />
        </div>
        <div class="form-group">
            <label>Tanggal Pasal dan Amar:</label>
            <input type="text" name="tgl_pasal_amar" class="form-control" required />
        </div>
        <div class="form-group">
            <label>Banding:</label>
            <input type="text" name="banding" class="form-control" required />
        </div>
        <div class="form-group">
            <label>Kasasi:</label>
            <input type="text" name="kasasi" class="form-control" required />
        </div>
        <div class="form-group">
            <label>Grasi:</label>
            <input type="text" name="grasi" class="form-control" required />
        </div>
        <div class="form-group">
            <label>Eksekusi:</label>
            <input type="text" name="eksekusi" class="form-control" required />
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
