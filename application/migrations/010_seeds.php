<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Migration_seeds extends CI_Migration {

  function up () {

    $json = '[{"nama": "KSOP KELAS IV SABANG", "satker": "412967", "pelabuhan": "Pelabuhan Sabang"},
              {"nama": "KSOP KELAS III KUALA TANJUNG", "satker": "413777", "pelabuhan": "Pelabuhan Kuala Tanjung"},
              {"nama": "KSOP KELAS I DUMAI", "satker": "413092", "pelabuhan": "Pelabuhan Dumai"},
              {"nama": "KSOP KELAS II TELUK BAYUR", "satker": "413070", "pelabuhan": "Pelabuhan Teluk Bayur"},
              {"nama": "KSOP KELAS II  PALEMBANG", "satker": "413256", "pelabuhan": "Pelabuhan Palembang"},
              {"nama": "KSOP KELAS I PANJANG", "satker": "413307", "pelabuhan": "Pelabuhan Panjang"},
              {"nama": "KSOP KELAS I BANTEN", "satker": "413670", "pelabuhan": "Pelabuhan Banten"},
              {"nama": "KSOP KELAS II BENOA", "satker": "287579", "pelabuhan": "Pelabuhan Benoa"},
              {"nama": "KSOP KELAS I TANJUNG EMAS SEMARANG", "satker": "412823", "pelabuhan": "Pelabuhan Tanjung Emas"},
              {"nama": "KSOP KELAS III KUPANG", "satker": "522582", "pelabuhan": "Pelabuhan Kupang"},
              {"nama": "KSOP KELAS II PONTIANAK", "satker": "413313", "pelabuhan": "Pelabuhan Pontianak"},
              {"nama": "KSOP KELAS I BANJARMASIN", "satker": "287171", "pelabuhan": "Pelabuhan Banjarmasin"},
              {"nama": "KSOP KELAS I BALIKPAPAN", "satker": "287228", "pelabuhan": "Pelabuhan Balikpapan"},
              {"nama": "KSOP KELAS III TARAKAN", "satker": "287232", "pelabuhan": "Pelabuhan Tarakan"},
              {"nama": "KSOP KELAS II  BITUNG", "satker": "413783", "pelabuhan": "Pelabuhan Bitung"},
              {"nama": "KSOP KELAS I  AMBON", "satker": "287537", "pelabuhan": "Pelabuhan Ambon"},
              {"nama": "KSOP KELAS II TERNATE", "satker": "287541", "pelabuhan": "Pelabuhan Ternate"},
              {"nama": "KSOP KELAS II JAYAPURA", "satker": "287778", "pelabuhan": "Pelabuhan Jayapura"},
              {"nama": "KSOP KELAS IV  MERAUKE", "satker": "287825", "pelabuhan": "Pelabuhan Merauke"},
              {"nama": "KSOP KELAS I  SORONG", "satker": "287804", "pelabuhan": "Pelabuhan Sorong"},
              {"nama": "OTORITAS PELABUHAN UTAMA BELAWAN", "satker": "413018", "pelabuhan": "Pelabuhan Belawan"},
              {"nama": "OTORITAS PELABUHAN UTAMA TANJUNG PRIOK", "satker": "412781", "pelabuhan": "Pelabuhan Tanjung Priok"},
              {"nama": "OTORITAS PELABUHAN UTAMA TANJUNG PERAK", "satker": "412891", "pelabuhan": "Pelabuhan Tanjung Perak"},
              {"nama": "OTORITAS PELABUHAN UTAMA MAKASSAR", "satker": "287469", "pelabuhan": "Pelabuhan Makassar"}]';

    $this->load->model(array('Users', 'Dermagas', 'Gudangs', 'Lapangans', 'Permissions'));
    foreach(json_decode($json) as $obj) {
      $user = $this->Users->save(array(
        'nama' => $obj->nama,
        'kode_satker' => $obj->satker,
        'pelabuhan' => $obj->pelabuhan,
        'username' => $obj->satker,
        'password' => $obj->satker,
        'confirm_password' => $obj->satker
      ));

      foreach (array('Dermaga', 'Gudang', 'Lapangan') as $controller) {
        $model = "{$controller}s";
        $this->$model->create(array(
          'user' => $user,
          'nama' => "{$controller} {$obj->pelabuhan}"
        ));
      }

      foreach (array('Kapal', 'Dermaga', 'Gudang', 'Lapangan', 'PelayananDermaga', 'LaporanHarianGudang', 'LaporanHarianLapangan') as $entity) {
        foreach (array('index', 'create', 'read', 'update', 'delete') as $action) {
          $this->Permissions->create(array('user' => $user, 'entity' => $entity, 'action' => $action));
        }
      }

    }

    $admin = $this->Users->findOne(array('username' => 'admin'));
    foreach (array('User', 'Kapal', 'Dermaga', 'Gudang', 'Lapangan', 'PelayananDermaga', 'LaporanHarianGudang', 'LaporanHarianLapangan') as $entity) {
      foreach (array('index', 'create', 'read', 'update', 'delete') as $action) {
        $this->Permissions->create(array('user' => $admin['uuid'], 'entity' => $entity, 'action' => $action));
      }
    }

    foreach (array('WaitingTime', 'ApproachTime', 'EffectiveTime', 'WTR', 'BOR', 'SOR', 'YOR') as $report)
      foreach ($this->Users->find() as $alluser)
        $this->Permissions->create(array('user' => $alluser->uuid, 'entity' => $report, 'action' => 'index'));

  }

  function down () {

  }

}