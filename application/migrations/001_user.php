<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Migration_user extends CI_Migration {

  function up () {

    $this->db->query("
      CREATE TABLE `user` (
        `uuid` varchar(255) NOT NULL,
        `nama` varchar(255) NOT NULL,
        `kode_satker` varchar(255) NOT NULL,
        `pelabuhan` varchar(255) NOT NULL,
        `username` varchar(255) NOT NULL,
        `password` varchar(255) NOT NULL,
        `urutan` INT(11) UNIQUE NOT NULL AUTO_INCREMENT,
        PRIMARY KEY (`uuid`)
      ) ENGINE=InnoDB DEFAULT CHARSET=utf8
    ");

    $this->load->model('Users');
    $this->Users->save(array(
      'nama' => 'DIREKTORAT KEPELABUHAN',
      'username' => 'admin',
      'password' => 'admin',
      'confirm_password' => 'admin'
    ));

  }

  function down () {
    $this->db->query("DROP TABLE IF EXISTS `user`");
  }

}