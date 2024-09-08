<h3><span>+</span> Hasil Periksa</h3>
<div class="form">
    <div>
        <h2 class="text-center">Biodata User</h2>
        <table class="table">
            <tr>
                <th scope="row">Nama</th>
                <td>: <?php echo $biodata['nama']; ?></td>
            </tr>
            <tr>
                <th scope="row">Umur</th>
                <td>: <?php echo $biodata['umur']; ?></td>
            </tr>
            <tr>
                <th scope="row">Jenis Kelamin</th>
                <td>: <?php echo $biodata['jenis_kelamin']; ?></td>
            </tr>
            <tr>
                <th scope="row">No. NIK</th>
                <td>: <?php echo $biodata['no_kk']; ?></td>
            </tr>
            <tr>
                <th scope="row">Telp</th>
                <td>: <?php echo $biodata['telp']; ?></td>
            </tr>
            <tr>
                <th scope="row">Alamat</th>
                <td>: <?php echo $biodata['alamat']; ?></td>
            </tr>
        </table>
        <h2 class="text-center">Gejala yang Dipilih:</h2>
        <ul>
            <table class="table">
                <?php $i = 1;
                foreach ($nama_gejala as $gejala) : ?>
                    <tr>
                        <th scope="row"><?= $i++; ?></th>
                        <td>: <?= $gejala; ?></td>
                    </tr>
                <?php endforeach; ?>
            </table>
        </ul>
        <h1 class="text-center">Hasil Diagnosa</h1>
        <?php if (!empty($result)) : ?>
            <table class="table">
                <tr>
                    <th>Kode kerusakan</th>
                    <th>Nama kerusakan</th>
                    <th>Gejala di dapat</th>
                    <th>Proses Hitung</th>
                    <th>Penanganan</th>
                    <th>Persentase</th>
                </tr>
                <?php foreach ($result as $kerusakan) : ?>
                    <tr>
                        <td><?php echo $kerusakan['kode_kerusakan']; ?></td>
                        <td><?php echo $kerusakan['nama_kerusakan']; ?></td>
                        <td><?php echo $kerusakan['count']; ?> gejala user dari <?php echo $total_gejala_kerusakan[$kerusakan['kode_kerusakan']]; ?> gejala dalam rule(aturan)</td>
                        <?php
                        $perkalian = $kerusakan['count'] / $total_gejala_kerusakan[$kerusakan['kode_kerusakan']] * 100;
                        $persentase = round($perkalian, 2);
                        ?>
                        <td><?php echo $kerusakan['count']; ?>/<?php echo $total_gejala_kerusakan[$kerusakan['kode_kerusakan']]; ?> * 100</td>
                        <td><?php echo $kerusakan['penanganan']; ?></td>
                        <td><?php echo $persentase; ?>%</td>
                    </tr>
                <?php endforeach; ?>
            </table>
        <?php else : ?>
            <p>Tidak ada hasil diagnosa yang sesuai dengan gejala yang dipilih.</p>
        <?php endif; ?>
    </div>
</div>