<?= view('template/header_backend.php') ;
$no = 1;?>
<a href="<?= base_url("book/add") ?>">tambah</a>
<table style="width:100%;border:1px solid black;">
    <th>
        <tr>
            <th>No</th>
            <th>Title</th>
            <th>Author</th>
            <th>Publisher</th>
            <th>Genre</th>
            <th>ISBN</th>
            <th>Availability</th>
            <th>Cover</th>
            <th>Action</th>
        </tr>
    </th>
    <?php
    foreach ($book as $book): ?>
        <tr>
            <td><?= $no ?></td>
            <td><?= $book['title'] ?></td>
            <td><?= $book['author'] ?></td>
            <td><?= $book['publisher'] ?></td>
            <td><?= $book['genre_id'] ?></td>
            <td><?= $book['isbn'] ?></td>
            <td><?= $book['availability'] ?></td>
            <td><img src="<?= base_url('asset/img/book_cover/'.$book['cover']) ?>" alt=""style="width:200px;
            height:300px;"></td>
            <td><a href="edit/<?= $book['book_id'] ?>">action</a></td>
        </tr>
    <?php $no++;endforeach;
    ?>
</table>
<?= view('template/footer_backend.php') ?>