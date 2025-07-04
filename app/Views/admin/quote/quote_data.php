<?= view('template/header_backend.php') ?>
<div class="content-wrapper">
    <!-- Content -->
    <div class="container-xxl flex-grow-1 container-p-y">
        <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Quote /</span> Quote Data</h4>

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
                <h5 class="mb-0">Quote Data</h5>
                <a href="<?= base_url("quote/add") ?>" class="btn btn-primary">+ Add Quote</a>
            </div>

            <div class="table-responsive text-nowrap">
                <table class="table">
                    <thead class="table-light">
                        <tr>
                            <th>No</th>
                            <th>Quote</th>
                            <th>Author</th>
                            <th>Status</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody class="table-border-bottom-0">
                        <?php $no = 1;
                        foreach ($quotes as $quote): ?>
                            <tr>
                                <td><?= $no++ ?></td>
                                <td><em><?= esc($quote['quote']) ?></em></td>
                                <td><?= esc($quote['author']) ?></td>
                                <td>
                                    <?php if ($quote['active']): ?>
                                        <span class="badge bg-label-success">Active</span>
                                    <?php else: ?>
                                        <span class="badge bg-label-secondary">Inactive</span>
                                    <?php endif; ?>
                                </td>
                                <td>
                                    <div class="dropdown">
                                        <button type="button" class="btn p-0 dropdown-toggle hide-arrow" data-bs-toggle="dropdown">
                                            <i class="bx bx-dots-vertical-rounded"></i>
                                        </button>
                                        <div class="dropdown-menu">
                                            <a class="dropdown-item" href="<?= base_url('quote/edit/' . $quote['id']) ?>">
                                                <i class="bx bx-edit-alt me-1"></i> Edit
                                            </a>
                                            <a class="dropdown-item text-danger" href="#"
                                                data-bs-toggle="modal"
                                                data-bs-target="#deleteQuoteModal"
                                                data-id="<?= $quote['id'] ?>"
                                                data-author="<?= esc($quote['author']) ?>">
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

<!-- Delete Quote Confirmation Modal -->
<div class="modal fade" id="deleteQuoteModal" tabindex="-1" aria-labelledby="deleteQuoteModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header bg-danger text-white">
                <h5 class="modal-title text-white mb-2" id="deleteQuoteModalLabel">Confirm Delete Quote</h5>
                <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body" id="deleteQuoteModalBody">
                <!-- Content populated by JS -->
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                <a href="#" id="confirmDeleteQuoteBtn" class="btn btn-danger">Yes, Delete</a>
            </div>
        </div>
    </div>
</div>

<script>
    const deleteQuoteModal = document.getElementById('deleteQuoteModal');
    deleteQuoteModal.addEventListener('show.bs.modal', function(event) {
        const button = event.relatedTarget;
        const quoteId = button.getAttribute('data-id');
        const authorName = button.getAttribute('data-author');
        const confirmBtn = document.getElementById('confirmDeleteQuoteBtn');
        const bodyText = document.getElementById('deleteQuoteModalBody');

        confirmBtn.href = '<?= base_url("quote/delete") ?>/' + quoteId;
        bodyText.textContent = `Are you sure you want to delete quote by "${authorName}"? This action cannot be undone.`;
    });
</script>

<?= view('template/footer_backend.php') ?>