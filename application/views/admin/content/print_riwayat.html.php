<!DOCTYPE html>
<html>
<head>
    <title>Print Riwayat</title>
    <style>
        /* Gaya CSS untuk tampilan cetak */
        body {
            font-family: Arial, sans-serif;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 20px;
        }
        table, th, td {
            border: 1px solid black;
        }
        th, td {
            padding: 8px;
            text-align: left;
        }
        h1 {
            text-align: center;
            margin-bottom: 20px;
        }
    </style>
</head>
<body>
    <h1>Riwayat Pemeriksaan</h1>
    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>Nama Pasien</th>
                <th>Tanggal Periksa</th>
                <th>Diagnosis</th>
                <th>Terapi</th>
                <th>Terapi</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($data as $row): ?>
            <tr>
                <td><?= $no++ ?></td>
                <td><?= $rrw->id_jawaban ?></td>
                <td><?= $rrw->waktu ?></td>
                <td><?= $rrw->jawaban ?></td>
                <td><?= $rrw->persen ?></td>
                <td><?= $rrw->kerusakan ?></td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</body>
</html>
