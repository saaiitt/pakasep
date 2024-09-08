<div id="home" class="parallax wow fadeIn" data-stellar-background-ratio="0.4"></div>
<div id="price" class="section pr wow fadeIn" style="background-image:url(<?= base_url('assets/images/price-bg.png') ?>);">
    <div class="container">
        <div class="container-fluid py-5 text-center">
            <div class="row">
                <div class="col-lg-12">
                    <div class="horizontal-timeline">
                        <ul class="list-inline items">
                            <li class="list-inline-item items-list">
                                <div class="px-4">
                                    <div class="event-date badge bg-primary">Step 1</div>
                                    <h5 class="pt-2">Lengkapi Biodata</h5>
                                    <p class="text-muted">Lengkapi Biodata anda sesuai dengan form yang di sediakan.</p>
                                </div>
                            </li>
                            <li class="list-inline-item items-list">
                                <div class="px-4">
                                    <div class="event-date badge bg-success">Step 2</div>
                                    <h5 class="pt-2">Pilih Gejala</h5>
                                    <p class="text-muted">Pilih geja sesuai dengan apa yang anda alami.
                                    </p>
                                </div>
                            </li>
                            <li class="list-inline-item items-list">
                                <div class="px-4">
                                    <div class="event-date badge bg-danger">Step 3</div>
                                    <h5 class="pt-2">Hasil</h5>
                                    <p class="text-muted">Hasil ini dari gejala yang anda centang.</p>
                                </div>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12 form-step" data-step="1">
                <div class="appointment-form step-content" id="step1">
                    <h3><span>+</span> Biodata Periksa</h3>
                    <div class="form">
                        <form id="stepForm1" method="post">
                            <fieldset>
                                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 select-section">
                                    <div class="row">
                                        <div class="form-group">
                                            <input type="text" name="nama" placeholder="Your Name" />
                                        </div>
                                        <div class="form-group">
                                            <input type="number" placeholder="Umur anda" name="umur" />
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 select-section">
                                    <div class="row">
                                        <div class="form-group">
                                            <select class="form-control" name="jenis_kelamin">
                                                <option value="Laki-Laki">Laki-Laki</option>
                                                <option value="Perempuan">Perempuan</option>
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <input type="text" inputmode="numeric" placeholder="Nomor NIK" name="no_kk"/>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                    <div class="row">
                                        <div class="form-group">
                                            <input type="text" inputmode="numeric" placeholder="Nomor Telephone" name="telp" />
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                    <div class="row">
                                        <div class="form-group">
                                            <textarea rows="4" name="alamat" class="form-control" placeholder="Alamat anda..."></textarea>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                    <div class="row">
                                        <div class="form-group">
                                            <div class="center">
                                                <button type="submit" class="next-button">Next</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </fieldset>
                        </form>
                    </div>
                </div>
                <div class="appointment-form step-content" id="step2" style="display: none;">
                    <h3><span>+</span> Pilih Gejala Yang Anda Alami</h3>
                    <div class="form">
                        <form id="stepForm2" method="post">
                            <fieldset>
                                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 select-section">
                                    <div class="row">
                                        <?php foreach ($gejala as $gjl) : ?>
                                            <div class="form-check">
                                                <input class="form-check-input" name="gejala[]" type="checkbox" value="<?= $gjl->kode_gejala; ?>" id="flexCheckDefault<?= $gjl->kode_gejala; ?>">
                                                <label class="form-check-label" for="flexCheckDefault">
                                                    <?= $gjl->gejala; ?>
                                                </label>
                                            </div>
                                        <?php endforeach; ?>
                                    </div>
                                </div>
                                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                    <div class="row">
                                        <div class="form-group">
                                            <div class="center">
                                                <button class="back-button">Kembali</button>
                                                <button type="submit" class="next-button">Next</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </fieldset>
                        </form>
                    </div>
                </div>
                <div class="appointment-form step-content" id="step3" style="display: none;">

                </div>
            </div>
        </div>
    </div>
