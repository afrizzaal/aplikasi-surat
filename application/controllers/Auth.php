<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Auth extends CI_Controller
{
  public function login()
  {
    check_already_login();
    $this->load->view('login');
  }

  public function process()
  {
    $post = $this->input->post(null, TRUE);
    if (isset($post['login'])) {
      $this->load->model('user_m');
      $query = $this->user_m->login($post);
?>
      <link rel="stylesheet" href="<?= base_url() ?>assets/plugins/sweetalert2/sweetalert2.min.css">
      <script src="<?= base_url() ?>assets/plugins/sweetalert2/sweetalert2.min.js"></script>
      <style>
        body {
          font-family: "Helvetica Neue", Helvetica, Arial, sans-serif;
          font-size: 1.124em;
          font-weight: normal;
        }
      </style>

      <body></body>
      <?php
      if ($query->num_rows() > 0) {
        $row = $query->row();
        $params = array(
          'user_id' => $row->user_id,
          'level' => $row->level
        );
        $this->session->set_userdata($params);
      ?>

        <script>
          Swal.fire({
            icon: 'success',
            title: 'Success',
            text: 'Selamat, login berhasil.'
          }).then((result) => {
            window.location = ' <?= site_url('dashboard') ?>';
          })
        </script>
        <!-- echo "<script>
        alert('Selamat, login berhasil');
        window.location='" . site_url('dashboard') . "';
        </script>"; -->
      <?php
      } else {

      ?>

        <script>
          Swal.fire({
            icon: 'error',
            title: 'Gagal',
            text: 'Login gagal, Username atau password salah!'
          }).then((result) => {
            window.location = ' <?= site_url('auth/login') ?>';
          })
        </script>
<?php
        // $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">
        //     Username atau Password salah!</div>');
        // redirect('auth/login');
      }
    }
  }

  public function logout()
  {
    $params = array('user_id', 'level');
    $this->session->unset_userdata($params);
    redirect('auth/login');
  }

  public function lupa_password()
  {
    $this->load->view('lupa_password');
  }

  // public function forgotPassword()
  // {
  //     $this->form_validation->set_rules('email', 'Email', 'trim|required|valid_email');

  //     if ($this->form_validation->run() == false) {
  //         $data['title'] = 'Forgot Password';
  //         $this->load->view('templates/auth_header', $data);
  //         $this->load->view('auth/forgot-password');
  //         $this->load->view('templates/auth_footer');
  //     } else {
  //         $email = $this->input->post('email');
  //         $user = $this->db->get_where('user', ['email' => $email, 'is_active' => 1])->row_array();

  //         if ($user) {
  //             $token = base64_encode(random_bytes(32));
  //             $user_token = [
  //                 'email' => $email,
  //                 'token' => $token,
  //                 'date_created' => time()
  //             ];

  //             $this->db->insert('user_token', $user_token);
  //             $this->_sendEmail($token, 'forgot');

  //             $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
  //         Please check your email to reset your password!</div>');
  //             redirect('auth/forgotpassword');
  //         } else {
  //             $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">
  //         Email is not registered or activated!</div>');
  //             redirect('auth/forgotpassword');
  //         }
  //     }
  // }

  // public function resetPassword()
  //   {
  //       $email = $this->input->get('email');
  //       $token = $this->input->get('token');

  //       $user = $this->db->get_where('user', ['email' => $email])->row_array();

  //       if ($user) {
  //           $user_token = $this->db->get_where('user_token', ['token' => $token])->row_array();

  //           if ($user_token) {
  //               $this->session->set_userdata('reset_email', $email);
  //               $this->changePassword();
  //           } else {
  //               $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">
  //               Reset password failed! Wrong token.</div>');
  //               redirect('auth');
  //           }
  //       } else {
  //           $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">
  //           Reset password failed! Wrong email.</div>');
  //           redirect('auth');
  //       }
  //   }
}
