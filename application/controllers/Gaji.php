<?php

require APPPATH . '/libraries/REST_Controller.php';

class gaji extends REST_Controller {

function __construct($config = 'rest') {
parent::__construct($config);

}

// show data penggajian
function index_get() {
		$id_gaji = $this->get('id_gaji');
		if ($id_gaji == '') {
		$penggajian = $this->db->get('penggajian')->result();
		} else {
		$this->db->where('id_gaji', $id_gaji);
		$penggajian = $this->db->get('penggajian')->result();
		}
		$this->response($penggajian, 200);
}

// insert new data to penggajian
function index_post() {
$data = array(
// 'id_gaji' => $this->post('id_gaji'),
'nama_karyawan'=> $this->post('nama_karyawan'),
'lama_kerja'=> $this->post('lama_kerja'),
'total_gaji'=> $this->post('total_gaji'));
$insert = $this->db->insert('penggajian', $data);
if ($insert) {
$this->response($data, 200);
} else {
$this->response(array('status' => 'fail', 502));
}
}

// update data penggajian
function index_put() {
$id_gaji = $this->put('id_gaji');
$data = array(
'id_gaji' => $this->put('id_gaji'),
'nama_karyawan_karyawan'=> $this->put('nama_karyawan_karyawan'),
'lama_kerja'=> $this->put('lama_kerja'),
'total_gaji'=> $this->put('total_gaji'));
$this->db->where('id_gaji', $id_gaji);
$update = $this->db->update('penggajian', $data);
if ($update) {
$this->response($data, 200);
} else {
$this->response(array('status' => 'fail', 502));
}
}

// delete penggajian
function index_delete() {
$id_gaji = $this->delete('id_gaji');
$this->db->where('id_gaji', $id_gaji);
$delete = $this->db->delete('penggajian');
if ($delete) {
$this->response(array('status' => 'success'), 201);
} else {
$this->response(array('status' => 'fail', 502));
}
}



}