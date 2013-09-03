<?php
class Upms_model extends CI_Model {

    var $namaupms  	= '';    
    
  

    function __construct()
    {
        parent::__construct();
		//$this->config->set_item('upms_home',$this->upms_home());
    }
	
	function count($admin = false)
	{
        if($admin == false) $this->db->where('publish',1);
		$this->db->from('upms');
		$query = $this->db->count_all_results();
        return $query;
	}
	
	function insert()
    {	
		$this->namaupms   = $_POST['namaupms']; 
		       		
		if($this->db->insert('upms', $this)){
			//var_dump($this);
			//exit();
			return true;
		}else{	
			$this->error_message = "Penyimpanan Gagal";
			return false;
		}
    }

    function update()
    {
        $this->namaupms   	= $_POST['namaupms']; 
		
		
		if($this->db->update('upms', $this, array('id' => $_POST['id']))){
			return true;
		}else{
			$this->error_message = "Penyimpanan Gagal";
			return false;
		}
    }
	
	function delete($id)
    {
		$this->db->where('id',$id);
		$this->db->delete('upms');
    }
	
	function upms_list($limit,$offset,$admin = false)
    {
		if($admin === false) $this->db->select('id,namaupms');		
		$this->db->order_by('id','DESC');
		($limit == '')?	$this->db->limit($offset,0) : $this->db->limit($offset,$limit);
		$query = $this->db->get('upms'); 	
		return ($admin === false)? $query->result_array() : $query->result();
    }
	
	function upms_home()
    {
		/*$this->db->where('publish',1);
		//$this->db->where('tanggal >=',date('Y-m-d'));
		$this->db->order_by('id','DESC');
		$query = $this->db->get('upms');	
		$data = array();
		foreach($query->result() as $row){
			$data[] = array('evid' => $row->id,
							'evtanggal' => $row->tanggal,
							'evtimetgl' => human_date($row->tanggal),
							'evjam' => $row->jam,
							'evnamaupms' => $row->namaupms,
							'evdetail' => character_limiter(strip_tags($row->detail),30),
							);
		}
		return $data; */       
    }
	
	function upms_dashboard()
    {
		$this->db->where('publish',1);
		$this->db->where('tanggal >=',date('Y-m-d'));
		$this->db->order_by('tanggal','ASC');
		$query = $this->db->get('upms');	
		$data = array();
		foreach($query->result() as $row){
			$data[] = array('evid' => $row->id,
							'evtanggal' => $row->tanggal,
							'evsampai' => $row->sampai,
							'evdate' => upms_date($row->tanggal),
							'evbulan' => bulan_date($row->tanggal),
							'evjam' => $row->jam,
							'evlokasi' => $row->lokasi,
							'evnamaupms' => $row->namaupms,
							'evdetail' => character_limiter(strip_tags($row->detail),100),
							);
		}
		return $data;        
    }

	
	function detail($id)
    {
		$this->db->where('id',$id);
		$query = $this->db->get('upms');
        return $query->row();
    }
		
	
	function publish($id)
	{
		$this->db->where('id',$id);
		$this->db->update('upms',array('active' => 1));
	}
	
	function unpublish($id)
	{
		$this->db->where('id',$id);
		$this->db->update('upms',array('active' => 0));
	}
}

?>