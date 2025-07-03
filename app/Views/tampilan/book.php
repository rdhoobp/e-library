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
            <?php foreach ($books as $book): ?>
                <div class="col-md-3 mb-4">
                    <div class="product-item">
                        <figure class="product-style">
                            <img src="<?= base_url('asset/img/book_cover/' . $book['cover']) ?>" alt="<?= esc($book['title']) ?>" class="product-item">
                            <button type="button" class="add-to-cart" data-product-tile="add-to-cart">
                                <a href="<?= base_url('book/detail/'.$book['book_id']) ?> ">READ NOW!</a>
                            </button>
                        </figure>
                        <figcaption>
                            <h3><?= esc($book['title']) ?></h3>
                            <span><?= esc($book['author']) ?></span>
                            <!-- <span><?= esc($book['publisher']) ?></span> -->
                        </figcaption>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
        <div class="row mt-5">
            <div class="col-md-12 d-flex justify-content-center">
                <?= $pager->links('default', 'bootstrap_custom') ?>
            </div>
        </div>
    </div>
</section>


<?= view('template/footer.php') ?>