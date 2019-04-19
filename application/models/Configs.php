<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Configs extends MY_Model {

  function __construct () {
    parent::__construct();
    $this->table = 'config';
    $this->thead = array(
      (object) array('mData' => 'urutan', 'sTitle' => 'No', 'visible' => false),
      (object) array('mData' => 'config_key', 'sTitle' => 'Key'),
      (object) array('mData' => 'config_value', 'sTitle' => 'Value'),
    );
    $this->form  = array ();

    $this->form[]= array(
    	'name' => 'config_key',
    	'label'=> 'Config Key'
    );

    $this->form[]= array(
      'name' => 'config_value',
      'label'=> 'Config Value'
    );

  }

  function dt () {
    $this->datatables
      ->select("{$this->table}.uuid")
      ->select("{$this->table}.urutan")
      ->select("{$this->table}.config_key")
      ->select("{$this->table}.config_value")
    ;
    return parent::dt();
  }

}