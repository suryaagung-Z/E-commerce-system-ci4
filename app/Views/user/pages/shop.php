<?= $this->extend('user/template'); ?>

<?= $this->section('content'); ?>
<main class="shop">
    <div class="current-page">
        <p> <a href="<?= base_url(); ?>">home</a> <span class="this-page">/ shop</span></p>
    </div>

    <div class="header-shop section-shop">
        <p class="judul montserrat">Produk</p>
        <select id="sortir" class="josefin">
            <option value="default" selected>Pilih bawaan</option>
            <option value="bestSeller">Pilih terlaris</option>
            <option value="latest">Pilih terbaru</option>
            <option value="lowToHigh">Pilih harga rendah ke tinggi</option>
            <option value="highToLow">Pilih harga tinggi ke rendah</option>
        </select>
    </div>

    <div class="content section-shop">
        <div class="filter-shop" id="filter-shop">
            <div class="category section-filter">
                <p class="head-filter montserrat">Kategori <i class="far fa-times-circle cursor-pointer-custom"></i></p>
                <ul>
                    <?php foreach ($dataCategory as $dc) { ?>
                        <li>
                            <a id="filterCategory"> <?= $dc['category_name']; ?> </a>
                            <span class="total">&nbsp;(<?= $dc['count']; ?>)</span>
                        </li>
                    <?php } ?>
                </ul>
            </div>
            <div class="search-product section-filter">
                <p class="head-filter montserrat">cari</p>
                <div class="boxInput">
                    <input type="search" id="src-product" class="josefin" placeholder="Cari produk..." data-url="<?= base_url('shop/src') ?>">
                    <label class="for cursor-pointer-custom" id="btnSrc">cari</label>
                </div>
            </div>
            <div class="section-filter filter-price">
                <p class="head-filter montserrat">Filter harga</p>
                <div id="my-range"></div>
                <div class="box-count-range">
                    <button id="priceFilter" class="josefin cursor-pointer-custom" data-url="<?= base_url('shop/pricefilters') ?>">filter</button>
                    <span class="range-count">
                        <span>
                            Rp&nbsp;<p id="low"></p>
                        </span>
                        <i class="fas fa-arrows-alt-v"></i>
                        <span>
                            Rp&nbsp;<p id="high"></p>
                        </span>
                    </span>
                </div>
            </div>

            <div id="btn-filter" class="cursor-pointer-custom">
                <i class="fas fa-cog"></i>
                <span>FILTER</span>
            </div>
        </div>

        <div class="content-shop <?php if ($dataProduct == NULL) echo 'content-shop-1r'; ?>">
            <?php if ($dataProduct == NULL) { ?>
                <div class="box-animNoResult">
                    <div id="animNoResult" data-lnkAnim="<?= base_url('user/js/animated/noResult.json') ?>"></div>
                    <p>
                        <span class="text">tidak ada hasil</span>
                        <span id="valNoResult"></span>
                    </p>
                </div>
            <?php } else { ?>

                <?php foreach ($dataProduct as $dp) { ?>
                    <div class="box-product" id="box-product">

                        <div class="sell-box-bg">
                            <a href="<?= base_url('shop/detail-product/' . $dp['product_name']) ?>">
                                <img src="<?= base_url('user/image/product/' . $dp['product_photo']) ?>" class="bg">
                            </a>
                            <div id="boxLoading" class="boxLoading-hide">
                                <div class="productSpinner">
                                    <span></span>
                                    <span></span>
                                    <span></span>
                                    <span></span>
                                </div>
                            </div>
                        </div>
                        <div class="text" id="textP" data-P="<?= $dp['sold']; ?>|<?= $dp['id']; ?>" data-ctg="<?= $dp['category'] ?>">
                            <div id="sellName"> <?= $dp['product_name']; ?> </div>
                            <div class="btb">
                                <p class="sellPrice">Rp <span id="priceNum"> <?= $dp['price']; ?> </span></p>
                                <p class="Psold"><span> <?= $dp['sold']; ?> </span> Terjual</p>
                            </div>
                        </div>

                    </div>
                <?php } ?>
            <?php } ?>
        </div>
    </div>

    <div class="pagination">
        <div id="prev" class="pn cursor-pointer-custom"> prev </div>
        <div class="number">
            <input type="number"> / <span id="total">12</span>
        </div>
        <div id="next" class="pn cursor-pointer-custom"> next </div>
    </div>
</main>
<?= $this->endSection(); ?>