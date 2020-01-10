<?php 
	defined('BASEPATH') OR exit('direct script access not allowed');
	
	class Company extends CI_Controller
	{		
		function __construct()
		{
			parent::__construct();
			if(isset($this->session->userdata['mainAdmin'])){
				$data['user'] = $this->session->userdata('mainAdmin');
			}elseif(isset($this->session->userdata['comAdmin'])){
				$data['user'] = $this->session->userdata('comAdmin');
			}else{
				redirect('/');				
			}
		}

		public function company_details()
		{
			if(isset($this->session->userdata['mainAdmin'])){
				$data['user'] = $this->session->userdata('mainAdmin');
				$data['company_rec'] = $this->Home_model->fetch_details('com_isDelete=0','ad_company');
			}elseif(isset($this->session->userdata['comAdmin'])){
				$data['user'] = $this->session->userdata('comAdmin');
				$data['company_rec'] = $this->Home_model->fetch_details('com_createdby='.$id.' AND  com_isDelete=0','ad_company');
			}
			$data['company_details'] = $this->Home_model->fetch_details('com_createdby='.$data['user']['com_id'].' AND  com_isDelete=0','ad_company');
			
			$data['flash']['active'] = $this->session->flashdata('active');
	    	$data['flash']['title'] = $this->session->flashdata('title');
	    	$data['flash']['text'] = $this->session->flashdata('text');
	    	$data['flash']['type'] = $this->session->flashdata('type');
			$data['page'] = 'company';
			$id=$data['user']['id'];
			$this->load->view('Home/header',$data);
			$this->load->view('Company/company_details',$data);
			$this->load->view('Company/company_footer',$data);
		}

		public function register_company()
		{
			//echo "<a href='".$society->website."' target='_blank'>'".$society->website."'</a>";
			if(isset($this->session->userdata['mainAdmin'])){
				$data['user'] = $this->session->userdata('mainAdmin');
			}elseif(isset($this->session->userdata['comAdmin'])){
				$data['user'] = $this->session->userdata('comAdmin');
			}
			$data['page'] = 'company';
			$this->load->view('Home/header',$data);
			$this->load->view('Company/new_company',$data);
			$this->load->view('Company/company_footer',$data);
		}

		public function new_company() // insert into db
		{
			if(isset($this->session->userdata['mainAdmin'])){
				$data['user'] = $this->session->userdata('mainAdmin');
			}elseif(isset($this->session->userdata['comAdmin'])){
				$data['user'] = $this->session->userdata('comAdmin');
			}
			$company['com_name'] = $this->input->post('company_name');
			$company['com_contact'] = $this->input->post('company_contact');
			$company['com_email'] = $this->input->post('company_email');
			$company['com_createdby'] = $data['user']['id'];
			$company['com_com_id'] = $data['user']['com_id'];
			//print_r($company);
			$this->Home_model->insert_records('ad_company',$company);
			$id= $this->db->insert_id();

			//print_r($id);

			$contact['cont_name']=$this->input->post('cp_name');
			$contact['cont_mobile']=$this->input->post('cp_mobile');
			$contact['cont_email']=$this->input->post('cp_email');
			$contact['cont_for']=2;
			$contact['cont_for_id']=$id;
			$contact['cont_com_id']=$data['user']['com_id'];
			$this->Home_model->insert_records('ad_contact',$contact);
			redirect('company');
		}
		public function disable_company()
		{
			$com_id = $_POST['com_id'];
			echo $com_id;
			$data= $this->Home_model->update_records('com_id='.$com_id.'','ad_company',array('com_isDelete'=>1));
			$this->session->set_flashdata('active',1);
		    $this->session->set_flashdata('title',"Thank You.");
		    $this->session->set_flashdata('text',"Company has been Deleted"); 
		    $this->session->set_flashdata('type',"success");
			redirect('company');

		}

	}
?>