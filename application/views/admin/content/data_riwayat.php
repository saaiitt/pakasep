<?php $this->load->view('admin/partials/alert.php'); ?>
<div class="row">
    <div class="col-lg-12 d-flex align-items-strech">
        <div class="card w-100">
            <div class="card-body">
                <div class="d-sm-flex d-block align-items-center justify-content-between mb-9 alert alert-success">
                    <div class="mb-3 mb-sm-0">
                        <h5 class="card-title fw-semibold">Data Riwayat</h5>
                    </div>
                    <div>
                        <a href="<?= site_url('data-riwayat/print') ?>" class="btn btn-sm btn-warning m-1"><i class="ti ti-printer"></i> Cetak</a>
                        <a href="<?= site_url('data-riwayat/pdf') ?>" class="btn btn-sm btn-success m-1"><i class="ti ti-file"></i> Export PDF</a>
                    </div>
                    
                </div>
                <div class="table-responsive">
                    <table id="myTable" class="table table-bordered table-striped">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Nama Pasien</th>
                                <th>Umur</th>
                                <th>Alamat</th>
                                <th>Periksa</th>
                                <th>Gejala</th>
                                <th>Kerusakan</th>
                                <th>Hasil</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php if (empty($data)) : ?>
                            <?php else : ?>
                                <?php $i = 1;
                                foreach ($data->result() as $item) : ?>
                                    <tr>
                                        <td><?= $i++; ?></td>
                                        <td><?= $item->nama; ?><br><?= $item->jenis_kelamin; ?></td>
                                        <td><?= $item->umur; ?> Tahun</td>
                                        <td><?= $item->alamat; ?></td>
                                        <td><?= $item->waktu; ?></td>
                                        <td><?= $item->jawaban; ?></td>
                                        <td><?= $item->kerusakan; ?></td>
                                        <td><span class="badge bg-success rounded-3 fw-semibold"><?= $item->persen; ?>%</span></td>
                                        <td>
                                            <a href="<?= site_url('data-riwayat/delete/' . $item->uniq_id) ?>" class="btn btn-sm btn-danger m-1">Delete</a>
                                        </td>
                                    </tr>
                                <?php endforeach; ?>
                            <?php endif; ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>