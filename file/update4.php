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
        $sql = "SELECT * FROM crud_penuntutan WHERE id=$id";
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

        $sql = "UPDATE crud_penuntutan SET
            terdakwa='$terdakwa',
            nomor_reg='$nomor_reg',
            jenis_tindak_pidana='$jenis_tindak_pidana',
            pasal_yang_didakwakan='$pasal_yang_didakwakan',
            acara_biasa='$acara_biasa',
            penghentian_penuntutan='$penghentian_penuntutan',
            tgl_pasal_surat='$tgl_pasal_surat',
            tgl_pasal_amar='$tgl_pasal_amar',
            banding='$banding',
            kasasi='$kasasi',
            grasi='$grasi',
            eksekusi='$eksekusi',
            keterangan='$keterangan'
            WHERE id=$id";

        if (mysqli_query($kon, $sql)) {
            header("Location: sheet4.php");
        } else {
            echo "<div class='alert alert-danger'>Error: " . mysqli_error($kon) . "</div>";
        }
    }
    ?>
    <h2>Form Pembaruan Data</h2>

    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
        <div class="form-group">
            <label>Terdakwa</label>
            <input type="text" name="terdakwa" class="form-control" value="<?php echo isset($data['terdakwa']) ? $data['terdakwa'] : ''; ?>" required />
        </div>
        <div class="form-group">
            <label>Nomor Reg</label>
            <input type="text" name="nomor_reg" class="form-control" value="<?php echo isset($data['nomor_reg']) ? $data['nomor_reg'] : ''; ?>" required />
        </div>
        <div class="form-group">
            <label>Jenis Tindak Pidana</label>
            <input type="text" name="jenis_tindak_pidana" class="form-control" value="<?php echo isset($data['jenis_tindak_pidana']) ? $data['jenis_tindak_pidana'] : ''; ?>" required />
        </div>
        <div class="form-group">
            <label>Pasal yang Didakwakan</label>
            <input type="text" name="pasal_yang_didakwakan" class="form-control" value="<?php echo isset($data['pasal_yang_didakwakan']) ? $data['pasal_yang_didakwakan'] : ''; ?>" required />
        </div>
        <div class="form-group">
            <label>Acara Biasa (Tgl. Pelimpahan)</label>
            <input type="text" name="acara_biasa" class="form-control" value="<?php echo isset($data['acara_biasa']) ? $data['acara_biasa'] : ''; ?>" required />
        </div>
        <div class="form-group">
            <label>Penghentian Penuntutan</label>
            <input type="text" name="penghentian_penuntutan" class="form-control" value="<?php echo isset($data['penghentian_penuntutan']) ? $data['penghentian_penuntutan'] : ''; ?>" required />
        </div>
        <div class="form-group">
            <label>Tanggal Pasal Surat Tuntutan</label>
            <input type="text" name="tgl_pasal_surat" class="form-control" value="<?php echo isset($data['tgl_pasal_surat']) ? $data['tgl_pasal_surat'] : ''; ?>" required />
        </div>
        <div class="form-group">
            <label>Tanggal Pasal dan Amar Putusan Pengadilan</label>
            <input type="text" name="tgl_pasal_amar" class="form-control" value="<?php echo isset($data['tgl_pasal_amar']) ? $data['tgl_pasal_amar'] : ''; ?>" required />
        </div>
        <div class="form-group">
            <label>Banding</label>
            <input type="text" name="banding" class="form-control" value="<?php echo isset($data['banding']) ? $data['banding'] : ''; ?>" required />
        </div>
        <div class="form-group">
            <label>Kasasi</label>
            <input type="text" name="kasasi" class="form-control" value="<?php echo isset($data['kasasi']) ? $data['kasasi'] : ''; ?>" required />
        </div>
        <div class="form-group">
            <label>Grasi</label>
            <input type="text" name="grasi" class="form-control" value="<?php echo isset($data['grasi']) ? $data['grasi'] : ''; ?>" required />
        </div>
        <div class="form-group">
            <label>Eksekusi</label>
            <input type="text" name="eksekusi" class="form-control" value="<?php echo isset($data['eksekusi']) ? $data['eksekusi'] : ''; ?>" required />
        </div>
        <div class="form-group">
            <label>Keterangan</label>
            <textarea name="keterangan" class="form-control" required><?php echo isset($data['keterangan']) ? $data['keterangan'] : ''; ?></textarea>
        </div>
        <input type="hidden" name="id" value="<?php echo isset($data['id']) ? $data['id'] : ''; ?>" />
        <button type="submit" name="submit" class="btn btn-primary">Submit</button>
    </form>
</div>
</body>
</html>
