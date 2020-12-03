<style>
    .header-menu {
        display: inline;  
        margin-left: 45%;
        font-family: advent pro;
        font-size: 2vw;
        color: #5e3333;
        font-weight: bold;
        padding: 10px;
    }

    .kategori{
        width: 100%;
        padding:20px;
        background-color: #f5f5f5;
    }

    .card-image .imageh {
        width: 15vw;
        height: 15vw;
        padding: 20px;
        text-align: center;
    }

    .card-menu {
        max-width: 15vw;
        max-height: 15vw;
        margin-left: 9%;
        margin-bottom: 20vw;
        margin-top: 5vw;
    }

    .card-menu h1 {
        padding-top: 10px;
        font-family: century gothic;
        font-size: 2vw;
        text-align: center;
        color: #5e3333;
    }

    .row {
        max-width: 100%;
    }

    .row label {
        text-align: center;
        font-size: 2vw;
    }

    .menu-header {
        font-size: 8vw;
        text-align: center;
        font-family: advent pro;
        letter-spacing: 10px;
    }
</style>
<?= $this->include('frontpage/navbar') ?>

<?php
if (isset($_GET['page_group1'])) {
    $page   = $_GET['page_group1'];
}
?>

<section class="menu">
    <div class="kategori">
        <a href="<?= base_url('front/menu')?>" style="text-decoration: none;"><h3 class="header-menu">Semua</h3></a>
            <form action="<?= base_url('/front/menu/read')?>" method="get">
            <?= view_cell('\App\Controllers\Admin\Menu::option')?>
        </form>
    </div>
    <h1 class="menu-header">MENU <hr style="width: 60%;"></h1>
    <div class="row">
        <?php foreach ($menu as $key => $value) : ?>
            <div class="card-menu">
                <div class="card-image">
                    <img class="imageh" src="<?= base_url('/upload/' . $value['gambar'] . '') ?>" alt="">
                </div>
                <h1><?= $value['menu'] ?></h1>
                <label><?= $value['harga'] ?></label><br>
                <a class="btn btn-primary" 
                href=
                "<?php
                if(!empty(session()->get('idpelanggan'))){
                    echo base_url('front/menu/beli/' . $value['idmenu']);
                }else{
                    echo base_url('login');
                }
                ?>">Beli</a>
            </div>
        <?php endforeach; ?>
</section>

<div class="align-content-end">
<?= $pager->links('group1', 'bootstrap') ?>
</div>