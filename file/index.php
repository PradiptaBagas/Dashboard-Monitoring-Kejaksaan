<!DOCTYPE html>
<html>
<head>
    <title>Data Kejaksaan</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css" crossorigin="anonymous">
    <link rel="stylesheet" href="indexx.css">
    <script src="//ajax.googleapis.com/ajax/libs/jquery/2.2.4/jquery.min.js"></script>
    <script src="jquery.table2excel.js"></script>
</head>
<body>
    <nav class="navbar navbar-dark" style="background-color: #FF8C9E;">
        <div class="navbar-brand mb-0 h1">
            <span>PAPAN KONTROL PERKARA - PIDSUS</span>
        </div> 
        <div class="d-flex justify-content-end mt-3">
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
                <!-- <a href="create.php" class="btn btn-primary mr-2">Tambah Data</a>
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
                        <th class = "kode-column">Kode</th>
                        <th>Nama Singkat Tug</th>
                        <th class="nama-column">Nama Tug</th>
                        <th>Sumber</th>
                        <th class="telaahan-column">Telaahan</th>
                        <th class="sprintug-column">Sprintug</th>
                        <th class="tanggal-sprintug-column">Tanggal Sprintug</th>
                        <th class="laphastug-column">Laphastug</th>
                        <th class="keterangan-column">Keterangan</th>
                        <th colspan="2">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                <?php
                include "koneksi.php";
                $sql = "SELECT * FROM crud_kejaksaan ORDER BY id";
                $hasil = mysqli_query($kon, $sql);
                while ($data = mysqli_fetch_array($hasil)) {
                    echo "<tr>";
                    echo "<td>".$data['id']."</td>";
                    echo "<td class='kode'>".(isset($data['kode']) ? $data['kode'] : 'N/A')."</td>";
                    echo "<td>" . (isset($data['nama_singkat_tug']) ? html_entity_decode($data['nama_singkat_tug'], ENT_QUOTES, 'UTF-8') : 'N/A') . "</td>";
                    echo "<td class='nama-column' data-fulltext='" . (isset($data['nama_tug']) ? html_entity_decode($data['nama_tug'], ENT_QUOTES, 'UTF-8') : 'N/A') . "'>" . (isset($data['nama_tug']) ? html_entity_decode($data['nama_tug'], ENT_QUOTES, 'UTF-8') : 'N/A') . "</td>";
                    echo "<td>" . (isset($data['sumber']) ? html_entity_decode($data['sumber'], ENT_QUOTES, 'UTF-8') : 'N/A') . "</td>";
                    echo "<td class='telaahan-column'>" . (isset($data['telaahan']) ? html_entity_decode($data['telaahan'], ENT_QUOTES, 'UTF-8') : 'N/A') . "</td>";
                    echo "<td class='sprintug-column'>" . (isset($data['sprintug']) ? html_entity_decode($data['sprintug'], ENT_QUOTES, 'UTF-8') : 'N/A') . "</td>";
                    echo "<td>" . (isset($data['tanggal_sprintug']) ? html_entity_decode($data['tanggal_sprintug'], ENT_QUOTES, 'UTF-8') : 'N/A') . "</td>";
                    echo "<td class='laphastug-column'>" . (isset($data['laphastug']) ? html_entity_decode($data['laphastug'], ENT_QUOTES, 'UTF-8') : 'N/A') . "</td>";
                    echo "<td class='keterangan-column'>" . (isset($data['keterangan']) ? html_entity_decode($data['keterangan'], ENT_QUOTES, 'UTF-8') : 'N/A') . "</td>";                    
                    echo "<td><a href='update.php?id=".$data['id']."' class='btn' style='background-color: #17a2b8; color: white;' role='button'>Update</a></td>";
                    echo "<td><a href='delete.php?id=".$data['id']."' class='btn' style='background-color: #FF8C9E; color: white;' role='button' onclick=\"return confirm('Apakah anda yakin ingin menghapus data ini?')\">Delete</a></td>";
                    // echo "<td><a href='update.php?id=".$data['id']."' class='btn btn-warning' role='button'>Update</a></td>";
                    // echo "<td><a href='delete.php?id=".$data['id']."' class='btn btn-danger' role='button' onclick=\"return confirm('Apakah anda yakin ingin menghapus data ini?')\">Delete</a></td>";
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
    
    
<script> $("#exportButton").click(function() {
        $("#data1").table2excel({
            exclude: ".noExl",
            name: "Data Kejaksaan",
            filename: "data_kejaksaan",
            fileext: ".xls",
            preserveColors: true
        });
    });

    $("#sheet1Button").click(function() {
        $("#data1").closest(".table-container").removeClass("d-none");
        $("#table2").addClass("d-none");
    });

    $("#sheet2Button").click(function() {
        $("#table2").removeClass("d-none");
        $("#data1").closest(".table-container").addClass("d-none");
    });

    $("#search-input").on("keyup", filterTable);
</script>


</body>
</html>
