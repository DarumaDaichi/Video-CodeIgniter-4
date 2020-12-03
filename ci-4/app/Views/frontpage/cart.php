<style>
    .cart-detail {
        margin: 80px auto;
    }

    table {
        width: 100%;
        border-collapse: collapse;
    }

    .cart-menu {
        display: flex;
        flex-wrap: wrap;
    }

    th {
        text-align: left;
        padding: 5px;
        color: #fff;
        background: #ff523b;
        font-weight: normal;
    }

    td {
        padding: 10px 5px;
    }

    td input {
        width: 40px;
        height: 30px;
        padding: 5px;
    }

    td a {
        color: #ff523b;
        font-size: 12px;
    }

    td img {
        width: 80px;
        height: 80px;
        margin-right: 10px;
    }

    .total-harga {
        display: flex;
        justify-content: flex-end;
    }

    .total-harga table {
        border-top: 3px solid #ff523b;
        width: 100%;
        max-width: 400px;
    }

    td:last-child {
        text-align: right;
    }

    th:last-child {
        text-align: right;
    }
    
    @media only screen and (max-width : 768px) {
        .cart-menu p {
            display: none;
        }
    }
</style>

<?= $this->include('frontpage/navbar') ?>
<div class="container cart-detail">
    <?php if($cart->totalItems() === 0) :?>
        <div>Keranjang Kosong</div>
    <?php else :?>
    <table>
        <tr>
            <th>Menu</th>
            <th>Jumlah</th>
            <th>Sub Total</th>
        </tr>
    <?php foreach ($cart->contents() as $item) :?>
        <tr>
            <td>
                <div class="cart-menu">
                    <img src="<?= base_url('upload/' . $item['gambar']) ?>" alt="">
                    <div>
                        <p><?= $item['name'] ?></p>
                        <small>Rp.<?= number_format($item['price'] , 0 ,0,'.') ?></small>
                        <a href="<?= base_url('/front/menu/hapus/' . $item['rowid'])?>">Hapus</a>
                    </div>
                </div>
            </td>
            <td>
                <?= anchor('/front/menu/kurang/' . $item['qty'] . '/' . $item['rowid'] , '<p> - </p>')?>
                <?= $item['qty']?>
                <?= anchor('/front/menu/tambah/' . $item['qty'] . '/' . $item['rowid'] , '<p> + </p>')?>
            </td>
            <td><?= $item['qty'] * $item['price']?></td>
        </tr>
    <?php endforeach;?>
    </table>

    <div class="total-harga">
        <table>
            <tr>
                <td>Total</td>
                <td><?= $cart->total();?></td>
            </tr>

            <tr>
                <td></td>
                <td><a href="<?= base_url('front/menu/proses')?>">pesan</a></td>
            </tr>
        </table>
    <?php endif;?>
    </div>
</div>