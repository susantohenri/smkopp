<nav class="menu">
    <ul class="sidebar-menu metismenu" id="sidebar-menu">
        <li>
            <a href="<?= site_url('Dashboard') ?>"><i class="fa fa-bar-chart-o"></i>Dashboard</a>
        </li>
        <?php if (in_array('User', $permitted_menus)) : ?>
        <li>
            <a href="<?= site_url('User/') ?>"><i class="fa fa-shield"></i>Registrasi Pelabuhan</a>
        </li>
        <?php endif ?>
        <?php if (in_array('Dermaga', $permitted_menus)) : ?>
        <li>
            <a href="<?= site_url('Dermaga/') ?>"><i class="fa fa-anchor"></i>Registrasi Dermaga</a>
        </li>
        <?php endif ?>
        <?php if (in_array('Gudang', $permitted_menus)) : ?>
        <li>
            <a href="<?= site_url('Gudang/') ?>"><i class="fa fa-bank"></i>Registrasi Gudang</a>
        </li>
        <?php endif ?>
        <?php if (in_array('Lapangan', $permitted_menus)) : ?>
        <li>
            <a href="<?= site_url('Lapangan/') ?>"><i class="fa fa-cubes"></i>Registrasi Lapangan</a>
        </li>
        <?php endif ?>
        <?php if (in_array('Kapal', $permitted_menus)) : ?>
        <li>
            <a href="<?= site_url('Kapal/') ?>"><i class="fa fa-ship"></i>Registrasi Kapal</a>
        </li>
        <?php endif ?>

        <?php if (in_array('PelayananDermaga', $permitted_menus)) : ?>
        <li>
            <a href="<?= site_url('PelayananDermaga/') ?>"><i class="fa fa-server"></i>Pelayanan Dermaga</a>
        </li>
        <?php endif ?>

        <?php if (in_array('LaporanHarianGudang', $permitted_menus)) : ?>
        <li>
            <a href="<?= site_url('LaporanHarianGudang/') ?>"><i class="fa fa-list"></i>Laporan Harian Gudang</a>
        </li>
        <?php endif ?>

        <?php if (in_array('LaporanHarianLapangan', $permitted_menus)) : ?>
        <li>
            <a href="<?= site_url('LaporanHarianLapangan/') ?>"><i class="fa fa-list-ul"></i>Laporan Harian Lapangan</a>
        </li>
        <?php endif ?>

        <?php if (in_array('WaitingTime', $permitted_menus)) : ?>
        <li>
            <a href="<?= site_url('WaitingTime/') ?>"><i class="fa fa-hourglass-half"></i>Waiting Time</a>
        </li>
        <?php endif ?>

        <?php if (in_array('ApproachTime', $permitted_menus)) : ?>
        <li>
            <a href="<?= site_url('ApproachTime/') ?>"><i class="fa fa-podcast"></i>Approach Time</a>
        </li>
        <?php endif ?>

        <?php if (in_array('EffectiveTime', $permitted_menus)) : ?>
        <li>
            <a href="<?= site_url('EffectiveTime/') ?>"><i class="fa fa-bolt"></i>Effective Time</a>
        </li>
        <?php endif ?>

        <?php if (in_array('WTR', $permitted_menus)) : ?>
        <li>
            <a href="<?= site_url('WTR/') ?>"><i class="fa fa-cogs"></i>W.T.R</a>
        </li>
        <?php endif ?>

        <?php if (in_array('BOR', $permitted_menus)) : ?>
        <li>
            <a href="<?= site_url('BOR/') ?>"><i class="fa fa-recycle"></i>B.O.R</a>
        </li>
        <?php endif ?>

        <?php if (in_array('SOR', $permitted_menus)) : ?>
        <li>
            <a href="<?= site_url('SOR/') ?>"><i class="fa fa-refresh"></i>S.O.R</a>
        </li>
        <?php endif ?>

        <?php if (in_array('YOR', $permitted_menus)) : ?>
        <li>
            <a href="<?= site_url('YOR/') ?>"><i class="fa fa-retweet"></i>Y.O.R</a>
        </li>
        <?php endif ?>

    </ul>
</nav>