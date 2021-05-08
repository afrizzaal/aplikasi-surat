<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Suratk extends CI_Controller
{
  function __construct()
  {
    parent::__construct();
    check_not_login();
    $this->load->model(['suratk_m', 'indeks_m', 'user_m']);
  }

  public function index()
  {
    $data['row'] = $this->suratk_m->get();
    $this->template->load('template', 'surat_keluar/suratk_data', $data);
  }

  public function tambah()
  {
    $suratk = new stdClass();
    $suratk->id_suratk = null;
    $suratk->no_agenda_sk = null;
    $suratk->tanggal_surat = null;
    $suratk->ditujukan_kepada = null;
    $suratk->perihal = null;
    $suratk->unit_pengolah = null;
    $suratk->id_indeks = null;
    $suratk->keterangan = null;
    $suratk->file_surat = null;
    $suratk->status = null;
    $suratk->user_id = null;

    $query_indeks = $this->indeks_m->get();
    $query_user = $this->user_m->get();
    // $user[null] = '- Pilih -';
    // foreach ($query_user->result() as $usr) {
    //   $user[$usr->user_id] = $usr->level;
    // }

    $data = array(
      'page' => 'tambah',
      'row' => $suratk,
      'indeks' => $query_indeks,
      'user' => $query_user
      // 'user' => $user, 'selecteduser' => null,
    );
    $this->template->load('template', 'surat_keluar/suratk_form', $data);
  }

  public function edit($id)
  {
    $query = $this->suratk_m->get($id);
    if ($query->num_rows() > 0) {
      $suratk = $query->row();
      $query_indeks = $this->indeks_m->get();
      $query_user = $this->user_m->get();
      // $user[null] = '- Pilih -';
      // foreach ($query_user->result() as $usr) {
      //   $user[$usr->user_id] = $usr->name;
      // }

      $data = array(
        'page' => 'edit',
        'row' => $suratk,
        'indeks' => $query_indeks,
        'user' => $query_user
        // 'user' => $user, 'selecteduser' => $usr->user_id
      );
      $this->template->load('template', 'surat_keluar/suratk_form', $data);
    } else {
      echo "<script>alert('Data tidak ditemukan');";
      echo "window.location='" . site_url('suratk') . "';</script>";
    }
  }

  public function process()
  {
    $config['upload_path']      = './uploads/surat-keluar/';
    $config['allowed_types']     = 'jpg|jpeg|png|pdf';
    $config['max_size']          = 2048;
    $config['file_name']        = 'suratk-' . date('ymd') . '-' . substr(md5(rand()), 0, 10);
    $this->load->library('upload', $config);
    $post = $this->input->post(null, TRUE);
    if (isset($_POST['tambah'])) {
      if ($_FILES['file_surat']['name'] != null) {
        if ($this->upload->do_upload('file_surat')) {
          $post['file_surat'] = $this->upload->data('file_name');
          $this->suratk_m->tambah($post);
          if ($this->db->affected_rows() > 0) {
            $this->session->set_flashdata('success', 'Data berhasil disimpan');
          }
          redirect('suratk');
        } else {
          $error = $this->upload->display_errors();
          $this->session->set_flashdata('error', $error);
        }
      } else {
        $post['file_surat'] = null;
        $this->suratk_m->tambah($post);
        if ($this->db->affected_rows() > 0) {
          $this->session->set_flashdata('success', 'Data berhasil disimpan');
        }
        redirect('suratk');
      }
    } else if (isset($_POST['edit'])) {
      $this->suratk_m->edit($post);
      if ($_FILES['file_surat']['name'] != null) {
        if ($this->upload->do_upload('file_surat')) {

          $suratk = $this->suratk_m->get($post['id'])->row();
          if ($suratk->file_surat != null) {
            $target_file = './uploads/surat-keluar/' . $suratk->file_surat;
            unlink($target_file);
          }
          $post['file_surat'] = $this->upload->data('file_name');
          $this->suratk_m->edit($post);
          if ($this->db->affected_rows() > 0) {
            $this->session->set_flashdata('success', 'Data berhasil disimpan');
          }
          redirect('suratk');
        } else {
          $error = $this->upload->display_errors();
          $this->session->set_flashdata('error', $error);
        }
      } else {
        $post['file_surat'] = null;
        $this->suratk_m->edit($post);
        if ($this->db->affected_rows() > 0) {
          $this->session->set_flashdata('success', 'Data berhasil disimpan');
        }
        redirect('suratk');
      }
    }
  }

  public function del($id)
  {
    $suratk = $this->suratk_m->get($id)->row();
    if ($suratk->file_surat != null) {
      $target_file = './uploads/surat-keluar/' . $suratk->file_surat;
      unlink($target_file);
    }
    $this->suratk_m->del($id);
    if ($this->db->affected_rows() > 0) {
      $this->session->set_flashdata('success', 'Data berhasil dihapus');
    }
    redirect('suratk');
  }

  // public function print()
  // {
  //   $data['row'] = $this->suratk_m->get();
  //   $this->template->load('template', 'surat_keluar/suratk_print', $data);
  // }

  // public function pdf()
  // {
  //   $this->load->library('dompdf_gen');
  //   $data['row'] = $this->suratk_m->get();
  //   $this->load->view('surat_keluar/suratk_pdf', $data);

  //   $paper_size = 'A4';
  //   $orientation = 'landscape';
  //   $html = $this->output->get_output();
  //   $this->dompdf->set_paper($paper_size, $orientation);

  //   $this->dompdf->load_html($html);
  //   $this->dompdf->render();
  //   $this->dompdf->stream("Laporan_Suratk.pdf", array('Attachment' => 0));
  // }

  function file_surat($id)
  {
    $data['row'] = $this->suratk_m->get($id)->row();
    $this->template->load('template', 'surat_keluar/file_surat', $data);
  }

  function status($id)
  {
    $data['row'] = $this->suratk_m->get($id)->row();
    $this->template->load('template', 'surat_keluar/status', $data);
  }
}
