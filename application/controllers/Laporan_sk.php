<?php
class Laporan_sk extends CI_Controller
{
  function __construct()
  {
    parent::__construct();
    check_not_login();
    $this->load->model('suratk_m');
  }

  public function index()
  {
    $dari = $this->input->post('dari');
    $sampai = $this->input->post('sampai');
    $this->_rules();

    if ($this->form_validation->run() == FALSE) {
      $this->template->load('template', 'laporan/laporan_suratk/filter_laporan');
    } else {
      // $data['row'] = $this->suratm_m->get();
      $data['laporan_sk'] = $this->db->query("SELECT * FROM t_suratkeluar sk, indeks id, user us WHERE sk.id_indeks = id.id_indeks AND sk.user_id=us.user_id AND date(tanggal_surat) >= '$dari' AND date(tanggal_surat) <= '$sampai'")->result();
      $this->template->load('template', 'laporan/laporan_suratk/tampilkan_laporan', $data);
    }
  }

  public function print()
  {
    $dari = $this->input->get('dari');
    $sampai = $this->input->get('sampai');

    $data['laporan_sk'] = $this->db->query("SELECT * FROM t_suratkeluar sk, indeks id, user us WHERE sk.id_indeks = id.id_indeks AND sk.user_id=us.user_id AND date(tanggal_surat) >= '$dari' AND date(tanggal_surat) <= '$sampai'")->result();
    $this->template->load('template', 'laporan/laporan_suratk/suratk_print', $data);
  }

  public function pdf()
  {
    $dari = $this->input->get('dari');
    $sampai = $this->input->get('sampai');

    $this->load->library('dompdf_gen');
    $data['laporan_sk'] = $this->db->query("SELECT * FROM t_suratkeluar sk, indeks id, user us WHERE sk.id_indeks = id.id_indeks AND sk.user_id=us.user_id AND date(tanggal_surat) >= '$dari' AND date(tanggal_surat) <= '$sampai'")->result();
    $this->load->view('laporan/laporan_suratk/suratk_pdf', $data);

    $paper_size = 'A4';
    $orientation = 'landscape';
    $html = $this->output->get_output();
    $this->dompdf->set_paper($paper_size, $orientation);

    $this->dompdf->load_html($html);
    $this->dompdf->render();
    $this->dompdf->stream("Laporan_Suratk.pdf", array('Attachment' => 0));
  }

  public function _rules()
  {
    $this->form_validation->set_rules('dari', 'Dari Tanggal', 'required');
    $this->form_validation->set_rules('sampai', 'Sampai Tanggal', 'required');
    $this->form_validation->set_rules('required');
    $this->form_validation->set_message('required', 'Silahkan masukkan tanggal');
  }
}
