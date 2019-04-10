<nav class="menu">
    <ul class="sidebar-menu metismenu" id="sidebar-menu">
        <li>
            <a href="<?= site_url('Dashboard') ?>"><i class="fa fa-bar-chart-o"></i>Dashboard</a>
        </li>
        <?php if (in_array('User', $permitted_menus)) : ?>
        <li>
            <a href="<?= site_url('User/') ?>"><i class="fa fa-group"></i>User</a>
        </li>
        <?php endif ?>
        <?php if (in_array('Kapal', $permitted_menus)) : ?>
        <li>
            <a href="<?= site_url('Kapal/') ?>"><i class="fa fa-ship"></i>Kapal</a>
        </li>
        <?php endif ?>
    </ul>
</nav>