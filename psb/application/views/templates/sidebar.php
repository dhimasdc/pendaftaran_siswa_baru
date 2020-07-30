<!-- Sidebar -->
<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

    <!-- Sidebar - Brand -->
    <a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.html">
        <div class="sidebar-brand-icon rotate-n-15">
            <i class="fas fa-clipboard-list"></i>
        </div>
        <div class="sidebar-brand-text mx-3">PSB Admin</div>
    </a>

    <!-- Divider -->
    <hr class="sidebar-divider">


    <!-- Query menu -->
    <?php
    $role_id = $this->session->userdata('role_id');
    $queryMenu = "SELECT user_menu.id, menu 
                FROM user_menu 
                JOIN user_acces_menu ON user_menu.id = user_acces_menu.menu_id 
                WHERE user_acces_menu.role_id = $role_id 
                ORDER BY user_acces_menu.menu_id ASC  
       ";

    $menu = $this->db->query($queryMenu)->result_array();
    ?>

    <!-- loop menu -->
    <?php foreach ($menu as $m) : ?>
        <div class="sidebar-heading">
            <?= $m['menu']; ?>
        </div>

        <!-- submenu -->

        <?php
        $menuId = $m['id'];
        $querySub = "SELECT * 
                    FROM user_sub_menu 
                    WHERE menu_id = $menuId
                    AND is_active = 1
                    ";
        $subMenu = $this->db->query($querySub)->result_array();

        ?>

        <?php foreach ($subMenu as $sub) : ?>
            <!-- Nav Item - Dashboard -->
            <li class="nav-item">
                <a class="nav-link" href="<?= base_url($sub['url']); ?>">
                    <i class="<?= $sub['icon']; ?>"></i>
                    <span><?= $sub['title']; ?></span></a>
            </li>

        <?php endforeach; ?>

        <!-- Divider -->
        <hr class="sidebar-divider">

    <?php endforeach; ?>








    <!-- Heading -->
    <div class="sidebar-heading">
        Pendaftaran Siswa Baru
    </div>

    <!-- Nav Item - Tables -->
    <li class="nav-item">
        <a class="nav-link" href="<?= base_url('table/viewMember'); ?>">
            <i class="fas fa-fw fa-table"></i>
            <span>Daftar Calon Siswwa Baru</span></a>
    </li>
    <!-- Divider -->
    <hr class="sidebar-divider">
    <li class="nav-item">
        <a class="nav-link" href="<?= base_url('auth/logout'); ?>">
            <i class="fas fa-fw fa-sign-out-alt"></i>
            <span>Logout</span></a>
    </li>

    <!-- Divider -->
    <hr class="sidebar-divider d-none d-md-block">

    <!-- Sidebar Toggler (Sidebar) -->
    <div class="text-center d-none d-md-inline">
        <button class="rounded-circle border-0" id="sidebarToggle"></button>
    </div>

</ul>
<!-- End of Sidebar -->