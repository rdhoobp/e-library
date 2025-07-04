<?= view('template/header.php') ?>

<section class="bg-sand padding-medium">
    <div class="container">
        <div class="row">
            <!-- Book Cover -->
            <div class="col-md-5">
                <img src="<?= base_url("asset/img/book_cover/" . esc($data['cover'])) ?>" alt="Book Cover" class="img-fluid rounded shadow-sm">
            </div>

            <!-- Book Info -->
            <div class="col-md-7 ps-md-5 mt-4 mt-md-0">
                <div class="product-detail">
                    <span class="badge bg-secondary mb-2">
                        <?php foreach ($genre as $g): ?>
                            <?php if ($g['genre_id'] == $data['genre_id']) echo esc($g['name']); ?>
                        <?php endforeach; ?>
                    </span>
                    <h1 class="mb-3"><?= esc($data['title']) ?></h1>
                    <h6 class="text-muted">by <?= esc($data['author']) ?> • ISBN: <?= esc($data['isbn']) ?></h6>
                    <hr>
                    <p><?= esc($data['deskripsi']) ?></p>

                    <!-- Read Button Logic -->
                    <?php if (!empty($data['pdf']) && $data['pdf'] !== 'null'): ?>
                        <?php if (session()->has('id')): ?>
                            <a href="#read-section" class="btn btn-primary mt-3">Read Book</a>
                        <?php else: ?>
                            <a href="<?= base_url('login') ?>" class="btn btn-warning mt-3">Login to Read</a>
                        <?php endif; ?>
                    <?php endif; ?>

                </div>
            </div>
        </div>
    </div>
</section>

<!-- PDF Viewer -->
<?php if (!empty($data['pdf']) && $data['pdf'] !== 'null' && session()->has('id')): ?>
    <section id="read-section" class="bg-light py-5">
        <div class="container">
            <h3 class="mb-4">Preview: <?= esc($data['title']) ?></h3>
            <div class="ratio ratio-16x9">
                <iframe src="<?= base_url("asset/pdf/" . $data['pdf']) ?>" allowfullscreen></iframe>
            </div>
        </div>
    </section>
<?php endif; ?>

<!-- Tabs Section (optional details) -->
<section class="product-tabs mt-5">
    <div class="container">
        <ul class="nav nav-tabs justify-content-center" role="tablist">
            <li class="nav-item">
                <button class="nav-link active" data-bs-toggle="tab" data-bs-target="#description" type="button" role="tab">Description</button>
            </li>
            <li class="nav-item">
                <button class="nav-link" data-bs-toggle="tab" data-bs-target="#additional-info" type="button" role="tab">Additional Info</button>
            </li>
            <li class="nav-item">
                <button class="nav-link" data-bs-toggle="tab" data-bs-target="#return" type="button" role="tab">Shipping & Return</button>
            </li>
        </ul>

        <div class="tab-content pt-4">
            <div class="tab-pane fade show active" id="description" role="tabpanel">
                <h5>Sinopsis</h5>
                <p><?= esc($data['sinopsis']) ?></p>
            </div>
            <div class="tab-pane fade" id="additional-info" role="tabpanel">
                <ul>
                    <li><strong>Author:</strong> <?= esc($data['author']) ?></li>
                    <li><strong>Publisher:</strong> <?= esc($data['publisher']) ?></li>
                    <li><strong>ISBN:</strong> <?= esc($data['isbn']) ?></li>
                    <li><strong>Genre:</strong>
                        <?php foreach ($genre as $g): ?>
                            <?php if ($g['genre_id'] == $data['genre_id']) echo esc($g['name']); ?>
                        <?php endforeach; ?>
                    </li>
                </ul>
            </div>
            <div class="tab-pane fade" id="return" role="tabpanel">
                <p>This book is provided digitally and is non-returnable. If you experience technical issues, contact our support.</p>
            </div>
        </div>
    </div>
</section>

<?= view('template/footer.php') ?>