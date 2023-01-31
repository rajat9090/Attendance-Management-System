<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Ahom extends CI_Controller {
public function __construct()
{
	parent::__construct();
	date_default_timezone_set('Asia/kolkata');
	$this->load->library('form_validation');
    $this->load->model('Login_model');
	$admin1=$this->session->all_userdata();
	$admin=$this->session->userdata('username');
    $roleid=$admin1['role_id'];
	if($roleid=='1')
	{	
     
	}
	else{
		redirect(base_url().'login');
	}
	
	
}
	public function index()
	{
		$data=$this->session->all_userdata();
		$data1['username']=$data;
		// print_r($data1['username']);
		// exit;
		$countbranch=$this->Login_model->countbrn();
		$data1['branch']=$countbranch;
		$countbranch1=$this->Login_model->countloc();
		$data1['location']=$countbranch1;
		$countbranch2=$this->Login_model->countstaff();
		$data1['staff']=$countbranch2;
		$role_id=2;
		$countbranch3=$this->Login_model->countusers($role_id);
		$data1['users']=$countbranch3;
		$countbranch6=$this->Login_model->cbs();
		$data1['sbc']=$countbranch6;
		$countbranch6=$this->Login_model->cls();
		$data1['cls']=$countbranch6;
		// echo"<pre>";
		// print_r($data1['cls']);
		// exit;
		$this->load->view('admin/awel',$data1);

	}

	public function emp()
	{
	
		$data=$this->session->all_userdata();
		$data1['username']=$data;
		$data2=$this->Login_model->allemp();
		// echo"<pre>";
		// print_r($data2);
		// exit;
		$data1['emp']=$data2;
		$this->load->view('admin/emp',$data1);
}
public function a_emp()
	{
		$data=$this->session->all_userdata();
		$data1['username']=$data;
        $data=$this->Login_model->getbr();
		$data1['branch']=$data;
		$data=$this->Login_model->getloc();
		$data1['loc']=$data;
		$data=$this->Login_model->getshift();
		$data1['shift']=$data;
		// $data=$this->Login_model->getbr();
		// $data1['branch']=$data;

	$this->form_validation->set_rules('e_name', 'Staff Name', 'required|trim');
	$this->form_validation->set_rules('e_number', 'Staff Number', 'required|trim');
	$this->form_validation->set_rules('e_gender', 'Gender', 'required');
	$this->form_validation->set_rules('e_birth_date', 'Birth Date', 'required|trim');
	$this->form_validation->set_rules('address', 'Address', 'required|trim');
    $this->form_validation->set_rules('email', 'Email', 'required|trim|valid_email');
    $this->form_validation->set_rules('b_id', 'Branch', 'required|trim');
	$this->form_validation->set_rules('l_id', 'Location', 'required|trim');
	$this->form_validation->set_rules('shift', 'Shift', 'required|trim');
    $this->form_validation->set_rules('e_hire_date', 'Hire Date', 'required|trim');

    if ($this->form_validation->run() == true) {
		
      $this->_addEmployee();
    }
		$this->load->view('admin/add_emp',$data1);
}

public function _addEmployee()
  {
	
    $post['name'] = $this->input->post('e_name');
	$post['number'] = $this->input->post('e_number');
	$post['gender'] = $this->input->post('e_gender');
	$post['birth_date'] = $this->input->post('e_birth_date');
	$post['address'] = $this->input->post('address');
	$post['email'] = $this->input->post('email');
	$post['aadh'] = $this->input->post('aadh');
	$post['pan'] = $this->input->post('pan');
	$post['pf'] = $this->input->post('pf');
	$post['esi'] = $this->input->post('esi');
	$post['branch'] = $this->input->post('b_id');
	$post['location'] = $this->input->post('l_id');
	$post['shift'] = $this->input->post('shift');
	$post['title'] = $this->input->post('title');
	$post['salary'] = $this->input->post('salary');
	$post['date_joining'] = $this->input->post('e_hire_date');
	
    $email = $this->input->post('email');
    // Check Email
	$checkEmail=$this->Login_model->checkemail($email);
   
    if ($checkEmail > 0) {
      $this->session->set_flashdata('message', '<div class="alert alert-danger rounded-0 mb-2" role="alert">
      Email already used!</div>');
    }else{
      // Config Upload Image
      $config['upload_path'] = './assets/empimg/';
      $config['allowed_types'] = 'jpg|png|jpeg|gif';
      $config['max_size'] = '260000';
      $config['file_name'] = 'item-' . date('ymd') . '-' . substr(md5(rand()), 0, 10);
// print_r($config);
// exit;
      // load library upload and pass config
      $this->load->library('upload', $config);

      if ($_FILES['image']['name']) {
        if ($this->upload->do_upload('image')) {
          $image = $this->upload->data('file_name');
        }
      } else {
        $image = 'default.png';
      }
	  $post['image']=$image;
	  $this->Login_model->insemp($post);
	  $getEmp=$this->Login_model->getemp($email);
    //   print_r($getEmp);
    //   var_dump($getEmp);
    //   die;
	$e_id = $getEmp['id'];
	
	$ctime=time();
	
	  $salary=[
		'salary' => $post['salary'],
		'emp_id' => $e_id,
		'time'   => $ctime,
		'username'=>$data['username1']
	  ];

       $this->Login_model->insalary($salary);
     
      $d = [
        'brn_id' => $post['branch'],
        'emp_id' => $e_id

      ];
	  
	
      $rows=$this->Login_model->insempbr($d);
     
      if ($rows > 0) {
        $this->session->set_flashdata('message', '<div class="alert alert-success rounded-0 mb-2" role="alert">
          Successfully added a new employee!</div>');
      } else {
        $this->session->set_flashdata('message', '<div class="alert alert-danger rounded-0 mb-2" role="alert">
          Failed to add data!</div>');
      }
      redirect('admin/ahom/emp');
    }

  }
public function e_emp($e_id)
	{
		$oo=$this->Login_model->fusername1($e_id);
		$username1=$oo['username1'];
		$sl=$this->Login_model->sall($e_id);
		// $sall=$sl['0']['salary'];
		// echo"<pre>";
		// print_r($sl);
		// exit;
		$data2=$this->Login_model->singemp($e_id);
		// echo"<pre>";
		// print_r($data2);
		// exit;
		$data1['emp']=$data2;
		$br=$this->Login_model->getbr();
		$data1['branch']=$br;
		$data=$this->session->all_userdata();
		$data1['username']=$data;
		
	$this->form_validation->set_rules('e_name', 'Staff Name', 'required|trim');
	$this->form_validation->set_rules('e_number', 'Staff Number', 'required|trim');
	$this->form_validation->set_rules('e_birth_date', 'Birth Date', 'required|trim');
	$this->form_validation->set_rules('address', 'Address', 'required|trim');
    $this->form_validation->set_rules('e_mail', 'Email', 'required|trim|valid_email');
    $this->form_validation->set_rules('b_id', 'Branch', 'required|trim');
    $this->form_validation->set_rules('e_hire_date', 'Hire Date', 'required|trim');
	
	if($this->form_validation->run() == true) {

		$post['name'] = $this->input->post('e_name');
		$post['number'] = $this->input->post('e_number');
		$post['gender'] = $this->input->post('e_gender');
		$post['birth_date'] = $this->input->post('e_birth_date');
		$post['email'] = $this->input->post('e_mail');
		$post['address'] = $this->input->post('address');
		$post['salary'] = $this->input->post('sal');
		$post['aadh'] = $this->input->post('aadh');
		$post['pan'] = $this->input->post('pan');
		$post['pf'] = $this->input->post('pf');
		$post['esi'] = $this->input->post('esi');
		$post['branch'] = $this->input->post('b_id');
		$post['date_joining'] = $this->input->post('e_hire_date');
		// $post['sid'] = $this->input->post('sid');
// print_r($post);
// exit;

		if (!empty($_FILES['image']['tmp_name'])) {
			// Config Upload Image
			$config['upload_path'] = './assets/empimg/';
			$config['allowed_types'] = 'jpg|png|jpeg';
			$config['max_size'] = '26000';
			$config['file_name'] = 'item-' . date('ymd') . '-' . substr(md5(rand()), 0, 10);
	
			// load library upload and pass config
			$this->load->library('upload', $config);
	
			if ($this->upload->do_upload('image')) {
			  $image = $this->upload->data('file_name');
			  $old_image = $data2['employee']['image'];
			  if ($old_image != 'default.png') {
				unlink('./assets/empimg/' . $old_image);
			  }
			}
		  } else {
			$image = $data2['image'];
		  }
		  $post['image']=$image;
// 		  print_r($post);
// exit;
$ctime=time();


$salary=[
  'salary' => $post['salary'],
  'emp_id' => $e_id,
  'time'   => $ctime,
  'username'=>$username1
];
$i=0;
foreach($sl as $row){
	$ok[$i]=$row['salary'];
	$i++;
	
}

	$om=in_array($post['salary'],$ok);
	
if($om==false){
	
	$this->Login_model->addsal($salary);
}


		  $d['brn_id'] =  $post['branch'];
		  $this->_editemp($e_id, $post, $d);
	}
		$this->load->view('admin/edit_emp',$data1);	
}

public function _editemp($e_id,$post,$d)
  { 
	
	$upd1 = $this->Login_model->feditemp($e_id,$post);
    //  print_r($upd1);
	//  exit;
	$upd2 =$this->Login_model->upbranch($e_id,$d);
	// print_r($upd2);
	// exit;
    if ($upd1 > 0 && $upd2 > 0) {
      $this->session->set_flashdata('message', '<div class="alert alert-success rounded-0 mb-2" role="alert">
      Successfully updated an Staff!</div>');
      redirect('admin/ahom/emp');
    } else if ($upd1 > 0 && $upd2 <= 0) {
      $this->session->set_flashdata('message', '<div class="alert alert-success rounded-0 mb-2" role="alert">
      Successfully updated an Staff!</div>');
	  redirect('admin/ahom/emp');
    } else if ($upd1  <= 0 && $upd2 > 0) {
      $this->session->set_flashdata('message', '<div class="alert alert-success rounded-0 mb-2" role="alert">
      Successfully updated an Staff!</div>');
	  redirect('admin/ahom/emp');
    } else if(!empty($this->db->error()['message'])) {
      
        $this->session->set_flashdata('message', '<div class="alert alert-danger rounded-0 mb-2" role="alert">
        Failed to update Staff\'s data!</div>');
	}
	
      else{
       $this->session->set_flashdata('message', '<div class="alert alert-warning rounded-0 mb-2" role="alert">
        There\'s no field has changed.</div>');
		redirect('admin/ahom/e_emp/'.$e_id);
		
    }
    }

  
public function d_emp($e_id)
	{
		
		$this->Login_model->deleb($e_id);
		$this->Login_model->delemp($e_id);
		$this->session->set_flashdata('message', '<div class="alert alert-success rounded-0 mb-2" role="alert">
        Successfully deleted an employee!</div>');
    redirect('admin/ahom/emp');
}
public function loc()
	{
		
		$data=$this->session->all_userdata();
		$data1['username']=$data;
		$result=$this->Login_model->loc();
        $data1['loc']=$result;
		$this->load->view('admin/loc',$data1);
}
public function a_loc()
	{
		$data=$this->session->all_userdata();
		$data1['username']=$data;
		$this->form_validation->set_rules('l_name', 'Location Name', 'required|trim');
		if ($this->form_validation->run() == true) 
		{
            $post['name']=$this->input->post('l_name');
            $rows=$this->Login_model->addloc($post);
			if ($rows > 0) {
				
				$this->session->set_flashdata('message', '<div class="alert alert-success rounded-0 mb-2" role="alert">
				  Successfully added a new location!</div>');
				  redirect('admin/ahom/loc');
			} else {
				$this->session->set_flashdata('message', '<div class="alert alert-danger rounded-0 mb-2" role="alert">
				  Failed to add data!</div>');
				  redirect('admin/ahom/loc');
			  }
		}
		$this->load->view('admin/add_loc',$data1);
}
public function e_loc($id)
	{

		$data=$this->session->all_userdata();
		$data1['username']=$data;
		
        $rows=$this->Login_model->editloc($id);
		$data1['loc']=$rows;
		$this->form_validation->set_rules('l_name', 'Location Name', 'required|trim');
		if ($this->form_validation->run() == true) 
		{
			$post['name']=$this->input->post('l_name');
			$rows=$this->Login_model->editlocc($id,$post);
			if ($rows > 0) {
				$this->session->set_flashdata('message', '<div class="alert alert-success rounded-0 mb-2" role="alert">
					Successfully Updated a location!</div>');
			  redirect('admin/ahom/loc');
			  } else {
				if(!empty($this->db->error()['message']))
				  $this->session->set_flashdata('message', '<div class="alert alert-danger rounded-0 mb-2" role="alert">
				  Failed to Update Location!</div>');
				else
				  $this->session->set_flashdata('message', '<div class="alert alert-warning rounded-0 mb-2" role="alert">
				  No Changes!</div>');
			  }
		}
		$this->load->view('admin/edit_loc',$data1);
}
public function d_loc($id)
	{
		
		$this->Login_model->delloc($id);
		$this->session->set_flashdata('message', '<div class="alert alert-success rounded-0 mb-2" role="alert">
        Successfully deleted an Location!</div>');
    redirect('admin/ahom/loc');

}
public function brn()
	{
		
		$data=$this->session->all_userdata();
		$data1['username']=$data;
		$result=$this->Login_model->brn();
        $data1['brn']=$result;
		$this->load->view('admin/branch',$data1);
}

public function a_brn()
	{
		
		$data=$this->session->all_userdata();
		$data1['username']=$data;
		$this->form_validation->set_rules('d_id', 'Branch ID', 'required|trim');
		$this->form_validation->set_rules('d_name', 'Branch Name', 'required|trim');
		if ($this->form_validation->run() == true) 
		{
			$post['id']=$this->input->post('d_id');
            $post['name']=$this->input->post('d_name');
            $rows=$this->Login_model->addbrn($post);
			if ($rows > 0) {
				
				$this->session->set_flashdata('message', '<div class="alert alert-success rounded-0 mb-2" role="alert">
				  Successfully added a new Branch!</div>');
				  redirect('admin/ahom/brn');
			} else {
				$this->session->set_flashdata('message', '<div class="alert alert-danger rounded-0 mb-2" role="alert">
				  Failed to add new Branch!</div>');
				  redirect('admin/ahom/brn');
			  }
		}
		$this->load->view('admin/add_branch',$data1);
}
public function e_brn($id)
	{

		$data=$this->session->all_userdata();
		$data1['username']=$data;
		
        $rows=$this->Login_model->editbrn($id);
		$data1['brn']=$rows;
		
		$this->form_validation->set_rules('d_name', 'Branch Name', 'required|trim');
		if ($this->form_validation->run() == true) 
		{
			$post['name']=$this->input->post('d_name');
			$rows=$this->Login_model->editbrnn($id,$post);
			if ($rows > 0) {
				$this->session->set_flashdata('message', '<div class="alert alert-success rounded-0 mb-2" role="alert">
					Successfully Updated a Branch!</div>');
			  redirect('admin/ahom/brn');
			  } else {
				if(!empty($this->db->error()['message']))
				  $this->session->set_flashdata('message', '<div class="alert alert-danger rounded-0 mb-2" role="alert">
				  Failed to Update Branch!</div>');
				else
				  $this->session->set_flashdata('message', '<div class="alert alert-warning rounded-0 mb-2" role="alert">
				  No Changes!</div>');
			  }
		}
		$this->load->view('admin/edit_branch',$data1);
}
public function d_brn($id)
	{
		
		$this->Login_model->dellbrn($id);
		$this->session->set_flashdata('message', '<div class="alert alert-success rounded-0 mb-2" role="alert">
        Successfully deleted an Branch!</div>');
       redirect('admin/ahom/brn');
}
public function users()
	{
		$data=$this->session->all_userdata();
		$data1['username']=$data;
		$result=$this->Login_model->users();
		// $data1['usernam']=$result['0']['id'].$result['0']['branch'];
		
        $data1['users']=$result;
		$this->load->view('admin/users',$data1);
}
public function a_users($id)
	{
		$data=$this->session->all_userdata();
		$data1['username']=$data;

		$data1['id']=$id;
		
		$result=$this->Login_model->getbrn($id);
		
		$result1=$this->Login_model->getphn($id);
		$data1['number']=$result1;
		$six_digit_random_number = random_int(100000, 999999);
		$data1['usernam']="PWD".$six_digit_random_number;
		
        $this->form_validation->set_rules('u_password', 'Password', 'required|trim|min_length[6]');
		if ($this->form_validation->run() == false) {
			$this->load->view('admin/add_users',$data1);
		  } else {
			$u = $this->input->post('u_username');
			$n= $this->input->post('number');
			if ($result['branch'] != 'admin') {
			  $role_id = 2;
			} else {
			  $role_id = 1;
			}
			$rop = [
			  'username1' => $u,
			  'username'=> $n,
			  'password' => password_hash($this->input->post('u_password'), PASSWORD_DEFAULT),
			  'emp_id' => $data1['id'],
			  'role_id' => $role_id
			];
			
			$this->_addUsers($rop);
		  }
		
}
private function _addUsers($rop)
  {
    $rows=$this->Login_model->inso($rop);
   
    if ($rows > 0) {
      $this->session->set_flashdata('message', '<div class="alert alert-success rounded-0 mb-2" role="alert">
          Successfully created an account!</div>');
    } else {
      $this->session->set_flashdata('message', '<div class="alert alert-danger rounded-0 mb-2" role="alert">
        Failed to create account!</div>');
    }
    redirect('admin/ahom/users');
  }
public function e_users($uname)
	{
		
		$data=$this->session->all_userdata();
		$data1['username']=$data;
		$data1['uname']=$uname;
		$this->form_validation->set_rules('password', 'Password', 'required|trim|min_length[6]');

		if ($this->form_validation->run() == true) {

				$pass=$this->input->post('password');
				$okok=$this->Login_model->getpass($uname,$pass);
				
				if(password_verify($pass,$okok['password'])){
                    $this->session->set_flashdata('message1', '<div class="alert alert-danger rounded-0 mb-2" role="alert">
				  Old Password and Current password cant be samed..</div>');
				}
		else {

		  $post['password'] = password_hash($this->input->post('password'), PASSWORD_DEFAULT);
		  $rows=$this->Login_model->uppass($uname,$post);
          if ($rows > 0) {
			$this->session->set_flashdata('message', '<div class="alert alert-success rounded-0 mb-2" role="alert">
				Successfully Updated an Password!</div>');
		  } else {
			$this->session->set_flashdata('message', '<div class="alert alert-danger rounded-0 mb-2" role="alert">
			  Failed to Update Password!</div>');
		  }
		  redirect('admin/ahom/users');
		}
	  }
       $this->load->view('admin/edit_users',$data1);
	}
public function d_users($id)
	{
			$rows=$this->Login_model->delusers($id);
			
		if ($rows > 0) {
			$this->session->set_flashdata('message', '<div class="alert alert-success rounded-0 mb-2" role="alert">
				Successfully deleted an account!</div>');
		  } else {
			$this->session->set_flashdata('message', '<div class="alert alert-danger rounded-0 mb-2" role="alert">
			  Failed to delete account!</div>');
		  }
		 
       redirect('admin/ahom/users');
}
public function shift()
{
	$data=$this->session->all_userdata();
	$data1['username']=$data;
	$shift=$this->Login_model->getshift();
	$data1['shift']=$shift;
	$this->load->view('admin/shift',$data1);
}
public function a_shift()
{
	$data=$this->session->all_userdata();
	$data1['username']=$data;
	$rows=$this->Login_model->getshiftnum();
	$data1['s_id'] = $rows + 1;

	$this->form_validation->set_rules('s_start_h', 'Hour', 'required|trim');
    $this->form_validation->set_rules('s_start_m', 'Minutes', 'required|trim');
    $this->form_validation->set_rules('s_start_s', 'Seconds', 'required|trim');
    $this->form_validation->set_rules('s_end_h', 'Hour', 'required|trim');
    $this->form_validation->set_rules('s_end_m', 'Minutes', 'required|trim');
    $this->form_validation->set_rules('s_end_s', 'Seconds', 'required|trim');
	if ($this->form_validation->run() == true) {
		$this->_addShift();
	  }
	$this->load->view('admin/add_shift',$data1);
}

public function _addShift()
{
	  // Start Time
	  $sHour = $this->input->post('s_start_h');
	  $sMinutes = $this->input->post('s_start_m');
	  $sSeconds = $this->input->post('s_start_s');
  
	  // End Time
	  $eHour = $this->input->post('s_end_h');
	  $eMinutes = $this->input->post('s_end_m');
	  $eSeconds = $this->input->post('s_end_s');
  
	  $data = [
		'start' => $sHour . ':' . $sMinutes . ':' . $sSeconds,
		'end' => $eHour . ':' . $eMinutes . ':' . $eSeconds,
	  ];
	  
	  $rows=$this->Login_model->inshift($data);
	  
	  if ($rows > 0) {
		$this->session->set_flashdata('message', '<div class="alert alert-success rounded-0 mb-2" role="alert">
		  Successfully added a new shift!</div>');
		redirect('admin/ahom/shift');
	  } else {
		$this->session->set_flashdata('message', '<div class="alert alert-danger rounded-0 mb-2" role="alert">
		Failed to add new shift!</div>');
	  }
}
public function e_shift($id)
{
	$data=$this->session->all_userdata();
	$data1['username']=$data;
	$data1['id']=$id;
	$shift=$this->Login_model->getshiftid($id);
	
	$start = explode(':', $shift['start']);
    $end = explode(':', $shift['end']);
	
	
    $data1['s_sh'] = $start[0];
    $data1['s_sm'] = $start[1];
    $data1['s_ss'] = $start[2];
    $data1['s_eh'] = $end[0];
    $data1['s_em'] = $end[1];
    $data1['s_es'] = $end[2];
	$this->form_validation->set_rules('s_start_h', 'Shift Start Hour', 'required|trim');
    $this->form_validation->set_rules('s_start_m', 'Shift Start Minutes', 'required|trim');
    $this->form_validation->set_rules('s_start_s', 'Shift Start Seconds', 'required|trim');
    $this->form_validation->set_rules('s_end_h', 'Shift End Hour', 'required|trim');
    $this->form_validation->set_rules('s_end_m', 'Shift End Minutes', 'required|trim');
    $this->form_validation->set_rules('s_end_s', 'Shift End Seconds', 'required|trim');

    if ($this->form_validation->run() == true) {
      // Start Time
      $sHour = $this->input->post('s_start_h');
      $sMinutes = $this->input->post('s_start_m');
      $sSeconds = $this->input->post('s_start_s');

      // End Time
      $eHour = $this->input->post('s_end_h');
      $eMinutes = $this->input->post('s_end_m');
      $eSeconds = $this->input->post('s_end_s');

      $set = [
        'start' => $sHour . ':' . $sMinutes . ':' . $sSeconds,
        'end' => $eHour . ':' . $eMinutes . ':' . $eSeconds,
      ];
      
      $this->_editShift($id, $set);
    }
	$this->load->view('admin/edit_shift',$data1);
}
public function _editShift($id,$set)
{
	$rows=$this->Login_model->editss($id,$set);
	if ($rows > 0) {
		$this->session->set_flashdata('message', '<div class="alert alert-success rounded-0 mb-2" role="alert">
			Successfully Updated a Shift!</div>');
	  redirect('admin/ahom/shift');

	  } 
	  else if(!empty($this->db->error()['message'])){

		  $this->session->set_flashdata('message', '<div class="alert alert-danger rounded-0 mb-2" role="alert">
		  Failed to Update Shift!</div>');
		  redirect('admin/ahom/shift');
	  }
		else{
		  $this->session->set_flashdata('message1', '<div class="alert alert-warning rounded-0 mb-2" role="alert">
		  No Changes!</div>');
		}
	  
}
public function d_shift($id)
{
	    $this->Login_model->dellshift($id);
		$this->session->set_flashdata('message', '<div class="alert alert-success rounded-0 mb-2" role="alert">
        Successfully deleted an Shift!</div>');
       redirect('admin/ahom/shift');

}
public function report()
{    
	$data=$this->session->all_userdata();
	$data1['username']=$data;
	$allemp=$this->Login_model->getallemp($role_id='2');
	$data1['euser']=$allemp;
//    print_r($data1['euser']['0']['username']);
//    exit;
    $data1['start'] = $this->input->get('start');
    // $data1['end'] = $this->input->get('end');
    $data1['id'] = $this->input->get('id');
    $data1['attendance'] = $this->_attendanceDetails($data1['id'], $data1['start']);
	// echo "<pre>";
	// print_r($data1['attendance']);
	//    exit;
   
	$this->load->view('admin/report',$data1);
}
private function _attendanceDetails($id,$start)
  {
    if ($start == '') {
      return false;
    } elseif($id=='') {
      return $this->Login_model->get_attendance($id,$start);
    }
	else{
		return $this->Login_model->get_attendance1($id,$start);
	}
  }
  public function print($start,$id)
  {
    $data['start'] = $start;
    // $data['end'] = $end;
    $data['attendance'] = $this->Login_model->get_attendance($id,$start);
    $data['id'] = $id;

    $this->load->view('admin/print', $data);
  }

public function sreport()
{    
	$data=$this->session->all_userdata();
	$data1['username']=$data;
	$allemp=$this->Login_model->getallemp($role_id='2');
	$data1['euser']=$allemp;

    // $data1['start'] = $this->input->get('start');
   
    $data1['id'] = $this->input->get('id');
    $data1['sal'] = $this->_salDetails($data1['id']);
	// echo"<pre>";
	// print_r($data1['sal']);
	//    exit;
   
	$this->load->view('admin/salreport',$data1);
}
private function _salDetails($id)
  {
    if ($id == '') {
      return false;
    } else {
      return $this->Login_model->get_sal($id);
    }
  }
  public function prints($id)
  {
    $data['id'] = $id;
    // $data['end'] = $end;
    $data['attendance'] = $this->Login_model->get_sal($id);
   

    $this->load->view('admin/prints', $data);
  }
}
