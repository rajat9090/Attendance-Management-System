<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Uhom extends CI_Controller {
public function __construct()
{
	parent::__construct();
	$this->load->helper('common_helper');
	is_weekends();
    is_checked_in();
	is_break_in();
    is_checked_out();
	$this->load->library('form_validation');
    $this->load->model('User_model');
    $user1=$this->session->all_userdata();
	$user=$this->session->userdata('username');
	// if(empty($user))
	// {	
    //  redirect(base_url().'login/index');
	// }
	$roleid=$user1['role_id'];
	if($roleid=='2')
	{	
     
	}
	else{
		redirect(base_url().'login');
	}
	
}
public function index()
	{
		$data=$this->session->all_userdata();
		$id=$data['emp_id'];
		$profile=$this->User_model->getdata($id);
		$data1['pro']=$profile;
		$this->load->view('user/profile',$data1);
	}

	public function profile()
	{
		$data=$this->session->all_userdata();
		
		$id=$data['emp_id'];
		$profile=$this->User_model->getdata($id);
		$data1['pro']=$profile;
		$this->load->view('user/profile',$data1);
	}
	
	public function attend()
	{
		$data=$this->session->all_userdata();
		$id=$data['emp_id'];
		
		$profile=$this->User_model->getdata($id);
		
		$data1['pro']=$profile;
		
		if (is_weekends() == true) {
			$data1['weekends'] = true;
			$this->load->view('user/attendence',$data1);
		} else {
			$data1['in'] = true;
			$data1['weekends'] = false;
			// If haven't Time In Today
			if (is_checked_in() == false) {
			  $data1['in'] = false;

			  $this->form_validation->set_rules('work_shift', 'Work Shift', 'required|trim');
			  $this->form_validation->set_rules('work_location', 'Location', 'required|trim');
			  if ($this->form_validation->run() == false) {
			  $all=$this->User_model->getall($id);
			//   print_r($all);
			//   exit;
		      $data1['all']=$all;
		   
              $this->load->view('user/attendence',$data1);

			  } else {
			  date_default_timezone_set('Asia/Kolkata');
			  $shiftid=$this->User_model->getshiftid($id);
		      $s1=$shiftid['shift'];
		      $shift=$this->User_model->getshiftt($s1);
			  $startTime = $shift['start'];
	            
				
				$username = $data['username'];
				
				$emp_id = $data['emp_id'];
				
				$branch_id = $profile['branch'];
				// print_r($branch_id);
				// exit;
				$shift_id = $this->input->post('work_shift');
				$location_id = $this->input->post('work_location');
				
				$iTime = time();
				
	$ok=date('H:i:s', $iTime);
	$start = strtotime($ok);
    $end = strtotime($startTime);
	 
	$min = intval(($end - $start)/60);
     
	  $top= '0'.floor($min/60).':'.($min -   floor($min/60) * 60).':'.($min%60);
	  $min1 = intval(($start - $end)/60);
	  $top1= '0'.floor($min1/60).':'.($min1 -   floor($min1/60) * 60).':'.($min1%60);
    // Time Out Time
    if ($ok < $startTime) {
      $inStatus = 'Before Time'.' '.$top;
	}
	  else if ($ok== $startTime) {
		$inStatus = 'On Time'.' '.$top1;
    } else {
      $inStatus = 'Late'.' '.$top1;
    };
	  
				
					$value = [
					  'username' => $username,
					  'emp_id' => $id,
					  'brn_id' => $branch_id,
					  'shift_id' => $shift_id,
					  'loc_id' => $location_id,
					  'in_time' => $iTime,
					  'in_status' => $inStatus
					];
					// print_r($value);
					// exit;
				$this->_checkIn($value);
			  
			}
		}
			// End of Today Time In
			// If Checked In
			
			else{
			  if (is_checked_out() == true) {
				$data1['disable'] = true;
			  } else {
				$data1['disable'] = false;
				
			  };
			 if (is_break_in()==false){
				$data1['ok'] = false;
			  } else {
				$data1['ok'] = true;
				
			  };
			  if (is_break_out()==false){
				$data1['okk'] = false;
			  } else {
				$data1['okk'] = true;
				
			  };
			  
			//   $iTime = time();
			//   $attend1=$this->User_model->ts($id,$iTime);
			//   $data1['attend']=$attend1;
			//   print_r($attend1);
			  // exit;
				$this->load->view('user/attendence',$data1);
			  
			}
			
		  }
		 
			
	}
	private function _checkIn($value)
  {
	$rows=$this->User_model->insattend($value);
     if ($rows > 0) {
      $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
                                     Stamped attendance for today</div>');
    } else {
      $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">
                                     Failed to stamp your attendance!</div>');

    }
    redirect('user/uhom/attend');
  }
	
  public function checkout()
  {
	$data=$this->session->all_userdata();
	$username=$data['username'];
	 $id=$data['emp_id'];
	$profile=$this->User_model->getdata($id);
	$data1['pro']=$profile;

    $today = date('Y-m-d', time());
	
	$checkOut=$this->User_model->getattend($username,$today);
   
    $oTime = time();
	
	$ok=date('H:i:s', $oTime);
	
	$start = strtotime($ok);
	
    $end = strtotime($checkOut['end']);
	
	$min = intval(($end - $start)/60);
     
	  $top= '0'.floor($min/60).':'.($min -   floor($min/60) * 60).':'.($min%60);
	 
	 
	  $minn = intval(($start - $end)/60);
	//   print_r($minn);
	//   echo"<br>";
	  $top1= '0'.floor($minn/60).':'.($minn -   floor($minn/60) * 60).':'.($minn%60);
	  
    // Time Out Time
    if ($ok > $checkOut['end']) {
      $outStatus = 'Over Time'.' '.$top1;
	}
	  else if ($ok== $checkOut['end']) {
		$outStatus = 'On Time'.' '.$top;
    } else {
      $outStatus = 'Early'.' '.$top;
    };
	
    $value = [
      'out_time' => $oTime,
      'out_status' => $outStatus
    ];
	$this->User_model->upchkout($username,$value,$today);
   
	redirect('user/uhom/attend');
  }
  public function breakin(){
	$data=$this->session->all_userdata();
	$username=$data['username'];
	$bTime = time();
	$today = date('Y-m-d', time());
	$value = [
		'breakin' => $bTime,
		
	  ];
	$this->User_model->upbrkin($username,$today,$value);
	redirect('user/uhom/attend');
  }
  public function breakout(){
	$data=$this->session->all_userdata();
	$username=$data['username'];
	$boTime = time();
	$today = date('Y-m-d', time());
	$value = [
		'breakout' => $boTime,
		
	  ];
	$this->User_model->upbrkout($username,$today,$value);
	redirect('user/uhom/attend');
  }
  public function history()
	{
		$data=$this->session->all_userdata();
		$id=$data['emp_id'];
		$profile=$this->User_model->getdata($id);
		$data1['pro']=$profile;
		$data1['data'] = $this->attendance_details_data($id);
		// echo"<pre>";
		// print_r($data1['data']);
		// exit;
		$this->load->view('user/history',$data1);
	}

  private function attendance_details_data($id)
  {
	
		$start = $this->input->get('start');
		// $end = $this->input->get('end');
	
    $data1['attendance'] = $this->User_model->get_emp_attendance($id, $start);


    $data1['start'] = $start;
	
    // $data1['end'] = $end;
	
    return $data1;
  
}
public function salary()
	{
		$data=$this->session->all_userdata();
		$id=$data['emp_id'];
		$profile=$this->User_model->getdata($id);
		$allemp=$this->User_model->getallemp($role_id='2',$id);
		$data1['username']=$allemp;
		$data1['pro']=$profile;
		$data1['id'] = $this->input->get('unam');
		
        $data1['sal'] = $this->_salDetails($data1['id']);
		
		
		$this->load->view('user/salary',$data1);
	
	}
	private function _salDetails($id)
  {
    if ($id == '') {
      return false;
    } else {
      return $this->User_model->get_sal($id);
    }
  }

}