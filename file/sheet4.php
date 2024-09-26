<!DOCTYPE html>
<html>

<head>

    <title>Data Kejaksaan</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css" crossorigin="anonymous">
    <link rel="stylesheet" href="sheett2.css">
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
                    <input id="search-input" type="search" class="form-control" placeholder="Cari Bio Terdakwa" />
                </div>
                <!-- <button id="exportButton" class="btn btn-success mr-2">Export Excel</button> -->
                <!-- <a href="create4.php" class="btn btn-primary mr-2">Tambah Data</a>
                <a href="logout.php" class="btn btn-danger">Logout</a> -->
                <a href="create.php" class="btn mr-2" style="background-color: #17a2b8; color: white;">Tambah Data</a>
                <a href="logout.php" class="btn" style="background-color: #FF8C9E; color: white;">Logout</a>
            </div>
        </div>
        <div class="table-container">
            <table id="data1" class="table table-bordered table-hover">
                <thead class="thead-custom" style="background-color: #FF8C9E; color: white;">
                    <tr>
                        <th class="no-column">No.</th>
                        <th class="kode-column">Bio <br> Terdakwa</th>
                        <th class="no-reg">No/Perkara/Bukti <br> Reg</th>
                        <th class="nama-column">Tindak <br> Pidana</th>
                        <th>Pasal <br> Dakwaan</th>
                        <th class="telaahan-column">Acara <br> pelimpahan</th>
                        <th class="sprintug-column">Penghentian <br> Penuntutan</th>
                        <th class="tanggal-sprintug-column">Surat <br> tuntutan</th>
                        <th class="laphastug-column">Putusan <br> Pengadilan</th>
                        <th class="laphastug-column">Banding <br> Terdakwa</th>
                        <th class="keterangan-column">Putusan <br> Kasasi</th>
                        <th class="keterangan-column">Grasi</th>
                        <!-- <th class="eksekusi-column">Eksekusi</th> -->
                        <th class="keterangan-column">Keterangan</th>
                        <th colspan="2" class="aksi-column">Aksi</th>

                    </tr>
                </thead>
                <tbody>
                    <?php
                    include "koneksi.php";
                    $sql = "SELECT * FROM crud_penuntutan ORDER BY id";
                    $hasil = mysqli_query($kon, $sql);
                    while ($data = mysqli_fetch_array($hasil)) {
                        echo "<tr>";
                        echo "<td>" . $data['id'] . "</td>";
                        echo "<td class='kode-column'>" . html_entity_decode($data['terdakwa'], ENT_QUOTES, 'UTF-8') . "</td>";
                        echo "<td>" . html_entity_decode($data['nomor_reg'], ENT_QUOTES, 'UTF-8') . "</td>";
                        echo "<td class='nama-column' data-fulltext='" . html_entity_decode($data['jenis_tindak_pidana'], ENT_QUOTES, 'UTF-8') . "'>" . html_entity_decode($data['jenis_tindak_pidana'], ENT_QUOTES, 'UTF-8') . "</td>";
                        echo "<td>" . html_entity_decode($data['pasal_yang_didakwakan'], ENT_QUOTES, 'UTF-8') . "</td>";
                        echo "<td class='telaahan-column'>" . html_entity_decode($data['acara_biasa'], ENT_QUOTES, 'UTF-8') . "</td>";
                        echo "<td class='sprintug-column'>" . html_entity_decode($data['penghentian_penuntutan'], ENT_QUOTES, 'UTF-8') . "</td>";
                        echo "<td>" . html_entity_decode($data['tgl_pasal_surat'], ENT_QUOTES, 'UTF-8') . "</td>";
                        echo "<td>" . html_entity_decode($data['tgl_pasal_amar'], ENT_QUOTES, 'UTF-8') . "</td>";
                        echo "<td>" . html_entity_decode($data['banding'], ENT_QUOTES, 'UTF-8') . "</td>";
                        echo "<td>" . html_entity_decode($data['kasasi'], ENT_QUOTES, 'UTF-8') . "</td>";
                        echo "<td>" . html_entity_decode($data['grasi'], ENT_QUOTES, 'UTF-8') . "</td>";
                        // echo "<td>" . html_entity_decode($data['eksekusi'], ENT_QUOTES, 'UTF-8') . "</td>";
                        echo "<td class='keterangan-column'>" . html_entity_decode($data['keterangan'], ENT_QUOTES, 'UTF-8') . "</td>";
                        echo "<td class='aksi-column'>
                    <a href='update4.php?id=" . $data['id'] . "' class='btn btn-sm' style='background-color: #17a2b8; color: white;'>Update</a>
                    <a href='delete4.php?id=" . $data['id'] . "' class='btn btn-sm' style='background-color: #FF8C9E; color: white;' onclick=\"return confirm('Apakah anda yakin ingin menghapus data ini?')\">Delete</a></td>";
                        echo "</tr>";
                    }

                    ?>
                </tbody>
            </table>
        </div>
    </div>
    <script>
        $(document).ready(function() {
            $("#exportButton").click(function() {
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