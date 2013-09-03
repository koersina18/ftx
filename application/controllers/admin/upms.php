<?php

class Upms extends CI_Controller {

	function __construct()
	{
		parent::__construct();
		//permission_basic_admin($this->session);
		$this->load->library('form_validation');
		$this->form_validation->set_error_delimiters('<label>', '</label>');
		$this->load->model('upms_model');
	}
	
	function index()
	{
		$data = array();
		$data['template'] = 'upms/index';	
		$data['query'] = $this->upms_model->upms_list($this->uri->segment(4),5,true);		
		$data['page_title'] = 'upms';
		
		$this->pagination->initialize(paging_admin($this->upms_model->count(true),'admin/upms/index'));
		$data['pagination'] =  $this->pagination->create_links();
		$data['breadcrum'] = array(array("Conrol Panel",'admin'),
								   array('UPMS','admin/upms'),
								   array('List','')
						     );
		
		$data = array_merge($data,admin_info());
		$this->parser->parse('admin/index',$data);
	}
		
	function add()
	{
		$data = array(
				'id' => '',
				'namaupms' => '',
						
				);
		$data['template'] = 'upms/add_new';		
		$data['page_title'] = 'Add UPMS';		
		$data['breadcrum'] = array(array("Control Panel",'admin'),
								   array('UPMS','admin/upms'),
								   array('Add New','')
						     );
		$data['error'] = '';
		$data = array_merge($data,admin_info());
		$this->parser->parse('admin/index',$data);
	}
	
	function update()
	{
		if($this->uri->segment(4) != ''){
			$row = $this->upms_model->detail($this->uri->segment(4));
			if(isset($row->id)){
				$data = array(
						'id' => $row->id,
						'namaupms' => $row->namaupms,						
						);		
				$data['template'] = 'upms/add_new';	
				$data['page_title'] = 'Edit UPMS';						
				$data['breadcrum'] = array(array("Control Panel",'admin'),
								   array('UPMS','admin/upms'),
								   array('Edit','')
						     );
				$data['error'] = '';	
				$data = array_merge($data,admin_info());				
				$this->parser->parse('admin/index',$data);
			}else{
				$this->session->set_flashdata('error',true);
				$this->session->set_flashdata('message_flash','Data Tidak Ditemukan.');
				redirect('admin/upms','location');
			}
		}else{
			$this->session->set_flashdata('error',true);
			$this->session->set_flashdata('message_flash','Data Tidak Ditemukan.');
			redirect('admin/upms');
		}	
	}
	
	function save(){
		
		$this->form_validation->set_rules('namaupms', 'Nama UPMS', 'trim|required|min_length[1]');
		
		
		
		if ($this->form_validation->run() == TRUE){
			if($this->input->post('id') == '' ) {
				if($this->upms_model->insert()){
					$this->session->set_flashdata('confirm',true);
					$this->session->set_flashdata('message_flash','Data Tersimpan.');
					redirect('admin/upms','location');
				}else{
					$this->failed_save($this->input->post('id'),true);
				}
			} else {
				if($this->upms_model->update()){
					$this->session->set_flashdata('confirm',true);
					$this->session->set_flashdata('message_flash','Data Tersimpan.');
					redirect('admin/upms','location');
				}else{
					$this->failed_save($this->input->post('id'),true);
				}
			}
		}else{
			$this->failed_save($this->input->post('id'));
		}	
	}
	
	function failed_save($id,$image=false)
	{
		$data = $this->input->post();
		$data['template'] = 'upms/add_new';	
				
		$data['error'] = validation_errors();
		if($image) $data['error'] .= $this->upms_model->error_message;
		
		if($id==''){
			$data['page_title'] = 'Add UPMS';		
			$data['breadcrum'] = array(array("Control Panel",'admin'),
								   array('UPMS','admin/upms'),
								   array('Add New','')
						     );
		}else{
			$data['page_title'] = 'Edit UPMS';		
			$data['breadcrum'] = array(array("Control Panel",'admin'),
								   array('UPMS','admin/upms'),
								   array('Edit','')
						     );
		}
							 
		$data = array_merge($data,admin_info());
		$this->parser->parse('admin/index',$data);
		
	}
	
	function delete(){
		$this->upms_model->delete($this->uri->segment(4));
			
		$this->session->set_flashdata('confirm',true);
		$this->session->set_flashdata('message_flash','Data Berhasil Dihapus.');
		redirect('admin/upms/','location');
	}
		
	function publish()
	{
		$this->upms_model->publish($this->uri->segment(4));
				
		$this->session->set_flashdata('confirm',true);
		$this->session->set_flashdata('message_flash','UPMS Berhasil di Publish.');
		redirect('admin/upms','location');
	
	}
	
	function unpublish()
	{	
		$this->upms_model->unpublish($this->uri->segment(4));
				
		$this->session->set_flashdata('confirm',true);
		$this->session->set_flashdata('message_flash','UPMS Berhasil di Unpublish.');
		redirect('admin/upms','location');
	}
	
}

/* End of file welcome.php */
/* Location: ./system/application/controllers/welcome.php */
?>