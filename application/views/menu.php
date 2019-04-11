<nav class="menu">
    <ul class="sidebar-menu metismenu" id="sidebar-menu">
        <li>
            <a href="<?= site_url('Dashboard') ?>"><i class="fa fa-bar-chart-o"></i>Dashboard</a>
        </li>
        <?php if (in_array('User', $permitted_menus)) : ?>
        <li>
            <a href="<?= site_url('User/') ?>"><i class="fa fa-shield"></i>Login Pelabuhan</a>
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

        <li>
            <a href="<?= site_url('WaitingTime/') ?>"><i class="fa fa-hourglass-half"></i>Waiting Time</a>
        </li>
        <li>
            <a href="<?= site_url('ApproachTime/') ?>"><i class="fa fa-podcast"></i>Approach Time</a>
        </li>
        <li>
            <a href="<?= site_url('EffectiveTime/') ?>"><i class="fa fa-bolt"></i>Effective Time</a>
        </li>
        <li>
            <a href="<?= site_url('WTR/') ?>"><i class="fa fa-clock-o"></i>Working Time Ratio</a>
        </li>
        <li>
            <a href="<?= site_url('BOR/') ?>"><i class="fa fa-exchange"></i>B.O.R</a>
        </li>
        <li>
            <a href="<?= site_url('SOR/') ?>"><i class="fa fa-bank"></i>S.O.R</a>
        </li>
        <li>
            <a href="<?= site_url('YOR/') ?>"><i class="fa fa-cubes"></i>Y.O.R</a>
        </li>

    </ul>
</nav>