<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Disposisi_m extends CI_Model
{
  public function get($id = null)
  {
    $this->db->from('t_disposisi');
    // $this->db->join('indeks', 'indeks.id_indeks = t_suratkeluar.id_indeks');
    // $this->db->join('user', 'user.user_id = t_suratkeluar.user_id');
    if ($id != null) {
      $this->db->where('id_disposisi', $id);
    }

    $query = $this->db->get();
    return $query;
  }

  public function tambah($post)
  {
    $params = [
      'sifat_surat' => $post['sifat_surat'],
      'isi_disposisi' => $post['isi_disposisi'],
      'batas_waktu' => $post['batas_waktu'],
      'isi_disposisi' => $post['isi_disposisi'],
      'batas_waktu' => $post['batas_waktu'],
      'diteruskan_kepada' => $post['diteruskan_kepada'],
      'id_suratm' => $post['id_suratm'],
      'user_id' => $post['user_id']
    ];
    $this->db->insert('t_disposisi', $params);
  }

  public function edit($post)
  {
    $params = [
      'sifat_surat' => $post['sifat_surat'],
      'isi_disposisi' => $post['isi_disposisi'],
      'batas_waktu' => $post['batas_waktu'],
      'isi_disposisi' => $post['isi_disposisi'],
      'batas_waktu' => $post['batas_waktu'],
      'diteruskan_kepada' => $post['diteruskan_kepada'],
      'id_suratm' => $post['id_suratm'],
      'user_id' => $post['user_id']
    ];
    $this->db->where('id_disposisi', $post['id']);
    $this->db->update('t_disposisi', $params);
  }

  public function del($id)
  {
    $this->db->where('id_disposisi', $id);
    $this->db->delete('t_disposisi');
  }
}
