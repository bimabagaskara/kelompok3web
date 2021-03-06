<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="author" content="Bootstrap-ecommerce by Vosidiy">
    <title>Daftar Akun Baru - Sumber Rezeki</title>
    <link rel="shortcut icon" type="image/x-icon" href="images/favicon.ico">
    <!-- jQuery -->

    <link href="<?= base_url('assets/') ?>css/bootstrap.css" rel="stylesheet" type="text/css" />
    <!-- Font awesome 5 -->
    <link href="<?= base_url('assets/') ?>fonts/fontawesome/css/fontawesome-all.min.css" type="text/css" rel="stylesheet">
    <!-- plugin: fancybox  -->


    <!-- custom style -->
    <link href="<?= base_url('assets/') ?>css/ui.css" rel="stylesheet" type="text/css" />
    <link href="<?= base_url('assets/') ?>css/style.css" rel="stylesheet" type="text/css" />
    <link href="<?= base_url('assets/') ?>css/responsive.css" rel="stylesheet" media="only screen and (max-width: 1200px)" />
    <!-- custom javascript -->


</head>

<body>
    <div class="container mb-4">
        <div class="row">
            <div class="col-md-3"></div>
            <div class="col-md-6">
                <h1 class="text-center font-weight-bold text-primary"> <i class="fas fa-shopping-cart"></i> Sumber Rezeki
                </h1>
                <div class="text-center mb-2">Daftar akun baru sekarang </div>
                <div class="card shadow-sm">
                    <header class="card-header">
                        <a href="" class="float-right btn btn-outline-primary mt-1">Masuk</a>
                        <h4 class="card-title mt-2">Daftar</h4>
                    </header>
                    <article class="card-body">
                        <form action="" method="post">
                            <!-- Test -->

                            <!-- Test -->
                            <div class="form-group">
                                <label for="nama"> <span class="text-danger">* </span>Nama Lengkap</label>
                                <input type="text" name="nama" id="nama" class="form-control" placeholder="" true="" required="" value="<?= set_value('nama') ?>">
                                <?= form_error('name', '<small class="text-danger pl-2"><i>', '</i></small>'); ?>
                            </div>
                            <!-- form-row end.// -->
                            <div class="form-group">
                                <label><span class="text-danger">* </span>Email</label>
                                <input type="email" name="email" class="form-control" placeholder="" true="" value="<?= set_value('email') ?>">
                                <?= form_error('email', '<small class="text-danger pl-2"><i>', '</i></small>'); ?>
                            </div>
                            <div class="form-row">
                                <div class="form-group col-md-6">
                                    <label><span class="text-danger">* </span>Password</label>
                                    <input type="password" name="password" class="form-control" placeholder="" true="" required="">
                                    <?= form_error('password', '<small class="text-danger pl-2"><i>', '</i></small>'); ?>
                                </div>
                                <div class="form-group col-md-6">
                                    <label><span class="text-danger">* </span>Konfirmasi Password</label>
                                    <input type="password" name="passwordc" class="form-control" placeholder="" true="" required="">
                                    <?= form_error('passwordc', '<small class="text-danger pl-2"><i>', '</i></small>'); ?>
                                </div>
                            </div>

                            <!-- form-group end.// -->
                            <div class="form-group">

                                <label class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="gender" value="male">
                                    <span class="form-check-label"> Laki-Laki </span>
                                </label>
                                <label class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="gender" value="female">
                                    <span class="form-check-label"> Perempuan</span>
                                </label>
                                <div><?= form_error('gender', '<small class="text-danger pl-2"><i>', '</i></small>'); ?>
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="alamat">Alamat</label>
                                <textarea class="form-control" id="alamat" name="alamat" rows="3" ture></textarea>
                            </div>
                            <!-- form-group end.// -->
                            <div class="form-group">
                                <button type="submit" class="btn btn-primary btn-block"> Register </button>
                            </div>
                            <!-- form-group// -->
                            <small class="text-muted">By clicking the 'Sign Up' button, you confirm that you accept our
                                <br> Terms of use and Privacy Policy.</small>
                        </form>
                    </article>
                    <!-- card-body end .// -->
                    <div class="border-top card-body text-center">Have an account? <a href="">Log In</a></div>
                </div>
            </div>
            <div class="col-md-3"></div>
            <!-- card.// -->
        </div>
    </div>
    <!-- General JS Scripts -->
    <script src="<?= base_url('include/') ?>node_modules/jquery.min.js"></script>
    <script src="<?= base_url('include/') ?>node_modules/popper.min.js"></script>
    <script src="<?= base_url('include/') ?>node_modules/bootstrap/js/bootstrap.min.js"></script>
    <!-- Bootstrap4 files-->
    <script src="<?= base_url('assets/') ?>js/script.js" type="text/javascript"></script>

    <script type="text/javascript">
        $(document).ready(function() {
            $('#province').change(function() {
                var id = $('#province').val();
                $.ajax({
                    url: "<?php echo base_url(); ?>signup/get_kab",
                    method: "POST",
                    data: {
                        id: id
                    },
                    async: false,
                    dataType: 'json',
                    success: function(data) {
                        var html = '';
                        var i;
                        for (i = 0; i < data.length; i++) {
                            html += '<option>' + data[i].regency + '</option>';
                        }
                        $('#reg').html(html);

                    }
                });
            });
        });
    </script>
    <script type="text/javascript">
        $(function() {
            $.ajaxSetup({
                type: "POST",
                url: "<?php echo base_url('signup/ambil_data') ?>",
                cache: false,
            });
            $("#provinsi").change(function() {
                var value = $(this).val();
                if (value > 0) {
                    $.ajax({
                        data: {
                            modul: 'kabupaten',
                            id: value
                        },
                        success: function(respond) {
                            $("#kabupaten-kota").html(respond);
                        }
                    })
                }
            });
            $("#kabupaten-kota").change(function() {
                var value = $(this).val();
                if (value > 0) {
                    $.ajax({
                        data: {
                            modul: 'kecamatan',
                            id: value
                        },
                        success: function(respond) {
                            $("#kecamatan").html(respond);
                        }
                    })
                }
            })
            $("#kecamatan").change(function() {
                var value = $(this).val();
                if (value > 0) {
                    $.ajax({
                        data: {
                            modul: 'kelurahan',
                            id: value
                        },
                        success: function(respond) {
                            $("#kelurahan-desa").html(respond);
                        }
                    })
                }
            })
        })
    </script>
</body>

</html>