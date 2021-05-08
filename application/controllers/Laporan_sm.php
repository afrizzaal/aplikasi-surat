<?php
class Laporan_sm extends CI_Controller
{
  function __construct()
  {
    parent::__construct();
    check_not_login();
    $this->load->model('suratm_m');
  }

  public function index()
  {
    $dari = $this->input->post('dari');
    $sampai = $this->input->post('sampai');
    $this->_rules();

    if ($this->form_validation->run() == FALSE) {
      $this->template->load('template', 'laporan/laporan_suratm/filter_laporan');
    } else {
      // $data['row'] = $this->suratm_m->get();
      $data['laporan_sm'] = $this->db->query("SELECT * FROM t_suratmasuk sm, indeks id, user us WHERE sm.id_indeks = id.id_indeks AND sm.user_id=us.user_id AND date(tanggal_surat) >= '$dari' AND date(tanggal_surat) <= '$sampai'")->result();
      $this->template->load('template', 'laporan/laporan_suratm/tampilkan_laporan', $data);
    }
  }

  public function print()
  {
    $dari = $this->input->get('dari');
    $sampai = $this->input->get('sampai');

    $data['laporan_sm'] = $this->db->query("SELECT * FROM t_suratmasuk sm, indeks id, user us WHERE sm.id_indeks = id.id_indeks AND sm.user_id=us.user_id AND date(tanggal_surat) >= '$dari' AND date(tanggal_surat) <= '$sampai'")->result();
    $this->template->load('template', 'laporan/laporan_suratm/suratm_print', $data);
  }

  public function pdf()
  {
    $dari = $this->input->get('dari');
    $sampai = $this->input->get('sampai');

    $this->load->library('dompdf_gen');
    $data['laporan_sm'] = $this->db->query("SELECT * FROM t_suratmasuk sm, indeks id, user us WHERE sm.id_indeks = id.id_indeks AND sm.user_id=us.user_id AND date(tanggal_surat) >= '$dari' AND date(tanggal_surat) <= '$sampai'")->result();
    $this->load->view('laporan/laporan_suratm/suratm_pdf', $data);

    $paper_size = 'A4';
    $orientation = 'landscape';
    $html = $this->output->get_output();
    $this->dompdf->set_paper($paper_size, $orientation);

    $this->dompdf->load_html($html);
    $this->dompdf->render();
    $this->dompdf->stream("Laporan_Suratm.pdf", array('Attachment' => 0));
  }

  public function _rules()
  {
    $this->form_validation->set_rules('dari', 'Dari Tanggal', 'required');
    $this->form_validation->set_rules('sampai', 'Sampai Tanggal', 'required');
    $this->form_validation->set_rules('required');
    $this->form_validation->set_message('required', 'Silahkan masukkan tanggal');
  }
}
