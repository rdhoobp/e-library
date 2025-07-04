<?= view('template/header_backend.php') ?>

<div class="container-xxl flex-grow-1 container-p-y">
    <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Books /</span> Add Book</h4>

    <div class="row">
        <div class="col-xxl">
            <div class="card mb-4">
                <div class="card-header d-flex align-items-cen9786020672700ter justify-content-between">
                    <h5 class="mb-0">Add New Book</h5>
                    <small class="text-muted float-end">Fill out the form</small>
                </div>
                <div class="card-body">
                    <?php if (session()->getFlashdata('errors')): ?>
                        <div class="alert alert-danger">
                            <ul class="mb-0">
                                <?php foreach (session()->getFlashdata('errors') as $error): ?>
                                    <li><?= esc($error) ?></li>
                                <?php endforeach; ?>
                            </ul>
                        </div>
                    <?php endif; ?>
                    <form action="<?= base_url('book/input') ?>" method="post" enctype="multipart/form-data">
                        <div class="row mb-3">
                            <label class="col-sm-2 col-form-label" for="title">Title</label>
                            <div class="col-sm-10">
                                <input type="text" name="title" id="title" class="form-control" placeholder="Book Title" required>
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label class="col-sm-2 col-form-label" for="author">Author</label>
                            <div class="col-sm-10">
                                <input type="text" name="author" id="author" class="form-control" placeholder="Author Name" required>
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label class="col-sm-2 col-form-label" for="publisher">Publisher</label>
                            <div class="col-sm-10">
                                <input type="text" name="publisher" id="publisher" class="form-control" placeholder="Publisher Name" required>
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label class="col-sm-2 col-form-label" for="genre_id">Genre</label>
                            <div class="col-sm-10">
                                <select name="genre_id" id="genre_id" class="form-select" required>
                                    <option value="">-- Select Genre --</option>
                                    <?php foreach ($genre as $g): ?>
                                        <option value="<?= esc($g['genre_id']) ?>"><?= esc($g['name']) ?></option>
                                    <?php endforeach; ?>
                                </select>
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label class="col-sm-2 col-form-label" for="isbn">ISBN</label>
                            <div class="col-sm-10">
                                <input type="text" name="isbn" id="isbn" class="form-control" placeholder="ISBN Number" required>
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label class="col-sm-2 col-form-label" for="deskripsi">Deskripsi</label>
                            <div class="col-sm-10">
                                <textarea name="deskripsi" id="deskripsi" class="form-control" placeholder="Deskripsi singkat buku..." required></textarea>
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label class="col-sm-2 col-form-label" for="sinopsis">Sinopsis</label>
                            <div class="col-sm-10">
                                <textarea name="sinopsis" id="sinopsis" class="form-control" placeholder="Sinopsis lengkap buku..." required></textarea>
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label class="col-sm-2 col-form-label" for="cover">Cover</label>
                            <div class="col-sm-10">
                                <input type="file" name="cover" id="cover" class="form-control" accept="image/*" required>
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
                                <button type="submit" class="btn btn-primary">Add Book</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<?= view('template/footer_backend.php') ?>