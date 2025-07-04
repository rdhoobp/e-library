<?= view('template/header_backend.php') ?>
<div class="content-wrapper">
    <!-- Content -->
    <div class="container-xxl flex-grow-1 container-p-y">
        <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Book /</span> Book Data</h4>

        <div class="card">
            <?php if (session()->getFlashdata('success')): ?>
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    <?= session()->getFlashdata('success') ?>
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            <?php endif; ?>
            <?php if (session()->getFlashdata('error')): ?>
                <div class="alert alert-danger alert-dismissible fade show  role=" alert">
                    <?= session()->getFlashdata('error') ?>
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            <?php endif; ?>
            <div class="card-header d-flex justify-content-between align-items-center">
                <h5 class="mb-0">Book Data</h5>
                <a href="<?= base_url("book/add") ?>" class="btn btn-primary">+ Add Book</a>
            </div>
            <div class="table-responsive text-nowrap">
                <table class="table">
                    <thead class="table-light">
                        <tr>
                            <th>No</th>
                            <th>Title</th>
                            <th>Author</th>
                            <th>Publisher</th>
                            <th>Genre</th>
                            <th>ISBN</th>
                            <th>Cover</th>
                            <th>Details</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody class="table-border-bottom-0">
                        <?php $no = 1;
                        foreach ($book as $book): ?>
                            <tr>
                                <td><?= $no++ ?></td>
                                <td>
                                    <strong>
                                        <span title="<?= esc($book['title']) ?>">
                                            <?= (strlen($book['title']) > 21) ? esc(substr($book['title'], 0, 21)) . '...' : esc($book['title']) ?>
                                        </span>
                                    </strong>
                                </td>
                                <td>
                                    <span title="<?= esc($book['author']) ?>">
                                        <?= (strlen($book['author']) > 21) ? esc(substr($book['author'], 0, 21)) . '...' : esc($book['author']) ?>
                                    </span>
                                </td>
                                <td>
                                    <span title="<?= esc($book['publisher']) ?>">
                                        <?= (strlen($book['publisher']) > 21) ? esc(substr($book['publisher'], 0, 21)) . '...' : esc($book['publisher']) ?>
                                    </span>
                                </td>
                                <td>
                                    <?php foreach ($genre as $genres): ?>
                                        <?php if ($genres['genre_id'] == $book['genre_id']) : ?>
                                            <?= esc($genres['name']) ?>
                                        <?php endif; ?>
                                    <?php endforeach; ?>
                                </td>
                                <td>
                                    <span title="<?= esc($book['isbn']) ?>">
                                        <?= (strlen($book['isbn']) > 21) ? esc(substr($book['isbn'], 0, 21)) . '...' : esc($book['isbn']) ?>
                                    </span>
                                </td>
                                <td>
                                    <img src="<?= base_url('asset/img/book_cover/' . $book['cover']) ?>" alt="Cover" style="height: 60px; width: 40px; object-fit: cover;" class="rounded shadow-sm">
                                </td>
                                <td>
                                    <button
                                        class="btn rounded-pill btn-outline-info"
                                        data-bs-toggle="modal"
                                        data-bs-target="#detailModal"
                                        data-title="<?= esc($book['title']) ?>"
                                        data-deskripsi="<?= esc($book['deskripsi']) ?>"
                                        data-sinopsis="<?= esc($book['sinopsis']) ?>">
                                        Lihat Detail
                                    </button>
                                </td>

                                <td>
                                    <div class="dropdown">
                                        <button type="button" class="btn p-0 dropdown-toggle hide-arrow" data-bs-toggle="dropdown">
                                            <i class="bx bx-dots-vertical-rounded"></i>
                                        </button>
                                        <div class="dropdown-menu">
                                            <a class="dropdown-item" href="<?= base_url('book/edit/' . $book['book_id']) ?>">
                                                <i class="bx bx-edit-alt me-1"></i> Edit
                                            </a>
                                            <a class="dropdown-item text-danger" href="#"
                                                data-bs-toggle="modal"
                                                data-bs-target="#deleteModal"
                                                data-id="<?= $book['book_id'] ?>"
                                                data-title="<?= esc($book['title']) ?>">
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
<!-- Delete Confirmation Modal -->
<div class="modal fade" id="deleteModal" tabindex="-1" aria-labelledby="deleteModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header bg-danger text-white">
                <h5 class="text-white" id="deleteModalLabel">Konfirmasi Hapus Buku</h5>
                <!-- <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button> -->
            </div>
            <div class="modal-body" id="deleteModalBody">
                <!-- Apakah anda yakin untuk menghapus buku ini? Proses ini tidak dapat dibatalkan. -->
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                <a href="#" id="confirmDeleteBtn" class="btn btn-danger">Hapus</a>
            </div>
        </div>
    </div>
</div>
<!-- Detail Modal -->
<div class="modal fade" id="detailModal" tabindex="-1" aria-labelledby="detailModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-scrollable">
        <div class="modal-content">
            <div class="modal-header bg-info text-white">
                <h5 class="modal-title text-white mb-2" id="detailModalLabel">Detail Buku</h5>
                <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Tutup"></button>
            </div>
            <div class="modal-body">
                <h6><strong>Deskripsi:</strong></h6>
                <p id="modalDeskripsi"></p>
                <hr>
                <h6><strong>Sinopsis:</strong></h6>
                <p id="modalSinopsis"></p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
            </div>
        </div>
    </div>
</div>
<script>
    const detailModal = document.getElementById('detailModal');
    detailModal.addEventListener('show.bs.modal', function(event) {
        const button = event.relatedTarget;
        const title = button.getAttribute('data-title');
        const deskripsi = button.getAttribute('data-deskripsi');
        const sinopsis = button.getAttribute('data-sinopsis');

        detailModal.querySelector('.modal-title').textContent = `Detail Buku: ${title}`;
        document.getElementById('modalDeskripsi').textContent = deskripsi;
        document.getElementById('modalSinopsis').textContent = sinopsis;
    });

    const deleteModal = document.getElementById('deleteModal');
    deleteModal.addEventListener('show.bs.modal', function(event) {
        const button = event.relatedTarget;
        const bookId = button.getAttribute('data-id');
        const bookTitle = button.getAttribute('data-title');
        const confirmBtn = document.getElementById('confirmDeleteBtn');
        const bodyText = document.getElementById('deleteModalBody');

        confirmBtn.href = '<?= base_url("book/delete") ?>/' + bookId;
        bodyText.textContent = `Apakah anda yakin untuk menghapus "${bookTitle}"? Proses ini akan tidak dapat dibatalkan.`;
    });
</script>
<?= view('template/footer_backend.php') ?>