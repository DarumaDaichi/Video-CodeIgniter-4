<?= $this->extend('template/admin') ?>

<?= $this->section('content') ?>

<div class="row">
    <div class="col-4">
        <a href="<?php echo base_url('/admin/kategori/create') ?>" class="btn btn-primary mt-2"> TAMBAH DATA </a>
    </div>

    <div class="col">
        <h3> <?php echo $judul; ?> </h3>
    </div>
</div>

<div class="row mt-2">

    <table class="table">

        <tr>
            <th>No</th>
            <th>Kategori</th>
            <th>Keterangan</th>
            <th>Hapus</th>
            <th>Ubah</th>
        </tr>
        <?php $no = 1 ?>
        <?php foreach ($kategori as $key => $value) : ?>
            <tr>
                <td><?= $no++ ?></td>
                <td><?= $value['kategori'] ?></td>
                <td><?= $value['keterangan'] ?></td>
                <td><a href="<?= base_url() ?>/admin/kategori/delete/<?= $value['idkategori'] ?>">Hapus</a></td>
                <td><a href="<?= base_url() ?>/admin/kategori/find/<?= $value['idkategori'] ?>">Ubah</a></td>
            </tr>

        <?php endforeach; ?>

    </table>

</div>

<?= $pager->links('group1', 'bootstrap') ?>

<?= $this->endSection() ?>