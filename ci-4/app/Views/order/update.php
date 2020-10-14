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
            Tanggal : <?= date('d-m-Y' , strtotime($order[0]['tglorder'])) ?>
        </p>
    </div>
    <div class="col">
        <p>
            Total : <b><?= number_format($order[0]['total']) ?></b>
        </p>
    </div>
</div>

<div class="row">

</div>

<?= $this->endSection() ?>