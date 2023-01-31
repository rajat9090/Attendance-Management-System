<?php

function is_weekends()
{
    
  date_default_timezone_set('Asia/Kolkata');
  $today = date('l', time());
  $weekends = ['Saturday', 'Sunday'];
  if (in_array($today, $weekends)) {
    return true;
  } else {
    return false;
  }
}

function is_checked_in()
{
  date_default_timezone_set('Asia/kolkata');
  $ci = get_instance();
  $username = $ci->session->userdata('username1');
  $today = date('Y-m-d', time());
  $query = "SELECT FROM_UNIXTIME(`in_time`, '%Y-%m-%d') AS `date`
              FROM `attend`
             WHERE `username` = '$username'
               AND FROM_UNIXTIME(`in_time`, '%Y-%m-%d') = '$today'
  ";
  $ci->db->query($query)->result_array();
  $rows = $ci->db->affected_rows();
  if ($rows > 0) {
    return true;
  } else {
    false;
  }
}

function is_checked_out()
{
  date_default_timezone_set('Asia/kolkata');
  $ci = get_instance();
  $username = $ci->session->userdata('username1');
  $today = date('Y-m-d', time());
  $query = "SELECT * 
                FROM `attend`
               WHERE (`out_time` != 0)
                 AND (`out_status` IS NOT NULL OR `out_status` != '')
                 AND (`username` = '$username')
                 AND (FROM_UNIXTIME(`in_time`, '%Y-%m-%d') = '$today');";
  $ci->db->query($query)->result_array();
  $rows = $ci->db->affected_rows();
  if ($rows > 0) {
    return true;
  } else {
    return false;
  }
}

function is_break_in()
{
  date_default_timezone_set('Asia/kolkata');
  $ci = get_instance();
  $username = $ci->session->userdata('username1');
  $today = date('Y-m-d', time());
  $query = "SELECT FROM_UNIXTIME(`breakin`, '%Y-%m-%d') AS `date`
              FROM `attend` 
              WHERE (`breakin` != 0)
             AND `username` = '$username'
               AND FROM_UNIXTIME(`in_time`, '%Y-%m-%d') = '$today'";
  $ci->db->query($query)->result_array();
  $rows = $ci->db->affected_rows();
  if ($rows > 0) {
    return true;
  } else {
    false;
  }
}
  function is_break_out()
{
  date_default_timezone_set('Asia/kolkata');
  $ci = get_instance();
  $username = $ci->session->userdata('username1');
  $today = date('Y-m-d', time());
  $query = "SELECT FROM_UNIXTIME(`breakout`, '%Y-%m-%d') AS `date`
              FROM `attend` 
              WHERE (`breakout` != 0)
             AND `username` = '$username'
               AND FROM_UNIXTIME(`in_time`, '%Y-%m-%d') = '$today'";
  $ci->db->query($query)->result_array();
  $rows = $ci->db->affected_rows();
  if ($rows > 0) {
    return true;
  } else {
    false;
  }
}
