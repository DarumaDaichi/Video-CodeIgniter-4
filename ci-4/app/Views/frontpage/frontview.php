<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kopi Senang</title>
    <link rel="stylesheet" href="<?= base_url('/css/gaya.css') ?>">
    <link rel="stylesheet" href="<?= base_url('/Bootstrap/css/bootstrap.min.css') ?>">
    <link rel="stylesheet" href="<?= base_url('/fontawesome-free/css/all.min.css') ?>">
</head>

<body style="background-color: #ececec;">
        <header>
            <section>
                <?= $this->include('frontpage/navbar') ?>
            </section>
        </header>

            <section class="car">
                
                <img class="image-carousel " src="<?= base_url('carousel/brooke-1.jpg') ?>" alt="">
                <?php
                if (!empty(session()->get('idpelanggan'))) {
                    echo '<h1 class="text-head1">
                        Selamat Datang
                        <p class="text-samping">
                        ' . session()->get('pelanggan') . '</p>' . '</h1>';
                } else {
                    echo '<h1 class="text-head">Kopi Senang <p class="text-samping">Kopi nikmat bikin senang </p> </h1>';
                }
                ?>
            </section>

            

    <script src="<?= base_url('/js/app.js'); ?>"></script>
</body>

</html>