</div>

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
    $(document).ready(function() {
        var currentStep = 1;
        var currentDataId; // Menyimpan ID data saat ini

        function showStep(step) {
            $('.step-content').hide();
            $('#step' + step).show();
        }

        function clearData(step) {
            if (step === 2 && currentDataId) {
                deleteData(currentDataId); // Hapus data saat langkah kedua
            }
        }

        function goBack() {
            if (currentStep > 1) {
                clearData(currentStep);
                currentStep--;
                showStep(currentStep);
            }
        }

        function showNextStep() {
            currentStep++;
            showStep(currentStep);
        }

        function deleteData(dataId) {
            $.ajax({
                type: 'POST',
                url: '<?= base_url('periksa/delete'); ?>',
                data: {
                    dataId: dataId
                },
                success: function(response) {
                    console.log('Data berhasil dihapus');
                },
                error: function(xhr, status, error) {
                    console.log('Gagal menghapus data: ' + error);
                }
            });
        }

        $('.previous-button').click(function() {
            goBack();
        });

        $('.next-button').click(function(e) {
            e.preventDefault();

            var formData = $('#stepForm' + currentStep).serialize();

            $.ajax({
                type: 'POST',
                url: '<?= base_url('periksa/step'); ?>' + currentStep,
                data: formData,
                success: function(response) {
                    if (currentStep === 1) {
                        currentDataId = response.dataId; // Simpan ID data yang dikembalikan saat langkah pertama
                    }
                    if (currentStep === 2) {
                        showNextStep();
                        $.ajax({
                            type: 'POST',
                            url: '<?= base_url('periksa/step2'); ?>',
                            data: formData,
                            success: function(response) {
                                $('#step3').html(response); // Memperbarui konten pada step 3 dengan hasil inferensi yang dikembalikan
                            }
                        });
                    } else {
                        showNextStep();
                    }
                }
            });
        });

        $('.back-button').click(function(e) {
            e.preventDefault();
            goBack();
        });
    });
</script>

<!-- <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
    $(document).ready(function() {
        var currentStep = 1;
        var currentDataId; // Menyimpan ID data saat ini

        function showStep(step) {
            $('.step-content').hide();
            $('#step' + step).show();
        }

        function clearData(step) {
            if (step === 2 && currentDataId) {
                deleteData(currentDataId); // Hapus data saat langkah kedua
            }
        }

        function goBack() {
            if (currentStep > 1) {
                clearData(currentStep);
                currentStep--;
                showStep(currentStep);
            }
        }

        function showNextStep() {
            currentStep++;
            showStep(currentStep);
        }

        function deleteData(dataId) {
            $.ajax({
                type: 'POST',
                url: '<?= base_url('periksa/delete'); ?>',
                data: {
                    dataId: dataId
                },
                success: function(response) {
                    console.log('Data berhasil dihapus');
                },
                error: function(xhr, status, error) {
                    console.log('Gagal menghapus data: ' + error);
                }
            });
        }

        $('.previous-button').click(function() {
            goBack();
        });

        $('.next-button').click(function(e) {
            e.preventDefault();

            var formData = $('#stepForm' + currentStep).serialize();

            $.ajax({
                type: 'POST',
                url: '<?= base_url('periksa/step'); ?>' + currentStep,
                data: formData,
                success: function(response) {
                    if (currentStep === 1) {
                        currentDataId = response.dataId; // Simpan ID data yang dikembalikan saat langkah pertama
                    }
                    showNextStep();

                    if (currentStep === 2) {
                        insertTwo(); // Panggil fungsi insert_two() pada langkah kedua
                    }
                }
            });
        });

        $('.back-button').click(function(e) {
            e.preventDefault();
            goBack();
        });
    });
</script> -->
<!-- <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
    $(document).ready(function() {
        var currentStep = 1;
        var currentDataId; // Menyimpan ID data saat ini

        function showStep(step) {
            $('.step-content').hide();
            $('#step' + step).show();
        }

        function clearData(step) {
            if (step === 2 && currentDataId) {
                deleteData(currentDataId); // Hapus data saat langkah kedua
            }
        }

        function goBack() {
            if (currentStep > 1) {
                clearData(currentStep);
                currentStep--;
                showStep(currentStep);
            }
        }

        function showNextStep() {
            currentStep++;
            showStep(currentStep);
        }

        function deleteData(dataId) {
            $.ajax({
                type: 'POST',
                url: '<?= base_url('periksa/delete'); ?>',
                data: {
                    dataId: dataId
                },
                success: function(response) {
                    console.log('Data berhasil dihapus');
                },
                error: function(xhr, status, error) {
                    console.log('Gagal menghapus data: ' + error);
                }
            });
        }

        $('.previous-button').click(function() {
            goBack();
        });

        $('.next-button').click(function(e) {
            e.preventDefault();

            var formData = $('#stepForm' + currentStep).serialize();

            $.ajax({
                type: 'POST',
                url: '<?= base_url('periksa/step'); ?>' + currentStep,
                data: formData,
                success: function(response) {
                    if (currentStep === 1) {
                        currentDataId = response.dataId; // Simpan ID data yang dikembalikan saat langkah pertama
                    }
                    showNextStep();
                }
            });
        });

        $('.back-button').click(function(e) {
            e.preventDefault();
            goBack();
        });
    });
</script> -->

