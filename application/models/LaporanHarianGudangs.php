<?php defined('BASEPATH') OR exit('No direct script access allowed');

class LaporanHarianGudangs extends MY_Model {

  function __construct () {
    parent::__construct();
    $this->table = 'laporan_harian_gudang';

    $this->thead = array(
      (object) array('mData' => 'urutan', 'sTitle' => 'No', 'visible' => false),
      (object) array('mData' => 'nama_gudang', 'sTitle' => 'Gudang'),
    );

    $this->form  = array ();

    $this->form[]= array(
      'name' => 'gudang',
      'label'=> 'gudang',
      'options' => array(),
      'attributes' => array(
        array('data-autocomplete' => 'true'),
        array('data-model' => 'Gudangs'),
        array('data-field' => 'nama')
      ),
    );

  }

  function dt () {
    if ('admin' !== $this->session->userdata('username'))
      $this->datatables->where('user', $this->session->userdata('uuid'));
    $this->datatables
      ->select("{$this->table}.uuid")
      ->select("{$this->table}.urutan")
      ->select('gudang.nama nama_gudang', false)
      ->join('gudang', "{$this->table}.gudang = gudang.uuid", 'left')
      ;
    return parent::dt();
  }

}