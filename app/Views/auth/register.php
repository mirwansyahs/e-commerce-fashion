<?= $this->extend('layout/auth/mainRegister') ?>

<?= $this->section('content') ?>
    <div class="card card-primary">
        <div class="card-header">
            <h4>Masuk</h4>
        </div>

        <div class="card-body">
            <?php if(session()->getFlashdata('error')) { ?>
                <div class="alert alert-danger alert-dismissible show fade">
                    <div class="alert-body">
                        <button class="close" data-dismiss="alert">x</button>
                        <b>Error !</b>
                        <?= session()->getFlashdata('error'); ?>
                    </div>
                </div>
            <?php } else if(session()->getFlashdata('success')) { ?>
                <div class="alert alert-success alert-dismissible show fade">
                    <div class="alert-body">
                        <button class="close" data-dismiss="alert">x</button>
                        <?= session()->getFlashdata('success'); ?>
                    </div>
                </div>
            <?php } ?>

            <form method="POST" action="register" class="needs-validation" novalidate="">
                <?= csrf_field(); ?>
                <div class="row">
                    <div class="form-group col-6">
                      <label for="frist_name">Nama Depan</label>
                      <input id="frist_name" type="text" class="form-control" name="frist_name" autofocus>
                    </div>
                    <div class="form-group col-6">
                      <label for="last_name">Nama Belakang</label>
                      <input id="last_name" type="text" class="form-control" name="last_name">
                    </div>
                </div>

                <div class="form-group">
                    <label for="username">Username</label>
                    <input id="username" type="text" class="form-control" name="username">
                    <div class="invalid-feedback">
                        Username tidak boleh kosong
                    </div>
                </div>

                <div class="form-group">
                    <label for="telephone">No. Telepon</label>
                    <input id="telephone" type="number" class="form-control" name="telephone">
                    <div class="invalid-feedback">
                        No. telepone tidak boleh kosong
                    </div>
                </div>

                <div class="form-group">
                    <label for="email">Email</label>
                    <input id="email" type="email" class="form-control" name="email">
                    <div class="invalid-feedback">
                        Email tidak boleh kosong
                    </div>
                </div>

                <div class="row">
                    <div class="form-group col-6">
                      <label for="password" class="d-block">Kata Sandi</label>
                      <input id="password" type="password" class="form-control pwstrength" data-indicator="pwindicator" name="password">
                    </div>
                    <div class="form-group col-6">
                      <label for="password2" class="d-block">Konfirmasi Kata Sandi</label>
                      <input id="password2" type="password" class="form-control" name="password-confirm">
                    </div>
                </div>

                <div class="form-divider">
                    Tempat Tinggal
                </div>
                <div class="row">
                    <div class="form-group col-6">
                      <label>Negara</label>
                      <select class="form-control selectric">
                        <option>Indonesia</option>
                      </select>
                    </div>
                    <div class="form-group col-6">
                      <label>Provinsi</label>
                      <select class="form-control selectric">
                        <option>West Java</option>
                        <option>East Java</option>
                      </select>
                    </div>
                  </div>
                  <div class="row">
                    <div class="form-group col-6">
                      <label>Kota</label>
                      <input type="text" class="form-control">
                    </div>
                    <div class="form-group col-6">
                      <label>Kode Pos</label>
                      <input type="text" class="form-control">
                    </div>
                </div>

                <div class="form-group">
                    <label for="address">Alamat</label>
                    <textarea id="address" class="form-control" name="address"></textarea>
                    <div class="invalid-feedback">
                        Alamat tidak boleh kosong
                    </div>
                </div>

                <div class="form-group">
                    <button type="submit" class="btn btn-primary btn-lg btn-block" tabindex="4">
                      Daftar
                    </button>
                </div>

            </form>
        </div>
    </div>
    
    <div class="mt-5 text-muted text-center">
        Sudah punya akun? Silahkan <a href="masuk">Masuk</a>
    </div>
<?= $this->endSection() ?>