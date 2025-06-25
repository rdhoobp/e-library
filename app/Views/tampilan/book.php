<?= view('template/header.php') ?>

<div class="container">
    <div class="row">
        <div class="col-lg-12">
            <div class="colored">
                <h1 class="page-title">
                    Library
                </h1>
                <div class="breadcum-items">
                    <span class="item">
                        <a href="<?= base_url("/") ?>">Home</a>
                    </span>
                    <span class="item colored">
                        / Library
                    </span>
                </div>
            </div>
        </div>
    </div>
</div>
<section class="padding-medium">
    <div class="container">
        <div class="row">
            <div class="col-md-3">
                <div class="product-item">
                    <figure class="product-style">
                        <img src="<?= base_url("asset/img/book_cover/Sejarah-Dunia-yang-Disembunyikan.jpg") ?>" alt="Books" class="product-item">
                        <button type="button" class="add-to-cart" data-product-tile="add-to-cart">
                            <a href="">Add to Cart</a>
                        </button>
                    </figure>
                    <figcaption>
                        <h3>Sejarah Dunia Yang Disembuntikan</h3>
                        <span>Jonathan Black</span>
                        <div class="item-price">Rp. 119.000</div>
                    </figcaption>
                </div>
            </div>
            <div class="col-md-3">
                <div class="product-item">
                    <figure class="product-style">
                        <img src="<?= base_url("asset/img/book_cover/Sejarah-Dunia-yang-Disembunyikan.jpg") ?>" alt="Books" class="product-item">
                        <button type="button" class="add-to-cart" data-product-tile="add-to-cart">Add to
                            Cart</button>
                    </figure>
                    <figcaption>
                        <h3>Sejarah Dunia Yang Disembuntikan</h3>
                        <span>Jonathan Black</span>
                        <div class="item-price">Rp. 119.000</div>
                    </figcaption>
                </div>
            </div>
            <div class="col-md-3">
                <div class="product-item">
                    <figure class="product-style">
                        <img src="<?= base_url("asset/img/book_cover/Sejarah-Dunia-yang-Disembunyikan.jpg") ?>" alt="Books" class="product-item">
                        <button type="button" class="add-to-cart" data-product-tile="add-to-cart">Add to
                            Cart</button>
                    </figure>
                    <figcaption>
                        <h3>Sejarah Dunia Yang Disembuntikan</h3>
                        <span>Jonathan Black</span>
                        <div class="item-price">Rp. 119.000</div>
                    </figcaption>
                </div>
            </div>
            <div class="col-md-3">
                <div class="product-item">
                    <figure class="product-style">
                        <img src="<?= base_url("asset/img/book_cover/Sejarah-Dunia-yang-Disembunyikan.jpg") ?>" alt="Books" class="product-item">
                        <button type="button" class="add-to-cart" data-product-tile="add-to-cart">Add to
                            Cart</button>
                    </figure>
                    <figcaption>
                        <h3>Sejarah Dunia Yang Disembuntikan</h3>
                        <span>Jonathan Black</span>
                        <div class="item-price">Rp. 119.000</div>
                    </figcaption>
                </div>
            </div>
        </div>
    </div>
</section>

<?= view('template/footer.php') ?>