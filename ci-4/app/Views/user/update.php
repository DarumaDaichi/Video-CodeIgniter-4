<?= $this->extend('template/admin') ?>

<?= $this->section('content') ?>

<div class="col">
    <?php
    if (!empty(session()->getFlashdata('info'))) {
        echo '<div class = "alert alert-danger" role="alert">';
        echo session()->getFlashdata('info');
        echo '</div>';
    }
    ?>
</div>

<div class="col">
    <h3><?= $judul?></h3>
</div>



<div class="col-8">
    <form action="<?= base_url() ?>/admin/user/change" method="post">
        <div class="form-group">
            <input type="hidden" value="<?=$user['iduser']?>" class="form-control" name="iduser" required>
        </div>

        <div class="form-group">
            <label for="Email">Email : </label>
            <input type="email" value="<?=$user['email']?>" class="form-control" name="email" required>
        </div>

        <div class="form-group">
            <label for="Level">Level : </label>
            <select class="form-control" name="level" id="iduser">
                <?php foreach ($level as $value) : ?>
                    <option <?php if($user['level'] == $value){ echo "selected";}?> value = "<?= $value ?>">
                        <?= $value ?>
                    </option>
                <?php endforeach; ?>
            </select>
        </div>

        <div class="form-group">
            <input class="btn btn-primary" type="submit" name="simpan" value="SIMPAN">
        </div>
    </form>
</div>

<?= $this->endSection() ?>