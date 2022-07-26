<div class="col-12 col-sm-6 col-lg-12" id="viewMessage">
    <div class="card chat-box">
        <div class="card-header">
        <?php if ($status == 'online') { ?>
            <h4><i class="fas fa-circle text-success mr-2" data-toggle="tooltip"></i> <?= $first_name; ?> <?= $last_name; ?></h4>
        <?php } else if ($status == 'offline') { ?>
            <h4><i class="fas fa-circle text-muted mr-2" data-toggle="tooltip"></i> <?= $first_name; ?> <?= $last_name; ?></h4>
            <div class="text-muted text-small font-600-bold"></i> Offline</div>
        <?php } ?>
        </div>
        <div class="card-body chat-content">
            <input type="hidden" name="sender_id" id="sender_id" value="<?= $sender_id; ?>">
                <div class="chat-item chat-left">
                    <img src="<?= site_url('/img/avatar/'.$image)?>" alt="avatar">
                    <div class="chat-details">
                        <div class="chat-text"><?= $message?></div>
                        <div class="chat-time"><?= date('H:i', strtotime($time)) ?></div>
                    </div>
                </div>
                <div class="chat-item chat-right">
                    <img src="<?= site_url('/img/avatar/'.$image_admin)?>" class="rounded-circle" width="50" alt="avatar">
                    <div class="chat-details">
                        <div class="chat-text"><?= $message_admin?></div>
                        <div class="chat-time"><?= date('H:i', strtotime($time_admin)) ?></div>
                    </div>
                </div>
        </div>
        <div class="card-footer chat-form">
            <form action="" method="post">
                <input type="text" class="form-control" placeholder="Ketik pesan">
                <button type="submit" class="btn btn-primary">
                    <i class="far fa-paper-plane"></i>
                </button>
            </form>
        </div>
    </div>
</div>