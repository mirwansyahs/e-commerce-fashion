<?= $this->extend('layout/back-end/main') ?>

<?= $this->section('css') ?>
<link rel="stylesheet" href="<?= base_url('back-end/dist/assets/modules/summernote/summernote-bs4.css')?>">
<?= $this->endSection() ?>

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
                  <form method="post" action="<?= site_url('updateproduct/' . $product->id)?>" class="needs-validation" novalidate="" enctype="multipart/form-data">
                    <?php csrf_field(); ?>
                    <div class="card-header">
                      <h4><?= $title; ?></h4>
                    </div>
                    <input type="hidden" name="_method" value="PUT">
                    <div class="card-body">
                        <div class="row">
                            <div class="form-group col-lg-12">
                                <label>Nama Produk</label>
                                <input type="text" class="form-control" name="name" value="<?= $product->name?>" required>
                                <div class="invalid-feedback">
                                    Nama produk tidak boleh kosong
                                </div>         
                            </div>
                        </div>
                        <div class="row">
                            <div class="form-group col-lg-12">
                                <label>Foto</label>
                                <input type="file" class="form-control" name="image">   
                            </div>
                        </div>
                        <div class="row">
                            <div class="form-group col-lg-12">
                                <label>Deskripsi</label>
                                <textarea class="form-control summernote" name="desc" required><?= $product->desc?></textarea>
                                <div class="invalid-feedback">
                                    Deskripsi tidak boleh kosong
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="form-group col-lg-12">
                                <label>Kategori</label>
                                <select name="category" class="form-control select2" required>
                                    <option value="">-- Pilih --</option>
                                    <?php foreach ($category as $c) { ?>
                                        <option
                                            <?php if ($product->category_id == $c['category_id']) { echo "selected='selected'";} ?>
                                            value="<?= $c['category_id']; ?>"><?= $c['category_name']; ?>
                                        </option>
                                    <?php } ?>
                                </select>
                                <div class="invalid-feedback">
                                    Kategori tidak boleh kosong
                                </div>         
                            </div>
                        </div>
                        <div class="row">
                            <div class="form-group col-lg-12">
                                <div class="form-group">
                                    <label class="form-label">Size</label>
                                    <div class="selectgroup w-100">
                                        <label class="selectgroup-item">
                                        <input type="radio" name="size" value="M" class="selectgroup-input"<?php if($product->size == "M"){ echo "checked='checked'";} ?>>
                                        <span class="selectgroup-button">M</span>
                                        </label>
                                        <label class="selectgroup-item">
                                        <input type="radio" name="size" value="S" class="selectgroup-input" <?php if($product->size == "S"){ echo "checked='checked'";} ?>>
                                        <span class="selectgroup-button">S</span>
                                        </label>
                                        <label class="selectgroup-item">
                                        <input type="radio" name="size" value="L" class="selectgroup-input" <?php if($product->size == "L"){ echo "checked='checked'";} ?>>
                                        <span class="selectgroup-button">L</span>
                                        </label>
                                        <label class="selectgroup-item">
                                        <input type="radio" name="size" value="L" class="selectgroup-input" <?php if($product->size == "XL"){ echo "checked='checked'";} ?>>
                                        <span class="selectgroup-button">XL</span>
                                        </label>
                                        <label class="selectgroup-item">
                                        <input type="radio" name="size" value="L" class="selectgroup-input" <?php if($product->size == "XXL"){ echo "checked='checked'";} ?>>
                                        <span class="selectgroup-button">XXL</span>
                                        </label>
                                        <label class="selectgroup-item">
                                        <input type="radio" name="size" value="L" class="selectgroup-input" <?php if($product->size == "XXXL"){ echo "checked='checked'";} ?>>
                                        <span class="selectgroup-button">XXXL</span>
                                        </label>
                                    </div>
                                    <div class="selectgroup w-100">
                                        <label class="selectgroup-item">
                                        <input type="radio" name="size" value="25" class="selectgroup-input" <?php if($product->size == "25"){ echo "checked='checked'";} ?>>
                                        <span class="selectgroup-button">25</span>
                                        </label>
                                        <label class="selectgroup-item">
                                        <input type="radio" name="size" value="26" class="selectgroup-input" <?php if($product->size == "26"){ echo "checked='checked'";} ?>>
                                        <span class="selectgroup-button">26</span>
                                        </label>
                                        <label class="selectgroup-item">
                                        <input type="radio" name="size" value="27" class="selectgroup-input" <?php if($product->size == "27"){ echo "checked='checked'";} ?>>
                                        <span class="selectgroup-button">27</span>
                                        </label>
                                        <label class="selectgroup-item">
                                        <input type="radio" name="size" value="28" class="selectgroup-input" <?php if($product->size == "28"){ echo "checked='checked'";} ?>>
                                        <span class="selectgroup-button">28</span>
                                        </label>
                                        <label class="selectgroup-item">
                                        <input type="radio" name="size" value="29" class="selectgroup-input" <?php if($product->size == "29"){ echo "checked='checked'";} ?>>
                                        <span class="selectgroup-button">29</span>
                                        </label>
                                        <label class="selectgroup-item">
                                        <input type="radio" name="size" value="30" class="selectgroup-input" <?php if($product->size == "30"){ echo "checked='checked'";} ?>>
                                        <span class="selectgroup-button">30</span>
                                        </label>
                                        <label class="selectgroup-item">
                                        <input type="radio" name="size" value="31" class="selectgroup-input" <?php if($product->size == "31"){ echo "checked='checked'";} ?>>
                                        <span class="selectgroup-button">31</span>
                                        </label>
                                        <label class="selectgroup-item">
                                        <input type="radio" name="size" value="32" class="selectgroup-input" <?php if($product->size == "32"){ echo "checked='checked'";} ?>>
                                        <span class="selectgroup-button">32</span>
                                        </label>
                                        <label class="selectgroup-item">
                                        <input type="radio" name="size" value="33" class="selectgroup-input" <?php if($product->size == "33"){ echo "checked='checked'";} ?>>
                                        <span class="selectgroup-button">33</span>
                                        </label>
                                        <label class="selectgroup-item">
                                        <input type="radio" name="size" value="34" class="selectgroup-input" <?php if($product->size == "34"){ echo "checked='checked'";} ?>>
                                        <span class="selectgroup-button">34</span>
                                        </label>
                                        <label class="selectgroup-item">
                                        <input type="radio" name="size" value="35" class="selectgroup-input" <?php if($product->size == "35"){ echo "checked='checked'";} ?>>
                                        <span class="selectgroup-button">35</span>
                                        </label>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="form-group col-lg-12">
                                <div class="form-group">
                                    <label class="form-label">Warna</label>
                                    <div class="selectgroup w-100">
                                        <label class="selectgroup-item">
                                        <input type="radio" name="color" value="hitam" class="selectgroup-input" <?php if($product->color == "hitam"){ echo "checked='checked'";} ?>>
                                        <span class="selectgroup-button">Hitam</span>
                                        </label>
                                        <label class="selectgroup-item">
                                        <input type="radio" name="color" value="merah" class="selectgroup-input" <?php if($product->color == "merah"){ echo "checked='checked'";} ?>>
                                        <span class="selectgroup-button">Merah</span>
                                        </label>
                                        <label class="selectgroup-item">
                                        <input type="radio" name="color" value="biru" class="selectgroup-input" <?php if($product->color == "biru"){ echo "checked='checked'";} ?>>
                                        <span class="selectgroup-button">Biru</span>
                                        </label>
                                        <label class="selectgroup-item">
                                        <input type="radio" name="color" value="hijau" class="selectgroup-input" <?php if($product->color == "hijau"){ echo "checked='checked'";} ?>>
                                        <span class="selectgroup-button">Hijau</span>
                                        </label>
                                        <label class="selectgroup-item">
                                        <input type="radio" name="color" value="kuning" class="selectgroup-input" <?php if($product->color == "kuning"){ echo "checked='checked'";} ?>>
                                        <span class="selectgroup-button">Kuning</span>
                                        </label>
                                        <label class="selectgroup-item">
                                        <input type="radio" name="color" value="cream" class="selectgroup-input" <?php if($product->color == "cream"){ echo "checked='checked'";} ?>>
                                        <span class="selectgroup-button">Cream</span>
                                        </label>
                                    </div>
                                    <div class="selectgroup w-100">
                                        <label class="selectgroup-item">
                                        <input type="radio" name="color" value="abu-abu" class="selectgroup-input" <?php if($product->color == "abu-abu"){ echo "checked='checked'";} ?>>
                                        <span class="selectgroup-button">Abu-abu</span>
                                        </label>
                                        <label class="selectgroup-item">
                                        <input type="radio" name="color" value="pink" class="selectgroup-input" <?php if($product->color == "pink"){ echo "checked='checked'";} ?>>
                                        <span class="selectgroup-button">Pink</span>
                                        </label>
                                        <label class="selectgroup-item">
                                        <input type="radio" name="color" value="ungu" class="selectgroup-input" <?php if($product->color == "ungu"){ echo "checked='checked'";} ?>>
                                        <span class="selectgroup-button">Ungu</span>
                                        </label>
                                        <label class="selectgroup-item">
                                        <input type="radio" name="color" value="coklat" class="selectgroup-input" <?php if($product->color == "coklat"){ echo "checked='checked'";} ?>>
                                        <span class="selectgroup-button">Coklat</span>
                                        </label>
                                        <label class="selectgroup-item">
                                        <input type="radio" name="color" value="oren" class="selectgroup-input" <?php if($product->color == "oren"){ echo "checked='checked'";} ?>>
                                        <span class="selectgroup-button">Oren</span>
                                        </label>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="form-group col-lg-12">
                                <label>Brand</label>
                                <select name="brand" class="form-control select2" required>
                                    <option value="">-- Pilih --</option>
                                    <?php foreach ($brand as $b) { ?>
                                        <option
                                            <?php if ($product->brand_id == $b['id']) { echo "selected='selected'";} ?>
                                            value="<?= $b['id']; ?>"><?= $b['name']; ?>
                                        </option>
                                    <?php } ?>
                                </select>
                                <div class="invalid-feedback">
                                    Brand tidak boleh kosong
                                </div>         
                            </div>
                        </div>
                        <div class="row">
                            <div class="form-group col-lg-12">
                                <label>Bahan</label>
                                <input type="text" class="form-control" name="material" value="<?= $product->material?>">
                                <div class="invalid-feedback">
                                    Bahan tidak boleh kosong
                                </div>         
                            </div>
                        </div>
                        <div class="row">
                            <div class="form-group col-lg-12">
                                <label>Stok</label>
                                <input type="number" class="form-control" name="stock" value="<?= $product->quantity?>" required>
                                <div class="invalid-feedback">
                                    Stok tidak boleh kosong
                                </div>         
                            </div>
                        </div>
                        <div class="row">
                            <div class="form-group col-lg-12">
                                <label>Diskon</label>
                                <select name="discount" id="discount" class="form-control select2" required>
                                    <option value="">-- Pilih --</option>
                                    <?php
                                        foreach ($discount as $d) { 
                                            if ($d['active'] == 'active') {
                                    ?>
                                    <option
                                        <?php if ($product->discount_id == $d['discount_id']) { echo "selected='selected'";} ?>
                                        value="<?= $d['discount_id']; ?>" data-discount="<?= $d['discount_percent']?>"><?= $d['discount_name']; ?>
                                    </option>
                                    <?php 
                                            } 
                                        } 
                                    ?>
                                </select>
                                <div class="invalid-feedback">
                                    Status diskon tidak boleh kosong
                                </div>         
                            </div>
                        </div>
                        <div class="row">
                            <div class="form-group col-lg-12">
                                <label>Besaran Discount</label>
                                <?php
                                    foreach ($discount as $d) { 
                                        if ($product->discount_id == $d['discount_id']) {
                                ?>
                                <input type="number" class="form-control" name="percent" value="<?= $d['discount_percent']?>" readonly>
                                <?php 
                                        } 
                                    } 
                                ?>
                            </div>
                        </div>
                        <div class="row">
                            <div class="form-group col-lg-12">
                                <label>Harga</label>
                                <input type="number" class="form-control" name="price" value="<?= $product->original_price?>" required>
                                <div class="invalid-feedback">
                                    Harga tidak boleh kosong
                                </div>         
                            </div>
                        </div>
                    </div>
                    <div class="card-footer text-right">
                      <button type="submit" class="btn btn-primary">Simpan</button>
                      <a href="<?= site_url('produk')?>" class="btn btn-danger">Kembali</a>
                    </div>
                  </form>
                </div>
              </div>

            </div>
          </div>
        </section>
    </div>
  
<?= $this->endSection() ?>

<?= $this->section('javascript') ?>
<script src="<?= base_url('back-end/dist/assets/modules/summernote/summernote-bs4.js')?>"></script>
<script>
$('#discount').on('change', function(){
  // ambil data dari elemen option yang dipilih
  const discount = $('#discount option:selected').data('discount');

  // tampilkan
  $('[name=percent]').val(discount);
});
</script>
<?= $this->endSection() ?>