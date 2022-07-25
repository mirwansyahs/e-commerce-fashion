<?= $this->extend('layout/back-end/main') ?>

<?= $this->section('content') ?>

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

            <div class="row align-items-center justify-content-center">
              <div class="col-12 col-sm-6 col-lg-4">
                <div class="card">
                  <div class="card-header">
                    <h4>Daftar Chat</h4>
                  </div>
                  <div class="card-body">
                    <ul class="list-unstyled list-unstyled-border">
                    <?php foreach ($chatList as $c) { ?>
                      <?php if ($c['sender_id'] != session('id')) { ?>
                      <li class="media">
                        <img alt="image" class="mr-3 rounded-circle" width="50" src="<?= site_url('/img/avatar/'.$c['image'])?>" onclick="list('<?= $c['sender_id'] ?>')">
                        <div class="media-body">
                          <div class="mt-0 mb-1 font-weight-bold" onclick="list('<?= $c['sender_id'] ?>')"><?= $c['first_name']?> <?= $c['last_name']?></div>
                          <div class="row">
                            <?php if ($c['is_read'] == 0) { ?>
                              <p class="chat-text col-sm-8" onclick="list('<?= $c['sender_id'] ?>')"><b><?= word_limiter($c['message'], 5)?></b></p>
                            <?php } else if ($c['is_read'] == 1) { ?>
                              <p class="chat-text col-sm-8" onclick="list('<?= $c['sender_id'] ?>')"><?= word_limiter($c['message'], 5)?></p>
                            <?php } ?>
                            <p class="chat-time text-secondary col-sm-4" style="font-size: 12px;"><?= date('H:i', strtotime($c['time'])) ?></p>
                            <?php if ($c['status'] == 'online') { ?>
                              <div class="text-success text-small font-600-bold"><i class="fas fa-circle"></i> Online</div>
                            <?php } else if ($c['status'] == 'offline') { ?>
                              <div class="text-muted text-small font-600-bold"><i class="fas fa-circle"></i> Offline</div>
                            <?php } ?>
                          </div>
                        </div>
                      </li>
                      <?php } ?>
                    <?php } ?>
                    </ul>
                  </div>
                </div>
              </div>
              <div class="col-12 col-sm-6 col-lg-8" id="viewMessage">
                <div class="card chat-box">
                  <div class="card-header">
                  </div>
                  <div class="card-body chat-content">
                    <center><p class="mt-5">Silahkan klik list chat yang sudah ada!</p></center>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </section>
      </div>

<?= $this->endSection() ?>

<?= $this->section('javascript')?>
<script>
function list(id)
{
  $.ajax({
    url: "<?= site_url('list')?>",
    dataType: "json",
    data: { sender_id : id },
    success: function(response) {
      if(response.data){
        $('#viewMessage').html(response.data).show();
        $('#viewEmpty').hide();
      }
    },
      error: function(xhr, thrownError) {
      alert(xhr.status + "\n" + xhr.responseText + "\n" + thrownError);
    } 
  });
}
</script>
<?= $this->endSection() ?>