<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Gudangs extends MY_Model {

  function __construct () {
    parent::__construct();
    $this->table = 'gudang';
    $this->thead = array(
      (object) array('mData' => 'urutan', 'sTitle' => 'No', 'visible' => false),
      (object) array('mData' => 'nama', 'sTitle' => 'Nama Gudang'),
      (object) array('mData' => 'kapasitas_ton', 'sTitle' => 'Kapasitas Efektif'),
      (object) array('mData' => 'rata_rata_penumpukan', 'sTitle' => 'Rata-Rata Lama Penumpukan'),
    );
    $this->form  = array ();

    $this->form[]= array(
    	'name' => 'nama',
    	'label'=> 'Nama Gudang'
    );

    $this->form[]= array(
      'name' => 'kapasitas_ton',
      'label'=> 'Kapasitas Efektif (TON)'
    );

    $this->form[]= array(
      'name' => 'rata_rata_penumpukan',
      'label'=> 'Rata-Rata Lama Penumpukan (Hari)'
    );

  }

  function dt () {
    if ('admin' !== $this->session->userdata('username')) {
      $this->datatables->where('user', $this->session->userdata('uuid'));
    }
    $this->datatables
      ->select("{$this->table}.uuid")
      ->select("{$this->table}.urutan")
      ->select("CONCAT({$this->table}.kapasitas_ton, ' TON') kapasitas_ton")
      ->select("CONCAT({$this->table}.rata_rata_penumpukan, ' HARI') rata_rata_penumpukan")
      ->select("{$this->table}.nama");
    return parent::dt();
  }

  function create ($record) {
    if (!isset ($record['user'])) $record['user'] = $this->session->userdata('uuid');
    return parent::create ($record);
  }

  function select2 ($field, $term) {
    if ('admin' !== $this->session->userdata('username')) {
      $this->db->where('user', $this->session->userdata('uuid'));
    }
    return parent::select2 ($field, $term);
  }

}