<?= view('template/header.php') ?>
<?php $validation = \Config\Services::validation();?>
    <?php
                        if(session()->get("success")){?>
                            <div class="col-12"style="background-color:lightgreen;text-align:center;">
                                <?= session()->get("success")?>
                            </div>
                        <?php }if(!empty($validation->getErrors())) { ?>
                            <div class="col-12 is-invalid"style="background-color:red;text-align:center;color:white">
                                <?php foreach($validation->getErrors() as $error) : ?>
                                    <?= $error; ?>
                                <?php endforeach ?>
                            </div>
                        <?php }
                    ?>
    <?php
        if($data != null){?>
            <div>
                <form action="user/password/update"method="post">
                    <input type="email"name = "email"value="<?= $data['email'] ?>"style="display:none;"><br>
                    <input type="password"name="password"placeholder="Masukkan Password"required><br>
                    <input type="password"name="password_confirm"placeholder="Masukkan Ulang Password"required><br>
                    <button type="submit">Change Password</button>
                </form>
            </div>
        <?php }else{?>
            <div>
                <form action="user/password/update"method="post"><br>
                    <input type="email"name = "email" placeholder="Masukkan Email"required><br>
                    <input type="password"name="password"placeholder="Masukkan Password"required><br>
                    <input type="password_confirm"name="password_confirm"placeholder="Masukkan Ulang Password"required><br>
                    <button type="submit">Change Password</button>
                </form>
            </div>
        <?php }
    ?>
<?= view('template/footer.php') ?>