<!-- <script>
    $(document).ready(function() {
        var currentStep = 1;

        function showStep(step) {
            $('.step-content').hide();
            $('#step' + step).show();
        }

        function clearData(step) {
            // Tambahkan logika penghapusan data dari database sesuai dengan langkah saat ini
            if (step === 1) {
                // Misalnya, hapus data dari database jika langkah saat ini adalah 1
                $.ajax({
                    type: 'POST',
                    url: '<?= site_url('periksa/delete'); ?>',
                    success: function(response) {
                        console.log('Data berhasil dihapus');
                    }
                });
            }
        }

        function goBack() {
            if (currentStep > 1) {
                clearData(currentStep);
                currentStep--;
                showStep(currentStep);
            }
        }

        function showNextStep() {
            clearData(currentStep);
            currentStep++;
            showStep(currentStep);
        }

        $('.previous-button').click(function() {
            goBack();
        });

        $('.next-button').click(function(e) {
            e.preventDefault();

            var formData = $('#stepForm' + currentStep).serialize();

            $.ajax({
                type: 'POST',
                url: '<?= site_url('periksa/step'); ?>' + currentStep,
                data: formData,
                success: function(response) {
                    showNextStep();
                }
            });
        });
    });
</script> -->
<style>
    .horizontal-timeline .items {
        border-top: 3px solid #e9ecef;
    }

    .horizontal-timeline .items .items-list {
        display: block;
        position: relative;
        text-align: center;
        padding-top: 70px;
        margin-right: 0;
    }

    .horizontal-timeline .items .items-list:before {
        content: "";
        position: absolute;
        height: 36px;
        border-right: 2px dashed #dee2e6;
        top: 0;
    }

    .horizontal-timeline .items .items-list .event-date {
        position: absolute;
        top: 36px;
        left: 0;
        right: 0;
        width: 75px;
        margin: 0 auto;
        font-size: 0.9rem;
        padding-top: 8px;
    }

    @media (min-width: 1140px) {
        .horizontal-timeline .items .items-list {
            display: inline-block;
            width: 24%;
            padding-top: 45px;
        }

        .horizontal-timeline .items .items-list .event-date {
            top: -40px;
        }
    }
</style>
<!-- <style>

    @import url("https://fonts.googleapis.com/css2?family=PT+Sans&display=swap");

    li.active {
        color: red;
    }

    nav {
        margin: 2.6em auto;
    }

    nav a {
        list-style: none;
        padding: 35px;
        color: #232931;
        font-size: 1.1em;
        display: block;
        transition: all 0.5s ease-in-out;
    }

    .rightbox {
        /* padding: 0em 34rem 0em 0em; */
        height: 100%;
    }

    .rb-container {
        font-family: "PT Sans", sans-serif;
        width: 100%;
        margin: auto;
        display: block;
        position: absolute;
    }

    .rb-container ul.rb {
        margin: 2.5em 0;
        padding: 0;
        display: inline-block;
    }

    .rb-container ul.rb li {
        list-style: none;
        margin: auto;
        margin-left: 10em;
        min-height: 50px;
        border-left: 1px dashed #fff;
        padding: 0 0 50px 30px;
        position: relative;
    }

    .rb-container ul.rb li:last-child {
        border-left: 0;
    }

    .rb-container ul.rb li::before {
        position: absolute;
        left: -18px;
        top: -5px;
        content: " ";
        border: 8px solid rgba(255, 255, 255, 1);
        border-radius: 500%;
        background: #50d890;
        height: 20px;
        width: 20px;
        transition: all 500ms ease-in-out;
    }

    .rb-container ul.rb li:hover::before {
        border-color: #232931;
        transition: all 1000ms ease-in-out;
    }

    ul.rb li .timestamp {
        color: white;
        position: relative;
        width: 100px;
        font-size: 12px;
    }

    .item-title {
        color: #fff;
    }

    .container-3 {
        width: 5em;
        vertical-align: right;
        white-space: nowrap;
        position: absolute;
    }

    .container-3 input#search {
        width: 150px;
        height: 30px;
        background: #fbfbfb;
        border: none;
        font-size: 10pt;
        color: #262626;
        -webkit-border-radius: 5px;
        -moz-border-radius: 5px;
        border-radius: 5px;
        margin: 0.9em 0 0 28.5em;
        box-shadow: 3px 3px 15px rgba(119, 119, 119, 0.5);
    }

    .container-3 .icon {
        margin: 1.3em 3em 0 31.5em;
        position: absolute;
        width: 150px;
        height: 30px;
        z-index: 1;
        color: #4f5b66;
    }

    input::placeholder {
        padding: 5em 5em 1em 1em;
        color: #50d890;
    }
</style> -->