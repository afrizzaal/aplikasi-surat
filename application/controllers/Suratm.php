<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Suratm extends CI_Controller
{
  function __construct()
  {
    parent::__construct();
    check_not_login();
    $this->load->model(['suratm_m', 'indeks_m', 'user_m']);
  }

  public function index()
  {
    $data['row'] = $this->suratm_m->get();
    $this->template->load('template', 'surat_masuk/suratm_data', $data);
  }

  public function tambah()
  {
    $suratm = new stdClass();
    $suratm->id_suratm = null;
    $suratm->no_agenda_sm = null;
    $suratm->tanggal_surat = null;
    $suratm->asal_surat = null;
    $suratm->perihal = null;
    $suratm->isi_surat = null;
    $suratm->id_indeks = null;
    $suratm->keterangan = null;
    $suratm->file_surat = null;
    $suratm->status = null;
    $suratm->user_id = null;

    $query_indeks = $this->indeks_m->get();
    $query_user = $this->user_m->get();
    // $user[null] = '- Pilih -';
    // foreach ($query_user->result() as $usr) {
    //   $user[$usr->user_id] = $usr->level;
    // }

    $data = array(
      'page' => 'tambah',
      'row' => $suratm,
      'indeks' => $query_indeks,
      'user' => $query_user
      // 'user' => $user, 'selecteduser' => null,
    );
    $this->template->load('template', 'surat_masuk/suratm_form', $data);
  }

  public function edit($id)
  {
    $query = $this->suratm_m->get($id);
    if ($query->num_rows() > 0) {
      $suratm = $query->row();
      $query_indeks = $this->indeks_m->get();
      $query_user = $this->user_m->get();
      // $user[null] = '- Pilih -';
      // foreach ($query_user->result() as $usr) {
      //   $user[$usr->user_id] = $usr->name;
      // }

      $data = array(
        'page' => 'edit',
        'row' => $suratm,
        'indeks' => $query_indeks,
        'user' => $query_user
        // 'user' => $user, 'selecteduser' => $usr->user_id
      );
      $this->template->load('template', 'surat_masuk/suratm_form', $data);
    } else {
      echo "<script>alert('Data tidak ditemukan');";
      echo "window.location='" . site_url('suratm') . "';</script>";
    }
  }

  public function process()
  {
    $config['upload_path']      = './uploads/surat-masuk/';
    $config['allowed_types']     = 'jpg|jpeg|png|pdf';
    $config['max_size']          = 2048;
    $config['file_name']        = 'suratm-' . date('ymd') . '-' . substr(md5(rand()), 0, 10);
    $this->load->library('upload', $config);
    $post = $this->input->post(null, TRUE);
    if (isset($_POST['tambah'])) {
      if ($_FILES['file_surat']['name'] != null) {
        if ($this->upload->do_upload('file_surat')) {
          $post['file_surat'] = $this->upload->data('file_name');
          $this->suratm_m->tambah($post);
          if ($this->db->affected_rows() > 0) {
            $this->session->set_flashdata('success', 'Data berhasil disimpan');
          }
          redirect('suratm');
        } else {
          $error = $this->upload->display_errors();
          $this->session->set_flashdata('error', $error);
        }
      } else {
        $post['file_surat'] = null;
        $this->suratm_m->tambah($post);
        if ($this->db->affected_rows() > 0) {
          $this->session->set_flashdata('success', 'Data berhasil disimpan');
        }
        redirect('suratm');
      }
    } else if (isset($_POST['edit'])) {
      $this->suratm_m->edit($post);
      if ($_FILES['file_surat']['name'] != null) {
        if ($this->upload->do_upload('file_surat')) {
          $suratm = $this->suratm_m->get($post['id'])->row();
          if ($suratm->file_surat != null) {
            $target_file = './uploads/surat-masuk/' . $suratm->file_surat;
            unlink($target_file);
          }
          $post['file_surat'] = $this->upload->data('file_name');
          $this->suratm_m->edit($post);
          if ($this->db->affected_rows() > 0) {
            $this->session->set_flashdata('success', 'Data berhasil disimpan');
          }
          redirect('suratm');
        } else {
          $error = $this->upload->display_errors();
          $this->session->set_flashdata('error', $error);
        }
      } else {
        $post['file_surat'] = null;
        $this->suratm_m->edit($post);
        if ($this->db->affected_rows() > 0) {
          $this->session->set_flashdata('success', 'Data berhasil disimpan');
        }
        redirect('suratm');
      }
    }
  }

  public function del($id)
  {
    $suratm = $this->suratm_m->get($id)->row();
    if ($suratm->file_surat != null) {
      $target_file = './uploads/surat-masuk/' . $suratm->file_surat;
      unlink($target_file);
    }
    $this->suratm_m->del($id);
    if ($this->db->affected_rows() > 0) {
      $this->session->set_flashdata('success', 'Data berhasil dihapus');
    }
    redirect('suratm');
  }

  // public function print()
  // {
  //   $data['row'] = $this->suratm_m->get();
  //   $this->template->load('template', 'surat_masuk/suratm_print', $data);
  // }

  // public function pdf()
  // {
  //   $this->load->library('dompdf_gen');
  //   $data['row'] = $this->suratm_m->get();
  //   $this->load->view('surat_masuk/suratm_pdf', $data);

  //   $paper_size = 'A4';
  //   $orientation = 'landscape';
  //   $html = $this->output->get_output();
  //   $this->dompdf->set_paper($paper_size, $orientation);

  //   $this->dompdf->load_html($html);
  //   $this->dompdf->render();
  //   $this->dompdf->stream("Laporan_Suratm.pdf", array('Attachment' => 0));
  // }

  function file_surat($id)
  {
    $data['row'] = $this->suratm_m->get($id)->row();
    $this->template->load('template', 'surat_masuk/file_surat', $data);
  }

  // public function status($id)
  // {
  //   $where = array('id_suratm' => $id);
  //   $data['status'] = $this->db->query("SELECT * FROM t_suratmasuk WHERE id_suratm='$id'")->result();
  //   $this->template->load('template', 'surat_masuk/status', $data);
  // }

  // public function cek_status()
  // {
  //   $id   = $this->input->post('id_suratm');
  //   $status  = $this->input->post('status');

  //   $data = array(
  //     'status' => $status,
  //   );

  //   $where = array(
  //     'id_suratm'      => $id
  //   );

  //   $this->suratm_m->update_data('t_suratmasuk', $data, $where);
  //   redirect('suratm');
  // }
}
