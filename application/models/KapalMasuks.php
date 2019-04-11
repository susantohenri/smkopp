<?php defined('BASEPATH') OR exit('No direct script access allowed');

class KapalMasuks extends MY_Model {

  function __construct () {
    parent::__construct();
    $this->table = 'pelayanan';
    $this->thead = array(
      (object) array('mData' => 'urutan', 'sTitle' => 'No', 'visible' => false),
      (object) array('mData' => 'nama', 'sTitle' => 'Kapal'),
      (object) array('mData' => 'masuk', 'sTitle' => 'Masuk'),
    );
    $this->form  = array ();

    $this->form[]= array(
    	'name' => 'kapal',
    	'label'=> 'Nama Kapal',
      'options' => array(),
      'attributes' => array(
        array('data-autocomplete' => 'true'),
        array('data-model' => 'Kapals'),
        array('data-field' => 'nama')
      ),
    );

    $this->form[]= array(
      'name' => 'masuk',
      'label'=> 'Waktu Masuk',
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
      ->join('kapal', 'pelayanan.kapal = kapal.uuid', 'left')
      ->where('keluar IS NULL', NULL, false)
      ->or_where('keluar', '0000-00-00 00:00:00');
    return parent::dt();
  }

  function select2 ($field, $term) {
    $this->load->model('Pelayanans');
    $kapalInside = $this->Pelayanans->getKapalInside();
    if (!empty($kapalInside)) $this->db->where_in("kapal.uuid", $kapalInside);
    return $this->db
      ->select("$this->table.uuid as id", false)
      ->select("kapal.nama as text", false)
      ->limit(10)
      ->join('kapal', 'kapal.uuid = pelayanan.kapal', 'left')
      ->like('kapal.nama', $term)
      ->get($this->table)
      ->result();
  }

}