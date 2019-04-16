<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Lapangans extends MY_Model {

  function __construct () {
    parent::__construct();
    $this->table = 'lapangan';
    $this->thead = array(
      (object) array('mData' => 'urutan', 'sTitle' => 'No', 'visible' => false),
      (object) array('mData' => 'nama', 'sTitle' => 'Nama Lapangan'),
      (object) array('mData' => 'kapasitas_ton', 'sTitle' => 'Kapasitas Efektif (TON)'),
      (object) array('mData' => 'kapasitas_teus', 'sTitle' => 'Kapasitas Efektif (TEUS)'),
      (object) array('mData' => 'rata_rata_penumpukan', 'sTitle' => 'Rata-Rata Lama Penumpukan'),
    );
    $this->form  = array ();

    $this->form[]= array(
    	'name' => 'nama',
    	'label'=> 'Nama Lapangan'
    );

    $this->form[]= array(
      'name' => 'kapasitas_ton',
      'label'=> 'Kapasitas Efektif (TON)'
    );

    $this->form[]= array(
      'name' => 'kapasitas_teus',
      'label'=> 'Kapasitas Efektif (TEUS)'
    );

    $this->form[]= array(
      'name' => 'rata_rata_penumpukan',
      'label'=> 'Rata-Rata Lama Penumpukan (Hari)'
    );

  }

  function dt () {
    if ('admin' !== $this->session->userdata('username'))
      $this->datatables->where('user', $this->session->userdata('uuid'));
    $this->datatables
      ->select("{$this->table}.uuid")
      ->select("{$this->table}.urutan")
      ->select("CONCAT({$this->table}.kapasitas_ton, ' TON') kapasitas_ton")
      ->select("CONCAT({$this->table}.kapasitas_teus, ' TEUS') kapasitas_teus")
      ->select("CONCAT({$this->table}.rata_rata_penumpukan, ' HARI') rata_rata_penumpukan")
      ->select("{$this->table}.nama");
    return parent::dt();
  }

  function create ($record) {
    if (!isset ($record['user'])) $record['user'] = $this->session->userdata('uuid');
    return parent::create ($record);
  }

}