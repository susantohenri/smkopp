<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Migration_pelayanan extends CI_Migration {

  function up () {

    $this->db->query("
      CREATE TABLE `pelayanan` (
        `uuid` varchar(255) NOT NULL,
        `kapal` varchar(255) NOT NULL,
        `masuk` DATETIME,
        `keluar` DATETIME,
        `urutan` INT(11) UNIQUE NOT NULL AUTO_INCREMENT,
        PRIMARY KEY (`uuid`)
      ) ENGINE=InnoDB DEFAULT CHARSET=utf8
    ");

  }

  function down () {
    $this->db->query("DROP TABLE IF EXISTS `pelayanan`");
  }

}