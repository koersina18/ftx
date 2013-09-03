<?
function basic_info() {
	$CI =& get_instance();
	$data = array(
		'site_url' 		=> site_url(),	
		'base_url' 		=> base_url(),
		'css_path' 		=> base_url().'assets/css/',
		'js_path' 		=> base_url().'assets/js/',
		'images_path' 	=> base_url().'assets/images/',
		'slider_path' 	=> base_url().'assets/slide/main/',
		'slider_tpath' 	=> base_url().'assets/slide/thumbs/',
		'current_date'	=> date("Y-m-d"),
		'event_date'	=> date("m d Y"),
		'contact_email'	=> $CI->config->item('contact_email'),
		'address'	=> $CI->config->item('address'),
		'website_title'	=> $CI->config->item('website_title'),
		'meta_key'	=> $CI->config->item('meta_key'),
		'meta_desc'	=> $CI->config->item('meta_desc'),
		'facebook_page'	=> $CI->config->item('facebook_page'),
		'fb_token'	=> $CI->config->item('fb_token'),
		'twitter_account'	=> $CI->config->item('twitter_account'),
		'foto_path' 	=> base_url().'assets/foto/original/',
		'foto_tpath' 	=> base_url().'assets/foto/thumbs/',
		'front_images_path' 	=> base_url().'assets/images/',
		'testimoni_path' 	=> base_url().'assets/testimoni/original/',
		'testimoni_tpath' 	=> base_url().'assets/testimoni/thumbs/',
		'leader_path' 	=> base_url().'assets/leader/original/',
		'leader_tpath' 	=> base_url().'assets/leader/thumbs/',
		'avatar_path' 	=> base_url().'assets/avatar/',
		'avatar_tpath' 	=> base_url().'assets/avatar/thumbs/',
		'download_path' 	=> base_url().'assets/download/',
		'news_path' 	=> base_url().'assets/news/original/',
		'news_tpath' 	=> base_url().'assets/news/thumbs/',
		'news_fpath' 	=> base_url().'assets/news/front/',
	);
	return $data;
}

function admin_info() {
	$CI =& get_instance();
	$data = array(
		'site_url' 		=> site_url(),	
		'admin_url'		=> site_url()."/admin",	
		'base_url' 		=> base_url(),
		'css_path' 		=> base_url().'assets/admin/css/',
		'js_path' 		=> base_url().'assets/admin/js/',
		'tinymce_path' 	=> base_url().'assets/admin/js/tiny_mce/',
		'images_path' 	=> base_url().'assets/admin/img/',
		'foto_path' 	=> base_url().'assets/foto/original/',
		'foto_tpath' 	=> base_url().'assets/foto/thumbs/',
		'current_date'	=> date("Y-m-d"),
		'front_images_path' 	=> base_url().'assets/images/',
		'testimoni_path' 	=> base_url().'assets/testimoni/original/',
		'testimoni_tpath' 	=> base_url().'assets/testimoni/thumbs/',
		'leader_path' 	=> base_url().'assets/leader/original/',
		'leader_tpath' 	=> base_url().'assets/leader/thumbs/',
		'download_path' 	=> base_url().'assets/download/',
		'news_path' 	=> base_url().'assets/news/original/',
		'news_tpath' 	=> base_url().'assets/news/thumbs/',
		'avatar_path' 	=> base_url().'assets/avatar/',
		'avatar_tpath' 	=> base_url().'assets/avatar/thumbs/',
		'usrusername' 	=> $CI->session->userdata('username'),
		'usrname' 		=> $CI->session->userdata('nama'),
		'usravatar' 	=> $CI->session->userdata('avatar'),
		'usrlast_login' => ($CI->session->userdata('last_login') != null)? human_date_admin($CI->session->userdata('last_login')) : "First Login",
		'usrrole' 		=> type_user($CI->session->userdata('role')),
	);
	return $data;
}



?>