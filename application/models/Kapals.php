<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Kapals extends MY_Model {

  function __construct () {
    parent::__construct();
    $this->table = 'kapal';
    $this->thead = array(
      (object) array('mData' => 'urutan', 'sTitle' => 'No', 'visible' => false),
      (object) array('mData' => 'nama', 'sTitle' => 'Nama Kapal'),
    );
    $this->form  = array ();

    $this->form[]= array(
    	'name' => 'nama',
    	'label'=> 'Nama Kapal'
    );
  }

  function dt () {
    $this->datatables
      ->select("{$this->table}.uuid")
      ->select("{$this->table}.urutan")
      ->select("{$this->table}.nama");
    return parent::dt();
  }

  function dropdownKapalMasuk ($field, $term) {
    $this->load->model('Pelayanans');
    $kapalOutside = $this->Pelayanans->getKapalOutside();
    if (!empty($kapalOutside)) $this->db->where_in("$this->table.uuid", $kapalOutside);
    return $this->db
      ->select("uuid as id", false)
      ->select("$field as text", false)
      ->limit(10)
      ->like($field, $term)->get($this->table)->result();
  }

}