<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Migration_kapal extends CI_Migration {

  function up () {

    $this->db->query("
      CREATE TABLE `kapal` (
        `uuid` varchar(255) NOT NULL,
        `nama` varchar(255) NOT NULL,
        `loa` INT(11),
        `urutan` INT(11) UNIQUE NOT NULL AUTO_INCREMENT,
        PRIMARY KEY (`uuid`)
      ) ENGINE=InnoDB DEFAULT CHARSET=utf8
    ");

  }

  function down () {
    $this->db->query("DROP TABLE IF EXISTS `kapal`");
  }

}