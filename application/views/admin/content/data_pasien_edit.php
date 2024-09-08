<?php $this->load->view('admin/partials/alert.php'); ?>
<div class="row">
    <div class="col-lg-12 d-flex align-items-strech">
        <div class="card w-100">
            <div class="card-body">
                <div class="d-sm-flex d-block align-items-center justify-content-between mb-9 alert alert-success">
                    <div class="mb-3 mb-sm-0">
                        <h5 class="card-title fw-semibold">Data Pasien Edit</h5>
                    </div>
                </div>
                <form action="<?= site_url('data-pasien/edit/' . $data->id); ?>" method="post">
                    <div class="row">
                        <div class="col-sm-6">
                            <div class="mb-3">
                                <label for="exampleInputEmail1" class="form-label">Nama</label>
                                <input type="text" class="form-control" name="nama" value="<?= $data->nama ?>" id="exampleInputEmail1" aria-describedby="emailHelp" />
                                <div id="emailHelp" class="form-text text-danger">
                                    <?= form_error('nama') ?>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="mb-3">
                                <label for="exampleInputEmail1" class="form-label">Umur</label>
                                <input type="text" class="form-control" name="umur" value="<?= $data->umur ?>" id="exampleInputEmail1" aria-describedby="emailHelp" />
                                <div id="emailHelp" class="form-text text-danger">
                                    <?= form_error('umur') ?>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="mb-3">
                                <label for="exampleInputEmail1" class="form-label">Jenis Kelamin</label>
                                <select class="form-control" name="jenis_kelamin">
                                    <option value="Laki-Laki">Laki-Laki</option>
                                    <option value="Perempuan">Perempuan</option>
                                </select>
                                <div id="emailHelp" class="form-text text-danger">
                                    <?= form_error('jenis_kelamin') ?>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="mb-3">
                                <label for="exampleInputEmail1" class="form-label">Nomor KK</label>
                                <input type="text" class="form-control" name="no_kk" value="<?= $data->no_kk ?>" id="exampleInputEmail1" aria-describedby="emailHelp" />
                                <div id="emailHelp" class="form-text text-danger">
                                    <?= form_error('no_kk') ?>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="mb-3">
                                <label for="exampleInputEmail1" class="form-label">Telpehone</label>
                                <input type="text" class="form-control" name="telp" value="<?= $data->telp ?>" id="exampleInputEmail1" aria-describedby="emailHelp" />
                                <div id="emailHelp" class="form-text text-danger">
                                    <?= form_error('telp') ?>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="mb-3">
                                <label for="exampleInputEmail1" class="form-label">Alamat</label>
                                <textarea class="form-control" name="alamat"><?= $data->alamat ?></textarea>
                                <div id="emailHelp" class="form-text text-danger">
                                    <?= form_error('alamat') ?>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <button type="submit" class="btn btn-primary btn-sm">
                                update
                            </button>
                        </div>
                        <div class="col-sm-6">
                            <a href="<?= site_url('data-pasien') ?>" class="btn btn-sm btn-danger m-1">Cancle</a>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>