<?php $this->load->view('admin/partials/alert.php'); ?>
<div class="row">
    <div class="col-lg-12 d-flex align-items-strech">
        <div class="card w-100">
            <div class="card-body">
                <div class="d-sm-flex d-block align-items-center justify-content-between mb-9 alert alert-success">
                    <div class="mb-3 mb-sm-0">
                        <h5 class="card-title fw-semibold">Data kerusakan Edit</h5>
                    </div>
                </div>
                <form action="<?= site_url('data-kerusakan/edit/' . $data->id_kerusakan); ?>" method="post">
                    <div class="row">
                        <div class="col-sm-6">
                            <div class="mb-3">
                                <label for="exampleInputEmail1" class="form-label">Kode kerusakan</label>
                                <input type="text" class="form-control" name="kode_kerusakan" value="<?= $data->kode_kerusakan ?>" id="exampleInputEmail1" aria-describedby="emailHelp" />
                                <div id="emailHelp" class="form-text text-danger">
                                    <?= form_error('kode_kerusakan') ?>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="mb-3">
                                <label for="exampleInputEmail1" class="form-label">Nama kerusakan</label>
                                <input type="text" class="form-control" name="nama_kerusakan" value="<?= $data->nama_kerusakan ?>" id="exampleInputEmail1" aria-describedby="emailHelp" />
                                <div id="emailHelp" class="form-text text-danger">
                                    <?= form_error('nama_kerusakan') ?>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="mb-3">
                                <label for="exampleInputEmail1" class="form-label">Penjelasan</label>
                                <textarea class="form-control" name="penjelasan"><?= $data->penjelasan ?></textarea>
                                <div id="emailHelp" class="form-text text-danger">
                                    <?= form_error('penjelasan') ?>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="mb-3">
                                <label for="exampleInputEmail1" class="form-label">Gejala</label>
                                <textarea class="form-control" name="gejala"><?= $data->gejala ?></textarea>
                                <div id="emailHelp" class="form-text text-danger">
                                    <?= form_error('gejala') ?>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-12">
                            <div class="mb-3">
                                <label for="exampleInputEmail1" class="form-label">Penanganan</label>
                                <textarea class="form-control" name="penanganan"><?= $data->penanganan ?></textarea>
                                <div id="emailHelp" class="form-text text-danger">
                                    <?php echo form_error('penanganan') ?>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <button type="submit" class="btn btn-primary btn-sm">
                                update
                            </button>
                        </div>
                        <div class="col-sm-6">
                            <a href="<?= site_url('data-kerusakan') ?>" class="btn btn-sm btn-danger m-1">Cancle</a>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>