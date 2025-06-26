<?= view('template/header_backend.php') ?>

<div class="container-xxl flex-grow-1 container-p-y">
    <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Books /</span> Add Book</h4>

    <div class="row">
        <div class="col-xxl">
            <div class="card mb-4">
                <div class="card-header d-flex align-items-center justify-content-between">
                    <h5 class="mb-0">Add New Book</h5>
                    <small class="text-muted float-end">Fill out the form</small>
                </div>
                <div class="card-body">
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
                            <label class="col-sm-2 col-form-label" for="genre">Genre</label>
                            <div class="col-sm-10">
                                <input type="text" name="genre" id="genre" class="form-control" placeholder="Genre ID or Name" required>
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label class="col-sm-2 col-form-label" for="isbn">ISBN</label>
                            <div class="col-sm-10">
                                <input type="text" name="isbn" id="isbn" class="form-control" placeholder="ISBN Number" required>
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label class="col-sm-2 col-form-label" for="availability">Availability</label>
                            <div class="col-sm-10">
                                <input type="text" name="availability" id="availability" class="form-control" placeholder="e.g., Available / Not Available" required>
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
                                <input type="file" name="pdf" id="pdf" class="form-control" accept="application/pdf" required>
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