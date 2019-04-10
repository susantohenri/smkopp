<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Users extends MY_Model {

  function __construct () {
    parent::__construct();
    $this->table = 'user';
    $this->thead = array(
      (object) array('mData' => 'urutan', 'sTitle' => 'No', 'visible' => false),
      (object) array('mData' => 'username', 'sTitle' => 'username'),
      (object) array('mData' => 'nama_jabatan', 'sTitle' => 'Jabatan'),
    );
    $this->form  = array ();

    $this->form[]= array(
    	'name' => 'username',
    	'label'=> 'username'
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

    $this->form[]= array(
      'name' => 'jabatan',
      'label'=> 'Jabatan',
      'options' => array(),
      'attributes' => array(
        array('data-autocomplete' => 'true'),
        array('data-model' => 'Jabatans'),
        array('data-field' => 'nama')
      ),
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
      ->select("{$this->table}.username")
      ->select("jabatan.nama as nama_jabatan", false)
      ->join('jabatan', 'user.jabatan = jabatan.uuid', 'left');
    return parent::dt();
  }

}