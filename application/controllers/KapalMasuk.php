<?php defined('BASEPATH') OR exit('No direct script access allowed');

class KapalMasuk extends MY_Controller {

  function select2 ($model, $field) {
  	$method = 'select2';
  	if ('Kapals' === $model) $method = 'dropdownKapalMasuk';
    $this->load->model($model);
    echo '{"results":'. json_encode($this->$model->$method($field, $this->input->post('term'))) . '}';
  }

}