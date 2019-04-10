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

    $this->load->model(array('Users', 'Permissions'));
    $admin = $this->Users->findOne(array('username' => 'admin'));
    foreach (array('User', 'Kapal') as $entity) {
      foreach (array('index', 'create', 'read', 'update', 'delete') as $action) {
        $this->Permissions->create(array('user' => $admin['uuid'], 'entity' => $entity, 'action' => $action));
      }
    }
  }

  function down () {
    $this->db->query("DROP TABLE IF EXISTS `permission`");
  }

}