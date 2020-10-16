<?= $this->extend('template/admin') ?>

<?= $this->section('content') ?>

<div class="row">
    <div class="col">
        <h3> <?php echo $judul; ?> </h3>
    </div>
</div>

<div class="">
<div class="col-12">
    <form action="<?= base_url() ?>/admin/OrderDetail/cari" method="post">
        <div class="form-group col-6 float-left">
            <label for="kategori">Awal : </label>
            <input type="date" class="form-control" name="awal" required>
        </div>

        <div class="form-group col-6 float-left">
            <label for="keterangan">Sampai : </label>
            <input type="date" class="form-control" name="sampai" required>
        </div>

        <div class="form-group ml-3 ">
            <input class="btn btn-primary" type="submit" name="cari" value="CARI">
        </div>
    </form>
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
            <?php $no = 1 ?>
            <?php foreach ($orderdetail as $value) : ?>
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

<!-- -->

<?= $this->endSection() ?>