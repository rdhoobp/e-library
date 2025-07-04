<?= view('template/header_backend.php') ?>

<div class="container-xxl flex-grow-1 container-p-y">
    <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Quote /</span> Update Quote</h4>

    <div class="row">
        <div class="col-xxl">
            <div class="card mb-4">
                <?php if (session()->get("success")): ?>
                    <div class="col-12">
                        <div class="alert alert-success text-center mb-3">
                            <?= session()->get("success") ?>
                        </div>
                    </div>
                <?php endif; ?>

                <?php if (!empty(session()->get("error"))): ?>
                    <div class="col-12">
                        <div class="alert alert-danger text-center mb-3">
                            <?= is_array(session()->get("error")) ? implode('<br>', session()->get("error")) : session()->get("error") ?>
                        </div>
                    </div>
                <?php endif; ?>

                <div class="card-header d-flex align-items-center justify-content-between">
                    <h5 class="mb-0">Edit Quote</h5>
                    <small class="text-muted float-end">Fill out the form</small>
                </div>

                <div class="card-body">
                    <form action="<?= base_url('quote/update') ?>" method="post">
                        <input type="hidden" name="id" value="<?= $quote['id'] ?>">

                        <div class="row mb-3">
                            <label class="col-sm-2 col-form-label" for="quote">Quote</label>
                            <div class="col-sm-10">
                                <textarea name="quote" id="quote" class="form-control" placeholder="Quote text" required><?= $quote['quote'] ?></textarea>
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label class="col-sm-2 col-form-label" for="author">Author</label>
                            <div class="col-sm-10">
                                <input type="text" name="author" id="author" class="form-control" value="<?= $quote['author'] ?>" placeholder="Author Name" required>
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label class="col-sm-2 col-form-label" for="active">Status</label>
                            <div class="col-sm-10">
                                <select name="active" id="active" class="form-control" required>
                                    <option value="1" <?= $quote['active'] == 1 ? 'selected' : '' ?>>Active</option>
                                    <option value="0" <?= $quote['active'] == 0 ? 'selected' : '' ?>>Inactive</option>
                                </select>
                            </div>
                        </div>

                        <div class="row justify-content-end">
                            <div class="col-sm-10">
                                <button type="submit" class="btn btn-primary">Update Quote</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<?= view('template/footer_backend.php') ?>