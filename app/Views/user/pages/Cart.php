<?= $this->extend('user/template'); ?>

<?= $this->section('content'); ?>
<main class="cart">
    <div class="header">
        <img src="<?= base_url('user/image/bg/bg-cart.jpg') ?>">
        <div class="text">
            <p class="montserrat">Keranjang</p>
        </div>
    </div>

    <?php if ($cartData == NULL) { ?>

        <div class="ifNotContent">
            <div id="anim-no-product" data-lnkAnim="<?= base_url('user/js/animated/noProduct.json') ?>"></div>
            <div class="text">
                <p class="text-no-produk">tidak ada produk</p>
                <a href="<?= base_url('shop'); ?>">belanja</a>
            </div>
        </div>

    <?php } else { ?>
        <div class="ifNotContent ifNotContent-disable">
            <div id="anim-no-product" data-lnkAnim="<?= base_url('user/js/animated/noProduct.json') ?>"></div>
            <div class="text">
                <p class="text-no-produk">tidak ada produk</p>
                <a href="<?= base_url('shop'); ?>">belanja</a>
            </div>
        </div>

        <div class="content">
            <div class="top">
                <table data-urlUpdate="<?= base_url('cart/updateitem') ?>">
                    <tr class="head-table">
                        <td></td>
                        <td></td>
                        <td class="productName">produk</td>
                        <td>harga</td>
                        <td>kuantitas</td>
                        <td>subtotal</td>
                    </tr>

                    <?php $nm = 1; ?>
                    <?php foreach ($cartData as $cd) { ?>
                        <tr class="product" id="product" data-idP="<?= $cd['id'] ?>">
                            <td class="cross">
                                <a href="<?= base_url('cart/deleteitem') ?>" class="anchor-tbl lnk-chck" data-textPC="Hapus item secara permanen ?">
                                    <i class="fas fa-times cursor-pointer-custom"></i>
                                </a>
                            </td>
                            <td class="img-tbl">
                                <a href="<?= base_url('shop/detail-product/' . $cd['product_name']) ?>" class="anchor-tbl">
                                    <img src="<?= base_url('user/image/product/' . $cd['product_photo']) ?>">
                                </a>
                            </td>
                            <td class="productName">
                                <span class="mobile head-table">produk :</span>
                                <span>
                                    <a href="<?= base_url('shop/detail-product/' . $cd['product_name']) ?>">
                                        <span id="productName"> <?= $cd['product_name']; ?> </span>
                                    </a>
                                </span>
                            </td>
                            <td>
                                <span class="mobile head-table">harga :</span>
                                <span class="price">Rp <span id="priceNum"><?= $cd['price']; ?></span></span>
                            </td>
                            <td>
                                <span class="mobile head-table">kuantitas :</span>
                                <div class="custom-number">
                                    <input type="number" class="josefin" name="quantity<?= $nm; ?>" id="custom-number" min="1" max="20" value="<?= $cd['quantity']; ?>">
                                    <div class="box-prev-next">
                                        <i class="fas fa-plus" id="plus"></i>
                                        <i class="fas fa-minus" id="min"></i>
                                    </div>
                                </div>
                            </td>
                            <td id="subtotal">
                                <span class="mobile head-table">subtotal :</span>
                                <span class="price">Rp <span id="priceNum"><?= $cd['subtotal']; ?></span></span>
                            </td>
                        </tr>
                        <?php $nm++; ?>
                    <?php } ?>
                </table>

                <div class="update-cart">
                    <button id="update-cart" class="josefin cursor-pointer-custom btn-disabled">perbarui keranjang</button>
                </div>
            </div> <!-- END TOP -->

            <div class="bottom">

                <div class="box-right">
                    <p class="head-lnk-checkout">total harga</p>
                    <div class="box head">
                        <div class="box-text">
                            <p>subtotal</p>
                            <span class="price">Rp <span id="priceNum" class="subtotal"><?= $subtotal; ?></span></span>
                        </div>
                    </div>
                    <div class="box head">
                        <div class="box-text">
                            <p>total</p>
                            <span class="price">Rp <span id="priceNum" class="total"><?= $subtotal; ?></span></span>
                        </div>
                    </div>
                    <a href="<?= base_url('checkout') ?>" class="link-checkout">checkout</a>
                </div>

            </div>
        </div>

    <?php } ?>
</main>
<?= $this->endSection(); ?>