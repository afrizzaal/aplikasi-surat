<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Disposisi extends CI_Controller
{
  function __construct()
  {
    parent::__construct();
    check_not_login();
    $this->load->model(['disposisi_m', 'suratm_m', 'user_m']);
  }

  public function index()
  {
    $data['row'] = $this->disposisi_m->get();
    $this->template->load('template', 'disposisi/disposisi_data', $data);
  }

  public function tambah()
  {
    $disposisi = new stdClass();
    $disposisi->id_disposisi = null;
    $disposisi->sifat_surat = null;
    $disposisi->isi_disposisi = null;
    $disposisi->batas_waktu = null;
    $disposisi->diteruskan_kepada = null;
    $disposisi->id_suratm = null;
    $disposisi->user_id = null;

    $query_suratm = $this->suratm_m->get();
    $query_user = $this->user_m->get();
    // $user[null] = '- Pilih -';
    // foreach ($query_user->result() as $usr) {
    //   $user[$usr->user_id] = $usr->level;
    // }

    $data = array(
      'page' => 'tambah',
      'row' => $disposisi,
      'suratm' => $query_suratm,
      'user' => $query_user
      // 'user' => $user, 'selecteduser' => null,
    );
    $this->template->load('template', 'disposisi/disposisi_form', $data);
  }

  public function edit($id)
  {
    $query = $this->disposisi_m->get($id);
    if ($query->num_rows() > 0) {
      $disposisi = $query->row();
      $query_suratm = $this->suratm_m->get();
      $query_user = $this->user_m->get();
      // $user[null] = '- Pilih -';
      // foreach ($query_user->result() as $usr) {
      //   $user[$usr->user_id] = $usr->name;
      // }

      $data = array(
        'page' => 'edit',
        'row' => $disposisi,
        'suratm' => $query_suratm,
        'user' => $query_user
        // 'user' => $user, 'selecteduser' => $usr->user_id
      );
      $this->template->load('template', 'disposisi/disposisi_form', $data);
    } else {
      echo "<script>alert('Data tidak ditemukan');";
      echo "window.location='" . site_url('disposisi') . "';</script>";
    }
  }

  public function process()
  {
    $post = $this->input->post(null, TRUE);
    if (isset($_POST['tambah'])) {
      $this->disposisi_m->tambah($post);
    } else if (isset($_POST['edit'])) {
      $this->disposisi_m->edit($post);
    }
    if ($this->db->affected_rows() > 0) {
      $this->session->set_flashdata('success', 'Data berhasil disimpan');
    }
    redirect('disposisi');
  }

  public function del($id)
  {
    $this->disposisi_m->del($id);

    if ($this->db->affected_rows() > 0) {
      $this->session->set_flashdata('success', 'Data berhasil dihapus');
    }
    redirect('disposisi');
  }

  public function print()
  {
    $data['row'] = $this->disposisi_m->get();
    $this->template->load('template', 'disposisi/disposisi_print', $data);
  }

  public function pdf()
  {
    $this->load->library('dompdf_gen');
    $data['row'] = $this->disposisi_m->get();
    $this->load->view('disposisi/disposisi_pdf', $data);

    $paper_size = 'A4';
    $orientation = 'landscape';
    $html = $this->output->get_output();
    $this->dompdf->set_paper($paper_size, $orientation);

    $this->dompdf->load_html($html);
    $this->dompdf->render();
    $this->dompdf->stream("Laporan_Disposisi.pdf", array('Attachment' => 0));
  }
}
