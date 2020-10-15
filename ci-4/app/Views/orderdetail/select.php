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
    <div class="col">
        <h3> <?php echo $judul; ?> </h3>
    </div>
</div>

<div class="row mt-2">
    <div class="col">
        <table class="table">
            <tr>
                <th>No</th>
                <th>Tanggal</th>
                <th>Menu</th>
                <th>Harga</th>
                <th>Jumlah</th>
                <th>Total</th>
            </tr>
            <?php $no ?>
            <?php foreach ($orderdetail as $key => $value) : ?>
                <tr>
                    <td><?= $no++ ?></td>
                    <td><?= $value['tglorder']?></td>
                    <td><?= $value['menu'] ?></td>
                    <td><?= number_format($value['harga']) ?></td>
                    <td><?= $value['jumlah']?></td>
                    <td><?= number_format($value['jumlah'] * $value ['harga'])?></td>
                </tr>

            <?php endforeach; ?>

        </table>
    </div>
</div>

<?= $pager->links('group1', 'bootstrap') ?>

<?= $this->endSection() ?>