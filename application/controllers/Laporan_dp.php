<?php
class Laporan_dp extends CI_Controller
{
  function __construct()
  {
    parent::__construct();
    check_not_login();
    $this->load->model('disposisi_m');
  }

  public function index()
  {
    $dari = $this->input->post('dari');
    $sampai = $this->input->post('sampai');
    $this->_rules();

    if ($this->form_validation->run() == FALSE) {
      $this->template->load('template', 'laporan/laporan_disposisi/filter_laporan');
    } else {
      // $data['row'] = $this->suratm_m->get();
      $data['laporan_dp'] = $this->db->query("SELECT * FROM t_disposisi dp, t_suratmasuk sm, user us WHERE dp.id_suratm = sm.id_suratm AND dp.user_id=us.user_id AND date(batas_waktu) >= '$dari' AND date(batas_waktu) <= '$sampai'")->result();
      $this->template->load('template', 'laporan/laporan_disposisi/tampilkan_laporan', $data);
    }
  }

  public function print()
  {
    $dari = $this->input->get('dari');
    $sampai = $this->input->get('sampai');

    $data['laporan_dp'] = $this->db->query("SELECT * FROM t_disposisi dp, t_suratmasuk sm, user us WHERE dp.id_suratm = sm.id_suratm AND dp.user_id=us.user_id AND date(batas_waktu) >= '$dari' AND date(batas_waktu) <= '$sampai'")->result();
    $this->template->load('template', 'laporan/laporan_disposisi/disposisi_print', $data);
  }

  public function pdf()
  {
    $dari = $this->input->get('dari');
    $sampai = $this->input->get('sampai');

    $this->load->library('dompdf_gen');
    $data['laporan_dp'] = $this->db->query("SELECT * FROM t_disposisi dp, t_suratmasuk sm, user us WHERE dp.id_suratm = sm.id_suratm AND dp.user_id=us.user_id AND date(batas_waktu) >= '$dari' AND date(batas_waktu) <= '$sampai'")->result();
    $this->load->view('laporan/laporan_disposisi/disposisi_pdf', $data);

    $paper_size = 'A4';
    $orientation = 'landscape';
    $html = $this->output->get_output();
    $this->dompdf->set_paper($paper_size, $orientation);

    $this->dompdf->load_html($html);
    $this->dompdf->render();
    $this->dompdf->stream("Laporan_Disposisi.pdf", array('Attachment' => 0));
  }

  public function _rules()
  {
    $this->form_validation->set_rules('dari', 'Dari Tanggal', 'required');
    $this->form_validation->set_rules('sampai', 'Sampai Tanggal', 'required');
    $this->form_validation->set_rules('required');
    $this->form_validation->set_message('required', 'Silahkan masukkan tanggal');
  }
}
