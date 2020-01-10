<?php 
	defined('BASEPATH') OR exit('direct script access not allowed');
	
	class Agent extends CI_Controller
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

		public function agent_details()
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
			}
			$data['flash']['active'] = $this->session->flashdata('active');
	    	$data['flash']['title'] = $this->session->flashdata('title');
	    	$data['flash']['text'] = $this->session->flashdata('text');
	    	$data['flash']['type'] = $this->session->flashdata('type');
			$data['page'] = 'publication';
			// $data['committee_details'] = $this->Home_model->fetch_details('comm_soc_id IN (0,'.$data['user']['soc_id'].')','rs_committee');
			$data['agents_details'] = $this->Home_model->fetch_details('ag_isDelete=0 and ag_com_id='.$data['user']['com_id'].'','ad_agent');
			$data['company_details'] = $this->Home_model->fetch_details('com_createdby='.$data['user']['com_id'].' AND  com_isDelete=0','ad_company');
			$this->load->view('Home/header',$data);
			$this->load->view('Agent/agent_details',$data);
			$this->load->view('Agent/agent_footer',$data);
		}

		public function register_agent()
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
			}

			$data['state_details'] = $this->Home_model->fetch_details('','ad_state');
			$data['city_details'] = $this->Home_model->fetch_details('','ad_cities');
			$data['page'] = 'publication';
			$data['company_details'] = $this->Home_model->fetch_details('com_createdby='.$data['user']['com_id'].' AND  com_isDelete=0','ad_company');
			$this->load->view('Home/header',$data);
			$this->load->view('Agent/new_agent',$data);
			$this->load->view('Agent/agent_footer',$data);
		}
		public function new_agent()
		{
			if(isset($this->session->userdata['mainAdmin'])){
				$data['user'] = $this->session->userdata('mainAdmin');
			}elseif(isset($this->session->userdata['comAdmin'])){
				$data['user'] = $this->session->userdata('comAdmin');
			}elseif(isset($this->session->userdata['prjHead'])){
				$data['user'] = $this->session->userdata('prjHead');
			}elseif(isset($this->session->userdata['pubIncharge'])){
				$data['user'] = $this->session->userdata('pubIncharge');
			}elseif(isset($this->session->userdata['offExe'])){
				$data['user'] = $this->session->userdata('offExe');
			}elseif(isset($this->session->userdata['comAdmin'])){
				$data['user'] = $this->session->userdata('comAdmin');
			}
			
			$agent['ag_type'] = $this->input->post('ag_type');
			$agent['ag_name'] = $this->input->post('ag_name');
			$agent['ag_email'] = $this->input->post('ag_email');
			$agent['ag_contact'] = $this->input->post('ag_contact');
			$agent['ag_country'] = 101;
			$agent['ag_state'] = $this->input->post('ag_state');
			$agent['ag_city'] = $this->input->post('ag_city');
			$agent['ag_address'] = $this->input->post('ag_address');
			$agent['ag_pincode'] = $this->input->post('ag_pincode');
			$agent['ag_createdby'] = $data['user']['id'];
			$agent['ag_com_id'] = $data['user']['com_id'];

			$this->Home_model->insert_records('ad_agent',$agent);
			// $id= $this->db->insert_id();

			$this->session->set_flashdata('active',1);
		    $this->session->set_flashdata('title',"Thank You.");
		    $this->session->set_flashdata('text',"Record has been created."); 
		    $this->session->set_flashdata('type',"success");
			redirect('agent');
		}

		public function disable_agent()
		{
			$ag_id = $_POST['ag_id'];
			// echo $com_id;
			$data= $this->Home_model->update_records('ag_id='.$ag_id.'','ad_agent',array('ag_isDelete'=>1));
			$this->session->set_flashdata('active',1);
		    $this->session->set_flashdata('title',"Thank You.");
		    $this->session->set_flashdata('text',"User has been Deleted"); 
		    $this->session->set_flashdata('type',"success");
			redirect('user');
		}

		public function update_agent_user(){
			$ag_id = $this->uri->segment(2);
			$this->session->set_userdata('updateAgent',$ag_id);
			redirect('updateAgentRecord');
		}

		public function update_agent()
		{if(isset($this->session->userdata['mainAdmin'])){
				$data['user'] = $this->session->userdata('mainAdmin');
			}elseif(isset($this->session->userdata['comAdmin'])){
				$data['user'] = $this->session->userdata('comAdmin');
			}elseif(isset($this->session->userdata['prjHead'])){
				$data['user'] = $this->session->userdata('prjHead');
			}elseif(isset($this->session->userdata['pubIncharge'])){
				$data['user'] = $this->session->userdata('pubIncharge');
			}elseif(isset($this->session->userdata['offExe'])){
				$data['user'] = $this->session->userdata('offExe');
			}elseif(isset($this->session->userdata['comAdmin'])){
				$data['user'] = $this->session->userdata('comAdmin');
			}

			$data['agent_details'] = $this->Home_model->fetch_details('ag_id='.$this->session->userdata('updateAgent').' AND  ag_isDelete=0','ad_agent');
			$data['state_details'] = $this->Home_model->fetch_details('','ad_state');
			$data['city_details'] = $this->Home_model->fetch_details('','ad_cities');
			$where = 'ct_id IN (2763,5742)';
			$data['state'] = '22';
			$data['page'] = 'User';
			$this->load->view('Home/header',$data);
			$this->load->view('Agent/update_agent',$data);
			$this->load->view('Agent/agent_footer',$data);
		}
		public function update_save_agent()
		{
			if(isset($this->session->userdata['mainAdmin'])){
				$data['user'] = $this->session->userdata('mainAdmin');
			}elseif(isset($this->session->userdata['comAdmin'])){
				$data['user'] = $this->session->userdata('comAdmin');
			}elseif(isset($this->session->userdata['prjHead'])){
				$data['user'] = $this->session->userdata('prjHead');
			}elseif(isset($this->session->userdata['pubIncharge'])){
				$data['user'] = $this->session->userdata('pubIncharge');
			}elseif(isset($this->session->userdata['offExe'])){
				$data['user'] = $this->session->userdata('offExe');
			}elseif(isset($this->session->userdata['comAdmin'])){
				$data['user'] = $this->session->userdata('comAdmin');
			}
			
			$ag_id = $this->input->post('ag_id');
			$agent['ag_type'] = $this->input->post('ag_type');
			$agent['ag_name'] = $this->input->post('ag_name');
			$agent['ag_email'] = $this->input->post('ag_email');
			$agent['ag_contact'] = $this->input->post('ag_contact');
			$agent['ag_country'] = 101;
			$agent['ag_state'] = $this->input->post('ag_state');
			$agent['ag_city'] = $this->input->post('ag_city');
			$agent['ag_address'] = $this->input->post('ag_address');
			$agent['ag_pincode'] = $this->input->post('ag_pincode');
			
			$this->Home_model->update_records(array('ag_id'=>$ag_id),'ad_agent',$agent);
			$this->session->set_flashdata('active',1);
	        $this->session->set_flashdata('title',"Thank You.");
	        $this->session->set_flashdata('text',"Agent has been updated successfully."); 
	        $this->session->set_flashdata('type',"success");
			redirect('agent');
		}
	}
?>