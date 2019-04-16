<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Migration_laporanharianlapangan extends CI_Migration {

  function up () {

    $this->db->query("
      CREATE TABLE `laporan_harian_lapangan` (
        `uuid` varchar(255) NOT NULL,
        `lapangan` varchar(255) NOT NULL,
        `tanggal` DATE,
        `masuk` INT(11),
        `keluar` INT(11),
        `urutan` INT(11) UNIQUE NOT NULL AUTO_INCREMENT,
        PRIMARY KEY (`uuid`)
      ) ENGINE=InnoDB DEFAULT CHARSET=utf8
    ");

  }

  function down () {
    $this->db->query("DROP TABLE IF EXISTS `laporan_harian_lapangan`");
  }

}