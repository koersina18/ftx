<?php
/* Main Helper warungfotografi.com
   by. Are Fun
*/

/* Breadcrum Function */

function wf_breadcrum_admin($data)
{
	$result = array();
	foreach($data as $row){	
		($row[1] == '#' || $row[1] == '')? $url = anchor(current_url().'#',$row[0]) : $url = anchor(site_url($row[1]),$row[0]);
		$end_array = end($data);
		
		if($end_array[0] != $row[0]){
			$url = '<li>'.$url.' &raquo; </li>';
		}else{
			$url = '<li>'.$url.'</li>';
		}
		array_push($result,$url);
	}
	return implode("", $result);
}

/* END Breadcrum Function */

/* Breadcrum Function */

function front_breadcrum($data)
{
	$result = array();
	foreach($data as $row){	
		if($row[1] == '#'){ 
			$url = anchor(current_url().'#',$row[0]);
		}elseif($row[1] == ''){
			$url = $row[0];
		}else{
			$url = anchor(site_url($row[1]),$row[0]);
		}			
		
		$url = '<li>'.$url.'</li>';	
		array_push($result,$url);
	}
	return implode("", $result);
}

/* END Breadcrum Function */

/* Breadcrum Function */

function admin_breadcrum($data)
{
	$result = array();
	foreach($data as $row){	
		if($row[1] == '#'){ 
			$url = '<li><a href="#">'.$row[0].'</a></li><span class="divider">&gt;</span>';
		}elseif($row[1] == ''){
			$url = '<li class="active">'.$row[0].'</li>';
		}else{
			$url = '<li><a href="'.site_url($row[1]).'">'.$row[0].'</a></li><span class="divider">&gt;</span>';
		}			
		array_push($result,$url);
	}
	return implode("", $result);
}

/* END Breadcrum Function */

/* CMS Function  */

function display_permission($perm)
{
	$permission = array('0' => 'Private','1' => 'Public');
	return  $permission[$perm];
}

function display_publish($perm)
{
	$permission = array('0' => 'Unpublish','1' => 'Published');
	return  $permission[$perm];
}

/* END CMS Function  */

/* DATE Function */

function human_date($date) 
{
	$date = date("j F Y",strtotime($date));
	return $date;
}

function human_date_leader($date) 
{
	$date = date("d F Y",strtotime($date));
	return $date;
}

function event_date($date) 
{
	$date = date("d M",strtotime($date));
	return $date;
}

function bulan_date($date) 
{
	$date = date("F Y",strtotime($date));
	return $date;
}

function tahun_date($date) 
{
	$date = date("Y",strtotime($date));
	return $date;
}

function home_date() 
{
	$date = date("l, j F Y");
	return $date;
}

function human_date_short($date) 
{
	$date = date("d-m-Y",strtotime($date));
	return $date;
}

function human_date_mid($date) 
{
	$date = date("j M Y",strtotime($date));
	return $date;
}

function human_date_time($date) 
{
	$date = date("d-m-Y h:i:s ",strtotime($date));
	return $date;
}

function sitemap_date($date) 
{
	$date = date("Y-m-d",strtotime($date));
	$time = date("h:i:s+07:00",strtotime($date));
	return $date."T".$time;
}

function last_login_date($date) 
{
	if($date != '' && $date != '0000-00-00 00:00:00'){
		$date = date("j F Y h:i:s",strtotime($date));
	}else{
		$date = 'First Login';
	}
	return $date;
}

function human_date_full($date) 
{
	$date = date("l, j F Y",strtotime($date));
	return $date;
}

function human_date_admin($date) 
{
	$date = date("d-m-Y h:i",strtotime($date));
	return $date;
}

/* END DATE Function */


/* Permission Function */

function permission_basic_admin($session)
{
	if(!$session->userdata('logged_in')){
		$session->set_flashdata('error',true);
		$session->set_flashdata('message_flash','Access Denied');
		redirect('admin/user/login');
	}
}

