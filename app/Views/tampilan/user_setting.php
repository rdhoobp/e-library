<?= view('template/header.php') ?>
    <div>
        <form action="user/settings/update"method="post"><br>
            <input type="text"name = "username" value="<?= $data['username'] ?>"><br>
            <input type="text"name = "nama" value="<?= $data['name'] ?>"><br>
            <button type="submit">Update</button>
        </form>
    </div>
<?= view('template/footer.php') ?>