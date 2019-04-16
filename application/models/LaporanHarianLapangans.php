<?php defined('BASEPATH') OR exit('No direct script access allowed');

class LaporanHarianLapangans extends MY_Model {

  function __construct () {
    parent::__construct();
    $this->table = 'laporan_harian_lapangan';

    $this->thead = array(
      (object) array('mData' => 'urutan', 'sTitle' => 'No', 'visible' => false),
      (object) array('mData' => 'nama_lapangan', 'sTitle' => 'Lapangan'),
      (object) array('mData' => 'tanggal', 'sTitle' => 'Tanggal'),
      (object) array('mData' => 'masuk', 'sTitle' => 'Masuk', 'className' => 'text-right'),
      (object) array('mData' => 'keluar', 'sTitle' => 'Keluar', 'className' => 'text-right'),
    );

    $this->form  = array ();

    $this->form[]= array(
      'name' => 'lapangan',
      'label'=> 'Lapangan',
      'options' => array(),
      'attributes' => array(
        array('data-autocomplete' => 'true'),
        array('data-model' => 'Lapangans'),
        array('data-field' => 'nama')
      ),
    );

    $this->form[]= array(
      'name' => 'tanggal',
      'label'=> 'Tanggal',
      'attributes' => array (
        array ('data-date' => 'datepicker'),
        array ('autocomplete' => 'off')
      )
    );

    $this->form[]= array(
      'name' => 'masuk',
      'label'=> 'Barang Masuk',
    );

    $this->form[]= array(
      'name' => 'keluar',
      'label'=> 'Barang Keluar',
    );

  }

  function dt () {
    if ('admin' !== $this->session->userdata('username'))
      $this->datatables->where('user', $this->session->userdata('uuid'));
    $this->datatables
      ->select("{$this->table}.uuid")
      ->select("{$this->table}.urutan")
      ->select('lapangan.nama nama_lapangan', false)
      ->select("{$this->table}.tanggal")
      ->select("CONCAT({$this->table}.masuk, IF(LENGTH(lapangan.kapasitas_teus) > 0, ' TEUS', ' TON')) masuk", false)
      ->select("CONCAT({$this->table}.keluar, IF(LENGTH(lapangan.kapasitas_teus) > 0, ' TEUS', ' TON')) keluar", false)
      ->join('lapangan', "{$this->table}.lapangan = lapangan.uuid", 'left')
      ;
    return parent::dt();
  }

}