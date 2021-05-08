<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Indeks_m extends CI_Model
{
  public function get($id = null)
  {
    $this->db->from('indeks');
    if ($id != null) {
      $this->db->where('id_indeks', $id);
    }

    $query = $this->db->get();
    return $query;
  }

  public function tambah($post)
  {
    $params = [
      'kode_indeks' => $post['kode_indeks'],
      'nama' => $post['indeks_name']

    ];
    $this->db->insert('indeks', $params);
  }

  public function edit($post)
  {
    $params = [
      'kode_indeks' => $post['kode_indeks'],
      'nama' => $post['indeks_name']

    ];
    $this->db->where('id_indeks', $post['id']);
    $this->db->update('indeks', $params);
  }

  function check_indeks($code, $id = null)
  {
    $this->db->from('indeks');
    $this->db->where('kode_indeks', $code);
    if ($id != null) {
      $this->db->where('id_indeks !=', $id);
    }
    $query = $this->db->get();
    return $query;
  }

  public function del($id)
  {
    $this->db->where('id_indeks', $id);
    $this->db->delete('indeks');
  }
}
