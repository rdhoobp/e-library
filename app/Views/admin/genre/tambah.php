<?= view('template/header_backend.php') ?>

<div class="container-xxl flex-grow-1 container-p-y">
    <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Genre /</span> Add Genre</h4>

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
                            <?= session()->get("error") ?>
                        </div>
                    </div>
                <?php endif; ?>
                <div class="card-header d-flex align-items-center justify-content-between">
                    <h5 class="mb-0">Add New Genre</h5>
                    <small class="text-muted float-end">Fill out the form</small>
                </div>
                <div class="card-body">
                    <form action="<?= base_url('genre/input') ?>" method="post">
                        <div class="row mb-3">
                            <label class="col-sm-2 col-form-label" for="name">Genre Name</label>
                            <div class="col-sm-10">
                                <input type="text" name="name" id="name" class="form-control" placeholder="Genre Name" required>
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label class="col-sm-2 col-form-label" for="description">Description</label>
                            <div class="col-sm-10">
                                <textarea type="text" name="description" id="description" class="form-control" placeholder="Description" required></textarea>
                            </div>
                        </div>

                        <div class="row justify-content-end">
                            <div class="col-sm-10">
                                <button type="submit" class="btn btn-primary">Add Genre</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<?= view('template/footer_backend.php') ?>