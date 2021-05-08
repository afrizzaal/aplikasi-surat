<?php

class Fungsi
{
  protected $ci;

  public function __construct()
  {
    $this->ci = &get_instance();
  }

  function user_login()
  {
    $this->ci->load->model('user_m');
    $user_id = $this->ci->session->userdata('user_id');
    $user_data = $this->ci->user_m->get($user_id)->row();
    return $user_data;
  }
  function PdfGenerator($html, $filename, $paper, $orientation)
  {
    $dompdf = new Dompdf\Dompdf();
    $dompdf->loadHtml($html);

    // (Optional) Setup the paper size and orientation
    $dompdf->setPaper($paper, $orientation);

    // Render the HTML as PDF
    $dompdf->render();

    // Output the generated PDF to Browser
    $dompdf->stream($filename, array('Attachment' => 0));
  }

  public function count_suratm()
  {
    $this->ci->load->model('suratm_m');
    return $this->ci->suratm_m->get()->num_rows();
  }
  public function count_disposisi()
  {
    $this->ci->load->model('disposisi_m');
    return $this->ci->disposisi_m->get()->num_rows();
  }
  public function count_suratk()
  {
    $this->ci->load->model('suratk_m');
    return $this->ci->suratk_m->get()->num_rows();
  }
  public function count_indeks()
  {
    $this->ci->load->model('indeks_m');
    return $this->ci->indeks_m->get()->num_rows();
  }
  public function count_dataterkait()
  {
    $this->ci->load->model('dataterkait_m');
    return $this->ci->dataterkait_m->get()->num_rows();
  }
  public function count_user()
  {
    $this->ci->load->model('user_m');
    return $this->ci->user_m->get()->num_rows();
  }
}
