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
        <a href="<?php echo base_url('/admin/user/create') ?>" class="btn btn-primary mt-2"> TAMBAH DATA </a>
    </div>

    <div class="col">
        <h3> <?php echo $judul; ?> </h3>
    </div>
</div>

<div class="row mt-2">
    <div class="col">
        <table class="table">
            <tr>
                <th>No</th>
                <th>User</th>
                <th>Email</th>
                <th>Posisi</th>
                <th>Status</th>
                <th>Aksi</th>
            </tr>
            <?php $no ?>
            <?php foreach ($user as $key => $value) : ?>
                <tr>
                    <td><?= $no++ ?></td>
                    <td><?= $value['user'] ?></td>
                    <td><?= $value['email'] ?></td>
                    <td><?= $value['level'] ?></td>
                    <?php
                    if ($value['aktif'] == 1) {
                        $aktif  = "<div class='btn btn-primary' style = 'cursor : default;'>AKTIF</div>";
                    } else {
                        $aktif  = "<div class='btn btn-danger' style = 'cursor : default;'>OFFLINE</div>";
                    }
                    ?>
                    <td><?= $aktif ?></td>
                    <td>
                        <a href="<?= base_url() ?>/admin/user/delete/<?= $value['iduser'] ?>">
                            <img class="mr-4" src="<?= base_url('/icon/trash.svg') ?>">
                        </a>

                        <a href="<?= base_url() ?>/admin/user/find/<?= $value['iduser'] ?>">
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