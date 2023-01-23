
<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Login extends CI_Controller
{
  public function __construct()
  {
    parent::__construct();
    $this->load->library('form_validation');
    $this->load->model('Login_model');
  }

  public function index()
  {
    if ($this->session->all_userdata('username')) {
      switch ($this->session->userdata('role_id')) {
        case 1:
          redirect('admin/Ahom');
          break;
        case 2:
          redirect('user/Uhom');
          break;
      }
    }
   
    
    $this->form_validation->set_rules('username', 'Username', 'required|trim');
    $this->form_validation->set_rules('password', 'Password', 'required|trim|max_length[10]');

    if ($this->form_validation->run() == false) {
        $this->load->view('index');
      
    } else {
      $this->authenticate();
    }
  }

  private function authenticate()
  {
    $username = $this->input->post('username');
    $password = $this->input->post('password');
    $user =  $this->Login_model->getbyusername($username);
      
    if ($user) {
      if (password_verify($password, $user['password'])) {
        $data = [
          'username' => $user['username'],
          'role_id' => $user['role_id'],
          'emp_id'  => $user['emp_id']
         
        ];
        // print_r($data);
        // exit;
        $this->session->set_userdata($data);
        switch ($user['role_id']) {
          case 1:
            redirect('admin/Ahom');
            break;
          case 2:
            redirect('user/Uhom');
            break;
        }
      } else {
        $this->session->set_flashdata('msg', '<div class="alert alert-danger" role="alert">
          Wrong password!</div>');
        redirect('login');
      }
    } else {
      $this->session->set_flashdata('msg', '<div class="alert alert-warning" role="alert">
      Username Not Found</div>');
      redirect('login');
    }

    if ($user) {
    } else {
      $this->session->set_flashdata('msg', '<div class="alert alert-danger" role="alert">Wrong password or Invalid username!</div>');
      redirect('login');
    }
  }
  public function logout()
  {
    $this->session->unset_userdata('username');
    $this->session->unset_userdata('role_id');
   
    $this->session->set_flashdata('msg', '<div class="alert alert-success" role="alert">Logged Out!</div>');
    redirect('login');
  }
  
}
