<?php defined('BASEPATH') OR exit('No direct script access allowed');

class EffectiveTimes extends MY_Model {

  function __construct () {
    parent::__construct();
    $this->table = 'pelayanan_dermaga';
    $this->thead = array(
      (object) array('mData' => 'urutan', 'sTitle' => 'No', 'visible' => false),
      (object) array('mData' => 'nama_kapal', 'sTitle' => 'Nama Kapal', 'searchable' => false),

      (object) array('mData' => 'mulai', 'sTitle' => 'Mulai', 'className' => 'text-right'),
      (object) array('mData' => 'selesai', 'sTitle' => 'Selesai', 'className' => 'text-right'),

      (object) array('mData' => 'berthing_time', 'sTitle' => 'Berthing Time', 'className' => 'text-right'),

      (object) array('mData' => 'not', 'sTitle' => 'N.O.T', 'className' => 'text-right'),
      (object) array('mData' => 'berth_working_time', 'sTitle' => 'Berth Working Time', 'className' => 'text-right'),

      (object) array('mData' => 'idle', 'sTitle' => 'Idle', 'className' => 'text-right'),
      (object) array('mData' => 'effective_time', 'sTitle' => 'Effective Time', 'className' => 'text-right'),
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

      ->select("DATE_FORMAT({$this->table}.mulai, '%Y-%m-%d %H:%i') mulai", false)
      ->select("DATE_FORMAT({$this->table}.selesai, '%Y-%m-%d %H:%i') selesai", false)

      ->select("CONCAT(ROUND(TIME_TO_SEC(TIMEDIFF({$this->table}.selesai, {$this->table}.tambat))/3600, 1), ' JAM') berthing_time", false)

      ->select("{$this->table}.not")
      ->select("CONCAT(ROUND(TIME_TO_SEC(TIMEDIFF({$this->table}.selesai, {$this->table}.tambat))/3600 - `not`, 1), ' JAM') berth_working_time", false)

      ->select("{$this->table}.idle")
      ->select("CONCAT(ROUND(TIME_TO_SEC(TIMEDIFF({$this->table}.selesai, {$this->table}.tambat))/3600 - `not` - idle, 1), ' JAM') effective_time", false)

      ->join('kapal', "{$this->table}.kapal = kapal.uuid", 'left')
      ->join('dermaga', "{$this->table}.dermaga = dermaga.uuid", 'left')
      ;
    $data = parent::dt();
    $data = json_decode($data);

    $footer = array();
    foreach ($this->thead as $th) $footer[] = '';
    if ('admin' !== $this->session->userdata('username')) {
      $this->db->where('dermaga.user', $this->session->userdata('uuid'));
    }
    $avg = $this->db
      ->select("CONCAT(ROUND(AVG(TIME_TO_SEC(TIMEDIFF({$this->table}.selesai, {$this->table}.tambat))/3600 - `not` - idle), 1), ' JAM') rata_rata", false)

      ->select("ROUND(SUM(TIME_TO_SEC(TIMEDIFF({$this->table}.selesai, {$this->table}.tambat))/3600), 1) total_bt", false)
      ->select("ROUND(AVG(TIME_TO_SEC(TIMEDIFF({$this->table}.selesai, {$this->table}.tambat))/3600), 1) avg_bt", false)

      ->join('kapal', "{$this->table}.kapal = kapal.uuid", 'left')
      ->join('dermaga', "{$this->table}.dermaga = dermaga.uuid", 'left')
      ->get($this->table)
      ->row_array();
    $footer[count($footer) - 2] = 'Rata - rata';
    $footer[count($footer) - 1] = $avg['rata_rata'];

    $footer[3] = 'Total / Rata-rata';
    $footer[4] = "{$avg['total_bt']} / {$avg['avg_bt']}";

    $data->footer = $footer;

    $data = json_encode($data);
    return $data;
  }

}