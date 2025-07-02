<?= view('template/header_backend.php') ?>
<div class="content-wrapper">
    <!-- Content -->
    <div class="container-xxl flex-grow-1 container-p-y">
        <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Genre /</span> Genre Data</h4>

        <div class="card">
            <div class="card-header d-flex justify-content-between align-items-center">
                <h5 class="mb-0">Genre Data</h5>
                <a href="<?= base_url("genre/add") ?>" class="btn btn-primary">+ Add Genre</a>
            </div>

            <div class="table-responsive text-nowrap">
                <table class="table">
                    <thead class="table-light">
                        <tr>
                            <th>No</th>
                            <th>Name</th>
                            <th>Description</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody class="table-border-bottom-0">
                        <?php $no = 1;
                        foreach ($genre as $genre): ?>
                            <tr>
                                <td><?= $no++ ?></td>
                                <td><strong><?= esc($genre['name']) ?></strong></td>
                                <td><?= esc($genre['description']) ?></td>
                                <td>
                                    <div class="dropdown">
                                        <button type="button" class="btn p-0 dropdown-toggle hide-arrow" data-bs-toggle="dropdown">
                                            <i class="bx bx-dots-vertical-rounded"></i>
                                        </button>
                                        <div class="dropdown-menu">
                                            <a class="dropdown-item" href="<?= base_url('book/edit/' . $genre['genre_id']) ?>">
                                                <i class="bx bx-edit-alt me-1"></i> Edit
                                            </a>
                                            <a class="dropdown-item" href="<?= base_url('book/delete/' . $genre['genre_id']) ?>" onclick="return confirm('Delete this genre?')">
                                                <i class="bx bx-trash me-1"></i> Delete
                                            </a>
                                        </div>
                                    </div>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
<?= view('template/footer_backend.php') ?>