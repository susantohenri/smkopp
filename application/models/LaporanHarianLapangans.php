<?php defined('BASEPATH') OR exit('No direct script access allowed');

class LaporanHarianLapangans extends MY_Model {

  function __construct () {
    parent::__construct();
    $this->table = 'laporan_harian_lapangan';

    $this->thead = array(
      (object) array('mData' => 'urutan', 'sTitle' => 'No', 'visible' => false),
      (object) array('mData' => 'nama_lapangan', 'sTitle' => 'Lapangan'),
    );

    $this->form  = array ();

    $this->form[]= array(
      'name' => 'lapangan',
      'label'=> 'lapangan',
      'options' => array(),
      'attributes' => array(
        array('data-autocomplete' => 'true'),
        array('data-model' => 'Lapangans'),
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
      ->select('lapangan.nama nama_lapangan', false)
      ->join('lapangan', "{$this->table}.lapangan = lapangan.uuid", 'left')
      ;
    return parent::dt();
  }

}