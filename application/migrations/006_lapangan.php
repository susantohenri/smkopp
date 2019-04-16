<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Migration_lapangan extends CI_Migration {

  function up () {

    $this->db->query("
      CREATE TABLE `lapangan` (
        `uuid` varchar(255) NOT NULL,
        `user` varchar(255) NOT NULL,
        `nama` varchar(255) NOT NULL,
        `kapasitas_ton` INT(11),
        `kapasitas_teus` INT(11),
        `rata_rata_penumpukan` INT(11),
        `urutan` INT(11) UNIQUE NOT NULL AUTO_INCREMENT,
        PRIMARY KEY (`uuid`)
      ) ENGINE=InnoDB DEFAULT CHARSET=utf8
    ");

  }

  function down () {
    $this->db->query("DROP TABLE IF EXISTS `lapangan`");
  }

}