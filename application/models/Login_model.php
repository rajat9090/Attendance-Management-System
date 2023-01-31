<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login_model extends CI_Model {
	
	public function getbyusername($username)
    {
        $this->db->where('username',$username);
        $admin=$this->db->get('register')->row_array();
        return $admin;
    }
    public function getbr()
    {
        $admin=$this->db->get('branch')->result_array();
        return $admin;
    }
    public function getloc()
    {
        $admin=$this->db->get('location')->result_array();
        return $admin;
    }
    public function checkemail($email)
    {
        $this->db->where('email',$email);
        $admin=$this->db->get('employee')->num_rows();
        return $admin;
    }
    public function insemp($post)
    {
        $admin=$this->db->insert('employee',$post);
        return $admin;
    }
    public function getemp($email)
    {
        $this->db->where('email',$email);
        $admin=$this->db->get('employee')->row_array();
        return $admin;
    }
    public function insempbr($d)
    {
        return $this->db->insert('employee_branch', $d);
         
    }
    public function insalary($salary)
    {
        return $this->db->insert('salary', $salary);
         
    }
    public function allemp()
    {
        return $this->db->get('employee')->result_array();
         
    }
    public function singemp($e_id)
    {
        $this->db->where('id',$e_id);
        return $this->db->get('employee')->row_array();
         
    }
    public function getemps($e_id)
    {
        $this->db->where('id',$e_id);
        return $this->db->get('employee')->row_array();
         
    }
    public function getsal($e_id)
    {
        $this->db->where('emp_id',$e_id);
        return $this->db->get('salary')->result_array();
         
    }
    public function addsal($salary)
    {
        $admin=$this->db->insert('salary',$salary);
        return $admin;
    }
    public function feditemp($e_id,$post)
    {
        $this->db->where('id',$e_id);
         $this->db->update('employee',$post);
         echo $this->db->last_query();
        return $this->db->affected_rows();
         
    }
    public function upbranch($e_id,$d)
    {
        $this->db->where('emp_id',$e_id);
         $this->db->update('employee_branch',$d);
          echo $this->db->last_query();
        return $this->db->affected_rows();
    }
    public function deleb($e_id)
    {
        $this->db->where('emp_id',$e_id);
        return $this->db->delete('employee_branch');
         
    }
    public function delemp($e_id)
    {
        $this->db->where('id',$e_id);
        return $this->db->delete('employee');
         
    }
    public function addloc($post)
    {
        return $this->db->insert('location',$post);
    }
    public function loc()
    {
        return $this->db->get('location')->result_array();
    }
    public function editloc($id)
    {
        $this->db->where('id',$id);
        return $this->db->get('location')->row_array();
    }
    public function editlocc($id,$post)
    {
        $this->db->where('id',$id); 
        $this->db->update('location',$post);
        return $this->db->affected_rows();
         
    }
    public function delloc($id)
    {
        $this->db->where('id',$id);
        return $this->db->delete('location');
         
    }
    public function brn()
    {
        return $this->db->get('branch')->result_array();
    }
    public function addbrn($post)
    {
        return $this->db->insert('branch',$post);
    }
    public function editbrn($id)
    {
        $this->db->where('id',$id);
        return $this->db->get('branch')->row_array();
    }
    public function editbrnn($id,$post)
    {
        $this->db->where('id',$id);
        $this->db->update('branch',$post);
        return $this->db->affected_rows();
         
    }
    public function dellbrn($id)
    {
        $this->db->where('id',$id);
        return $this->db->delete('branch');
         
    }
    public function users()
    {
        $this->db->select('employee.id,branch,name,register.username as uname');
        $this->db->join('register','register.emp_id=employee.id','left');
        $user=$this->db->get('employee')->result_array();
        // echo $this->db->last_query();
        return $user;
        
    }
    public function getbrn($id)
    {
        $this->db->select('employee.branch');
        $this->db->where('id',$id);
        return $this->db->get('employee')->row_array();

    }
    public function inso($rop)
    {
        $this->db->insert('register',$rop);
        return $this->db->affected_rows();
        
    }
    public function uppass($uname,$post)
    {
        $this->db->where('username',$uname);
        $this->db->update('register',$post);
        return $this->db->affected_rows();
         
    }
    public function getpass($uname)
    {
        $this->db->select('register.password');
        $this->db->where('username',$uname);
        return $this->db->get('register')->row_array();
    }
    public function countbrn()
    {
        return $this->db->count_all('branch');
    }
    public function countloc()
    {
        return $this->db->count_all('location');
    }
    public function countstaff()
    {
        return $this->db->count_all('employee');
    }
    public function countusers($role_id)
    {
        $this->db->where('role_id',$role_id);
        return $this->db->get('register')->num_rows();
    }
    public function cbs()
    {
        $this->db->select('employee_branch.brn_id as b_id,count(emp_id) as qty');
        $this->db->group_by('b_id'); 
        $qry=$this->db->get('employee_branch')->result_array();
        // echo $this->db->last_query();
        return $qry;
    }
    public function cls()
    {
        $this->db->select('location.name as lname,count(employee.location) as gty');
        $this->db->join('employee','location.id=employee.location','inner');
        $this->db->group_by('location.name'); 
        $qry=$this->db->get('location')->result_array();
        // echo $this->db->last_query();
        return $qry;
    }
    public function getshift()
    {
        return $this->db->get('shift')->result_array();

    }
    public function getshiftnum()
    {
        return $this->db->get('shift')->num_rows();

    }
    public function inshift($data)
    {
        $this->db->insert('shift',$data);
         $this->db->insert_id();
         return $this->db->affected_rows();

    }
    public function getshiftid($id)
    {
        $this->db->where('id',$id);
        return $this->db->get('shift')->row_array();

    }
    public function editss($id,$set)
    {
        $this->db->where('id',$id);
        $this->db->update('shift',$set);
        return $this->db->affected_rows();

    }
    public function dellshift($id)
    {
        $this->db->where('id',$id);
        return $this->db->delete('shift');
         
    }
    public function delusers($id)
    {
        $this->db->delete('register', array('emp_id' => $id)); 
        $this->db->delete('employee_branch', array('emp_id' => $id));
        $this->db->delete('employee', array('id' => $id));
       
       echo $this->db->last_query();
       return $this->db->affected_rows();

    }
    public function getallemp($role_id)
    {
        $this->db->where('role_id',$role_id);
        return $this->db->get('register')->result_array();
         
    }
    public function get_attendance($id,$start)
   {
    $this->db->select('employee.name,attend.*,shift.start,end');
    $this->db->where("DATE(FROM_UNIXTIME(`attend`.`in_time`,'%Y-%m-%d')) BETWEEN '$start-01' AND '$start-31'");
    // $this->db->where('attend.username',$id);
    // $this->db->or_where('attend.username',$id);
    
    $this->db->order_by("in_time","desc");
    $this->db->join('shift','attend.shift_id=shift.id','inner');
    $this->db->join('employee','attend.emp_id=employee.id','inner');
    
   $okok=$this->db->get('attend')->result_array();
//    echo $this->db->last_query();
   return $okok;
}
public function get_attendance1($id,$start)
   {
    $this->db->select('employee.name,attend.*,shift.start,end');
    $this->db->where("DATE(FROM_UNIXTIME(`attend`.`in_time`,'%Y-%m-%d')) BETWEEN '$start-01' AND '$start-31'");
    $this->db->where('attend.username',$id);
   
    $this->db->order_by("in_time","desc");
    $this->db->join('shift','attend.shift_id=shift.id','inner');
    $this->db->join('employee','attend.emp_id=employee.id','inner');
    
   $okok=$this->db->get('attend')->result_array();
//    echo $this->db->last_query();
   return $okok;
}
public function get_sal($id)
   {
    $this->db->select('employee.name,salary.*');
    $this->db->where('salary.username',$id);
    $this->db->order_by("time","desc");
    $this->db->join('employee','salary.emp_id=employee.id','inner');
    
   $okok=$this->db->get('salary')->result_array();
//    echo $this->db->last_query();
   return $okok;
}
public function getphn($id)
{
    $this->db->select('employee.number');
    $this->db->where('id',$id);
    return $this->db->get('employee')->row_array();

}
public function fusername1($e_id)
{
    $this->db->select('register.username1');
    $this->db->where('emp_id',$e_id);
    return $this->db->get('register')->row_array();

}
public function sall($e_id)
{
    $this->db->select('salary.salary');
    $this->db->where('emp_id',$e_id);
    return $this->db->get('salary')->result_array();

}
}?>