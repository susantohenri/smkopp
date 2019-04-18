<?php defined('BASEPATH') OR exit('No direct script access allowed');

class ApproachTimes extends MY_Model {

  function __construct () {
    parent::__construct();
    $this->table = 'pelayanan_dermaga';
    $this->thead = array(
      (object) array('mData' => 'urutan', 'sTitle' => 'No', 'visible' => false),
      (object) array('mData' => 'nama_kapal', 'sTitle' => 'Nama Kapal'),
      (object) array('mData' => 'bergerak_kedalam', 'sTitle' => 'Bergerak Masuk', 'className' => 'text-right'),
      (object) array('mData' => 'tambat', 'sTitle' => 'Tambat Tali', 'className' => 'text-right'),
      (object) array('mData' => 'bergerak_keluar', 'sTitle' => 'Lepas Tali', 'className' => 'text-right'),
      (object) array('mData' => 'keluar', 'sTitle' => 'Ambang Luar', 'className' => 'text-right'),
      (object) array('mData' => 'in_time', 'sTitle' => 'In', 'className' => 'text-right'),
      (object) array('mData' => 'out_time', 'sTitle' => 'Out', 'className' => 'text-right'),
      (object) array('mData' => 'approach_time', 'sTitle' => 'Approach Time', 'className' => 'text-right'),
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

      ->select("DATE_FORMAT({$this->table}.bergerak_kedalam, '%Y-%m-%d %H:%i') bergerak_kedalam", false)
      ->select("DATE_FORMAT({$this->table}.tambat, '%Y-%m-%d %H:%i') tambat", false)
      ->select("DATE_FORMAT({$this->table}.bergerak_keluar, '%Y-%m-%d %H:%i') bergerak_keluar", false)
      ->select("DATE_FORMAT({$this->table}.keluar, '%Y-%m-%d %H:%i') keluar", false)

      ->select("CONCAT(ROUND(TIME_TO_SEC(TIMEDIFF({$this->table}.tambat, {$this->table}.bergerak_kedalam))/3600, 1), ' JAM') in_time", false)
      ->select("CONCAT(ROUND(TIME_TO_SEC(TIMEDIFF({$this->table}.keluar, {$this->table}.bergerak_keluar))/3600, 1), ' JAM') out_time", false)

      ->select("CONCAT(ROUND(TIME_TO_SEC(TIMEDIFF(tambat, bergerak_kedalam))/3600, 1) + ROUND(TIME_TO_SEC(TIMEDIFF(keluar, bergerak_keluar))/3600, 1), ' JAM') approach_time", false)

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
      ->select("CONCAT(ROUND(AVG(ROUND(TIME_TO_SEC(TIMEDIFF(tambat, bergerak_kedalam))/3600, 1) + ROUND(TIME_TO_SEC(TIMEDIFF(keluar, bergerak_keluar))/3600, 1)), 1), ' JAM') rata_rata", false)
      ->join('kapal', "{$this->table}.kapal = kapal.uuid", 'left')
      ->join('dermaga', "{$this->table}.dermaga = dermaga.uuid", 'left')
      ->get($this->table)
      ->row_array();
    $footer[count($footer) - 2] = 'Rata - rata';
    $footer[count($footer) - 1] = $avg['rata_rata'];
    $data->footer = $footer;


    $data = json_encode($data);
    return $data;
  }

}