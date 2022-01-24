<?= $this->extend('user/template'); ?>

<?= $this->section('content'); ?>
<main class="checkout">
    <div class="header">
        <img src="<?= base_url('user/image/bg/bg-account.jpg') ?>">
        <div class="text">
            <p>Checkout</p>
        </div>
    </div>

    <div class="section">
        <div class="box-checkout" id="main-box">
            <p class="judul-check">pembayaran aman</p>

            <div class="btn-next-prev" id="btn-next-prev">
                <div class="box-btn">
                    <div class="myprev cursor-pointer-custom pnDisabled" id="myprevnext">
                        <span><i class="fas fa-arrow-left"></i></span>
                    </div>
                    <div class="mynext cursor-pointer-custom" id="myprevnext">
                        <span><i class="fas fa-arrow-right"></i></span>
                    </div>
                </div>
            </div>

            <form>
                <div class="core-box">
                    <div class="sharing-box1 each-form current">
                        <div class="left1">
                            <p class="head-form-check">Rincian penagihan</p>
                            <div class="form1">
                                <div class="bx">
                                    <label for="nama">nama <span class="required">*</span></label>
                                    <input type="text" id="nama" class="josefin ir" autocomplete="off" value="<?= $dataUser['nama']; ?>">
                                </div>

                                <div class="bx">
                                    <label for="prov">provinsi <span class="required">*</span></label>
                                    <input type="text" id="prov" class="josefin ir" autocomplete="off" value="<?= $dataUser['prov']; ?>">
                                </div>

                                <div class="bx">
                                    <label for="kota">kota <span class="required">*</span></label>
                                    <input type="text" id="kota" class="josefin ir" autocomplete="off" value="<?= $dataUser['kota']; ?>">
                                </div>

                                <div class="bx">
                                    <label for="kec">kecamatan <span class="required">*</span></label>
                                    <input type="text" id="kec" class="josefin ir" autocomplete="off" value="<?= $dataUser['kec']; ?>">
                                </div>

                                <div class="bx">
                                    <label for="desa">desa <span class="required">*</span></label>
                                    <input type="text" id="desa" class="josefin ir" autocomplete="off" value="<?= $dataUser['desa']; ?>">
                                </div>

                                <div class="bx">
                                    <label for="detail">alamat detail <span class="required">*</span></label>
                                    <input type="text" id="detail" class="josefin ir" placeholder="Nomor rumah dan nama jalan" autocomplete="off" value="<?= $dataUser['alamat_detail']; ?>">
                                </div>

                                <div class="bx">
                                    <label for="postcode">kode pos <span class="required">*</span></label>
                                    <input type="text" id="postcode" class="josefin ir" autocomplete="off" value="<?= $dataUser['kode_pos']; ?>">
                                </div>

                                <div class="bx">
                                    <label for="phone">telepon <span class="required">*</span></label>
                                    <input type="number" id="phone" class="josefin ir" autocomplete="off" value="<?= $dataUser['no_telp']; ?>">
                                </div>

                                <div class="bx">
                                    <label for="email">email <span class="required">*</span></label>
                                    <input type="text" id="email" class="josefin ir" autocomplete="off" value="<?= $dataUser['email']; ?>">
                                </div>
                            </div>

                            <div class="other">
                                <p class="head-form-check head-other">Informasi tambahan</p>
                                <div class="note bx">
                                    <label for="other">catatan pemesanan (opsional)</label>
                                    <textarea type="text" id="other" rows="8"></textarea>
                                </div>
                            </div>

                        </div>

                        <div class="right1">
                            <p class="head-form-check">Pesanan anda</p>
                            <div class="content">
                                <table class="josefin">
                                    <tbody>
                                        <tr>
                                            <th>produk</th>
                                            <th>subtotal</th>
                                        </tr>

                                        <?php foreach ($dataCart as $dc) { ?>
                                            <tr>
                                                <td>
                                                    <?= $dc['product_name']; ?>
                                                    <span class="required jumlah">x <span id="numPrice"><?= $dc['quantity']; ?></span></span>
                                                </td>
                                                <td class="td-price">
                                                    <span class="required">Rp <span id="numPrice"><?= $dc['subtotal']; ?></span></span>
                                                </td>
                                            </tr>
                                        <?php } ?>

                                        <!-- LAST -->
                                        <tr class="space">
                                            <td></td>
                                            <td></td>
                                        </tr>

                                        <tr>
                                            <th>subtotal</th>
                                            <td class="td-price">
                                                <span class="required">Rp <span id="numPrice"><?= $total; ?></span></span>
                                            </td>
                                        </tr>

                                        <tr>
                                            <th>total</th>
                                            <td class="td-price">
                                                <span class="required">Rp <span id="numPrice"><?= $total; ?></span></span>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>

                    <div class="sharing-box2 each-form each-form-hide">
                        <div class="left2">
                            <img src="<?= base_url('user/image/illustration/universal.svg') ?>">
                        </div>
                        <div class="right2 es">
                            <p class="head-form-check">Kurir pembayaran</p>
                            <div class="bx">
                                <label for="type">pilih kurir</label>
                                <select name="" id="type-courier" class="josefin ir">
                                    <option value selected disabled>pilih</option>
                                    <option value="instant">instan</option>
                                    <option value="regular">reguler</option>
                                </select>
                            </div>
                        </div>
                    </div>

                    <div class="sharing-box3 each-form each-form-hide">

                        <div class="default choose-t">
                            <div class="img"><img src="<?= base_url('user/image/illustration/courier_choose.svg') ?>"></div>
                            <p class="emptyCaption montserrat">Lengkapi formulir terlebih dahulu</p>
                        </div>

                        <div class="instant choose-t tfc-hide" data-tfc="instant">
                            <div>
                                <img src="<?= base_url('user/image/illustration/instant.svg') ?>">
                            </div>
                            <div class="es">
                                <p class="head-form-check">Instan</p>
                                <div class="bx">
                                    <label for="type">pilih kurir</label>
                                    <select name="" id="type-courier" class="josefin ir">
                                        <option value selected disabled>pilih</option>
                                        <option value="instant">instan</option>
                                        <option value="regular">reguler</option>
                                    </select>
                                </div>
                            </div>
                        </div>

                        <div class="regular choose-t tfc-hide" data-tfc="regular">
                            <div>
                                <img src="<?= base_url('user/image/illustration/regular.svg') ?>">
                            </div>
                            <div class="es">
                                <p class="head-form-check">Reguler</p>
                                <div class="bx">
                                    <label for="type">pilih kurir</label>
                                    <select name="" id="type-courier" class="josefin ir">
                                        <option value selected disabled>pilih</option>
                                        <option value="instant">instan</option>
                                        <option value="regular">reguler</option>
                                    </select>
                                </div>
                            </div>
                        </div>

                    </div>

                </div>
            </form>

        </div>
    </div>
</main>
<?= $this->endSection(); ?>