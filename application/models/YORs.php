<?php defined('BASEPATH') OR exit('No direct script access allowed');

class YORs extends MY_Model {

  function __construct () {
    parent::__construct();
    $this->table = 'laporan_harian_lapangan';
    $this->thead = array(
      (object) array('mData' => 'urutan', 'sTitle' => 'No', 'visible' => false),
      (object) array('mData' => 'nama_lapangan', 'sTitle' => 'Gudang'),
      (object) array('mData' => 'periode', 'sTitle' => 'Periode', 'className' => 'text-right'),
      (object) array('mData' => 'stok_akhir', 'sTitle' => 'Stok Akhir', 'className' => 'text-right'),
      (object) array('mData' => 'total_time', 'sTitle' => 'Total Waktu', 'className' => 'text-right'),
      (object) array('mData' => 'yor', 'sTitle' => 'Y.O.R', 'className' => 'text-right'),
    );
    $this->form  = array ();
  }

  function dt () {
    if ('admin' !== $this->session->userdata('username')) {
      $this->datatables->where('lapangan.user', $this->session->userdata('uuid'));
    }
    $this->datatables
      ->select("{$this->table}.uuid")
      ->select("{$this->table}.urutan")

      ->select("DATE_FORMAT(tanggal, '%b %Y') periode", false)
      ->select("nama nama_lapangan", false)
      ->select("CONCAT(FORMAT(SUM(masuk - keluar), 0), IF(lapangan.kapasitas_teus > 0, ' TEUS', ' TON')) stok_akhir", false)
      ->select("CONCAT(DAY(LAST_DAY(tanggal)), ' HARI') total_time", false)
      ->select("CONCAT(ROUND((SUM(masuk - keluar) * rata_rata_penumpukan) / (IF(lapangan.kapasitas_teus > 0, kapasitas_teus, kapasitas_ton) * DAY(LAST_DAY(tanggal))) * 100), ' %') yor", false)

      ->join('lapangan', "{$this->table}.lapangan = lapangan.uuid", 'left')
      ->group_by(array('lapangan.uuid', "DATE_FORMAT(tanggal, '%b %Y')"))
      ;
    return parent::dt();
  }

}