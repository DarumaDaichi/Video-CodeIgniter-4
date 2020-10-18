<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>View Layout</title>

    <link rel="stylesheet" href="<?= base_url('/Bootstrap/css/bootstrap.min.css') ?>">
</head>

<body>

    <div class="container">
        <div class="row mt-2">
            <div class="col">

                <nav class="navbar navbar-expand-lg navbar-light bg-light">
                    <a href="<?= base_url('/admin') ?>" class="navbar-brand">Dashboard</a>
                    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-expanded="false" aria-label="Toggle Navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>

                    <div class="collapse navbar-collapse" id="navbarNav">
                        <ul class="navbar-nav">

                            <li class="nav-item mt-2 ml-5">Username :</li>
                            <li class="nav-item mr-4">
                                <a href="#" class="nav-link">
                                    <?php
                                    if (!empty(session()->get('user'))) {
                                        echo session()->get('user');
                                    }
                                    ?>
                                    <span class="sr-only">(current)</span>
                                </a>
                            </li>

                            <li class="nav-item mt-2 ml-5">Email : </li>
                            <li class="nav-item mt-2 mr-4 ml-1">
                                <?php
                                if (!empty(session()->get('email'))) {
                                    echo session()->get('email');
                                }
                                ?>
                            </li>

                            <li class="nav-item mt-2 ml-5">Level : </li>
                            <li class="nav-item mt-2 ml-1">
                                <?php
                                if (!empty(session()->get('level'))) {
                                    echo session()->get('level');
                                }
                                ?>
                            </li>

                            <li class="nav-item  ml-5 " >
                                <a class="btn btn-danger" href="<?= base_url('admin/login/logout')?>">Logout</a>
                            </li>
                        </ul>
                    </div>
                </nav>
            </div>
        </div>

        <div class="row mt-2">
            <div class="col-4">
                <div class="card" style="width : 18rem;">
                    <ul class="list-group list-group-flush">
                        <li class="list-group-item"><a href="<?php echo base_url('/admin/kategori') ?> ">Kategori</a></li>
                        <li class="list-group-item"><a href="<?php echo base_url('admin/menu') ?>"> Menu </a></li>
                        <li class="list-group-item"><a href="<?php echo base_url('admin/pelanggan') ?>"> Pelanggan </a></li>
                        <li class="list-group-item"><a href="<?php echo base_url('admin/order') ?>"> Order </a></li>
                        <li class="list-group-item"><a href="<?php echo base_url('admin/orderdetail') ?>"> Order Detail </a></li>
                        <li class="list-group-item"><a href="<?php echo base_url('admin/user') ?>"> User</a></li>
                    </ul>
                </div>
            </div>
            <div class="col-8 px-2">
                <?= $this->renderSection('content') ?>
            </div>
        </div>

    </div>

</body>

</html>