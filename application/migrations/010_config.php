<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Migration_config extends CI_Migration {

  function up () {

    $this->db->query("
      CREATE TABLE `config` (
        `uuid` varchar(255) NOT NULL,
        `config_key` varchar(255) NOT NULL,
        `config_value` varchar(255) NOT NULL,
        `urutan` INT(11) UNIQUE NOT NULL AUTO_INCREMENT,
        PRIMARY KEY (`uuid`)
      ) ENGINE=InnoDB DEFAULT CHARSET=utf8
    ");

  }

  function down () {
    $this->db->query("DROP TABLE IF EXISTS `config`");
  }

}