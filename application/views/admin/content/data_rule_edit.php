<?php $this->load->view('admin/partials/alert.php'); ?>
<div class="row">
    <div class="col-lg-12 d-flex align-items-strech">
        <div class="card w-100">
            <div class="card-body">
                <div class="d-sm-flex d-block align-items-center justify-content-between mb-9 alert alert-success">
                    <div class="mb-3 mb-sm-0">
                        <h5 class="card-title fw-semibold">Data Rule Edit</h5>
                    </div>
                </div>
                <form action="<?= site_url('data-rule/edit/' . $data->id_rule); ?>" method="post">
                    <div class="row">
                        <div class="col-sm-6">
                            <div class="mb-3">
                                <label for="exampleInputEmail1" class="form-label">Kode Rule</label>
                                <input type="text" class="form-control" name="kode_rule" value="<?= $data->kode_rule ?>" id="exampleInputEmail1" aria-describedby="emailHelp" />
                                <div id="emailHelp" class="form-text text-danger">
                                    <?= form_error('kode_rule') ?>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="mb-3">
                                <label for="disabledSelect" class="form-label">kerusakan</label>
                                <select id="disabledSelect" name="kode_kerusakan" class="form-select">
                                    <option class="disabled">-- Select kerusakan --</option>
                                    <?php foreach ($kerusakan->result() as $sakit) : ?>
                                        <option value="<?= $sakit->kode_kerusakan; ?>" <?= ($data->kode_kerusakan == $sakit->kode_kerusakan) ? 'selected' : ''; ?>><?= $sakit->nama_kerusakan; ?></option>
                                    <?php endforeach; ?>
                                </select>
                                <div id="emailHelp" class="form-text text-danger">
                                    <?= form_error('kode_kerusakan') ?>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-12">
                            <div class="mb-3">
                                <label for="exampleInputEmail1" class="form-label">Kode Gejala</label>
                                <input type="text" class="form-control" name="kode_gejala" value="<?= $data->kode_gejala ?>" id="exampleInputEmail1" aria-describedby="emailHelp" />
                                <div id="emailHelp" class="form-text text-danger">
                                    <?= form_error('kode_gejala') ?>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <button type="submit" class="btn btn-primary btn-sm">
                                update
                            </button>
                        </div>
                        <div class="col-sm-6">
                            <a href="<?= site_url('data-rule') ?>" class="btn btn-sm btn-danger m-1">Cancel</a>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>