<?php defined('BASEPATH') OR exit('No direct script access allowed');

class BORs extends MY_Model {

  function __construct () {
    parent::__construct();
    $this->table = 'pelayanan_dermaga';
    $this->thead = array(
      (object) array('mData' => 'urutan', 'sTitle' => 'No', 'visible' => false),
      (object) array('mData' => 'periode', 'sTitle' => 'Periode', 'searchable' => false),
      (object) array('mData' => 'bt_total', 'sTitle' => 'Total Berthing Time', 'className' => 'text-right'),
      (object) array('mData' => 'total_time', 'sTitle' => 'Waktu Tersedia', 'className' => 'text-right'),
      (object) array('mData' => 'bor', 'sTitle' => 'B.O.R', 'className' => 'text-right'),
    );
    $this->form  = array ();
  }

  function dt () {
    if ('admin' !== $this->session->userdata('username')) {
      $this->datatables->where('dermaga.user', $this->session->userdata('uuid'));
    }
    $this->datatables
      ->select("{$this->table}.uuid")
      ->select("{$this->table}.urutan")

      ->select("DATE_FORMAT(masuk, '%b %Y') periode", false)
      ->select("CONCAT(ROUND(SUM(TIME_TO_SEC(TIMEDIFF(selesai, tambat))/3600), 2), ' JAM') bt_total", false)
      ->select("CONCAT(DAY(LAST_DAY(CURRENT_DATE)) * 24, ' JAM') total_time", false)
      ->select("CONCAT(ROUND(SUM(TIME_TO_SEC(TIMEDIFF(selesai, tambat))/3600) / DAY(LAST_DAY(CURRENT_DATE)) * 24, 2), ' %') bor", false)

      ->join('kapal', "{$this->table}.kapal = kapal.uuid", 'left')
      ->join('dermaga', "{$this->table}.dermaga = dermaga.uuid", 'left')
      ->group_by("DATE_FORMAT(masuk, '%b %Y')")
      ;
    return parent::dt();
  }

}