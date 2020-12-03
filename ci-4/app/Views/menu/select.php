<?= $this->extend('template/admin') ?>

<?= $this->section('content') ?>

<?php
if (isset($_GET['page_group1'])) {
    $page   = $_GET['page_group1'];
    $jumlah = 3;
    $no     = ($jumlah * $page) - $jumlah + 1;
} else {
    $no = 1;
}
?>


<div class="row">
    <div class="col-4">
        <a href="<?php echo base_url('/admin/menu/create') ?>" class="btn btn-primary mt-2"> TAMBAH DATA </a>
    </div>

    <div class="col"> 
        <h3> <?php echo $judul; ?> </h3>
    </div>
</div>

<div class="row mt-2">
    <div class="col-6">
        <form action="<?= base_url('/admin/menu/read')?>" method="get">
            <?= view_cell('\App\Controllers\Admin\Menu::option')?>
        </form>
    </div>
</div>

<div class="row mt-2">
    <div class="col">
        <table class="table">
            <tr>
                <th>No</th>
                <th>Menu</th>
                <th>Foto</th>
                <th>Harga</th>

                <th>Aksi</th>
            </tr>
            <?php $no ?>
            <?php foreach ($menu as $key => $value) : ?>
                <tr>
                    <td><?= $no++ ?></td>
                    <td><?= $value['menu'] ?></td>
                    <td><img src="<?= base_url('/upload/' . $value['gambar'] . '')?>" style="width : 70px" alt=""></td>
                    <td>Rp. <?= number_format($value['harga'])  ?></td>
                    <td>
                        <a href="<?= base_url() ?>/admin/menu/delete/<?= $value['idmenu'] ?>">
                            <img class="mr-4" src="<?= base_url('/icon/trash.svg') ?>">
                        </a>

                        <a href="<?= base_url() ?>/admin/menu/find/<?= $value['idmenu'] ?>">
                            <img src="<?= base_url('/icon/pencil.svg') ?>">
                        </a>
                    </td>
                </tr>

            <?php endforeach; ?>

        </table>
    </div>
</div>

<?= $pager->links('group1', 'bootstrap') ?>

<?= $this->endSection() ?>