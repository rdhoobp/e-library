<?= view('template/header.php') ?>
    <?php
        if($data != null){?>
            <div>
                <form action="user/password/update"method="post">
                    <input type="email"name = "email"value="<?= $data['email'] ?>"style="display:none;"><br>
                    <input type="password"name="password"placeholder="Masukkan Password"><br>
                    <input type="password_confirm"name="password_confirm"placeholder="Masukkan Ulang Password"><br>
                    <button type="submit">Change Password</button>
                </form>
            </div>
        <?php }else{?>
            <div>
                <form action="user/password/update"method="post"><br>
                    <input type="email"name = "email" placeholder="Masukkan Email"><br>
                    <input type="password"name="password"placeholder="Masukkan Password"><br>
                    <input type="password_confirm"name="password_confirm"placeholder="Masukkan Ulang Password"><br>
                    <button type="submit">Change Password</button>
                </form>
            </div>
        <?php }
    ?>
<?= view('template/footer.php') ?>