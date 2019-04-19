<?php defined('BASEPATH') OR exit('No direct script access allowed');

class SORs extends MY_Model {

  function __construct () {
    parent::__construct();
    $this->table = 'laporan_harian_gudang';
    $this->thead = array(
      (object) array('mData' => 'urutan', 'sTitle' => 'No', 'visible' => false),
      (object) array('mData' => 'nama_gudang', 'sTitle' => 'Gudang'),
      (object) array('mData' => 'periode', 'sTitle' => 'Periode', 'className' => 'text-right'),
      (object) array('mData' => 'stok_akhir', 'sTitle' => 'Stok Akhir', 'className' => 'text-right'),
      (object) array('mData' => 'total_time', 'sTitle' => 'Total Waktu', 'className' => 'text-right'),
      (object) array('mData' => 'sor', 'sTitle' => 'S.O.R', 'className' => 'text-right'),
    );
    $this->form  = array ();
  }

  function dt () {
    if ('admin' !== $this->session->userdata('username')) {
      $this->datatables->where('gudang.user', $this->session->userdata('uuid'));
    }
    $this->datatables
      ->select("{$this->table}.uuid")
      ->select("{$this->table}.urutan")

      ->select("DATE_FORMAT(tanggal, '%b %Y') periode", false)
      ->select("nama nama_gudang", false)
      ->select("CONCAT(SUM(masuk - keluar), ' TON') stok_akhir", false)
      ->select("CONCAT(DAY(LAST_DAY(tanggal)), ' HARI') total_time", false)
      ->select("CONCAT(ROUND(SUM(masuk - keluar) * rata_rata_penumpukan / kapasitas_ton * DAY(LAST_DAY(tanggal)), 2), ' %') sor", false)

      ->join('gudang', "{$this->table}.gudang = gudang.uuid", 'left')
      ->group_by(array('gudang.uuid', "DATE_FORMAT(tanggal, '%b %Y')"))
      ;
    return parent::dt();
  }

}