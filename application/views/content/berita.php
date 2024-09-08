<div id="home" class="parallax wow fadeIn" data-stellar-background-ratio="0.4"></div>
<div id="about" class="wow fadeIn">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="heading">
                    <span class="icon-logo"><img src="<?= base_url(); ?>assets/images/icon-logo.png" alt="#"></span>
                    <h2>Artikel Terkini</h2>
                </div>
                <div class="row dev-list">
                    <?php if (!$berita) : ?>
                        <h1>Berita kosong</h1>
                    <?php else : ?>
                        <?php foreach ($berita as $item) : ?>
                            <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12 wow fadeIn" data-wow-duration="1s" data-wow-delay="0.2s" style="visibility: visible; animation-duration: 1s; animation-delay: 0.2s; animation-name: fadeIn;">
                                <div class="widget clearfix">
                                    <img src="<?= base_url('assets/images/' . $item->gambar); ?>" width="100%" height="100%" alt="" class="img-responsive img-rounded">
                                    <div class="widget-title">
                                        <br>
                                        <a href="<?= site_url('detail-berita/' . $item->slug); ?>"><small><?= $item->judul; ?></small></a>
                                        <p class="small"><i class="fa fa-calendar-o"></i> <?= $item->date; ?> <i class="fa fa-user"> </i> <?= $item->pembuat; ?></p>
                                    </div>
                                    <p><?= word_limiter($item->konten, 10); ?>. <a href="<?= site_url('detail-berita/' . $item->slug); ?>">Selengkapnya...</a></p>
                                </div><!--widget -->
                            </div><!-- end col -->
                        <?php endforeach; ?>
                    <?php endif; ?>
                    <div class="pagination">
                        <?php echo $this->pagination->create_links(); ?>
                    </div>
                </div><!-- end row -->
            </div><!-- end row -->
            <!-- end col -->
            
        </div><!-- end row -->
    </div><!-- end row -->
</div><!-- end row -->