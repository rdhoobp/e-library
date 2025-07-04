<?= view('template/header_backend.php') ?>

<div class="container-xxl flex-grow-1 container-p-y">
    <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Books /</span> Edit Book</h4>

    <div class="row">
        <div class="col-xxl">
            <div class="card mb-4">
                <div class="card-header d-flex align-items-center justify-content-between">
                    <h5 class="mb-0">Edit Book</h5>
                    <small class="text-muted float-end">Update the form</small>
                </div>
                <div class="card-body">
                    <form action="<?= base_url('book/update/' . $book['book_id']) ?>" method="post" enctype="multipart/form-data">
                        <div class="row mb-3">
                            <label class="col-sm-2 col-form-label" for="title">Title</label>
                            <div class="col-sm-10">
                                <input type="text" name="title" id="title" value="<?= esc($book['title']) ?>" class="form-control" required>
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label class="col-sm-2 col-form-label" for="author">Author</label>
                            <div class="col-sm-10">
                                <input type="text" name="author" id="author" value="<?= esc($book['author']) ?>" class="form-control" required>
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label class="col-sm-2 col-form-label" for="publisher">Publisher</label>
                            <div class="col-sm-10">
                                <input type="text" name="publisher" id="publisher" value="<?= esc($book['publisher']) ?>" class="form-control" required>
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label class="col-sm-2 col-form-label" for="genre_id">Genre</label>
                            <div class="col-sm-10">
                                <select name="genre_id" id="genre_id" class="form-select" required>
                                    <?php foreach ($genre as $g): ?>
                                        <option value="<?= esc($g['genre_id']) ?>" <?= $book['genre_id'] == $g['genre_id'] ? 'selected' : '' ?>>
                                            <?= esc($g['name']) ?>
                                        </option>
                                    <?php endforeach; ?>
                                </select>
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label class="col-sm-2 col-form-label" for="isbn">ISBN</label>
                            <div class="col-sm-10">
                                <input type="text" name="isbn" id="isbn" value="<?= esc($book['isbn']) ?>" class="form-control" required>
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label class="col-sm-2 col-form-label" for="deskripsi">Deskripsi</label>
                            <div class="col-sm-10">
                                <textarea name="deskripsi" id="deskripsi" class="form-control" required><?= esc($book['deskripsi']) ?></textarea>
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label class="col-sm-2 col-form-label" for="sinopsis">Sinopsis</label>
                            <div class="col-sm-10">
                                <textarea name="sinopsis" id="sinopsis" class="form-control" required><?= esc($book['sinopsis']) ?></textarea>
                            </div>
                        </div>


                        <div class="row mb-3">
                            <label class="col-sm-2 col-form-label" for="cover">Cover</label>
                            <div class="col-sm-10">
                                <input type="file" name="cover" id="cover" class="form-control" accept="image/*">
                                <small class="text-muted">Leave empty if not changing cover. Current: <strong><?= esc($book['cover']) ?></strong></small>
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label class="col-sm-2 col-form-label" for="pdf">PDF</label>
                            <div class="col-sm-10">
                                <input type="file" name="pdf" id="pdf" class="form-control" accept="application/pdf">
                                <small class="text-muted">Leave empty if not changing PDF. Current: <strong><?= esc($book['pdf'] ?? 'N/A') ?></strong></small>
                            </div>
                        </div>


                        <div class="row justify-content-end">
                            <div class="col-sm-10">
                                <button type="submit" class="btn btn-primary">Update Book</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<?= view('template/footer_backend.php') ?>