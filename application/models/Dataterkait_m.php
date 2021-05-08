<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Dataterkait_m extends CI_Model
{
  public function get($id = null)
  {
    $this->db->from('t_dataterkait');
    if ($id != null) {
      $this->db->where('id_terkait', $id);
    }

    $query = $this->db->get();
    return $query;
  }

  public function tambah($post)
  {
    $params = [
      'nama_terkait' => $post['nama_terkait'],
      'nama_kepala' => $post['nama_kepala']
    ];
    $this->db->insert('t_dataterkait', $params);
  }

  public function edit($post)
  {
    $params = [
      'nama_terkait' => $post['nama_terkait'],
      'nama_kepala' => $post['nama_kepala']
    ];
    $this->db->where('id_terkait', $post['id']);
    $this->db->update('t_dataterkait', $params);
  }

  function check_nama($code, $id = null)
  {
    $this->db->from('t_dataterkait');
    $this->db->where('nama_terkait', $code);
    if ($id != null) {
      $this->db->where('id_terkait !=', $id);
    }
    $query = $this->db->get();
    return $query;
  }

  public function del($id)
  {
    $this->db->where('id_terkait', $id);
    $this->db->delete('t_dataterkait');
  }
}
