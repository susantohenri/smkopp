<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Migration_pelayanandermaga extends CI_Migration {

  function up () {

    $this->db->query("
      CREATE TABLE `pelayanan_dermaga` (
        `uuid` varchar(255) NOT NULL,
        `dermaga` varchar(255) NOT NULL,
        `kapal` varchar(255) NOT NULL,
        `masuk` DATETIME,
        `bergerak_kedalam` DATETIME,
        `tambat` DATETIME,
        `mulai` DATETIME,
        `not` double NOT NULL DEFAULT '0',
        `idle` double NOT NULL DEFAULT '0',
        `selesai` DATETIME,
        `bergerak_keluar` DATETIME,
        `keluar` DATETIME,
        `urutan` INT(11) UNIQUE NOT NULL AUTO_INCREMENT,
        PRIMARY KEY (`uuid`)
      ) ENGINE=InnoDB DEFAULT CHARSET=utf8
    ");

  }

  function down () {
    $this->db->query("DROP TABLE IF EXISTS `pelayanan_dermaga`");
  }

}