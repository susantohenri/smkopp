<?php defined('BASEPATH') OR exit('No direct script access allowed');

class LaporanHarianGudangs extends MY_Model {

  function __construct () {
    parent::__construct();
    $this->table = 'laporan_harian_gudang';

    $this->thead = array(
      (object) array('mData' => 'urutan', 'sTitle' => 'No', 'visible' => false),
      (object) array('mData' => 'nama_gudang', 'sTitle' => 'Gudang'),
      (object) array('mData' => 'tanggal', 'sTitle' => 'Tanggal'),
      (object) array('mData' => 'masuk', 'sTitle' => 'Masuk', 'className' => 'text-right'),
      (object) array('mData' => 'keluar', 'sTitle' => 'Keluar', 'className' => 'text-right'),
    );

    $this->form  = array ();

    $this->form[]= array(
      'name' => 'gudang',
      'label'=> 'Gudang',
      'options' => array(),
      'attributes' => array(
        array('data-autocomplete' => 'true'),
        array('data-model' => 'Gudangs'),
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
      'label'=> 'Barang Masuk (TON)',
    );

    $this->form[]= array(
      'name' => 'keluar',
      'label'=> 'Barang Keluar (TON)',
    );

  }

  function dt () {
    if ('admin' !== $this->session->userdata('username'))
      $this->datatables->where('user', $this->session->userdata('uuid'));
    $this->datatables
      ->select("{$this->table}.uuid")
      ->select("{$this->table}.urutan")
      ->select('gudang.nama nama_gudang', false)
      ->select("{$this->table}.tanggal")
      ->select("CONCAT({$this->table}.masuk, ' TON') masuk", false)
      ->select("CONCAT({$this->table}.keluar, ' TON') keluar", false)
      ->join('gudang', "{$this->table}.gudang = gudang.uuid", 'left')
      ;
    return parent::dt();
  }

}