<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User_model extends CI_Model {
	
	public function getdata($id)
    {
        $this->db->select('employee.*,register.username1 as unam');
        $this->db->join('register','employee.id=register.emp_id','left');
        $this->db->where('employee.id',$id);
        $admin=$this->db->get('employee')->row_array();
        //  echo $this->db->last_query();
        return $admin;
    }

    public function getloc()
   {
    return $this->db->get('location')->result_array();
   }
   public function getshiftid($id)
   {
    $this->db->select('employee.shift');
    $this->db->where('id',$id);
    return $this->db->get('employee')->row_array();
   }
   public function getshiftt($s1)
   {
    $this->db->where('id',$s1);
    return $this->db->get('shift')->row_array();
   }
   public function getall($id)
   {
    
    $this->db->select('location.id as lid,location.name as lnam,shift.*');
    $this->db->where('employee.id',$id);
    $this->db->join('location','location.id=employee.location','inner');
    $this->db->join('shift','shift.id=employee.shift','inner');
    $data=$this->db->get('employee')->row_array();
    // $this->db->last_query();
    return $data;
   }

   public function insattend($value)
   {
    $this->db->insert('attend',$value);
    return $this->db->affected_rows();
   }
   public function getattend($username,$today)
   {

   
    $this->db->select('attend.username,emp_id,shift_id,in_time,shift.start,end');
    
    $this->db->where('attend.username',$username);
    $this->db->where("FROM_UNIXTIME(`attend`.`in_time`,'%Y-%m-%d')",$today);
    
    $this->db->join('shift','attend.shift_id=shift.id','inner');
    
   $okok=$this->db->get('attend')->row_array();
//    echo $this->db->last_query();
   return $okok;
   }

   public function upchkout($username,$value,$today)
   {
    $this->db->where('username',$username);
    $this->db->where("FROM_UNIXTIME(`attend`.`in_time`,'%Y-%m-%d')",$today);
    return $this->db->update('attend',$value);
   }
   public function get_emp_attendance($id,$start)
   {
    $this->db->select('employee.name,attend.*,shift.start,end');
    $this->db->where('attend.emp_id',$id);
    $this->db->where("DATE(FROM_UNIXTIME(`attend`.`in_time`,'%Y-%m-%d')) BETWEEN '$start-01' AND '$start-31'");
    $this->db->order_by("in_time","desc");
    $this->db->join('shift','attend.shift_id=shift.id','inner');
    $this->db->join('employee','attend.emp_id=employee.id','inner');
    
   $okok=$this->db->get('attend')->result_array();
//    echo $this->db->last_query();
   return $okok;
}

public function ts($id,$iTime)
{
    $this->db->where('emp_id',$id);
    $this->db->where('in_time',$iTime);
    return $this->db->get('attend')->row_array();
}
public function ats($id,$iTime)
{
    $this->db->where('emp_id',$id);
    $this->db->where('in_time',$iTime);
    return $this->db->get('attend')->row_array();
}
public function aats($id,$iTime)
{
    $this->db->where('emp_id',$id);
    $this->db->where('in_time',$iTime);
    return $this->db->get('attend')->row_array();
}
public function getallemp($role_id,$id)
{
    $this->db->where('role_id',$role_id);
    $this->db->where('emp_id',$id);
    return $this->db->get('register')->row_array();
     
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
public function upbrkin($username,$today,$value)
   {
    $this->db->where('username',$username);
    $this->db->where("FROM_UNIXTIME(`attend`.`in_time`,'%Y-%m-%d')",$today);
    return $this->db->update('attend',$value);
   }
   public function upbrkout($username,$today,$value)
   {
    $this->db->where('username',$username);
    $this->db->where("FROM_UNIXTIME(`attend`.`in_time`,'%Y-%m-%d')",$today);
    return $this->db->update('attend',$value);
   }

}
