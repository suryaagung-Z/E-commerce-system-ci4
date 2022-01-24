<?= $this->extend('user/template'); ?>

<?= $this->section('content'); ?>
<main class="auth">
    <div class="header">
        <img src="<?= base_url('user/image/bg/bg-auth.jpg') ?>">
        <div class="text">
            <p class="montserrat">Autentikasi</p>
        </div>
    </div>
    <div class="content section">
        <div class="box-form">
            <div class="login">
                <form action="<?= base_url('login') ?>" method="POST">
                    <p class="head-form">Masuk</p>

                    <?php
                    echo session()->getFlashdata('message_L');
                    ?>

                    <label for="username-login">nama pengguna / email <span class="required">*</span></label>
                    <div class="box-input">
                        <input class="montserrat" type="text" name="username_L" id="username-login" autocomplete="off" value="<?= old('username_L'); ?>">
                        <small class="warning"><?php if ($formValid->hasError('username_L')) echo $formValid->getError('username_L'); ?></small>
                    </div>

                    <label for="pass-login">kata sandi <span class="required">*</span></label>
                    <div class="box-input">
                        <input class="montserrat" type="password" name="password_L" id="pass-login" value="<?= old('password_L'); ?>">
                        <i class="fas fa-eye-slash" id="eye"></i>
                        <small class="warning"><?php if ($formValid->hasError('password_L')) echo $formValid->getError('password_L'); ?></small>
                    </div>

                    <div class="last">
                        <button type="submit" class="montserrat cursor-pointer-custom">login</button>
                        <div class="remember">
                            <input class="montserrat" type="checkbox" name="rememberMe" id="remember">
                            <label for="remember">remember me</label>
                        </div>
                    </div>
                </form>
                <a href="" class="forgot-pass">Forgot password?</a>
            </div>

            <div class="register">
                <form action="<?= base_url('regis') ?>" method="POST">
                    <p class="head-form">Daftar</p>

                    <?php
                    echo session()->getFlashdata('message_R');
                    ?>

                    <label for="username-regis">nama pengguna <span class="required">*</span></label>
                    <div class="box-input">
                        <input class="montserrat" type="text" name="username_R" id="username-regis" autocomplete="off" value="<?= old('username_R'); ?>">
                        <small class="warning"><?php if ($formValid->hasError('username_R')) echo $formValid->getError('username_R'); ?></small>
                    </div>

                    <label for="email">email <span class="required">*</span></label>
                    <div class="box-input">
                        <input class="montserrat" type="text" name="email_R" id="email" autocomplete="off" value="<?= old('email_R'); ?>">
                        <small class="warning"><?php if ($formValid->hasError('email_R')) echo $formValid->getError('email_R'); ?></small>
                    </div>

                    <label for="pass-regis">kata sandi <span class="required">*</span></label>
                    <div class="box-input">
                        <input class="montserrat" type="password" name="pass1" id="pass-regis" autocomplete="current-password" value="">
                        <i class="fas fa-eye-slash" id="eye"></i>
                        <small class="warning"><?php if ($formValid->hasError('pass1')) echo $formValid->getError('pass1'); ?></small>
                    </div>

                    <label for="pass2-regis">ulangi kata sandi <span class="required">*</span></label>
                    <div class="box-input">
                        <input class="montserrat" type="password" name="pass2" id="pass2-regis" autocomplete="current-password" value="">
                        <i class="fas fa-eye-slash" id="eye"></i>
                        <small class="warning"><?php if ($formValid->hasError('pass2')) echo $formValid->getError('pass2'); ?></small>
                    </div>

                    <p class="policy">Data pribadi anda akan digunakan untuk mendukung pengalaman anda di seluruh situs web ini. untuk mengelola akses ke akun Anda. dan untuk tujuan lain yang dijelaskan dalam <a href="">kebijakan privasi kami.</a></p>

                    <button type="submit" class="montserrat cursor-pointer-custom">register</button>
                </form>
            </div>
        </div>
    </div>
</main>
<?= $this->endSection(); ?>