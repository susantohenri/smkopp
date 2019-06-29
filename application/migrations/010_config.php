<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Migration_config extends CI_Migration {

  function up () {

    $this->db->query("
      CREATE TABLE `config` (
        `uuid` varchar(255) NOT NULL,
        `config_group` varchar(255) NOT NULL,
        `config_key` varchar(255) NOT NULL,
        `config_value` varchar(255) NOT NULL,
        `urutan` INT(11) UNIQUE NOT NULL AUTO_INCREMENT,
        PRIMARY KEY (`uuid`)
      ) ENGINE=InnoDB DEFAULT CHARSET=utf8
    ");

    $this->load->model('Configs');

    $this->Configs->create(array(
      'config_group' => 'Pelayanan Kapal Dermaga Konvensional',
      'config_key' => 'Waiting Time',
      'config_value' => '1'
    ));
    $this->Configs->create(array(
      'config_group' => 'Pelayanan Kapal Dermaga Konvensional',
      'config_key' => 'Approach Time',
      'config_value' => '1'
    ));
    $this->Configs->create(array(
      'config_group' => 'Pelayanan Kapal Dermaga Konvensional',
      'config_key' => 'ET : BT',
      'config_value' => '70'
    ));

    $this->Configs->create(array(
      'config_group' => 'Pelayanan Kapal Dermaga Petikemas',
      'config_key' => 'Waiting Time',
      'config_value' => '1'
    ));
    $this->Configs->create(array(
      'config_group' => 'Pelayanan Kapal Dermaga Petikemas',
      'config_key' => 'Approach Time',
      'config_value' => '1'
    ));
    $this->Configs->create(array(
      'config_group' => 'Pelayanan Kapal Dermaga Petikemas',
      'config_key' => 'ET : BT',
      'config_value' => '75'
    ));

    $this->Configs->create(array(
      'config_group' => 'Pelayanan Barang',
      'config_key' => 'General Cargo',
      'config_value' => '35'
    ));
    $this->Configs->create(array(
      'config_group' => 'Pelayanan Barang',
      'config_key' => 'Bag Cargo',
      'config_value' => '35'
    ));
    $this->Configs->create(array(
      'config_group' => 'Pelayanan Barang',
      'config_key' => 'Utilized',
      'config_value' => ''
    ));
    $this->Configs->create(array(
      'config_group' => 'Pelayanan Barang',
      'config_key' => 'Curah Cair',
      'config_value' => '60'
    ));
    $this->Configs->create(array(
      'config_group' => 'Pelayanan Barang',
      'config_key' => 'Curah Kering',
      'config_value' => '100'
    ));

    $this->Configs->create(array(
      'config_group' => 'Pelayanan Petikemas',
      'config_key' => 'B/C/H Petikemas Internasional',
      'config_value' => '25'
    ));
    $this->Configs->create(array(
      'config_group' => 'Pelayanan Petikemas',
      'config_key' => 'B/S/H Petikemas Internasional',
      'config_value' => '40'
    ));
    $this->Configs->create(array(
      'config_group' => 'Pelayanan Petikemas',
      'config_key' => 'B/C/H Petikemas Domestik',
      'config_value' => '20'
    ));
    $this->Configs->create(array(
      'config_group' => 'Pelayanan Petikemas',
      'config_key' => 'B/S/H Petikemas Domestik',
      'config_value' => '20'
    ));
    $this->Configs->create(array(
      'config_group' => 'Pelayanan Petikemas',
      'config_key' => 'B/C/H Konvensional',
      'config_value' => ''
    ));
    $this->Configs->create(array(
      'config_group' => 'Pelayanan Petikemas',
      'config_key' => 'B/S/H Konvensional',
      'config_value' => ''
    ));
    $this->Configs->create(array(
      'config_group' => 'Pelayanan Petikemas',
      'config_key' => 'Receiving',
      'config_value' => '45'
    ));
    $this->Configs->create(array(
      'config_group' => 'Pelayanan Petikemas',
      'config_key' => 'Delivery',
      'config_value' => '60'
    ));

    $this->Configs->create(array(
      'config_group' => 'Utilisasi Fasilitas & Peralatan Terminal Konvensional',
      'config_key' => 'BOR',
      'config_value' => '70'
    ));
    $this->Configs->create(array(
      'config_group' => 'Utilisasi Fasilitas & Peralatan Terminal Konvensional',
      'config_key' => 'SOR',
      'config_value' => '65'
    ));
    $this->Configs->create(array(
      'config_group' => 'Utilisasi Fasilitas & Peralatan Terminal Konvensional',
      'config_key' => 'YOR',
      'config_value' => '65'
    ));
    $this->Configs->create(array(
      'config_group' => 'Utilisasi Fasilitas & Peralatan Terminal Konvensional',
      'config_key' => 'Kesiapan Operasi',
      'config_value' => '80'
    ));

    $this->Configs->create(array(
      'config_group' => 'Utilisasi Fasilitas & Peralatan Terminal Petikemas',
      'config_key' => 'BOR',
      'config_value' => '70'
    ));
    $this->Configs->create(array(
      'config_group' => 'Utilisasi Fasilitas & Peralatan Terminal Petikemas',
      'config_key' => 'SOR',
      'config_value' => '65'
    ));
    $this->Configs->create(array(
      'config_group' => 'Utilisasi Fasilitas & Peralatan Terminal Petikemas',
      'config_key' => 'YOR',
      'config_value' => '75'
    ));
    $this->Configs->create(array(
      'config_group' => 'Utilisasi Fasilitas & Peralatan Terminal Petikemas',
      'config_key' => 'Kesiapan Operasi',
      'config_value' => '80'
    ));
  }

  function down () {
    $this->db->query("DROP TABLE IF EXISTS `config`");
  }

}