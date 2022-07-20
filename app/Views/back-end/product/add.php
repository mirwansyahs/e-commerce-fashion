<?= $this->extend('layout/back-end/main') ?>

<?= $this->section('content') ?>

<!-- Main Content -->
    <div class="main-content">
        <section class="section">
          <div class="section-header">
            <h1><?= $title; ?></h1>
            <div class="section-header-breadcrumb">
              <div class="breadcrumb-item active"><a href="dashboard">Dashboard</a></div>
              <div class="breadcrumb-item"><?= $title; ?></div>
            </div>
          </div>
          <div class="section-body">

            <div class="row mt-sm-4">
              <div class="col-12 col-md-12 col-lg-7">
                <div class="card">
                  <form method="post" action="saveproduct" class="needs-validation" novalidate="" enctype="multipart/form-data">
                    <?php csrf_field(); ?>
                    <div class="card-header">
                      <h4><?= $title; ?></h4>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="form-group col-lg-12">
                                <label>Nama Produk</label>
                                <input type="text" class="form-control" name="name" required autofocus>
                                <div class="invalid-feedback">
                                    Nama produk tidak boleh kosong
                                </div>         
                            </div>
                        </div>
                        <div class="row">
                            <div class="form-group col-lg-12">
                                <label>Foto</label>
                                <input type="file" class="form-control" name="name" required>
                                <div class="invalid-feedback">
                                    Foto tidak boleh kosong
                                </div>         
                            </div>
                        </div>
                        <div class="row">
                            <div class="form-group col-lg-12">
                                <label>Deskripsi</label>
                                <textarea class="form-control" name="desc" required></textarea>
                                <div class="invalid-feedback">
                                    Deskripsi tidak boleh kosong
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="form-group col-lg-12">
                                <label>Kategori</label>
                                <select name="active" class="form-control select2" required>
                                    <option value="">-- Pilih --</option>
                                    <?php foreach ($category as $c) { ?>
                                    <option value="<?= $c['id']?>"><?= $c['category_name']?></option>
                                    <?php } ?>
                                </select>
                                <div class="invalid-feedback">
                                    Kategori tidak boleh kosong
                                </div>         
                            </div>
                        </div>
                        <div class="row">
                            <div class="form-group col-lg-12">
                                <label>Stok</label>
                                <input type="number" class="form-control" name="percent" required>
                                <div class="invalid-feedback">
                                    Stok tidak boleh kosong
                                </div>         
                            </div>
                        </div>
                        <div class="row">
                            <div class="form-group col-lg-12">
                                <label>Diskon</label>
                                <select name="discount" class="form-control select2" required>
                                    <option value="">-- Pilih --</option>
                                    <?php foreach ($discount as $d) { ?>
                                    <option value="<?= $d['id']?>"><?= $d['discount_name']?>(<?= $d['discount_percent']?>%)</option>
                                    <?php } ?>
                                </select>
                                <div class="invalid-feedback">
                                    Status diskon tidak boleh kosong
                                </div>         
                            </div>
                        </div>
                        <div class="row">
                            <div class="form-group col-lg-12">
                                <label>Harga</label>
                                <input type="number" class="form-control" name="percent" placeholder="Contoh: 100000" required>
                                <div class="invalid-feedback">
                                    Harga tidak boleh kosong
                                </div>         
                            </div>
                        </div>
                    </div>
                    <div class="card-footer text-right">
                      <button type="submit" class="btn btn-primary">Simpan</button>
                      <a href="produk" class="btn btn-danger">Kembali</a>
                    </div>
                  </form>
                </div>
              </div>

            </div>
          </div>
        </section>
    </div>
  
<?= $this->endSection() ?>