<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Configs extends MY_Model {

  function __construct () {
    parent::__construct();
    $this->table = 'config';
    $this->thead = array(
      (object) array('mData' => 'urutan', 'sTitle' => 'No', 'visible' => false),
      (object) array('mData' => 'config_group', 'sTitle' => 'Group'),
      (object) array('mData' => 'config_key', 'sTitle' => 'Key'),
      (object) array('mData' => 'config_value', 'sTitle' => 'Value'),
    );
    $this->form  = array ();

    $this->form[]= array(
      'name' => 'config_group',
      'label'=> 'Group',
      'options' => array(
        array('text' => 'Pelayanan Kapal Dermaga Konvensional', 'value' => 'Pelayanan Kapal Dermaga Konvensional'),
        array('text' => 'Pelayanan Kapal Dermaga Petikemas', 'value' => 'Pelayanan Kapal Dermaga Petikemas'),
        array('text' => 'Pelayanan Barang', 'value' => 'Pelayanan Barang'),
        array('text' => 'Pelayanan Petikemas', 'value' => 'Pelayanan Petikemas'),
        array('text' => 'Utilisasi Fasilitas & Peralatan Terminal Konvensional', 'value' => 'Utilisasi Fasilitas & Peralatan Terminal Konvensional'),
        array('text' => 'Utilisasi Fasilitas & Peralatan Terminal Petikemas', 'value' => 'Utilisasi Fasilitas & Peralatan Terminal Petikemas')
      )
    );

    $this->form[]= array(
    	'name' => 'config_key',
    	'label'=> 'Config Key'
    );

    $this->form[]= array(
      'name' => 'config_value',
      'label'=> 'Config Value'
    );

  }

  function dt () {
    $this->datatables
      ->select("{$this->table}.uuid")
      ->select("{$this->table}.urutan")
      ->select("{$this->table}.config_group")
      ->select("{$this->table}.config_key")
      ->select("{$this->table}.config_value")
    ;
    return parent::dt();
  }

}