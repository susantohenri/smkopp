<?php defined('BASEPATH') OR exit('No direct script access allowed');

class PelayananDermagas extends MY_Model {

  function __construct () {
    parent::__construct();
    $this->table = 'pelayanan_dermaga';

    $this->thead = array(
      (object) array('mData' => 'urutan', 'sTitle' => 'No', 'visible' => false),
      (object) array('mData' => 'nama_dermaga', 'sTitle' => 'Dermaga'),
      (object) array('mData' => 'nama_kapal', 'sTitle' => 'Kapal'),
      (object) array('mData' => 'masuk', 'sTitle' => 'Masuk'),
      (object) array('mData' => 'keluar', 'sTitle' => 'Keluar'),
    );

    $this->form  = array ();

    $this->form[]= array(
      'name' => 'dermaga',
      'label'=> 'Dermaga',
      'options' => array(),
      'attributes' => array(
        array('data-autocomplete' => 'true'),
        array('data-model' => 'Dermagas'),
        array('data-field' => 'nama')
      ),
    );

    $this->form[]= array(
      'name' => 'kapal',
      'label'=> 'Kapal',
      'options' => array(),
      'attributes' => array(
        array('data-autocomplete' => 'true'),
        array('data-model' => 'Kapals'),
        array('data-field' => 'nama')
      ),
    );

    $this->form[]= array(
      'name' => 'masuk',
      'label'=> 'Masuk',
      'attributes' => array (
        array ('data-date' => 'datetimepicker'),
        array ('autocomplete' => 'off')
      )
    );

    $this->form[]= array(
      'name' => 'bergerak_kedalam',
      'label'=> 'Bergerak Kedalam',
      'attributes' => array (
        array ('data-date' => 'datetimepicker'),
        array ('autocomplete' => 'off')
      )
    );

    $this->form[]= array(
      'name' => 'tambat',
      'label'=> 'Tambat Tali',
      'attributes' => array (
        array ('data-date' => 'datetimepicker'),
        array ('autocomplete' => 'off')
      )
    );

    $this->form[]= array(
      'name' => 'mulai',
      'label'=> 'Memulai Pekerjaan',
      'attributes' => array (
        array ('data-date' => 'datetimepicker'),
        array ('autocomplete' => 'off')
      )
    );

    $this->form[]= array(
      'name' => 'not',
      'label'=> 'N.O.T (Jam)',
    );

    $this->form[]= array(
      'name' => 'idle',
      'label'=> 'Idle (Jam)',
    );

    $this->form[]= array(
      'name' => 'selesai',
      'label'=> 'Pekerjaan Selesai',
      'attributes' => array (
        array ('data-date' => 'datetimepicker'),
        array ('autocomplete' => 'off')
      )
    );

    $this->form[]= array(
      'name' => 'bergerak_keluar',
      'label'=> 'Bergerak Keluar',
      'attributes' => array (
        array ('data-date' => 'datetimepicker'),
        array ('autocomplete' => 'off')
      )
    ); 

    $this->form[]= array(
      'name' => 'keluar',
      'label'=> 'Keluar',
      'attributes' => array (
        array ('data-date' => 'datetimepicker'),
        array ('autocomplete' => 'off')
      )
    ); 

  }

  function dt () {
    if ('admin' !== $this->session->userdata('username'))
      $this->datatables->where('user', $this->session->userdata('uuid'));
    $this->datatables
      ->select("{$this->table}.uuid")
      ->select("{$this->table}.urutan")
      ->select('dermaga.nama nama_dermaga', false)
      ->select('kapal.nama nama_kapal', false)
      ->select("{$this->table}.masuk")
      ->select("{$this->table}.keluar")
      ->join('dermaga', "{$this->table}.dermaga = dermaga.uuid", 'left')
      ->join('kapal', "{$this->table}.kapal = kapal.uuid", 'left')
      ;
    return parent::dt();
  }

  function findOne ($param) {
    $this->db->select("{$this->table}.*");
    foreach (array('masuk', 'bergerak_kedalam', 'tambat', 'mulai', 'selesai', 'bergerak_keluar', 'keluar') as $min) {
      $this->db->select("DATE_FORMAT({$this->table}.{$min}, '%Y-%m-%d %h:%i') {$min}", false);
    }
    return parent::findOne($param);
  }

}