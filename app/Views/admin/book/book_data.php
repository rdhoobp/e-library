<?= view('template/header_backend.php') ?>
<div class="content-wrapper">
    <!-- Content -->
    <div class="container-xxl flex-grow-1 container-p-y">
        <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Book /</span> Book Data</h4>

        <div class="card">
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
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody class="table-border-bottom-0">
                        <?php $no = 1;
                        foreach ($book as $book): ?>
                            <tr>
                                <td><?= $no++ ?></td>
                                <td><strong><?= esc($book['title']) ?></strong></td>
                                <td><?= esc($book['author']) ?></td>
                                <td><?= esc($book['publisher']) ?></td>
                                <td><?php 
                                    foreach($genre as $genres){
                                        if($genres['genre_id'] == $book['genre_id']){
                                            echo $genres['name'];
                                        }
                                    } ?></td>
                                <td><?= esc($book['isbn']) ?></td>
                                <td>
                                    <img src="<?= base_url('asset/img/book_cover/' . $book['cover']) ?>.jpg" alt="Cover" style="height: 60px; width: 40px; object-fit: cover;" class="rounded shadow-sm">
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
                                            <a class="dropdown-item" href="<?= base_url('book/delete/' . $book['book_id']) ?>" onclick="return confirm('Delete this book?')">
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