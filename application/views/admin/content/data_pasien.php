<?php $this->load->view('admin/partials/alert.php'); ?>
<div class="row">
    <div class="col-lg-12 d-flex align-items-strech">
        <div class="card w-100">
            <div class="card-body">
                <div class="d-sm-flex d-block align-items-center justify-content-between mb-9 alert alert-success">
                    <div class="mb-3 mb-sm-0">
                        <h5 class="card-title fw-semibold">Data Pasien</h5>
                    </div>
                </div>
                <div class="table-responsive">
                    <table id="myTable" class="table table-bordered table-striped">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Nama Pasien</th>
                                <th>Jenis Kelamin</th>
                                <th>Umur</th>
                                <th>No KK</th>
                                <th>Ni. Handphone</th>
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
                                        <td><?= $item->nama; ?></td>
                                        <td><?= $item->jenis_kelamin; ?></td>
                                        <td><?= $item->umur; ?></td>
                                        <td><?= $item->no_kk; ?></td>
                                        <td><?= $item->telp; ?></td>
                                        <td>
                                            <a href="<?= site_url('data-pasien/edit/' . $item->id) ?>" class="btn btn-sm btn-success m-1">Edit</a>
                                            <a href="<?= site_url('data-pasien/delete/' . $item->id) ?>" class="btn btn-sm btn-danger m-1">Delete</a>
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