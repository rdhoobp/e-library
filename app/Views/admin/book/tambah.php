<?= view('template/header_backend.php')?>
<form action="<?= base_url('book/input') ?>"method="post" enctype="multipart/form-data">
    <input type="text"name="title">
    <input type="text"name="author">
    <input type="text"name="publisher">
    <input type="text"name="genre">
    <input type="text"name="isbn">
    <input type="text"name="availability">
    <input type="file" name="cover" id="cover">
    <input type="file" name="pdf" id="pdf">
</form>
<?= view('template/footer_backend.php')?>