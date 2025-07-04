<?= view('template/header_backend.php') ?>
<div class="content-wrapper">
    <!-- Content -->
    <div class="container-xxl flex-grow-1 container-p-y">
        <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Genre /</span> Genre Data</h4>

        <div class="card">
            <?php if (session()->getFlashdata('success')): ?>
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    <?= session()->getFlashdata('success') ?>
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            <?php endif; ?>

            <?php if (session()->getFlashdata('error')): ?>
                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                    <?= is_array(session()->getFlashdata('error')) ? implode('<br>', session()->getFlashdata('error')) : session()->getFlashdata('error') ?>
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            <?php endif; ?>
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
                                            <a class="dropdown-item" href="<?= base_url('genre/edit/' . $genre['genre_id']) ?>">
                                                <i class="bx bx-edit-alt me-1"></i> Edit
                                            </a>
                                            <a class="dropdown-item text-danger" href="#"
                                                data-bs-toggle="modal"
                                                data-bs-target="#deleteGenreModal"
                                                data-id="<?= $genre['genre_id'] ?>"
                                                data-name="<?= esc($genre['name']) ?>">
                                                <i class="bx bx-trash me-1"></i> Hapus
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
<!-- Delete Genre Confirmation Modal -->
<div class="modal fade" id="deleteGenreModal" tabindex="-1" aria-labelledby="deleteGenreModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header bg-danger text-white">
                <h5 class="modal-title text-white mb-2" id="deleteGenreModalLabel">Konfirmasi Hapus Genre</h5>
                <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body" id="deleteGenreModalBody">
                <!-- Isi nanti diisi oleh JS -->
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                <a href="#" id="confirmDeleteGenreBtn" class="btn btn-danger">Hapus</a>
            </div>
        </div>
    </div>
</div>
<script>
    const deleteGenreModal = document.getElementById('deleteGenreModal');
    deleteGenreModal.addEventListener('show.bs.modal', function(event) {
        const button = event.relatedTarget;
        const genreId = button.getAttribute('data-id');
        const genreName = button.getAttribute('data-name');
        const confirmBtn = document.getElementById('confirmDeleteGenreBtn');
        const bodyText = document.getElementById('deleteGenreModalBody');

        confirmBtn.href = '<?= base_url("genre/delete") ?>/' + genreId;
        bodyText.textContent = `Apakah Anda yakin ingin menghapus genre "${genreName}"? Proses ini tidak dapat dibatalkan.`;
    });
</script>
<?= view('template/footer_backend.php') ?>