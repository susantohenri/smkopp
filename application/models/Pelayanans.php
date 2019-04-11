<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Pelayanans extends MY_Model {

  function __construct () {
    parent::__construct();
    $this->table = 'pelayanan';
    $this->thead = array();
    $this->form  = array ();
  }

  function getKapalInside () {
  	$pelayanan = $this->db
  		->distinct('kapal')
  		->where('keluar IS NULL', null, false)
  		->or_where('keluar', '0000-00-00 00:00:00')
  		->get($this->table)
  		->result();
  	return array_column($pelayanan, 'kapal');
  }

  function getKapalOutside () {
  	$kapalInisde = $this->getKapalInside();
  	if (!empty($kapalInisde)) $this->db->where_not_in('uuid', $kapalInisde);
  	$kapalOutside = $this->db
  		->get('kapal')
  		->result();
  	return array_column($kapalOutside, 'uuid');
  }

}