<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Suratk_m extends CI_Model
{
  public function get($id = null)
  {
    $this->db->from('t_suratkeluar');
    $this->db->join('indeks', 'indeks.id_indeks = t_suratkeluar.id_indeks');
    $this->db->join('user', 'user.user_id = t_suratkeluar.user_id');
    if ($id != null) {
      $this->db->where('id_suratk', $id);
    }

    $query = $this->db->get();
    return $query;
  }

  public function tambah($post)
  {
    $params = [
      'no_agenda_sk' => $post['no_agenda_sk'],
      'tanggal_surat' => $post['tanggal_surat'],
      'ditujukan_kepada' => $post['ditujukan_kepada'],
      'perihal' => $post['perihal'],
      'unit_pengolah' => $post['unit_pengolah'],
      'id_indeks' => $post['id_indeks'],
      'keterangan' => $post['keterangan'],
      'file_surat' => $post['file_surat'],
      'status' => $post['status'],
      'user_id' => $post['user_id']
    ];
    $this->db->insert('t_suratkeluar', $params);
  }

  public function edit($post)
  {
    $params = [
      'no_agenda_sk' => $post['no_agenda_sk'],
      'tanggal_surat' => $post['tanggal_surat'],
      'ditujukan_kepada' => $post['ditujukan_kepada'],
      'perihal' => $post['perihal'],
      'unit_pengolah' => $post['unit_pengolah'],
      'id_indeks' => $post['id_indeks'],
      'keterangan' => $post['keterangan'],
      // 'file_surat' => $post['file_surat'],
      'status' => $post['status'],
      'user_id' => $post['user_id']
      // 'updated' => date('Y-m-d H:i:s')
    ];
    if ($post['file_surat'] != null) {
      $params['file_surat'] = $post['file_surat'];
    }
    $this->db->where('id_suratk', $post['id']);
    $this->db->update('t_suratkeluar', $params);
  }

  public function del($id)
  {
    $this->db->where('id_suratk', $id);
    $this->db->delete('t_suratkeluar');
  }
}
