<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Dermagas extends MY_Model {

  function __construct () {
    parent::__construct();
    $this->table = 'dermaga';
    $this->thead = array(
      (object) array('mData' => 'urutan', 'sTitle' => 'No', 'visible' => false),
      (object) array('mData' => 'nama', 'sTitle' => 'Nama Dermaga'),
    );
    $this->form  = array ();

    $this->form[]= array(
    	'name' => 'nama',
    	'label'=> 'Nama Dermaga'
    );

  }

  function dt () {
    if ('admin' !== $this->session->userdata('username'))
      $this->datatables->where('user', $this->session->userdata('uuid'));
    $this->datatables
      ->select("{$this->table}.uuid")
      ->select("{$this->table}.urutan")
      ->select("{$this->table}.nama");
    return parent::dt();
  }

  function create ($record) {
    if (!isset ($record['user'])) $record['user'] = $this->session->userdata('uuid');
    return parent::create ($record);
  }

  function select2 ($field, $term) {
    if ('admin' !== $this->session->userdata('username'))
      $this->db->where('user', $this->session->userdata('uuid'));
    return parent::select2 ($field, $term);
  }

}