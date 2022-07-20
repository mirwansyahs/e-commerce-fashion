    <?php 
        $db = db_connect();
        $query = $db->table('store')->getWhere([])->getRow(); 
    ?>
    <div class="main-sidebar sidebar-style-2">
        <aside id="sidebar-wrapper">
        <div class="sidebar-brand">
            <img alt="image" src="/img/logo/<?= $query->image; ?>" class="rounded-circle mr-1" width="50px" height="50px">
            <a href="dashboard"><?= $query->name; ?></a>
        </div>
        <div class="sidebar-brand sidebar-brand-sm">
            <img alt="image" src="/img/logo/<?= $query->image; ?>" class="rounded-circle" width="50px" height="50px">
        </div>
        <ul class="sidebar-menu">
            <li class="menu-header">Dashboard</li>
            <li class=active><a class="nav-link" href="dashboard"><i class="fa fa-fire"></i> <span>Dashboard</span></a></li>
            <li class="menu-header">Menu</li>
            <li class=""><a class="nav-link" href="kategori"><i class="fas fa-th"></i> <span>Kategori</span></a></li>
            <li class=""><a class="nav-link" href="produk"><i class="fas fa-tshirt"></i> <span>Produk</span></a></li>
            <li class=""><a class="nav-link" href="diskon"><i class="fas fa-percent"></i> <span>Diskon</span></a></li>
            <li class="dropdown">
            <a href="#" class="nav-link has-dropdown"><i class="fas fa-shopping-bag"></i> <span>Order</span></a>
            <ul class="dropdown-menu">              
                <li><a class="nav-link" href="order-masuk">Order Masuk</a></li>                
                <li><a class="nav-link" href="order-selesai">Order Selesai</a></li>                
            </ul>
            </li>
            <li class=""><a class="nav-link" href="pelanggan"><i class="fas fa-user"></i> <span>Pelanggan</span></a></li>
            <li class=""><a class="nav-link" href="chat"><i class="fas fa-comment-alt"></i> <span>Chat</span></a></li>
            </li>
            <li class="menu-header">Pengaturan</li>
            <li class=""><a class="nav-link" href="profil"><i class="far fa-user"></i> <span>Profil</span></a></li>
            <li class=""><a class="nav-link" href="ubah-kata-sandi"><i class="fas fa-key"></i> <span>Ubah Kata Sandi</span></a></li>
            <li class=""><a class="nav-link" href="pengaturan"><i class="fas fa-cog"></i></i> <span>Pengaturan</span></a></li>
            <li class="mb-4"><a class="nav-link" href="keluar"><i class="fas fa-sign-out-alt"></i></i> <span>Keluar</span></a></li>
        </ul>     
    </aside>
</div>
