<!-- ========================= SECTION CONTENT ========================= -->
<section class="section-content bg padding-y-sm">
    <div class="container">

        <div class="row ">
            <div class="col-md-9 ">
                <div class="row pt-3 pb-3 rounded shadow-sm bg-white">
                    <div class="col-md-4">
                        <img src="<?= base_url('include/assets/img/products/') . $p['image'] ?>" style="max-height: 350px" class="img-fluid img-thumbnail" alt="">
                    </div>
                    <div class="col-md-8">
                        <h3 class="border-bottom pb-2 pt-2 mb-4 font-weight-bold">
                            <?= $p['name_products'] ?>
                        </h3>
                        <div>
                            <?php if ($p['discount'] > 0) : ?>
                                <div>
                                    <del class="text-muted"><?= rupiah($p['price']); ?></del>
                                </div>
                                <span class="font-weight-bold text-danger text-lg"><?= rupiah($p['price_total']); ?></span>
                                <div class="p-2 mt-2 mb-4 bg-primary text-white font-weight-bold"><i>Diskon
                                        <?= $p['discount'] ?>%</i></div>
                            <?php else : ?>
                                <div class="font-weight-bold mb-4 text-danger text-lg"><?= rupiah($p['price_total']); ?>
                                </div>
                            <?php endif ?>

                        </div>
                        <div class="text-secondary">
                            <h6>Berat: <span class="font-weight-bold"><?= $p['weight'] ?></span> gram</h6>
                        </div>
                        <div class="text-secondary">
                            <h6>Stok tersisa: <span class="font-weight-bold"><?= $p['stock'] ?></span> pcs!</h6>

                        </div>
                        <div class="product">
                            <?php echo form_open('keranjang/tambah_keranjang'); ?>
                            <div class="form-row mb-4">
                                <div class="col-md-4 form-group">
                                    <label for="qty">Masukkan Jumlah yang akan dibeli</label>
                                    <input type="number" id="qty" name="qty" class="form-control" min="1" value="1" max="<?= $p['stock'] ?>">

                                </div>
                            </div>
                            <?php echo form_hidden('id_product', $p['id_products']); ?>
                            <?php echo form_hidden('id_user', $user['id_user']); ?>

                            <?php echo form_hidden('email_tmp', $user['email']); ?>
                            <?php echo form_hidden('total_price', $p['price_total']); ?>
                            <?php echo form_hidden('weight', $p['weight']); ?>
                            <?php echo form_hidden('stock', $p['stock']); ?>
                            <div class="form-group">
                                <label for="exampleFormControlTextarea1">Catatan untuk penjual</label>
                                <textarea class="form-control" id="exampleFormControlTextarea1" name="note" placeholder="" rows="3" maxlength="100"></textarea>
                            </div>

                            <button type="submit" name="add-cart" class="btn btn-success btn-lg btn-block mb-2 add-cart"><i class="fa fa-cart-plus" aria-hidden="true"></i>
                                Tambah ke
                                keranjang</button>
                            <?php echo form_close(); ?>


                        </div>
                        <div class="mr-4 mt-2 float-right"><i class="fas fa-shield-alt text-danger "></i> Jaminan 100%
                            Aman</div>
                    </div>
                </div>
                <div class="row ">
                    <div class="shadow-sm mt-4 bg-white col-12 p-4">
                        <ul class="nav nav-tabs" id="myTab" role="tablist">
                            <li class="nav-item">
                                <a class="nav-link active" id="home-tab" data-toggle="tab" href="#home" role="tab" aria-controls="home" aria-selected="true">Deskripsi</a>
                            </li>

                        </ul>
                        <div class="tab-content" id="myTabContent">
                            <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
                                <?= $p['description'] ?></div>
                            <div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab">...
                            </div>
                            <div class="tab-pane fade" id="contact" role="tabpanel" aria-labelledby="contact-tab">...
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-3 mt-4">

            </div>


        </div>
    </div>
    </div>
    </div>
</section>
<!-- ========================= SECTION CONTENT .END// ========================= -->
<script>

</script>