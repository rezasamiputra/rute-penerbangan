<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data Rute Penerbangan</title>
    <link rel="stylesheet" href="library/css/bootstrap.min.css">
    <style>
        /* Warna latar belakang untuk baris ganjil */
        .table-striped tbody tr:nth-child(odd) {
            background-color: #f9f9f9;
        }

        /* Warna latar belakang untuk baris genap */
        .table-striped tbody tr:nth-child(even) {
            background-color: #ffffff;
        }
    </style>
</head>

<body>
    <div class="row justify-content-between">
        <div class="col-4">
            <div class="form-container m-3">
                <h2 class="text-center mb-3">Rute Penerbangan</h2>
                <form method="post">
                    <div class="form-group mb-3">
                        <label for="maskapai">Nama Maskapai:</label>
                        <input type="text" class="form-control" id="maskapai" name="maskapai" required>
                    </div>
                    <div class="form-group mb-3">
                        <label for="bandaraAsal">Bandara Asal:</label>
                        <select class="form-control" id="bandaraAsal" name="bandaraAsal" required>
                            <option value="Soekarno-Hatta (CGK)">Soekarno-Hatta (CGK)</option>
                            <option value="Husein Sastranegara (BDO)">Husein Sastranegara (BDO)</option>
                            <option value="Abdul Rachman Saleh (MLG)">Abdul Rachman Saleh (MLG)</option>
                            <option value="Juanda (SUB)">Juanda (SUB)</option>
                            <option value="Ngurah Rai (DPS)">Ngurah Rai (DPS)</option>
                            <option value="Hasanuddin (UPG)">Hasanuddin (UPG)</option>
                            <option value="Inanwatan (INX)">Inanwatan (INX)</option>
                            <option value="Sultan Iskandarmuda (BTJ)">Sultan Iskandarmuda (BTJ)</option>
                        </select>
                    </div>
                    <div class="form-group mb-3">
                        <label for="bandaraTujuan">Bandara Tujuan:</label>
                        <select class="form-control" id="bandaraTujuan" name="bandaraTujuan" required>
                            <option value="Soekarno-Hatta (CGK)">Soekarno-Hatta (CGK)</option>
                            <option value="Husein Sastranegara (BDO)">Husein Sastranegara (BDO)</option>
                            <option class="checked" value="Abdul Rachman Saleh (MLG)">Abdul Rachman Saleh (MLG)</option>
                            <option value="Juanda (SUB)">Juanda (SUB)</option>
                            <option value="Ngurah Rai (DPS)">Ngurah Rai (DPS)</option>
                            <option value="Hasanuddin (UPG)">Hasanuddin (UPG)</option>
                            <option value="Inanwatan (INX)">Inanwatan (INX)</option>
                            <option value="Sultan Iskandarmuda (BTJ)">Sultan Iskandarmuda (BTJ)</option>
                        </select>
                    </div>
                    <div class="form-group mb-3">
                        <label for="tarifDasar">Tarif Dasar:</label>
                        <input type="number" class="form-control" id="tarifDasar" name="tarifDasar" required>
                    </div>
                    <button type="submit" class="btn btn-primary">Tambah Data</button>
                </form>
            </div>

        </div>
        <div class="col-8">
            <div class="data-container m-3">
                <h2 class="text-center mb-3">Daftar Rute Penerbangan</h2>
                <?php
                // Fungsi untuk membaca data dari file JSON
                function bacaData()
                {
                    $data = file_get_contents("data/data.json");
                    return json_decode($data, true);
                }

                // Fungsi untuk menulis data ke dalam file JSON
                function tulisData($data)
                {
                    $data = json_encode($data);
                    file_put_contents("data/data.json", $data);
                }

                // Fungsi untuk menambahkan data baru
                function tambahData($maskapai, $bandaraAsal, $bandaraTujuan, $tarifDasar)
                {
                    $data = bacaData();
                    $pajakAsal = 0;
                    $pajakTujuan = 0;


                    if ($bandaraAsal == "Soekarno-Hatta (CGK)") {
                        $pajakAsal = 50000;
                    } elseif ($bandaraAsal == "Husein Sastranegara (BDO)") {
                        $pajakAsal = 30000;
                    } elseif ($bandaraAsal == "Abdul Rachman Saleh (MLG)") {
                        $pajakAsal = 40000;
                    } elseif ($bandaraAsal == "Juanda (SUB)") {
                        $pajakAsal = 40000;
                    } elseif ($bandaraAsal == "Ngurah Rai (DPS)") {
                        $pajakAsal = 80000;
                    } elseif ($bandaraAsal == "Hasanuddin (UPG)") {
                        $pajakAsal = 70000;
                    } elseif ($bandaraAsal == "Inanwatan (INX)") {
                        $pajakAsal = 90000;
                    } elseif ($bandaraAsal == "Sultan Iskandarmuda (BTJ)") {
                        $pajakAsal = 70000;
                    }


                    if ($bandaraTujuan == "Soekarno-Hatta (CGK)") {
                        $pajakTujuan = 50000;
                    } elseif ($bandaraTujuan == "Husein Sastranegara (BDO)") {
                        $pajakTujuan = 30000;
                    } elseif ($bandaraTujuan == "Abdul Rachman Saleh (MLG)") {
                        $pajakTujuan = 40000;
                    } elseif ($bandaraTujuan == "Juanda (SUB)") {
                        $pajakTujuan = 40000;
                    } elseif ($bandaraTujuan == "Ngurah Rai (DPS)") {
                        $pajakTujuan = 80000;
                    } elseif ($bandaraTujuan == "Hasanuddin (UPG)") {
                        $pajakTujuan = 70000;
                    } elseif ($bandaraTujuan == "Inanwatan (INX)") {
                        $pajakTujuan = 90000;
                    } elseif ($bandaraTujuan == "Sultan Iskandarmuda (BTJ)") {
                        $pajakTujuan = 70000;
                    }
                    $totalPajak = ($pajakAsal + $pajakTujuan);


                    $data[] = array(
                        $maskapai,
                        $bandaraAsal,
                        $bandaraTujuan,
                        $tarifDasar,
                        $totalPajak,
                        $tarifDasar + $totalPajak
                    );

                    tulisData($data);
                }

                // Fungsi untuk mengurutkan data penerbangan berdasarkan nama maskapai
                function urutkanData($data)
                {
                    // Ambil kolom nama maskapai dari setiap baris data
                    $namaMaskapai = array_column($data, 0);

                    // Urutkan array nama maskapai secara ascending (abjad)
                    array_multisort($namaMaskapai, SORT_ASC, $data);

                    return $data;
                }


                // Fungsi untuk menampilkan tabel Daftar Rute Penerbangan
                function tampilkanTabel()

                {
                    $data = bacaData();
                    $data = urutkanData($data);

                    echo '<table class="table table-striped">';
                    echo '<thead>';
                    echo '<tr>';
                    echo '<th>Nama Maskapai</th>';
                    echo '<th>Bandara Asal</th>';
                    echo '<th>Bandara Tujuan</th>';
                    echo '<th>Tarif Dasar</th>';
                    echo '<th>Total Pajak</th>';
                    echo '<th>Total Biaya</th>';
                    echo '</tr>';
                    echo '</thead>';
                    echo '<tbody>';

                    foreach ($data as $rute) {
                        echo '<tr>';
                        echo '<td>' . $rute[0] . '</td>';
                        echo '<td>' . $rute[1] . '</td>';
                        echo '<td>' . $rute[2] . '</td>';
                        echo '<td>' . 'Rp ' . number_format($rute[3], 0, ',', '.') . '</td>';
                        echo '<td>' . 'Rp ' . number_format($rute[4], 0, ',', '.') . '</td>';
                        echo '<td>' . 'Rp ' . number_format($rute[5], 0, ',', '.') . '</td>';
                        echo '</tr>';
                    }

                    echo '</tbody>';
                    echo '</table>';
                }

                // Proses form jika data dikirimkan
                if ($_SERVER['REQUEST_METHOD'] === 'POST') {
                    $maskapai = $_POST['maskapai'];
                    $bandaraAsal = $_POST['bandaraAsal'];
                    $bandaraTujuan = $_POST['bandaraTujuan'];
                    $tarifDasar = $_POST['tarifDasar'];

                    // Cek apakah bandara asal dan bandara tujuan nilainya sama
                    if ($bandaraAsal === $bandaraTujuan) {
                        echo '<div class="alert alert-danger" role="alert">Bandara asal dan bandara tujuan tidak boleh sama.</div>';
                    } else {
                        tambahData($maskapai, $bandaraAsal, $bandaraTujuan, $tarifDasar);

                        // Redirect untuk mencegah penambahan data ganda saat me-refresh halaman
                        header('Location: ' . $_SERVER['PHP_SELF']);
                        exit();
                    }
                }


                // Menggunakan fungsi untuk menampilkan tabel
                tampilkanTabel();
                ?>
            </div>
        </div>
    </div>


</body>

</html>