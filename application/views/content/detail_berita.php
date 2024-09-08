<div id="home" class="parallax wow fadeIn" data-stellar-background-ratio="0.4"></div>
<div id="about" class="section wow fadeIn">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="heading">
                    <span class="icon-logo"><img src="<?= base_url(); ?>assets/images/icon-logo.png" alt="#"></span>
                    <h2>Detail Artikel</h2>
                </div>
                <div class="message-box row">
                    <div class="wow fadeInUp" data-wow-delay="0.3s">
                        <div class="row g-0">
                            <div class="col-md-12">
                                <h2><?= $data->judul; ?></h2>
                                <p class="small"><i class="fa fa-calendar-o"></i> <?= $data->date; ?> <i class="fa fa-user"> </i> <?= $data->pembuat; ?></p>
                                <div class="text-center">
                                    <img class="img-fluid flex-shrink-0 rounded-circle" src="<?= base_url('assets/images/' . $data->gambar); ?>" height="100%" width="100%">
                                </div>
                                <p><?= $data->konten; ?></p>
                            </div>
                            <hr class="hr1">
                        </div>
                    </div>
                    <div class="pagination">
                        <?php echo $this->pagination->create_links(); ?>
                    </div>
                </div>
                <hr class="hr1">
                <div class="row">
                    <div class="heading">
                        <h2>Artikel Terkait</h2>
                    </div>
                    <?php if (!$child) : ?>
                        <h1>Berita kosong</h1>
                    <?php else : ?>
                        <?php foreach ($child as $item) : ?>
                            <div class="col-md-4 col-sm-6 col-xs-12">
                                <div class="service-widget">
                                    <div class="post-media wow fadeIn">
                                        <a href="<?= base_url('assets/images/' . $item->gambar); ?>" data-rel="prettyPhoto[gal]" class="hoverbutton global-radius"><i class="flaticon-unlink"></i></a>
                                        <img src="<?= base_url('assets/images/' . $item->gambar); ?>" alt="" class="img-responsive">
                                    </div>
                                    <h3>
                                        <a href="<?= site_url('detail-berita/' . $item->slug); ?>">
                                            <?= $item->judul; ?>
                                        </a>
                                    </h3>
                                </div>
                            </div>
                        <?php endforeach; ?>
                    <?php endif; ?>
                </div>
            </div>
            
        </div>
    </div>
</div>