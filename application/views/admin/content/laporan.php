<?php
function gantiBulan($bulanInggris) {
    $bulan = array(
        'Jan' => 'Januari',
        'Feb' => 'Februari',
        'Mar' => 'Maret',
        'Apr' => 'April',
        'May' => 'Mei',
        'Jun' => 'Juni',
        'Jul' => 'Juli',
        'Aug' => 'Agustus',
        'Sep' => 'September',
        'Oct' => 'Oktober',
        'Nov' => 'November',
        'Dec' => 'Desember'
    );
    return $bulan[$bulanInggris] ?? $bulanInggris;
}

function gantiHari($hariInggris) {
    $hari = array(
        'Mon' => 'Senin',
        'Tue' => 'Selasa',
        'Wed' => 'Rabu',
        'Thu' => 'Kamis',
        'Fri' => 'Jumat',
        'Sat' => 'Sabtu',
        'Sun' => 'Minggu'
    );
    return $hari[$hariInggris] ?? $hariInggris;
}

// Mendapatkan tanggal saat ini
$tanggalInggris = date('D d M Y');
$hariInggris = date('D');
$hariIndonesia = gantiHari($hariInggris);
$bulanInggris = date('M');
$bulanIndonesia = gantiBulan($bulanInggris);
$tanggalIndonesia = sprintf('%s %d %s %d', $hariIndonesia, date('j'), $bulanIndonesia, date('Y'));
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" type="image/png" href="<?= base_url(); ?>assets/images/fevicon.ico.png" />
    <title>Cetak Data Laporan</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 20px;
        }
        strong{
            font-size:24pt;
        }
        .header {
            display: flex;
            align-items: center;
            border-bottom: 2px solid black;
            padding-bottom: 10px;
            margin-bottom: 20px;
        }
        .header img {
            height: 100px;
            margin-right: 0px;
        }
        .header .address {
            font-size: 14px;
        }
        table {
            width: 100%;
            border-collapse: collapse;
        }
        .ada {
            border: 1px solid black;
        }
        th, td {
            padding: 5px;
            text-align: center;
        }
        th {
            background-color: #f2f2f2;
        }
        .kosong{
            border:0px;
        }
        
        .signature {
            margin-top: 50px;
            display: flex;
            justify-content: space-between;
        }
        .signature .date {
            text-align: right;
        }
        .signature .sign {
            text-align: right;
        }
        .signature .sign p {
            margin-bottom: 60px; /* Memberikan ruang untuk tanda tangan */
        }
    </style>
</head>
<body>

    <div class="header">
        <table class="kosong">
            <tr>
                <td><img src="<?= base_url(); ?>assets/images/logor.png" alt="Gambar"  /></td>
                <td><div class="address">
            <strong>KAWAN MOTOR </strong><br>
            <p> Jl. Raya Cibinong No.857, Pabuaran, Kec. Cibinong, Kabupaten Bogor, Jawa Barat 16916<br>
            Telepon: (0251) 8324232<br>
            Email: kawanmotor@gmail.com</p>
        </div></td>
            </tr>
        </table>
        
        
    </div>

    <center><h2>Data Hasil Laporan</h2></center>
   

    <table class="ada">
        <thead ada>
            <tr class="ada">
                <th class="ada">NO</th>
                <th class="ada">Nama Pasien</th>
                <th class="ada">Umur</th>
                <th class="ada">Alamat</th>
                <th class="ada">Periksa</th>
                <th class="ada">Gejala</th>
                <th class="ada">Kerusakan</th>
                <th class="ada">Hasil</th>
            </tr>
        </thead>
        <tbody>
            <?php if (empty($data)) : ?>
                <tr>
                    <td colspan="8" style="text-align: center;">Tidak ada data</td>
                </tr>
            <?php else : ?>
                <?php $i = 1; foreach ($data->result() as $item) : ?>
                    <tr class="ada">
                        <td class="ada"><?= $i++; ?></td>
                        <td class="ada"><?= $item->nama; ?><br><?= $item->jenis_kelamin; ?></td>
                        <td class="ada"><?= $item->umur; ?> Tahun</td>
                        <td class="ada"><?= $item->alamat; ?></td>
                        <td class="ada"><?= $item->waktu; ?></td>
                        <td class="ada"><?= $item->jawaban; ?></td>
                        <td class="ada"><?= $item->kerusakan; ?></td>
                        <td class="ada"><span><?= $item->persen; ?>%</span></td>
                    </tr>
                <?php endforeach; ?>
            <?php endif; ?>
        </tbody>
    </table>
    <div class="signature">
            <div class="date">
                <p>Jakarta, <?= $tanggalIndonesia; ?></p>
            </div>
            <div class="sign">
                <p>Administrator</p>
                <br>
                <p>_____________________</p>
            </div>
        </div>
    <script>
        window.print();
    </script>
</body>
</html>
