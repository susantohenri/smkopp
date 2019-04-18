<?php defined('BASEPATH') OR exit('No direct script access allowed');

class WTRs extends MY_Model {

  function __construct () {
    parent::__construct();
    $this->table = 'pelayanan_dermaga';
    $this->thead = array(
      (object) array('mData' => 'urutan', 'sTitle' => 'No', 'visible' => false),
      (object) array('mData' => 'nama_kapal', 'sTitle' => 'Nama Kapal', 'searchable' => false),
      (object) array('mData' => 'effective_time', 'sTitle' => 'Effective Time', 'className' => 'text-right'),
      (object) array('mData' => 'bt_avg', 'sTitle' => 'Berth Time Average', 'className' => 'text-right'),
      (object) array('mData' => 'wtr', 'sTitle' => 'Working Time Ratio', 'className' => 'text-right'),
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
      ->select("kapal.nama nama_kapal", false)

      ->select("CONCAT(ROUND(TIME_TO_SEC(TIMEDIFF({$this->table}.selesai, {$this->table}.tambat))/3600 - `not` - idle, 1), ' JAM') effective_time", false)
      ->select("CONCAT(ROUND(AVG(TIME_TO_SEC(TIMEDIFF({$this->table}.selesai, {$this->table}.tambat))/3600), 1), ' JAM') bt_avg", false)
      ->select("CONCAT(ROUND(
        (TIME_TO_SEC(TIMEDIFF({$this->table}.selesai, {$this->table}.tambat))/3600 - `not` - idle) / 
        AVG(TIME_TO_SEC(TIMEDIFF({$this->table}.selesai, {$this->table}.tambat))/3600)
      , 1), ' JAM') wtr", false)

      ->join('kapal', "{$this->table}.kapal = kapal.uuid", 'left')
      ->join('dermaga', "{$this->table}.dermaga = dermaga.uuid", 'left')
      ->group_by("{$this->table}.uuid")
      ;
    return parent::dt();
  }

}