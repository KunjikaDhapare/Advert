<?php 
	defined('BASEPATH') OR exit('direct script access not allowed');
	
	class Client extends CI_Controller
	{		
		function __construct()
		{
			parent::__construct();
			if(isset($this->session->userdata['mainAdmin'])){
				$data['user'] = $this->session->userdata('mainAdmin');
			}elseif(isset($this->session->userdata['comAdmin'])){
				$data['user'] = $this->session->userdata('comAdmin');
			}elseif(isset($this->session->userdata['prjHead'])){
				$data['user'] = $this->session->userdata('prjHead');
			}elseif(isset($this->session->userdata['pubIncharge'])){
				$data['user'] = $this->session->userdata('pubIncharge');
			}			elseif(isset($this->session->userdata['offExe'])){
				$data['user'] = $this->session->userdata('offExe');
			}elseif(isset($this->session->userdata['comAdmin'])){
				$data['user'] = $this->session->userdata('comAdmin');
			}else{
				redirect('/');				
			}
		}

		public function client_details()
		{
			if(isset($this->session->userdata['mainAdmin'])){
				$data['user'] = $this->session->userdata('mainAdmin');
			}elseif(isset($this->session->userdata['comAdmin'])){
				$data['user'] = $this->session->userdata('comAdmin');
			}elseif(isset($this->session->userdata['prjHead'])){
				$data['user'] = $this->session->userdata('prjHead');
			}elseif(isset($this->session->userdata['pubIncharge'])){
				$data['user'] = $this->session->userdata('pubIncharge');
			}			elseif(isset($this->session->userdata['offExe'])){
				$data['user'] = $this->session->userdata('offExe');
			}elseif(isset($this->session->userdata['comAdmin'])){
				$data['user'] = $this->session->userdata('comAdmin');
			}else{
				redirect('/');				
			}
			$data['flash']['active'] = $this->session->flashdata('active');
	    	$data['flash']['title'] = $this->session->flashdata('title');
	    	$data['flash']['text'] = $this->session->flashdata('text');
	    	$data['flash']['type'] = $this->session->flashdata('type');
			$data['page'] = 'publication';
			// $data['committee_details'] = $this->Home_model->fetch_details('comm_soc_id IN (0,'.$data['user']['soc_id'].')','rs_committee');
			// $data['member_details'] = $this->Home_model->fetch_details('member_soc_id='.$data['user']['soc_id'].' AND member_role_id != 2 AND member_name !="" AND member_is_deactive=0','rs_member');
			$this->load->view('Home/header',$data);
			$this->load->view('Client/client_details',$data);
			$this->load->view('Client/client_footer',$data);
		}

		public function register_client()
		{
			if(isset($this->session->userdata['mainAdmin'])){
				$data['user'] = $this->session->userdata('mainAdmin');
			}elseif(isset($this->session->userdata['comAdmin'])){
				$data['user'] = $this->session->userdata('comAdmin');
			}elseif(isset($this->session->userdata['prjHead'])){
				$data['user'] = $this->session->userdata('prjHead');
			}elseif(isset($this->session->userdata['pubIncharge'])){
				$data['user'] = $this->session->userdata('pubIncharge');
			}			elseif(isset($this->session->userdata['offExe'])){
				$data['user'] = $this->session->userdata('offExe');
			}elseif(isset($this->session->userdata['comAdmin'])){
				$data['user'] = $this->session->userdata('comAdmin');
			}else{
				redirect('/');				
			}
			$data['page'] = 'publication';
			$this->load->view('Home/header',$data);
			$this->load->view('Client/new_client',$data);
			$this->load->view('Client/client_footer',$data);
		}
	}
?>