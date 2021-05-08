<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Indeks extends CI_Controller
{
  function __construct()
  {
    parent::__construct();
    check_not_login();
    $this->load->model('indeks_m');
  }

  public function index()
  {
    $data['row'] = $this->indeks_m->get();
    $this->template->load('template', 'indeks/indeks_data', $data);
  }

  public function tambah()
  {
    $indeks = new stdClass();
    $indeks->id_indeks = null;
    $indeks->kode_indeks = null;
    $indeks->nama = null;
    $data = array(
      'page' => 'tambah',
      'row' => $indeks
    );
    $this->template->load('template', 'indeks/indeks_form', $data);
  }

  public function edit($id)
  {
    $query = $this->indeks_m->get($id);
    if ($query->num_rows() > 0) {
      $indeks = $query->row();
      $data = array(
        'page' => 'edit',
        'row' => $indeks
      );
      $this->template->load('template', 'indeks/indeks_form', $data);
    } else {
      echo "<script>alert('Data tidak ditemukan');";
      echo "window.location='" . site_url('indeks') . "';</script>";
    }
  }

  public function process()
  {
    $post = $this->input->post(null, TRUE);
    if (isset($_POST['tambah'])) {
      if ($this->indeks_m->check_indeks($post['kode_indeks'])->num_rows() > 0) {
        $this->session->set_flashdata('error', "Kode indeks $post[kode_indeks] sudah ada");
        redirect('indeks/tambah');
      } else {
        $this->indeks_m->tambah($post);
      }
    } else if (isset($_POST['edit'])) {
      if ($this->indeks_m->check_indeks($post['kode_indeks'], $post['id'])->num_rows() > 0) {
        $this->session->set_flashdata('error', "Kode indeks $post[kode_indeks] sudah ada");
        redirect('indeks/edit/' . $post['id']);
      } else {
        $this->indeks_m->edit($post);
      }
    }
    if ($this->db->affected_rows() > 0) {
      $this->session->set_flashdata('success', 'Data berhasil disimpan');
    }
    redirect('indeks');
  }

  public function del($id)
  {
    $this->indeks_m->del($id);

    if ($this->db->affected_rows() > 0) {
      $this->session->set_flashdata('success', 'Data berhasil dihapus');
    }
    redirect('indeks');
  }

  public function print()
  {
    $data['row'] = $this->indeks_m->get();
    $this->template->load('template', 'indeks/indeks_print', $data);
  }

  public function pdf()
  {
    $this->load->library('dompdf_gen');
    $data['row'] = $this->indeks_m->get();
    $this->load->view('indeks/indeks_pdf', $data);

    $paper_size = 'A4';
    $orientation = 'portrait';
    $html = $this->output->get_output();
    $this->dompdf->set_paper($paper_size, $orientation);

    $this->dompdf->load_html($html);
    $this->dompdf->render();
    $this->dompdf->stream("Laporan_indeks.pdf", array('Attachment' => 0));
  }
}
