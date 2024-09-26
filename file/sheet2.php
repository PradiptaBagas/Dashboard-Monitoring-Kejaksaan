<!DOCTYPE html>
<html>
<head>
    <title>Data Kejaksaan</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css" crossorigin="anonymous">
    <link rel="stylesheet" href="indexx.css">
    <!-- <link rel="stylesheet" href="sheet2.css"> -->
    <script src="//ajax.googleapis.com/ajax/libs/jquery/2.2.4/jquery.min.js"></script>
    <script src="jquery.table2excel.js"></script>
</head>
<body>
        <nav class="navbar navbar-dark" style="background-color: #FF8C9E;">
        <div class="navbar-brand mb-0 h1">
            <span>PAPAN KONTROL PERKARA - PIDSUS</span>
        </div>
        <div class="d-flex justify-content-center mt-3">
            <button id="sheet1Button" class="btn btn-info mr-2"><a href="index.php" style="color:white;">SURAT TUGAS</a></button>
            <button id="sheet2Button" class="btn btn-info mr-2"><a href="sheet2.php" style="color:white;">PENYELIDIKAN</a></button>
            <button id="sheet3Button" class="btn btn-info mr-2"><a href="sheet3.php" style="color:white;">PENYIDIKAN</a></button>
            <button id="sheet4Button" class="btn btn-info mr-2"><a href="sheet4.php" style="color:white;">PENUNTUTAN</a></button>
        </div>
    </nav>
    <div class="container my-4">
        <div class="d-flex justify-content-between align-items-center mb-2">
            <div class="d-flex">
                <div class="form-outline" data-mdb-input-init>
                    <input id="search-input" type="search" class="form-control" placeholder="Cari Nama Singkat"/>
                </div>
                <!-- <button id="exportButton" class="btn btn-success mr-2">Export Excel</button> -->
                <!-- <a href="create2.php" class="btn btn-primary mr-2">Tambah Data</a>
                <a href="logout.php" class="btn btn-danger">Logout</a> -->
                <a href="create.php" class="btn mr-2" style="background-color: #17a2b8; color: white;">Tambah Data</a>
                <a href="logout.php" class="btn" style="background-color: #FF8C9E; color: white;">Logout</a>
            </div>
        </div>
        <div class="table-container">
            <table id="data1" class="table table-bordered table-hover">
                <thead class="thead-white">
                    <tr>
                        <th>No.</th>
                        <th class="kode-column">Nama Singkat</th>
                        <th>Nama Sesuai Sprint</th>
                        <th class="nama-column">Sprinlid (P-2)</th>
                        <th>Tanggal Sprint</th>
                        <th class="telaahan-column">Sumber Laporan Nomor</th>
                        <th class="sprintug-column">Instansi</th>
                        <th class="tanggal-sprintug-column">Ditutup</th>
                        <th class="laphastug-column">Ditingkatkan ke DIK</th>
                        <th class="keterangan-column">Keterangan</th>
                        <th colspan="2">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                <?php
                include "koneksi.php";
                $sql = "SELECT * FROM crud_penyelidikan ORDER BY id";
                $hasil = mysqli_query($kon, $sql);
                while ($data = mysqli_fetch_array($hasil)) {
                    echo "<tr>";
                    echo "<td>".$data['id']."</td>";
                    echo "<td class='kode-column'>" . html_entity_decode($data['nama_singkat'], ENT_QUOTES, 'UTF-8') . "</td>";
                    echo "<td>" . html_entity_decode($data['nama_sesuai_sprint'], ENT_QUOTES, 'UTF-8') . "</td>";
                    echo "<td class='nama-column' data-fulltext='" . html_entity_decode($data['sprinlid'], ENT_QUOTES, 'UTF-8') . "'>" . html_entity_decode($data['sprinlid'], ENT_QUOTES, 'UTF-8') . "</td>";
                    echo "<td>" . html_entity_decode($data['tanggal_sprint'], ENT_QUOTES, 'UTF-8') . "</td>";
                    echo "<td class='telaahan-column'>" . html_entity_decode($data['nama_pelapor'], ENT_QUOTES, 'UTF-8') . "</td>";
                    echo "<td class='sprintug-column'>" . html_entity_decode($data['identitas_terlapor'], ENT_QUOTES, 'UTF-8') . "</td>";
                    echo "<td>" . html_entity_decode($data['ditutup'], ENT_QUOTES, 'UTF-8') . "</td>";
                    echo "<td>" . html_entity_decode($data['ditingkatkan'], ENT_QUOTES, 'UTF-8') . "</td>";
                    echo "<td class='keterangan-column'>" . html_entity_decode($data['keterangan'], ENT_QUOTES, 'UTF-8') . "</td>";                    
                    echo "<td><a href='update.php?id=".$data['id']."' class='btn' style='background-color: #17a2b8; color: white;' role='button'>Update</a></td>";
                    echo "<td><a href='delete.php?id=".$data['id']."' class='btn' style='background-color: #FF8C9E; color: white;' role='button' onclick=\"return confirm('Apakah anda yakin ingin menghapus data ini?')\">Delete</a></td>";
                    // echo "<td><a href='update2.php?id=".$data['id']."' class='btn btn-warning' role='button'>Update</a></td>";
                    // echo "<td><a href='delete2.php?id=".$data['id']."' class='btn btn-danger' role='button' onclick=\"return confirm('Apakah anda yakin ingin menghapus data ini?')\">Delete</a></td>";
                    echo "</tr>";
                }
                ?>
                </tbody>
            </table>
        </div>
    </div>

    <script>
    $(document).ready(function(){
        $("#exportButton").click(function(){
            $("#data1").table2excel({
                filename: "data_keseluruhan.xls"
            });
        });
        $("#search-input").on("keyup", function() {
            var value = $(this).val().toLowerCase();
            $("#data1 tbody tr").filter(function() {
                $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
            });
        });
    });
    </script>
</body>
</html>
