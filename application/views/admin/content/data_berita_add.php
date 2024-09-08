<?php $this->load->view('admin/partials/alert.php'); ?>
<div class="row">
    <div class="col-lg-12 d-flex align-items-strech">
        <div class="card w-100">
            <div class="card-body">
                <div class="d-sm-flex d-block align-items-center justify-content-between mb-9 alert alert-success">
                    <div class="mb-3 mb-sm-0">
                        <h5 class="card-title fw-semibold">Data berita Add</h5>
                    </div>
                </div>
                <?php echo form_open_multipart('data-berita/insert'); ?>
                <!-- <form action="<?= site_url('data-berita/insert'); ?>" method="post"> -->
                <div class="row">
                    <div class="col-sm-6">
                        <div class="mb-3">
                            <label for="exampleInputEmail1" class="form-label">judul</label>
                            <input type="text" class="form-control" name="judul" id="exampleInputEmail1" aria-describedby="emailHelp" />
                            <div id="emailHelp" class="form-text text-danger">
                                <?= form_error('judul') ?>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="mb-3">
                            <label for="exampleInputEmail1" class="form-label">gambar</label>
                            <input type="file" class="form-control" name="gambar" id="exampleInputEmail1" />
                            <div id="emailHelp" class="form-text text-danger">
                                <?= form_error('gambar') ?>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-12">
                        <div class="mb-3">
                            <label for="exampleInputEmail1" class="form-label">Konten</label>
                            <textarea id="teksarea" class="form-control" name="konten"></textarea>
                            <div id="emailHelp" class="form-text text-danger">
                                <?= form_error('konten') ?>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-12">
                        <div class="mb-3">
                            <label for="exampleInputEmail1" class="form-label">slug</label>
                            <input type="text" class="form-control" placeholder="slug-judul-untuk-link" name="slug" id="exampleInputEmail1" aria-describedby="emailHelp" />
                            <div id="emailHelp" class="form-text text-danger">
                                <?= form_error('slug') ?>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <button type="submit" class="btn btn-primary btn-sm">
                            Submit
                        </button>
                    </div>
                    <div class="col-sm-6">
                        <a href="<?= site_url('data-berita') ?>" class="btn btn-sm btn-danger m-1">Cancle</a>
                    </div>
                </div>
                <?php echo form_close(); ?>
                <!-- </form> -->
            </div>
        </div>
    </div>
</div>