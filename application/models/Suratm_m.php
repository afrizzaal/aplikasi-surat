<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Suratm_m extends CI_Model
{
  public function get($id = null)
  {
    $this->db->from('t_suratmasuk');
    $this->db->join('indeks', 'indeks.id_indeks = t_suratmasuk.id_indeks');
    $this->db->join('user', 'user.user_id = t_suratmasuk.user_id');
    if ($id != null) {
      $this->db->where('id_suratm', $id);
    }

    $query = $this->db->get();
    return $query;
  }

  public function tambah($post)
  {
    $params = [
      'no_agenda_sm' => $post['no_agenda_sm'],
      'tanggal_surat' => $post['tanggal_surat'],
      'asal_surat' => $post['asal_surat'],
      'perihal' => $post['perihal'],
      'isi_surat' => $post['isi_surat'],
      'id_indeks' => $post['id_indeks'],
      'keterangan' => $post['keterangan'],
      'file_surat' => $post['file_surat'],
      'status' => $post['status'],
      'user_id' => $post['user_id']
    ];
    $this->db->insert('t_suratmasuk', $params);
  }

  public function edit($post)
  {
    $params = [
      'no_agenda_sm' => $post['no_agenda_sm'],
      'tanggal_surat' => $post['tanggal_surat'],
      'asal_surat' => $post['asal_surat'],
      'perihal' => $post['perihal'],
      'isi_surat' => $post['isi_surat'],
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
    $this->db->where('id_suratm', $post['id']);
    $this->db->update('t_suratmasuk', $params);
  }

  public function del($id)
  {
    $this->db->where('id_suratm', $id);
    $this->db->delete('t_suratmasuk');
  }

  public function update_data($table, $data, $where)
  {
    $this->db->update($table, $data, $where);
  }
}
