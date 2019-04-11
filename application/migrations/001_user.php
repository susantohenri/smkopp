<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Migration_user extends CI_Migration {

  function up () {

    $this->db->query("
      CREATE TABLE `user` (
        `uuid` varchar(255) NOT NULL,
        `username` varchar(255) NOT NULL,
        `kode_satker` varchar(255) NOT NULL,
        `pelabuhan` varchar(255) NOT NULL,
        `password` varchar(255) NOT NULL,
        `urutan` INT(11) UNIQUE NOT NULL AUTO_INCREMENT,
        PRIMARY KEY (`uuid`)
      ) ENGINE=InnoDB DEFAULT CHARSET=utf8
    ");

    $this->load->model('Users');
    $this->Users->save(array(
      'username' => 'Direktorat Kepelabuhan',
      'password' => 'admin',
      'confirm_password' => 'admin'
    ));

    $this->Users->save(array('username' => 'KSOP KELAS IV SABANG', 'password' => '412967', 'confirm_password' => '412967', 'kode_satker' => '412967', 'pelabuhan' => 'Pelabuhan Sabang'));
    $this->Users->save(array('username' => 'KSOP KELAS III KUALA TANJUNG', 'password' => '413777', 'confirm_password' => '413777', 'kode_satker' => '413777', 'pelabuhan' => 'Pelabuhan Kuala Tanjung'));
    $this->Users->save(array('username' => 'KSOP KELAS I DUMAI', 'password' => '413092', 'confirm_password' => '413092', 'kode_satker' => '413092', 'pelabuhan' => 'Pelabuhan Dumai'));
    $this->Users->save(array('username' => 'KSOP KELAS II TELUK BAYUR', 'password' => '413070', 'confirm_password' => '413070', 'kode_satker' => '413070', 'pelabuhan' => 'Pelabuhan Teluk Bayur'));
    $this->Users->save(array('username' => 'KSOP KELAS II  PALEMBANG', 'password' => '413256', 'confirm_password' => '413256', 'kode_satker' => '413256', 'pelabuhan' => 'Pelabuhan Palembang'));
    $this->Users->save(array('username' => 'KSOP KELAS I PANJANG', 'password' => '413307', 'confirm_password' => '413307', 'kode_satker' => '413307', 'pelabuhan' => 'Pelabuhan Panjang'));
    $this->Users->save(array('username' => 'KSOP KELAS I BANTEN', 'password' => '413670', 'confirm_password' => '413670', 'kode_satker' => '413670', 'pelabuhan' => 'Pelabuhan Banten'));
    $this->Users->save(array('username' => 'KSOP KELAS II BENOA', 'password' => '287579', 'confirm_password' => '287579', 'kode_satker' => '287579', 'pelabuhan' => 'Pelabuhan Benoa'));
    $this->Users->save(array('username' => 'KSOP KELAS I TANJUNG EMAS SEMARANG', 'password' => '412823', 'confirm_password' => '412823', 'kode_satker' => '412823', 'pelabuhan' => 'Pelabuhan Tanjung Emas'));
    $this->Users->save(array('username' => 'KSOP KELAS III KUPANG', 'password' => '522582', 'confirm_password' => '522582', 'kode_satker' => '522582', 'pelabuhan' => 'Pelabuhan Kupang'));
    $this->Users->save(array('username' => 'KSOP KELAS II PONTIANAK', 'password' => '413313', 'confirm_password' => '413313', 'kode_satker' => '413313', 'pelabuhan' => 'Pelabuhan Pontianak'));
    $this->Users->save(array('username' => 'KSOP KELAS I BANJARMASIN', 'password' => '287171', 'confirm_password' => '287171', 'kode_satker' => '287171', 'pelabuhan' => 'Pelabuhan Banjarmasin'));
    $this->Users->save(array('username' => 'KSOP KELAS I BALIKPAPAN', 'password' => '287228', 'confirm_password' => '287228', 'kode_satker' => '287228', 'pelabuhan' => 'Pelabuhan Balikpapan'));
    $this->Users->save(array('username' => 'KSOP KELAS III TARAKAN', 'password' => '287232', 'confirm_password' => '287232', 'kode_satker' => '287232', 'pelabuhan' => 'Pelabuhan Tarakan'));
    $this->Users->save(array('username' => 'KSOP KELAS II  BITUNG', 'password' => '413783', 'confirm_password' => '413783', 'kode_satker' => '413783', 'pelabuhan' => 'Pelabuhan Bitung'));
    $this->Users->save(array('username' => 'KSOP KELAS I  AMBON', 'password' => '287537', 'confirm_password' => '287537', 'kode_satker' => '287537', 'pelabuhan' => 'Pelabuhan Ambon'));
    $this->Users->save(array('username' => 'KSOP KELAS II TERNATE', 'password' => '287541', 'confirm_password' => '287541', 'kode_satker' => '287541', 'pelabuhan' => 'Pelabuhan Ternate'));
    $this->Users->save(array('username' => 'KSOP KELAS II JAYAPURA', 'password' => '287778', 'confirm_password' => '287778', 'kode_satker' => '287778', 'pelabuhan' => 'Pelabuhan Jayapura'));
    $this->Users->save(array('username' => 'KSOP KELAS IV  MERAUKE', 'password' => '287825', 'confirm_password' => '287825', 'kode_satker' => '287825', 'pelabuhan' => 'Pelabuhan Merauke'));
    $this->Users->save(array('username' => 'KSOP KELAS I  SORONG', 'password' => '287804', 'confirm_password' => '287804', 'kode_satker' => '287804', 'pelabuhan' => 'Pelabuhan Sorong'));
    $this->Users->save(array('username' => 'OTORITAS PELABUHAN UTAMA BELAWAN', 'password' => '413018', 'confirm_password' => '413018', 'kode_satker' => '413018', 'pelabuhan' => 'Pelabuhan Belawan'));
    $this->Users->save(array('username' => 'OTORITAS PELABUHAN UTAMA TANJUNG PRIOK', 'password' => '412781', 'confirm_password' => '412781', 'kode_satker' => '412781', 'pelabuhan' => 'Pelabuhan Tanjung Priok'));
    $this->Users->save(array('username' => 'OTORITAS PELABUHAN UTAMA TANJUNG PERAK', 'password' => '412891', 'confirm_password' => '412891', 'kode_satker' => '412891', 'pelabuhan' => 'Pelabuhan Tanjung Perak'));
    $this->Users->save(array('username' => 'OTORITAS PELABUHAN UTAMA MAKASSAR', 'password' => '287469', 'confirm_password' => '287469', 'kode_satker' => '287469', 'pelabuhan' => 'Pelabuhan Makassar'));

  }

  function down () {
    $this->db->query("DROP TABLE IF EXISTS `user`");
  }

}