function permission_admin_logged_in($session)
{
	if($session->userdata('logged_in')){
		$session->set_flashdata('error',true);
		$session->set_flashdata('message_flash','Access Denied');
		redirect('admin/home');
	}
}

function permission_super_admin($session)
{
	if($session->userdata('role') !='SA'){
		$session->set_flashdata('error',true);
		$session->set_flashdata('message_flash',"You don't have privilege to access this page");
		redirect('admin');
	}
}

function type_user($level)
{	
	if($level !=''){
		$userlevel = array(	
					"SA" => "Super Admin",
					"A" => "Administrator",
					"I" => "Auditor",
					);
		return $userlevel[$level];
	}else{
		return '';
	}
}

/* END Permission Function */

/* Paging Function */

function paging_front($row,$url,$urisegment=3,$perpage=10){
	$config = array();
	$config['base_url'] = site_url($url);
	$config['uri_segment'] = $urisegment;
	$config['total_rows'] = $row;
	$config['per_page'] = $perpage; 
	$config['first_link'] = false;
	$config['next_link'] = '<span class="linkbox">'.lang('next').'</span>';
	$config['prev_link'] = '<span class="linkbox">'.lang('prev').'</span>';
	$config['num_tag_open'] = '<span class="linkbox">';
	$config['num_tag_close'] = '</span>';
	$config['cur_tag_open'] = '<span class="linkbox">';
	$config['cur_tag_close'] = '</span>';
	return $config;
}

function paging_admin($row,$url,$uri_segment = 4,$per_page = 5){
	$config = array();
	$config['base_url'] = site_url($url);
	$config['uri_segment'] = $uri_segment;
	$config['total_rows'] = $row;
	$config['per_page'] = $per_page; 	
	$config['num_links'] = 2;
	$config['full_tag_open'] = '<div class="dataTables_paginate paging_full_numbers">';
	$config['full_tag_close'] = '</div>';
	$config['first_link'] = 'First';
	$config['last_link'] = 'Last';
	$config['next_link'] = 'Next';
	$config['prev_link'] = 'Prev';
	$config['cur_tag_open'] = '<a class="paginate_active">';
	$config['cur_tag_close'] = '</a>';
	$config['anchor_class'] = 'class="paginate_button"';
	$config['anchor_class_first'] 	= 'class="first paginate_button"';
	$config['anchor_class_next'] 	= 'class="next paginate_button"';
	$config['anchor_class_prev']	= 'class="previous paginate_button"';
	$config['anchor_class_last'] 	= 'class="last paginate_button"';
	
	return $config;
}
/* Paging Function */

/* WYSIWYG Function */

function replace_image_url($content){
	$isi=str_replace('../../','',$content);
	$isi = str_replace(' src="./images', ' src="'.base_url().'images', $isi);
	return $isi;
}

function replace_image_url2($content){
	$isi=str_replace('../','',$content);
	$isi = str_replace(' src="images', ' src="'.base_url().'images', $isi);
	return $isi;
}

/* END WYSIWYG Function */


/*Admin Error Message */
function error_success($session){
	if($session->flashdata('error')){
		return error_message($session->flashdata('message_flash'));
	}elseif($session->flashdata('confirm')){
		return succes_message($session->flashdata('message_flash'));
	}else{
		return '';
	}
}

function error_message($message){
	return '<div class="alert alert-error">
				<h4><strong>Error notification:</h4>'.$message.'
			</div>';
}

function succes_message($message){
	return '<div class="alert alert-success">
					<h4><strong>Success notification:</h4>'.$message.'
			</div>';
}

function error_success_front($session){
	if($session->flashdata('error')){
		return error_message_front($session->flashdata('message_flash'));
	}elseif($session->flashdata('confirm')){
		return succes_message_front($session->flashdata('message_flash'));
	}else{
		return '';
	}
}

function error_message_front($message){

	return '<div class="alert alert-error">
				<h4><strong>Error notification:</h4>'.$message.'
			</div>';
}

function succes_message_front($message){
	return '<div class="alert alert-success">
				<h4><strong>Success notification:</h4>'.$message.'
			</div>';
}
?>