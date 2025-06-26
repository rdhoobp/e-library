<?= view('template/header.php') ?>

<section class="bg-sand padding-medium">
    <div class="container">
        <div class="row">
            <div class="col-md-5">
                <a href="#" class="product-image">
                    <img src="<?= base_url('asset/img/book_cover/laut-bercerita-leila-s-chudori') ?>.jpg" alt="" class="product-image">
                </a>
            </div>
            <div class="col-md-7 pl-5">
                <div class="product-detail">
                    <span>Fiksi</span>
                    <h1>HAHAHAHHAHA</h1>
                    <!-- <div class="rating-container d-flex align-items-center text-warning mb-4"></div> -->
                    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Quo ut iure quae reprehenderit voluptates quas, ad assumenda nemo quasi corrupti ea eveniet commodi dolor magni praesentium adipisci provident unde neque?</p>
                    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Facilis sequi ad, mollitia commodi aut rem, quod asperiores quae consectetur totam vitae id? Vero aut quas facilis vel nemo repellat corporis?</p>
                    <div class="d-flex gap-3">
                        <a href="#">
                            Read
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<section class="product-tabs mt-5">
    <div class="container">
        <div class="row">
            <div class="tabs-listing">
                <nav>
                    <div class="nav nav-tabs d-flex justify-content-center" id="nav-tab">
                        <button class="nav-link active text-uppercase px-5 py-3" id="nav-home-tab" data-bs-toggle="tab" data-bs-target="#nav-home" type="button" role="tab" aria-controls="nav-home" aria-selected="true">Description</button>
                        <button class="nav-link text-uppercase px-5 py-3" id="nav-information-tab" data-bs-toggle="tab" data-bs-target="#nav-information" type="button" role="tab" aria-controls="nav-information" aria-selected="false" tabindex="-1">Additional information</button>
                        <button class="nav-link text-uppercase px-5 py-3" id="nav-shipping-tab" data-bs-toggle="tab" data-bs-target="#nav-shipping" type="button" role="tab" aria-controls="nav-shipping" aria-selected="false" tabindex="-1">Shipping &amp; Return</button>
                    </div>
                </nav>
                <div class="tab-content py-5" id="nav-tabContent">
                    <div class="tab-pane fade show active" id="nav-home" role="tabpanel" aria-labelledby="nav-home-tab">
                        <h5>Product Description</h5>
                        <p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Donec odio. Quisque volutpat
                            mattis eros.
                            Nullam malesuada erat ut turpis. Suspendisse urna viverra non, semper suscipit, posuere
                            a, pede. Donec
                            nec justo eget felis facilisis fermentum. Aliquam porttitor mauris sit amet orci. Aenean
                            dignissim
                            pellentesque felis. Phasellus ultrices nulla quis nibh. Quisque a lectus. Donec
                            consectetuer ligula
                            vulputate sem tristique cursus.
                        </p>
                        <ul>
                            <li>Donec nec justo eget felis facilisis fermentum.</li>
                            <li>Suspendisse urna viverra non, semper suscipit pede.</li>
                            <li>Aliquam porttitor mauris sit amet orci.</li>
                        </ul> Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Donec odio. Quisque volutpat
                        mattis
                        eros. Nullam malesuada erat ut turpis. Suspendisse urna viverra non, semper suscipit,
                        posuere a, pede.
                        Donec nec justo eget felis facilisis fermentum. Aliquam porttitor mauris sit amet orci.
                        Aenean dignissim
                        pellentesque felis. Phasellus ultrices nulla quis nibh. Quisque a lectus. Donec consectetuer
                        ligula
                        vulputate sem tristique cursus. <p></p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<?= view('template/footer.php') ?>