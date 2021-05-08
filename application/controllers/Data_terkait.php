<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Data_terkait extends CI_Controller
{
  function __construct()
  {
    parent::__construct();
    check_not_login();
    $this->load->model('dataterkait_m');
  }

  public function index()
  {
    $data['row'] = $this->dataterkait_m->get();
    $this->template->load('template', 'data_terkait/dataterkait_data', $data);
  }

  public function tambah()
  {
    $data_terkait = new stdClass();
    $data_terkait->id_terkait = null;
    $data_terkait->nama_terkait = null;
    $data_terkait->nama_kepala = null;
    $data = array(
      'page' => 'tambah',
      'row' => $data_terkait
    );
    $this->template->load('template', 'data_terkait/dataterkait_form', $data);
  }

  public function edit($id)
  {
    $query = $this->dataterkait_m->get($id);
    if ($query->num_rows() > 0) {
      $data_terkait = $query->row();
      $data = array(
        'page' => 'edit',
        'row' => $data_terkait
      );
      $this->template->load('template', 'data_terkait/dataterkait_form', $data);
    } else {
      echo "<script>alert('Data tidak ditemukan');";
      echo "window.location='" . site_url('data_terkait') . "';</script>";
    }
  }

  public function process()
  {
    $post = $this->input->post(null, TRUE);
    if (isset($_POST['tambah'])) {
      if ($this->dataterkait_m->check_nama($post['nama_terkait'])->num_rows() > 0) {
        $this->session->set_flashdata('error', "$post[nama_terkait] sudah ada");
        redirect('data_terkait/tambah');
      } else {
        $this->dataterkait_m->tambah($post);
      }
    } else if (isset($_POST['edit'])) {
      if ($this->dataterkait_m->check_nama($post['nama_terkait'], $post['id'])->num_rows() > 0) {
        $this->session->set_flashdata('error', "$post[nama_terkait] sudah ada");
        redirect('data_terkait/edit/' . $post['id']);
      } else {
        $this->dataterkait_m->edit($post);
      }
    }
    if ($this->db->affected_rows() > 0) {
      $this->session->set_flashdata('success', 'Data berhasil disimpan');
    }
    redirect('data_terkait');
  }
  public function del($id)
  {
    $this->dataterkait_m->del($id);

    if ($this->db->affected_rows() > 0) {
      $this->session->set_flashdata('success', 'Data berhasil dihapus');
    }
    redirect('data_terkait');
  }

  public function print()
  {
    $data['row'] = $this->dataterkait_m->get();
    $this->template->load('template', 'data_terkait/dataterkait_print', $data);
  }

  public function pdf()
  {
    $this->load->library('dompdf_gen');
    $data['row'] = $this->dataterkait_m->get();
    $this->load->view('data_terkait/dataterkait_pdf', $data);

    $paper_size = 'A4';
    $orientation = 'landscape';
    $html = $this->output->get_output();
    $this->dompdf->set_paper($paper_size, $orientation);

    $this->dompdf->load_html($html);
    $this->dompdf->render();
    $this->dompdf->stream("Laporan_Terkait.pdf", array('Attachment' => 0));
  }
}
