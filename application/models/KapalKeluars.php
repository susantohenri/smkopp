<?php defined('BASEPATH') OR exit('No direct script access allowed');

class KapalKeluars extends MY_Model {

  function __construct () {
    parent::__construct();
    $this->table = 'pelayanan';
    $this->thead = array(
      (object) array('mData' => 'urutan', 'sTitle' => 'No', 'visible' => false),
      (object) array('mData' => 'nama', 'sTitle' => 'Kapal'),
      (object) array('mData' => 'masuk', 'sTitle' => 'Masuk'),
      (object) array('mData' => 'keluar', 'sTitle' => 'Keluar'),
    );
    $this->form  = array ();

    $this->form[]= array(
    	'name' => 'pelayanan',
    	'label'=> 'Nama Kapal',
      'options' => array(),
      'attributes' => array(
        array('data-autocomplete' => 'true'),
        array('data-model' => 'KapalMasuks'),
        array('data-field' => 'nama')
      ),
    );

    $this->form[]= array(
      'name' => 'keluar',
      'label'=> 'Waktu Keluar',
      'attributes' => array (
        array ('data-date' => 'datetimepicker')
      )
    );
  }

  function dt () {
    $this->datatables
      ->select("{$this->table}.uuid")
      ->select("{$this->table}.urutan")
      ->select("kapal.nama")
      ->select("{$this->table}.masuk")
      ->select("{$this->table}.keluar")
      ->join('kapal', 'pelayanan.kapal = kapal.uuid', 'left')
      ->where('user', $this->session->userdata('uuid'))
      ->where('keluar <>', '0000-00-00 00:00:00');
    return parent::dt();
  }

  function create ($data) {
    $pelayanan = $data['pelayanan'];
    date_default_timezone_set("Asia/Jakarta");
    $this->db
      ->set('keluar', date('Y-m-d H:i:s'))
      ->where('uuid', $pelayanan)
      ->update($this->table);
    return $pelayanan;
  }

}