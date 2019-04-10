<nav class="menu">
    <ul class="sidebar-menu metismenu" id="sidebar-menu">
        <li>
            <a href="<?= site_url('Dashboard') ?>"><i class="fa fa-bar-chart-o"></i>Dashboard</a>
        </li>
        <?php if (in_array('User', $permitted_menus)) : ?>
        <li>
            <a href="<?= site_url('User/') ?>"><i class="fa fa-life-ring"></i>Login Pelabuhan</a>
        </li>
        <?php endif ?>
        <?php if (in_array('Kapal', $permitted_menus)) : ?>
        <li>
            <a href="<?= site_url('Kapal/') ?>"><i class="fa fa-ship"></i>Registrasi Kapal</a>
        </li>
        <?php endif ?>
        <?php if (in_array('KapalMasuk', $permitted_menus)) : ?>
        <li>
            <a href="<?= site_url('KapalMasuk/') ?>"><i class="fa fa-sign-in"></i>Kapal Masuk</a>
        </li>
        <?php endif ?>
        <?php if (in_array('KapalKeluar', $permitted_menus)) : ?>
        <li>
            <a href="<?= site_url('KapalKeluar/') ?>"><i class="fa fa-sign-out"></i>Kapal Keluar</a>
        </li>
        <?php endif ?>
    </ul>
</nav>