<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Users extends MY_Model {

  function __construct () {
    parent::__construct();
    $this->table = 'user';
    $this->thead = array(
      (object) array('mData' => 'urutan', 'sTitle' => 'No', 'visible' => false),
      (object) array('mData' => 'nama', 'sTitle' => 'Nama', 'width' => '50%'),
      (object) array('mData' => 'kode_satker', 'sTitle' => 'Kode Satuan Kerja', 'width' => '20%'),
      (object) array('mData' => 'pelabuhan', 'sTitle' => 'Pelabuhan', 'width' => '30%'),
    );
    $this->form  = array ();

    $this->form[]= array(
    	'name' => 'username',
    	'label'=> 'Username'
    );

    $this->form[]= array(
      'name' => 'kode_satker',
      'label'=> 'Kode Satuan Kerja'
    );

    $this->form[]= array(
    	'type' => 'password',
    	'name' => 'password',
    	'label'=> 'Password'
    );

    $this->form[]= array(
        'type' => 'password',
        'name' => 'confirm_password',
        'label'=> 'Ulangi Password'
    );
  }

  function delete ($uuid) {
    $user = $this->findOne($uuid);
    if ('admin' !== $user['username']) return parent::delete($uuid);
  }

  function save ($data) {
    if (strlen ($data['password']) > 0) {
      if ($data['password'] !== $data['confirm_password']) return array('error' => array('message' => 'Password tidak sesuai'));
      else $data['password'] = md5($data['password']);
    } else unset ($data['password']);
    unset ($data['confirm_password']);
    return parent::save ($data);
  }

  function findOne ($param) {
    $record = parent::findOne ($param);
    $record['confirm_password'] = '';
    return $record;
  }

  function dt () {
    $this->datatables
      ->select("{$this->table}.uuid")
      ->select("{$this->table}.urutan")
      ->select("{$this->table}.nama")
      ->select("{$this->table}.kode_satker")
      ->select("{$this->table}.pelabuhan");
    return parent::dt();
  }

}