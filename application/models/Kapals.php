<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Kapals extends MY_Model {

  function __construct () {
    parent::__construct();
    $this->table = 'kapal';
    $this->thead = array(
      (object) array('mData' => 'urutan', 'sTitle' => 'No', 'visible' => false),
      (object) array('mData' => 'nama', 'sTitle' => 'Nama Kapal'),
      (object) array('mData' => 'loa', 'sTitle' => 'L.O.A'),
    );
    $this->form  = array ();

    $this->form[]= array(
    	'name' => 'nama',
    	'label'=> 'Nama Kapal'
    );

    $this->form[]= array(
      'name' => 'loa',
      'label'=> 'L.O.A (M)'
    );

  }

  function dt () {
    $this->datatables
      ->select("{$this->table}.uuid")
      ->select("{$this->table}.urutan")
      ->select("{$this->table}.nama")
      ->select("CONCAT({$this->table}.loa, ' M') loa");
    return parent::dt();
  }

}