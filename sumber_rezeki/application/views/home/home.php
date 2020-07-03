<!-- <div class="title-content">
			<span class="category">Kaos</span> <a href="" title="" class="float-right catrm">Lihat Semua Kaos >></a>
</div> -->

<section class="section-content bg padding-y-sm" style="min-height:430px">
    <div class="container">
        <div id="carouselExampleInterval" class="carousel slide" data-ride="carousel">
            <div class="carousel-inner">
                <div class="carousel-item active" data-interval="10000">
                    <img src="include/assets/img/caraousel/profil.jpg" width="400px" height="400px" style="display: block; margin: auto" class="d-block w-80" alt="...">
                </div>
                <div class="carousel-item" data-interval="2000">
                    <img src="include/assets/img/caraousel/lmp14w.jpg" width="400px" height="400px" style="display: block; margin: auto" class="d-block w-80" alt="...">
                </div>
                <div class="carousel-item">
                    <img src="include/assets/img/caraousel/MATSUGI.jpg" width="400px" height="400px" style="display: block; margin: auto" class="d-block w-80" alt="...">
                </div>
                <div class="carousel-item">
                    <img src="include/assets/img/caraousel/7_.jpg" width="400px" height="400px" style="display: block; margin: auto" class="d-block w-80" alt="...">
                </div>
            </div>
            <a class="carousel-control-prev" href="#carouselExampleInterval" role="button" data-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="sr-only">Previous</span>
            </a>
            <a class="carousel-control-next" href="#carouselExampleInterval" role="button" data-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="sr-only">Next</span>
            </a>
            <!-- <script>
$("#target").click(function() {
    Swal.fire('Any fool can use a computer');
});
</script> -->
            <div class="container">

                <div class="row item-content">
                    <?php foreach ($product as $p) : ?>
                        <div class="col-md-2 col-6 mt-3 mb-3 item-content">
                            <div class="item-produk ">
                                <?php if ($p['stock'] > 0) : ?>
                                    <a title="<?= $p['name_products'] ?>" href="<?= base_url('p/' . $p['id_products']) ?>" style="text-decoration: none;">

                                        <?php if ($p['discount'] > 0) : ?>
                                            <span class="m-1 font-weight-bold rounded-left flag-discount shadow-sm"><?= $p['discount'] ?>%
                                                Off</span>
                                        <?php endif ?>

                                        <div class="brs-thumb-hold">
                                            <img src="<?= base_url('include/assets/img/products/') . $p['image'] ?>" class="" style="width: 100%;">
                                        </div>
                                    </a>
                                    <div class="produk-title border-top" style="background: #FFFFFF">
                                        <div class="title-item text-left">
                                            <a href="<?= base_url('p/' . $p['id_products']) ?>"><?= $p['name_products'] ?></a>
                                        </div>
                                        <?php if ($p['discount'] > 0) : ?>
                                            <small><del class="text-muted"><?= rupiah($p['price']); ?></del></small>
                                            <span><?= rupiah($p['price_total']); ?></span>
                                        <?php else : ?>
                                            <span><?= rupiah($p['price_total']); ?></span>
                                        <?php endif ?>
                                        <br>
                                        <i class="fa fa-tag" style="margin-right: 3px; color:#0077FF;"></i><span style="color: #4CAF50;"><?= $p['name_categories'] ?></span>
                                        <br>
                                    </div>
                                <?php else : ?>
                                    <div class="middle">
                                        <div class="text">Stok Habis</div>
                                    </div>
                                    <div class="brs-thumb-hold">
                                        <img src="<?= base_url('include/assets/img/products/') . $p['image'] ?>" class="" style="width: 100%; opacity: 0.5">
                                    </div>

                                    <div class="produk-title border-top" style="background: #FFFFFF">
                                        <div class="title-item text-left">
                                            <span class="o"><?= $p['name_products'] ?></a>
                                        </div>
                                        <?php if ($p['discount'] > 0) : ?>
                                            <small><del class="text-muted"><?= rupiah($p['price']); ?></del></small>
                                            <span><?= rupiah($p['price_total']); ?></span>
                                        <?php else : ?>
                                            <span><?= rupiah($p['price_total']); ?></span>
                                        <?php endif ?>
                                        <br>
                                        <i class="fa fa-tag" style="margin-right: 3px; color:#0077FF;"></i><span style="color: #4CAF50;"><?= $p['name_categories'] ?></span>
                                        <br>
                                    </div>
                                <?php endif ?>

                            </div>
                        </div>
                    <?php endforeach ?>
                </div>
                <div class="row">
                    <div class="col">
                        <!--Tampilkan pagination-->
                        <?php echo  $pagination ?>
                    </div>
                </div>
            </div>