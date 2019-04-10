<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Migration_permission extends CI_Migration {

  function up () {

    $this->db->query("
      CREATE TABLE `permission` (
        `uuid` varchar(255) NOT NULL,
        `user` varchar(255) NOT NULL,
        `entity` varchar(255) NOT NULL,
        `action` varchar(255) NOT NULL,
        `urutan` INT(11) UNIQUE NOT NULL AUTO_INCREMENT,
        PRIMARY KEY (`uuid`)
      ) ENGINE=InnoDB DEFAULT CHARSET=utf8
    ");

  }

  function down () {
    $this->db->query("DROP TABLE IF EXISTS `permission`");
  }

}