<?= $this->extend('user/template'); ?>

<?= $this->section('content'); ?>
<main class="account">
    <div class="header">
        <img src="<?= base_url('user/image/bg/bg-account.jpg') ?>">
        <div class="text">
            <p class="montserrat">Akun</p>
        </div>
    </div>
    <div class="content section">
        <div class="box-account">
            <div class="profile-image">
                <div class="box-img">
                    <a href="">
                        <i class="fas fa-camera"></i>
                    </a>
                    <div class="img">
                        <img src="<?= base_url('user/image/profile-image/' . $dataUser['photo']) ?>">
                    </div>
                </div>
            </div>
            <div class="move-link">
                <a href="" id="btn_move" data-btnMove="profil" class="move-link-bg">Profil</a>
                <a href="" id="btn_move" data-btnMove="opsional">Data Lainnya</a>
                <a href="" id="btn_move" data-btnMove="setting">
                    <i class="fas fa-cog"></i>
                </a>
            </div>

            <div class="wajib" data-contentMove="profil">
                <p class="head-form">Profil</p>
                <div class="box-data">
                    <div class="box-username data">
                        <span class="label">Nama pengguna</span>
                        <p><?= $dataUser['username']; ?>
                            <a href="">
                                <i class="fas fa-edit"></i>
                            </a>
                        </p>
                    </div>
                    <div class="box-email data">
                        <span class="label">Email</span>
                        <p><?= $dataUser['email']; ?>
                            <a href="">
                                <i class="fas fa-edit"></i>
                            </a>
                        </p>
                    </div>
                    <div class="box-password data">
                        <span class="label">Email cadangan</span>
                        <p><?php if ($dataUser['backup_email'] == '') {
                                echo '-';
                            } else {
                                echo $dataUser['backup_email'];
                            } ?>
                            <a href="">
                                <i class="fas fa-edit"></i>
                            </a>
                        </p>
                    </div>
                    <div>
                        <p class="date_created">
                            <small>bergabung : <?= date('d F Y', $dataUser['date_created']); ?></small>
                        </p>
                    </div>
                </div>
            </div>

            <div class="optional move-hide" data-contentMove="opsional">
                <p class="head-form hf2">Data lainnya
                    <span id="info">
                        <i class="fas fa-info-circle"></i>
                        <span id="infotext">
                            Jika data ini dilengkapi. Maka saat proses checkout semua data akan otomatis terisi.
                        </span>
                    </span>
                </p>
                <form id="personalData" data-url="<?= base_url('personaldata') ?>">
                    <div class="box-input">
                        <label for="nama">Nama :</label>
                        <input type="text" name="nama" id="nama" value="<?= $dataUser['nama']; ?>" class="montserrat" autocomplete="off">
                    </div>

                    <div class="box-input">
                        <label for="provinsi">Provinsi :</label>
                        <input type="text" name="provinsi" id="provinsi" value="<?= $dataUser['prov']; ?>" class="montserrat" autocomplete="off">
                    </div>

                    <div class="box-input">
                        <label for="kota">Kota :</label>
                        <input type="text" name="kota" id="kota" value="<?= $dataUser['kota']; ?>" class="montserrat" autocomplete="off">
                    </div>

                    <div class="box-input">
                        <label for="kec">Kecamatan :</label>
                        <input type="text" name="kec" id="kec" value="<?= $dataUser['kec']; ?>" class="montserrat" autocomplete="off">
                    </div>

                    <div class="box-input">
                        <label for="desa">Desa :</label>
                        <input type="text" name="desa" id="desa" value="<?= $dataUser['desa']; ?>" class="montserrat" autocomplete="off">
                    </div>

                    <div class="box-input">
                        <label for="alamat_detail">Alamat detail :</label>
                        <input type="text" name="alamat_detail" id="alamat_detail" placeholder="Jalan, RT/RW, Nomor rumah" value="<?= $dataUser['alamat_detail']; ?>" class="montserrat" autocomplete="off">
                    </div>

                    <div class="box-input">
                        <label for="kodePos">Kode pos :</label>
                        <input type="text" name="kodepos" id="kodePos" value="<?= $dataUser['kode_pos']; ?>" class="montserrat" autocomplete="off">
                    </div>

                    <div class="box-input">
                        <label for="telepon">Telepon :</label>
                        <input type="text" name="telepon" id="telepon" value="<?= $dataUser['no_telp']; ?>" class="montserrat" autocomplete="off">
                    </div>

                    <div class="box-input">
                        <button id="btnPersonalData" class="montserrat cursor-pointer-custom bdpd">Simpan</button>
                    </div>
                </form>
            </div>

            <div class="setting move-hide" data-contentMove="setting">
                <p class="head-form">Pengaturan akun</p>
                <div class="box-data">
                    <div class="box-password data">
                        <span class="label">Kata sandi</span>
                        <p>********
                            <a href="">
                                <i class="fas fa-edit"></i>
                            </a>
                        </p>
                    </div>
                    <div class="remove-account data">
                        <span class="label">Hapus akun</span>
                        <p>Hapus
                            <a href="">
                                <i class="fas fa-trash-alt"></i>
                            </a>
                        </p>
                    </div>
                    <div class="logout data">
                        <span class="label">Logout</span>
                        <p>Keluar
                            <a href="<?= base_url('logout'); ?>" class="lnk-chck" data-textPC="Keluar ?">
                                <i class="fas fa-sign-out-alt"></i>
                            </a>
                        </p>
                    </div>
                </div>
            </div>

        </div>
    </div>
</main>
<?= $this->endSection(); ?>