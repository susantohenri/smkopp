<?php defined('BASEPATH') OR exit('No direct script access allowed');

class KapalKeluars extends MY_Model {

  function __construct () {
    parent::__construct();
    $this->table = 'pelayanan';
    $this->thead = array(
      (object) array('mData' => 'urutan', 'sTitle' => 'No', 'visible' => false),
      (object) array('mData' => 'nama', 'sTitle' => 'Kapal'),
      (object) array('mData' => 'keluar', 'sTitle' => 'Waktu'),
    );
    $this->form  = array ();

    $this->form[]= array(
    	'name' => 'kapal',
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
      ->select("{$this->table}.keluar")
      ->join('kapal', 'pelayanan.kapal = kapal.uuid', 'left')
      ->where('keluar <>', '0000-00-00 00:00:00');
    return parent::dt();
  }

}