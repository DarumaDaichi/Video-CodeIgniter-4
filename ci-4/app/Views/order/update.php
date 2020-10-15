<?= $this->extend('template/admin') ?>

<?= $this->section('content') ?>

<div class="row">
    <div class="col">
        <h3><?= $judul ?></h3>
        <hr>
    </div>
</div>

<div class="row">
    <div class="col">
        <p>
            Pelanggan : <?= $order[0]['pelanggan'] ?>
        </p>
    </div>
    <div class="col">
        <p>
            Tanggal : <?= date('d-m-Y', strtotime($order[0]['tglorder'])) ?>
        </p>
    </div>
    <div class="col">
        <p>
            Total : <b><?= number_format($order[0]['total']) ?></b>
        </p>
    </div>
</div>

<div class="row">
    <div class="col-6">
        <form action="<?= base_url() ?>/admin/order/update" method="post">
            <div class="form-group">
                <label for="order">Bayar : </label>
                <input type="number" class="form-control" name="bayar" required>
            </div>

            <input type="hidden" name="total" value = "<?= $order[0]['total']?>">
            <input type="hidden" name="idorder" value = "<?= $order[0]['idorder']?>">

            <div class="form-group">
                <input class="btn btn-primary" type="submit" name="bayar" value="BAYAR">
            </div>
        </form>
    </div>
</div>

<div class="row">
    <div class="col">
        <h2>Rincian Order</h2>
    </div>
</div>

<div class="row">
    <div class="col">
        <table class="table">
            <tr>
                <th>No</th>
                <th>Menu</th>
                <th>Harga</th>
                <th>Jumlah</th>
                <th>Total</th>
            </tr>
            <?php $no = 1 ?>
            <?php foreach ($detail as $value) : ?>
                <tr>
                    <td><?= $no++ ?></td>
                    <td><?= $value['menu'] ?></td>
                    <td><?= number_format($value['hargajual']) ?></td>
                    <td><?= $value['jumlah'] ?></td>
                    <td><?= number_format($value['jumlah'] * $value['hargajual']) ?></td>
                </tr>
            <?php endforeach; ?>
        </table>
    </div>
</div>

<?= $this->endSection() ?>